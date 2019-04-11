<?php

class user extends db_connect {

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
        $token = substr(str_shuffle(str_repeat($x='0123456789&.?!,@-$*=+_abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
        return $token;
    }


    /**
     * function getToken()
     * 
     * Cette fonction retourne le token de l'utilisateur
     * 
     * @return var
     * 
     */
    function getToken(){
        if($this -> isConstantUser() == true){
            return $_SESSION['user'];
        }else{
            return $_SESSION['tmp_user'];
        }
    }

    /**
     * function getTable()
     * 
     * Cette fonction retourne la table de l'user
     * 
     * @return var
     * 
     */
    function getTable(){
        if($this -> isConstantUser() == true){
            return 'user';
        }else{
            return 'tmp_user';
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
    function getSetting($var){
        $request = $this -> _db -> query("SELECT * FROM `settings` WHERE `setting` = '$var' ");
        $result = $request -> fetchAll();
        foreach($result as $r){
            $array = $r['value'];
        }

        $arr = json_decode($array);
        return $arr -> {$var};
    }
    // ---------------------------------------------------------------------------------------------------



    // ---------------------------------------------------------------------------------------------------
    /**
     * Système de permissions
     * 
     * Un système de permissions est mis en place pour créer des accès restreint.
     * Les permissions peuvent soit etre données aux roles des users, soit a un 
     * user précisément.
     */



    /**
     * function hasPermission($param1, $param2)
     * 
     * Cette fonction va vérifier qu'un user possède une permission (grace a son role)
     * 
     * @param 1 = le UserID
     * @param 2 = la permission
     * @return boolean
     * 
     */
    function hasPermission($permission){
        $role = $this -> getUser('role') ;
        if (strpos($this -> getRolePermissions($role), "'*'") !== false) { 
            return true; 
        }

        if (strpos($this -> getRolePermissions($role), "'".$permission."'") !== false) {
            return true;
        }
        return false;
    }


    /**
     * function hasPermissions($param1, $param2)
     * 
     * Cette fonction fait la même chose que celle dessus, mais peut vérifier plusieurs
     * permissions en même temps (séparée par un ;)
     * 
     * @param 1 = le UserID
     * @param 2 = les permissions
     * @return boolean
     * 
     */
    function hasPermissions($permissions){
        $role = $this -> getUser('role') ;
        if (strpos($this -> getRolePermissions($role), "'*'") !== false) {
            return true;
        }
        
        $exp = explode(';', $permissions);
        foreach($exp as $e){
            if (strpos($this -> getRolePermissions($role), "'".$e."'") !== false) { 
                $v = true;
            }else{ $v = false; }

            if($v == false){ return false; }
        }
        return true;
    }
    // ---------------------------------------------------------------------------------------------------



    // ---------------------------------------------------------------------------------------------------
    /**
     * Système de roles
     * 
     * Les roles sont des groupes séparant les différents utilisateurs
     * (admin, user, moderateur ...)
     */



    /**
     * function getRole($param1)
     * 
     * Cette fonction va retourner un tableau du résultat de la recherche (trou
     *  un role selon son ID)
     * 
     * @param 1 = le RoleID
     * @return array
     * 
     */
    function getRole($role){
        $request = $this -> _db -> query("SELECT * FROM `roles` WHERE `ID` = '$role' ");
        return $request -> fetchAll();
    }


    /**
     * function getRolePermissions($param1)
     * 
     * Cette fonction va retourner les permissions d'un role selon son RoleID
     * 
     * @param 1 = le RoleID
     * @return array
     * 
     */
    function getRolePermissions($role){
        foreach($this -> getRole($role) as $role){
            return $role['permissions'];
        }
    }
    // ---------------------------------------------------------------------------------------------------



    // ---------------------------------------------------------------------------------------------------
    /**
     * Système de gestion des Users
     * 
     * Les users sont les utilisateurs, ils peuvent etre constant ou temporaire
     * Quand un user temporaire se connecte sur son compte constant, ses données sont
     * transférées sur le nouveau compte
     */



    /**
     * function getUser($param1)
     * 
     * Cette fonction va retourner une information de l'utilisateur actuel
     * 
     * @param 1 = l'information a récupérer
     * @return string
     * 
     */
    function getUser($inf){
        $token = $this -> getToken();
        $table = $this -> getTable();

        $request = $this -> _db -> query("SELECT * FROM `$table` WHERE `token` = '$token' ");
        foreach($request -> fetchAll() as $r){
            return $r[$inf];
        }
    }



    /**
     * function getCustUser($param1, $param2)
     * 
     * Cette fonction va retourner une information de l'utilisateur donné
     * 
     * @param 1 = le UserID
     * @param 2 = l'information a récupérer
     * @return string
     * 
     */
    function getCustUser($id, $inf){
        $request = $this -> _db -> query("SELECT * FROM `user` WHERE `ID` = '$id' ");
        foreach($request -> fetchAll() as $r){
            return $r[$inf];
        }
    }



    /**
     * function getCustUserConnect($param1, $param2)
     * 
     * Cette fonction va retourner une information de l'utilisateur donné connecté
     * 
     * @param 1 = le token
     * @param 2 = l'information a récupérer
     * @return string
     * 
     */
    function getCustUserConnect($token, $inf){
        $request = $this -> _db -> query("SELECT * FROM `user` WHERE `token` = '$token' ");
        foreach($request -> fetchAll() as $r){
            return $r[$inf];
        }
    }


    /**
     * function getSpeUser($param1, $param2)
     * 
     * Cette fonction va retourner une information de l'utilisateur donné
     * 
     * @param 1 = le token
     * @param 2 = l'information a récupérer
     * @return array
     * 
     */
    function getTempUser($token, $inf){

        $request = $this -> _db -> query("SELECT * FROM `tmp_user` WHERE `token` = '$token' ");
        foreach($request -> fetchAll() as $r){
            return $r[$inf];
        }
    }


    /**
     * function isConstantUser()
     * 
     * Cette fonction va indiquer si l'user est constant ou non
     * 
     * @return boolean
     * 
     */
    function isConstantUser(){
        if(isset($_COOKIE['user'])){
            $_SESSION['user'] = $_COOKIE['user'];
        }
        if(isset($_SESSION['user'])){
            return true;
        }
        return false;
    }


    /**
     * function isTempUser()
     * 
     * Cette fonction va indiquer si l'user est temporaire ou non
     * 
     * @return boolean
     * 
     */
    function isTempUser(){
        if(isset($_COOKIE['tmp_user'])){
            $_SESSION['tmp_user'] = $_COOKIE['tmp_user'];
        }
        if(isset($_SESSION['tmp_user'])){
            return true;
        }
        return false;
    }


    /**
     * function newTempUser()
     * 
     * Cette fonction crée un user temporaire pour les users non-connectés (créer en session + cookies)
     * 
     * @return NULL
     * 
     */
    function newTempUser(){
        $token = $this -> newToken(25);
        $liveCookie = $this -> getSetting('front_office-timeLife');

        $execute = $this -> _db -> exec("INSERT INTO `tmp_user` (`token`, `wish_list`) VALUES ('$token', '{\"products\":[]}') ");

        $_SESSION['tmp_user'] = $token;
        setcookie('tmp_user', $token, time() + 365*24*3600) ;
    }
    

    /**
     * function newUser($param1, $param2, $param3)
     * 
     * Cette fonction crée un user constant
     * @param 1 = le mail
     * @param 2 = le password
     * @param 3 = la méthode de sauvegarde
     * 
     * @return NULL
     * 
     */
    function newUser($mail, $password, $method){
        $token = $this -> newToken(25);
        $date = date('j/n/Y H:i:s');
        $wishlist = '{"products":[]}';
        $request = $this -> _db -> exec("INSERT INTO `user` (`mail`, `password`, `token`, `date_inscription`, `date_last-visit`, `wish_list`) VALUES ('$mail', '$password', '$token', '$date', '$date', '$wishlist') ");
        
        $_SESSION['user'] = $token;
        if($method == 'cookie'){
            setcookie('user', $token, time() + 365*24*3600) ;
        }

        $old_token = $_SESSION['tmp_user'];
        $this -> moveUserData($old_token, $token);
    }
    

    /**
     * function moveUserData($param1, $param2)
     * 
     * Cette fonction déplacera les données d'un user temporaire vers un user constant
     * @param 1 = ancien token
     * @param 2 = nouveau token
     * 
     * @return NULL
     * 
     */
    function moveUserData($oldToken, $token){

        // WishList
        $wishlist = $this -> getTempUser($oldToken, 'wish_list');
        $arr = json_decode($wishlist, true);

        foreach($arr['products'] as $a){
            if($this -> checkOnWishlist($a['ID']) == false){
                $this -> addToWishlist($a['ID']);
            }
        }


        // Cart
        $request = $this -> _db -> query("SELECT * FROM `cart` WHERE `link_client` = '$token' AND `enable` = '1' ");
        $cart = $request -> fetchAll();

        $request = $this -> _db -> query("SELECT * FROM `cart` WHERE `link_client` = '$oldToken' AND `enable` = '1' ");
        $oldCart = $request -> fetchAll();
  
        if(empty($cart)){
            // On crée
            $ref = '';
            $sep = '-';
            for($i = 0; $i < 5; $i++){
                if($i == 4){$sep = '';}
                $ref .= $this -> newToken(5).$sep;
            }
            $date = date('Y/m/j');
            $request = $this -> _db -> exec("INSERT INTO `cart` (`link_client`, `ref`, `date_begin`, `content`) VALUES ('$token', '$ref', '$date', '') ");  
        }

        // On déplace
        foreach($cart as $result){ $produits = $result['content']; }
        foreach($oldCart as $result){ $oldProduits = $result['content']; }

        $exp = explode(']', $produits);
        array_pop($exp);

        foreach($exp as $e){
            $prod = str_replace("[", "", $e);
            if(strpos($oldProduits, '['.$e.']') == false){
                $oldProduits .= '['.$prod.';'.$quantity.']';
            }
        }
        $produits = $oldProduits;

        $exec = $this -> _db -> exec("UPDATE `cart` SET `content` = '$produits' WHERE `link_client` = '$token' AND `enable` = '1' ");

        unset($_SESSION['tmp_user']);
        $disable = $this -> _db -> exec("UPDATE `tmp_user` SET `enable` = '0' WHERE `token` = '$oldToken'");
        $disable = $this -> _db -> exec("UPDATE `cart` SET `enable` = '0' WHERE `link_client` = '$oldToken'");
    }


    /**
     * function login($param1, $param2, $param3)
     * 
     * Cette fonction sert pour connecter un user
     * @param 1 = mail
     * @param 2 = password
     * @param 2 = method
     * 
     * @return NULL
     * 
     */
    function login($mail, $password, $method){
        $request = $this -> _db -> query("SELECT * FROM `user` WHERE mail = '$mail' AND password = '$password' ");
        $result = $request -> fetchAll();
        $count = $request -> rowCount();

        if($count == 1){
            foreach($result as $res){
                $_SESSION['user'] = $res['token'];

                    $old_token = $_SESSION['tmp_user'];
                    $token = $_SESSION['user'];

                    $this -> moveUserData($old_token, $token);

                if($method == "cookie"){
                    //setcookie('mail', $res['mail'], time() + 365*24*3600) ;
                    //setcookie('password', $res['password'], time() + 365*24*3600) ;
                    setcookie('token', $res['token'], time() + 365*24*3600) ;
                }
                
            }

        }
        return true;
    }
    
    
    /**
     * function updateSetting($param1, $param2, $param3, $param4, $param5, $param6)
     * 
     * Cette fonction update des settings user
     * @param 1 = la valeur du nouveau firstname
     * @param 2 = la valeur du nouveau name
     * @param 3 = la valeur du nouveau mail
     * @param 4 = la valeur du nouveau tel
     * @param 5 = la valeur du nouveau birdthay
     * @param 6 = la valeur du nouveau gender
     * 
     * @return NULL
     * 
     */
    function updateSetting($first_name, $name, $mail, $tel, $birdthay, $gender){
        $token = $this -> getToken();
        $table = $this -> getTable();

        $exec = $this -> _db -> exec("UPDATE `$table` SET `first_name` = '$first_name', `name` = '$name', `mail` = '$mail', `tel` = '$tel', `birdthay` = '$birdthay', `gender` = '$gender' WHERE `token` = '$token'");
    }
    // ---------------------------------------------------------------------------------------------------



    // ---------------------------------------------------------------------------------------------------
    /**
     * Système Wishlist
     * 
     * La wishlist sert a stocker des produits qu'un utilisateur met en favoris
     */



    /**
     * function getWishlist()
     * 
     * Cette fonction va retourner la wishlist d'un user
     * 
     * @return array
     * 
     */
    function getWishlist(){
        $token = $this -> getToken();
        $table = $this -> getTable();

        $request = $this -> _db -> query("SELECT * FROM `$table` WHERE `token` = '$token' ");
        foreach($request -> fetchAll() as $r){
            return $r['wish_list'];
        }
    }


    /**
     * function isEmptyWishlist()
     * 
     * Cette fonction va indiquer si la wishlist est vide ou non
     * 
     * @return boolean
     * 
     */
    function isEmptyWishlist(){
        $wishlist = $this -> getWishlist();
        $arr = json_decode($wishlist, true);
        
        if (empty($arr['products'])) {
            return true;
       }
       return false;
    }


    /**
     * function checkOnWishlist($param1)
     * 
     * Vérifier si la wishlist contient un produit
     * 
     * @param 1 = le ProductiD
     * @return boolean
     * 
     */
    function checkOnWishlist($idProduct){
        $wishlist = $this -> getWishlist();
        $arr = json_decode($wishlist, true);
        
        foreach($arr['products'] as $a){
            if($a['ID'] == $idProduct){
                return true;
            }
        }
        return false;
    }


    /**
     * function addToWishlist($param1)
     * 
     * Ajouter un produit dans la wishlist de l'user
     * 
     * @param 1 = le ProductiD
     * 
     */
    function addToWishlist($idProduct){
        $token = $this -> getToken();
        $table = $this -> getTable();

        $wishList = $this -> getWishlist();
        $arr = json_decode($wishList, true);
        
        if($this -> checkOnWishlist($idProduct) == false){
            settype($idProduct, "integer");
            $arrne['ID'] = $idProduct;
            array_push( $arr['products'], $arrne );
        }
        $newArr = json_encode($arr);

        $exec = $this -> _db -> exec("UPDATE `$table` SET `wish_list` = '$newArr' WHERE `token` = '$token'");

    }
  
    
    /**
     * function removeFromWishlist($param1)
     * 
     * Retirer un produit de la wishlist de l'user
     * 
     * @param 1 = le ProductiD
     * 
     */
    function removeFromWishlist($idProduct){
        $token = $this -> getToken();
        $table = $this -> getTable();

        $wishList = $this -> getWishlist();
        $arr = json_decode($wishList, true);
       
        foreach ($arr['products'] as $index => $data) {
            if ($data['ID'] == $idProduct) {
                unset($arr['products'][$index]);
            }
        }

        $newArr = json_encode($arr);
        $exec = $this -> _db -> exec("UPDATE `$table` SET `wish_list` = '$newArr' WHERE `token` = '$token'");
    }


    // ---------------------------------------------------------------------------------------------------



    // ---------------------------------------------------------------------------------------------------
    /**
     * Système Panier
     * 
     * Le panier sert a préparer un achat d'un user
     */



    /**
     * function getShoppinCart()
     * 
     * Cette fonction va retourner le panier d'un user
     * 
     * @return array
     * 
     */
    function getShoppinCart(){
        $token = $this -> getToken();
        $table = $this -> getTable();
        
        $request = $this -> _db -> query("SELECT * FROM `$table` WHERE `token` = '$token' ");
        foreach($request -> fetchAll() as $r){
            return $r['shopping_cart'];
        }
    }


    /**
     * function isEmptyShoppingCart()
     * 
     * Cette fonction va indiquer si le panier est vide ou non
     * 
     * @return boolean
     * 
     */
    function isEmptyShoppingCart(){
        $cart = $this -> getShoppinCart();
        $arr = json_decode($cart, true);
        
        if (empty($arr['products'])) {
            return true;
       }
       return false;
    }


    /**
     * function checkOnShoppingCart($param1)
     * 
     * Vérifier si le panier contient un produit
     * 
     * @param 1 = le ProductiD
     * @return boolean
     * 
     */
    function checkOnShoppingCart($idProduct){
        // Besoin de changer a cause du 1 -> 10 -> 11 etc
        if (strpos($this -> getShoppinCart(), "\"ID\":".$idProduct.",") !== false) {
            return true;
        }
        return false;
    }
    // ---------------------------------------------------------------------------------------------------
}