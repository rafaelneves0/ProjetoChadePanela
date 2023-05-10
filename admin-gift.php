<?php 

use \Sura\PageAdmin;
use \Sura\Model\User;
use \Sura\Model\Product;
use \Sura\Model\Gift;

$app->get('/admin/gift', function(){
    
    User::verifyLogin();

    $gift = Gift::listAll();

    $page = new PageAdmin();

    $page->setTpl("gift" , [
  	"gift" => $gift
 	]);
});



$app-> get("/admin/gift/:idproduct/delete", function($idproduct)
{
    User::verifyLogin();

    $gift = new Gift();

    $gift->get((int)$idproduct);

    $gift->delete();

    header("Location: /admin/gift");
    exit();
});


 ?>