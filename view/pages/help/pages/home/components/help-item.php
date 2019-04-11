<div class="col-12 col-10 help-item">
    <div class="container">
        <a href="<?= $correctSlug ;?>help/<?= $h['url'] ;?>" class="row">
            <div class="col-1 icon">
                <?= $h['name'][0] ;?>
            </div>
            <div class="col-11 content">
                <div class="container">
                    <div class="row">
                        <div class="col-8 name"> <?= $h['name'] ;?> </div>
                        <div class="col-4 inf"> Dernière mise à jour le <strong><?= date("j F Y", strtotime($h['update_date'])) ;?></strong> par <strong><?= $user -> getCustUserConnect($h['author'], 'first_name') ;?> <?= $user -> getCustUserConnect($h['author'], 'name') ;?></strong> </div>
                    </div>

                    <div class="row">
                        <div class="col-12 text">
                            <?= $h['name'] ;?>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>