<?php


    namespace App\Controllers;


    use App\Models\Product;

    class CatalogController
    {
        public function index(){

        }

        public function showProduct(){
            $id =  $_GET['id'];
            $allProducts = Product::selectAll();
            $product = Product::findById((int) $id);
            render('product.php', [
                'product' => $product,
                'productsList' => $allProducts
            ]);
        }

        public function showForm(){
            render('addProductFrom.php');
        }

        public function saveProduct(){
            move_uploaded_file($_FILES['img']['tmp_name'],  $_SERVER['DOCUMENT_ROOT'].'/'. $_FILES['img']['name']);

        }

    }