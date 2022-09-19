<?php 
    session_start();
    unset($_SESSION['isLoggedIn']);
    unset($_SESSION['loginID']);
    header("Location:../index.php");
?>