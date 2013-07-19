<?php namespace Shopavel\Orders;

use Omnipay\Common\GatewayInterface;
use Shopavel\Cards\CardInterface;
use Shopavel\Orders\Repositories\OrderRepositoryInterface;

class OrderProcessor {

    protected $gateway;

    protected $orders;

    protected $validators;

    public function __construct(GatewayInterface $gateway,
                                OrderRepositoryInterface $orders,
                                array $validators = array())
    {
        $this->gateway = $gateway;
        $this->orders = $orders;
        $this->validators = $validators;
    }

    public function process(OrderInterface $order, CardInterface $card)
    {
        $this->validate($order);

        $this->gateway->purchase($order->amount,
                                 $order->currency,
                                 $card->toArray())->send();
    }

    public function validate(OrderInterface $order)
    {
        foreach ($this->validators as $validator)
        {
            $this->validator->validate($order);
        }
    }

}