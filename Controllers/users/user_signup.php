<?php
require_once '../../Models/User.php';
require_once '../../Helper/Database.php';
use Models\Users;

if(isset($_POST['signup'])){
    $user = new Users();
    $result = $user->save($_POST['nama'],$_POST['email'],md5($_POST['pass']));
    if($result['error']==true){
        echo "<script>alert('".$result['message']."')</script>";
        echo "<script>window.location.href='../../Views/signup'</script>";
    }else{
        // session_start();
        // $_SESSION['id_user'] = $result['data']['id'];
        // header('Location: ../../index');
        echo "<script>alert('".$result['message']."')</script>";
        echo "<script>window.location.href='../../Views/login'</script>";
    }
}
?>