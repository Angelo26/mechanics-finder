<?php

	if(isset($_POST['submit'])) {
		session_start();

		require 'dbh.inc.php';

		$first = mysqli_real_escape_string($conn, $_POST['fname']);
		$last = mysqli_real_escape_string($conn, $_POST['lname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$address = mysqli_real_escape_string($conn, $_POST['address']);
		$garage = mysqli_real_escape_string($conn, $_POST['garage']);
		$city = mysqli_real_escape_string($conn, $_POST['city']);
		$state = mysqli_real_escape_string($conn, $_POST['state']);
		$contact = mysqli_real_escape_string($conn, $_POST['contact']);
		
		if (empty($state)){
			if (empty($first) || empty($last) || empty($address) || empty($garage) || empty($city) || empty($contact)) {
				header("Location: ../adminmechanics.php?Update=Empty_field");
				exit();
			}
			else {
				if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
					header("Location: ../adminmechanics.php?Update=Invalid_inputs");
					exit();
				}
				else {

					$mid = $_GET['id'];
					$sql = "UPDATE realmechanics SET mechanic_first='$first', mechanic_last='$last', mechanic_email='$email', mechanic_address='$address', mechanic_garage='$garage', mechanic_city='$city', mechanic_contact='$contact' WHERE mechanic_id='$mid';";
					$result = mysqli_query($conn, $sql);
					header("Location: ../adminmechanics.php?Update_Success");
					exit();		
				}
			}
		}
		else {
			if (empty($first) || empty($last) || empty($address) || empty($garage) || empty($city) || empty($contact)) {
				header("Location: ../adminmechanics.php?Update=Empty_field");
				exit();
			}
			else {
				if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
					header("Location: ../adminmechanics.php?Update=Invalid_inputs");
					exit();
				}
				else {

					$mid = $_GET['id'];
					$sql = "UPDATE realmechanics SET mechanic_first='$first', mechanic_last='$last',  mechanic_email='$email', mechanic_address='$address', mechanic_garage='$garage', mechanic_city='$city', mechanic_state='$state', mechanic_contact='$contact' WHERE mechanic_id='$mid';";
					$result = mysqli_query($conn, $sql);
					header("Location: ../adminmechanics.php?Update_Success");
					exit();		
				}
			}
		}
	}
	else {
		header("Location: ../adminmechanics.php");
		exit();
	}
?>