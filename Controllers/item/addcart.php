<?php

use Models\Item;

require_once '../../Models/Item.php';
require_once '../../Helper/Database.php';

if(isset($_POST['addcart'])){
    // var_dump($_POST);
    $user = new Item();
    $result = $user->saveCart($_POST['id_item'],$_POST['jumlah'],$_POST['id_user']);
    if($result['error']==true){
        echo "<script>alert('".$result['message']."')</script>";
        echo "<script>window.location.href='../../index'</script>";
    }else{
        // session_start();
        // $_SESSION['id_user'] = $result['data']['id'];
        // header('Location: ../../index');
        echo "<script>alert('".$result['message']."')</script>";
        echo "<script>window.location.href='../../index'</script>";
    }
    // var_dump($_POST);
}
?>