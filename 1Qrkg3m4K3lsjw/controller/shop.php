<?php

/**
 * 
 * shop.php
 * 
 * Création de l'objet "shop"
 *   Cet objet servira pour toutes les méthodes relatives aux shop.
 * 
 */

 
$shop = new shop($db);


if(isset($_POST['createCategory_button'])){
    $field_values_array = $_POST['field_name'];
    $id = 0;
    if(isset($_POST['parentID']) AND $_POST['parentID'] !== 'NULL'){
        if($_POST['mode'] == 'main'){
            $id = $_POST['parentID'];
        }else if($_POST['mode'] == 'normal'){
            $id = $_POST['parentID'];
        }
    }
    
    foreach($field_values_array as $value){
        if(!empty($value)){
            $name = htmlentities(addslashes($value));
            $shop -> newCategory($name, $id);
        }
    }
}


if(isset($_POST['deleteCategory_button'])){
    $id = $_POST['category'];
    $shop -> deleteCategory($id);
}


if(isset($_POST['renameCategory_button'])){
    $id = $_POST['category'];
    $value = $_POST['category_name'];
    
    $shop -> renameCategory($id, $value);
}

if(isset($_POST['add_attribut'])){
    if(!empty($_POST['attribut']) AND !empty($_POST['type'])){
        $attribut = htmlentities(addslashes($_POST['attribut']));
        $type = htmlentities(addslashes($_POST['type']));

        if($type == "color"){
            if(isset($_POST['color_code'])){
                $hex = $_POST['color_code'];
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                $color = "$r, $g, $b";
                $shop -> newAttribut($attribut, 'color', $color);
            }
        }
        else{
            $shop -> newAttribut($attribut, 'size', 'NULL');
        }
        
    }
}






