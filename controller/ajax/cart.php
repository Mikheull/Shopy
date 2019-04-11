<?php

session_start();

require('../../database.php');
require('../../model/class/db_connect.php');

require('../../model/class/shop.php');
require('../../model/class/user.php');

$shop = new shop($db);
$user = new user($db);

$var = $shop -> getAlUserlCart( $user -> getToken() );



if(isset($_POST['idProduct'])){

    $id = $_POST['idProduct'];
    $quantity = $_POST['quantity'];
    
    if(empty($var)){
        if($user -> checkOnWishlist($id) == true){ $user -> removeFromWishlist($id); }
    
        $exec = $shop -> newCart( $user -> getToken() );
        $add = $shop -> addProductCart( $user -> getToken() , $quantity, $id);
    }else{
        if($user -> checkOnWishlist($id) == true){ $user -> removeFromWishlist($id); }
    
        $add = $shop -> addProductCart( $user -> getToken() , $quantity, $id);
    }

}



if(isset($_POST['product'])){

    $product = $_POST['product'];
    $mode = $_POST['mode'];
    if($mode == 'less'){
        $add = $shop -> removeCartQuant( $user -> getToken() , $product);
    }
    if($mode == 'more'){
        $add = $shop -> addCartQuant( $user -> getToken() , $product);
    }

}

?>