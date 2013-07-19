<?php namespace Shopavel\Orders;

use Shopavel\Products\ProductInterface;

class OrderManager {

    public function __construct(OrderRepositoryInterface $repository, OrderInterface $order)
    {
        $this->repository = $repository;
        $this->order = $order;
    }

    public function add(ProductInterface $product)
    {
        $this->repository->addProduct($this->order, $product);
    }

    public function remove(ProductInterface $product)
    {
        $this->repository->removeProduct($this->order, $product);
    }

    public function setQuantity(ProductInterface $product, $quantity)
    {
        if ($quantity <= 0)
        {
            $this->remove($product);
        }

        $this->repository->setProductQuantity($this->order, $product, $quantity);
    }

}