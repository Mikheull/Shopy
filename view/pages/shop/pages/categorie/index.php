<header class="top_header">
    <?php require ('view/components/header.php'); ?>
</header>


    <section class="body">
        
        <div class="container">
            <div class="row"> 
                <div class="col-md-3 offset-md-0">
                    <section class="category_menu">
                        <?php require('view/pages/shop/pages/categorie/components/category_menu.php') ;?>
                    </section>
                </div>

                <div class="col-md-9 col-sm-12 col-12">
                    <section class="products_list">
                        <?php require('view/pages/shop/pages/categorie/components/products_list.php') ;?>
                    </section>
                </div>
            </div>
        </div>

    </section>


<footer>
    <?php require ('view/components/footer.php'); ?>
</footer>
