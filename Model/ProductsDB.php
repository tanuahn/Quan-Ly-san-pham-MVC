<?php
/**
 * Created by PhpStorm.
 * User: tuan
 * Date: 24/06/19
 * Time: 13:59
 */

namespace Model;


class ProductsDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM products";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $products = [];

        foreach ($result as $item){
            $product = new Products($item['name'], $item['price'], $item['status'], $item['producer']);
            $product->id = $item['id'];
            $products[] = $product;
        }
        return $products;
    }

    public function create($product)
    {
        $sql = "INSERT INTO products(name, price, status, producer) VALUES (?, ?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $product->name);
        $statement->bindParam(2, $product->price);
        $statement->bindParam(3, $product->status);
        $statement->bindParam(4, $product->producer);
        return $statement->execute();
    }

    public function get($id)
    {
        $sql = "SELECT * FROM products WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $product = new Products($row['name'], $row['price'], $row['status'], $row['producer']);
        $product->id = $row['id'];
        return $product;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM products WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function update($id, $product)
    {
        $sql = "UPDATE products SET name = ?, price = ?, status = ?, producer = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $product->name);
        $statement->bindParam(2, $product->price);
        $statement->bindParam(3, $product->status);
        $statement->bindParam(4, $product->producer);
        $statement->bindParam(5, $id);
        return $statement->execute();
    }
}