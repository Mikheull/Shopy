<?php

class shop extends db_connect {

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
     * Les produits
     * 
     * 
     */

    /**
     * function getProduct($param1, $param2)
     * 
     * Cette fonction va retourner une information d'un produit donné
     * 
     * @param 1 = le ProductID
     * @param 2 = l'information a récupérer
     * @return array
     * 
     */
    function getProduct($id, $inf){

        $request = $this -> _db -> query("SELECT * FROM `product` WHERE `ID` = '$id' ");
        foreach($request -> fetchAll() as $r){
            return $r[$inf];
        }
    }

    
    /**
     * function getProducts($param1)
     * 
     * Cette fonction va retourner les produits d'une catégorie
     * 
     * @param 1 = le CategoryID
     * @return array
     * 
     */
    function getProducts($categoryID){
        $request = $this -> _db -> query("SELECT * FROM `product` WHERE `category` = '$categoryID' ");
        return $request -> fetchAll();
        
    }

    
    /**
     * function getAllProducts()
     * 
     * Cette fonction va retourner tout les produits
     * 
     * @return array
     * 
     */
    function getAllProducts(){
        $request = $this -> _db -> query("SELECT * FROM `product`");
        return $request -> fetchAll();
        
    }

    
    /**
     * function getProductPrice($param1)
     * 
     * Cette fonction va retourner le prix d'un produit
     * 
     * @param 1 = le prix
     * @return var
     * 
     */
    function getProductPrice($price){
        $decimal_number = $this -> getSetting('decimal_number');
        $price = (float)number_format($price, $decimal_number, '.', '');
        return $price;
    }

    
    /**
     * function getProductSize($param1)
     * 
     * Cette fonction va retourner les tailles d'un produit
     * 
     * @param 1 = le ProductID
     * @return array
     * 
     */
    function getProductSize($id){
        $sizes = $this -> getProduct($id, 'attributs');

        $arr = json_decode($sizes);
        return $arr -> {'size'};
    }

    /**
     * function transformProductRefToID($param1)
     * 
     * Cette fonction transforme une ref de produit en son ID
     * 
     * @param 1 = la ref
     * @return int
     * 
     */
    function transformProductRefToID($ref){
        $request = $this -> _db -> query("SELECT * FROM `product` WHERE `reference` = '$ref' ");
        foreach($request -> fetchAll() as $r){ 
            return $r['ID']; 
        }
    }

    // ---------------------------------------------------------------------------------------------------



    // ---------------------------------------------------------------------------------------------------
    /**
     * Les Catégories
     * 
     * 
     */

    /**
     * function getCategory($param1, $param2)
     * 
     * Cette fonction va retourner une information d'une catégorie donné
     * 
     * @param 1 = le CategoryID
     * @param 2 = l'information a récupérer
     * @return array
     * 
     */
    function getCategory($id, $inf){

        $request = $this -> _db -> query("SELECT * FROM `category` WHERE `ID` = '$id' ");
        foreach($request -> fetchAll() as $r){
            return $r[$inf];
        }
    }


    /**
     * function transformCategoryNameToID($param1, $param2)
     * 
     * Cette fonction transforme un nom de catégorie en son ID
     * 
     * @param 1 = le nom
     * @param 1 = un parent potentiel
     * @return int
     * 
     */
    function transformCategoryNameToID($name, $parent){
        $request = $this -> _db -> query("SELECT * FROM `category` WHERE `name` = '$name' AND `parent` = '$parent' ");
        foreach($request -> fetchAll() as $r){ 
            return $r['ID']; 
        }
    }


    /**
     * function getViewingCategory()
     * 
     * Cette fonction va retourner l'id de la categorie actuelle d'un utilisateur
     * 
     * @return int
     * 
     */
    function getViewingCategory(){
        if(isset($_GET['shop']) AND !isset($_GET['c']) AND !isset($_GET['sc']) ){
            return $this -> transformCategoryNameToID($_GET['shop'], 'O');
        }
        
        else if(isset($_GET['shop']) AND isset($_GET['c']) AND !isset($_GET['sc']) ){
            $parent = $this -> transformCategoryNameToID($_GET['shop'], 'O');
            
            return $this -> transformCategoryNameToID($_GET['c'], $parent);
        }
        
        else{
            $pre_parent = $this -> transformCategoryNameToID($_GET['shop'], 'O');
            $parent = $this -> transformCategoryNameToID($_GET['c'], $pre_parent);

            return $this -> transformCategoryNameToID($_GET['sc'], $parent);
        }
    }

    

    /**
     * function getAllSupercategory()
     * 
     * Cette fonction renverra un tableau du contenu d'une 'Super' categorie
     * 
     * @return array
     * 
     */
    function getAllSupercategory(){
        $request = $this -> _db -> query("SELECT * FROM `category` WHERE `parent` = '0' ");
        return $request -> fetchAll();
    }


