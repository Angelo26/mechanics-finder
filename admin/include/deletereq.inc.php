<?php

    require 'dbh.inc.php';
    session_start();
    if(!isset($_SESSION['u_uid'])) {
        header("location:index.php");
    }

    $mid = $_GET['id'];
    $sql = "DELETE from mechanics where id = '$mid'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: ../verifymechanics.php?deleted_Successfully");
	exit();
?>