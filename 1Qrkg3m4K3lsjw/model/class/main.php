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
     * function newToken($param1)
     * 
     * Cette fonction génère un token avec une taille définie
     * 
     * @param 1 = la taille
     * @return var
     * 
     */
    function newToken($length){
        $token = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
        return $token;
    }
    
    // ---------------------------------------------------------------------------------------------------




    // ---------------------------------------------------------------------------------------------------
    /**
     * Fonctions settings
     * 
     */
    
    /**
     * function getSettingJson($param1)
     * 
     * Cette fonction va retourner le json d'un setting
     * 
     * @param 1 = le setting
     * @return array
     * 
     */
    function getSettingJson($setting){
        $request = $this -> _db -> query("SELECT * FROM `settings` WHERE `setting` = '$setting' ");
        $result = $request -> fetchAll();

        foreach($result as $r){
            return $r['value'];
        }
    }



    /**
     * function getSetting($param1)
     * 
     * Cette fonction va retourner le résultat d'un setting
     * 
     * @param 1 = le setting
     * @return var
     * 
     */
    function getSetting($setting){
        $result = $this -> getSettingJson($setting);

        $arr = json_decode($result);
        return $arr -> {$setting};
    }



    /**
     * function switchSetting($param1, $param2)
     * 
     * Cette fonction va activer un setting de type boolean
     * 
     * @param 1 = le setting
     * @param 2 = le boolean true-false
     * @return NULL
     * 
     */
    function switchSetting($setting, $boolean){
        $json = $this -> getSettingJson($setting);
        
        $data = json_decode($json, true);

        if($boolean == true){
            $data[$setting] = true;
        }else{
            $data[$setting] = false;
        }
        $newJson = json_encode($data);
        $exec = $this -> _db -> exec("UPDATE `settings` SET `value` = '$newJson' WHERE `setting` = '$setting'");
    }



    /**
     * function setSetting($param1, $param2, $param3)
     * 
     * Cette fonction va modifier un setting
     * 
     * @param 1 = le setting
     * @param 2 = la valeur
     * @param 3 = le type
     * @return NULL
     * 
     */
    function setSetting($setting, $value, $type){
        if($type == 'number'){ settype($value, "integer"); }
        
        $json = $this -> getSettingJson($setting);
        
        $data = json_decode($json, true);

        $data[$setting] = $value;
        
        $newJson = json_encode($data);
        $exec = $this -> _db -> exec("UPDATE `settings` SET `value` = '$newJson' WHERE `setting` = '$setting'");
    }

    // ---------------------------------------------------------------------------------------------------
}