<?php
namespace Models;
use Helper\Database;
class Item{
    private $db;
    private $table_name = 'store_items';
    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    function index(){
        $sql = "SELECT ".$this->table_name.".*,item_category.nama AS nama_category FROM ".$this->table_name." INNER JOIN item_category ON ".$this->table_name.".id_item_category=item_category.id";
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
    function indexID($id){
        $sql = "SELECT ".$this->table_name.".*,item_category.nama AS nama_category FROM ".$this->table_name." INNER JOIN item_category ON ".$this->table_name.".id_item_category=item_category.id AND ".$this->table_name.".id=".$id;
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
    public function save($nama,$stok,$harga,$id_category,$keterangan) {
        $sql = "INSERT INTO " . $this->table_name . "(nama,stok,harga,id_item_category,keterangan) VALUES('".$nama."','".$stok."','".$harga."','".$id_category."','".$keterangan."')";
        if ($this->db->query($sql)) {
            return [
                'error' => false,
                'message' => 'Item created successfully.'
            ];
        }
        else {
            return [
                'error' => true,
                'message' => $this->db->error
            ];
        }
    }
    public function update($id,$nama,$stok,$harga,$id_category,$keterangan){
        $sql = "UPDATE " . $this->table_name . " SET nama='".$nama."',stok='".$stok."',harga='".$harga."',id_item_category='".$id_category."',keterangan='".$keterangan."' WHERE id = '".$id."'";
        if ($this->db->query($sql)) {
            return [
                'error' => false,
                'message' => 'Item updated successfully.'
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
                'message' => 'Item deleted successfully.'
            ];
        }
        else {
            return [
                'error' => true,
                'message' => $this->db->error
            ];
        }
    }
    function cari($kata){
        $sql = "SELECT a.*,b.* FROM ".$this->table_name." a INNER JOIN item_category
                ON a.id_item_category=b.id WHERE a.nama LIKE '%".$kata."%' OR b.nama LIKE '%".$kata."%'";
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
    function indexCategory(){
        $sql = "SELECT * FROM item_category";
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
    public function saveCategory($nama){
        $sql = "INSERT INTO item_category VALUES('".$nama."')";
        if ($this->db->query($sql)) {
            return [
                'error' => false,
                'message' => 'Category created successfully.'
            ];
        }
        else {
            return [
                'error' => true,
                'message' => $this->db->error
            ];
        }
    }
    public function updateCategory($id,$nama){
        $sql = "UPDATE item_category SET nama='".$nama."' WHERE id = '".$id."'";
        if ($this->db->query($sql)) {
            return [
                'error' => false,
                'message' => 'Category created successfully.'
            ];
        }
        else {
            return [
                'error' => true,
                'message' => $this->db->error
            ];
        }
    }
    public function deleteCategory($id) {
        $sql = "DELETE FROM item_category WHERE id = '". $id ."'";

        if ($this->db->query($sql)) {
            return [
                'error' => false,
                'message' => 'Category deleted successfully.'
            ];
        }
        else {
            return [
                'error' => true,
                'message' => $this->db->error
            ];
        }
    }
    public function saveCart($id_item,$jumlah,$id_user){
        $sql = "INSERT INTO cart(id_store_item,jumlah,id_user) VALUES('".$id_item."','".$jumlah."','".$id_user."')";
        if ($this->db->query($sql)) {
            return [
                'error' => false,
                'message' => 'Item Insert To Cart Succesfully.'
            ];
        }
        else {
            return [
                'error' => true,
                'message' => $this->db->error
            ];
        }
    }
    public function deleteCart($id,$id_store_item){
        $sql = "DELETE FROM cart WHERE id_user=".$id." AND id_store_item=".$id_store_item;
        if ($this->db->query($sql)) {
            return [
                'error' => false,
                'message' => 'Item Delete From Cart Succesfully.'
            ];
        }
        else {
            return [
                'error' => true,
                'message' => $this->db->error
            ];
        }
    }  
    function indexCart($id){
        $sql = "SELECT cart.*, store_items.* FROM cart INNER JOIN store_items ON cart.id_store_item=store_items.id WHERE cart.id_user=".$id;
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

    public function saveCO($id_user,$id_item,$jumlah,$metode,$alamat,$rate,$komentar){
        $simpan = "INSERT INTO sales(id_user,id_store_item,jumlah,metode,status,alamat_tujuan,rate,komentar) VALUES('".$id_user."','".$id_item."','".$jumlah."','".$metode."','Belum Bayar','".$alamat."','".$rate."','".$komentar."')";
        if ($this->db->query($simpan)) {
            $sql2 = "UPDATE store_items SET stok=stok-".$jumlah." WHERE id=".$id_item;
            if($this->db->query($sql2)){
                $this->deleteCart($id_user,$id_item);
                return [
                    'error' => false,
                    'message' => 'Checkout Succesfully. Lets to pay now.'
                ];
            }else{
                return [
                    'error' => true,
                    'message' => $this->db->error
                ];            
            }
        }else{
            return [
                'error' => true,
                'message' => $this->db->error
            ];        
        }
    }
}
?>