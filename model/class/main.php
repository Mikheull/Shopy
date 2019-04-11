<?php

class main extends db_connect {

    function __construct($connect){
        parent::__construct($connect);
    }


    // ---------------------------------------------------------------------------------------------------
    /**
     * Fonctions autres
     * 
     */

    /**
     * function getSetting($param1)
     * 
     * Cette fonction va retourner le résultat d'un setting
     * 
     * @param 1 = le setting
     * @return var
     * 
     */
    function getSetting($var){
        $request = $this -> _db -> query("SELECT * FROM `settings` WHERE `setting` = '$var' ");
        $result = $request -> fetchAll();
        foreach($result as $r){
            $array = $r['value'];
        }

        $arr = json_decode($array);
        return $arr -> {$var};
    }


    /**
     * function add3dots($param1, $param2)
     * 
     * Cette fonction va couper une chaine de caractère a un certain nombre
     * 
     * @param 1 = la chaine de caractere
     * @param 1 = la longueur
     * @return var
     * 
     */
    function add3dots($string, $limit){
        if(strlen($string) > $limit) {
            return substr($string, 0, $limit) .'...'; 
        }else{
            return $string;
        }
    }

    // ---------------------------------------------------------------------------------------------------




}