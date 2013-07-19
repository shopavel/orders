<?php namespace Shopavel\Orders\Validators;

use Shopavel\Orders\OrderInterface;

class SuspendedCustomerValidator implements OrderValidatorInterface {

    public function validate(OrderInterface $order)
    {
        if ($order->customer->isSuspended())
        {
            throw new \Exception("Suspended customers may not place new orders.");
        }
    }

}