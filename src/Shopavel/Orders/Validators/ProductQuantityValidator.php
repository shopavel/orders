<?php namespace Shopavel\Orders\Validators;

use Shopavel\Orders\OrderInterface;

class ProductQuantityValidator implements OrderValidatorInterface {

    public function validate(OrderInterface $order)
    {
        if ($order->quantity() == 0)
        {
            throw new \Exception("You can not process an empty order.");
        }

        if ($order->quantityLimit() > 0 and $order->quantity() > $order->quantityLimit())
        {
            throw new \Exception("The order quantity exceeds the purchase limit.");
        }
    }

}