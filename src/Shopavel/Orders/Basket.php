<?php namespace Shopavel\Orders;

use Shopavel\Products\ProductInterface;
use Shopavel\Products\Repositories\ProductRepositoryInterface;

class Basket {

    public function __construct(OrderInterface $order, OrderRepositoryInterface $repository)
    {
        $this->order = $order;
        $this->repository = $repository;
    }

    public function add(ProductInterface $product, $quantity = 1)
    {
        $this->repository->addProduct($this->order, $product, $quantity);

        $this->resetProducts();
    }

    public function remove(ProductInterface $product)
    {
        $this->repository->removeProduct($this->order, $product);

        $this->resetProducts();
    }

    public function setQuantity(ProductInterface $product, $quantity)
    {
        if ($quantity <= 0)
        {
            $this->remove($product);
        }

        $this->repository->setProductQuantity($this->order, $product, $quantity);

        $this->resetProducts();
    }

    public function products()
    {
        if ($this->products === null)
        {
            $this->resetProducts();
        }

        return $this->products;
    }

    protected function resetProducts()
    {
        $this->products = $this->repository->products();
    }

}