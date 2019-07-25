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
    <link rel="stylesheet" type="text/css" href="../css/partsupdatelayout.css">
    <link rel="stylesheet" type="text/css" href="../css/partsupdatestyle.css">
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
                    
                    <a href="adminroad.php">Parts and Accessories</a>
                    
                    <a href="adminroad.php">Roadside Assistance</a>
                    <a href="adminmsg.php">Messages</a>
                    <a href="adminsetting.php">Acccount Setting</a>
                </div>
            </div>
            <div class="content">
                <form class="update-details" action="include/partupdate.inc.php?id=<?php echo $_GET['id']?>" method="POST">
					
					<?php
						require 'include/dbh.inc.php';

                        $vid = $_GET['id'];
						$sql = "SELECT * FROM parts WHERE vec_id='$vid';";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						$row = mysqli_fetch_assoc($result)
					?>

                    <div class="img">
						<img id="output_image" src="include/<?php echo $row["picture"];?>" alt="" height="160px" width="240px">
					</div>

                    <div class="actual-form">
                    <?php
                    require'include/dbh.inc.php'; 
                    $sql1 = "SELECT brand from brand";
					$result1 = mysqli_query($conn,$sql1);
					
                    $sql2 = "SELECT model from model";
					$result2 = mysqli_query($conn,$sql2);
	
                    $sql3 = "SELECT newpart from newpart";
                    $result3 = mysqli_query($conn,$sql3);
                   
                    ?>
                <form class="parts" action="partslist.php" method="POST">
                
                    <label for="Vehicle-brand">Vehicle Brand</label>
                    <div><select id="Vehicle-brand" name="brand">
            
                        <?php while($row1 = mysqli_fetch_array($result1)) {?>
                        
                        <option value="<?php echo $row1[0];?>"><?php echo ucfirst($row1[0]);?></option>
                        <?php } ?>
                    </select></div>

                    <label for="vehicle-model">Vehicle Model</label>
                    <div><select id="vehicl-model" name="model">
                        
                        <?php while($row2 = mysqli_fetch_array($result2)) {?>
                        
                        <option value="<?php echo $row2[0];?>"><?php echo ucfirst($row2[0]);?></option>
                        <?php } ?>
                    </select></div>

                    <label for="vehicle-part">Vehicle part</label>
                    <div><select id="vehicl-part" name="part">

                        <?php while($row3 = mysqli_fetch_array($result3)) {?>
                        
                        <option value="<?php echo $row3[0];?>"><?php echo ucfirst($row3[0]);?></option>
                        <?php } ?>
                    </select></div>

                    <label for="shop">Available Shop</label>
					<div><input type="text" id="shop" name="shop" value="<?php echo $row["shop"];?>"></div>
						
                    <label for="price">Price</label>
					<div><input type="number" min="100" step="10" id="price" name="price" value="<?php echo $row["price"];?>" placeholder="<?php echo "Rs.".$row["price"];?>"></div>
						
                    <div id="butn"><button type="submit" name="submit" class="update">Update</button></div>
				</form>
            </div>
        </div>
    </div>
</body>
</html>