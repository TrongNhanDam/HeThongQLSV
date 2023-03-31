
<?php
class quantity
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function quantitySchool()
    {
        $query = "select k.maKhoa, k.tenKhoa, count(*) soSV
            from khoa k INNER JOIN sinhvien s ON k.maKhoa = s.maKhoa
            group by tenKhoa";
        $result = $this->db->quantity_school($query);
        return $result;
    }
    public function quantityClass()
    {
        $query = "select l.maLop, l.tenLop, count(*) soSV
        from lop l INNER JOIN sinhvien s ON s.maLop = l.maLop
        group by maLop";
        $result = $this->db->quantity_class($query);
        return $result;
    }
}
