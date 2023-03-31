<?php

?>
<?php
class adminLogin
{
    private $db;

    public function __construct()
    {

        $this->db = new Database();
    }

    public function login_admin($user, $pass)
    {
        $query = "SELECT * FROM admingv where adminUser = ? and adminPass = ? limit 1";
        $result = $this->db->testPassAdmin($query, $user, $pass);
        if ($result) {
            Session::set('adminloginQTDL', true);
            foreach ($result as $item) {
                Session::set('IdQTDL',  $item['adminId']);
                Session::set('NameQTDL', $item['adminName']);
                Session::set('UserQTDL', $item['adminUser']);
            }
            return $result;
        } else return false;
    }
}
?>