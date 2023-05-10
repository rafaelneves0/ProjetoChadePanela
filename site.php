<?php 


use \Slim\Slim;
use \Sura\Page;
use \Sura\Model\Product;
use \Sura\Model;



$app->get('/', function(){

	$products = Product::listFree();
    
	$page = new Page();

	$page->setTpl("index");

});

$app->get('/list', function(){

	$products = Product::listFree();
    
	$page = new Page();

	$page->setTpl("list",[
   "products"=>Product::checkList($products)
       ]);

});

$app->get('/success', function(){

	$products = Product::listFree();
    
	$page = new Page();

	$page->setTpl("success");

});


 ?>