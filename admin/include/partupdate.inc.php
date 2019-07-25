<?php

	if(isset($_POST['submit'])) {
		session_start();

		require 'dbh.inc.php';

		$brand = mysqli_real_escape_string($conn, $_POST['brand']);
		$model = mysqli_real_escape_string($conn, $_POST['model']);
		$part = mysqli_real_escape_string($conn, $_POST['part']);
		$shop = mysqli_real_escape_string($conn, $_POST['shop']);
		$price = mysqli_real_escape_string($conn, $_POST['price']);
					
		$vid = $_GET['id'];
		$sql = "UPDATE parts SET vec_brand='$brand', vec_model='$model', vec_part='$part', shop='$shop', price='$price' WHERE vec_id='$vid';";
		$result = mysqli_query($conn, $sql);
		header("Location: ../adminparts.php?Update_Success");
		exit();		
		
	}
	else {
		header("Location: ../adminparts.php");
		exit();
	}
?>