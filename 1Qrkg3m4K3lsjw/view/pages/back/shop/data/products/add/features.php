<div class="wrapper_step-category" id="features">
    
    <div class="step">
        <span class="pre-title">Tailles</span> <br>
        <div class="input_field">
            <?php
                foreach($shop -> getAllAttributs() as $attr){
                    if($attr['type'] == 'size'){
                        ?>
                        <input type="checkbox" name="sizes[]" value="<?= $attr['ID'] ;?>"> <?= $attr['name'] ;?> <br> 
                        <?php
                    }
                }
            ?> 
        </div>
    </div>

</div>