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
    <link rel="stylesheet" type="text/css" href="../css/adminnewpartslayout.css">
    <link rel="stylesheet" type="text/css" href="../css/adminnewpartsstyle.css">
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
                        <li><a href="adminnewparts.php" class="active">Add new parts</a></li>
                        <li><a href="adminaddparts.php">Add parts</a></li>
                    </ul>
                    <a href="adminroad.php">Roadside Assistance</a>
                    <a href="adminmsg.php">Messages</a>
                    <a href="adminsetting.php">Acccount Setting</a>
                </div>
            </div>
            <div class="content">
                <h2>Add new parts</h2>
                <form class="parts-detail" action="include/adminaddbrand.inc.php" method="POST">
                    <label for="brand">Vehicle Brand</label>
                    <div><input type="text" id="brand" name="brand" required></div>
                    <div><button type="submit" name="submit" class="submit">Add</button></div>
                </form>
                
                <form class="parts-detail" action="include/adminaddmodel.inc.php" method="POST">
                    <label for="model">Vehicle Model</label>
                    <div><input type="text" id="model" name="model" required></div>
                    <div><button type="submit" name="submit" class="submit">Add</button></div>
                </form>

                <form class="parts-detail" action="include/adminaddnewparts.inc.php" method="POST">
                    <label for="parts">Vehicle Parts</label>
                    <div><input type="text" id="parts" name="parts" required></div>    
                    <div><button type="submit" name="submit" class="submit">Add</button></div>
                </form>            
            </div>
        </div>
    </div>
</body>
</html>