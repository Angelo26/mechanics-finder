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
    <link rel="stylesheet" type="text/css" href="../css/adminmsglayout.css">
    <link rel="stylesheet" type="text/css" href="../css/adminmsgstyle.css">
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
                    <a href="adminmsg.php" class="active">Messages</a>
                    <a href="adminsetting.php">Account Setting</a>
                </div>
            </div>
            <div class="content">
                <table class="dec-table">
                    <tr class="crows">
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>MESSAGE</th>
                    </tr>
                    <?php
					require 'include/dbh.inc.php';
                        
					$sql = "SELECT * FROM messages";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					while($row = mysqli_fetch_assoc($result)){
					?>
                        <tr class="rows">
                            <td><?php echo strtoupper($row["fname"]);?></td> 
                            <td><?php echo $row["email"];?></td>
                            <td><?php echo $row["fmessage"];?></td>
                        </tr>
                    <?php 
					} 
					?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>