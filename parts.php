<?php
	require_once("head.php");
?>
	<link rel="stylesheet" type="text/css" href="css/partsstyle.css">
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
            <div class="buy-parts mb-3">
                
				<h2>Search hundreds of auto part sites at once</h2>
                
                <p class="my-3">Select your car and part type or enter a brief description into the search box below to buy parts online</p>
                
                <?php
                    require'includes/dbh.inc.php'; 
                    $sql1 = "SELECT brand from brand";
					$result1 = mysqli_query($conn,$sql1);
					
                    $sql2 = "SELECT model from model";
					$result2 = mysqli_query($conn,$sql2);
	
                    $sql3 = "SELECT newpart from newpart";
                    $result3 = mysqli_query($conn,$sql3);
                ?>
                <form class="parts" action="partslist.php" method="POST">
					
					<div class="row p-0 r-0 text-center">
						<div class="col-md-3">
							<label for="brand">Vehicle Brand</label>
							<div>
								<select id="brand" name="brand">
								
								<?php while($row1 = mysqli_fetch_array($result1)) {?>
							
								<option value="<?php echo $row1[0];?>"><?php echo ucfirst($row1[0]);?></option>	
								<?php } ?>
								
								</select>
							</div>
						</div>

						<div class="col-md-3">
							<label for="model">Vehicle Model</label>
							<div>
								<select id="model" name="model">
								<?php while($row2 = mysqli_fetch_array($result2)) {?>
			
								<option value="<?php echo $row2[0];?>"><?php echo ucfirst($row2[0]);?></option>
								<?php } ?>
								</select>
							</div>
						</div>

						<div class="col-md-3">
							<label for="part">Vehicle part</label>
							<div>
								<select id="part" name="part">
								<?php while($row3 = mysqli_fetch_array($result3)) {?>
								
								<option value="<?php echo $row3[0];?>"><?php echo ucfirst($row3[0]);?></option>
								<?php } ?>
								</select>
							</div>
						</div>
						
					<div class="col-md-3 my-3">
						<button id="pbtn" class="btn" type="submit" name="submit">Search  <i class="fa fa-search" aria-hidden="true"></i></button>
					</div>
                </form>
				
			</div>
			
			<div class="garage text-center mx-auto">
                    <img src="imgs/parts.jpg">
                </div>

                <div class="info">
                    <h4 class="my-3">BUY PARTS ONLINE AT LOWEST PRICES!!!</h4>
                    <ul>
                        <li>Find best deals for discount auto parts online</li>
                        <li>Save time on searching discount auto parts online</li>
                        <li>Quality brands guaranteed</li>
                        <li>Vehicle parts fitment assured</li>
                        <li>Save money on auto parts online</li>
                    </ul>
				</div>
			</div>
		</div>
<?php
	require_once("footer.php");
?>
		