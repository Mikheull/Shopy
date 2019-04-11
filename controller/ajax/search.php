<?php

session_start();

require('../../database.php');
require('../../model/class/db_connect.php');

require('../../model/class/shop.php');
require('../../model/class/user.php');
require('../../model/class/main.php');

$shop = new shop($db);
$user = new user($db);
$main = new main($db);

$seperator = $main -> getSetting('rewrite_separator');
$keyword = $_POST['keyword'];

$request = $db -> query("SELECT * FROM `product` WHERE `name` LIKE '%$keyword%' LIMIT 0, 10");
$result = $request -> fetchAll();

if(empty($result)){
    echo 'Aucun résultat !';
}else{
    

    foreach ($result as $res) {
        $id = $res['ID'];

        
        if($shop -> getProduct($id, 'enable') == true){
                                            

            // Les images
            $imagess = $shop -> getProduct($id, 'images');

            $obj = json_decode( $imagess, true);

            $path_image = "NULL/no_image_available.jpeg";
            $legend_image = "Pas d'image disponible pour ce produit";

            if($imagess !== '{}'){
                for($i = 1; $i < sizeof($obj['images'][0]) + 1; $i++){
                    $path = $obj['images'][0][$i][0];
                    if($path['is_cover'] == true){
                        $path_image = "products/".$shop -> getProduct($id, 'reference')."/".$path['ref'].".png";
                        $legend_image = $path['legend'];
                        $verif = true;
                    }
                }

                if(!isset($verif)){
                    for($i = 1; $i < sizeof($obj['images'][0]) + 1; $i++){
                        $path = $obj['images'][0][$i][0];
                        if(isset($path['pos']) AND $path['pos'] == 1){
                            $path_image = "products/".$shop -> getProduct($id, 'reference')."/".$path['ref'].".png";
                            $legend_image = $path['legend'];
                        }
                    }
                }
            }

            $linkProduit = "shop".$seperator."produit".$seperator.$shop -> getProduct($id, 'reference').$seperator.$shop -> getProduct($id, 'name');

            $prename = $shop -> getProduct($id, 'name');
            $name = str_replace($_POST['keyword'], '<str>'.$_POST['keyword'].'</str>', $prename);

            ?>
            <div class="item">
                <div style="width: 64px;height: 64px;margin: 18px;float:left"> <a href="<?= $linkProduit ;?>"> <img src="content/uploads/shop/<?= $path_image ;?>" alt="<?= $legend_image ;?>" style="width: 100%;height: 64px; border-radius: 6px"> </a> </div>
                <div class="informations">
                    <a href="<?= $linkProduit ;?>"><span><?= $name ;?></span></a>
                    <span style="display: block;font-size: 1.1em;font-weight: bold;text-align: left;margin: 10px 0"><?= $shop -> getProductPrice( $shop -> getProduct($id, 'price_ttc') ) ;?>€</span>
                </div>
            </div>

            <?php
        }else{
            ?>
            <div style="background: #2A2A2A;margin: 10px 0;border-radius: 4px;height: 100px" id="wishlist-item-<?= $id ;?>">
                <div style="width: 64px;height: 64px;margin: 18px;float:left">  <img src="content/uploads/shop/NULL/no_image_available.jpeg" alt="Pas d'image disponible pour ce produit" style="width: 100%;height: 64px; border-radius: 6px"> </div>
                <div style="float: left;margin: 18px 0 0 0">
                    <a style="font-size: 1em;font-weight: bold;color: #FFF">Produit indisponible !</a>
                </div>
                <div style="float: right;margin: 18px 0 0 0">
                    <a style="margin: 5px 18px 0 0;font-size: .8em;font-weight: bold; color: #495057;float: right;cursor: pointer" class="buttonWishlistHead" data-id="<?= $id ;?>"><i class="fas fa-trash"></i></a>
                </div>
            </div>

            <?php
        }
    }


}