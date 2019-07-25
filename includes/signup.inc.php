<?php

	if(isset($_POST['submit'])) {
		
		require 'dbh.inc.php';

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
			$destinationfile='../upload/'.$filename;
			move_uploaded_file($filetmp, $destinationfile);
		}

		if($filename=="") {
			$destinationfile='../upload/mechanic.png';
		}

		else {
			header("Location: ../signup.php?signup=couldn't upload image");
		}

		if (empty($first) || empty($last) || empty($email) || empty($pwd) || empty($cpwd) || empty($address) || empty($garage) || empty($city) || empty($state) || empty($contact)) {
			header("Location: ../signup.php?signup=Empty field");
			exit();
		}
		else {
			if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
				header("Location: ../signup.php?signup=Invalid names");
				exit();
			}
			else {
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					header("Location: ../signup.php?signup=Invalid email");
					exit();	
				}
				else {
					if ($pwd!=$cpwd) {
						header("Location: ../signup.php?signup=Password and Confirm Password did not match");
						exit();	
					}
					else {
						$sql = "SELECT * FROM mechanics WHERE mechanic_email='$email';";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);

						if ($resultCheck > 0) {
							header("Location: ../signup.php?signup=Email is already used");
							exit();	
						}
						else {
							$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
							$sql = "INSERT INTO mechanics (mechanic_first, mechanic_last, mechanic_email, mechanic_pwd, mechanic_address, mechanic_garage, mechanic_city, mechanic_state, mechanic_contact, mechanic_img, mechanic_status) VALUES ('$first', '$last', '$email', '$hashedPwd', '$address', '$garage', '$city', '$state', '$contact','$destinationfile', 'active');";
							$result = mysqli_query($conn, $sql);
							header("Location: ../signup.php?Success");
							exit();
						}
					}
				}
			}
		}
	}
	else {
		header("Location: ../signup.php");
		exit();
	}
