<?php

	session_start();

	if (isset($_POST['submit'])) {

		require 'dbh.inc.php';

		$uid = mysqli_real_escape_string($conn, $_POST['uid']);
		$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

		if (empty($uid) || empty($pwd)) {
			header("Location: ../index.php?login=Empty_field");
			exit();
		}
		else {
			$sql = "SELECT * FROM admins WHERE username='$uid';";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			if ($resultCheck < 1) {
				header("Location: ../index.php?login=User_not_found");
				exit();
			}
			else {
				if ($row = mysqli_fetch_assoc($result)) {
					
					$hashedpwd = md5($pwd);
					if($hashedpwd != $row['password']) {
						header("Location: ../index.php?login=Wrong_password");
						exit();
					}
					elseif ($hashedpwd == $row['password']) {
						$_SESSION['u_uid'] = $row['id'];
						
						header("Location: ../adminpanel.php?loggedin_Successfully");
						exit();
					}
				}
			}
		}
	}
	else {
		header("Location: ../index.php?login=Error");
		exit();
	}
