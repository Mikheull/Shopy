<?php

    $page = 0;
    $numberPerpage = $main -> getSetting('backend_item_per_page');
    $offset = 0;

    if(isset($_GET['page'])){ $page = $_GET['page']; }
    $offset = $numberPerpage * $page;

    $Reqcount = $shop -> getAllAttributs();
    $count = count($Reqcount);

    $lastIndex = floor( $count / $numberPerpage );

?>

<section class="wrapper_content">
    
    <div class="head">
        <h2>Les attributs</h2>
        <div class="button_add" style="margin-left: 10px"> <a href="?query=shop&c=attributs&f=add&type=size" class="btn"><i class="fas fa-plus"></i> Nouvel taille</a> </div>
        <div class="button_add"> <a href="?query=shop&c=attributs&f=add&type=color" class="btn"><i class="fas fa-plus"></i> Nouvel Couleur</a> </div>
    </div>


    <div class="data_content">
        <div class="wrapper_infos">
            <div class="numberElements"> <?= $count. " attributs"?> </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th style="width: 15%">Type</th>
                    <th style="width: 70%">Nom</th>
                    <th style="width: 5%">Actif</th>
                    <th style="width: 5%"></th>
                </tr>
            </thead>

            <div class="wrapper_search">
                <thead>
                    <tr>
                        <th style="width: 5%"> <div class="table_search"> <input type="number" min="1" name="search" placeholder="ID" data-type="attributs" data-search="id" data-param="strict"> </div></th>
                        <th style="width: 15%"> <div class="table_search"> <input type="text" name="search" placeholder="Recherche par type" data-type="attributs" data-search="type" data-param="like"> </div></th>
                        <th style="width: 70%"> <div class="table_search"> <input type="text" name="search" placeholder="Recherche par nom" data-type="attributs" data-search="name" data-param="like"> </div></th>
                        <th style="width: 5%"></th>
                        <th style="width: 5%"></th>
                    </tr>
                </thead>
            </div>
        </table>

        <div id="searchOutput">
            <table>
                <?php
                    foreach($shop -> getAllAttributsLimit($numberPerpage, $offset) as $r){
                        require ('views/components/pages/back/shop/data/attributs/vue_item.php');
                    }
                ?>
            </table>
        </div>

        <div class="paging">
            <ul>
                <li> <a href="?query=shop&c=attributs&page=0"> <i class="fas fa-angle-double-left"></i> </a> </li>
                <?php
                if($page > 0){
                    ?> <li> <a href="?query=shop&c=attributs&page=<?= $page - 1 ;?>"> <i class="fas fa-angle-left"></i> </a> </li> <?php
                }else{
                    ?> <li> <a> <i class="fas fa-times"></i> </a> </li> <?php
                }
                ?>
                <li> <a><?= $page ;?></a> </li>
                <?php
                if($page < $lastIndex){
                    ?> <li> <a href="?query=shop&c=attributs&page=<?= $page + 1 ;?>"> <i class="fas fa-angle-right"></i> </a> </li> <?php
                }else{
                    ?> <li> <a> <i class="fas fa-times"></i> </a> </li> <?php
                }
                ?>
                <li> <a href="?query=shop&c=attributs&page=<?= $lastIndex ;?>"> <i class="fas fa-angle-double-right"></i> </a> </li>
            </ul>
        </div>
    </div>

</section>
