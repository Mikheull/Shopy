<div class="container-fluid" id="header">
    <div class="row align-items-center">
        <div class="col message-news">
            <p>C'est les soldes de noël !! 80% de réductions + Livraison offerte pour tout les produits . Et bonnes fêtes a tous ! </p>
        </div>
    </div>

    <div class="row">
        <div class="head">

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-2">
                        <div class="brand">
                            <a href="<?= $correctSlug ;?>./"> <img src="<?= $correctSlug ;?>dist/images/logos/Shopy.svg" alt="Logo du Site" height="85" width="75"> </a>
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="search">
                            <form action="" method="post">
                                <input type="search" name="main_search" id="main_search" placeholder="Rechercher un produit">
                                <button name="main_search-button"><i class="fas fa-search"></i></button>
                            </form>
                            <ul id="main_search_output">
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="menu">
                            <ul>
                                <li class="menu-item"> <a class="tpy-account" title="Mon compte"><i class="far fa-user"></i></a> </li>
                                <div id="tpy-account" class="tpy-mod">
                                    <?php
                                        if($user -> isConstantUser() == true){
                                            ?>
                                            <ul>
                                                <li style="margin: 5px 0"> <a href="<?= $correctSlug ;?>account" style="color: #FFF;">Mon compte</a> </li>
                                                <div style="margin: 20px 0;width: 100%;height: 2px;background: #3f3f3f"></div>
                                                <li style="margin: 5px 0"> <a href="<?= $correctSlug ;?>help/follow_order" style="color: #FFF;">Suivre mes commande</a> </li>
                                                <li style="margin: 5px 0"> <a href="<?= $correctSlug ;?>help/how_to_make_return" style="color: #FFF;">Informations sur les retours</a> </li>
                                                <li style="margin: 5px 0"> <a href="<?= $correctSlug ;?>help" style="color: #FFF;">Obtenir de l'aide</a> </li>
                                                <div style="margin: 20px 0;width: 100%;height: 2px;background: #3f3f3f"></div>
                                                <li style="margin: 5px 0"> <a href="<?= $correctSlug ;?>auth/logout" style="color: #FFF;">Se deconnecter</a> </li>
                                            </ul>
                                            <?php
                                        }else{
                                            ?>
                                            <ul>
                                                <a href="<?= $correctSlug ;?>auth/login" style="color: #FFF">Connectez vous</a> <br>
                                                <a href="<?= $correctSlug ;?>auth/register" style="color: #FFF">Vous n'avez pas de compte ? Inscrivez vous</a>

                                                <div style="margin: 20px 0;width: 100%;height: 2px;background: #3f3f3f"></div>
                                                <li style="margin: 5px 0"> <a href="<?= $correctSlug ;?>help/follow_order" style="color: #FFF;">Suivre mes commande</a> </li>
                                                <li style="margin: 5px 0"> <a href="<?= $correctSlug ;?>help/how_to_make_return" style="color: #FFF;">Informations sur les retours</a> </li>
                                                <li style="margin: 5px 0"> <a href="<?= $correctSlug ;?>help" style="color: #FFF;">Obtenir de l'aide</a> </li>
                                            </ul>
                                            <?php
                                        }
                                    ?>
                                </div>
                                
                                <li class="menu-item" > <a class="tpy-wishlist" title="Ma liste d'envie"><i class="far fa-heart"></i></a> </li>
                                <div id="tpy-wishlist" class="tpy-mod" style="width: 40vw">
                                    <?php
                                        if($user -> isEmptyWishlist() == false){
                                            $wishlist = $user -> getWishlist();
                                            $arr = json_decode($wishlist, true);
                                            ?> 
                                            <div class="container-wishlist" style="width: 52%;max-height: 70vh;overflow: scroll;">
                                                <?php
                                                foreach($arr['products'] as $item){
                                                    $id = $item['ID'];

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
                                                        $name = $main -> add3dots(html_entity_decode($shop -> getProduct($id, 'name')), 15);

                                                        ?>
                                                        <div style="background: #2A2A2A;margin: 10px 0;border-radius: 4px;height: 100px" id="wishlist-item-<?= $id ;?>">
                                                            <div style="width: 64px;height: 64px;margin: 18px;float:left">  <img src="content/uploads/shop/<?= $path_image ;?>" alt="<?= $legend_image ;?>" style="width: 100%;height: 64px; border-radius: 6px"> </div>
                                                            <div style="float: left;margin: 18px 0 0 0">
                                                                <a href="<?= $correctSlug ;?><?= $linkProduit ;?>" style="font-size: 1em;font-weight: bold;color: #FFF"><?= $name ;?></a>
                                                                <span style="display: block;font-size: 1.1em;font-weight: bold; color: #FFF;text-align: left"><?= $shop -> getProductPrice( $shop -> getProduct($id, 'price_ttc') ) ;?>€</span>
                                                            </div>
                                                            <div style="float: right;margin: 18px 0 0 0">
                                                                <a style="margin: 5px 18px 0 0;font-size: .8em;font-weight: bold; color: #495057;float: right;cursor: pointer" class="buttonWishlistHead" data-id="<?= $id ;?>"><i class="fas fa-trash"></i></a>
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
                                                ?>
                                            </div>
                                            <?php

                                        }else{
                                            ?>
                                            <div>
                                                <p style="color: #FFF;font-size: 1em;padding: 10px 0;text-align: left">Votre liste d'envie est vide !</p>
                                            </div>
                                            <?php
                                        }
                                    ?>
                                </div>

                                <li class="menu-item"> <a href="<?= $correctSlug ;?>cart" title="Panier"><i class="fas fa-shopping-cart"></i></a> </li>

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="navigation">
                            <nav>
                                <ul>
                                <?php 
                                    foreach($shop -> getAllSuperCategory() as $category){
                                        ?> <li> <a href="<?= $correctSlug ;?>shop/categorie/<?= $category['name'] ;?>" title=""><?= $category['name'] ;?></a> </li> <?php
                                    }
                                ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>