<?php
	$dbservername = "localhost"; 
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "mechanic finder";

	$conn = mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);

	if (!$conn) {
		die("connection_failed" . mysqli_connect_error());
	}

	$dbservername2 = "localhost"; 
	$dbusername2 = "root";
	$dbpassword2 = "";
	$dbname2 = "mechanics";

	$conn2 = mysqli_connect($dbservername2,$dbusername2,$dbpassword2,$dbname2);

	if (!$conn2) {
		die("connection_failed" . mysqli_connect_error());
	}

	$dbservername3 = "localhost"; 
	$dbusername3 = "root";
	$dbpassword3 = "";
	$dbname3 = "mechclient";

	$conn3 = mysqli_connect($dbservername3,$dbusername3,$dbpassword3,$dbname3);

	if (!$conn3) {
		die("connection_failed" . mysqli_connect_error());
	}