    /**
     * function getAllMainCategory()
     * 
     * Cette fonction renverra un tableau du contenu d'une 'Main' categorie
     * 
     * @return array
     * 
     */
    function getAllMainCategory($category){
        $category = $this -> transformCategoryNameToID($category, 'O');
        $request = $this -> _db -> query("SELECT * FROM `category` WHERE `parent` = '$category' ");
        return $request -> fetchAll();
    }


    /**
     * function getAllNormalCategory()
     * 
     * Cette fonction renverra un tableau du contenu d'une 'Normal' categorie
     * 
     * @return array
     * 
     */
    function getAllNormalCategory($parent){

        $request = $this -> _db -> query("SELECT * FROM `category` WHERE `parent` = '$parent' ");
        return $request -> fetchAll();
    }




    // ---------------------------------------------------------------------------------------------------


    // ---------------------------------------------------------------------------------------------------
    /**
     * Les attributs
     * 
     * 
     */

    /**
     * function getAttribut($param1, $param2)
     * 
     * Cette fonction va retourner une information d'un attribut donné
     * 
     * @param 1 = le AttributID
     * @param 2 = l'information a récupérer
     * @return array
     * 
     */
    function getAttribut($id, $inf){
        $request = $this -> _db -> query("SELECT * FROM `attributs` WHERE `ID` = '$id' ");
        if($inf !== '*'){
            foreach($request -> fetchAll() as $r){
                return $r[$inf];
            }  
        }
    }

    // ---------------------------------------------------------------------------------------------------




    // ---------------------------------------------------------------------------------------------------
    /**
     * Les panniers
     * 
     * 
     */

    /**
     * function getCart($param1, $param2)
     * 
     * Cette fonction va retourner une information d'un panier donnée
     * 
     * @param 1 = le ProductID
     * @param 2 = l'information a récupérer
     * @return array
     * 
     */
    function getCart($id, $inf){
        $request = $this -> _db -> query("SELECT * FROM `cart` WHERE `ID` = '$id' ");
        if($inf !== '*'){
            foreach($request -> fetchAll() as $r){
                return $r[$inf];
            }  
        }
    }


    /**
     * function getAllCart()
     * 
     * Cette fonction renverra un tableau de tous les paniers
     * 
     * @return array
     * 
     */
    function getAllCart(){
        $request = $this -> _db -> query("SELECT * FROM `cart` ");
        return $request -> fetchAll();
    }


    /**
     * function getAlUserlCart()
     * 
     * Cette fonction renverra un tableau de tous les paniers d'un user
     * 
     * @return array
     * 
     */
    function getAlUserlCart($user){
        $request = $this -> _db -> query("SELECT * FROM `cart` WHERE `link_client` = '$user' AND `enable` = '1' ");
        return $request -> fetchAll();
    }


    /**
     * function checkOnCart($param1, $param2)
     * 
     * Vérifier si le panier contient un produit
     * 
     * @param 1 = le UserID
     * @param 2 = la ref Produit
     * @return boolean
     * 
     */
    function checkOnCart($user, $ref){
        $Cart = $this -> getAlUserlCart($user);
        if(!empty($Cart)){
            $exp = explode(']', $Cart[0]['content']);
            foreach($exp as $e){
                $prod = str_replace("[", "", $e);
                $produit = explode(';', $prod);
    
                if($produit[0] == $ref){
                    return true;
                }
            }
        }
        
        return false;
    }


    /**
     * function newCart($param1)
     * 
     * Cette fonction créer un panier
     * @param 1 = le clientID
     * 
     * @return NULL
     * 
     */
    function newCart($client){
        $ref = '';
        $sep = '-';
        for($i = 0; $i < 5; $i++){
            if($i == 4){$sep = '';}
            $ref .= $this -> newToken(5).$sep;
        }
        
        $date = date('Y/m/j');

        $request = $this -> _db -> exec("INSERT INTO `cart` (`link_client`, `ref`, `date_begin`, `content`) VALUES ('$client', '$ref', '$date', '') ");
    }


    /**
     * function addProductCart($param1, $param2, $param3)
     * 
     * Cette fonction ajoutera un produit a un panier
     * @param 1 = le clientID
     * @param 2 = la quantitée
     * @param 3 = la reference produit
     * 
     * @return NULL
     * 
     */
    function addProductCart($client, $quantity, $prod){
        $request = $this -> _db -> query("SELECT * FROM `cart` WHERE `link_client` = '$client' AND `enable` = '1' ");
        $res = $request -> fetchAll();

        foreach($res as $result){
            $produits = $result['content'];
        }

        $produits .= '['.$prod.';'.$quantity.']';

        $exec = $this -> _db -> exec("UPDATE `cart` SET `content` = '$produits' WHERE `link_client` = '$client' AND `enable` = '1' ");
    }


