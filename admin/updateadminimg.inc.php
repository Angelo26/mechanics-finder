<?php

	if(isset($_POST['submit'])) {
		session_start();

		require 'include/dbh.inc.php';

		$file = $_FILES['image'];
		$filename = $file['name'];
        
        if($filename=="") {
            header("Location: adminsetting.php");
            exit();
        }

        else {

            $fileerror = $file['error'];
            $filetmp = $file['tmp_name'];
            
            $fileext = explode('.',$filename);
            
            $filecheck = strtolower(end($fileext));
            
            $allowed = array('png', 'jpg', 'jpeg');

            if (in_array($filecheck,$allowed)) {
                
                $destinationfile='adminupload/'.$filename;
				move_uploaded_file($filetmp, $destinationfile);
		
                $uid = $_SESSION['u_uid'];
                $sql = "UPDATE admins SET photo='$destinationfile' WHERE id='$uid';";
                $result = mysqli_query($conn, $sql);
                header("Location: adminsetting.php?Update_Success");
                exit();

            }

		    else {
                header("Location: adminsetting.php?couldn't_upload_image");
                exit();
           }
        }
    }
?>