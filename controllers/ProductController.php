<?php
session_start();
require_once '../config/database.php';
require_once '../models/Product.php';

class ProductController
{
    private $db;
    private $product;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->product = new Product($this->db);
    }

    public function list()
    {
        $stmt = $this->product->readAll();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require '../views/product/list.php';
    }

    public function add_edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->product->name = $_POST['name'];
            $this->product->price = $_POST['price'];

            if (isset($_POST['id']) && !empty($_POST['id'])) {
                $this->product->id = $_POST['id'];
                $this->product->update();
            } else {
                $this->product->create();
            }
            header('Location: ../controllers/ProductController.php?action=list');
        } else {
            if (isset($_GET['id'])) {
                $this->product->id = $_GET['id'];
                $stmt = $this->product->readOne();
                $product = $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                $product = null;
            }
            require '../views/product/add_edit.php';
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $this->product->id = $_GET['id'];
            $this->product->delete();
        }
        header('Location: ../controllers/ProductController.php?action=list');
    }
}

if (isset($_GET['action'])) {
    $controller = new ProductController();
    switch ($_GET['action']) {
        case 'list':
            $controller->list();
            break;
        case 'add_edit':
            $controller->add_edit();
            break;
        case 'delete':
            $controller->delete();
            break;
    }
}
?>