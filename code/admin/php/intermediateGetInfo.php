<?php
include_once "../../lib/database.php";
include_once "../../class/info-public.php";

$_POST = json_decode(array_keys($_POST)[0], true);

$info = new info();
$result = $info->showHPByStudent($_POST['mssv']);
if ($result) {
    echo $result;
    exit;
}
echo 0;
