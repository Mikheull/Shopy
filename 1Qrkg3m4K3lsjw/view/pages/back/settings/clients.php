<section class="wrapper_content">
    
    <div class="head">
        <h2>Clients</h2>
    </div>


    <div class="data_content settings">

        <div class="item">
            <div class="title"> Inscription/Connexion </div>

            <div class="content">
                <?php 
                    $name = "cart_featured_login"; 
                    $check = "";
                    if($main -> getSetting($name) == true){ $check = "checked"; }
                ?>
                <div class="boolean">
                    <div class="container check" id="ct_<?= $name ;?>">
                        <div class="input-switch">
                            <input data-type="updt_checkbox" data-name="<?= $name ;?>" type="checkbox" id="<?= $name ;?>" class="input" <?= $check ;?>/>
                            <label for="<?= $name ;?>" class="switch"></label>
                        </div>
                    </div>
                    <div class="desc">Mettre en avant le panier après identification <strong><i class="far fa-times-circle"></i></strong> </div>
                </div>
            </div>

            <div class="content">
                <?php 
                    $name = "send_email_register"; 
                    $check = "";
                    if($main -> getSetting($name) == true){ $check = "checked"; }
                ?>
                <div class="boolean">
                    <div class="container check" id="ct_<?= $name ;?>">
                        <div class="input-switch">
                            <input data-type="updt_checkbox" data-name="<?= $name ;?>" type="checkbox" id="<?= $name ;?>" class="input" <?= $check ;?>/>
                            <label for="<?= $name ;?>" class="switch"></label>
                        </div>
                    </div>
                    <div class="desc">Envoyer un e-mail après la création du compte <strong><i class="far fa-times-circle"></i></strong> </div>
                </div>
            </div>
            
            <div class="content">
                <?php 
                    $name = "partners_emails"; 
                    $check = "";
                    if($main -> getSetting($name) == true){ $check = "checked"; }
                ?>
                <div class="boolean">
                    <div class="container check" id="ct_<?= $name ;?>">
                        <div class="input-switch">
                            <input data-type="updt_checkbox" data-name="<?= $name ;?>" type="checkbox" id="<?= $name ;?>" class="input" <?= $check ;?>/>
                            <label for="<?= $name ;?>" class="switch"></label>
                        </div>
                    </div>
                    <div class="desc">Activer les offres partenaires <strong><i class="far fa-times-circle"></i></strong> </div>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="title"> Groupe des visiteurs par défaut </div>
            <small>Définissez le groupe par défaut d'un utilisateur qui n'est pas connecté</small>

            <div class="content">
                <div class="number">
                    <div class="input_field">
                        <input type="text" name="temp_user_default" id="temp_user_default" value="<?= $main -> getSetting('temp_user_default') ;?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="title"> Groupe des utilisateurs connectés par défaut </div>
            <small>Définissez le groupe par défaut d'un utilisateur connecté qui n'a pas de role spécifique</small>

            <div class="content">
                <div class="number">
                    <div class="input_field">
                        <input type="text" name="user_default" id="user_default" value="<?= $main -> getSetting('user_default') ;?>">
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>