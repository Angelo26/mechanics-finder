<?php

	if(isset($_POST['submit'])) {
		
		require 'dbh.inc.php';

		$part = mysqli_real_escape_string($conn, $_POST['parts']);

			$sql = "SELECT * FROM newpart WHERE newpart='$part';";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);

			if ($resultCheck > 0) {
				header("Location: ../adminnewparts.php?adminnewparts=its_alreaday_there");
				exit();	
			}
			else {
				$sql = "INSERT INTO newpart (newpart) VALUES ('$part');";
				$result = mysqli_query($conn, $sql);
				header("Location: ../adminnewparts.php?adminnewparts=Success");
				exit();
			}
	}
	else {
		header("Location: ../adminnewparts.php");
		exit();
	}