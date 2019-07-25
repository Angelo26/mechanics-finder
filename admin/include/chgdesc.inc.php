<?php

	if(isset($_POST['submit'])) {
		session_start();

		require 'dbh.inc.php';

		
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$desc = mysqli_real_escape_string($conn, $_POST['desc']);
		
		
		$file = $_FILES['image'];
		$filename = $file['name'];
	
		if ($filename=="") {
			
			
			$sql = "UPDATE chgdesc SET name='$name', $desc='$desc' WHERE mechanic_id='$uid';";
			$result = mysqli_query($conn, $sql);
			header("Location: profile.php?only_detail_Update_Success");
			exit();		
			
		}

		
		else {
			
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

				
						$uid = $_SESSION['u_id'];
						$sql = "UPDATE mechanics SET mechanic_first='$first', mechanic_last='$last', mechanic_email='$email', mechanic_address='$address', mechanic_garage='$garage', mechanic_city='$city', mechanic_state='$state', mechanic_contact='$contact', mechanic_img='$destinationfile' WHERE mechanic_id='$uid';";
						$result = mysqli_query($conn, $sql);
						header("Location: ../chgdesc.php?Update_Success");
					exit();		
				
			}
	else {
		header("Location: ../chgdesc.php");
		exit();
	}
?>