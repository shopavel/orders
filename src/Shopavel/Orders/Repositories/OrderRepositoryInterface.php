<?php namespace Shopavel\Orders\Repositories;

interface OrderRepositoryInterface {

    public function findByReference($reference);
    
}