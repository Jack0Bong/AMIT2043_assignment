<?php 
    $username="root";
    $password="";
    $server="localhost";
    $db="amit_assignment";

    $mysqli = new mysqli($server,$username,$password,$db);

    if($mysqli->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
?>