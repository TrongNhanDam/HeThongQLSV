<?php
include_once "../../lib/database.php";
include_once "../../class/mark.php";

$_POST = json_decode(array_keys($_POST)[0], true);

$mssv = $_POST['select_student_mark'];
$maHP = $_POST['select_subjects_mark'];
$markStudent = $_POST['input_mark'];

$mark = new mark();
$result = $mark->addMarkStudent(
    $mssv,
    $maHP,
    $markStudent,
);
if ($result) {
    echo true;
    exit;
}
echo 0;
