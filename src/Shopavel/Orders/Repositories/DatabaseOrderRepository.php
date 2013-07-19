<?php namespace Shopavel\Orders\Repositories;

use Shopavel\Orders\OrderInterface;
use Shopavel\Products\ProductInterface;

class DatabaseOrderRepository implements OrderRepositoryInterface {

    protected $db;

    public function __construct(DatabaseConnection $db)
    {
        $this->db = $db;
    }

    public function findByReference($reference)
    {
        return $this->db->select("SELECT * FROM orders WHERE reference = ?", array($reference));
    }

    public function addProduct(OrderInterface $order, ProductInterface $product)
    {
        return $this->db->insert("INSERT INTO order_product (order_id, product_id, quantity) VALUES (?, ?, ?)", array(
            $order->id, $product->id, 1));
    }

    public function removeProduct(OrderInterface $order, ProductInterface $product)
    {
        return $this->db->delete("DELETE FROM order_product WHERE order_id = ? AND product_id = ?", array($order->id,
            $product->id));
    }

    public function setProductQuantity(OrderInterface $order, ProductInterface $product, $quantity)
    {
        return $this->db->update("UPDATE order_product SET quantity = ? WHERE order_id = ? AND product_id = ?", array(
            $quantity, $order->id, $product->id));
    }

}