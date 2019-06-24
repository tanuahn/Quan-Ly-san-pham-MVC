<?php
/**
 * Created by PhpStorm.
 * User: tuan
 * Date: 24/06/19
 * Time: 14:00
 */
namespace Controller;
use Model\Products;
use Model\ProductsDB;
use Model\DBConnection;
class ProductController
{
    public $productsDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=baitap", "root", "25251325");
        $this->productsDB = new ProductsDB($connection->connect());
    }

    public function index()
    {
        $products = $this->productsDB->getAll();
        include "View/list.php";
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'View/add.php';
        } else {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $status = $_POST['status'];
            $producer = $_POST['producer'];

            $product = new Products($name, $price, $status, $producer);
            $this->productsDB->create($product);
            $message = 'Product created';
            header('location: index.php');
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $id = $_GET['id'];
            $product = $this->productsDB->get($id);
            include "View/delete.php";
        } else{
            $id = $_POST['id'];
            $this->productsDB->delete($id);
            header('Location: index.php');
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $id = $_GET['id'];
            $product = $this->productsDB->get($id);
            include "View/edit.php";
        } else {
            $id = $_POST['id'];
            $product = new Products($_POST['name'], $_POST['price'], $_POST['status'], $_POST['producer']);
            $this->productsDB->update($id, $product);
            header('Location: index.php');
        }
    }
}