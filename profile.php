<?php
	session_start();
	if(!isset($_SESSION['u_id'])){
		header("location: mechanics.php?login=");
	}
?>
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nextdoor Mechanic</title>
	<meta name="viewport" content="width=device-width, initial-scale=-1">
	<link rel="shortcut icon" type="image/png" href="imgs/mech.png">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/mfstyle.css">
	<link rel="stylesheet" type="text/css" href="css/profilestyle.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container">
		<header>
			<div class="row my-3">
				<div class="col-md-10 text-center">
					<div class="row">
						<div class="col-md-2" id="plogo">
							<a href="index.php"><img src="imgs/mf.png" height="90" title="Mechanic Finder" alt="Nextdoor Mechanic"></a>
						</div>
						<div class="col-md-10 my-2 mx-auto" id="page-title">
							<h1>YOUR NEXTDOOR MECHANIC IS HERE</h1>
						</div>
					</div>
				</div>
			</div>
		</header>
	</div>
	
	
	
	<nav class="navbar navbar-expand-sm p-0 sticky-top">
		<div class="container p-0">	
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				  <i class="fa fa-bars" style="color: white;"></i>
			</button>
			<div class="collapse navbar-collapse justify-content-center p-0" id="collapsibleNavbar">
				  <ul class="navbar-nav">
					<li class="nav-item"><a href="index.php" class="nav-link p-3">find a mechanic</a></li>
					<li class="nav-item"><a href="parts.php" class="nav-link p-3">parts and accessories</a></li>
					<li class="nav-item"><a href="road.php" class="nav-link p-3">roadside assistance</a></li>
					<li class="nav-item"><a href="mechanics.php?login=" class="nav-link p-3" id="active">for mechanics</a></li>
					<li class="nav-item"><a href="contact.php" class="nav-link p-3">contact us</a></li>
				  </ul>
			</div>
		</div>  
	</nav>
	
	

		<div class="container mt-3">			
			<section class="profile">
					<div class="phead text-center my-1 d-flex flex-row">
						
						<?php
							require 'includes/dbh.inc.php';

							$uid = $_SESSION['u_id'];
							$sql = "SELECT * FROM realmechanics WHERE mechanic_id='$uid';";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							$row = mysqli_fetch_assoc($result);
						?>
							<h2 class="yp m-auto p-3 w-100" style="font-family: Arial Rounded MT;">Welcome <?php echo ucfirst($row["mechanic_first"]);?> </h2>
							<?php
								$mesg=$row["mechanic_first"].$uid;
								$sql5 = "SELECT * FROM $mesg";
                                $result5 = mysqli_query($conn2, $sql5);
                                $mechmsg = mysqli_num_rows($result5);
							?>
							<div class="msg mx-2"><p class="m-0 text-center"><?php echo $mechmsg?></p><a class="" href="mechanicmsgs.php" style="color: #fff;"><i id="micon" class="fa fa-envelope" aria-hidden="true" style="font-size: 20px; border: 3px solid #fff; border-radius: 50%; padding: 5px; transition: all 0.5s ease-in-out;"></i></a></div>
							
							<form class="m-status my-auto" action="includes/status.inc.php" method="POST">
								<?php
								if(strtolower($row["mechanic_status"])==="active") {
								?>
									<div style="visibility: hidden; position: absolute; font-size: 0;"><input type="text" id="status" name="status" value="not active"></div>
									<div class="my-auto"><button type="submit" name="submit" class="btn" id="de" style="background: darkgray;">Deactivate</button></div>
								<?php
								}
								if(strtolower($row["mechanic_status"])==="not active") {
								?>
									<div style="visibility: hidden; position: absolute; font-size: 0;"><input type="text" id="status" name="status" value="active"></div>
									<div class="my-auto"><button type="submit" name="submit" class="btn" id="ac" style="background: rgb(87, 136, 67);">Activate</button></div>
								<?php
								}
								?>
							</form>
						
						<div class="my-auto mx-3">
							<form action="includes/logout.inc.php" method="POST">
								<button type="submit" name="submit" id="logout" class="btn">Log out</button>
							</form>
						</div>	 

					</div>
				<div class="content">
					<form class="update-details" action="updateprc.php" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-4">
								<div class="img text-center mt-1">
									<img id="output_image" src="<?php echo $row["mechanic_img"];?>" alt="">
									<div class="mt-2">
										<label class="btn btn-primary m-0" for="image">Change Picture</label>
										<input type="file" name="image" id="image" accept="image/*" onchange="preview_image(event)">
										
										<div><button type="button" id="open-button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#chpwd">Change Password</button></div>
	
									</div>
								</div>
								
								<script>
									function preview_image(event) {
										var reader = new FileReader();
										reader.onload = function () {
											var output = document.getElementById('output_image');
											output.src = reader.result;
										}
										reader.readAsDataURL(event.target.files[0]);
									}
								</script>
							</div>

							<div class="col-md-8">
								<div class="actual-form w-75 mt-4 mx-auto">
									<div class="row m-0 w-100">
										<div class="col-md-6 p-0">
											<label for="fname">FIRST NAME</label>
											<input type="text" id="fname" name="fname" value="<?php echo ucfirst($row["mechanic_first"]);?>" style="width: 80%;">
										</div>
										<div class="col-md-6 p-0">
											<label for="lname">LAST NAME</label>
											<input type="text" id="lname" name="lname" value="<?php echo ucfirst($row["mechanic_last"]);?>" style="width: 80%;">
										</div>
									</div>

									<label for="email">EMAIL</label><span id="mechavailibility"></span>
									<div><input type="email" style="width: 90%;" id="memail" name="email" value="<?php echo $row["mechanic_email"];?>"></div>
									
													<script>
														$(document).ready(function(){
															$('#memail').blur(function(){
																var mechaemail = $(this).val();
																$.ajax({
																	url:"checkuname.php",
																	method:"POST",
																	data:{rmech_email:mechaemail},
																	dataType:"text",
																	success:function(html)
																	{
																		$('#mechavailibility').html(html);
																	}
																})
															})

														})
													</script>

									<label for="address">ADDRESS LINE</label>
									<div><input type="text" style="width: 90%;" id="address" name="address" value="<?php echo ucfirst($row["mechanic_address"]);?>"></div>
									<label for="garage">ASSOCIATED GARAGE</label>
									<div><input type="text" style="width: 90%;" id="garage" name="garage" value="<?php echo ucfirst($row["mechanic_garage"]);?>"></div>
									<label for="city">CITY</label>
									<div><input type="text" style="width: 90%;" id="city" name="city" value="<?php echo ucfirst($row["mechanic_city"]);?>"></div>
									<label for="state">STATE/PROVINCE</label>
									<div class="slct">
										<select name="state" id="state" style="width: 90%;">
										<option value="<?php $row["mechanic_state"];?>"><?php echo ucfirst($row["mechanic_state"]);?></option>
										<option value="province1">Province1</option>
										<option value="province2">Province2</option>
										<option value="province3">Province3</option>
										<option value="province4">Province4</option>
										<option value="province5">Province5</option>
										<option value="province6">Province6</option>
										<option value="province7">Province7</option>
										</select>
									</div>
									<label for="contact">CONTACT NO.</label>
									<div><input type="text" style="width: 90%;" id="contact" name="contact" value="<?php echo $row["mechanic_contact"];?>"></div>
									
									<div class="mb-3"><button type="submit" style="width: 90%;" name="submit" class="btn btn-primary btn-md my-4">Update Profile</button></div>
								</div>
							</div>

						</div>
					</form>
					<div id="chpwd" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog">
						<div class="modal-dialog">

							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title mx-auto">Set a New Password</h4>
								</div>
								<div class="modal-body text-center">
									<form class="form-container" action="includes/changepwd.inc.php" method="POST">
										<div class="change">
											
											<label for="oldpwd">CURRENT PASSWORD</label>
											<div class="mb-3"><input type="password" id="oldpwd" name="oldpwd" style="padding: 0 5px; border: none; border-bottom: 1px solid rgba(1, 25, 44, .4)" required></div>
											<label for="pwd">NEW PASSWORD</label>
											<div class="mb-3"><input type="password" id="mpwd" name="pwd" style="padding: 0 5px; border: none; border-bottom: 1px solid rgba(1, 25, 44, .4)" required></div>
											<label for="cpwd">CONFIRM NEW PASSWORD</label>
											<div class="mb-3"><input type="password" id="mcpwd" name="cpwd" style="padding: 0 5px; border: none; border-bottom: 1px solid rgba(1, 25, 44, .4)" required></div>
											<div><button type="submit" name="submit" class="btn btn-primary w-25">Save</button></div>
			
										</div>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</section>
		</div>
<?php
	require_once("footer.php");
?>
		