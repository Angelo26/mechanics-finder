<?php

	if(isset($_POST['submit'])) {
		
		require 'dbh.inc.php';

		$name = mysqli_real_escape_string($conn, $_POST['name']);
		
		$contact = mysqli_real_escape_string($conn, $_POST['contact']);
		
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        

        $mid = $_GET['id'];
		$sql = "SELECT * FROM realmechanics WHERE mechanic_id='$mid';";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
		$tabmsg = $row["mechanic_first"].$mid;
		mysqli_close();
		
		$sql2 = "INSERT INTO $tabmsg (username, contact, usermessage) VALUES ('$name', '$contact', '$message');";
		if(mysqli_query($conn2, $sql2)){
			header("Location: ../mechdetail.php?id=$mid");
			exit();
		}
	}
	else {
		header("Location: ../mechdetail.php");
		exit();
	}
?>