<?php
namespace Models;
use Helper\Database;
class Store{
    private $db;
    private $table_name = 'stores';
    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    function index($id_user){
        $sql = "SELECT a.*,b.* FROM ".$this->table_name." a INNER JOIN users ON a.id_user=b.id WHERE a.id_user='".$id_user."'";
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
    public function save($nama,$foto,$deskripsi,$id_user) {
        $image_link = $foto;//Direct link to image
        $split_image = pathinfo($image_link);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL , $image_link);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $response= curl_exec ($ch);
        curl_close($ch);
        $file_name = "../assets/img/item/".$split_image['filename'].".".$split_image['extension'];
        $file = fopen($file_name , 'w') or die("X_x");
        fwrite($file, $response);
        fclose($file);

        $sql = "INSERT INTO " . $this->tableName . "(nama,foto,deskripsi,id_user) VALUES('".$nama."','".$foto."','".$deskripsi."','".$id_user."')";
        if ($this->db->query($sql)) {
            return [
                'error' => false,
                'message' => 'Store created successfully.'
            ];
        }
        else {
            return [
                'error' => true,
                'message' => $this->db->error
            ];
        }
    }
    public function update($id,$nama,$foto,$deskripsi,$id_user){
        $sql = "UPDATE " . $this->tableName . " SET nama='".$nama."',foto='".$foto."',deskripsi='".$deskripsi."',id_user='".$id_user."' WHERE id = '".$id."'";
        if ($this->db->query($sql)) {
            return [
                'error' => false,
                'message' => 'Store updated successfully.'
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
                'message' => 'Store deleted successfully.'
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