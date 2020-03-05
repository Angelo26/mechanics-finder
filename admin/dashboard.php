
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
                <li class="active">
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
            </nav>

            <div class="content">
                <div class="text-center my-3"><h2 style="font-family: Arial Rounded MT; color: rgba(0,0,0,0.5);">Welcome <?php echo ucfirst($row["username"]);?></h2></div>
                <div class="conts">
                    <div class="row p-0 m-0">
                        <div class="col-md-3">
                            <div class="mprm" id="tmech">
                            <?php
                                require 'include/dbh.inc.php';
                                $sql = "SELECT * FROM realmechanics";
                                $result = mysqli_query($conn, $sql);
                                $tmech = mysqli_num_rows($result);
                            ?>	
                                <p style="font-size: 15px;"><i class="fa fa-users"></i> Mechanics<p><?php echo $tmech;?></p></p>
                                
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mprm" id="tpart">
                            <?php
                                $sql = "SELECT * FROM parts";
                                $result = mysqli_query($conn, $sql);
                                $tparts = mysqli_num_rows($result);
                            ?>
                                <p style="font-size: 15px;"><i class="fa fa-cogs"></i> Parts and Accessories<p><?php echo $tparts;?></p></p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mprm" id="troad">
                            <?php
                                $sql = "SELECT * FROM roadassist";
                                $result = mysqli_query($conn, $sql);
                                $troad = mysqli_num_rows($result);
                                
                            ?>
                                <p style="font-size: 15px;"><i class="fa fa-bullhorn"></i> Roadside Assistances<p><?php echo $troad;?></p></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mprm" id="tmsg">
                            <?php
                                $sql = "SELECT * FROM messages";
                                $result = mysqli_query($conn, $sql);
                                $tmessage = mysqli_num_rows($result);
                                
                            ?>
                                <p style="font-size: 15px;"><i class="fa fa-envelope"></i> Messages<p><?php echo $tmessage;?></p></p>
                            </div>
                        </div>    
                    </div>
                </div>
                 
                <div class="img text-center">
                    <img src="../imgs/analyze.gif" class="w-50"alt="">
                </div>
                <!-- <div class="desc">
                    <a href="chgdesc.php" id="chgdesc">Change client description</a>
                </div> -->
            </div>
        </div>
    </div>

</body>
</html>