<?php

require('../../../database.php');
require('../../model/class/db_connect.php');
require('../../model/class/users.php');
require('../../controller/users.php');


$role = $_POST['role'];
$perm = $_POST['id'];
$user -> switchPermissionState($role, $perm);