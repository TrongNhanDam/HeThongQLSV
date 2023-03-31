
<?php
class student
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function addStudent(
        $input_id_student,
        $input_name_student,
        $input_gender_student,
        $input_birth_student,
        $student_des,
        $select_class_student,
        $select_school_student
    ) {
        $query = "call ThemSV(?,?,?,?,?,?,?)";
        $result = $this->db->add_student(
            $query,
            $input_id_student,
            $input_name_student,
            $input_gender_student,
            $input_birth_student,
            $student_des,
            $select_class_student,
            $select_school_student
        );
        return $result;
    }
    public function showStudent()
    {
        $query = "SELECT * FROM sinhvien";
        $result = $this->db->show_info_db($query);
        return $result;
    }
    public function showMarkByStudent($mssv)
    {
        $query = "Call diemTB(?)";
        $result = $this->db->show_mark_by_student($query, $mssv);
        return $result;
    }

    public function getStudentById($mssv)
    {
        $query = "SELECT * FROM sinhvien where mssv = ?";
        $result = $this->db->get_student_by_id($query, $mssv);
        return $result;
    }
    public function updateStudent(
        $input_id_student,
        $input_name_student,
        $input_gender_student,
        $input_birth_student,
        $student_des,
        $select_class_student,
        $select_school_student
    ) {
        $query = "call SuaSV(?,?,?,?,?,?,?)";
        $result = $this->db->update_student(
            $query,
            $input_id_student,
            $input_name_student,
            $input_gender_student,
            $input_birth_student,
            $student_des,
            $select_class_student,
            $select_school_student
        );
        return $result;
    }
    public function deleteStudent($mssv)
    {
        $query = "call XoaSV(?)";
        $result = $this->db->delete_student($query, $mssv);
        return $result;
    }
    public function searchStudent($mssv)
    {
        $query = "SELECT * FROM sinhvien s INNER JOIN khoa k ON k.makhoa = s.makhoa INNER JOIN lop l on l.malop=s.malop  WHERE s.mssv= ?";
        $result = $this->db->search_student($query, $mssv);
        return $result;
    }
}
