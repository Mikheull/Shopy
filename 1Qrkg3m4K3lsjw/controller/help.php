<?php

/**
 * 
 * help.php
 * 
 * Création de l'objet "help"
 *   Cet objet servira pour toutes les méthodes aides
 * 
 */

 
$help = new help($db);


if(isset($_POST['add_help'])){
    $name = htmlentities(addslashes($_POST['name']));
    $url = htmlentities(addslashes($_POST['url']));
    $text = htmlentities(addslashes($_POST['text']));
    $author = $_SESSION['user'];

    $help -> newHelp($name, $url, $text, $author);
}
