<?php 


use \Slim\Slim;
use \Sura\Page;
use \Sura\Model\Product;
use \Sura\Model;


$app->get('/select/:idproduct', function($idproduct){

	$product = new Product();

    $product->get((int)$idproduct);

	$page = new Page();

	$page->setTpl("product", [
        'product'=>$product->getValues()
    ]);

});

$app->post('/select/:idproduct', function($idproduct){

	$product = new Product();

	$product->get((int)$idproduct);

	$product->setData($_POST);

	$product->saveSelect();

	header("Location: /success");
   exit();

});


 ?>