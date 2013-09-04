<?php namespace Shopavel\Orders\Repositories;

use Shopavel\Orders\OrderInterface;
use Shopavel\Products\ProductInterface;

class DatabaseOrderRepository implements OrderRepositoryInterface {

    /**
     * Database connection
     * 
     * @var DatabaseConnection
     */
    protected $db;

    /**
     * Constructor
     * 
     * @param DatabaseConnection         $db
     * @param ProductRepositoryInterface $products
     */
    public function __construct(DatabaseConnection $db, ProductRepositoryInterface $products)
    {
        $this->db = $db;
        $this->products = $products;
    }

    /**
     * Find an order by a reference
     * 
     * @param  string $reference
     * @return array
     */
    public function findByReference($reference)
    {
        return $this->db->selectOne("SELECT * FROM orders WHERE reference = ? LIMIT 1", array($reference));
    }

    /**
     * Add a product to the order
     * 
     * @param  OrderInterface   $order
     * @param  ProductInterface $product
     * @param  integer          $quantity
     * @return array
     */
    public function addProduct(OrderInterface $order, ProductInterface $product, $quantity = 1)
    {
        return $this->db->insert("INSERT INTO order_product (order_id, product_id, quantity) VALUES (?, ?, ?)", array(
            $order->id, $product->id, $quantity));
    }

    /**
     * Remove a product from an order
     * 
     * @param  OrderInterface   $order
     * @param  ProductInterface $product
     * @return void
     */
    public function removeProduct(OrderInterface $order, ProductInterface $product)
    {
        return $this->db->delete("DELETE FROM order_product WHERE order_id = ? AND product_id = ?", array($order->id,
            $product->id));
    }

    /**
     * Set the quantity of a product on the order
     * 
     * @param OrderInterface   $order
     * @param ProductInterface $product
     * @param integer          $quantity
     */
    public function setProductQuantity(OrderInterface $order, ProductInterface $product, $quantity = 1)
    {
        return $this->db->update("UPDATE order_product SET quantity = ? WHERE order_id = ? AND product_id = ?", array(
            $quantity, $order->id, $product->id));
    }

    /**
     * Retrieve the products belonging to the order
     * 
     * @param  OrderInterface $order
     * @return array
     */
    public function products(OrderInterface $order)
    {
        return $this->products->join('order_product', 'order_product.order_id', '=', $this->order->id, 'right');
    }

}