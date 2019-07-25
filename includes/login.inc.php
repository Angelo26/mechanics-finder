<?php

	session_start();

	if (isset($_POST['submit'])) {

		require 'dbh.inc.php';

		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$pwd = mysqli_real_escape_string($conn, $_POST['password']);

		if (empty($email) || empty($pwd)) {
			header("Location: ../mechanics.html?login=Empty_field");
			exit();
		}
		else {
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					header("Location: ../mechanics.html?signup=Invalid_email");
					exit();	
				}
			else {
				$sql = "SELECT * FROM mechanics WHERE mechanic_email='$email';";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				if ($resultCheck < 1) {
					header("Location: ../mechanics.html?login=User_not_found");
					exit();
				}
				else {
					if ($row = mysqli_fetch_assoc($result)) {
						
						$hashedPwdCheck = password_verify($pwd, $row['mechanic_pwd']);
						if ($hashedPwdCheck == false) {
							header("Location: ../mechanics.html?login=Wrong_password");
							exit();
						}
						elseif($hashedPwdCheck == true) {
							$_SESSION['u_id'] = $row['mechanic_id'];
							$_SESSION['u_email'] = $row['mechanic_email'];
							header("Location: profile.php?login=Success");
							exit();
						}

					}
				}
			}
		}
	}
	else {
		header("Location: ../mechanics.html?login=Error");
		exit();
	}
