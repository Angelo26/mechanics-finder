<?php
	require_once("head.php");
?>
	<link rel="stylesheet" type="text/css" href="css/partsdetailstyle.css">

		<nav class="navbar navbar-expand-sm p-0 sticky-top">
			<div class="container p-0">	
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				  	<i class="fa fa-bars" style="color: white;"></i>
				</button>
				<div class="collapse navbar-collapse justify-content-center p-0" id="collapsibleNavbar">
				  	<ul class="navbar-nav">
						<li class="nav-item"><a href="index.php" class="nav-link p-3">find a mechanic</a></li>
						<li class="nav-item"><a href="parts.php" class="nav-link p-3" id="active">parts and accessories</a></li>
						<li class="nav-item"><a href="road.php" class="nav-link p-3">roadside assistance</a></li>
						<li class="nav-item"><a href="mechanics.php?login=" class="nav-link p-3">for mechanics</a></li>
						<li class="nav-item"><a href="contact.php" class="nav-link p-3">contact us</a></li>
				  	</ul>
				</div>
			</div>  
		</nav>

		<div class="container my-3">		
            <div class="contact-detail">

                <?php

						require 'includes/dbh.inc.php';
			
						$vid = $_GET['id'];
                        
						$sql = "SELECT * FROM parts WHERE vec_id ='$vid'";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
							
						$row = mysqli_fetch_assoc($result);		
                    ?>
                
			    <div class="row">
						
							<div class="col-md-4 text-center">
								<div id="pdbox">
									<div><img src="admin/include/<?php echo $row["picture"];?>" height="120px" width="50%" alt=""></div>
										<div><p style="color: dodgerblue; font-weight: bold; font-size: 20px;"><?php echo ucfirst($row["vec_brand"])." ".ucfirst($row["vec_model"]);?></p></div>
										<div><p style="color: dodgerblue; font-size: 18px;"><?php echo "Part : ".ucfirst($row["vec_part"]);?></p></div>
										<div><p style="font-weight: bold; font-size: 18px;"><?php echo "Shop : ".ucfirst($row["shop"]);?></p></div>
										<div><p style="color: salmon; font-size: 20px;"><?php echo "Price :  Rs.".$row["price"];?></p></div>
										<div><p style=" font-size: 20px;"><?php echo ucfirst($row["pstatus"]);?></p></div>
								</div>
							</div>
								
							<div class="col-md-8">
								<div class="column">	
									<div class="gmap_canvas">
										<iframe id="gmap_canvas"
											src="https://maps.google.com/maps?q=<?php echo "exact ".ucfirst($row["shop"])?>&t=&z=14&ie=UTF8&iwloc=&output=embed"
											height= "450px" width= "100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
										</iframe>
									</div>
								</div>
							</div>
							
			    </div>
			</div>
		</div>

<?php
	require_once("footer.php");
?>
