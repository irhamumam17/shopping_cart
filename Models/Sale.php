<?php
namespace Models;
use Helper\Database;
class Sale{
    private $db;
    private $table_name = 'sales';
    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    public function save_pra($id_user,$id_store_item,$jumlah,$metode,$alamat_tujuan) {
        $sql = "INSERT INTO " . $this->tableName . "(id_user,id_store_item,jumlah,metode,status,alamat_tujuan)
                VALUES('".$id_user."','".$id_store_item."','".$jumlah."','".$metode."','Belum Bayar','".$alamat_tujuan."')";
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
    public function save_pasca($id,$rate,$komentar) {
        $sql = "UPDATE ".$this->table_name." SET status='Sudah Bayar', rate = ".$rate."',komentar = '".$komentar."' WHERE id = ".$id;
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
}
?>