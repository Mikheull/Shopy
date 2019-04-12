<?php

    if(isset($_GET['c'])){
    
        $array = array();
        foreach (new DirectoryIterator('views/components/pages/back/shop/') as $fileInfo) {
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
            if(isset($_GET['f'])){
                require ('views/components/pages/back/shop/data/'.$_GET['c'].'/'.$_GET['f'].'.php');
            }else{
                require ('views/components/pages/back/shop/'.$_GET['c'].'.php');
            }
        }else{
            require ('views/components/pages/root/errors/404.php');
        }
    }
?>
</section>
