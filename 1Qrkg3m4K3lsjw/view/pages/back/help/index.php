<?php

    $page = 0;
    $numberPerpage = $main -> getSetting('backend_item_per_page');
    $offset = 0;

    if(isset($_GET['page'])){ $page = $_GET['page']; }
    $offset = $numberPerpage * $page;

    $Reqcount = $help -> getHelpArticles();
    $count = count($Reqcount);
    $lastIndex = floor( $count / $numberPerpage );

?>

<section class="wrapper_content">

    <div class="head">
        <h2>Les pages d'aide</h2>
        <div class="button_add"> <a href="?query=help&c=add" class="btn"><i class="fas fa-plus"></i> Nouvelle page d'aide</a> </div>
    </div>


    <div class="data_content">
        <div class="wrapper_infos">
            <div class="numberElements"> <?= $count. " pages d'aide"?> </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th style="width: 20%">Réference article</th>
                    <th style="width: 20%">Nom</th>
                    <th style="width: 20%">Url</th>
                    <th style="width: 10%">Date d'édition</th>
                    <th style="width: 10%">Auteur</th>
                    <th style="width: 5%">Vues</th>
                    <th style="width: 5%">Actif</th>
                    <th style="width: 5%"></th>
                </tr>
            </thead>

            <div class="wrapper_search">
                <thead>
                    <tr>
                        <th style="width: 5%"> <div class="table_search"> <input type="number" min="1" name="search" placeholder="ID" data-type="help" data-search="id" data-param="strict"> </div></th>
                        <th style="width: 20%"> <div class="table_search"> <input type="text" name="search" placeholder="Recherche par référence article" data-type="help" data-search="reference" data-param="like"> </div> </th>
                        <th style="width: 20%"> <div class="table_search"> <input type="text" name="search" placeholder="Recherche par nom" data-type="help" data-search="name" data-param="like"> </div> </th>
                        <th style="width: 20%"></th>
                        <th style="width: 10%"></th>
                        <th style="width: 10%"> <div class="table_search"> <input type="number" min="1" name="search" placeholder="Auteur" data-type="help" data-search="author" data-param="strict"> </div></th>
                        <th style="width: 5%"> <div class="table_search"> <input type="number" min="1" name="search" placeholder="Vues" data-type="help" data-search="views" data-param="strict"> </div></th>
                        <th style="width: 5%"> <div class="table_search"> <input type="number" min="1" name="search" placeholder="Status" data-type="help" data-search="enable" data-param="strict"> </div></th>
                        <th style="width: 5%"></th>
                    </tr>
                </thead>
            </div>
        </table>

        <div id="searchOutput">
            <table>
                <?php
                    foreach($help -> getHelpArticlesLimit($numberPerpage, $offset) as $r){
                        require ('views/components/pages/back/help/data/vue_item.php');
                    }
                ?>
            </table>
        </div>

        <div class="paging">
            <ul>
                <li> <a href="?query=help&page=0"> <i class="fas fa-angle-double-left"></i> </a> </li>
                <?php
                if($page > 0){
                    ?> <li> <a href="?query=help&page=<?= $page - 1 ;?>"> <i class="fas fa-angle-left"></i> </a> </li> <?php
                }else{
                    ?> <li> <a> <i class="fas fa-times"></i> </a> </li> <?php
                }
                ?>
                <li> <a><?= $page ;?></a> </li>
                <?php
                if($page < $lastIndex){
                    ?> <li> <a href="?query=help&page=<?= $page + 1 ;?>"> <i class="fas fa-angle-right"></i> </a> </li> <?php
                }else{
                    ?> <li> <a> <i class="fas fa-times"></i> </a> </li> <?php
                }
                ?>
                <li> <a href="?query=help&page=<?= $lastIndex ;?>"> <i class="fas fa-angle-double-right"></i> </a> </li>
            </ul>
        </div>
    </div>

</section>
