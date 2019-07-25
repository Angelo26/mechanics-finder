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
    <link rel="stylesheet" type="text/css" href="../css/adminmechanicslayout.css">
    <link rel="stylesheet" type="text/css" href="../css/adminmechanicsstyle.css">
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
                    <a href="adminsetting.php">Account Setting</a>
                </div>
            </div>
            <div class="content">
                <table class="dec-table">
                    <tr class="crows">
                        <th>PROFILE PIC</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>GARAGE</th>
                        <th>STATE/PROVINCE</th>
                        <th>CITY</th>
                        <th>ADDRESS LINE</th>
                        <th>CONTACT NO.</th>
                        <th>ACTIONS</th>
                    </tr>
                    <?php
                		require 'include/dbh.inc.php';
                		$sql = "SELECT * FROM mechanics";
                		$result = mysqli_query($conn, $sql);
                		
    					while($row = mysqli_fetch_assoc($result)){
                	?>
                    <tr class="rows">
                        <td>
                            <p><img src="<?php echo $row["mechanic_img"];?>" height="50px" width="50px"></p>
                        </td>
                        <td>
                            <p><?php echo ucfirst($row["mechanic_first"])." ".ucfirst($row["mechanic_last"]);?></p>
                        </td>
                        <td>
                            <p><?php echo $row["mechanic_email"];?></p>
                        </td>
                        <td>
                            <p><?php echo ucfirst($row["mechanic_garage"]);?></p>
                        </td>
                        <td>
                            <p><?php echo ucfirst($row["mechanic_state"]);?></p>
                        </td>
                        <td>
                            <p><?php echo ucfirst($row["mechanic_city"]);?></p>
                        </td>
                        <td>
                            <p><?php echo ucfirst($row["mechanic_address"]);?></p>
                        </td>
                        <td>
                            <p><?php echo $row["mechanic_contact"];?></p>
                        </td>
                        <td class="actions">
                            <div><a href="mechupdate.php?id=<?php echo $row["mechanic_id"];?>" class="edit" onclick='return confirm("Are you sure you want to update this account?");'>edit</a></div>
                            <div><a href="include/deletemech.inc.php?id=<?php echo $row["mechanic_id"];?>" class="delete" onclick='return confirm("Are you sure you want to delete this account?");'>delete</a></div>
                        </td>
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