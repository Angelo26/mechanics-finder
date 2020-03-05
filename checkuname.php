
<?php

    require 'includes/dbh.inc.php';
    if(isset($_POST['user_name'])) {
    
        $sql = "SELECT * FROM users WHERE username='".$_POST["user_name"]."';";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            echo'<span class="text-danger">Username already taken</span>';	
        }
        else
            echo'<span class="text-success">Username Available</span>';
    }

    if(isset($_POST['user_email'])) {
    
        $sql = "SELECT * FROM users WHERE email='".$_POST["user_email"]."';";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            echo'<span class="text-danger">Email is already used</span>';	
        }
        
    }   

    if(isset($_POST['mech_email'])) {
        $sql = "SELECT * FROM mechanics WHERE email='".$_POST["mech_email"]."';";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		if ($resultCheck > 0) {
			echo'<span class="text-danger">Email is already used</span>';	
        }
    }
    if(isset($_POST['rmech_email'])) {
        $sql2 = "SELECT * FROM realmechanics WHERE mechanic_email='".$_POST["rmech_email"]."';";
		$result2 = mysqli_query($conn, $sql2);
		$resultCheck2 = mysqli_num_rows($result2);

		if ($resultCheck2 > 0) {
			echo'<span class="text-danger">Email is already used</span>';	
        }
    }

    if(isset($_POST['user_log'])) {
        $name=$_POST['user_log'];
        $sql3 = "SELECT * FROM users WHERE username='".$_POST["user_log"]."' OR email='".$_POST["user_log"]."';";
        $result3 = mysqli_query($conn, $sql3);
        $resultCheck3 = mysqli_num_rows($result3);

        if ($resultCheck3 < 1) {
            echo'<span class="text-danger">User not found</span>';	
        }
        else
            echo'<span class="text-success">Welcome '. $name.'</span>';
        }?> 