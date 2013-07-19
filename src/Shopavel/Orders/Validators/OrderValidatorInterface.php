<?php namespace Shopavel\Orders\Validators;

use Shopavel\Orders\OrderInterface;

interface OrderValidatorInterface {

    public function validate(OrderInterface $order);

}