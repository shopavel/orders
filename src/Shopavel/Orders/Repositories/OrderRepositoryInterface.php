<?php namespace Shopavel\Orders\Repositories;

use Shopavel\Orders\OrderInterface;
use Shopavel\Products\ProductInterface;

interface OrderRepositoryInterface {

    public function findByReference($reference);
    public function addProduct(OrderInterface $order, ProductInterface $product);
    public function removeProduct(OrderInterface $order, ProductInterface $product);
    public function setProductQuantity(OrderInterface $order, ProductInterface $product, $quantity);
    
}