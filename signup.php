<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>For Mechanics</title>
	<meta name="viewport" content="width=device-width, initial-scale=-1">
	<link rel="shortcut icon" type="image/png" href="imgs/mech.png">
	<script type='text/javascript'>
		function preview_image(event) {
			var reader = new FileReader();
			reader.onload = function () {
				var output = document.getElementById('output_image');
				output.src = reader.result;
			}
			reader.readAsDataURL(event.target.files[0]);
		}
	</script>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/signuplayout.css">
	<link rel="stylesheet" type="text/css" href="css/signupstyle.css">
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
						<li class="menu-group"><a href="parts.php" class="menu-link">parts and accessories</a></li>
						<li class="menu-group"><a href="road.html" class="menu-link">roadside assistance</a></li>
						<li class="menu-group"><a href="mechanics.html" class="menu-link" id="active">for mechanics</a></li>
						<li class="menu-group"><a href="contact.html" class="menu-link">Contact us</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<main>
			<section class="signup-content">
				<h2>Registers Your new Account</h2>
				<?php 
					if($_GET['signup']) {
					$message = $_GET['signup'];
					?>
					<p style="color: red; text-align: center;">**<?php echo $message;?>**</p>
					<?php
					}
				?>
				
				<form class="signup" action="includes/signup.inc.php" method="POST" enctype="multipart/form-data">
					<div class="actual-form">
						<label for="fname">FIRST NAME</label>
						<div><input type="text" id="fname" name="fname" required></div>
						<label for="lname">LAST NAME</label>
						<div><input type="text" id="lname" name="lname" required></div>
						<label for="email">EMAIL</label>
						<div><input type="email" id="email" name="email" required></div>
						<label for="password">PASSWORD</label>
						<div><input type="password" id="password" name="pwd" required></div>
						<label for="cpwd">CONFIRM PASSWORD</label>
						<div><input type="password" id="cpwd" name="cpwd" required></div>
						<label for="address">ADDRESS LINE</label>
						<div><input type="text" id="address" name="address" required></div>
						<label for="garage">ASSOCIATED GARAGE</label>
						<div><input type="text" id="garage" name="garage" required></div>
						<label for="city">CITY</label>
						<div><input type="text" id="city" name="city" required></div>
						<label for="state">STATE/PROVINCE</label>
						<div class="slct"><select name="state" id="state">
							<option value="province1">Province1</option>
							<option value="province2">Province2</option>
							<option value="province3">Province3</option>
							<option value="province4">Province4</option>
							<option value="province5">Province5</option>
							<option value="province6">Province6</option>
							<option value="province7">Province7</option>
						</select></div>
						<label for="contact">CONTACT NO.</label>
						<div><input type="text" id="contact" name="contact" required></div>
					</div>
					<div class="img">
						<img id="output_image">
						<label for="image">Upload Image</label>
						<input type="file" name="image" id="image" accept="image/*" onchange="preview_image(event)">
					</div>

                    <div id="button"><button type="submit" name="submit" class="submit">Signup</button></div>
                </form>  
            </section>
            <section class="login-content">
                <h2>Already a Member?</h2> 
                <p>Sign in and get update for the work!</p>
				<div><a href="mechanics.html">SIGN IN</a></div>
				
				<div class="member-info">
					<h2>Membership benefits</h2>
					<ul>
						<li>Receive email and text notification when users schedule or book appointments to have their vehicle repaired or
						serviced</li>
						<li>Create coupons and deal campaigns to be shown on your public profile</li>
						<li>Choose and manage your work days, and choose the way you want it displayed on your public profile</li>
						<li>Easily use our Parts & Accessories application to buy parts from trusted marketplaces and vendors</li>
						<li>Get reviewed and respond to reviews</li>
						<li>Easily use our recall and and other technical tools to better serve your customers</li>
						<li>Your shop will be listed as a verified shop when the following services are being requested on our website:
							<ul>							
								<li>Preferred partner where cars can be towed to</li>
								<li>Displays your shop when users are shopping for auto parts</li>
								<li>Displays your shop when users are looking for mechanic shops to repair their cars</li>
							</ul>

						</li>
					</ul>
				</div>
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