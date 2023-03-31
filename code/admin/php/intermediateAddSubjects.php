<?php
include_once "../../lib/database.php";
include_once "../../class/info-public.php";
$_POST = json_decode(array_keys($_POST)[0], true);
$subject = new info();
$input_id_subject = str_replace("_", " ", $_POST['input_id_subject']);
$input_name_subject = str_replace("_", " ", $_POST['input_name_subject']);
$input_credits_subject = str_replace("_", " ", $_POST['input_credits_subject']);
$input_lab_subject = str_replace("_", " ", $_POST['input_lab_subject']);
$input_theory_subject = str_replace("_", " ", $_POST['input_theory_subject']);


$insertSubject = $subject->insertSubject(
    $input_id_subject,
    $input_name_subject,
    $input_credits_subject,
    $input_lab_subject,
    $input_theory_subject
);
if ($insertSubject) {
    echo true;
    exit;
}
echo 0;
