<?php
	if (isset($_POST['submit'])) {

    session_start();
    require 'dbh.inc.php';
    
    $oldpwd = mysqli_real_escape_string($conn, $_POST['oldpwd']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $cpwd = mysqli_real_escape_string($conn, $_POST['cpwd']);
    

        if ($pwd!=$cpwd) {
            header("Location: ../profile.php?Password_&_Confirm_Password_do_not_match");
            exit();	
        }
        else {
            $email = $_SESSION['u_email'];
            $sql = "SELECT * FROM realmechanics WHERE mechanic_email='$email';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($row = mysqli_fetch_assoc($result)) {
                                
                $hashedPwdCheck = password_verify($oldpwd, $row['mechanic_pwd']);
                if ($hashedPwdCheck == false) {
                    header("Location: ../profile.php?Wrong_password");
                    exit();
                }
                elseif($hashedPwdCheck == true) {

                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    $sql = "UPDATE mechanics SET mechanic_pwd='$hashedPwd' WHERE mechanic_email='$email';";
                    $result = mysqli_query($conn, $sql);
                                
                    header("Location: ../profile.php?Password_Update=Success");
                    exit();
                }
            }  
        }
    }   
    else {
		header("Location: ../profile.php");
		exit();
    }
?>