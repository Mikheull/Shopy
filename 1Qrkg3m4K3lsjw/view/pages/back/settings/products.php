<section class="wrapper_content">
    
    <div class="head">
        <h2>Produits</h2>
    </div>


    <div class="data_content settings">
        <div class="item">
            <div class="title"> Jour pour nouveau produit </div>
            <small>Définissez le nombre de jour pendant lesquel un produit est considéré comme "nouveau"</small>

            <div class="content">
                <div class="number">
                    <div class="input_field">
                        <input data-type="updt_number" type="number" data-name="number_day_for_new_product" value="<?= $main -> getSetting('number_day_for_new_product') ?>" min="0" max="31">
                    </div>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="title"> Création </div>

            <div class="content">
                <?php 
                    $name = "product_enable-create"; 
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
                    <div class="desc">Activer par défaut un produit lors de sa création</div>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="title"> Vue </div>

            <div class="content">
                <?php 
                    $name = "view_quantity_product"; 
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
                    <div class="desc">Afficher les quantités disponibles d'un produit sur sa fiche</div>
                </div>
            </div>
            
            <div class="content">
                <?php 
                    $name = "view_last_quantity_product"; 
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
                    <div class="desc">Afficher les dernières quantités lorsque celles-ci sont inférieures à 5</div>
                </div>
            </div>

            <div class="content">
                <?php 
                    $name = "view_unavailable_attributes_product"; 
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
                    <div class="desc">Afficher les attributs indisponibles sur la fiche produit <strong><i class="far fa-times-circle"></i></strong> </div>
                </div>
            </div>

            <div class="content">
                <?php 
                    $name = "order_empty_stock"; 
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
                    <div class="desc">Autoriser la commande d'un produit en rupture de stock</div>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="title"> Gérer le mode de vue des produits </div>
            <small>Système d'affichage de produits (infitite-loading ou pagination) <strong><i class="far fa-times-circle"></i></strong> </small>

            <div class="content">
                <div class="number">
                    <div class="input_field">
                        <input type="text" name="product_view_mode" id="product_view_mode" value="<?= $main -> getSetting('product_view_mode') ;?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="title"> Produits par page </div>
            <small>Définissez le nombre de produits par page (avec la pagination active) <strong><i class="far fa-times-circle"></i></strong> </small>

            <div class="content">
                <div class="number">
                    <div class="input_field">
                        <input data-type="updt_number" type="number" data-name="product_per_page" value="<?= $main -> getSetting('product_per_page') ?>" min="0" max="100">
                    </div>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="title"> Recherche </div>

            <div class="content">
                <?php 
                    $name = "product_sort"; 
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
                    <div class="desc">Activer le système de tri</div>
                </div>
            </div>

            <div class="content">
                <?php 
                    $name = "product_advanced_sort"; 
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
                    <div class="desc">Activer le système de tri avancé <strong><i class="far fa-times-circle"></i></strong> </div>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="title"> Gérer le tri par défaut </div>
            <small>Définir le mode de tri par défaut <strong><i class="far fa-times-circle"></i></strong> </small>

            <div class="content">
                <div class="number">
                    <div class="input_field">
                        <input data-type="updt_text" type="text" data-name="product_sort_default" value="<?= $main -> getSetting('product_sort_default') ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="title"> Gérer l'ordre par défaut </div>
            <small>Définir l'ordre d'affichage des produits par défaut <strong><i class="far fa-times-circle"></i></strong> </small>

            <div class="content">
                <div class="number">
                    <div class="input_field">
                        <input data-type="updt_text" type="text" data-name="product_sort_default" value="<?= $main -> getSetting('product_sort_default') ?>">
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>