<?php

require('../../../database.php');
require('../../model/class/db_connect.php');
require('../../model/class/main.php');
require('../../controller/main.php');

$setting = $_POST['name'];

if($_POST['type'] == 'boolean'){
    if($main -> getSetting($setting) == true){
        $main -> switchSetting($setting, false);
    }else{
        $main -> switchSetting($setting, true);
    }
}

if($_POST['type'] == 'number' OR $_POST['type'] == 'text'){
    $value = $_POST['val'];
    $type = $_POST['type'];
    $main -> setSetting($setting, $value, $type);
}