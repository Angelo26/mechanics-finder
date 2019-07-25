<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=-1">
	<link rel="shortcut icon" type="image/png" href="../imgs/mech.png">
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
	<link rel="stylesheet" type="text/css" href="../css/reset.css">
	<link rel="stylesheet" type="text/css" href="../css/profilelayout.css">
	<link rel="stylesheet" type="text/css" href="../css/profilestyle.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
</head>
<body>
	<div class="wrapper">
		<header>
			<div class="title">
				<div class="logo-ptitle-bar">
					<div id="plogo">
						<a href="../index.html"><img src="../imgs/mf.png" title="Mechanic Finder"></a>
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
						<li class="menu-group"><a href="../index.html" class="menu-link">find a mechanic</a></li>
						<li class="menu-group"><a href="../parts.php" class="menu-link">parts and accessories</a></li>
						<li class="menu-group"><a href="../road.html" class="menu-link">roadside assistance</a></li>
						<li class="menu-group"><a href="../mechanics.html" class="menu-link"  id="active">for mechanics</a></li>
						<li class="menu-group"><a href="../contact.html" class="menu-link">Contact us</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<main>
			<section class="profile">
				<form class="update-details" action="update.inc.php" method="POST" enctype="multipart/form-data">
					<div class="just"><h2>Your Profile</h2></div>
					<?php
							require 'dbh.inc.php';

							$uid = $_SESSION['u_id'];
							$sql = "SELECT * FROM mechanics WHERE mechanic_id='$uid';";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							$row = mysqli_fetch_assoc($result)
					?>
				
                    <div class="img">
						<img id="output_image" src="<?php echo $row["mechanic_img"];?>" alt="">
						<label for="image">Change Picture</label>
						<input type="file" name="image" id="image" accept="image/*" onchange="preview_image(event)">
                    </div>

                    <div class="actual-form">
                        <label for="fname">FIRST NAME</label>
                        <div><input type="text" id="fname" name="fname" value="<?php echo ucfirst($row["mechanic_first"]);?>"></div>
                        <label for="lname">LAST NAME</label>
                        <div><input type="text" id="lname" name="lname" value="<?php echo ucfirst($row["mechanic_last"]);?>"></div>
                        <label for="email">EMAIL</label>
                        <div><input type="email" id="email" name="email" value="<?php echo $row["mechanic_email"];?>"></div>
                        <label for="address">ADDRESS LINE</label>
                        <div><input type="text" id="address" name="address" value="<?php echo ucfirst($row["mechanic_address"]);?>"></div>
                        <label for="garage">ASSOCIATED GARAGE</label>
                        <div><input type="text" id="garage" name="garage" value="<?php echo ucfirst($row["mechanic_garage"]);?>"></div>
                        <label for="city">CITY</label>
                        <div><input type="text" id="city" name="city" value="<?php echo ucfirst($row["mechanic_city"]);?>"></div>
						<label for="state">STATE/PROVINCE</label>
						<div class="slct"><select name="state" id="state">
							<option value="<?php $row["mechanic_state"];?>"><?php echo ucfirst($row["mechanic_state"]);?></option>
							<option value="province1">Province1</option>
							<option value="province2">Province2</option>
							<option value="province3">Province3</option>
							<option value="province4">Province4</option>
							<option value="province5">Province5</option>
							<option value="province6">Province6</option>
							<option value="province7">Province7</option>
						</select></div>
                        <label for="contact">CONTACT NO.</label>
						<div><input type="text" id="contact" name="contact" value="<?php echo $row["mechanic_contact"];?>"></div>
						
                        <div><button type="submit" name="submit" class="update">Update Profile</button></div>
					</div>
				</form>
				<form class="m-status" action="status.inc.php" method="POST">
					<?php
					if(strtolower($row["mechanic_status"])==="active") {
					?>
						<div style="visibility: hidden;"><input type="text" id="status" name="status" value="not active"></div>
						<div><button type="submit" name="submit" class="status" style="background: darkgray;">Deactivate</button></div>
					<?php
					}
					if(strtolower($row["mechanic_status"])==="not active") {
					?>
						<div style="visibility: hidden;"><input type="text" id="status" name="status" value="active"></div>
						<div><button type="submit" name="submit" class="status" style="background: rgb(87, 136, 67);">Activate</button></div>
					<?php
					}
					?>
				</form>
				<form action="logout.inc.php" method="POST">
						<button type="submit" name="submit" class="logout">Log out</button>
				</form>   

				<button class="open-button" onclick="openForm()">Set New Password</button>
				<div class="form-popup" id="myForm">
					<form class="form-container" action="changepwd.inc.php" method="POST">
						<div class="change">
							<h3>Change Password</h3>
							<label for="oldpwd">CURRENT PASSWORD</label>
							<div><input type="password" id="oldpwd" name="oldpwd" required></div>
							<label for="pwd">NEW PASSWORD</label>
							<div><input type="password" id="pwd" name="pwd" required></div>
							<label for="cpwd">CONFIRM NEW PASSWORD</label>
							<div><input type="password" id="cpwd" name="cpwd" required></div>

							<div><button type="submit" name="submit" class="chpwd">Change Password</button></div>
							<button type="button" class="cancel" onclick="closeForm()">Close</button>
						</div>
					</form>
				</div>
				<script>
				function openForm() {
					document.getElementById("myForm").style.display = "block";
				}

				function closeForm() {
					document.getElementById("myForm").style.display = "none";
				}
			</script>
			</section>
		</main>
		<footer class="footer-distributed">

			<div class="footer-left">

				<a href="../index.html"><img src="../imgs/mf.png" title="Mechanic Finder"></a>

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