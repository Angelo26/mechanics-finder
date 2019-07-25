<?php

	if(isset($_POST['submit'])) {
		session_start();

		require 'dbh.inc.php';
		$status = mysqli_real_escape_string($conn, $_POST['status']);
		
		$email = $_SESSION['u_email'];
		$sql = "UPDATE mechanics SET mechanic_status='$status' WHERE mechanic_email='$email';";
		$result = mysqli_query($conn, $sql);
		header("Location: profile.php?status_Update_Success");
		exit();		
	}
?>