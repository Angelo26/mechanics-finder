<?php
	$dbservername = "localhost"; 
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "mechanic finder";

	$conn = mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);

	if (!$conn) {
		die("connection_failed" . mysqli_connect_error());
	}