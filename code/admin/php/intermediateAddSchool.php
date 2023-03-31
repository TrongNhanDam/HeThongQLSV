<?php
include_once "../../lib/database.php";
include_once "../../class/info-public.php";
$_POST = json_decode(array_keys($_POST)[0], true);
$school = new info();

$input_id_school = str_replace("_", " ", $_POST['input_id_school']);
$input_name_school = str_replace("_", " ", $_POST['input_name_school']);


$insertSchool = $school->insertSchool(
    $input_id_school,
    $input_name_school
);
if ($insertSchool) {
    echo true;
    exit;
}
echo 0;
