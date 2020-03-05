<?php
	session_start();
	if(!isset($_SESSION['u_id'])){
		header("location: mechanics.php?login=");
	}
?>
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nextdoor Mechanic</title>
	<meta name="viewport" content="width=device-width, initial-scale=-1">
	<link rel="shortcut icon" type="image/png" href="imgs/mech.png">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/mfstyle.css">
	<link rel="stylesheet" type="text/css" href="css/profilestyle.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container">
		<header>
			<div class="row my-3">
				<div class="col-md-10 text-center">
					<div class="row">
						<div class="col-md-2" id="plogo">
							<a href="index.php"><img src="imgs/mf.png" height="90" title="Mechanic Finder" alt="Nextdoor Mechanic"></a>
						</div>
						<div class="col-md-10 my-2 mx-auto" id="page-title">
							<h1>YOUR NEXTDOOR MECHANIC IS HERE</h1>
						</div>
					</div>
				</div>
			</div>
		</header>
	</div>
	
	
	
	<nav class="navbar navbar-expand-sm p-0 sticky-top">
		<div class="container p-0">	
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				  <i class="fa fa-bars" style="color: white;"></i>
			</button>
			<div class="collapse navbar-collapse justify-content-center p-0" id="collapsibleNavbar">
				  <ul class="navbar-nav">
					<li class="nav-item"><a href="index.php" class="nav-link p-3">find a mechanic</a></li>
					<li class="nav-item"><a href="parts.php" class="nav-link p-3">parts and accessories</a></li>
					<li class="nav-item"><a href="road.php" class="nav-link p-3">roadside assistance</a></li>
					<li class="nav-item"><a href="mechanics.php?login=" class="nav-link p-3" id="active">for mechanics</a></li>
					<li class="nav-item"><a href="contact.php" class="nav-link p-3">contact us</a></li>
				  </ul>
			</div>
		</div>  
	</nav>
	
	

		<div class="container mt-3">			
			
			<div class="content">
                <?php
                require 'includes/dbh.inc.php';
                $uid = $_SESSION['u_id'];
				$sql = "SELECT * FROM realmechanics WHERE mechanic_id='$uid';";
				$result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                
                $mtable=$row["mechanic_first"].$uid;
                ?>
                <div class="table-responsive-md">
                    <table id="mecmsg" class="table table-striped mecmsgtable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>NAME</th>
                                <th>CONTACT</th>
                                <th>MESSAGE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        
                                
                            $sql2 = "SELECT * FROM $mtable";
                            $result = mysqli_query($conn2, $sql2);
                            $resultCheck = mysqli_num_rows($result);
                            while($row = mysqli_fetch_assoc($result)){
                            ?>
                                <tr>
                                    <td><?php echo ucfirst($row["username"]);?></td> 
                                    <td><?php echo $row["contact"];?></td>
                                    <td><?php echo $row["usermessage"];?></td>
                                </tr>
                            <?php 
                            } 
                            ?>
                        </tbody>
                    </table>
                    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
                    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    
                    <script>
                        $('.mecmsgtable').DataTable();
                    </script>
                </div>					
			</div>
	    </div>
<?php
	require_once("footer.php");
?>
		