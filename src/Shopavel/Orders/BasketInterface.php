<?php namespace Shopavel\Orders;

use Shopavel\Products\ProductInterface;

interface BasketInterface {

    public function add(ProductInterface $product, $quantity = 1);
    public function remove(ProductInterface $product);
    public function setQuantity(ProductInterface $product, $quantity);
    public function products();

}