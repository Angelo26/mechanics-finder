<?php

    require 'includes/dbh.inc.php';
    session_start();
    if(!isset($_SESSION['useremail'])) {
        header("location:index.php");
    }
    $uemail=$_SESSION['useremail'];
    $mid = $_GET['id'];
    $sql = "SELECT * FROM realmechanics where mechanic_id = '$mid';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    $ctable=$row["mechanic_first"].$mid;

    $sql2 = "DELETE from $ctable where client = '$uemail';";
    if(mysqli_query($conn3,$sql2)){
        header("Location: mechdetail.php?id=$mid");
        exit();
    }

?>