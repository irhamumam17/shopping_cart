<?php
require_once '../../Models/Item.php';
require_once '../../Helper/Database.php';
use Models\Item;

if(isset($_POST['simpan'])){
    $item = new Item();
    $result = $item->save($_POST['nama'],$_POST['stok'],$_POST['harga'],$_POST['kategori'],$_POST['keterangan']);
    if($result['error']==true){
        echo "<script>alert('".$result['message']."')</script>";
        // echo "<script>window.location.href='../../admin/examples/store_item'</script>";
    }else{
        // session_start();
        // $_SESSION['id_user'] = $result['data']['id'];
        // header('Location: ../../index');
        echo "<script>alert('".$result['message']."')</script>";
        echo "<script>window.location.href='../../admin/examples/store_item'</script>";
    }
}
?>