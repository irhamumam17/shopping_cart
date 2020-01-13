<?php
require_once '../../Models/admin.php';
require_once '../../Helper/Database.php';
use Models\Admin;

if(isset($_POST['loginadmin'])){
    $admin = new Admin();
    $result = $admin->login($_POST['username'],md5($_POST['pass']));
    if($result['error']==true){
        echo "<script>alert('".$result['message']."')</script>";
        echo "<script>window.location.href='../../admin/loginadmin'</script>";
    }else{
        session_start();
        $_SESSION['admin'] = $result['data']['id'];
        echo "<script>window.location.href='../../admin/dashboard'</script>";
    }
}
?>