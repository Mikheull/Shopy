<section class="wrapper_content">
    
    <div class="head">
        <h2>Actions relatives a la <strong>base de données</strong></h2>
    </div>


    <div class="data_content settings">

        <div class="alert danger">
            <div class="head">
                <div class="icon"> <i class="fal fa-save"></i> </div>
                <span class="title"> Il est important de faire des sauvegardes régulièrement la base de données et de vérifier son contenu !</span>
            </div>
        </div>

        <button class="button_save_bdd button_create_save">Lancer une sauvegarde</button>
        <div class="save_content"></div>
    </div>

</section>



<script>

$( '.button_create_save' ).click(function() {
    console.log('sauvegarde en cours');
    $( '.button_save_bdd' ).html('<i class="fas fa-spinner fa-spin"></i> Sauvegarde en cours');
    $( '.button_save_bdd' ).addClass( 'button_loading_save' );
    $( '.button_save_bdd' ).removeClass( 'button_create_save' );

    $.ajax({
        url: 'controller/ajax/saveBDD.php',
        success:function(data){
            $(".save_content").html(data);
        }
    });

    // $( '.button_save_bdd' ).delay(10000).html('<i class="fas fa-check"></i> Sauvegarde réussie');
    // $( '.button_save_bdd' ).delay(10000).addClass( 'button_success_save' );
    // $( '.button_save_bdd' ).delay(10000).removeClass( 'button_loading_save' );

    

});

</script>