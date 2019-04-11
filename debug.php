<?php

if(!isset($_SESSION['user'])){

    if(isset($_SESSION['tmp_user'])){
        ?> <script> $.notify(" User temporaire connecté avec : <br> <?= $_SESSION['tmp_user'] ;?> ", {type:"info", icon:"exclamation-triangle",close: true});</script> <?php
    }
    
}else{
    ?> <script> $.notify(" User connecté avec : <br> <?= $_SESSION['user'] ;?> ", {type:"info", icon:"exclamation-triangle",close: true});</script> <?php
}