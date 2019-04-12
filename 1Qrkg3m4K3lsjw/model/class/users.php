<?php

class users extends db_connect {

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
     * Les utilisateurs
     * 
     * 
     */

    /**
     * function isConnected()
     * 
     * Cette fonction va indiquer si l'user est connecté ou non
     * 
     * @return boolean
     * 
     */
    function isConnected(){
        if(isset($_SESSION['user'])){
            return true;
        }
        return false;
    }


    /**
     * function getAllUsers()
     * 
     * Cette fonction va retourner un tableau de tout les utilisateurs
     * 
     * @return array
     * 
     */
    function getAllUsers(){
        $request = $this -> _db -> query("SELECT * FROM `user`");
        return $request -> fetchAll();
    }


    /**
     * function getAllUserLimit($param1, $param2)
     * 
     * Cette fonction renverra un tableau de tout les utilisateurs LIMIT
     * 
     * @param 1 = la page
     * @param 2 = le nombre d'élément
     * @return array
     * 
     */
    function getAllUserLimit($limit, $offset){
        $request = $this -> _db -> query("SELECT * FROM `user` LIMIT $limit OFFSET $offset ");
        return $request -> fetchAll();
    }


    /**
     * function getAllUsersRoles($param1)
     * 
     * Cette fonction va retourner un tableau de tout les utilisateurs selon un role spécial
     * 
     * @param 1 = le roleID
     * @return array
     * 
     */
    function getAllUsersRoles($role){
        $request = $this -> _db -> query("SELECT * FROM `user` WHERE `roles` = '$role' ");
        return $request -> fetchAll();
    }


    /**
     * function getUser($param1, $param2)
     * 
     * Cette fonction va retourner une information d'un user donné
     * 
     * @param 1 = le userID
     * @param 2 = l'information a récupérer
     * @return var
     * 
     */
    function getUser($id, $inf){
        $request = $this -> _db -> query("SELECT * FROM `user` WHERE `ID` = '$id' ");
        if($inf !== '*'){
            foreach($request -> fetchAll() as $r){
                return $r[$inf];
            }  
        }
        return $request -> fetchAll();
    }


    /**
     * function newUser($param1)
     * 
     * Cette fonction créer un user
     * @param 1 = le nom
     * 
     * @return NULL
     * 
     */
    function newUser($name){
        echo "création";
        //$request = $this -> _db -> exec("INSERT INTO `category` (`name`, `parent`) VALUES ('$name', '$parentID') ");
    }


