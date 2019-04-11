<header class="top_header">
    <?php require ('view/components/header.php'); ?>
</header>


    <section class="body">

        <div class="container home">

            <div class="row justify-content-md-center">
                <div class="col-md-6 title">
                    <h2>Besoin d'aide ?</h2>
                </div>
            </div>


            <div class="row justify-content-md-center">
                <div class="col-md-8 search">
                    <div class="input_field">
                        <input type="search" placeholder="Rechercher un article">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>


            <div class="row justify-content-md-center">
                <div class="col help-container">
                    <div class="container">
                        <div class="row">
                            <?php
                                foreach($help -> getArticles() as $h){
                                    require('view/pages/help/pages/home/components/help-item.php') ;
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-md-center">
                <div class="col-md-6 lk">
                    <p>Vous ne trouvez pas de réponse ? <span>Envoyez nous un mail</span></p>
                </div>
            </div>

        </div>

    </section>


<footer>
    <?php require ('view/components/footer.php'); ?>
</footer>
