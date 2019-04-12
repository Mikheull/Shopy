
<?php


// Suppression de tous les cookies avec une boucle
// Tout les cookies seront supprimés, ainsi que celui qui gere les Sessions donc elles seront supprimées aussi

session_destroy();

setcookie("tmp_user","",time()-3600);
unset($_COOKIE["tmp_user"]);

setcookie("user","",time()-3600);
unset($_COOKIE["user"]);

header('location: .');