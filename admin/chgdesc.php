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
                    <a href="adminsetting.php">Account Setting</a>
                </div>
            </div>
            <div class="content">
                <table class="dec-table">
                    <tr class="crows">
                        <th>PICTURE</th>
                        <th>NAME</th>
                        <th>SAYING</th>
                        <th>ACTION</th>
                    </tr>
                    <?php
					require 'include/dbh.inc.php';
                        
					$sql = "SELECT * FROM chgdesc";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					while($row = mysqli_fetch_assoc($result)){
					?>
                        <tr class="rows">

                        <form class="update-details" action="include/chgdesc.inc.php" method="POST" enctype="multipart/form-data">

                            <td>  
                                <div><img id="output_image" class="first" src="<?php echo $row["picture"];?>" alt="">

                                <div>
                                <input type="file" name="image" id="image" accept="image/*" onchange="preview_image(event)"></div>
                        
                                </div>
                            </td>
                                      
                      
                         
                           
                            <td><input type="text" id="user" name="user" value="<?php echo strtoupper($row["name"]);?>" style="padding: 5px;"></td> 
                            
                            <td><textarea style="resize: none;" rows="10" cols="50"> <?php echo $row["saying"];?></textarea></td>
                            <td><button type="submit" name="submit" style="border: none; background: dodgerblue; padding: 8px; color: #fff; border-radius: 5px; cursor: pointer; box-shadow: 3px 3px 3px rgba(0,0,0,0.4);">update</button></td>
                        </form>
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