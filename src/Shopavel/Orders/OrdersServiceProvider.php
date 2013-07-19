<?php namespace Shopavel\Orders;

use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider;

class OrdersServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('shopavel/orders');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['orders'] = $this->app->share(function($app)
        {
            return new OrderManager;
        });

        $this->app['orders.processor'] = $this->app->share(function($app)
        {
            return new OrderProcessor;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('orders', 'orders.processor');
    }

}