<div class="container-fluid" id="footer">

    <div class="container">
        <div class="row">
            <div class="col-md-3 categories">
                <div class="title"><h3>Catégories</h3></div>
                <div class="content">
                    <ul>
                    <?php 
                        foreach($shop -> getAllSuperCategory() as $category){
                            ?> <li> <a href="<?= $correctSlug ;?>shop/categorie/<?= $category['name'] ;?>" title=""><?= $category['name'] ;?></a> </li> <?php
                        }
                    ?>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 help">
                <div class="title"><h3>Aide</h3></div>
                <div class="content">
                    <ul>
                        <li><a href="<?= $correctSlug ;?>help/how_create_acount">Comment créer un compte</a></li>
                        <li><a href="<?= $correctSlug ;?>help/follow_order">Suivre mes commande</a></li>
                        <li><a href="<?= $correctSlug ;?>help/how_to_make_return">Informations sur les retours</a></li>
                        <li><a href="<?= $correctSlug ;?>help/rgpd">A propos des informations (RGPD)</a></li>
                        <li><a href="<?= $correctSlug ;?>help">Obtenir plus d'aide</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="title"><h3>Contact</h3></div>
                <div class="content">
                    <ul>
                        <li><a href=""><i style="margin-right: 10px" class="fab fa-facebook-f"></i> shopy</a></li>
                        <li><a href=""><i style="margin-right: 10px" class="fab fa-twitter"></i> shopy</a></li>
                        <li><a href=""><i style="margin-right: 10px" class="fab fa-instagram"></i> shopy</a></li>
                        <li><a href=""><i style="margin-right: 10px" class="fab fa-pinterest-p"></i> shopy</a></li>
                        <li><a href=""><i style="margin-right: 10px" class="fab fa-snapchat-ghost"></i> shopy</a></li>
                        <li><a href=""><i style="margin-right: 10px" class="fab fa-google-plus-g"></i> shopy</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="title"><h3>Newsletter</h3></div>
                <div class="content">
                    <div class="input_field">
                        <input type="text" placeholder="Votre mail">
                    </div>
                </div>
            </div>

        </div>
    </div>
    
    <div class="container copyright">
        <p>Copyright © <?= date('Y') ?> Tous droits réservés. Ce site a été fait par Mikhaël Bailly</p>
    </div>

</div>