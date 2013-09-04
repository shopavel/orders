<?php namespace Shopavel\Orders\Transactions;

use Shopavel\Transactions\Transaction;
use Shopavel\Orders\Entities\EntityInterface;

/**
 * Basket transactions.
 *
 * @author  Laurence Roberts <lsjroberts@gmail.com>
 */
class BasketTransactions extends Transaction {

    public function add(BasketInterface &$basket, EntityInterface $entity)
    {
        $basket->getEntities()->add($entity);
    }

    public function remove(BasketInterface &$basket, EntityInterface $entity)
    {
        $basket->getEntities()->remove($entity);
    }

}