<?php
include_once "../../lib/database.php";
include_once "../../class/info-public.php";
$_POST = json_decode(array_keys($_POST)[0], true);
$class = new info();

$maLop = $_POST['input_id_class'];
$tenLop = str_replace("_", " ", $_POST['input_name_class']);
$maKhoa = str_replace("_", " ", $_POST['select_school_class']);


$insertClass = $class->insertClass(
    $maLop,
    $tenLop,
    $maKhoa
);
if ($insertClass) {
    echo true;
    exit;
}
echo 0;
