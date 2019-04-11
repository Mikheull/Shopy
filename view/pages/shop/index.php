<?php
require ('controller/shop.php');

$page = 'categorie';

if(isset($queryURI) && isset($queryURI[1])){
    
    if(isset($queryURI[2])){

        $pagesCategorie = array();
        foreach($shop -> getAllSupercategory() as $p){
            array_push($pagesCategorie, $p['name']);
        }

        $pagesProduit = array();
        foreach($shop -> getAllProducts() as $p){
            array_push($pagesProduit, $p['reference']);
        }


        if(in_array($queryURI[2], $pagesCategorie)){
            $page = 'categorie';
            foreach($shop -> getAllSupercategory() as $c){
                if($c['name'] == $queryURI[2]){
                    $categoryname = $c['name'];
                }
            }
        }else if(in_array($queryURI[2], $pagesProduit)){
            $page = 'produit';
            foreach($shop -> getAllProducts() as $p){
                if($p['reference'] == $queryURI[2]){
                    $productref = $p['reference'];
                }
            }
        }else{
            $page = 'error';
        }
    }

}

require ('view/pages/shop/pages/'. $page .'/index.php');




