<?php
require_once '../../Models/Item.php';
require_once '../../Helper/Database.php';
use Models\Item;

if(isset($_GET['id'])){
    $item = new Item();
    $result = $item->delete($_GET['id']);
    if($result['error']==true){
        echo "<script>alert('".$result['message']."')</script>";
        echo "<script>window.location.href='../../admin/examples/store'</script>";
    }else{
        echo "<script>alert('".$result['message']."')</script>";
        echo "<script>window.location.href='../../admin/examples/store_item'</script>";
    }
}
?>