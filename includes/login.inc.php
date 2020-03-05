<?php

	session_start();

	if (isset($_POST['submit'])) {

		require 'dbh.inc.php';

		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$pwd = mysqli_real_escape_string($conn, $_POST['password']);

		if (empty($email) || empty($pwd)) {
			header("Location: ../mechanics.hp?login=Empty field");
			exit();
		}
		else {
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					header("Location: ../mechanics.php?signup=Invalid email");
					exit();	
				}
			else {
				$sql = "SELECT * FROM realmechanics WHERE mechanic_email='$email';";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				if ($resultCheck < 1) {
					header("Location: ../mechanics.php?login=User not found");
					exit();
				}
				else {
					if ($row = mysqli_fetch_assoc($result)) {
						
						$hashedPwdCheck = password_verify($pwd, $row['mechanic_pwd']);
						if ($hashedPwdCheck == false) {
							header("Location: ../mechanics.php?login=Wrong password");
							exit();
						}
						elseif($hashedPwdCheck == true) {
							$_SESSION['u_id'] = $row['mechanic_id'];
							$_SESSION['u_email'] = $row['mechanic_email'];
							header("Location: ../profile.php?login=Success");
							exit();
						}

					}
				}
			}
		}
	}
	else {
		header("Location: ../mechanics.php?login=Error");
		exit();
	}
