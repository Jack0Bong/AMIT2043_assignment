<?php 
    session_start();
    unset($_SESSION['isLoggedIn']);
    unset($_SESSION['adminLoggedIn']);
    unset($_SESSION['userID']);
    unset($_SESSION['adminID']);
    header("Location:../index.php");
?>