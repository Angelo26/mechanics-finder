<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Buy Parts and Accessories</title>
	<meta name="viewport" content="width=device-width, initial-scale=-1">
	<link rel="shortcut icon" type="image/png" href="imgs/mech.png">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/partslayout.css">
	<link rel="stylesheet" type="text/css" href="css/partsstyle.css">
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
					<a href="https://www.facebook.com"><i class="fa fa-facebook-square"></i></a>
					<a href="https://www.twitter.com"><i class="fa fa-twitter-square"></i></a>
					<a href="https://www.linkedin.com"> <i class="fa fa-linkedin-square"></i></a>
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
            <section class="buy-parts">
                
				<h2>Search hundreds of auto part sites at once</h2>
                
                <p>Select your car and part type or enter a brief description into the search box below to buy parts online</p>
                
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
					
					<table>
						<tr>
							<td>
								<label for="brand">Vehicle Brand</label>
								<div><select id="brand" name="brand">
								<option value=""></option>
								<?php while($row1 = mysqli_fetch_array($result1)) {?>
							
								<option value="<?php echo $row1[0];?>"><?php echo ucfirst($row1[0]);?></option>
								<?php } ?>
								</select></div>
							</td>
							<td>
								<label for="model">Vehicle Model</label>
								<div><select id="model" name="model">
									<option value=""></option>
									<?php while($row2 = mysqli_fetch_array($result2)) {?>
								
									<option value="<?php echo $row2[0];?>"><?php echo ucfirst($row2[0]);?></option>
									<?php } ?>
								</select></div>
							</td>
							<td>
								<label for="part">Vehicle part</label>
								<div><select id=part" name="part">
									<option value=""></option>
									<?php while($row3 = mysqli_fetch_array($result3)) {?>
								
									<option value="<?php echo $row3[0];?>"><?php echo ucfirst($row3[0]);?></option>
									<?php } ?>
								</select></div>
							</td>
							<td>		
								<div><button type="submit" name="submit">search</button></div>
							<td>
						</tr>
					</table>
                </form>
				
				<div class="garage">
                    <img src="imgs/parts.jpg">
                </div>

                <article class="info">
                    <h3>BUY PARTS ONLINE AT LOWEST PRICES!!!</h3>
                    <ul>
                        <li>Find best deals for discount auto parts online</li>
                        <li>Save time on searching discount auto parts online</li>
                        <li>Quality brands guaranteed</li>
                        <li>Vehicle parts fitment assured</li>
                        <li>Save money on auto parts online</li>
                    </ul>
                </article>
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