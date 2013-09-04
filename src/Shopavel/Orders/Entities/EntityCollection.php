<?php namespace Shopavel\Orders\Entities;

use Shopavel\Collections\Collection;

class EntityCollection extends Collection {

    public function add(EntityInterface $entity)
    {
        parent::add($entity->getKey(), $entity);
    }

    public function remove(EntityInterface $entity)
    {
        parent::remove($entity->getKey());
    }

    public function offsetSet($offset, $value)
    {
        return parent::add($offset, $value);
    }

}