<?php

	if(isset($_POST['submit'])) {
		
		require 'dbh.inc.php';

		$model = mysqli_real_escape_string($conn, $_POST['model']);
		
			$sql = "SELECT * FROM model WHERE model='$model';";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);

			if ($resultCheck > 0) {
				header("Location: ../adminnewparts.php?adminnewparts=its_alreaday_there");
				!xt();	
			}
			else {
				$sql = "INSERT INTO model (model) VALUES ('$model');";
				$result = mysqli_query($conn, $sql);
				header("Location: ../adminnewparts.php?adminnewparts=Success");
				exit();
			}
	
	}
	else {
		header("Location: ../adminnewparts.php");
		exit();
	}