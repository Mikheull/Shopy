<?php
require('../../../database.php');



// Ensemble des tables éventuelles à exclure complètement
$excludedTables = array(
    'site_stats',
);
// Ensemble des tables éventuelles dont on ne veut sauvegarder que la structure
$onlyStructureTables = array();



// On spécifie le chemin absolu où le script stockera les sorties .gz et .html
$path = '../../backup/';



 // On liste d’abord l’ensemble des tables
 $result = $db->query("SHOW TABLES");
 $tables = array();
 // On exclut éventuellement les tables indiquées
 while ($row = $result->fetch()) {
   if (!in_array($row[0], $excludedTables)) {
     $tables[] = $row[0];
   }
 }



// La variable $return contiendra le script de sauvegarde.
// On englobe le script de backup dans une transaction
// et on désactive les contraintes de clés étrangères
$return = '--
-- Date et heure : ' . date('d/m/Y à H:i:s') . '
--
SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;
';



// On boucle sur l’ensemble des tables à sauvegarder
 foreach ($tables as $table) {
    // On ajoute une instruction pour supprimer la table si elle existe déjà
    $return .= "DROP TABLE IF EXISTS `$table`;\n";
    // On génère ensuite la structure de la table
    $result = $db->query("SHOW CREATE TABLE `$table`")->fetch(PDO::FETCH_ASSOC);
    $return .= $result['Create Table'] . ";\n\n";

    // Si la table n’est pas marquée à sauver en tant que "structure seule"
    if (!in_array($table, $onlyStructureTables)) {
        $result = $db->query("SELECT * FROM `$table`");
        // On boucle sur l’ensemble des enregistrements de la table
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $return .= "INSERT INTO `$table` VALUES(";
            // On boucle sur l’ensemble des champs de l’enregistrement
            foreach ($row as $fieldValue) {
            // On purifie la valeur du champ
            $fieldValue = addslashes($fieldValue);
            $fieldValue = preg_replace("/\r\n/", "\\r\\n", $fieldValue);
            $return .= '"' . $fieldValue . '", ' ;
            }
            // On supprime la virgule à la fin de la requête INSERT
            $return = mb_substr($return, 0, -2) . ");\n";
        }
        $return .= "\n";
    }

}

// On valide la transaction
// et on résactive les contraintes de clés étrangères
$return .= 'SET FOREIGN_KEY_CHECKS=1;
COMMIT;';





// On enregistre maintenant le script SQL dans un fichier au format gzip
$savedFile = 'BKP-' . date('d-m-Y_H-i-s') . '-' . md5(implode(',', $tables)) . '.sql.gz';
$gz = gzopen($path . $savedFile, 'w9');
gzwrite($gz, $return);
gzclose($gz);


?>

<script>
$( '.button_save_bdd' ).html('<i class="fas fa-check"></i> Sauvegarde réussie');
$( '.button_save_bdd' ).addClass( 'button_success_save' );
$( '.button_save_bdd' ).removeClass( 'button_loading_save' );

</script>