    /**
     * function login($param1, $param2)
     * 
     * Cette fonction sert pour connecter un user
     * @param 1 = mail
     * @param 2 = password
     * 
     * @return NULL
     * 
     */
    function login($mail, $password){
        $request = $this -> _db -> query("SELECT * FROM `user` WHERE mail = '$mail' AND password = '$password' ");
        $result = $request -> fetchAll();
        $count = $request -> rowCount();

        if($count == 1){
            foreach($result as $res){
                if($res['role'] == 1 OR $res['role'] == 4 OR $res['role'] == 5){
                    $_SESSION['user'] = $res['token'];
                }
            }
        }
        return true;
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
    function getWishlist($user){
        // Detecter la table a ouvrir grace au $user A FAIRE
        //$table = $this -> getTable();
        $table = 'user';

        $request = $this -> _db -> query("SELECT * FROM `$table` WHERE `ID` = '$user' ");
        foreach($request -> fetchAll() as $r){
            return $r['wish_list'];
        }
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
    function checkOnWishlist($user, $idProduct){
        $wishlist = $this -> getWishlist($user);
        $arr = json_decode($wishlist, true);
        
        foreach($arr['products'] as $a){
            if($a['ID'] == $idProduct){
                return true;
            }
        }
        return false;
    }

    // ---------------------------------------------------------------------------------------------------




    // ---------------------------------------------------------------------------------------------------
    /**
     * Les permissions
     * 
     * 
     */

    /**
     * function getAllPermissions()
     * 
     * Cette fonction va retourner un tableau de toutes les permissions
     * 
     * @return array
     * 
     */
    function getAllPermissions(){
        $request = $this -> _db -> query("SELECT * FROM `permissions`");
        return $request -> fetchAll();
    }


    /**
     * function getAllPermissionsType()
     * 
     * Cette fonction va retourner un tableau de tout les types de permissions
     * 
     * @return array
     * 
     */
    function getAllPermissionsType(){
        $perms = $this -> getAllPermissions();
        $array = array();

        foreach($perms as $p){
            if(!in_array($p['type'], $array)){
                array_push($array, $p['type']);
            }
        }
        return $array;
    }


    /**
     * function getAllPermissionsPerType($param1)
     * 
     * Cette fonction va retourner un tableau de toutes les permissions selon un type
     * 
     * @param 1 = le type
     * @return array
     * 
     */
    function getAllPermissionsPerType($type){
        $request = $this -> _db -> query("SELECT * FROM `permissions` WHERE `type` = '$type' ");
        return $request -> fetchAll();
    }


    /**
     * function hasPermission($param1, $param2)
     * 
     * Cette fonction check si l'utilisateur a une permission
     * 
     * @param 1 = le userID
     * @param 2 = la permission
     * @return boolean
     * 
     */
    function hasPermission($user, $permission){
        if (strpos($this -> getRole($user, 'permissions'), "'*'") !== false) { return true; }

        if (strpos($this -> getRole($user, 'permissions'), "'".$permission."'") !== false) {
            return true;
        }
        return false;
    }


    /**
     * function RolehasPermission($param1, $param2)
     * 
     * Cette fonction check si un role a une permission
     * 
     * @param 1 = le roleID
     * @param 2 = la permission
     * @return boolean
     * 
     */
    function RolehasPermission($role, $permission){
        if (strpos($this -> getRole($role, 'permissions'), "'".$permission."'") !== false) {
            return true;
        }
        return false;
    }


    /**
     * function switchPermissionState($param1, $param2)
     * 
     * Cette fonction va switcher le statuts d'une permission pour un role (true ou false)
     * 
     * @param 1 = le RoleID
     * @param 2 = la permission
     * @return NULL
     * 
     */
    function switchPermissionState($role, $permission){
        $request = $this -> _db -> query("SELECT * FROM `permissions` WHERE `ID` = '$permission' ");
        $result = $request -> fetchAll();
        
        foreach($result as $r){
            $permission = addslashes($r['permission']);
        }


        $allPerm = $this -> getRole($role, 'permissions');
        if (strpos($allPerm, "'".$permission."'") !== false) {
            $replace = str_replace("'".$permission."',", "", $allPerm);
            $replace = addslashes($replace);
            $exec = $this -> _db -> exec("UPDATE `roles` SET `permissions` = '$replace' WHERE `ID` = '$role'");
            

        }else{
            $allPerm = substr($allPerm, 0, -1);
            $allPerm .= "'".$permission."',}";
            $allPerm = addslashes($allPerm);
            $exec = $this -> _db -> exec("UPDATE `roles` SET `permissions` = '$allPerm' WHERE `ID` = '$role'");

        }
    }


    /**
     * function newPermission($param1, $param2)
     * 
     * Cette fonction va créer un role
     * 
     * @param 1 = le type de permission
     * @param 2 = la permission
     * @return NULL
     * 
     */
    function newPermission($type ,$name){
        $request = $this -> _db -> exec("INSERT INTO `permissions` (`permission`, `type`) VALUES ('$name', '$type') ");
    }
    // ---------------------------------------------------------------------------------------------------




    // ---------------------------------------------------------------------------------------------------
    /**
     * Les rôles
     * 
     * 
     */

    /**
     * function getRole($param1, $param2)
     * 
     * Cette fonction va retourner une information d'un role donné
     * 
     * @param 1 = le RoleID
     * @param 2 = l'information a récupérer
     * @return var
     * 
     */
    function getRole($id, $inf){
        $request = $this -> _db -> query("SELECT * FROM `roles` WHERE `ID` = '$id' ");
        if($inf !== '*'){
            foreach($request -> fetchAll() as $r){
                return $r[$inf];
            }  
        }
        return $request -> fetchAll();
    }
    

    /**
     * function getAllRoles()
     * 
     * Cette fonction va retourner un tableau de tout les roles
     * 
     * @return array
     * 
     */
    function getAllRoles(){
        $request = $this -> _db -> query("SELECT * FROM `roles`");
        return $request -> fetchAll();
    }


    /**
     * function newRole($param1, $param2, $param3)
     * 
     * Cette fonction va créer un role
     * 
     * @param 1 = le nom du role
     * @param 2 = ses permissions
     * @param 3 = son parent (optionel)
     * @return NULL
     * 
     */
    function newRole($name){
        $request = $this -> _db -> exec("INSERT INTO `roles` (`name`, `permissions`, `parent`) VALUES ('$name', '{}', '0') ");
    }
    // ---------------------------------------------------------------------------------------------------


}