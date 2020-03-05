<?php
	require_once("head.php");
?>
	<link rel="stylesheet" type="text/css" href="css/mechanicliststyle.css">
	

		<nav class="navbar navbar-expand-sm p-0 sticky-top">
			<div class="container p-0">	
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				  	<i class="fa fa-bars" style="color: white;"></i>
				</button>
				<div class="collapse navbar-collapse justify-content-center p-0" id="collapsibleNavbar">
				  	<ul class="navbar-nav">
						<li class="nav-item"><a href="index.php" class="nav-link p-3" id="active">find a mechanic</a></li>
						<li class="nav-item"><a href="parts.php" class="nav-link p-3">parts and accessories</a></li>
						<li class="nav-item"><a href="road.php" class="nav-link p-3">roadside assistance</a></li>
						<li class="nav-item"><a href="mechanics.php?login=" class="nav-link p-3">for mechanics</a></li>
						<li class="nav-item"><a href="contact.php" class="nav-link p-3">contact us</a></li>
				  	</ul>
				</div>
			</div>  
		</nav>

		<div class="container my-3">
			<section class="list text-center">
				<div class="profiles">
					<div class="row">
						<?php
						if (isset($_POST['submit'])) {

							require 'includes/dbh.inc.php';
			
							$location = mysqli_real_escape_string($conn, $_POST['location']);
                        
							$sql = "SELECT * FROM realmechanics WHERE mechanic_address like '$location%' OR mechanic_city like '$location%' ";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							if($resultCheck<1) {
							?>
								<img class="w-50 h-100 mx-auto" src="imgs/no_result.gif">

							<?php
							}

							$c=0;
							for($r=0;$r<($resultCheck/3);$r++) {
								$i=0;
								
								while($i<4){
									$row = mysqli_fetch_assoc($result);
									$c++;
								?>
									
								<div class="col-md-4 my-3">
								<div class="card hover">
										<div class="card-img" style="background-image: linear-gradient(rgba(0, 0, 0, .2), rgba(255, 255, 255, 0.1), rgba(0, 0, 0, .2)), url(imgs/mechback1.jpg);">
											<img class="mt-5" src="<?php echo $row["mechanic_img"];?>" width="130" height="130" style="border: 3px solid #fff; padding:3px; border-radius: 50%; box-shadow: 4px 5px 5px rgba(0, 0, 0, 0.5)">
											<div class="overlay">
												<div class="overlay-content">
													<a class="hover" href="mechdetail.php?id=<?php echo $row["mechanic_id"];?>" class="send">View More</a>
												</div>
											</div>
										</div>
										
										<div class="card-content text-left">
											<a>
											<h5 class="card-title">
												<?php 
												if ($row["mechanic_status"]==="active") {
												?>
												<div><p style="font-weight: bold;"><i class="fa fa-user" style="color: limegreen;"></i><?php echo "      ".ucfirst($row["mechanic_first"])." ".ucfirst($row["mechanic_last"])." ";?><span style="color: limegreen; font-size: 14px;" >(ACTIVE)</span></p></div>
												<?php
												}
												if($row["mechanic_status"]==="not active") {
												?>
												<div><p style="font-weight: bold;"><i class="fa fa-user" style="color: darkgray;"></i><?php echo "      ".ucfirst($row["mechanic_first"])." ".ucfirst($row["mechanic_last"])." ";?><span style="color: darkgray; font-size: 14px;">(NOT ACTIVE)</span></p></div>
												<?php
												}
												?>
												</h5>
												<p class="card-text"><i class="fa fa-map-marker"></i><?php echo "      ".ucfirst($row["mechanic_address"]).", ".ucfirst($row["mechanic_city"]);?></p>
												<p class="card-text"><i class="fa fa-phone"></i><?php echo "      ".$row["mechanic_contact"];?></p>
												

												<script>
												$(document).ready(function() {
	
													$('.card').delay(1800).queue(function(next) {
														$(this).removeClass('hover');
														$('a.hover').removeClass('hover');
														next();
													});
												});
												</script>
											</a>
										</div>
									</div>

								</div>
							<?php 
									$i++;
								
								if($c==$resultCheck) {
									goto end;
								}
								}
							}	
							end:
						}
						?>
						
						
						</div>
					</div>
					
				</div>
			</section>
		</div>
<?php
	require_once("footer.php");
?>
