<?php
include_once "../../lib/database.php";
include_once "../../class/student.php";
$_POST = json_decode(array_keys($_POST)[0], true);
$mssv = $_POST['student_id'];
$student = new Student();
$deleteStudent = $student->deleteStudent($mssv);
if ($deleteStudent) {
    echo true;
    exit;
}
echo 0;
