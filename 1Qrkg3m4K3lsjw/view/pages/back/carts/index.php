<?php

    $page = 0;
    $numberPerpage = $main -> getSetting('backend_item_per_page');
    $offset = 0;

    if(isset($_GET['page'])){ $page = $_GET['page']; }
    $offset = $numberPerpage * $page;

    $Reqcount = $shop -> getAllCart();
    $count = count($Reqcount);
    $lastIndex = floor( $count / $numberPerpage );

?>

<section class="wrapper_content">

    <div class="head">
        <h2>Les paniers</h2>
        <!-- <div class="button_add"> <a href="?query=carts&c=add" class="btn"><i class="fas fa-plus"></i> Nouveau panier</a> </div> -->
    </div>


    <div class="data_content">
        <div class="wrapper_infos">
            <div class="numberElements"> <?= $count. " paniers"?> </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th style="width: 30%">Réference produit</th>
                    <th style="width: 30%">Réference client</th>
                    <th style="width: 25%">Date de début</th>
                    <th style="width: 5%">Actif</th>
                    <th style="width: 5%"></th>
                </tr>
            </thead>

            <div class="wrapper_search">
                <thead>
                    <tr>
                        <th style="width: 5%"> <div class="table_search"> <input type="number" min="1" name="search" placeholder="ID" data-type="cart" data-search="id" data-param="strict"> </div></th>
                        <th style="width: 30%"> <div class="table_search"> <input type="text" name="search" placeholder="Recherche par référence produit" data-type="cart" data-search="ref" data-param="like"> </div> </th>
                        <th style="width: 30%"> <div class="table_search"> <input type="text" name="search" placeholder="Recherche par référence client" data-type="cart" data-search="link_client" data-param="like"> </div> </th>
                        <th style="width: 25%"></th>
                        <th style="width: 5%"></th>
                        <th style="width: 5%"></th>
                    </tr>
                </thead>
            </div>
        </table>

        <div id="searchOutput">
            <table>
                <?php
                    foreach($shop -> getAllCartLimit($numberPerpage, $offset) as $r){
                        require ('views/components/pages/back/carts/data/vue_item.php');
                    }
                ?>
            </table>
        </div>

        <div class="paging">
            <ul>
                <li> <a href="?query=carts&page=0"> <i class="fas fa-angle-double-left"></i> </a> </li>
                <?php
                if($page > 0){
                    ?> <li> <a href="?query=carts&page=<?= $page - 1 ;?>"> <i class="fas fa-angle-left"></i> </a> </li> <?php
                }else{
                    ?> <li> <a> <i class="fas fa-times"></i> </a> </li> <?php
                }
                ?>
                <li> <a><?= $page ;?></a> </li>
                <?php
                if($page < $lastIndex){
                    ?> <li> <a href="?query=carts&page=<?= $page + 1 ;?>"> <i class="fas fa-angle-right"></i> </a> </li> <?php
                }else{
                    ?> <li> <a> <i class="fas fa-times"></i> </a> </li> <?php
                }
                ?>
                <li> <a href="?query=carts&page=<?= $lastIndex ;?>"> <i class="fas fa-angle-double-right"></i> </a> </li>
            </ul>
        </div>
    </div>

</section>