    /**
     * function removeProductCart($param1, $param2)
     * 
     * Cette fonction ajoutera un produit a un panier
     * @param 1 = le clientID
     * @param 2 = la reference produit
     * 
     * @return NULL
     * 
     */
    function removeProductCart($client, $reference){
        $request = $this -> _db -> query("SELECT * FROM `cart` WHERE `link_client` = '$client' AND `enable` = '1' ");
        $res = $request -> fetchAll();

        foreach($res as $result){
            $produits = $result['content'];
        }

        $exp = explode(']', $produits);
        array_pop($exp);
        $final = '';
        foreach($exp as $e){
            $prod = str_replace("[", "", $e);
            $produit = explode(';', $prod);

            if($produit[0] !== $reference){
                $final .= '['.$produit[0].';'.$produit[1].']';
            }
        }

        $exec = $this -> _db -> exec("UPDATE `cart` SET `content` = '$final' WHERE `link_client` = '$client' AND `enable` = '1' ");
    }


    /**
     * function removeCartQuant($param1, $param2)
     * 
     * Cette fonction retirera une quantité de 1 d'un produit panier
     * @param 1 = le clientID
     * @param 1 = la reference produit
     * 
     * @return NULL
     * 
     */
    function removeCartQuant($client, $reference){
        $request = $this -> _db -> query("SELECT * FROM `cart` WHERE `link_client` = '$client' AND `enable` = '1' ");
        $res = $request -> fetchAll();

        foreach($res as $result){
            $produits = $result['content'];
        }

        $exp = explode(']', $produits);
        array_pop($exp);
        $final = '';
        foreach($exp as $e){
            $prod = str_replace("[", "", $e);
            $produit = explode(';', $prod);

            if($produit[0] == $reference){
                if($produit[1] == '1'){
                    $this -> removeProductCart($client, $reference);
                    return false;
                }
                $in = $produit[1];
                $in --;
                $change = '['.$produit[0].';'.$in.']';
                $final .= $change;
            }else{
                $final .= '['.$produit[0].';'.$produit[1].']';
            }
        }

        $exec = $this -> _db -> exec("UPDATE `cart` SET `content` = '$final' WHERE `link_client` = '$client' AND `enable` = '1' ");
    }

     /**
     * function addCartQuant($param1, $param2)
     * 
     * Cette fonction ajoutera une quantité de 1 d'un produit panier
     * @param 1 = le clientID
     * @param 1 = la reference produit
     * 
     * @return NULL
     * 
     */
    function addCartQuant($client, $reference){
        $request = $this -> _db -> query("SELECT * FROM `cart` WHERE `link_client` = '$client' AND `enable` = '1' ");
        $res = $request -> fetchAll();

        foreach($res as $result){
            $produits = $result['content'];
        }

        $exp = explode(']', $produits);
        array_pop($exp);
        $final = '';
        foreach($exp as $e){
            $prod = str_replace("[", "", $e);
            $produit = explode(';', $prod);

            if($produit[0] == $reference){
                $in = $produit[1];
                $in ++;
                $change = '['.$produit[0].';'.$in.']';
                $final .= $change;
            }else{
                $final .= '['.$produit[0].';'.$produit[1].']';
            }
        }

        $exec = $this -> _db -> exec("UPDATE `cart` SET `content` = '$final' WHERE `link_client` = '$client' AND `enable` = '1' ");
    }



    
    // ---------------------------------------------------------------------------------------------------



    // ---------------------------------------------------------------------------------------------------
    /**
     * Les commandes
     * 
     * 
     */

    /**
     * function getOrder($param1, $param2)
     * 
     * Cette fonction va retourner une information d'une commande donnée
     * 
     * @param 1 = le ProductID
     * @param 2 = l'information a récupérer
     * @return array
     * 
     */
    function getOrder($id, $inf){
        $request = $this -> _db -> query("SELECT * FROM `order` WHERE `ID` = '$id' ");
        if($inf !== '*'){
            foreach($request -> fetchAll() as $r){
                return $r[$inf];
            }  
        }
    }


    /**
     * function getAllOrder()
     * 
     * Cette fonction renverra un tableau de toutes les commandes
     * 
     * @return array
     * 
     */
    function getAllOrder(){
        $request = $this -> _db -> query("SELECT * FROM `order` ");
        return $request -> fetchAll();
    }

    /**
     * function getAlUserOrder()
     * 
     * Cette fonction renverra un tableau de toutes les commandes d'un user
     * 
     * @return array
     * 
     */
    function getAlUserOrder($user){
        $request = $this -> _db -> query("SELECT * FROM `order` WHERE `link_client` = '$user'");
        return $request -> fetchAll();
    }

    // ---------------------------------------------------------------------------------------------------


}