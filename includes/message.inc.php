<?php

	if(isset($_POST['submit'])) {
		
		require 'dbh.inc.php';

		$name = mysqli_real_escape_string($conn, $_POST['name']);
		
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		
		$message = mysqli_real_escape_string($conn, $_POST['message']);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header("Location: ../contact.php?Invalid_email");
			exit();	
		}		
		else {
			$sql = "INSERT INTO messages (fname, email, fmessage) VALUES ('$name', '$email', '$message');";
			$result = mysqli_query($conn, $sql);
			header("Location: ../contact.php?message_sends=Success");
			exit();
		}
	}
	else {
		header("Location: ../contact.php");
		exit();
	}
?>