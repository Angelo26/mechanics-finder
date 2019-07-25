<?php
	session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=-1">
    <link rel="shortcut icon" type="image/png" href="../imgs/mech.png">
    <script type='text/javascript'>
		function preview_image(event) {
			var reader = new FileReader();
			reader.onload = function () {
				var output = document.getElementById('output_image');
				output.src = reader.result;
			}
			reader.readAsDataURL(event.target.files[0]);
		}
	</script>
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" type="text/css" href="../css/adminsettinglayout.css">
    <link rel="stylesheet" type="text/css" href="../css/adminsettingstyle.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="adlogo">
                <img src="../imgs/adlogo.png">
            </div>
            <div class="logout">
        
                <?php
                if(isset($_SESSION['u_uid'])) {
                echo '<form action="include/logout.inc.php" method="POST">
                    <button type="submit" name="submit">Log out</button>
                </form>';
                }
                ?>
            </div>
        </div>
        <div class="main">
            <div class="side-bar">
                <div class="admin">
                    <?php
							require 'include/dbh.inc.php';

							$user = $_SESSION['u_uid'];
							$sql = "SELECT * FROM admins WHERE id='$user';";
							$result = mysqli_query($conn, $sql);
							
							$row = mysqli_fetch_assoc($result);
					?>
                    <img src="<?php echo $row["photo"];?>" alt="" id="admin">
                
                </div>
                <div class="menu">
                    <a href="adminpanel.php">Dashboard</a>
                    <a href="adminmechanics.php">Mechanics</a>
                    
                    <a href="adminparts.php">Parts and Accessories</a>
                    
                    <a href="adminroad.php">Roadside Assistance</a>
                    <a href="adminmsg.php">Messages</a>
                    <a href="adminsetting.php" class="active">Account Setting</a>
                </div>
            </div>
            <div class="content">
                <div class="inside">
                    <form class="change-img" action="updateadminimg.inc.php" method="POST" enctype="multipart/form-data">

                        <?php
							require 'include/dbh.inc.php';
	
							$sql = "SELECT * FROM admins WHERE id='$user';";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_assoc($result);
                        ?>
                        <div class="chg">
                            <img id="output_image" class="first" src="<?php echo $row["photo"];?>" alt="">
                            
                            <label for="image" id="lbl">ｃｈａｎｇｅ</label>

                            <div style="visibility: hidden;" id="hidden"><input type="file" name="image" id="image" accept="image/*" onchange="preview_image(event)"></div>
                        </div>
                        
                        <div class="but"><button type="submit" name="submit">upload</button></div>
                    </form>
                    
                    <form class="reset-form" action="include/updateaccount.inc.php" method="POST">
                    
                            <div class="back">
                                <h3>Reset Your Account Details</h3>
                                <label for="user">USERNAME</label>
                                <div><input type="text" id="user" name="user" value="<?php echo $row["username"];?>" required></div>
                                <label for="oldpwd">CURRENT PASSWORD</label>
                                <div><input type="password" id="oldpwd" name="oldpwd" required></div>
                                <label for="pwd">NEW PASSWORD</label>
                                <div><input type="password" id="pwd" name="pwd" required></div>
                                <label for="cpwd">CONFIRM NEW PASSWORD</label>
                                <div><input type="password" id="cpwd" name="cpwd"required></div>
                            </div>
                            
                            <div class="but"><button type="submit" name="submit" class="chpwd">Save</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>