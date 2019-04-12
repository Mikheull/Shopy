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
     * function search($param1, $param2, $param3, $param4)
     * 
     * Cette fonction va retourner une information d'un produit donné
     * 
     * @param 1 = le type de recherche (category, product ...)
     * @param 2 = la recherche (id, name ...)
     * @param 3 = le keyword
     * @param 4 = le mode de recherche (strict, like)
     * @return array
     * 
     */
    function search($type, $query, $keyword, $param){
        if($param == 'strict'){
            $request = $this -> _db -> query("SELECT * FROM `$type` WHERE `$query` = '$keyword' ");
        }else{
            $request = $this -> _db -> query("SELECT * FROM `$type` WHERE `$query` LIKE '%$keyword%' ");
        }
        return $request -> fetchAll();
    }
    
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
        if($inf !== '*'){
            foreach($request -> fetchAll() as $r){
                return $r[$inf];
            }  
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
     * function getAllProduct()
     * 
     * Cette fonction renverra un tableau de tous les produits
     * 
     * @return array
     * 
     */
    function getAllProduct(){
        $request = $this -> _db -> query("SELECT * FROM `product` ");
        return $request -> fetchAll();
    }


    /**
     * function getAllProductLimit($param1, $param2)
     * 
     * Cette fonction renverra un tableau de toutes les produits LIMIT
     * 
     * @param 1 = la page
     * @param 2 = le nombre d'élément
     * @return array
     * 
     */
    function getAllProductLimit($limit, $offset){
        $request = $this -> _db -> query("SELECT * FROM `product` LIMIT $limit OFFSET $offset ");
        return $request -> fetchAll();
    }

    /**
     * function newProduct($param1, $param2)
     * 
     * Cette fonction créer un produit
     * @param 1 = le nom
     * @param 2 = le ParentID
     * 
     * @return NULL
     * 
     */
    function newProduct($array){
        $name = $array['name'];
        $category = $array['category'];
        //$parent = $array['parent'];
        $reference = $array['reference'];
        $comments = $array['comments'];
        $recap = $array['recap'];
        $description = $array['description'];
        $images = $array['images'];
        $quantity = $array['quantity'];
        $price_ttc = $array['price_ttc'];
        $price_ht = $array['price_ht'];
        $buy_price = $array['buy_price'];
        $balise_title = $array['balise_title'];
        $balise_desc = $array['balise_description'];
        $date = $array['date'];
        $attributs = $array['attributs'];
        //$need_roles = $array['need_roles'];
        //$need_permission = $array['need_permission'];
        $enable = false;
        if($this -> getSetting('product_enable-create') == true){ $enable = true; }
        settype($enable, "boolean");
        
        $request = $this -> _db -> exec("INSERT INTO `product` (`name`, `category`, `reference`, `comments`, `images`, `recap`, `description`, `quantity`, `buy_price`, `price_ttc`, `price_ht`, `balise_title`, `balise_desc`, `date`, `attributs`) VALUES ('$name', '$category', '$reference', '$comments', '$images', '$recap', '$description', '$quantity', '$buy_price', '$price_ttc', '$price_ht', '$balise_title', '$balise_desc', '$date', '$attributs') ");
    }
    
    /**
     * function deleteProduct($param1)
     * 
     * Cette fonction supprimera un produit
     * @param 1 = le ProductID
     * 
     * @return NULL
     * 
     */
    function deleteProduct($id){
        $request = $this -> _db -> exec("DELETE FROM `product` WHERE `ID` = '$id'");
    }
    
    /**
     * function updateProduct($param1, $param2, $param3)
     * 
     * Cette fonction va mettre a jour un produit
     * @param 1 = le ProductID
     * @param 2 = la clé
     * @param 3 = la valeur
     * 
     * @return NULL
     * 
     */
    function updateProduct($id, $key, $value){
        $exec = $this -> _db -> exec("UPDATE `product` SET `$key` = '$value' WHERE `ID` = '$id'");
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
        if($inf !== '*'){
            foreach($request -> fetchAll() as $r){
                return $r[$inf];
            }  
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
     * function getAllSuperCategory()
     * 
     * Cette fonction renverra un tableau du contenu d'une 'Super' categorie
     * 
     * @return array
     * 
     */
    function getAllSuperCategory(){
        $request = $this -> _db -> query("SELECT * FROM `category` WHERE `parent` = '0' ");
        return $request -> fetchAll();
    }


    /**
     * function getAllMainCategory($param1)
     * 
     * Cette fonction renverra un tableau du contenu d'une 'Main' categorie
     * 
     * @param 1 = le nom
     * @return array
     * 
     */
    function getAllMainCategory1($name){
        $request = $this -> _db -> query("SELECT * FROM `category` WHERE `name` = '$name' ");
        foreach($request -> fetchAll() as $r){ $category = $r['ID']; }

        $request = $this -> _db -> query("SELECT * FROM `category` WHERE `parent` = '$category' ");
        return $request -> fetchAll();
    }

    function getAllMainCategory($parent){
        $request = $this -> _db -> query("SELECT * FROM `category` WHERE `parent` = '$parent' ");
        return $request -> fetchAll();
    }


    /**
     * function getAllNormalCategory($param1)
     * 
     * Cette fonction renverra un tableau du contenu d'une 'Normal' categorie
     * 
     * @param 1 = le parentID
     * @return array
     * 
     */
    function getAllNormalCategory($parent){
        $request = $this -> _db -> query("SELECT * FROM `category` WHERE `parent` = '$parent' ");
        return $request -> fetchAll();
    }


    /**
     * function getAllCategory()
     * 
     * Cette fonction renverra un tableau de toutes les categories
     * 
     * @return array
     * 
     */
    function getAllCategory(){
        $request = $this -> _db -> query("SELECT * FROM `category` ");
        return $request -> fetchAll();
    }


    /**
     * function getAllCategoryLimit($param1, $param2)
     * 
     * Cette fonction renverra un tableau de toutes les categories LIMIT
     * 
     * @param 1 = la page
     * @param 2 = le nombre d'élément
     * @return array
     * 
     */
    function getAllCategoryLimit($limit, $offset){
        $request = $this -> _db -> query("SELECT * FROM `category` LIMIT $limit OFFSET $offset ");
        return $request -> fetchAll();
    }

    
    /**
     * function getCategoryType($param1)
     * 
     * Cette fonction retournera le type d'une catégorie (super, main ou normal)
     * 
     * @param 1 = le categoryID
     * @return var
     * 
     */
    function getCategoryType($id){
        foreach($this -> getAllSuperCategory() as $s){
            if($s['ID'] == $id){
                return 'super';
            }
        }

        foreach($this -> getAllSuperCategory() as $st){
            $sid = $st['ID'];

            $request = $this -> _db -> query("SELECT * FROM `category` WHERE `ID` = '$id' AND `parent` = '$sid' ");
            $count = $request -> rowCount();
            if($count == 1){ return 'main'; }
        }

        return 'normal';
    }
    


    /**
     * function newCategory($param1, $param2)
     * 
     * Cette fonction créer une catégorie avec un parent optionel
     * @param 1 = le nom
     * @param 2 = le ParentID
     * 
     * @return NULL
     * 
     */
    function newCategory($name, $parentID){
        $request = $this -> _db -> exec("INSERT INTO `category` (`name`, `parent`) VALUES ('$name', '$parentID') ");
    }
    


    /**
     * function deleteCategory($param1)
     * 
     * Cette fonction supprimera une catégorie
     * @param 1 = le CategoryID
     * 
     * @return NULL
     * 
     */
    function deleteCategory($id){
        $request = $this -> _db -> exec("DELETE FROM `category` WHERE `ID` = '$id'");
    }
    


    /**
     * function renameCategory($param1, $param2)
     * 
     * Cette fonction renommera une catégorie
     * @param 1 = le CategoryID
     * @param 2 = la valeur du nouveau nom
     * 
     * @return NULL
     * 
     */
    function renameCategory($id, $value){
        $exec = $this -> _db -> exec("UPDATE `category` SET `name` = '$value' WHERE `ID` = '$id'");
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


    /**
     * function getAllAttributs()
     * 
     * Cette fonction renverra un tableau de tous les attributs
     * 
     * @return array
     * 
     */
    function getAllAttributs(){
        $request = $this -> _db -> query("SELECT * FROM `attributs` ");
        return $request -> fetchAll();
    }


    /**
     * function getAllAttributsLimit($param1, $param2)
     * 
     * Cette fonction renverra un tableau de toutes les attributs LIMIT
     * 
     * @param 1 = la page
     * @param 2 = le nombre d'élément
     * @return array
     * 
     */
    function getAllAttributsLimit($limit, $offset){
        $request = $this -> _db -> query("SELECT * FROM `attributs` LIMIT $limit OFFSET $offset ");
        return $request -> fetchAll();
    }


    /**
     * function newAttribut($param1, $param2, $param3)
     * 
     * Cette fonction créer un attributs avec un paramètre optionel
     * @param 1 = le nom
     * @param 2 = le type d'attributs
     * @param 3 = le paramètre optionel
     * 
     * @return NULL
     * 
     */
    function newAttribut($name, $type, $param){
        $request = $this -> _db -> exec("INSERT INTO `attributs` (`type`, `name`, `options`) VALUES ('$type', '$name', '{}') ");
    }


    /**
     * function updateAttribut($param1, $param2)
     * 
     * Cette fonction va mettre a jour un attribut
     * @param 1 = le AttributID
     * @param 2 = la valeur
     * 
     * @return NULL
     * 
     */
    function updateAttribut($id, $value){
        $exec = $this -> _db -> exec("UPDATE `attributs` SET `name` = '$value' WHERE `ID` = '$id'");
    }
    
    
    /**
     * function deleteAttribut($param1)
     * 
     * Cette fonction supprimera un attribut
     * @param 1 = le AttributID
     * 
     * @return NULL
     * 
     */
    function deleteAttribut($id){
        $request = $this -> _db -> exec("DELETE FROM `attributs` WHERE `ID` = '$id'");
    }
    // ---------------------------------------------------------------------------------------------------




    // ---------------------------------------------------------------------------------------------------
    /**
     * Les paniers
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
     * function getAllCartLimit($param1, $param2)
     * 
     * Cette fonction renverra un tableau de toutes les paniers LIMIT
     * 
     * @param 1 = la page
     * @param 2 = le nombre d'élément
     * @return array
     * 
     */
    function getAllCartLimit($limit, $offset){
        $request = $this -> _db -> query("SELECT * FROM `cart` LIMIT $limit OFFSET $offset ");
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
     * function newCart($param1, $param2)
     * 
     * Cette fonction créer un produit
     * @param 1 = le nom
     * @param 2 = le ParentID
     * 
     * @return NULL
     * 
     */
    function newCart($array){

    }
    
    /**
     * function deleteCart($param1)
     * 
     * Cette fonction supprimera un produit
     * @param 1 = le ProductID
     * 
     * @return NULL
     * 
     */
    function deleteCart($id){
        $request = $this -> _db -> exec("DELETE FROM `cart` WHERE `ID` = '$id'");
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
     * function getAllOrderLimit($param1, $param2)
     * 
     * Cette fonction renverra un tableau de toutes les commandes LIMIT
     * 
     * @param 1 = la page
     * @param 2 = le nombre d'élément
     * @return array
     * 
     */
    function getAllOrderLimit($limit, $offset){
        $request = $this -> _db -> query("SELECT * FROM `order` LIMIT $limit OFFSET $offset ");
        return $request -> fetchAll();
    }

    /**
     * function newOrder($param1, $param2)
     * 
     * Cette fonction créer une commande
     * @param 1 = le nom
     * @param 2 = le ParentID
     * 
     * @return NULL
     * 
     */
    function newOrder($array){

    }
    
    /**
     * function deleteOrder($param1)
     * 
     * Cette fonction supprimera une commande
     * @param 1 = le ProductID
     * 
     * @return NULL
     * 
     */
    function deleteOrder($id){
        $request = $this -> _db -> exec("DELETE FROM `order` WHERE `ID` = '$id'");
    }

    // ---------------------------------------------------------------------------------------------------


}