<?php
	require_once("head.php");
?>
	
	<nav class="navbar navbar-expand-sm p-0 sticky-top">
		<div class="container p-0">	
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				  <i class="fa fa-bars" style="color: white;"></i>
			</button>
			<div class="collapse navbar-collapse justify-content-center p-0" id="collapsibleNavbar">
				  <ul class="navbar-nav">
					<li class="nav-item"><a href="index.php" class="nav-link p-3">find a mechanic</a></li>
					<li class="nav-item"><a href="parts.php" class="nav-link p-3">parts and accessories</a></li>
					<li class="nav-item"><a href="road.php" class="nav-link p-3" id="active">roadside assistance</a></li>
					<li class="nav-item"><a href="mechanics.php?login=" class="nav-link p-3">for mechanics</a></li>
					<li class="nav-item"><a href="contact.php" class="nav-link p-3">contact us</a></li>
				  </ul>
			</div>
		</div>
	</nav> 
	
		<div class="container">
			<section class="list">
                <div class="dec-table my-4 text-center">
                    
                    <?php
					require 'includes/dbh.inc.php';
                        
					$sql = "SELECT * FROM roadassist";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					while($row = mysqli_fetch_assoc($result)){
					?>
                        <div class="row my-3">
                            <div class="col-md-3 my-1"><?php echo ucfirst($row["cname"]);?></div> 
                            <div class="col-md-3 my-1"><a href="https://<?php echo $row["website"];?>" style=" color: steelblue; text-decoration: none;" ><?php echo $row["website"];?></a></div>
							<div class="col-md-3 my-1"><?php echo $row["contact"];?></div>
							<div class="col-md-3 my-2"><a href="roadassist.php?rname=<?php echo $row["cname"];?>" style=" border-radius: 5px; text-decoration: none; background: rgba(1, 25, 44, 0.7); box-shadow: 5px 5px 10px rgba(0 , 0, 0, 0.5); color: #fff; padding: 10px;" >GET DIRECTION <i class="fa fa-chevron-circle-right"></i></a></div>
						</div>
                    <?php 
					} 
					?>
                </div>
			</section>
		</div>
		<link rel="stylesheet" type="text/css" href="css/roadliststyle.css">
<?php
	require_once("footer.php");
?>