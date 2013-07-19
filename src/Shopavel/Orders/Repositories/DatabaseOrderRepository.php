<?php namespace Shopavel\Orders\Repositories;

class DatabaseOrderRepository implements OrderRepositoryInterface {

    protected $db;

    public function __construct(DatabaseConnection $db)
    {
        $this->db = $db;
    }

    public function findByReference($reference)
    {
        return $this->db->exec('select * from orders where reference = ?', array($reference));
    }

}