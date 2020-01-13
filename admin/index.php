<?php
session_start();
if(!isset($_SESSION['admin'])){
    echo "<script>window.location.href='login'</script>";
}else{
    echo "<script>window.location.href='dashboard'</script>";
}
?>