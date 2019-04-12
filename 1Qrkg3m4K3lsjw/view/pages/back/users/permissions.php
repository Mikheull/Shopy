<section class="wrapper_content">
    
    <div class="head">
        <h2>Les permissions</h2>
        <div class="button_add"> <a href="?query=users&c=permissions&f=add" class="btn"><i class="fas fa-plus"></i> Nouvelle permission</a> </div>
    </div>

    <div class="data_content">
        <?php
            $types = $user -> getAllPermissionsType();

               
            foreach($types as $type){
                ?>
                <div class="role_group">
                    <div class="title">
                        <h3>Type : <?= $type ;?></h3>
                        <a href="?query=users&c=permissions&f=add&type=<?= $type ;?>" class="button"><i class="fas fa-plus"></i></a>
                    </div>

                    <div class="container">
                    <?php
                    foreach($user -> getAllPermissionsPerType($type) as $perm){
                        ?>
                        <div class="item">
                            <div class="perm"><?= $perm['permission'] ;?></div>
                        </div>
                        <?php
                    }
                    ?>
                    </div>
                </div>
                <?php
            }

            
        ?>
    </div>
</section>