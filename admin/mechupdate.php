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
    <link rel="stylesheet" type="text/css" href="../css/mechupdatelayout.css">
    <link rel="stylesheet" type="text/css" href="../css/mechupdatestyle.css">
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
                    <a href="adminmechanics.php" class="active">Mechanics</a>
                    
                    <a href="adminparts.php">Parts and Accessories</a>
                    
                    <a href="adminroad.php">Roadside Assistance</a>
                    <a href="adminmsg.php">Messages</a>
                    <a href="adminsetting.php">Acccount Setting</a>
                </div>
            </div>
            <div class="content">
                <form class="update-details" action="include/mechupdate.inc.php?id=<?php echo $_GET['id']?>" method="POST">
					
					<?php
							require 'include/dbh.inc.php';

                            $mid = $_GET['id'];
							$sql = "SELECT * FROM mechanics WHERE mechanic_id='$mid';";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							$row = mysqli_fetch_assoc($result)
					?>

                    <div class="just"><h2><?php echo ucfirst($row["mechanic_first"]);?>'s Profile</h2></div>

                    <div class="img">
						<img id="output_image" src="<?php echo $row["mechanic_img"];?>" alt="" height="100px" width="100px">
					</div>

                    <div class="actual-form">
                        <label for="fname">FIRST NAME</label>
                        <div><input type="text" id="fname" name="fname" value="<?php echo ucfirst($row["mechanic_first"]);?>"></div>
                        <label for="lname">LAST NAME</label>
                        <div><input type="text" id="lname" name="lname" value="<?php echo ucfirst($row["mechanic_last"]);?>"></div>
                        <label for="address">ADDRESS LINE</label>
                        <div><input type="text" id="address" name="address" value="<?php echo ucfirst($row["mechanic_address"]);?>"></div>
                        <label for="garage">ASSOCIATED GARAGE</label>
                        <div><input type="text" id="garage" name="garage" value="<?php echo ucfirst($row["mechanic_garage"]);?>"></div>
                        <label for="city">CITY</label>
                        <div><input type="text" id="city" name="city" value="<?php echo ucfirst($row["mechanic_city"]);?>"></div>
						<label for="state">STATE/PROVINCE</label>
						<div class="slct"><select name="state" id="state">
							<option value="<?php $row["mechanic_state"];?>"><?php echo ucfirst($row["mechanic_state"]);?></option>
							<option value="province1">Province1</option>
							<option value="province2">Province2</option>
							<option value="province3">Province3</option>
							<option value="province4">Province4</option>
							<option value="province5">Province5</option>
							<option value="province6">Province6</option>
							<option value="province7">Province7</option>
						</select></div>
                        <label for="contact">CONTACT NO.</label>
						<div><input type="text" id="contact" name="contact" value="<?php echo $row["mechanic_contact"];?>"></div>
						
                        <div id="butn"><button type="submit" name="submit" class="update">Update Profile</button></div>
					</div>
				</form>
            </div>
        </div>
    </div>
</body>
</html>