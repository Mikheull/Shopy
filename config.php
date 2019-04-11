<?php

/**
 * 
 * config.php
 * 
 * Fichier de configuration incluant :
 *      - Un init des sessions
 *      - Le link au fichier de la database
 *      - La classe d'autoload des classes mvc
 * 
 */


/**
 * INIT
 */

define('_MODE_DEV', true);
define('_MODE_LOCAL', true);

if (!defined('_MODE_DEV')) {
    define('_MODE_DEV', true);
}

if (_MODE_DEV === true) {
    @ini_set('display_errors', 'on');
    @error_reporting(E_ALL | E_STRICT);
} else {
    @ini_set('display_errors', 'off');
}

define('_MODE_MAINTENANCE', false);
setlocale(LC_TIME, "fr_FR");



require ('database.php');


// Mise en cache (a activer hors local)
// function initOutputFilter() {
//     ob_start('ob_gzhandler');
//     register_shutdown_function('ob_end_flush');
//  }
//  initOutputFilter();
 

function load($class){
    require('model/class/'. $class .'.php');
}
spl_autoload_register("load");


// Création du OriginalPath
$counter = count(explode( '/', $_SERVER['QUERY_STRING']));
$correctSlug = "";
if($counter !== 0){
    for($i = 1;$i < $counter; $i ++){
        $correctSlug .= "../"; 
    }
}

