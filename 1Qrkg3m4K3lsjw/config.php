<?php

/**
 * 
 * config.php
 * 
 * Fichier de configuration
 * 
 */


session_start();


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

$template = 'original';


require('../database.php');


function load($class){
    require "model/class/".$class.".php";
}
spl_autoload_register("load");
