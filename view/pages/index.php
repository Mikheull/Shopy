<?php

$data_meta = 'view/components/default_meta.php';

if(file_exists('view/pages/'. $responseURI .'/custom/meta.php')){  $data_meta = 'view/pages/'. $responseURI .'/custom/meta.php';}
if(file_exists('view/pages/'. $responseURI .'/custom/css.php')){ $data_css = 'view/pages/'. $responseURI .'/custom/css.php';}
if(file_exists('view/pages/'. $responseURI .'/custom/js.php')){ $data_js = 'view/pages/'. $responseURI .'/custom/js.php';}

$body = 'view/pages/'. $responseURI .'/index.php';
$template = 'original';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    
    <meta name="robots" content="nosnippet"/>
    <meta name="language" content="fr">
    <meta name="author" content="Mikhaël Bailly">
    <meta name="category" content="developpeur, web, sites">
    <meta name="theme-color" content="#1971c2">

    <meta name="og:type" content="website"/>
    <meta name="og:image" content="https://www.mikhaelbailly.fr/dist/images/logos/logo_light.png"/>
    <meta property="og:image:width" content="128">
    <meta property="og:image:height" content="128">
    <?php require ($data_meta) ;?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115378759-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-115378759-3');
    </script>

    <link rel="stylesheet" type="text/css" media="screen" href="<?= $correctSlug ;?>dist/css/reset.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="<?= $correctSlug ;?>dist/template/<?= $template ;?>/main.css">
    <link rel="stylesheet" type="text/css" media="screen" href="<?= $correctSlug ;?>dist/css/bootstrap-grid.min.css">
    <?php  if(isset($data_css)){ require ($data_css) ;} ;?>
    
    <link rel="shortcut icon" href="https://www.mikhaelbailly.fr/dist/images/logos/logo_dark.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@latest/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/tippy.js@3/dist/tippy.all.min.js"></script>
</head>
<body>



    <?php require ($body) ;?>


    
    <?php if(isset($data_js)){ require ($data_js) ;} ;?>
    <script src="<?= $correctSlug ;?>dist/js/main.js"></script>
</body>
</html>