<header class="top_header">
    <?php require ('view/components/header.php'); ?>
</header>


    <section class="body">
        <div class="container article">
            <div class="container">
                <div class="row justify-content-md-center head">
                    <div class="col-md-10 title">
                        <h2><?= $help -> getArticle($reference, 'name') ;?></h2>
                    </div>
                    <div class="col-md-10 subtitle">
                        <p>Dernière mise à jour le <strong><?= date("j F Y", strtotime($h['update_date'])) ;?></strong> par <strong><?= $user -> getCustUserConnect($h['author'], 'first_name') ;?> <?= $user -> getCustUserConnect($h['author'], 'name') ;?></strong> </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10 text">
                        <div class="wysiwyg"> <?= html_entity_decode($help -> getArticle($reference, 'text')) ;?> </div>
                    </div>
                </div>
            </div>

            <div class="spacer"></div>

        </div>
    </section>


<footer>
    <?php require ('view/components/footer.php'); ?>
</footer>
