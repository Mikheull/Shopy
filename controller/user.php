<?php

/**
 * 
 * user.php
 * 
 * Création de l'objet "user"
 *   Cet objet servira pour toutes les méthodes relatives aux users coté front.
 * 
 */

 
$user = new user($db);


/**
 * Création de l'user temporaire si il n'est pas encore connecté !
 */
if($user -> isConstantUser() == false){

    if($user -> isTempUser() == false){
        $user -> newTempUser();
    }

}



/**
 * Inscription est Connexion
 */
if(isset($_POST['reg_button'])){
    
    if(!empty($_POST['reg_mail']) AND !empty($_POST['reg_pass'])){
        $mail = addslashes(htmlentities($_POST['reg_mail']));
        $password = addslashes(htmlentities($_POST['reg_pass']));

        $method = 'session';
        if(isset($_POST['cookie'])){ $method = 'cookie'; }

        $user -> newUser($mail, $password, $method);
    }
    
}


if(isset($_POST['log_button'])){

    if(!empty($_POST['log_mail']) AND !empty($_POST['log_pass'])){
        $mail = addslashes(htmlentities($_POST['log_mail']));
        $password = addslashes(htmlentities($_POST['log_pass']));

        $method = 'session';
        if(isset($_POST['cookie_login'])){ $method = 'cookie'; }

        $user -> login($mail, $password, $method);
        ?> <script> location.href="" </script> <?php
    }

}



/**
 * Account
 */
if(isset($_POST['update_user_infos'])){
    
    if(!empty($_POST['first_name']) AND !empty($_POST['name']) AND !empty($_POST['mail']) AND !empty($_POST['tel']) AND !empty($_POST['birdthay']) AND !empty($_POST['gender'])){

        $first_name = addslashes(htmlentities($_POST['first_name']));
        $name = addslashes(htmlentities($_POST['name']));
        $mail = addslashes(htmlentities($_POST['mail']));
        $tel = addslashes(htmlentities($_POST['tel']));
        $birdthay = addslashes(htmlentities($_POST['birdthay']));
        $gender = addslashes(htmlentities($_POST['gender']));

        $user -> updateSetting($first_name, $name, $mail, $tel, $birdthay, $gender);

    }
    
}