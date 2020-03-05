
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
   


        <link rel="stylesheet" type="text/css" href="../css/adminsettingstyle.css">
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
                <li class="active">
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
            <div class="content w-75 mx-auto">
                <div class="inside">
                <div class="text-center text-primary mb-5"><h3>Reset Your Account Details</h3></div>
                    <div class="row">
                        <div class="col-md-4">
                            <form class="change-img" action="updateadminimg.inc.php" method="POST" enctype="multipart/form-data">

                                <?php
                                    require 'include/dbh.inc.php';
            
                                    $sql = "SELECT * FROM admins WHERE id='$user';";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                ?>
                                <div class="chg">
                                    <img id="output_image" class="first" src="<?php echo $row["photo"];?>" alt="">
                                    
                                    <label for="image" id="lbl"><p class="mt-3" style=" font-weight: bold; color: rgba(0, 0, 0, .5);">update</p></label>

                                    <div style="visibility: hidden; position: absolute; font-size: 0;" id="hidden"><input type="file" name="image" id="image" accept="image/*" onchange="preview_image(event)"></div>
                                    
                                </div>
                                <div><button class="btn btn-primary" type="submit" name="submit" style="margin: 10px 0; width: 60%;">upload</button></div>
                                
                            </form>
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
                        </div>
                        <div class="col-md-8">  
                            <form class="reset-form" action="include/updateaccount.inc.php" method="POST">
                        
                                <div class="chpwd">
                                    
                                    <label for="user">USERNAME</label>
                                    <div><input type="text" id="user" name="user" value="<?php echo ucfirst($row["username"]);?>" required></div>
                                    <label for="oldpwd">CURRENT PASSWORD</label>
                                    <div><input type="password" id="oldpwd" name="oldpwd" required></div>
                                    <label for="pwd">NEW PASSWORD</label>
                                    <div><input type="password" id="pwd" name="pwd" required></div>
                                    <label for="cpwd">CONFIRM NEW PASSWORD</label>
                                    <div><input type="password" id="cpwd" name="cpwd"required></div>
                                </div>
                                
                                <div><button type="submit" name="submit" class="btn btn-primary my-3" style="width: 50%;">Save</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>