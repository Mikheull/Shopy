<section class="wrapper_content">
    
    <div class="head">
        <h2>Clients</h2>
    </div>


    <div class="data_content settings">

        <div class="item">
            <div class="title"> Réécriture d'URL </div>

            <div class="content">
                <?php 
                    $name = "enable_url_simplify"; 
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
                    <div class="desc">Activer les URL simplifiées</div>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="title"> Définir le séparateur entre pages </div>
            <small>conseillé "-" </small>

            <div class="content">
                <div class="number">
                    <div class="input_field">
                        <input data-type="updt_text" type="text" data-name="rewrite_separator" value="<?= $main -> getSetting('rewrite_separator') ?>">
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>