<?php
    require 'dbh.inc.php';

    session_start();
    if(!isset($_SESSION['u_uid'])) {
        header("location:index.php");
    }
        $mid = $_GET['id'];
        $sql = "SELECT * FROM mechanics WHERE id='$mid';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $first = $row["mfirst"];
        $last = $row["mlast"];
        $email = $row["email"];
        $hashedPwd = $row["pwd"];
		$address = $row["maddress"];
		$garage = $row["garage"];
		$city = $row["city"];
		$state = $row["mstate"];
        $contact = $row["contact"];
        $destinationfile = $row["img"];

		$sql2 = "INSERT INTO realmechanics (mechanic_id, mechanic_first, mechanic_last, mechanic_email, mechanic_pwd, mechanic_address, mechanic_garage, mechanic_city, mechanic_state, mechanic_contact, mechanic_img, mechanic_status) VALUES ('$mid', '$first', '$last', '$email', '$hashedPwd', '$address', '$garage', '$city', '$state', '$contact','$destinationfile', 'active');";
        if(mysqli_query($conn, $sql2)){
            $sql3 = "DELETE from mechanics where id = '$mid'";
            $result3 = mysqli_query($conn, $sql3);
            mysqli_close($conn);
            $tablename = $first.$mid;
            $sql4 = "CREATE TABLE $tablename (
                id INT(11) UNSIGNED PRIMARY KEY,
                username VARCHAR(255),
                contact VARCHAR(255),
                usermessage varchar(255)
                )";
            if (mysqli_query($conn2, $sql4)) {

                $sql5 = "CREATE TABLE $tablename (
                    id INT(11) UNSIGNED PRIMARY KEY,
                    client VARCHAR(255)
                    )";
                
                if (mysqli_query($conn3, $sql5)) {
                    header("Location: ../verifymechanics.php?Verified successfully");
                    exit();
                }
            }
        }
    					
?>