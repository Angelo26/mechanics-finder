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
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" type="text/css" href="../css/roadupdatelayout.css">
    <link rel="stylesheet" type="text/css" href="../css/roadupdatestyle.css">
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
                    <a href="adminmsg.php">Messages</a>
                    <a href="adminsetting.php">Acccount Setting</a>
                </div>
            </div>
            <div class="content">
                <form class="update-details" action="include/roadupdate.inc.php?id=<?php echo $_GET['id']?>" method="POST">
					
					<?php
							require 'include/dbh.inc.php';

                            $rid = $_GET['id'];
							$sql = "SELECT * FROM roadassist WHERE id='$rid';";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							$row = mysqli_fetch_assoc($result)
					?>

                    
                    <div class="actual-form">

                        <h2> Update Roadside Assistance<h2>
                        
                        <label for="cname">COMPANY NAME</label>
                        <div><input type="text" id="cname" name="cname" value="<?php echo ucfirst($row["cname"]);?>"></div>

                        <label for="website">WEBSITE</label>
                        <div><input type="text" id="website" name="website" value="<?php echo $row["website"];?>"></div>
                        
                        <label for="contact">CONTACT</label>
						<div><input type="text" id="contact" name="contact" value="<?php echo $row["contact"];?>"></div>
						
                        <div id="butn"><button type="submit" name="submit" class="update">Update</button></div>
					</div>
				</form>
            </div>
        </div>
    </div>
</body>
</html>