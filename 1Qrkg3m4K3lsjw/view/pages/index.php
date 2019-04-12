<!DOCTYPE html>
<html>
<head>
    <title><?= $main -> getSetting('site_name') ;?> Administration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../dist/libs/notify/notify.css">
    

    <link rel="stylesheet" href="dist/css/reset.min.css">
    <link rel="stylesheet" href="dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="dist/templates/<?= $template ;?>/themes/style.css">
    <link rel="stylesheet" href="dist/templates/<?= $template ;?>/themes/home.css">
    <link rel="stylesheet" href="dist/templates/<?= $template ;?>/themes/libs.css">

    
    <script src="https://cdn.jsdelivr.net/npm/jquery@latest/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/tippy.js@3/dist/tippy.all.min.js"></script>
    <script src="../views/assets/libs/notify/notify.js"></script>

    <!-- PLUGIN PARTIE A AUTOMATISER -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700" rel="stylesheet">

    <script src="views/assets/plugins/keyboard_shortcuts/assets/script.js"></script>
    <!-- <script src="views/assets/plugins/live_table/assets/script.js"></script> -->

    <link rel="stylesheet" href="../views/assets/libs/switchy/style.css">
    
</head>
<body>

    <?php require ('dist/static/sprites/icon_svg_sprites.svg'); ?>




    <section class="body">
        
        <div class="container-fluid" style="padding: 0">
            <div class="row"> 
                <div class="col-md-2 offset-md-0 header_navbar">
                    <?php require ('view/components/navbar.php'); ?>
                </div>

                <div class="col-md-10 col-sm-12 col-12 main_container">
                    <?php require ('view/pages/root/'. $_GET['query'] .'.php'); ?>
                </div>
            </div>
        </div>

    </section>

</body>

<script src="dist/js/script.js"></script>
</html>
