
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
                        <li class="active">
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


            <div class="table-responsive-md">
                <table id="mechanictable" class="table table-striped mechtable" style="overflow-x: auto;" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                        <th>PICTURE</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>GARAGE</th>
                        <th>STATE/PROVINCE</th>
                        <th>CITY</th>
                        <th>ADDRESS LINE</th>
                        <th>CONTACT NO.</th>
                        <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'include/dbh.inc.php';
                            
                        $sql = "SELECT * FROM mechanics";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);
                        while($row = mysqli_fetch_assoc($result)){
                        ?>
                            <tr>
                            <td>
                                <img src="../<?php echo $row["img"];?>" height="50px" width="50px">
                            </td>
                            <td>
                                <p><?php echo ucfirst($row["mfirst"])." ".ucfirst($row["mlast"]);?></p>
                            </td>
                            <td>
                                <p><?php echo $row["email"];?></p>
                            </td>
                            <td>
                                <p><?php echo ucfirst($row["garage"]);?></p>
                            </td>
                            <td>
                                <p><?php echo ucfirst($row["mstate"]);?></p>
                            </td>
                            <td>
                                <p><?php echo ucfirst($row["city"]);?></p>
                            </td>
                            <td>
                                <p><?php echo ucfirst($row["maddress"]);?></p>
                            </td>
                            <td>
                                <p><?php echo $row["contact"];?></p>
                            </td>
                            <td class="actions">
                                <div><a href="include/verify.inc.php?id=<?php echo $row["id"];?>" class="btn btn-primary btn-sm mb-1" onclick='return confirm("Are you sure you want to verify this account?");'>verify</a></div>
                                <div><a href="include/deletereq.inc.php?id=<?php echo $row["id"];?>" class="btn btn-danger btn-sm mt-1" onclick='return confirm("Are you sure you want to delete this request?");'>delete</a></div>
                            </td>
                        </tr>
                        <?php 
                        } 
                        ?>
                    </tbody>
                </table>
            </div>
            </tbody>
            <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
            <script>
                $('.mechtable').DataTable();
            </script>
        </div>
    </div>
</body>
</html>