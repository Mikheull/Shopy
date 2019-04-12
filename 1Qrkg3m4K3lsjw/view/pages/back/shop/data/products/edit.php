<?php
    $id = $_GET['product'];
?>




<section class="wrapper_content">
    
    <div class="head">
        <h2>Les produits > Edition</h2>
        <div class="button_add"> <a href="?query=shop&c=products" class="btn_cancel"> Cancel</a> </div>
    </div>


    <div class="data_content">
        <div class="wrapper_infos">
            <div class="numberElements"> Produit : <?= $shop -> getProduct($id ,'name'); ?> </div>
        </div>

        <div class="wrapper_editor">

            <div class="edit_container">
                <form method="POST">
                    <div class="input_field">
                        <label for="product_name">Changer le nom du produit</label>
                        <div class="pre-input-d"> Shopy/shop<?= $seperator ;?>produit<?= $seperator.$shop -> getProduct($id ,'reference').$seperator ;?> </div>
                        <input type="text" id="product_name" name="value" placeholder="Nom du produit" value="<?= $shop -> getProduct($id ,'name') ;?>">
                    </div>
                    <input type="hidden" name="product" value="<?= $id ;?>">
                    <input type="hidden" name="type" value="name">
                    <button class="button" name="renameProduct_button">Sauvegarder</button>
                </form>
            </div>

            <div class="edit_container">
                <form method="POST">
                    <div class="input_field">
                        <label for="category_id">Transferer vers une autre catégorie</label>
                        <input type="text" id="category_id" name="value" placeholder="Entrez l'ID de la catégorie">
                    </div>
                    <input type="hidden" name="product" value="<?= $id ;?>">
                    <input type="hidden" name="type" value="category">
                    <button class="button" name="transferProduct_button">Transferer</button>
                </form>
            </div>

            <div class="edit_container">
                <form method="POST">
                    <div class="input_field" style="width: 70%">
                        <label>Modifier le récapitulatif</label>
                        <textarea name="value" id="recap" cols="30" rows="10"><?= $shop -> getProduct($id, 'recap') ;?></textarea>
                    </div>
                    <input type="hidden" name="product" value="<?= $id ;?>">
                    <input type="hidden" name="type" value="recap">
                    <button class="button" name="editRecapProduct_button">Editer</button>
                </form>
            </div>

            <div class="edit_container">
                <form method="POST">
                    <div class="input_field" style="width: 70%">
                        <label>Modifier la description</label>
                        <textarea name="value" id="desc" cols="30" rows="10"><?= $shop -> getProduct($id, 'description') ;?></textarea>
                    </div>
                    <input type="hidden" name="product" value="<?= $id ;?>">
                    <input type="hidden" name="type" value="description">
                    <button class="button" name="editDescProduct_button">Editer</button>
                </form>
            </div>

            <div class="edit_container">
                <form method="POST">
                    <div class="input_field">
                        <label for="quantity">Modifier le stock</label>
                        <input type="number" id="quantity" name="value" value="<?= $shop -> getProduct($id, 'quantity') ;?>" min="0">
                    </div>
                    <input type="hidden" name="product" value="<?= $id ;?>">
                    <input type="hidden" name="type" value="quantity">
                    <button class="button" name="editQuantityProduct_button">Mettre a jour</button>
                </form>
            </div>

            <div class="edit_container">
                <form method="POST">
                    <div class="input_field">
                        <label for="buy_price">Modifier le prix d'achat</label>
                        <input type="number" id="buy_price" name="value" value="<?= $shop -> getProduct($id, 'buy_price') ;?>" min="0">
                    </div>
                    <input type="hidden" name="product" value="<?= $id ;?>">
                    <input type="hidden" name="type" value="buy_price">
                    <button class="button" name="editBuyPriceProduct_button">Mettre a jour</button>
                </form>
            </div>

            <div class="edit_container">
                <form method="POST">
                    <div class="input_field">
                        <label for="price_ht">Modifier le prix HT</label>
                        <input type="number" id="price_ht" name="value" value="<?= $shop -> getProduct($id, 'price_ht') ;?>" min="0">
                    </div>
                    <input type="hidden" name="product" value="<?= $id ;?>">
                    <input type="hidden" name="type" value="price_ht">
                    <button class="button" name="editPriceHTProduct_button">Mettre a jour</button>
                </form>
            </div>

            <div class="edit_container">
                <form method="POST">
                    <div class="input_field">
                        <label for="price_ttc">Modifier le prix TTC</label>
                        <input type="number" id="price_ttc" name="value" value="<?= $shop -> getProduct($id, 'price_ttc') ;?>" min="0">
                    </div>
                    <input type="hidden" name="product" value="<?= $id ;?>">
                    <input type="hidden" name="type" value="price_ttc">
                    <button class="button" name="editPriceTTCProduct_button">Mettre a jour</button>
                </form>
            </div>






            <div class="edit_container">
                <div class="title">
                    <h3>Status du produit</h3>
                </div>
                <div class="content">
                    <?php 
                        $name = "enable"; 
                        $check = "";
                        if($shop -> getProduct($id ,'enable') == true){ $check = "checked"; }
                    ?>
                    <div class="boolean">
                        <div class="container check" id="ct_<?= $name ;?>">
                            <div class="input-switch">
                                <input data-type="updt_checkbox" data-name="<?= $name ;?>" type="checkbox" id="<?= $name ;?>" class="input" <?= $check ;?>/>
                                <label for="<?= $name ;?>" class="switch"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="edit_container">
                <div class="title">
                    <h3>Actions</h3>
                </div>
                <form action="?query=shop&c=product" method="post" class="delete">
                    <input type="hidden" name="product" value="<?= $id ;?>">
                    <button name="deleteProduct_button"> Supprimer </button>
                </form>
            </div>
        </div>




        <div class="wrapper_editor" style="margin-top: 25px">

            <div class="edit_container">
                <div class="input_field">
                    <label>Référence du produit</label>
                    <input type="text" disabled value="<?= $shop -> getProduct($id ,'reference') ;?>">
                </div>
            </div>

            <div class="edit_container">
                <div class="title">
                    <h3>Commentaires</h3>
                </div>
                <div class="content">
                    <div class="comments">
                        <?php
                            $comments = $shop -> getProduct($id ,'comments');
                            if($comments == 'NULL'){
                                ?> Aucun commentaire pour ce produit <?php
                            }else{
                                ?>
                                <ul>
                                    <?php
                                    $arr = json_decode($shop -> getProduct($id ,'comments'), true);
                                    foreach($arr as $a){
                                        echo '<li>'.$a.'</li>';
                                    }
                                    ?>
                                </ul>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>

        </div>



        <div class="wrapper_editor" style="margin-top: 25px">

            <div class="informations">
                <div class="element">
                    <?php
                        $users = $user -> getAllUsers();
                        $nbCart = 0;
                        $nbWish = 0;
                        foreach($users as $u){
                            $token = $u['token'];
                            if($shop -> checkOnCart($token, $shop -> getProduct($id ,'reference')) == true){
                                $nbCart ++;
                            }

                            if($user -> checkOnWishlist($u['ID'], $id) == true){
                                $nbWish ++;
                            }
                        }
                    ?>
                    Ce produit a été trouvé dans <strong><?= $nbWish ?></strong> listes de favoris <br>
                    Ce produit a été trouvé dans <strong><?= $nbCart ?></strong> paniers <br>
                </div>

            </div>
        </div>
    </div>

</section>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=333w018wxizh0ubffxs4nm7jjgdhv0m3l6ao84apq9tj59br"></script> <script> 
tinymce.init({
  selector: 'textarea',
  height: 300,
  menubar: false,	    
  theme: "modern",
  plugins: [
    'advlist autolink autoresize charmap textcolor colorpicker image imagetools preview searchreplace lists link anchor',
    'media paste code wordcount'
  ],
  toolbar: 'bold italic forecolor | image charmap | alignleft aligncenter alignright alignjustify | outdent indent bullist numlist | formatselect searchreplace removeformat preview',
  

});

</script>