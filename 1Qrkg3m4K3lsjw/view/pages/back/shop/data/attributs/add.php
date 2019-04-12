<?php
$valueType = "";
if(isset($_GET['type'])){$valueType = $_GET['type'];}
?>

<section class="wrapper_content">
    
    <div class="head">
        <h2>Les attributs > Création</h2>
        <div class="button_add"> <a href="?query=shop&c=attributs" class="btn_cancel"> Cancel</a> </div>
    </div>


    <div class="data_content">
        <form method="post">

            <div class="input_field">
                <label for="">Type de l'attribut</label>
                <input type="hidden" name="type" value="<?= $valueType ;?>">
                <input type="text" disabled value="<?= $valueType ;?>">
            </div>

            <div class="input_field">
                <label for="">Nom de l'attribut</label>
                <input type="text" name="attribut" placeholder="Ex: name">
            </div>

            <?php  
                if($valueType == "color"){
                    ?>
                    <div class="input_field">
                        <label for="">Code couleur</label>
                        <input type="color" name="color_code">
                    </div>
                    <?php
                }
            ?>

            <button name="add_attribut"><i class="fas fa-check"></i></button>
        </form>
    </div>

</section>
