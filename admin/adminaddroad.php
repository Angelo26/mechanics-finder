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
    <link rel="shortcut icon" type="image/png" href="">
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
    <link rel="stylesheet" type="text/css" href="../css/adminaddroadlayout.css">
    <link rel="stylesheet" type="text/css" href="../css/adminaddroadstyle.css">
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
                    <a href="adminroad.php" class="active">Roadside Assistance</a>
                    <ul>
                        <li><a href="adminaddroad.php" class="active">Add Road Assistants</a></li>
                    </ul>
                    <a href="adminmsg.php">Messages</a>
                    <a href="adminsetting.php">Acccount Setting</a>
                </div>
            </div>
            <div class="content">    

                <div class="actual-form">
                  
                    <form class="add-details" action="include/adminaddroad.inc.php" method="POST" enctype="multipart/form-data">
                        <h2> Add New Roadside Assistance Here<h2>
                        <label for="cname">COMPANY NAME</label>
                        <div><input type="text" id="cname" name="cname" required></div>

                        <label for="website">WEBSITE</label>
                        <div><input type="text" id="website" name="website" required></div>
                            
                        <label for="contact">CONTACT</label>
                        <div><input type="text" id="contact" name="contact" required></div>
                            
                        <div id="butn"><button type="submit" name="submit" class="save">Save</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>