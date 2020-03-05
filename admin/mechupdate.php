
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
    <link rel="stylesheet" type="text/css" href="../css/mechupdatestyle.css">
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
                <li class="active">
                    <a href="#mechanics" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" style="text-decoration: none;">Mechanics</a>
                    <ul class="collapse list-unstyled" id="mechanics">
                        <li>
                            <a href="verifymechanics.php" style="text-decoration: none;">Verify Mechanics</a>
                        </li>
                        <li class="active">
                            <a href="adminmechanics.php" style="text-decoration: none;">View Mechanics</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#parts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" style="text-decoration: none;">AutoMobile Parts</a>
                    <ul class="collapse list-unstyled" id="parts">
                        <li>
                            <a href="adminnewparts.php" style="text-decoration: none;">Add New Parts</a>
                        </li>
                        <li>
                            <a href="adminaddparts.php" style="text-decoration: none;">Add Products</a>
                        </li>
                        <li>
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
                <li>
                    <a href="adminmsg.php" style="text-decoration: none;">Messages</a>
                </li>
                <li>
                    <a href="adminsetting.php" style="text-decoration: none;">Setting</a>
                </li>
            </ul>         
            <script>
                $(document).ready(function () {
                    $('#sidebarCollapse').on('click', function () {
                        $('#sidebar').toggleClass('active');
                    });
                });
            </script>
        </nav>

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
            </nav>


            <div class="content">
                <form class="update-details" action="include/mechupdate.inc.php?id=<?php echo $_GET['id']?>" method="POST">
					
					<?php
							require 'include/dbh.inc.php';

                            $mid = $_GET['id'];
							$sql = "SELECT * FROM realmechanics WHERE mechanic_id='$mid';";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							$row = mysqli_fetch_assoc($result);
					?>

                    <div class="user text-center my-4"><h2><?php echo ucfirst($row["mechanic_first"]);?>'s Profile</h2></div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="img text-center">
                                <img src="../<?php echo $row["mechanic_img"];?>" alt="" height="120px" width="120px">
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="actual-form">
                                <div class="d-flex">

                                    <div class="lbl mr-3 d-flex flex-column">
                                        <label for="fname">FIRST NAME</label>
                                        <input type="text" id="fname" name="fname" value="<?php echo ucfirst($row["mechanic_first"]);?>">
                                    </div>
                                    <div class="lbl ml-3 d-flex flex-column">
                                        <label for="lname">LAST NAME</label>
                                        <input type="text" id="lname" name="lname" value="<?php echo ucfirst($row["mechanic_last"]);?>">
                                    </div>
                                </div>    
                                <div class="d-flex">
                                    <div class="lbl mr-3 d-flex flex-column">   
                                        <label for="lname">Email</label>
                                        <input type="text" id="email" name="email" value="<?php echo ucfirst($row["mechanic_email"]);?>">
                                    </div> 
                                    
                                    <div class="lbl ml-3 d-flex flex-column">
                                       <label for="contact">CONTACT NO.</label>
                                        <input type="text" id="contact" name="contact" value="<?php echo $row["mechanic_contact"];?>">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="lbl mr-3 d-flex flex-column">   
                                        <label for="address">ADDRESS LINE</label>
                                        <input type="text" id="address" name="address" value="<?php echo ucfirst($row["mechanic_address"]);?>">
                                    </div>
                                    <div class="lbl ml-3 d-flex flex-column">
                                        <label for="garage">ASSOCIATED GARAGE</label>
                                        <input type="text" id="garage" name="garage" value="<?php echo ucfirst($row["mechanic_garage"]);?>">
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="lbl mr-3 d-flex flex-column">   
                                        <label for="city">CITY</label>
                                        <input type="text" id="city" name="city" value="<?php echo ucfirst($row["mechanic_city"]);?>">
                                    </div>
                                    <div class="lbl ml-3 d-flex flex-column">
                                        <label for="state">STATE/PROVINCE</label>
                                        <div class="slct"><select name="state" id="state">
                                            <option value="<?php $row["mechanic_state"];?>"><?php echo ucfirst($row["mechanic_state"]);?></option>
                                            <option value="province1">Province1</option>
                                            <option value="province2">Province2</option>
                                            <option value="province3">Province3</option>
                                            <option value="province4">Province4</option>
                                            <option value="province5">Province5</option>
                                            <option value="province6">Province6</option>
                                            <option value="province7">Province7</option>
                                        </select></div>
                                    </div>
                                </div>
                                <div class="update"><button type="submit" name="submit" class="btn btn-primary my-4">Update Profile</button></div>
                            </div>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>
</body>
</html>