if(isset($_POST['add_product'])){
    $name = 'undefined';
    $category = 0;
    $comments = 'NULL';
    $recap = 'NULL';
    $description = 'NULL';
    $quantity = 0;
    $price_ttc = 0;
    $price_ht = 0;
    $buy_price = 0;
    $balise_title = 'NULL';
    $balise_description = 'NULL';
    $ref = 'NULL';
    $date = date('Y-m-j');
    $attributs = '{
        "size": "",
        "color": ""
    }';


    if(isset($_POST['product_name']) AND !empty($_POST['product_name']) ){ $name = htmlentities(addslashes($_POST['product_name'])); }
    if(isset($_POST['category']) AND !empty($_POST['category']) ){ $category = htmlentities(addslashes($_POST['category'])); }
    if(isset($_POST['comments_list']) AND !empty($_POST['comments_list']) ){ 
        $comments = new stdClass();
        foreach($_POST['comments_list'] as $key => $comment){
            $comments->$key = $comment;
        }
        $comments = json_encode($comments);
    }

    if(isset($_POST['ImageOrignal_src']) AND !empty($_POST['ImageOrignal_src']) ){
        $newImage = new stdClass();
        $images = new stdClass();

        $nb = 0;
        mkdir(('../content/uploads/shop/products/'.$_POST['ref'].'/'), 0777);
        foreach($_POST['ImageOrignal_src'] as $field){
            $arr = array();
            $imarr = array();

            $ig_src = $_POST['ImageOrignal_src'][$nb];
            $ig_iscover = $_POST['ImageOrignal_isCover'][$nb];
            $ig_legend = $_POST['ImageOrignal_alt'][$nb];
            $ig_name = $main -> newToken(5);
            

            $img = new stdClass();
            $img->legend = "".$ig_legend."";
            $img->ref = $ig_name;
            if($ig_iscover == "false"){
                $img->is_cover = false;
            }else{
                $img->is_cover = true;
            }

            array_push($arr, $img);
            $key = $nb + 1;
            $newImage->$key = $arr;
            array_push($imarr, $newImage);

            $images->images = $imarr;
            
            file_put_contents('../content/uploads/shop/products/'.$_POST['ref'].'/'.$ig_name.'.png', base64_decode(explode(',',$ig_src)[1]));
            $nb ++;
        }

        $images = json_encode($images);
    }
    // if(isset($_POST['ImageOrignal_src']) AND !empty($_POST['ImageOrignal_src']) ){
    //     $nb = 0;
    //     mkdir(('../content/uploads/shop/products/'.$_POST['ref'].'/'), 0777);

    //     $liste=array();
    //     foreach($_POST['ImageOrignal_src'] as $field){
    //         $key = $nb + 1;
    //         $reference = $main -> newToken(5);
    //         $ig_src = $_POST['ImageOrignal_src'][$nb];
    //         $ig_iscover = $_POST['ImageOrignal_isCover'][$nb];
    //         $ig_legend = $_POST['ImageOrignal_alt'][$nb];


    //         $ar = array($key=>
	// 			array(
    //                 "is_cover"=>$ig_iscover,
    //                 "legend"=>$ig_legend,
    //                 "ref"=>$reference)
    //             );
    //         array_push($liste, $ar);

    //         file_put_contents('../content/uploads/shop/products/'.$_POST['ref'].'/'.$reference.'.png', base64_decode(explode(',',$ig_src)[1]));
    //         $nb ++;
    //     }
    // }
    if(isset($_POST['recap']) AND !empty($_POST['recap']) ){ $recap = htmlentities(addslashes($_POST['recap'])); }
    if(isset($_POST['description']) AND !empty($_POST['description']) ){ $description = htmlentities(addslashes($_POST['description'])); }
    if(isset($_POST['sizes']) AND !empty($_POST['sizes']) ){ 
        $sizes = new stdClass();
        $temp = '';
        foreach($_POST['sizes'] as $key => $size){
            $temp .= '['. $size .']';
        }
        $sizes->size = $temp;
        $attributs = json_encode($sizes);
    }

    
    if(isset($_POST['quantity']) AND !empty($_POST['quantity']) ){ $quantity = $_POST['quantity']; }
    if(isset($_POST['price_ttc']) AND !empty($_POST['price_ttc']) ){ $price_ttc = $_POST['price_ttc']; }
    if(isset($_POST['price_ht']) AND !empty($_POST['price_ht']) ){ $price_ht = $_POST['price_ht']; }
    if(isset($_POST['buy_price']) AND !empty($_POST['buy_price']) ){ $buy_price = $_POST['buy_price']; }
    if(isset($_POST['balise_title']) AND !empty($_POST['balise_title']) ){ $balise_title = htmlentities(addslashes($_POST['balise_title'])); }
    if(isset($_POST['balise_description']) AND !empty($_POST['balise_description']) ){ $balise_description = htmlentities(addslashes($_POST['balise_description'])); }
    if(isset($_POST['ref']) AND !empty($_POST['ref']) ){ $ref = htmlentities(addslashes($_POST['ref'])); }
    



    $newProduct = array(
        'name' => $name,
        'category' => $category,
        'comments' => $comments,
        'images' => $images,
        'recap' => $recap,
        'description' => $description,
        'quantity' => $quantity,
        'price_ttc' => $price_ttc,
        'price_ht' => $price_ht,
        'buy_price' => $buy_price,
        'balise_title' => $balise_title,
        'balise_description' => $balise_description,
        'reference' => $ref,
        'attributs' => $attributs,
        'date' => $date
    );

    //print_r($newProduct);

    $shop -> newProduct($newProduct);
}


if(isset($_POST['deleteProduct_button'])){
    $id = $_POST['product'];
    $shop -> deleteProduct($id);
}

if(isset($_POST['renameProduct_button']) OR isset($_POST['transferProduct_button']) OR isset($_POST['editRecapProduct_button']) OR isset($_POST['editDescProduct_button']) OR isset($_POST['editQuantityProduct_button']) OR isset($_POST['editBuyPriceProduct_button']) OR isset($_POST['editPriceHTProduct_button']) OR isset($_POST['editPriceTTCProduct_button'])){
    $id = $_POST['product'];
    $type = $_POST['type'];
    $value = $_POST['value'];
    
    $shop -> updateProduct($id, $type, $value);
}



if(isset($_POST['editAttribut_button'])){
    $id = $_POST['attribut'];
    $name = $_POST['attr_name'];
    $shop -> updateAttribut($id, $name);
}


if(isset($_POST['deleteAttribut_button'])){
    $id = $_POST['attribut'];
    $shop -> deleteAttribut($id);
}
