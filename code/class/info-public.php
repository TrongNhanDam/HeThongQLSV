
<?php
class info
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function showKhoa()
    {
        $query = "SELECT * FROM khoa";
        $result = $this->db->show_info_db($query);
        return $result;
    }
    public function showLop()
    {
        $query = "SELECT * FROM lop";
        $result = $this->db->show_info_db($query);
        return $result;
    }
    public function showHP()
    {
        $query = "SELECT * FROM hocphan";
        $result = $this->db->show_info_db($query);
        return $result;
    }
    public function showKetQua($mssv)
    {
        $query = "SELECT * FROM ketqua where mssv = ?";
        $result = $this->db->get_ket_qua($query, $mssv);
        return $result;
    }
    public function showKetQuaBySchool($maKhoa)
    {
        $query = "Call BangDiemTB(?)";
        $result = $this->db->get_ket_qua_by_school($query, $maKhoa);
        return $result;
    }
    public function getTenLop($maLop)
    {
        $query = "SELECT * FROM lop where maLop = ?";
        $result = $this->db->get_lop($query, $maLop);
        return $result;
    }
    public function getTenKhoa($maKhoa)
    {
        $query = "SELECT * FROM khoa where maKhoa = ?";
        $result = $this->db->get_khoa($query, $maKhoa);
        return $result;
    }
    public function getHP($maHP)
    {
        $query = "SELECT * FROM hocphan where maHP = ?";
        $result = $this->db->get_HP($query, $maHP);
        return $result;
    }


    public function insertSubject(
        $input_id_subject,
        $input_name_subject,
        $input_credits_subject,
        $input_lab_subject,
        $input_theory_subject
    ) {
        $query = "CALL ThemHP(?,?,?,?,?)";
        $result = $this->db->insert_subject(
            $query,
            $input_id_subject,
            $input_name_subject,
            $input_credits_subject,
            $input_lab_subject,
            $input_theory_subject
        );
        return $result;
    }
    public function insertSchool(
        $input_id_school,
        $input_name_school
    ) {
        $query = "CALL ThemKhoa(?,?)";
        $result = $this->db->insert_school(
            $query,
            $input_id_school,
            $input_name_school
        );
        return $result;
    }
    public function insertClass(
        $maLop,
        $tenLop,
        $maKhoa
    ) {
        $query = "CALL ThemLop(?,?,?)";
        $result = $this->db->insert_class(
            $query,
            $maLop,
            $tenLop,
            $maKhoa
        );
        return $result;
    }
}
