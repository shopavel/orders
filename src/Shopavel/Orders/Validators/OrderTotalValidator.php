<?php namespace Shopavel\Orders\Validators;

use Shopavel\Orders\OrderInterface;

class OrderTotalValidator implements OrderValidatorInterface {

    public function validate(OrderInterface $order)
    {
        if ($order->getMinimumTotal() > -1 and $order->getTotal() < $order->getMinimumTotal())
        {
            throw new \Exception("Order total was below the minimum required.");
        }

        if ($order->getMaximumTotal() > -1 and $order->getTotal() > $order->getMaximumTotal())
        {
            throw new \Exception("Order total exceeded the maximum allowed.");
        }
    }

}