<?php

    require 'dbh.inc.php';

    $mid = $_GET['id'];
    $sql = "DELETE from parts where vec_id = '$mid'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: ../adminparts.php?deleted_Successfully");
	exit();
?>