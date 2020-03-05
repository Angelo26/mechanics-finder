<?php

	session_start();

	if (isset($_POST['login'])) {

		require 'dbh.inc.php';

		$userl = mysqli_real_escape_string($conn, $_POST['userid']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		
			$sql = "SELECT * FROM users WHERE email='$userl' OR username='$userl';";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			if ($resultCheck < 1) {
				header("Location: ../index.php?login=User not found");
				exit();
			}
			else {
				if ($row = mysqli_fetch_assoc($result)) {
                    
					$hashedPwdCheck = password_verify($password, $row['pwd']);
						if ($hashedPwdCheck == false) {
							header("Location: ../index.php?login=Wrong password");
							exit();
						}
                        
					    elseif($hashedPwdCheck == $row['pwd']) {
						    $_SESSION['userid'] = $row['userid'];
						    $_SESSION['useremail'] = $row['email'];
						    header("Location: ../index.php?login=Success");
						    exit();
					    }

				}
			}
	    }
	else {
		header("Location: ../index.php");
		exit();
	}
