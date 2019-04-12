<?php
    $id = $_GET['attr'];
?>

<section class="wrapper_content">
    
    <div class="head">
        <h2>Les attributs > Edition</h2>
        <div class="button_add"> <a href="?query=shop&c=attributs" class="btn_cancel"> Cancel</a> </div>
    </div>


    <div class="data_content">
        <div class="wrapper_infos">
                <div class="numberElements"> Attributs : <?= $shop -> getAttribut($id ,'name'); ?> </div>
            </div>

            <div class="wrapper_editor">

                <div class="edit_container">
                    <form method="POST">
                        <div class="input_field">
                            <label for="attr_name">Changer la valeur de l'attribut</label>
                            <div class="pre-input-d">
                                Type = <?= $shop -> getAttribut($id ,'type'); ;?>
                            </div>
                            <input type="text" id="attr_name" name="attr_name" placeholder="Nom de l'attribut" value="<?= $shop -> getAttribut($id ,'name') ;?>">
                        </div>
                        <input type="hidden" name="attribut" value="<?= $id ;?>">
                        <button class="button" name="editAttribut_button">Sauvegarder</button>
                    </form>
                </div>


                <div class="edit_container">
                    <div class="title">
                        <h3>Status de l'attribut</h3>
                    </div>
                    <div class="content">
                        <?php 
                            $name = "enable"; 
                            $check = "";
                            if($shop -> getAttribut($id ,'enable') == true){ $check = "checked"; }
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
                    <form action="?query=shop&c=attributs" method="post" class="delete">
                        <input type="hidden" name="attribut" value="<?= $id ;?>">
                        <button name="deleteAttribut_button"> Supprimer </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
