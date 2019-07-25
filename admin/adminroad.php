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
    <link rel="stylesheet" type="text/css" href="../css/adminroadlayout.css">
    <link rel="stylesheet" type="text/css" href="../css/adminroadstyle.css">
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
                if(isset($_SESSION['u_id'])) {
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
                        <li><a href="adminaddroad.php">Add Road Assistants</a></li>
                    </ul>
                    <a href="adminmsg.php">Messages</a>
                    <a href="adminsetting.php">Acccount Setting</a>
                    
                </div>
            </div>
            <div class="content">
                <table class="dec-table">
                    <tr class="crows">
                        <th>COMPANY NAME</th>
                        <th>WEBSITE</th>
                        <th>CONTACT</th>
                        <th>ACTIONS</th>
                    </tr>
                    <?php
					require 'include/dbh.inc.php';
                        
					$sql = "SELECT * FROM roadassist";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					while($row = mysqli_fetch_assoc($result)){
					?>
                        <tr class="rows">
                            <td><?php echo ucfirst($row["cname"]);?></td> 
                            <td><a hre="https://<?php echo $row["website"];?>"><?php echo $row["website"];?></a></td>
                            <td><?php echo $row["contact"];?></td>
                            <td class="actions">
                            <div><a href="roadupdate.php?id=<?php echo $row["id"];?>" class="edit" onclick='return confirm("Are you sure you want to update?");'>edit</a></div>
                            <div><a href="include/deleteroad.inc.php?id=<?php echo $row["id"];?>" class="delete" onclick='return confirm("Are you sure you want to delete?");'>delete</a></div>
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