<section class="wrapper_content">
    
    <div class="head">
        <h2>Les pages d'aide > Création</h2>
        <div class="button_add"> <a href="?query=help" class="btn_cancel"> Cancel</a> </div>
    </div>


    <div class="data_content">
        <form action="" method="POST">

            <div class="step">
                <span class="pre-title">Choisir un nom</span> <br>
                <div class="input_field">
                    <input type="text" name="name" id="name" placeholder="Saisissez un nom pour votre produit">
                </div>
            </div>

            <div class="step">
                <span class="pre-title">Url</span> <br>
                <div class="input_field">
                    <input type="text" name="url" id="url" placeholder="Url de la page">
                </div>
            </div>

            <div class="step">
                <span class="pre-title">Ecrire le texte</span> <br>
                <div class="input_field" style="width: 70%">
                    <textarea name="text" id="text" cols="30" rows="10" placeholder="..."></textarea>
                </div>
            </div>
        
            <div class="step_foot">
                <div class="button_add add_help"> <input type="submit" name="add_help" value="Créer"> </div>
            </div>
        </form>



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