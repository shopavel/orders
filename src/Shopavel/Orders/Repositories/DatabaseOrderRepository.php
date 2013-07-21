<?php namespace Shopavel\Orders\Repositories;

use Shopavel\Orders\OrderInterface;
use Shopavel\Products\ProductInterface;

class DatabaseOrderRepository implements OrderRepositoryInterface {

    protected $db;

    public function __construct(DatabaseConnection $db, ProductRepositoryInterface $products)
    {
        $this->db = $db;
        $this->products = $products;
    }

    public function findByReference($reference)
    {
        return $this->db->select("SELECT * FROM orders WHERE reference = ?", array($reference));
    }

    public function addProduct(OrderInterface $order, ProductInterface $product, $quantity = 1)
    {
        return $this->db->insert("INSERT INTO order_product (order_id, product_id, quantity) VALUES (?, ?, ?)", array(
            $order->id, $product->id, $quantity));
    }

    public function removeProduct(OrderInterface $order, ProductInterface $product)
    {
        return $this->db->delete("DELETE FROM order_product WHERE order_id = ? AND product_id = ?", array($order->id,
            $product->id));
    }

    public function setProductQuantity(OrderInterface $order, ProductInterface $product, $quantity = 1)
    {
        return $this->db->update("UPDATE order_product SET quantity = ? WHERE order_id = ? AND product_id = ?", array(
            $quantity, $order->id, $product->id));
    }

    public function products(OrderInterface $order)
    {
        return $this->products->join('order_product', 'order_product.order_id', '=', $this->order->id, 'right');
    }

}