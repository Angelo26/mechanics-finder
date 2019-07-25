<?php

	if(isset($_POST['submit'])) {
		session_start();

		require 'dbh.inc.php';

		$cname = mysqli_real_escape_string($conn, $_POST['cname']);
		$website = mysqli_real_escape_string($conn, $_POST['website']);
		$contact = mysqli_real_escape_string($conn, $_POST['contact']);
		
		$rid = $_GET['id'];
		$sql = "UPDATE roadassist SET cname='$cname', website='$website', contact='$contact' WHERE id='$rid';";
		$result = mysqli_query($conn, $sql);
		header("Location: ../adminroad.php?Update_Success");
		exit();		
			
	}
	else {
		header("Location: ../adminroad.php");
		exit();
	}
?>