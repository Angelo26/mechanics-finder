<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nextdoor Mechanic</title>
	<meta name="viewport" content="width=device-width, initial-scale=-1">
	<link rel="shortcut icon" type="image/png" href="imgs/mech.png">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/roadlistlayout.css">
	<link rel="stylesheet" type="text/css" href="css/roadliststyle.css">
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
						<li class="menu-group"><a href="parts.php" class="menu-link">parts and accessories</a></li>
						<li class="menu-group"><a href="road.html" class="menu-link"  id="active">roadside assistance</a></li>
						<li class="menu-group"><a href="mechanics.html" class="menu-link">for mechanics</a></li>
						<li class="menu-group"><a href="contact.html" class="menu-link">Contact us</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<main>
			<section class="list">
                <table class="dec-table">
                    <tr class="crows">
                        <th>COMPANY NAME</th>
                        <th>WEBSITE</th>
						<th>CONTACT</th>
						<th>LOCATION</th>
                    </tr>
                    <?php
					require 'includes/dbh.inc.php';
                        
					$sql = "SELECT * FROM roadassist";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					while($row = mysqli_fetch_assoc($result)){
					?>
                        <tr class="rows">
                            <td><?php echo ucfirst($row["cname"]);?></td> 
                            <td><a href="https://<?php echo $row["website"];?>" style=" color: steelblue; text-decoration: none;" ><?php echo $row["website"];?></a></td>
							<td><?php echo $row["contact"];?></td>
							<td><a href="roadassist.php?rname=<?php echo $row["cname"];?>" style=" border-radius: 5px; text-decoration: none; background: rgba(1, 25, 44, 0.7); box-shadow: 5px 5px 10px rgba(0 , 0, 0, 0.5); color: #fff; padding: 10px;" >GET DIRECTION <i class="fa fa-chevron-circle-right"></i></a></td>
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