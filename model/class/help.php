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

    // ---------------------------------------------------------------------------------------------------



    // ---------------------------------------------------------------------------------------------------
    /**
     * Les aides
     * 
     * 
     */

    /**
     * function getArticle($param1, $param2)
     * 
     * Cette fonction va retourner une information d'une page d'aide donné
     * 
     * @param 1 = le HelpID
     * @param 2 = l'information a récupérer
     * @return array
     * 
     */
    function getArticle($ref, $inf){
        $request = $this -> _db -> query("SELECT * FROM `help` WHERE `reference` = '$ref' ");
        foreach($request -> fetchAll() as $r){
            return $r[$inf];
        }
    }

    
    /**
     * function getArticles($param1)
     * 
     * Cette fonction va retourner toute les aides
     * 
     * @param 1 = le HelpID
     * @return array
     * 
     */
    function getArticles(){
        $request = $this -> _db -> query("SELECT * FROM `help`");
        return $request -> fetchAll();
    }

    // ---------------------------------------------------------------------------------------------------

}