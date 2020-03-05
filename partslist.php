<?php
	require_once("head.php");
?>
	<link rel="stylesheet" type="text/css" href="css/partsliststyle.css">

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
			<section class="list text-center">
                <div class="plists">
				<div class="row">
						<?php
						if (isset($_POST['submit'])) {

							require 'includes/dbh.inc.php';
							
							
							$brand = mysqli_real_escape_string($conn, $_POST['brand']);
							$model = mysqli_real_escape_string($conn, $_POST['model']);
							$part = mysqli_real_escape_string($conn, $_POST['part']);
							
							$sql = "SELECT * FROM parts WHERE vec_brand='$brand' and vec_model='$model' and vec_part='$part';";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							$c=0;
							
							for($r=0;$r<($resultCheck/4);$r++) {
							?>
								
								<?php
								$i=0;
								
								while($i<4){
									$row = mysqli_fetch_assoc($result);
									$c++;
								?>
									
								<div class="col-sm-3 my-3">
									<a href="partsdetail.php?id=<?php echo $row["vec_id"];?>" class="send">
										<div id="pbox" class="text-left">
											<div><img src="admin/include/<?php echo $row["picture"];?>" height="120" width="100%" alt=""></div>
											<div><p style="margin-left: 20px; color: dodgerblue; font-size: 16px; font-weight: bold"><?php echo ucfirst($row["vec_brand"])." ".ucfirst($row["vec_model"]);?></p></div>
											<div><p style="margin-left: 20px; color: dodgerblue; font-size: 16px;"><?php echo ucfirst($row["vec_part"]);?></p></div>
											<div><p style="margin-left: 20px; color: salmon; font-size: 16px;"><?php echo "Rs.".$row["price"];?></p></div>
											<div><p style="margin-left: 20px; font-size: 16px; padding-bottom: 10px;"><?php echo ucfirst($row["pstatus"]);?></p></div>
										</div>
									</a>
								</div>
								
								<?php 
									$i++;
								
									if($c==$resultCheck) {
										goto end;
									}
								}
							}	
							end:
						}?>
					</div>		
				</div>
			</section>
		</div>
<?php
	require_once("footer.php");
?>