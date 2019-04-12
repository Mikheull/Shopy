<?php

class help extends db_connect {

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
     * Les aides
     * 
     * 
     */

    /**
     * function getHelpArticle($param1, $param2)
     * 
     * Cette fonction va retourner une information d'une page d'aide donné
     * 
     * @param 1 = le HelpID
     * @param 2 = l'information a récupérer
     * @return array
     * 
     */
    function getHelpArticle($ref, $inf){

        $request = $this -> _db -> query("SELECT * FROM `help` WHERE `reference` = '$ref' ");
        foreach($request -> fetchAll() as $r){
            return $r[$inf];
        }
    }

    
    /**
     * function getHelpArticles($param1)
     * 
     * Cette fonction va retourner toute les aides
     * 
     * @param 1 = le HelpID
     * @return array
     * 
     */
    function getHelpArticles(){
        $request = $this -> _db -> query("SELECT * FROM `help`");
        return $request -> fetchAll();
        
    }


    /**
     * function getHelpArticlesLimit($param1, $param2)
     * 
     * Cette fonction renverra un tableau de toutes les pages d'aides LIMIT
     * 
     * @param 1 = la page
     * @param 2 = le nombre d'élément
     * @return array
     * 
     */
    function getHelpArticlesLimit($limit, $offset){
        $request = $this -> _db -> query("SELECT * FROM `help` LIMIT $limit OFFSET $offset ");
        return $request -> fetchAll();
    }


    /**
     * function newHelp($param1, $param2, $param3, $param4)
     * 
     * Cette fonction va créer une page d'aide
     * 
     * @param 1 = le nom
     * @param 2 = l'url
     * @param 3 = le text
     * @param 4 = l'auteur
     * @return NULL
     * 
     */
    function newHelp($name ,$url ,$text ,$author){
        $ref = $this -> newToken(5);
        $update_date = date('Y-m-j');
        $request = $this -> _db -> exec("INSERT INTO `help` (`name`, `url`, `reference`, `text`, `update_date`, `author`) VALUES ('$name', '$url', '$ref', '$text', '$update_date', '$author') ");
    }

    // ---------------------------------------------------------------------------------------------------

}