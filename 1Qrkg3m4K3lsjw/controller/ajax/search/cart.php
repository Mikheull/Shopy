<?php

require('../../../../database.php');
require('../../../model/class/db_connect.php');
require('../../../model/class/shop.php');
require('../../../controller/shop.php');

$type = $_POST['type'];
$query = $_POST['query'];
$keyword = $_POST['keyword'];
$param = $_POST['param'];

$request_query = $shop -> search($type, $query, $keyword, $param);
if(empty($request_query)){
    ?> 
    <div class="no-data">
        <div class="icon"> <i class="fas fa-exclamation"></i> </div>
        <div class="text">Aucun résultat trouvé pour la recherche</div>
        <div class="table_return"> <span>Refresh</span> </div>
    </div>
    <?php
}else{
    foreach($request_query as $r){
        ?> 
        <table>
            <?php require ('../../../views/components/pages/back/carts/data/vue_item.php'); ?>
        </table>
        <?php
    }
}

?>

<script>
$( ".table_return" ).click(function() {
    $(".table_search input").val('');
    $("#searchOutput").load(location.href + " #searchOutput");
})
</script>