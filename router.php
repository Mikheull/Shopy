<?php
require('controller/main.php');
require('controller/user.php');
require('controller/shop.php');


$responseURI = 'index';

if($main -> getSetting('maintenance_mode') == false){

    $seperator = $main -> getSetting('rewrite_separator');

    if(isset($_GET['query'])){

        // Découpage de l'url pour la réécriture
        if(strpos($_GET['query'], '/') !== false) {
            $queryURI = explode('/', $_GET['query']);
            $query = $queryURI[0];
        }else {
            $query = $_GET['query'];  
        }

        $pages = array('shop', 'cart', 'order', 'account', 'auth', 'help');
        

        if(in_array($query, $pages)){
            $responseURI = $query;
        }else{
            $responseURI = 'error';
        }
        
    }else{
        $responseURI = 'home';
    }

}else{
    $responseURI = 'maintenance';
}

require ('view/pages/index.php');