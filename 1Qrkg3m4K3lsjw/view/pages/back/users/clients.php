<?php

    $page = 0;
    $numberPerpage = $main -> getSetting('backend_item_per_page');
    $offset = 0;

    if(isset($_GET['page'])){ $page = $_GET['page']; }
    $offset = $numberPerpage * $page;

    $Reqcount = $user -> getAllUsers();
    $count = count($Reqcount);
    $lastIndex = floor( $count / $numberPerpage );

?>

<section class="wrapper_content">

    <div class="head">
        <h2>Les utilisateurs</h2>
        <div class="button_add"> <a href="?query=users&c=clients&f=add" class="btn"><i class="fas fa-plus"></i> Nouveau client</a> </div>
    </div>


    <div class="data_content">
        <div class="wrapper_infos">
            <div class="numberElements"> <?= $count. " clients"?> </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th style="width: 10%">Nom</th>
                    <th style="width: 10%">Prenom</th>
                    <th style="width: 20%">Mail</th>
                    <th style="width: 5%">Rôle</th>
                    <th style="width: 20%">Token</th>
                    <th style="width: 10%">Inscription</th>
                    <th style="width: 10%">Dernière visite</th>
                    <th style="width: 5%">Actif</th>
                    <th style="width: 5%"></th>
                </tr>
            </thead>

            <div class="wrapper_search">
                <thead>
                    <tr>
                        <th style="width: 5%"> <div class="table_search"> <input type="number" min="1" name="search" placeholder="ID" data-type="user" data-search="id" data-param="strict"> </div> </th>
                        <th style="width: 10%"> <div class="table_search"> <input type="text" name="search" placeholder="Recherche par prenom" data-type="user" data-search="first_name" data-param="like"> </th>
                        <th style="width: 10%"> <div class="table_search"> <input type="text" name="search" placeholder="Recherche par nom" data-type="user" data-search="name" data-param="like"> </th>
                        <th style="width: 20%"> <div class="table_search"> <input type="text" name="search" placeholder="Recherche par mail" data-type="user" data-search="mail" data-param="like"> </th>
                        <th style="width: 5%"> <div class="table_search"> <input type="number" min="1" name="search" placeholder="Role" data-type="user" data-search="role" data-param="strict"> </th>
                        <th style="width: 20%"> <div class="table_search"> <input type="text" name="search" placeholder="Rechercher par Token" data-type="user" data-search="token" data-param="strict"> </th>
                        <th style="width: 10%"></th>
                        <th style="width: 10%"></th>
                        <th style="width: 5%"></th>
                        <th style="width: 5%"></th>
                    </tr>
                </thead>
            </div>
        </table>

        <div id="searchOutput">
            <table>
                <?php
                    foreach($user -> getAllUserLimit($numberPerpage, $offset) as $r){
                        require ('views/components/pages/back/users/data/user/vue_item.php');
                    }
                ?>
            </table>
        </div>

        <div class="paging">
            <ul>
                <li> <a href="?query=users&c=clients&page=0"> <i class="fas fa-angle-double-left"></i> </a> </li>
                <?php
                if($page > 0){
                    ?> <li> <a href="?query=users&c=clients&page=<?= $page - 1 ;?>"> <i class="fas fa-angle-left"></i> </a> </li> <?php
                }else{
                    ?> <li> <a> <i class="fas fa-times"></i> </a> </li> <?php
                }
                ?>
                <li> <a><?= $page ;?></a> </li>
                <?php
                if($page < $lastIndex){
                    ?> <li> <a href="?query=users&c=clients&page=<?= $page + 1 ;?>"> <i class="fas fa-angle-right"></i> </a> </li> <?php
                }else{
                    ?> <li> <a> <i class="fas fa-times"></i> </a> </li> <?php
                }
                ?>
                <li> <a href="?query=users&c=clients&page=<?= $lastIndex ;?>"> <i class="fas fa-angle-double-right"></i> </a> </li>
            </ul>
        </div>
    </div>

</section>
