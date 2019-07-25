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
    <link rel="stylesheet" type="text/css" href="../css/adminaddpartslayout.css">
    <link rel="stylesheet" type="text/css" href="../css/adminaddpartsstyle.css">
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
                        <li><a href="addparts.php" class="active">Add parts</a></li>
                    </ul>
                    
                    <a href="adminroad.php">Roadside Assistance</a>
                    <a href="adminmsg.php">Messages</a>
                    <a href="adminsetting.php">Acccount Setting</a>
                </div>
            </div>
            <div class="content">    

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

                    <form class="add-details" action="include/adminaddparts.inc.php" method="POST" enctype="multipart/form-data">

                        <div class="img">
                                <img id="output_image" alt="" height="160px" width="240px">
                                
                                <label for="image" id="lbl">Browse</label>

                                <div style="visibility: hidden;" id="hidden"><input type="file" name="image" id="image" accept="image/*" onchange="preview_image(event)" required></div>
                        </div>
                            

                        <label for="Vehicle-brand">Vehicle Brand</label>
                        <div><select id="Vehicle-brand" name="brand" required>
                            <option value=""></option>
                            <?php while($row1 = mysqli_fetch_array($result1)) {?>
                            
                            <option value="<?php echo $row1[0];?>"><?php echo ucfirst($row1[0]);?></option>
                            <?php } ?>
                        </select></div>

                        <label for="vehicle-model">Vehicle Model</label>
                        <div><select id="vehicle-model" name="model" required>
                            <option value=""></option>
                            <?php while($row2 = mysqli_fetch_array($result2)) {?>
                            
                            <option value="<?php echo $row2[0];?>"><?php echo ucfirst($row2[0]);?></option>
                            <?php } ?>
                        </select></div>

                        <label for="vehicle-part">Vehicle part</label>
                        <div><select id="vehicle-part" name="part" required>
                            <option value=""></option>
                            <?php while($row3 = mysqli_fetch_array($result3)) {?>
                            
                            <option value="<?php echo $row3[0];?>"><?php echo ucfirst($row3[0]);?></option>
                            <?php } ?>
                        </select></div>

                        <label for="shop">Available Shop</label>
                        <div><input type="text" id="shop" name="shop" required></div>
                            
                        <label for="price">Price</label>
                        <div><input type="text" id="price" name="price" required></div>
                            
                        <div id="butn"><button type="submit" name="submit" class="save">Save</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>