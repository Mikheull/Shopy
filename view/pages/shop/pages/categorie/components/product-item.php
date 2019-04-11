<div class="col-md-3 product_item">
    <?php
        $datetime1 = new DateTime($product['date']);
        $datetime2 = new DateTime(date('Y-m-j'));
        $interval = $datetime1->diff($datetime2);
        $diff = $interval->format('%R%a days');

        if($diff < $main -> getSetting('number_day_for_new_product')){
            ?> <div class="badge"> <div class="badge-newest"> <span>Nouveau</span> </div> </div>  <?php
        }
    ?>

    
    
    <div class="image"> 
        <a href="<?= $link_product ;?>"> <img src="<?= $correctSlug ;?>dist/uploads/<?= $path_image ;?>" width="100%" alt="<?= $legend_image ;?>">  </a>
        <div class="actions">
            <div class="buttonWishlist <?= $display ;?>" data-id="<?= $product['ID'] ;?>"> <i class="far fa-heart"></i> </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12"> <a href="<?= $correctSlug.$link_product ;?>"> <div class="title"> <?= $product['name'] ;?> </div> </a> </div>
            <div class="col-12"> <a href="<?= $correctSlug.$link_product ;?>"> <div class="price"> <?= $shop -> getProductPrice($product['price_ttc']) ;?> € </div> </a> </div>
        </div>
    </div>
</div>