<?php

    require 'dbh.inc.php';

    $mid = $_GET['id'];
    $sql = "DELETE from mechanics where mechanic_id = '$mid'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: ../adminmechanics.php?deleted_Successfully");
	exit();
?>