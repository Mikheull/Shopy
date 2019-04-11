<?php
$page = 'home';

if(isset($queryURI) && isset($queryURI[1])){

    $array = ['home', 'edit'];
    if(in_array($queryURI[1], $array)){
        $page = $queryURI[1];
    }

}

require ('view/pages/account/pages/'. $page .'/index.php');