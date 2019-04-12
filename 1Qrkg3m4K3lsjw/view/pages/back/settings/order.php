<section class="wrapper_content">
    
    <div class="head">
        <h2>Commandes</h2>
    </div>


    <div class="data_content settings">

        <div class="item">
            <div class="title"> Quelques options </div>

            <div class="content">
                <?php 
                    $name = "order_final_overview"; 
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
                    <div class="desc">Obtenir un récapitulatif final après la confirmation d'achat sur la boutique <strong><i class="far fa-times-circle"></i></strong> </div>
                </div>
            </div>

            <div class="content">
                <?php 
                    $name = "order_express"; 
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
                    <div class="desc">Activer la commande express sur la boutique, sans possibilité d'achat <strong><i class="far fa-times-circle"></i></strong> </div>
                </div>
            </div>
            
            <div class="content">
                <?php 
                    $name = "order_again"; 
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
                    <div class="desc">Pouvoir commande a nouveau a partir du compte de l'utilisateur <strong><i class="far fa-times-circle"></i></strong> </div>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="title"> Montant minimal pour une commande </div>
            <small>Définissez le montant minimal pour qu'un client puisse passer une commande (O pour désactiver) <strong><i class="far fa-times-circle"></i></strong> </small>

            <div class="content">
                <div class="number">
                    <div class="input_field">
                        <input data-type="updt_number" type="number" data-name="minmimum_order" value="<?= $main -> getSetting('minmimum_order') ?>" min="0">
                    </div>
                </div>
            </div>
        </div>

         <div class="item">
            <div class="title"> CGV </div>

            <div class="content">
                <?php 
                    $name = "cgv"; 
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
                    <div class="desc">Ajouter une page Conditions générales de ventes <strong><i class="far fa-times-circle"></i></strong> </div>
                </div>
            </div>
        </div>

         <div class="item">
            <div class="title"> Cadeaux </div>

            <div class="content">
                <?php 
                    $name = "gift_package"; 
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
                    <div class="desc">Proposer la possibilité de faire des emballages cadeaux <strong><i class="far fa-times-circle"></i></strong> </div>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="title"> Tarifs emballages cadeaux </div>
            <small>Définissez le tarif des emballages pour cadeaux</small>

            <div class="content">
                <div class="number">
                    <div class="input_field">
                        <input data-type="updt_number" type="number" data-name="price_gift_package" value="<?= $main -> getSetting('price_gift_package') ?>" min="0">
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>