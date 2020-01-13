<?php
require_once '../../Models/admin.php';
require_once '../../Helper/Database.php';
use Models\Admin;

if(isset($_GET['id'])){
    $admin = new Admin();
    $result = $admin->delete($_POST['id']);
    if($result['error']==true){
        echo "<script>alert('".$result['message']."')</script>";
        echo "<script>window.location.href='../../admin/admin'</script>";
    }else{
        echo "<script>alert('".$result['message']."')</script>";
        echo "<script>window.location.href='../../admin/admin'</script>";
    }
}
?>