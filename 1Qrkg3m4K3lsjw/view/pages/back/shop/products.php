<?php

    $page = 0;
    $numberPerpage = $main -> getSetting('backend_item_per_page');
    $offset = 0;

    if(isset($_GET['page'])){ $page = $_GET['page']; }
    $offset = $numberPerpage * $page;

    $Reqcount = $shop -> getAllProduct();
    $count = count($Reqcount);
    $lastIndex = floor( $count / $numberPerpage );

?>

<section class="wrapper_content">
    
    <div class="head">
        <h2>Les produits</h2>
        <div class="button_add"> <a href="?query=shop&c=products&f=add" class="btn"><i class="fas fa-plus"></i> Nouveau produit</a> </div>
    </div>


    <div class="data_content">
        <div class="wrapper_infos">
            <div class="numberElements"> <?= $count. " produits"?> </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th style="width: 50%">Nom</th>
                    <th style="width: 20%">Catégorie</th>
                    <th style="width: 5%">Quantité</th>
                    <th style="width: 5%">Prix</th>
                    <th style="width: 5%">Parent</th>
                    <th style="width: 5%">Actif</th>
                    <th style="width: 5%"></th>
                </tr>
            </thead>

            <div class="wrapper_search">
                <thead>
                    <tr>
                        <th style="width: 5%"> <div class="table_search"> <input type="number" min="1" name="search" placeholder="ID" data-type="product" data-search="id" data-param="strict"> </div></th>
                        <th style="width: 50%"> <div class="table_search"> <input type="text" name="search" placeholder="Recherche par nom" data-type="product" data-search="name" data-param="like"> </div></th>
                        <th style="width: 20%"> <div class="table_search"> <input type="number" min="1" name="search" placeholder="Recherche par catégorie" data-type="product" data-search="category" data-param="like"> </div></th>
                        <th style="width: 5%"> <div class="table_search"> <input type="number" min="0" name="search" placeholder="Quantité" data-type="product" data-search="quantity" data-param="strict"> </div></th>
                        <th style="width: 5%"> <div class="table_search"> <input type="number" min="0" name="search" placeholder="Prix" data-type="product" data-search="price_ttc" data-param="strict"> </div></th>
                        <th style="width: 5%"> <div class="table_search"> <input type="number" min="0" name="search" placeholder="Parent" data-type="product" data-search="parent" data-param="strict"> </div></th>
                        <th style="width: 5%"></th>
                        <th style="width: 5%"></th>
                    </tr>
                </thead>
            </div>
        </table>

        <div id="searchOutput">
            <table>
                <?php
                    foreach($shop -> getAllProductLimit($numberPerpage, $offset) as $r){
                        require ('views/components/pages/back/shop/data/products/vue_item.php');
                    }
                ?>
            </table>
        </div>

        <div class="paging">
            <ul>
                <li> <a href="?query=shop&c=products&page=0"> <i class="fas fa-angle-double-left"></i> </a> </li>
                <?php
                if($page > 0){
                    ?> <li> <a href="?query=shop&c=products&page=<?= $page - 1 ;?>"> <i class="fas fa-angle-left"></i> </a> </li> <?php
                }else{
                    ?> <li> <a> <i class="fas fa-times"></i> </a> </li> <?php
                }
                ?>
                <li> <a><?= $page ;?></a> </li>
                <?php
                if($page < $lastIndex){
                    ?> <li> <a href="?query=shop&c=products&page=<?= $page + 1 ;?>"> <i class="fas fa-angle-right"></i> </a> </li> <?php
                }else{
                    ?> <li> <a> <i class="fas fa-times"></i> </a> </li> <?php
                }
                ?>
                <li> <a href="?query=shop&c=products&page=<?= $lastIndex ;?>"> <i class="fas fa-angle-double-right"></i> </a> </li>
            </ul>
        </div>
    </div>

</section>
