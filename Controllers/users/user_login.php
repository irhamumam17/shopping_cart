<?php
require_once '../../Models/User.php';
require_once '../../Helper/Database.php';
use Models\Users;

if(isset($_POST['login'])){
    $user = new Users();
    $result = $user->login($_POST['email'],md5($_POST['pass']));
    if($result['error']==true){
        echo "<script>alert('".$result['message']."')</script>";
        echo "<script>window.location.href='../../Views/login.php'</script>";
    }else{
        session_start();
        $_SESSION['user'] = $result['data'];
        header('Location: ../../index');
    }
}
?>