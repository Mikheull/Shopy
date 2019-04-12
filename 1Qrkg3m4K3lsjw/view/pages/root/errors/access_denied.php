<!DOCTYPE html>
<html>
<head>
    <title><?= $main -> getSetting('site_name') ;?> Administration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../views/assets/libs/fontawesome/all.css">


    <link rel="stylesheet" href="../content/defaut/themes/reset.css">
    <link rel="stylesheet" href="views/assets/templates/defaut/themes/style.css">


    <script src="https://cdn.jsdelivr.net/npm/jquery@latest/dist/jquery.min.js"></script>
</head>



<body>
    
    <?php 
        require ('static/sprites/icon_svg_sprites.svg');
        require ('views/components/snippets/navbar.php');
    ?>


    <section class="main_container"> 
        <div class="error404">
            <h2>Une erreur est survenue !</h2>   
            <h3>Vous n'avez pas la permission pour accéder a cette page..</h3>
            
            <a href="."><i class="fas fa-angle-left"></i> Retourner a l'accueil</a>
        </div>
    </section>

    
        
<script src="views/assets/javascript/script.js"></script>
</body>
</html>