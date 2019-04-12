<?php
require('../../../../database.php');
require('../../../model/class/db_connect.php');
require('../../../model/class/shop.php');
require('../../../controller/shop.php');

$val = $_POST['val'] ;
$category = $shop -> getAllMainCategory($val);

echo '<option> NULL </option>';
foreach($category as $r){
    ?> <option value="<?= $r['ID'] ;?>"><?= $r['name'] ;?></option> <?php
}
