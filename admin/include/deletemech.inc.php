<?php

    require 'dbh.inc.php';
    session_start();
    if(!isset($_SESSION['u_uid'])) {
        header("location:index.php");
    }

    $mid = $_GET['id'];
    $sql = "DELETE from realmechanics where mechanic_id = '$mid'";
    mysqli_query($conn, $sql);
    header("Location: ../adminmechanics.php?deleted successfully");
    exit();
    
    mysqli_close($conn);
?>