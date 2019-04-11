<?php
require ('controller/help.php');

$page = 'home';

if(isset($queryURI) && isset($queryURI[1])){

    $array = ['home'];
    if(in_array($queryURI[1], $array)){
        $page = $queryURI[1];
    }


    $pages = array();
    foreach($help -> getArticles() as $p){
        array_push($pages, $p['url']);
    }
    if(in_array($queryURI[1], $pages)){
        $page = 'view';
        foreach($help -> getArticles() as $h){
            if($h['url'] == $queryURI[1]){
                $reference = $h['reference'];
            }
        }
    }

}

require ('view/pages/help/pages/'. $page .'/index.php');