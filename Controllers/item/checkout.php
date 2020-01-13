<?php

require_once '../../Models/Item.php';
require_once '../../Helper/Database.php';
use Models\Item;

if(isset($_POST['addco'])){
    $item = new Item();
    $datas = $item->indexCart($_POST['id_user']);
    $data = $datas['data'];
    foreach($data as $x){
        $result = $item->saveCO($_POST['id_user'],$x['id'],$x['jumlah'],$_POST['paymentMethod'],$_POST['alamat'],$_POST['rating'],$_POST['komentar']);
    }  
    if($result['error']==true){
        echo "<script>alert('".$result['message']."')</script>";
        echo "<script>window.location.href='../../index'</script>";
    }else{
        echo "<script>alert('".$result['message']."')</script>";
        echo "<script>window.location.href='../../index'</script>";
    }
}
?>