<?php

	if(isset($_POST['submit'])) {
		
		require 'dbh.inc.php';

		$cname = mysqli_real_escape_string($conn, $_POST['cname']);
		$website = mysqli_real_escape_string($conn, $_POST['website']);
		$contact = mysqli_real_escape_string($conn, $_POST['contact']);
		
		$sql = "INSERT INTO roadassist (cname, website, contact) VALUES ('$cname', '$website', '$contact');";
		$result = mysqli_query($conn, $sql);
		header("Location: ../adminaddroad.php?adminaddroad=Success");
		exit();
		
	}
	else {
		header("Location: ../adminaddroad.php");
		exit();
	}
?>