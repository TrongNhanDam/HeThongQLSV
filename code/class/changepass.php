<?php

?>
<?php
class changepass
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function testOldPass($old_pass)
    {
        $query = "SELECT * FROM admingv where adminPass = ?";
        $result = $this->db->testOldPass($query, $old_pass);
        if ($result)
            return $result;
        return false;
    }
    public function updatePass($newpass)
    {
        $query = "UPDATE admingv set adminPass = ? ";
        $result = $this->db->updatePass($query, $newpass);
        if ($result)
            return $result;
        return false;
    }
}
