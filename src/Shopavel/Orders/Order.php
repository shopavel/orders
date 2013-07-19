<?php namespace Shopavel\Orders;

use Eloquent;

class Order extends Eloquent implements OrderInterface {

    public function customer()
    {
        return $this->belongsTo('Shopavel\Customers\Customer');
    }

    public function products()
    {
        return $this->hasMany('Shopavel\Products\Product');
    }

}