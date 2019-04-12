<?php

/**
 * 
 * users.php
 * 
 * Création de l'objet "user"
 *   Cet objet servira pour toutes les méthodes relatives au user.
 * 
 */

 
$user = new users($db);

if(isset($_POST['add_role'])){
    if(!empty($_POST['role'])){
        $name = htmlentities(addslashes($_POST['role']));
        $user -> newRole($name);
    }
}

if(isset($_POST['add_permission'])){
    if(!empty($_POST['type']) AND !empty($_POST['permission'])){
        $type = htmlentities(addslashes($_POST['type']));
        $permission = htmlentities(addslashes($_POST['permission']));
        $user -> newPermission($type, $permission);
    }
}

if(isset($_POST['login_button'])){

    if(!empty($_POST['email']) AND !empty($_POST['password'])){
        $mail = addslashes(htmlentities($_POST['email']));
        $password = addslashes(htmlentities($_POST['password']));

        $user -> login($mail, $password);
    }

}
