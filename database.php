<?php

/**
 * 
 * database.php
 * 
 * Fichier de connexion a la base de données globale
 * ( faire un fichier séparé sert principalement pour
 *   les codes en ajax qui ont besoin de la connexion a
 *   la base de données , mais aussi pour séparer. )
 * 
 * 
 * $host = l'hote de la base de données (localhost en local, l'ip de la machine en vps)
 * $dbname = le nom de la base de données
 * $user = l'utilisateur de connexion
 * $pass = le mot de passe de connexion
 * 
 */


if(_MODE_LOCAL === true){
    $host = 'localhost';
    $dbname = 'shopy';
    $user = 'root';
    $pass = 'root';
}else{
    $host = 'localhost';
    $dbname = 'shopy';
    $user = 'root';
    $pass = 'root';
}



$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$db -> exec("SET NAMES utf8mb4");