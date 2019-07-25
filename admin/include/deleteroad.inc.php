<?php

    require 'dbh.inc.php';

    $rid = $_GET['id'];
    $sql = "DELETE from roadassist where id = '$rid'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: ../adminroad.php?deleted_Successfully");
	exit();
?>