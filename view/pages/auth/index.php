<?php
require ('controller/user.php');

$page = 'login';

if(isset($queryURI) && isset($queryURI[1])){

    $array = ['login', 'register','reset-password'];
    if(in_array($queryURI[1], $array)){
        $page = $queryURI[1];
    }

}

require ('view/pages/auth/pages/'. $page .'/index.php');