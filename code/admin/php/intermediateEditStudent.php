<?php
include_once "../../lib/database.php";
include_once "../../class/student.php";
$_POST = json_decode(array_keys($_POST)[0], true);

$input_id_student = str_replace("_", " ", $_POST['input_id_student']);
$input_name_student = str_replace("_", " ", $_POST['input_name_student']);
$input_gender_student = str_replace("_", " ", $_POST['input_gender_student']);
$input_birth_student = str_replace("_", " ", $_POST['input_birth_student']);
$student_des = str_replace("_", " ", $_POST['student_des']);

$select_class_student = $_POST['select_class_student'];
$select_school_student = $_POST['select_school_student'];

$format_value_select_class = str_replace("_", " ", $select_class_student);
$format_value_select_school = str_replace("_", " ", $select_school_student);

$student = new student();
$result = $student->updateStudent(
    $input_id_student,
    $input_name_student,
    $input_gender_student,
    $input_birth_student,
    $student_des,
    $format_value_select_class,
    $format_value_select_school
);
if ($result) {
    echo true;
    exit;
}
echo 0;
