<?php

	if(isset($_POST['submit'])) {
		
		require 'dbh.inc.php';

		$brand = mysqli_real_escape_string($conn, $_POST['brand']);
		$model = mysqli_real_escape_string($conn, $_POST['model']);
		$part = mysqli_real_escape_string($conn, $_POST['part']);
		$shop = mysqli_real_escape_string($conn, $_POST['shop']);
		$price = mysqli_real_escape_string($conn, $_POST['price']);

		$file = $_FILES['image'];
		$filename = $file['name'];

		$fileerror = $file['error'];
		$filetmp = $file['tmp_name'];

		$fileext = explode('.',$filename);
		$filecheck = strtolower(end($fileext));

		$allowed = array('png', 'jpg', 'jpeg');

		if(in_array($filecheck,$allowed)) {
			$destinationfile = 'partsupload/'.$filename;
			move_uploaded_file($filetmp, $destinationfile);
		}

		else {
			header("Location: ../adminaddparts.php?couldn't_upload_image");
		}

		$sql = "INSERT INTO parts (vec_brand, vec_model, vec_part, shop, price, pstatus, picture) VALUES ('$brand', '$model', '$part', '$shop', '$price', 'Available','$destinationfile');";
		$result = mysqli_query($conn, $sql);
		header("Location: ../adminaddparts.php?adminaddparts=Success");
		exit();
		
	}
	else {
		header("Location: ../adminaddparts.php");
		exit();
	}
?>