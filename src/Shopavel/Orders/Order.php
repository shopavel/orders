<?php namespace Shopavel\Orders;

use Entities\EntityCollection;
use Illuminate\Database\Eloquent\Model;

class Order extends Model implements OrderInterface {

    protected $entities;

    public function customer()
    {
        return $this->belongsTo('Shopavel\Customers\Customer');
    }

    public function getEntities()
    {
        if (! $this->entities)
        {
            $this->entities = new EntityCollection;
        }
    }

    public function getTotal()
    {
        $total = 0;
        foreach ($this->products as $product)
        {
            $total += $product->total();
        }

        return $total;
    }

    public function getQuantity()
    {
        $quantity = 0;
        foreach ($this->products as $product)
        {
            $quantity += $product->quantity();
        }

        return $quantity;
    }

    public function getMinimumTotal()
    {
        return 0;
    }

    public function getMaximumTotal()
    {
        return -1;
    }

    public function getMinimumQuantity()
    {
        return 1;
    }

    public function getMaximumQuantity()
    {
        return -1;
    }

}