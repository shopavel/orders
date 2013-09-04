<?php namespace Shopavel\Orders;

interface OrderInterface {

    public function customer();
    public function products();

    public function total();
    public function quantity();

    public function minimumTotal();
    public function maximumTotal();
    public function quantityLimit();

}