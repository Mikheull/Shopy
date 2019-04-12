<section class="wrapper_content">
    
    <div class="head">
        <h2>Les catégories > Création</h2>
        <div class="button_add"> <a href="?query=shop&c=category" class="btn_cancel"> Cancel</a> </div>
    </div>


    <div class="data_content">
        <div class="selecter category">
            <div class="title">
                <h3>Choisir le type de catégories</h3>
            </div>
            <div class="container">
                <div class="selecter_radio">
                    <input type="radio" name="category_type" id="super" checked> <label for="super">Super</label>
                    <input type="radio" name="category_type" id="main"> <label for="main">Main</label>
                    <input type="radio" name="category_type" id="normal"> <label for="normal">Normal</label>
                </div>

                <div class="selecter_content">
                    <div id="super_sel" class="sel" hidden> </div>
                    <div id="main_sel" class="sel" hidden>

                        <select name="mainCategory">
                            <option> NULL </option>
                            <?php
                                foreach($shop -> getAllSuperCategory() as $r){
                                    ?> <option value="<?= $r['ID'] ;?>"><?= $r['name'] ;?></option> <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div id="normal_sel" class="sel" hidden>
                        <select name="pre-normalCategory">
                            <option> NULL </option>
                            <?php
                                foreach($shop -> getAllSuperCategory() as $r){
                                    ?> <option value="<?= $r['ID'] ;?>"><?= $r['name'] ;?></option> <?php
                                }
                            ?>
                        </select>
                        <select name="normalCategory"> </select>
                    </div>
                </div>

            </div>
        </div>

        <div class="creator category">
            <div class="title">
                <h3>Créer les catégories</h3>
            </div>
            <div class="container">
                <form action="" method="post">
                    <input type="hidden" name="mode" value="super">
                    <input type="hidden" name="parentID" value="0">
                    <div class="field_wrapper">
                        <div>
                            <input type="text" name="field_name[]" value=""/>
                            <a href="javascript:void(0);" class="addField_button" title="Add field"> <i class="fas fa-plus-circle"></i> </a>
                        </div>
                    </div>
                    <button name="createCategory_button"><i class="fas fa-check"></i></button>
                </form>
            </div>
        </div>
    </div>

</section>



<script>




    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.addField_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div> <input type="text" name="field_name[]" value=""/> <a href="javascript:void(0);" class="removeField_button"> <i class="fas fa-minus-circle"></i> </a></div>'; //New input field html 
        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });
        
        //Once remove button is clicked
        $(wrapper).on('click', '.removeField_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });

    });


    $( "input[name='category_type']" ).change(function() {
       $( ".sel" ).hide();
       $( "#"+ this.id +"_sel" ).show();
       $( "input[name='mode']" ).val(this.id);
    });



    $( "select[name='mainCategory']" ).change(function() {
        var value = $( this ).val();
       $( "input[name='parentID']" ).val(value);
    });

    $( "select[name='pre-normalCategory']" ).change(function() {
        var value = $( this ).val();
        $( "input[name='parentID']" ).val(value);

        $.ajax({
            url: 'controller/ajax/select/getCategoryList.php',
            type: 'POST',
            data: {val: value},
            success:function(data){
                $("select[name='normalCategory']").html(data);
            }
        });
    });

    $( "select[name='normalCategory']" ).change(function() {
        var value = $( this ).val();
       $( "input[name='parentID']" ).val(value);
    });

</script>