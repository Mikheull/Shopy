<?php

session_start();

require('../../database.php');
require('../../model/class/db_connect.php');

require('../../model/class/shop.php');
require('../../model/class/user.php');

$shop = new shop($db);
$user = new user($db);


$product = $_POST['idProduct'];

$wishList = $user -> getWishlist() ;
$arr = json_decode($wishList, true);

if($user -> checkOnWishlist($product) == false){
    $user -> addToWishlist($product);
}else{
    $user -> removeFromWishlist($product);
}

?>

