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
		$file = $_FILES['image'];
		$filename = $file['name'];
	
		if ($filename=="" && $state=="") {
			if (empty($first) || empty($last) || empty($email) || empty($address) || empty($garage) || empty($city) || empty($contact)) {
			header("Location: profile.php?Update=Empty_field");
			exit();
			}
			else {
				if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
					header("Location: profile.php?Update=Invalid_inputs");
					exit();
				}
				else {
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						header("Location: profile.php?Update=Invalid_email");
						exit();	
					}
					else {

						$uid = $_SESSION['u_id'];
						$sql = "UPDATE mechanics SET mechanic_first='$first', mechanic_last='$last', mechanic_email='$email', mechanic_address='$address', mechanic_garage='$garage', mechanic_city='$city', mechanic_contact='$contact' WHERE mechanic_id='$uid';";
						$result = mysqli_query($conn, $sql);
						header("Location: profile.php?only_detail_Update_Success");
						exit();		
					}
				}
			}
		}

		elseif ($filename=="" && $state!="") {
			if (empty($first) || empty($last) || empty($email) || empty($address) || empty($garage) || empty($city) || empty($state) || empty($contact)) {
			header("Location: profile.php?Update=state_Empty_field");
			exit();
			}
			else {
				if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
					header("Location: profile.php?Update=Invalid_inputs");
					exit();
				}
				else {
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						header("Location: profile.php?Update=Invalid_email");
						exit();	
					}
					else {

						$uid = $_SESSION['u_id'];
						$sql = "UPDATE mechanics SET mechanic_first='$first', mechanic_last='$last', mechanic_email='$email', mechanic_address='$address', mechanic_garage='$garage', mechanic_city='$city', mechanic_state='$state', mechanic_contact='$contact' WHERE mechanic_id='$uid';";
						$result = mysqli_query($conn, $sql);
						header("Location: profile.php?detail_Update_Success");
						exit();		
					}
				}
			}
		}

		elseif ($filename!="" && $state=="") {
			
			$fileerror = $file['error'];
			$filetmp = $file['tmp_name'];

			$fileext = explode('.',$filename);
			$filecheck = strtolower(end($fileext));

			$allowed = array('png', 'jpg', 'jpeg');

			if (in_array($filecheck,$allowed)) {
				$destinationfile='../upload/'.$filename;
				move_uploaded_file($filetmp, $destinationfile);
			}

			else {
				header("Location: profile.php?couldn't_upload_image");
				exit();
			}

			if (empty($first) || empty($last) || empty($email) || empty($address) || empty($garage) || empty($city) || empty($contact)) {
				header("Location: profile.php?Update=Empty_field");
				exit();
			}
			else {
				if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
					header("Location: profile.php?Update=Invalid_inputs");
					exit();
				}
				else {
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						header("Location: profile.php?Update=Invalid_email");
						exit();	
					}
					else {

							$uid = $_SESSION['u_id'];
							$sql = "UPDATE mechanics SET mechanic_first='$first', mechanic_last='$last', mechanic_email='$email', mechanic_address='$address', mechanic_garage='$garage', mechanic_city='$city', mechanic_contact='$contact', mechanic_img='$destinationfile' WHERE mechanic_id='$uid';";
							$result = mysqli_query($conn, $sql);
							header("Location: profile.php?picture_Update_Success");
							exit();		
					}
				}
			}
		}
		elseif ($filename!="" && $state!="") {
			
			$fileerror = $file['error'];
			$filetmp = $file['tmp_name'];

			$fileext = explode('.',$filename);
			$filecheck = strtolower(end($fileext));

			$allowed = array('png', 'jpg', 'jpeg');

			if (in_array($filecheck,$allowed)) {
				$destinationfile='../upload/'.$filename;
				move_uploaded_file($filetmp, $destinationfile);
			}

			else {
				header("Location: profile.php?couldn't_upload_image");
				exit();
			}

			if (empty($first) || empty($last) || empty($email) || empty($address) || empty($garage) || empty($city) || empty($contact)) {
				header("Location: profile.php?Update=Empty_field");
				exit();
			}
			else {
				if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
					header("Location: profile.php?Update=Invalid_inputs");
					exit();
				}
				else {
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						header("Location: profile.php?Update=Invalid_email");
						exit();	
					}
					else {

							$uid = $_SESSION['u_id'];
							$sql = "UPDATE mechanics SET mechanic_first='$first', mechanic_last='$last', mechanic_email='$email', mechanic_address='$address', mechanic_garage='$garage', mechanic_city='$city', mechanic_state='$state', mechanic_contact='$contact', mechanic_img='$destinationfile' WHERE mechanic_id='$uid';";
							$result = mysqli_query($conn, $sql);
							header("Location: profile.php?Update_Success");
							exit();		
					}
				}
			}
		}
	}
	else {
		header("Location: profile.php");
		exit();
	}
?>