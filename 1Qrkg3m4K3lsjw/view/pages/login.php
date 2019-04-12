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
    <link rel="stylesheet" href="dist/templates/<?= $template ;?>/themes/login.css">
    <link rel="stylesheet" href="dist/templates/<?= $template ;?>/themes/libs.css">


    
    <script src="https://cdn.jsdelivr.net/npm/jquery@latest/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/tippy.js@3/dist/tippy.all.min.js"></script>
    <script src="../views/assets/libs/notify/notify.js"></script>

    <!-- PLUGIN PARTIE A AUTOMATISER -->
    
</head>
<body>

    <section style="width: 100%">

        <div class="center">
            <h2>Connectez vous pour accéder au panel admin</h2>

            <form action="" method="post">
                <input type="email" name="email" id="email" value="" value="contact@mikhaelbailly.fr">
                <input type="password" name="password" id="password" value="" value="password">
                <div class="button">
                    <button name="login_button">Se connecter <i class="fas fa-sign-in-alt"></i></button>
                </div>
            </form>
        </div>

    </section>

</body>
<script src="dist/js/script.js"></script>
</html>
