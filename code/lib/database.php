
<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

include_once __DIR__ . '/../config/config.php';
?>
<?php
class Database
{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;

    public $link;
    public $error;

    public function __construct()
    {
        $this->connectDB();
    }

    private function connectDB()
    {

        try {
            $this->link = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
    // Password
    public function testPassAdmin($query, $user, $pass)
    {
        $row = $this->link->prepare($query);
        $row->execute([$user, $pass]);
        $count = $row->rowCount();
        $value = $row->fetchAll(PDO::FETCH_ASSOC);
        if ($count > 0) {
            return $value;
        } else
            return false;
    }
    public function updatePass($query, $newpass)
    {
        $update_row = $this->link->prepare($query);
        $update_row->execute([$newpass]);
        if ($update_row) {
            return $update_row;
        }
        return false;
    }
    public function testOldPass($query, $oldpass)
    {
        $row = $this->link->prepare($query);
        $row->execute([$oldpass]);
        if ($row->rowCount() > 0) {
            return $row;
        }
        return false;
    }
    // Show Info vd khoa, lop,...
    public function show_info_db($query)
    {
        $row = $this->link->prepare($query);
        $row->execute();
        $row = $row->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    public function get_lop($query, $maLop)
    {
        $row = $this->link->prepare($query);
        $row->execute([$maLop]);
        $row = $row->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function get_khoa($query, $maKhoa)
    {
        $row = $this->link->prepare($query);
        $row->execute([$maKhoa]);
        $row = $row->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function get_HP($query, $maHP)
    {
        $row = $this->link->prepare($query);
        $row->execute([$maHP]);
        $row = $row->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function get_ket_qua($query, $mssv)
    {
        $row = $this->link->prepare($query);
        $row->execute([$mssv]);
        $row = $row->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    public function get_ket_qua_by_school($query, $maKhoa)
    {
        $row = $this->link->prepare($query);
        $row->execute([$maKhoa]);
        $row = $row->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    public function show_HP_By_Student($query, $mssv)
    {
        $row = $this->link->prepare($query);
        $row->execute([$mssv]);
        $row = $row->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function insert_subject(
        $query,
        $input_id_subject,
        $input_name_subject,
        $input_credits_subject,
        $input_lab_subject,
        $input_theory_subject
    ) {
        $insert = $this->link->prepare($query);
        $insert->execute([
            $input_id_subject,
            $input_name_subject,
            $input_credits_subject,
            $input_lab_subject,
            $input_theory_subject
        ]);
        return $insert;
    }
    public function insert_school(
        $query,
        $input_id_school,
        $input_name_school
    ) {
        $insert = $this->link->prepare($query);
        $insert->execute([
            $input_id_school,
            $input_name_school
        ]);
        return $insert;
    }
    public function insert_class(
        $query,
        $maLop,
        $tenLop,
        $maKhoa
    ) {
        $insert = $this->link->prepare($query);
        $insert->execute([
            $maLop,
            $tenLop,
            $maKhoa
        ]);
        return $insert;
    }
    // student 
    public function add_student(
        $query,
        $input_id_student,
        $input_name_student,
        $input_gender_student,
        $input_birth_student,
        $student_des,
        $select_class_student,
        $select_school_student
    ) {
        $insert = $this->link->prepare($query);
        $insert->execute([
            $input_id_student,
            $input_name_student,
            $input_gender_student,
            $input_birth_student,
            $student_des,
            $select_class_student,
            $select_school_student
        ]);
        return $insert;
    }
    public function update_student(
        $query,
        $input_id_student,
        $input_name_student,
        $input_gender_student,
        $input_birth_student,
        $student_des,
        $select_class_student,
        $select_school_student
    ) {
        $update = $this->link->prepare($query);
        $update->execute([
            $input_id_student,
            $input_name_student,
            $input_gender_student,
            $input_birth_student,
            $student_des,
            $select_class_student,
            $select_school_student
        ]);
        return $update;
    }
    public function search_student($query, $mssv)
    {
        $row = $this->link->prepare($query);
        $row->execute([$mssv]);
        $result = $row->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function delete_student($query, $mssv)
    {
        $delete = $this->link->prepare($query);
        $delete->execute([$mssv]);
        return $delete;
    }
    public function get_student_by_id($query, $mssv)
    {
        $row = $this->link->prepare($query);
        $row->execute([$mssv]);
        $row = $row->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function show_mark_by_student($query, $mssv)
    {
        $row = $this->link->prepare($query);
        $row->execute([$mssv]);
        $row = $row->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    // mark 
    public function add_mark_student($query, $mssv, $maHP, $markStudent)
    {
        $row = $this->link->prepare($query);
        $row->execute([$mssv, $maHP, $markStudent]);
        return $row;
    }
    // quantity
    public function quantity_School($query)
    {
        $row = $this->link->prepare($query);
        $row->execute();
        $result = $row->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function quantity_class($query)
    {
        $row = $this->link->prepare($query);
        $row->execute();
        $result = $row->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
