<?php
    $id = $_GET['category'];
?>




<section class="wrapper_content">
    
    <div class="head">
        <h2>Les catégories > Edition</h2>
        <div class="button_add"> <a href="?query=shop&c=category" class="btn_cancel"> Cancel</a> </div>
    </div>


    <div class="data_content">
        <div class="wrapper_infos">
            <div class="numberElements"> Catégorie : <?= $shop -> getCategory($id ,'name'); ?> </div>
        </div>

        <div class="wrapper_editor">

            <div class="edit_container">
                <form method="POST">
                    <div class="input_field">
                        <label for="category_name">Changer le nom de la catégorie</label>
                        <div class="pre-input-d">
                            <?php
                                if($shop -> getCategoryType($id) == 'super'){
                                    $uri = 'Shopy/shop'.$seperator.'categorie'.$seperator;
                                }else if($shop -> getCategoryType($id) == 'main'){
                                    $uri = 'Pas d\'URL';
                                }else{
                                    $sndparent = $shop -> getCategory($id ,'parent');
                                    $parent = $shop -> getCategory($sndparent ,'parent');

                                    $uri = 'Shopy/shop'.$seperator.'categorie'.$seperator.$shop -> getCategory($parent ,'name').$seperator.$id.$seperator;
                                }
                            ?>
                            <?= $uri ;?>
                        </div>
                        <input type="text" id="category_name" name="category_name" placeholder="Nom de la catégorie" value="<?= $shop -> getCategory($id ,'name') ;?>">
                    </div>
                    <input type="hidden" name="category" value="<?= $id ;?>">
                    <button class="button" name="renameCategory_button">Sauvegarder</button>
                </form>
            </div>


            <div class="edit_container">
                <div class="title">
                    <h3>Status de la catégorie</h3>
                </div>
                <div class="content">
                    <?php 
                        $name = "enable"; 
                        $check = "";
                        if($shop -> getCategory($id ,'enable') == true){ $check = "checked"; }
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
                <form action="?query=shop&c=category" method="post" class="delete">
                    <input type="hidden" name="category" value="<?= $id ;?>">
                    <button name="deleteCategory_button"> Supprimer </button>
                </form>
            </div>
        </div>



        <div class="wrapper_editor" style="margin-top: 25px">

            <div class="informations">
                <div class="element">
                    <?php
                        if($shop -> getCategoryType($id) == 'super'){
                            ?> <p>Cette catégorie est une <strong>Super</strong> catégorie</p> <?php
                        }else if($shop -> getCategoryType($id) == 'main'){
                            ?> <p>Cette catégorie est une sous-catégorie de la catégorie <strong> <?= $shop -> getCategory($shop -> getCategory($id ,'parent') ,'name')?> </strong> </p> <?php
                        }else{
                            ?> <p>Cette catégorie est une sous-catégorie de la catégorie <strong> <?= $shop -> getCategory($shop -> getCategory($id ,'parent') ,'name')?> </strong> qui est elle même une sous-catégorie de <strong> <?= $shop -> getCategory($shop -> getCategory($sndparent ,'parent') ,'name') ?> </strong> </p> <?php
                        }
                    ?>
                </div>

                <?php
                    if($shop -> getCategoryType($id) == 'normal'){
                        
                        $all = $shop -> getAllProduct();
                        $count = count($all);
                        $nb = 0;
                        foreach($all as $a){
                            if($a['category'] == $id){
                                $nb ++;
                            }
                        }

                        $percent = $nb * 100 / $count;
                        ?>

                        <div class="element">
                            <p> Il y a <strong><?= $nb ;?></strong> produits dans cette catégorie. </p>
                            <ul>
                                <?php
                                foreach($all as $a){
                                    if($a['category'] == $id){
                                        ?> <li> <a href="?query=shop&c=products&f=edit&product=<?= $a['ID'] ;?>"><?= $a['name'] ;?></a> </li> <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        
                        <div class="element">
                            <p>Cette catégorie représente <strong><?= floor($percent) ;?>%</strong> du total des produits de la boutique, soit (<?= $nb ?>/<?= $count ?>)</p>
                            <div class="indicator">
                                <div class="full_bar"></div>
                                <div class="percent_bar" style="width:<?= floor($percent) ;?>%"></div>
                            </div>
                        </div>
                <?php
                    }
                ?>

            </div>
        </div>
    </div>

</section>
