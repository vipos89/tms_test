<?php


    namespace App\Controllers;

    use App\Models\BaseModel;
    use App\Models\Brand;
    use App\Models\Category;
    use App\Models\Product;
    use App\Models\User;
    use mysqli;

    class SiteController
    {
        public function index(){

            $product = new Product();
            $product->name = 'new prod';
            $product->description = 10000;
            $product->img = 'sdsfsdfdsfdsf';
            $product->save();

            die();
            Product::findById(1);
            render('main.php');
        }

        public function notFound(){
            render('404.php');
        }

    }