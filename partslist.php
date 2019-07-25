<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nextdoor Mechanic</title>
	<meta name="viewport" content="width=device-width, initial-scale=-1">
	<link rel="shortcut icon" type="image/png" href="imgs/mech.png">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/partslistlayout.css">
	<link rel="stylesheet" type="text/css" href="css/partsliststyle.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
</head>
<body>
	<div class="wrapper">
		<header>
			<div class="title">
				<div class="logo-ptitle-bar">
					<div id="plogo">
						<a href="index.html"><img src="imgs/mf.png" title="Mechanic Finder"></a>
					</div>
					<div id="page-title">
						<h1>YOUR NEXTDOOR MECHANIC IS HERE</h1>
					</div>
				</div>
				<div id="contact">
					<a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
					<a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a>
					<a href="https://www.linkedin.com"> <i class="fa fa-linkedin"></i></a>
				</div>
			</div>
			
			<div class="nav-menu">
				<label for="toggle" class="show-menu"><i class="fa fa-bars"></i></label>
				<input type="checkbox" id="toggle">
				<nav class="menu">
					<ul class="menu-list" id="my-menu-list">
						<li class="menu-group"><a href="index.html" class="menu-link">find a mechanic</a></li>
						<li class="menu-group"><a href="parts.php" class="menu-link" id="active">parts and accessories</a></li>
						<li class="menu-group"><a href="road.html" class="menu-link">roadside assistance</a></li>
						<li class="menu-group"><a href="mechanics.html" class="menu-link">for mechanics</a></li>
						<li class="menu-group"><a href="contact.html" class="menu-link">Contact us</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<main>
			<section class="list">
                <h2><p>We found some parts you were looking for  <i class="fa fa-search"></i> </h2>
				<div class="profiles">
                    <table class="dec-table">
						<?php
						if (isset($_POST['submit'])) {

							require 'includes/dbh.inc.php';
							
							
							$brand = mysqli_real_escape_string($conn, $_POST['brand']);
							$model = mysqli_real_escape_string($conn, $_POST['model']);
							$part = mysqli_real_escape_string($conn, $_POST['part']);

							if(empty($brand) && empty($model) && empty($part)) {
								header("Location:includes/partsnotfound.html");
								exit();
							}
							
							$sql = "SELECT * FROM parts WHERE vec_brand='$brand' or vec_model='$model' or vec_part='$part';";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							$c=0;
							for($r=0;$r<($resultCheck/4);$r++) {
							?>
								<tr class="rows">
								<?php
								$i=0;
								
								while($i<4){
									$row = mysqli_fetch_assoc($result);
									$c++;
								?>
									
									<td>
									<a href="includes/partsdetail.php?id=<?php echo $row["vec_id"];?>" class="send">
										<div id="box">
											<div><img src="admin/include/<?php echo $row["picture"];?>" height="120px" width="180px" alt=""></div>
											<div><p><?php echo ucfirst($row["vec_brand"])." ".ucfirst($row["vec_model"]);?></p></div>
											<div><p><?php echo ucfirst($row["vec_part"]);?></p></div>
											<div><p><?php echo ucfirst($row["shop"]);?></p></div>
											<div><p><?php echo "Rs.".$row["price"];?></p></div>
											<div><p>Get shop direction  <i class="fa fa-map-marker"></i></p></div>
										</div>
									</a>
									</td>
								
							<?php 
									$i++;
								
									if($c==$resultCheck) {
										goto end;
									}
								}
							}	
							end:
							?>
								</tr>
						<?php
						}
						?>
					</table>
			</section>
		</main>
		<footer class="footer-distributed">

			<div class="footer-left">

				<a href="index.html"><img src="imgs/mf.png" title="Mechanic Finder"></a>

				<div class="footer-links">
					<ul>
						<li><a href="#">Find a mechanic</a></li>
						<li><a href="#">Parts and Accessories</a></li>
						<li><a href="#">Roadside Assistance</a></li>
						<li><a href="#">For Mechanics</a></li>
						<li><a href="#">Contact us</a></li>
					</ul>
				</div>
			</div>

			<div class="footer-center">

				<div>
					<p><i class="fa fa-map-marker"></i>Putalisadak road, Kathmandu, Nepal</p>
				</div>

				<div>
					<p><i class="fa fa-phone"></i>+014 001232</p>
				</div>

				<div>
					<p><i class="fa fa-envelope"></i><a href="mailto:nextdoormechanic@gmail.com">nextdoormechanic@gmail.com</a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>About the Company</span>
					We are newly formed company and we want to support every mechanics to be part of our community. 
					We also aim to satisfy our customer as far as possible.
				</p>

				<div class="footer-icons">

					<a href="https://facebook.com"><i class="fa fa-facebook"></i></a>
					<a href="https://twitter.com"><i class="fa fa-twitter"></i></a>
					<a href="https://linkedin.com"><i class="fa fa-linkedin"></i></a>

				</div>
			</div>
			<p class="footer-company-name">NextDoor Mechanic &copy; 2019</p>
		</footer>
	<div>
</body>
</html>