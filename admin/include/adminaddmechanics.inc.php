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
		if (empty($first) || empty($last) || empty($email) || empty($pwd) || empty($cpwd) || empty($address) || empty($garage) || empty($city) || empty($state) || empty($contact)) {
			header("Location: ../signup.php?signup=Empty_field");
			exit();
		}
		else {
			if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
				header("Location: ../signup.php?signup=Invalid_inputs");
				exit();
			}
			else {
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					header("Location: ../signup.php?signup=Invalid_email");
					exit();	
				}
				else {
					if ($pwd!=$cpwd) {
						header("Location: ../signup.php?signup=Password_&_Confirm_Password_do_not_match");
						exit();	
					}
					else {
						$sql = "SELECT * FROM mechanics WHERE mechanic_email='$email';";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);

						if ($resultCheck > 0) {
							header("Location: ../signup.php?signup=Username/Email_id_taken");
							exit();	
						}
						else {
							$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
							$sql = "INSERT INTO mechanics (mechanic_first, mechanic_last, mechanic_email, mechanic_pwd, mechanic_address, mechanic_garage, mechanic_city, mechanic_state, mechanic_contact) VALUES ('$first', '$last', '$email', '$hashedPwd', '$address', '$garage', '$city', '$state', '$contact' );";
							$result = mysqli_query($conn, $sql);
							header("Location: ../signup.php?signup=Success");
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