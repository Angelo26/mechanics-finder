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
    <link rel="stylesheet" type="text/css" href="../css/adminpartslayout.css">
    <link rel="stylesheet" type="text/css" href="../css/adminpartsstyle.css">
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
                    
                    <a href="adminparts.php" class="active">Parts and Accessories</a>
                    <ul>
                        <li><a href="adminnewparts.php">Add new parts</a></li>
                        <li><a href="adminaddparts.php">Add parts</a></li>
                    </ul>
                    
                    <a href="adminroad.php">Roadside Assistance</a>
                    <a href="adminmsg.php">Messages</a>
                    <a href="adminsetting.php">Account Setting</a>
                </div>
            </div>
            <div class="content">
                <table class="dec-table">
                    <tr class="crows">
                        <th>PICTURE</th>
                        <th>BRAND</th>
                        <th>MODEL</th>
                        <th>PART</th>
                        <th>AVAILABLE SHOP</th>
                        <th>PRICE</th>
                        <th>ACTIONS</th>
                    </tr>
                    <?php
					require 'include/dbh.inc.php';
                        
					$sql = "SELECT * FROM parts";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					while($row = mysqli_fetch_assoc($result)){
					?>
                        <tr class="rows">
                            <td><img src="include/<?php echo $row["picture"];?>" height="100px" width="160px" alt=""</td>
                            <td><?php echo ucfirst($row["vec_brand"]);?></td>
                            <td><?php echo ucfirst($row["vec_model"]);?></td>
                            <td><?php echo ucfirst($row["vec_part"]);?></td>
                            <td><?php echo ucfirst($row["shop"]);?></td>
                            <td>Rs.<?php echo $row["price"];?></td>
                            <td class="actions">
                            <div><a href="partsupdate.php?id=<?php echo $row["vec_id"];?>" class="edit" onclick='return confirm("Are you sure you want to update?");'>edit</a></div>
                            <div><a href="include/deleteparts.inc.php?id=<?php echo $row["vec_id"];?>" class="delete" onclick='return confirm("Are you sure you want to delete?");'>delete</a></div>
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