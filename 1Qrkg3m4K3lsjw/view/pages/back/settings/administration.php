<section class="wrapper_content">
    
    <div class="head">
        <h2>Administration</h2>
    </div>


    <div class="data_content settings">
        <div class="item">
            <div class="content">
                <?php 
                    $name = "verify_cookie-IP"; 
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
                    <div class="desc">Vérifier l'adresse IP du cookie <strong><i class="far fa-times-circle"></i></strong> </div>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="title"> Notifications </div>

            <div class="content">
                <?php 
                    $name = "view_notifs-new-commands"; 
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
                    <div class="desc">Recevoir une notification pour les nouvelles commandes <strong><i class="far fa-times-circle"></i></strong> </div>
                </div>
            </div>

            <div class="content">
                <?php 
                    $name = "view_notifs-new-clients"; 
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
                    <div class="desc">Recevoir une notification pour les nouveaux clients <strong><i class="far fa-times-circle"></i></strong> </div>
                </div>
            </div>
            
            <div class="content">
                <?php 
                    $name = "view_notifs-new-messages"; 
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
                    <div class="desc">Recevoir une notification pour les nouveaux messages <strong><i class="far fa-times-circle"></i></strong> </div>
                </div>
            </div>
        </div>

    </div>

</section>