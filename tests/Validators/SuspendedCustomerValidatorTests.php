<?php

use Mockery as m;
use Shopavel\Orders\Validators\SuspendedCustomerValidator;

class SuspendedCustomerValidatorTests extends PHPUnit_Framework_TestCase {

    public function setUp()
    {
        $this->validator = new SuspendedCustomerValidator;
    }

    /**
     * @expectedException Exception
     */
    public function testSuspendedThrowsException()
    {
        $order = m::mock('Shopavel\Orders\OrderInterface');
        $order->customer = m::mock();
        $order->customer->shouldReceive('isSuspended')->andReturn(true);
        $this->validator->validate($order);
    }

    public function testActiveDoesNotThrowException()
    {
        $order = m::mock('Shopavel\Orders\OrderInterface');
        $order->customer = m::mock();
        $order->customer->shouldReceive('isSuspended')->andReturn(false);
        $this->validator->validate($order);
    }
    
}