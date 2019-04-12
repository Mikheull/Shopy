<?php
foreach (new DirectoryIterator('controller/') as $fileInfo) {
    if(!$fileInfo->isDot() AND !$fileInfo->isDir()){
        require('controller/'. $fileInfo->getFilename() );
    }
}

$seperator = $main -> getSetting('rewrite_separator');

if($user -> isConnected() == true){

    if(isset($_GET['query'])){
        $pages=array('shop', 'orders', 'carts', 'users', 'editor', 'help', 'settings');
        if(in_array($_GET['query'],$pages)){
            require('view/pages/index.php');
        }else{
            require('view/pages/root/errors/404.php');
        }
        
    
    }else{
        $_GET['query'] = 'dashboard';
        require('view/pages/index.php');
    }
    
}else{
    require('view/pages/login.php');
}
?>