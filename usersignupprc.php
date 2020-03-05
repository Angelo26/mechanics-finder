<?php

	if(isset($_POST['submit'])) {
		
		require 'includes/dbh.inc.php';

		$first = mysqli_real_escape_string($conn, $_POST['fname']);
        $last = mysqli_real_escape_string($conn, $_POST['lname']);
        $uname = mysqli_real_escape_string($conn, $_POST['uname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$pwd = mysqli_real_escape_string($conn, $_POST['spwd']);
		$cpwd = mysqli_real_escape_string($conn, $_POST['cpwd']);
		
			$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
			$sql = "INSERT INTO users (fname, lname, username, email, pwd) VALUES ('$first', '$last', '$uname', '$email', '$hashedPwd');";
			$result = mysqli_query($conn, $sql);
			header("Location: index.php");
			exit();
	
    }
	else {
		header("Location: index.php");
		exit();
	}

?>
