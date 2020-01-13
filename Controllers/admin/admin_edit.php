<?php
require_once '../../Models/admin.php';
require_once '../../Helper/Database.php';
use Models\Admin;

if(isset($_POST['simpan'])){
    $admin = new Admin();
    $result = $admin->update($_POST['id'],$_POST['nama'],$_POST['username'],md5($_POST['pass']));
    if($result['error']==true){
        echo "<script>alert('".$result['message']."')</script>";
        echo "<script>window.location.href='../../admin/admin'</script>";
    }else{
        echo "<script>alert('".$result['message']."')</script>";
        echo "<script>window.location.href='../../admin/admin'</script>";
    }
}
?>