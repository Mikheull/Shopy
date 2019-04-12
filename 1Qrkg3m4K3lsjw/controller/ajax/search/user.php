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
                <td style="width: 10%"><?= $r['first_name'] ;?></td>
                <td style="width: 10%"><?= $r['name'] ;?></td>
                <td style="width: 20%"><?= $r['mail'] ;?></td>
                <td style="width: 5%"><?= $r['role'] ;?></td>
                <td style="width: 20%"><?= $r['token'] ;?></td>
                <td style="width: 10%"><?= $r['date_inscription'] ;?></td>
                <td style="width: 10%"><?= $r['date_last-visit'] ;?></td>
                <td style="width: 5%"><?= $r['enable'] ;?></td>
                <td style="width: 5%"> <a href="?query=users&c=clients&f=edit&client=<?= $r['ID'] ;?>" title="Editer l'utilisateur <?= $r['name'] ;?>"> <i class="fas fa-ellipsis-h"> </i> </a> </td>
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