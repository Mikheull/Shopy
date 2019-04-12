<?php

    if(isset($_GET['c'])){
    
        $array = array();
        foreach (new DirectoryIterator('views/components/pages/back/carts/data/') as $fileInfo) {
            if(!$fileInfo->isDot() AND !$fileInfo->isDir()){
                array_push($array, $fileInfo->getFilename());
            }
        }
    }

?>





<section class="main_wrapper">
<?php
    if(isset($_GET['c'])){
        if(in_array($_GET['c'].".php",$array)){
            require ('views/components/pages/back/carts/data/'.$_GET['c'].'.php');
        }else{
            require ('views/components/pages/root/errors/404.php');
        }
    }else{
        require ('views/components/pages/back/carts/index.php');
    }
?>
</section>
