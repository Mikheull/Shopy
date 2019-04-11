<div class="container">

    <?php
        if($main -> getSetting('product_sort') == true){
            ?>
            <div class="row">
                <div class="col">
                    <div class="settings">
                        <a class="tpy-filter">Options <i class="fas fa-sliders-h"></i></a>
                    </div>
                </div>
            </div>
            <?php
        }
    ?>

    <div class="row menu">
        <ul>
            <?php
            foreach($shop -> getAllMainCategory($categoryname) as $categoryMain){
                ?>  
                <div class="col">

                    <li> 
                        <a title="Dérouler le menu" class="sub_menu_button"> <?= $categoryMain['name'] ;?> <span class="down"> <i class="fas fa-angle-up"></i> </span> </a>
                        <div class="submenu sub-hidden">
                            <ul>
                                <?php
                                    foreach($shop -> getAllNormalCategory($categoryMain['ID']) as $categoryNormal){
                                        ?> 
                                            <li> <a href="<?= $correctSlug ;?>shop/categorie/<?= $categoryname.'/'.$categoryMain['name'].'/'.$categoryNormal['name'] ;?>"><?= $categoryNormal['name'] ;?></a> </li> 
                                        <?php
                                    }
                                ?>
                                <li> <a href="<?= $correctSlug ;?>shop/categorie/<?= $categoryname.'/'.$categoryMain['name'] ;?>" style="color: #4e52ab"><i class="fas fa-ellipsis-h"></i> Voir tout</a> </li>
                            </ul>
                        </div>
                    </li>

                </div>
                <?php
            }
            ?>
        </ul>
    </div>

</div>
