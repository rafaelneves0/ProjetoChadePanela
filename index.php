<?php 

session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;
use \Sura\Page;
use \Sura\Model\Product;


$app = new Slim();

$app->config('debug', true);


require_once("site.php");
require_once("products.php");
require_once("admin.php");
require_once("admin-users.php");
require_once("admin-products.php");
require_once("admin-gift.php");


$app->run();

 ?>