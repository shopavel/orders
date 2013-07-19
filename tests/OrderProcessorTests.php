<?php

use Mockery as m;
use Shopavel\Orders\OrderProcessor;

class OrderProcessorTests extends PHPUnit_Framework_TestCase {

    public function setUp()
    {
        $gateway = m::mock('Omnipay\Common\GatewayInterface');
        $orders = m::mock('Shopavel\Orders\Repositories\OrderRepositoryInterface');
        $this->processor = new OrderProcessor($gateway, $orders);
    }

    public function testProcess()
    {
        
    }

    /**
     * @expectedException Exception
     */
    public function testValidateFailureThrowsException()
    {
        $order = m::mock('Shopavel\Orders\OrderInterface');
        
    }

}