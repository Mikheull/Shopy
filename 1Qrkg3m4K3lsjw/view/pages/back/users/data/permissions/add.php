<?php
$valueType = "";
if(isset($_GET['type'])){$valueType = $_GET['type'];}
?>

<section class="wrapper_content">
    
    <div class="head">
        <h2>Les permissions > Création</h2>
        <div class="button_add"> <a href="?query=users&c=permissions" class="btn_cancel"> Cancel</a> </div>
    </div>


    <div class="data_content">
        <form action="?query=users&c=permissions" method="post">

            <div class="input_field">
                <label for="">Type de la permission</label>
                <input type="text" name="type" placeholder="Ex: view" value="<?= $valueType ;?>">
            </div>

            <div class="input_field">
                <label for="">Nom de la permission</label>
                <input type="text" name="permission" placeholder="Ex: view.product.1">
            </div>

            <button name="add_permission"><i class="fas fa-check"></i></button>
        </form>
    </div>

</section>
