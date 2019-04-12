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
            <tbody>
                <tr>
                    <td style="width: 5%"><?= $r['ID'] ;?></td>
                    <td style="width: 50%"><?= $r['name'] ;?></td>
                    <td style="width: 20%"><?= $r['category'] ;?></td>
                    <td style="width: 5%"><?= $r['quantity'] ;?></td>
                    <td style="width: 5%"><?= $r['price_ttc'] ;?></td>
                    <td style="width: 5%"><?= $r['parent'] ;?></td>
                    <td style="width: 5%"><?= $r['enable'] ;?></td>
                    <td style="width: 5%"> <a href="?query=shop&c=products&f=edit&product=<?= $r['ID'] ;?>" title="Editer le produit <?= $r['name'] ;?>"> <i class="fas fa-ellipsis-h"> </i> </a> </th>
                </tr>
            </tbody>
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