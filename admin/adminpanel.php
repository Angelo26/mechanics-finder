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
    <link rel="stylesheet" type="text/css" href="../css/adminpanellayout.css">
    <link rel="stylesheet" type="text/css" href="../css/adminpanelstyle.css">
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
                    <a href="adminpanel.php" class="active">Dashboard</a>
                    <a href="adminmechanics.php">Mechanics</a>
                    
                    <a href="adminparts.php">Parts and Accessories</a>
                    
                    <a href="adminroad.php">Roadside Assistance</a>
                    <a href="adminmsg.php">Messages</a>
                    <a href="adminsetting.php">Acccount Setting</a>
                </div>
            </div>
            <div class="content">
                <h2>Welcome <?php echo $row["username"];?></h2>
                <div class="conts">
                <table>
                    <tr>
                        <td>
                            <div class="tmech">
                            <?php
                                require 'include/dbh.inc.php';
                                $sql = "SELECT * FROM mechanics";
                                $result = mysqli_query($conn, $sql);
                                $tmech = mysqli_num_rows($result);
                            ?>	
                                <p><i class="fa fa-users"></i> Mechanics<p><?php echo $tmech;?></p></p>
                                
                            </div>
                        </td>

                        <td>
                            <div class="tpart">
                            <?php
                                $sql = "SELECT * FROM parts";
                                $result = mysqli_query($conn, $sql);
                                $tparts = mysqli_num_rows($result);
                            ?>
                                <p><i class="fa fa-cogs"></i> Parts and Accessories<p><?php echo $tparts;?></p></p>
                            </div>
                        </td>

                        <td>
                            <div class="troad">
                            <?php
                                $sql = "SELECT * FROM roadassist";
                                $result = mysqli_query($conn, $sql);
                                $troad = mysqli_num_rows($result);
                                
                            ?>
                                <p><i class="fa fa-bullhorn"></i> Roadside Assistances<p><?php echo $troad;?></p></p>
                            </div>
                                
                            
                        </td>

                        <td>
                            <div class="tmessage">
                            <?php
                                $sql = "SELECT * FROM messages";
                                $result = mysqli_query($conn, $sql);
                                $tmessage = mysqli_num_rows($result);
                                
                            ?>
                                <p><i class="fa fa-envelope"></i> Messages<p><?php echo $tmessage;?></p></p>
                            </div>
                        </td>
                    </tr>
                </table>
                </div>
                 
                <div class="img">
                    <img src="../imgs/analyze.gif" id="image" alt="">
                </div>
                <!-- <div class="desc">
                    <a href="chgdesc.php" id="chgdesc">Change client description</a>
                </div> -->
            </div>
        </div>
    </div>
</body>
</html>