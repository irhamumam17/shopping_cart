<?php
namespace Models;
use Helper\Database;
class Users{
    private $db;
    private $table_name = 'users';
    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    function login($email,$pass){
        $sql = "SELECT * FROM ".$this->table_name." WHERE email = '".$email."' AND pass = '".$pass."'";
        $exec = $this->db->query($sql);
        if($exec->num_rows > 0){
			$row = $exec->fetch_assoc();
			return [
				'error' => false,
				'data' => $row
			];
		}else{
			return [
				'error' => true,
				'message' => 'Data tidak dapat ditemukan.'
			];
		}
    }
    public function save($nama,$email,$pass) {
        $sql = "INSERT INTO " . $this->table_name . "(nama,email,pass) VALUES('".$nama."','".$email."','".$pass."')";
        if ($this->db->query($sql)) {
            return [
                'error' => false,
                'message' => 'Account created successfully.'
            ];
        }
        else {
            return [
                'error' => true,
                'message' => $this->db->error
            ];
        }
    }
    public function last_login($id){
        $sql = "UPDATE " . $this->table_name . " SET last_login=current_timestamp()";
        if ($this->db->query($sql)) {
            return [
                'error' => false,
                'message' => 'Account created successfully.'
            ];
        }
        else {
            return [
                'error' => true,
                'message' => $this->db->error
            ];
        }
    }
    public function update($id,$nama, $alamat,$no_telp, $email) {
        $sql = "UPDATE " . $this->table_name . " SET nama = '". $nama ."', alamat = '". $alamat ."' , no_telp = '". $no_telp ."' , email = '". $email ."' WHERE id = '" . $id ."'";

        if ($this->db->query($sql)) {

            return [
                'error' => false,
                'message' => 'Profile updated successfully.'
            ];
        }
        else {
            return [
                'error' => true,
                'message' => $this->db->error
            ];
        }
    }
    public function delete($id) {
        $sql = "DELETE FROM ". $this->table_name ." WHERE id = '". $id ."'";

        if ($this->db->query($sql)) {
            return [
                'error' => false,
                'message' => 'Account deleted successfully.'
            ];
        }
        else {
            return [
                'error' => true,
                'message' => $this->db->error
            ];
        }
    }
}
?>