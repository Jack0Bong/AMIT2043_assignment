<?php 
    require("PHP_modules/conn.php");

    $sql = "DELETE FROM event WHERE Event_ID=" . $_GET['Event_ID'];
    $mysqli->query($sql);
    header("Location: manage-event.php");
?>