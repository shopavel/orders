<?php namespace Shopavel\Orders\Entities;

/**
 * Interface for order entities. An order entity is any model that can be
 * attached to an order, such as products and vouchers.
 *
 * @author  Laurence Roberts <lsjroberts@gmail.com>
 */
interface EntityInterface {

    /**
     * Get the unique key for this entity.
     * 
     * @return string
     */
    public function getKey();

}