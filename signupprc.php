<?php

	if(isset($_POST['submit'])) {
		
		require 'includes/dbh.inc.php';

		$first = mysqli_real_escape_string($conn, $_POST['fname']);
		$last = mysqli_real_escape_string($conn, $_POST['lname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
		$cpwd = mysqli_real_escape_string($conn, $_POST['cpwd']);
		$address = mysqli_real_escape_string($conn, $_POST['address']);
		$garage = mysqli_real_escape_string($conn, $_POST['garage']);
		$city = mysqli_real_escape_string($conn, $_POST['city']);
		$state = mysqli_real_escape_string($conn, $_POST['state']);
		$contact = mysqli_real_escape_string($conn, $_POST['contact']);
		$file = $_FILES['image'];
		$filename = $file['name'];

		$fileerror = $file['error'];
		$filetmp = $file['tmp_name'];

		$fileext = explode('.',$filename);
		$filecheck = strtolower(end($fileext));

		$allowed = array('png', 'jpg', 'jpeg');

		if(in_array($filecheck,$allowed)) {
			$destinationfile='upload/'.$filename;
			move_uploaded_file($filetmp, $destinationfile);
		}

		if($filename=="") {
			$destinationfile='upload/mechanic.png';
		}

		else {
			header("Location: signup.php?signup=couldn't upload image");
		}

					
						
					
		$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
		$sql = "INSERT INTO mechanics (mfirst, mlast, email, pwd, maddress, garage, city, mstate, contact, img, mstatus) VALUES ('$first', '$last', '$email', '$hashedPwd', '$address', '$garage', '$city', '$state', '$contact','$destinationfile', 'active');";
		$result = mysqli_query($conn, $sql);
		header("Location: signup.php?signup=Successfully Registered wait for the Verification");
		exit();
		
	}
	else {
		header("Location: signup.php?signup=");
		exit();
	}
