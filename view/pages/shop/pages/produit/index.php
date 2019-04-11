<?php
    $id = $shop -> transformProductRefToID($productref);
?>

<header class="top_header">
    <?php require ('view/components/header.php'); ?>
</header>


    <section class="body">
        
        <div class="container product">
            <div class="row images"> 

                <div class="col-md-6">
                    <div class="previewImage"><img data-enlargable style="cursor: zoom-in"  src="" alt="défaut"/> </div>
                    <div class="container minListImages">
                        <div class="row">
                            <?php
                            $obj = json_decode( $shop -> getProduct($id, 'images'), true);

                            $path_image = "NULL/no_image_available.jpeg";
                            $legend_image = "Pas d'image disponible pour ce produit";
                
                            if($shop -> getProduct($id, 'images') !== '{}'){
                                for($i = 1; $i < sizeof($obj['images'][0]) + 1; $i++){
                                    $path = $obj['images'][0][$i][0];
                                    
                                    $path_image = "products/".$shop -> getProduct($id, 'reference')."/".$path['ref'].".png";
                                    $legend_image = $path['legend'];
                                    if($path['is_cover'] == true){
                                        ?> <div class="col-md-2 col-4"> <img src="<?= $correctSlug ;?>dist/uploads/<?= $path_image ;?>" alt="<?= $legend_image ;?>" class="coverImage minImage active"> </div> <?php
                                    }else{
                                        ?> <div class="col-md-2 col-4"> <img src="<?= $correctSlug ;?>dist/uploads/<?= $path_image ;?>" alt="<?= $legend_image ;?>" class="minImage"> </div> <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>



                <div class="col-md-6 infos"> 
                    <div class="heading">
                        <h2><?= $shop -> getProduct($id, 'name') ;?></h2>
                        <div class="price">
                            <h3><?= $shop -> getProductPrice( $shop -> getProduct($id, 'price_ttc')) ;?>€</h3>
                        </div>
                    </div>

                    <div class="note">
                        <p>Avis</p>
                        <div class="content">
                            <ul>
                                <li> <i class="fas fa-star"></i> </li>
                                <li> <i class="fas fa-star"></i> </li>
                                <li> <i class="fas fa-star"></i> </li>
                                <li> <i class="fas fa-star"></i> </li>
                                <li> <i class="far fa-star"></i> </li>
                            </ul>
                            <span class="score">4</span>
                            <span class="votes">(32)</span>
                        </div>
                    </div>

                    <div class="size">
                        <p>Tailles</p>
                        <div class="content">
                            <ul>
                                <?php
                                    $attributs = $shop -> getProductSize($id);
                                    $exp = explode(']', $attributs);
                                    array_pop($exp);
                                    foreach($exp as $attr){
                                        $attrID = str_replace("[", "", $attr);

                                        ?> <li><?= $shop -> getAttribut($attrID, 'name') ;?></li> <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>

                    <div id="button_cart" class="buttoncart">
                        <?php
                        if($main -> getSetting('order_empty_stock') == true){
                            if($shop -> checkOnCart($user -> getToken() ,$shop -> getProduct($id, 'reference') ) == true){
                                ?>
                                <div class="button">
                                    <a href="<?= $correctSlug ;?>cart">Aller au panier</a>
                                </div>
                                <?php
                            }else{
                                ?>
                                <div class="button addToCart">
                                    <span hidden><?= $shop -> getProduct($id, 'reference') ;?></span>
                                    <a>Acheter maintenant</a>
                                </div>
                                <?php
                            }
                        }else{
                            if($shop -> getProduct($id, 'quantity') == 0){
                                if($shop -> checkOnCart($user -> getToken() ,$shop -> getProduct($id, 'reference') ) == true){
                                    ?>
                                    <div class="button">
                                        <a href="<?= $correctSlug ;?>cart">Aller au panier</a>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <div class="button">
                                        <a>Rupture de stock</a>
                                    </div>
                                    <?php
                                }
                            }else{
                                if($shop -> checkOnCart($user -> getToken() ,$shop -> getProduct($id, 'reference') ) == true){
                                    ?>
                                    <div class="button">
                                        <a href="<?= $correctSlug ;?>cart">Aller au panier</a>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <div class="button addToCart">
                                        <span hidden><?= $shop -> getProduct($id, 'reference') ;?></span>
                                        <a>Acheter maintenant</a>
                                    </div>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>


                </div>
            </div>
        </div>

    </section>


<footer>
    <?php require ('view/components/footer.php'); ?>
</footer>
