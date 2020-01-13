<?php
namespace Models;
use Helper\Database;
class Admin{
    private $db;
    private $table_name = 'admins';
    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    function index(){
        $sql = "SELECT * FROM ".$this->table_name;
        $exec = $this->db->query($sql);
        if($exec->num_rows > 0){
			while($hasil = $exec->fetch_assoc()){
                $row[] = $hasil;
            }
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
    function index_id($id){
        $sql = "SELECT * FROM ".$this->table_name." WHERE id =".$id;
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
    function login($username,$pass){
        $sql = "SELECT * FROM ".$this->table_name." WHERE username = '".$username."' AND pass = '".$pass."'";
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
    public function save($nama,$username,$pass) {
        $sql = "INSERT INTO " . $this->tableName . "(nama,username,pass) VALUES('".$nama."','".$username."','".$pass."')";
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
        $sql = "UPDATE " . $this->tableName . " SET last_login=current_timestamp() ";
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
    public function update($id,$nama,$username,$pass) {
        $sql = "DELETE ".$this->table_name." SET nama = '".$nama."', username='".$username."', pass='".$pass."' WHERE id = '".$id."',";

        if ($this->db->query($sql)) {
            return [
                'error' => false,
                'message' => 'Admin Berhasil Di Ubah.'
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
        $sql = "DELETE FROM ".$this->table_name." WHERE id = '". $id ."'";

        if ($this->db->query($sql)) {
            return [
                'error' => false,
                'message' => 'Admin Berhasil Di Hapus.'
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