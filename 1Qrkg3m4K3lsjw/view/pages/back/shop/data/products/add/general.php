<div class="wrapper_step-category step-active" id="general">
    
    <div class="step">
        <span class="pre-title required">Choisir un nom</span> <br>
        <div class="input_field">
            <input type="text" name="product_name" id="product_name" placeholder="Saisissez un nom pour votre produit">
        </div>
    </div>


    <div class="step">
        <span class="pre-title">Laisser des commentaires</span> <br>
        <div class="input_field">
            <input type="text" name="comments" id="comments" placeholder="Séparer les avec des ;">
        </div>
        <div id="ouput-AddComments"> </div>
    </div>


    <div class="step">
        <span class="pre-title required">Selectionner une catégorie</span> <br>
        <div class="input_field">
            <input type="text" disabled name="category_name" id="category_name" placeholder="Saisissez le nom de votre catégorie">
            <input type="hidden" name="category" id="category" value="0">
        </div>

        <div class="list-select">
            <div class="head showListSelect"><i class="fas fa-chevron-circle-down"></i></div>
            <div class="bodyListSelect hidden">
                <ul>
                    <?php

                    foreach($shop -> getAllSuperCategory() as $Supcategory){
                        ?>
                        <li class="category">
                            <p class="title"><?= $Supcategory['name'] ;?> <span><i class="fas fa-angle-down"></i></span></p>
                            <?php
                            foreach($shop -> getAllMainCategory($Supcategory['ID']) as $Maincategory){
                                ?>
                                <div class="content hidden">
                                    <div class="heading"> <span><?= $Maincategory['name'] ;?></span> </div>
                                    <div class="elements">
                                        <ul>
                                            <?php
                                            foreach($shop -> getAllNormalCategory($Maincategory['ID']) as $category){
                                                ?> <li class="item" data-category="<?= $category['ID'] ;?>" data-category_name="<?= $Supcategory['name']." - ".$Maincategory['name']." - ".$category['name'] ;?>"> <?= $category['name'] ;?> </li> <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </li>
                        <?php
                        
                    }

                    ?>
                </ul>
            </div>
        </div>
    </div>


    <div class="step">
        <span class="head">Les images</span>
        <div class="container">
            <div id="preview-image">
                <div class="output"></div>
                <div class="upload-image">
                    <input type="file" id="imgInp" multiple/>
                    <span> <i class="fas fa-upload"></i> </span>
                </div>
            </div>
            <div id="actions-image">
                <div class="actions-output">
                    <img src=""/>
                </div>
            </div>
        </div>
    </div>


    <div class="step">
        <span class="pre-title">Ecrire le récapitulatif (balise description)</span> <br>
        <div class="input_field" style="width: 70%">
            <textarea name="recap" id="recap" cols="30" rows="10" placeholder="..."></textarea>
        </div>
    </div>


    <div class="step">
        <span class="pre-title">Ecrire la description</span> <br>
        <div class="input_field" style="width: 70%">
            <textarea name="description" id="description" cols="30" rows="10" placeholder="..."></textarea>
        </div>
    </div>

</div>