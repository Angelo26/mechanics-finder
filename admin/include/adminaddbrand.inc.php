<?php

	if(isset($_POST['submit'])) {
		
		require 'dbh.inc.php';

		$brand = mysqli_real_escape_string($conn, $_POST['brand']);

			$sql = "SELECT * FROM brand WHERE brand='$brand';";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);

			if ($resultCheck > 0) {
				header("Location: ../adminnewparts.php?adminnewparts=its_alreaday_there");
				exit();	
			}
			else {
				$sql = "INSERT INTO brand (brand) VALUES ('$brand');";
				$result = mysqli_query($conn, $sql);
				header("Location: ../adminnewparts.php?adminnewparts=Success");
				exit();
			}
		
	}
	else {
		header("Location: ../adminnewparts.php");
		exit();
	}