<?php

	if(isset($_POST['submit'])) {
		session_start();

        require 'dbh.inc.php';
        
        $username = mysqli_real_escape_string($conn, $_POST['user']);
        $oldpwd = mysqli_real_escape_string($conn, $_POST['oldpwd']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
        $cpwd = mysqli_real_escape_string($conn, $_POST['cpwd']);
	
		if ($pwd!=$cpwd) {
            header("Location: ../adminsetting.php?Password_&_Confirm_Password_do_not_match");
            exit();	
		}
		else {
            $user = $_SESSION['u_uid'];
            $sql = "SELECT * FROM admins WHERE id='$user';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($row = mysqli_fetch_assoc($result)) {
                                    
                $hashedPwdCheck = md5($oldpwd);
                if ($hashedPwdCheck === $row['password']) {
                    $hashedPwd = md5($pwd);
                    $sql = "UPDATE admins SET password='$hashedPwd', username='$username' WHERE id='$user';";
                    $result = mysqli_query($conn, $sql);
                    header("Location: ../adminsetting.php?Password_Change=Success");
                    exit();
                }
                else {
                    header("Location: ../adminsetting.php?Wrong_password");
                    exit();                
                }  
            }
		}
	}
	else {
		header("Location: ../adminsetting.php");
		exit();
	}
?>