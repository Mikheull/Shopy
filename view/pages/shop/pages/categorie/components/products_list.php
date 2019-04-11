<?php

if(isset($queryURI[4])){
    $selecter_cat = $queryURI[2].'-'.$queryURI[3].'-'.$queryURI[4];

}else if(isset($queryURI[3])){
    $selecter_cat = $queryURI[2].'-'.$queryURI[3];

}else{
    $selecter_cat = $queryURI[2];

}





$shopArray = array();

if(isset($queryURI[4])){
    // Si on veut afficher tout d'une catégorie principale
    $mid = $shop -> transformCategoryNameToID($queryURI[2],0);
    $sid = $shop -> transformCategoryNameToID($queryURI[3],$mid);
    $nid = $shop -> transformCategoryNameToID($queryURI[4],$sid);
    $shopArray = $shop -> getProducts($nid);



    
    
}else if(isset($queryURI[3])){
    // Si on veut afficher tout d'une catégorie main

    $mid = $shop -> transformCategoryNameToID($queryURI[2],0);
    $sid = $shop -> transformCategoryNameToID($queryURI[3],$mid);
    $request = $db -> query("SELECT * FROM `category` WHERE `parent` = '$sid' ");
    $res = $request -> fetchAll();

    foreach($res as $r){
        $cat = $r['ID'];
        $request = $db -> query("SELECT * FROM `product` WHERE `category` = '$cat' ");
        $res = $request -> fetchAll();
        foreach($res as $r){
            array_push($shopArray, $r);
        }
    }

    
}else{
    // Si on veut afficher les produits d'une catégorie 
    
    $id = $shop -> transformCategoryNameToID($queryURI[2],0);
    $request = $db -> query("SELECT * FROM `category` WHERE `parent` = '$id' ");
    $res = $request -> fetchAll();

    foreach($res as $r){
        $cat = $r['ID'];
        $request = $db -> query("SELECT * FROM `category` WHERE `parent` = '$cat' ");
        $res = $request -> fetchAll();
        foreach($res as $r){
            $cat = $r['ID'];
            $request = $db -> query("SELECT * FROM `product` WHERE `category` = '$cat' ");
            $res = $request -> fetchAll();
            foreach($res as $r){
                array_push($shopArray, $r);
            }
        }
    }
}
?>



<div class="container">
    <div class="row">
        <?php
            foreach($shopArray as $product){
                $display = "";
                if($user -> checkOnWishlist($product['ID']) == true){ $display = "addedToWishlist"; }
                
                // Les images
                $obj = json_decode( $product['images'], true);

                $path_image = "NULL/no_image_available.jpeg";
                $legend_image = "Pas d'image disponible pour ce produit";

                if($product['images'] !== '{}'){
                    for($i = 1; $i < sizeof($obj['images'][0]) + 1; $i++){
                        $path = $obj['images'][0][$i][0];
                        if($path['is_cover'] == true){
                            $path_image = "products/".$product['reference']."/".$path['ref'].".png";
                            $legend_image = $path['legend'];
                            $verif = true;
                        }
                    }

                    if(!isset($verif)){
                        for($i = 1; $i < sizeof($obj['images'][0]) + 1; $i++){
                            $path = $obj['images'][0][$i][0];
                            if(isset($path['pos']) AND $path['pos'] == 1){
                                $path_image = "products/".$product['reference']."/".$path['ref'].".png";
                                $legend_image = $path['legend'];
                            }
                        }
                    }
                }

                $link_product =  $correctSlug."shop/produit/".$product['reference'].'/'.$product['name'];

                require('view/pages/shop/pages/categorie/components/product-item.php') ;
            }
        ?>
    </div>
</div>