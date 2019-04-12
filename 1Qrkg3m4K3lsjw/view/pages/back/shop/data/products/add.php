<section class="wrapper_content">
    
    <div class="head">
        <h2>Les produits > Création</h2>
        <div class="button_add"> <a href="?query=shop&c=products" class="btn_cancel"> Cancel</a> </div>
    </div>

    <div class="step_nav">
        <nav>
            <ul>
                <li> <a data-type="general" class="active">General</a> </li>
                <li> <a data-type="quantity">Quantité</a> </li>
                <li> <a data-type="features">Caractéristiques</a> </li>
                <li> <a data-type="variations">Déclinaisons</a> </li>
                <li> <a data-type="price">Prix</a> </li>
                <li> <a data-type="seo">SEO</a> </li>
                <li> <a data-type="options">Options</a> </li>
            </ul>
        </nav>
    </div>

    <div class="data_content">
        <div class="creator product">
            <form action="" method="post" enctype="multipart/form-data">

                <?php
                    require ('views/components/pages/back/shop/data/products/add/general.php');
                    require ('views/components/pages/back/shop/data/products/add/quantity.php');
                    require ('views/components/pages/back/shop/data/products/add/features.php');
                    require ('views/components/pages/back/shop/data/products/add/variations.php');
                    require ('views/components/pages/back/shop/data/products/add/price.php');
                    require ('views/components/pages/back/shop/data/products/add/seo.php');
                    require ('views/components/pages/back/shop/data/products/add/options.php');
                ?>
                
                <div class="step_foot">
                    <div class="button_add add_product"> <input type="submit" name="add_product" value="Créer"> </div>
                </div>

            </form>
        </div>
    </div>

    <div id="test"></div>

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