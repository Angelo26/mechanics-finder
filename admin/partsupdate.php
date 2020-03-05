
<?php
    session_start();
    if(!isset($_SESSION['u_uid'])) {
        header("location:index.php");
    }
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
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/partsupdatestyle.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
   


    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <a href="dashboard.php"><img src="../imgs/mf.png" width="20%" style="cursor: pointer;"></a>
            </div>
            <div class="admin">
                    <?php
							require 'include/dbh.inc.php';

							$user = $_SESSION['u_uid'];
							$sql = "SELECT * FROM admins WHERE id='$user';";
							$result = mysqli_query($conn, $sql);
							
							$row = mysqli_fetch_assoc($result);
					?>
                    <img src="<?php echo $row["photo"];?>" class="m-2" width="100" height="100" style="border-radius: 50%; padding: 3px; border: 3px solid lime; ">
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="dashboard.php" style="text-decoration: none;">DashBoard</a>
                </li>
                <li>
                    <a href="#mechanics" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" style="text-decoration: none;">Mechanics</a>
                    <ul class="collapse list-unstyled" id="mechanics">
                        <li>
                            <a href="verifymechanics.php" style="text-decoration: none;">Verify Mechanics</a>
                        </li>
                        <li>
                            <a href="adminmechanics.php" style="text-decoration: none;">View Mechanics</a>
                        </li>
                    </ul>
                </li>

                <li class="active">
                    <a href="#parts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" style="text-decoration: none;">AutoMobile Parts</a>
                    <ul class="collapse list-unstyled" id="parts">
                        <li>
                            <a href="adminnewparts.php" style="text-decoration: none;">Add New Parts</a>
                        </li>
                        <li>
                            <a href="adminaddparts.php" style="text-decoration: none;">Add Products</a>
                        </li>
                        <li class="active">
                            <a href="adminparts.php" style="text-decoration: none;">View Products</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="#roads" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" style="text-decoration: none;">Roadside Assistances</a>
                    <ul class="collapse list-unstyled" id="roads">
                        <li>
                            <a href="adminaddroad.php" style="text-decoration: none;">Add Roadside Assistances</a>
                        </li>
                        <li>
                            <a href="adminroad.php" style="text-decoration: none;">View Roadside Assistances</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="adminusers.php" style="text-decoration: none;">View Users</a>
                </li>
                <li >
                    <a href="adminmsg.php" style="text-decoration: none;">Messages</a>
                </li>
                <li>
                    <a href="adminsetting.php" style="text-decoration: none;">Setting</a>
                </li>
            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-align-left"></i>
                        
                    </button>
                   
                    <?php
                        if(isset($_SESSION['u_uid'])) {
                            echo '<form action="include/logout.inc.php" method="POST">
                             <button class="btn btn-primary" type="submit" name="submit">Log out</button>
                            </form>';
                        }
                        else
                            header("location:index.php");
                    ?>
             
                </div>
                <script>
                    $(document).ready(function () {
                        $('#sidebarCollapse').on('click', function () {
                            $('#sidebar').toggleClass('active');
                        });
                    });
                </script>
            </nav>

            <div class="content">
                <div class="text-center mb-3" style="color: rgba(0, 0, 0, 0.6);"><h2>Update your products here<h2></div>
                <form class="update-details" action="include/partupdate.inc.php?id=<?php echo $_GET['id']?>" method="POST">
					
					<?php
						require 'include/dbh.inc.php';

                        $vid = $_GET['id'];
						$sql = "SELECT * FROM parts WHERE vec_id='$vid';";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						$row = mysqli_fetch_assoc($result)
					?>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="img text-center my-3">
                                <img id="output_image" src="include/<?php echo $row["picture"];?>" alt="" height="180px" width="240px">
                            </div>
                        </div>

                        <div class="col-md-8 my-3">
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
                                <div><input type="text" id="shop" name="shop" value="<?php echo ucfirst($row["shop"]);?>"></div>
                                    
                                <label for="price">Price</label>
                                <div><input type="number" min="100" step="10" id="price" name="price" value="<?php echo $row["price"];?>" placeholder="<?php echo "Rs.".$row["price"];?>"></div>
                                    
                                <label for="pstatus">Vehicle part</label>
                                <div><select id="pstatus" name="pstatus" required>             
                                    <option value="<?php echo $row['pstatus'];?>"><?php echo ucfirst($row['pstatus']);?></option>
                                    <option value="Available">Available</option>
                                    <option value="Sold">Sold</option>
                                    </select>
                                </div>
                                <div class="update"><button type="submit" name="submit" class="btn btn-primary my-4">Update</button></div>
                            </div>
                        </div>
                    </div>
                    
				</form>
            </div>
        </div>
    </div>
</body>
</html>