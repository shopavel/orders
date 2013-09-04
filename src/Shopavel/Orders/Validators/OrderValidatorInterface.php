<?php namespace Shopavel\Orders\Validators;

use Shopavel\Orders\OrderInterface;

interface OrderValidatorInterface {

    /**
     * Run a validation test against the order
     * 
     * @param  OrderInterface $order
     * @return void
     */
    public function validate(OrderInterface $order);

}