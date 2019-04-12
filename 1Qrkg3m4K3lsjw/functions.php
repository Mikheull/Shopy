<?php


/**
 * 
 * Get une configuration json
 * 
 */

function getJSONoption($param){
    $get = file_get_contents('../content/config/options.json');
    $decode = json_decode($get);
    return $decode -> {$param};
}


function getJSONmeta($param){
    $get = file_get_contents('../content/config/meta.json');
    $decode = json_decode($get);
    return $decode -> {$param};
}

?>