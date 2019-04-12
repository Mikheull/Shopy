<section class="wrapper_content">
    
    <div class="head">
        <h2>Réglages généraux</h2>
    </div>


    <div class="data_content settings">
    
        <div class="item">
            <div class="title"> Nombre de décimales </div>
            <small>Définissez le nombre de chiffres après la virgule sur un prix</small>

            <div class="content">
                <div class="number">
                    <div class="input_field">
                        <input data-type="updt_number" type="number" data-name="decimal_number" value="<?= $main -> getSetting('decimal_number') ?>" min="0" max="6">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="item">
            <div class="title"> Nombre d'éléments d'une page </div>
            <small>Définissez le nombre d'éléments dans un tableau d'une page (BackOffice)</small>

            <div class="content">
                <div class="number">
                    <div class="input_field">
                        <input data-type="updt_number" type="number" data-name="backend_item_per_page" value="<?= $main -> getSetting('backend_item_per_page') ?>" min="0" max="100">
                    </div>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="title"> Quelques options </div>

            <div class="content">
                <?php 
                    $name = "view_best_sellers"; 
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
                    <div class="desc">Permettre aux utilisateurs de voir les meilleures ventes de la boutique en créant une nouvelle page <strong><i class="far fa-times-circle"></i></strong> </div>
                </div>
            </div>

            <div class="content">
                <?php 
                    $name = "debug_mode"; 
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
                    <div class="desc">Activer le mode débug [Développeur mode]</div>
                </div>
            </div>
            
            <div class="content">
                <?php 
                    $name = "maintenance_mode"; 
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
                    <div class="desc">Activer le mode maintenance, les utilisateurs n'ayant pas les accès ne pourront plus voir la boutique [Front Only]</div>
                </div>
            </div>
        </div>

    </div>

</section>