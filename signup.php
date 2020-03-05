<?php
require_once("head.php");
?>
	
	<link rel="stylesheet" type="text/css" href="css/signupstyle.css">
	
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

		<div class="container">
			
			<div class="row my-4 text-center">
				
				<div class="col-md-6">
            		<section class="login-area">
						<div class="in">
							<h2>Already a Member?</h2> 
							<p>Sign in and get update for the work!</p>	
						</div>
						<div class="sgin"><a href="mechanics.php?login=">SIGN IN</a></div>
					</section>
				</div>
			
			
				<div class="col-md-6 mt-2">
					<section class="signup-area">
					<h2>Register your New Account</h2>
					 
						<?php 
							if($_GET['signup']) {
							$message = $_GET['signup'];
						?> 
						<p class="text-successful" style="text-align: center;">**<?php echo $message;?>**</p>

						<?php
							}
						?> 
				
						<form class="signup" action="signupprc.php" method="POST" id="sform" enctype="multipart/form-data">
							<div class="actual-form">
								<span class="error_form" id="mfname_error_message"></span><span class="error_form" id="mlname_error_message"></span>
								<div class="form-group d-flex">
									
									<input type="text" id="mfname" name="fname" placeholder="First Name*" required>
									
									<input type="text" id="mlname" name="lname" placeholder="Last Name*" required>
								</div>
								
								<span class="error_form" id="memail_error_message"></span><span id="meavailibility"></span>
								<div class="form-group d-flex">
									
									<input type="email" id="memail" name="email" placeholder="Email*" required>
									<input type="text" id="contact" name="contact" placeholder="Contact No.*" required>
								</div>

								<script>
										$(document).ready(function(){
											$('#memail').blur(function(){
												var mechemail = $(this).val();
												$.ajax({
													url:"checkuname.php",
													method:"POST",
													data:{mech_email:mechemail},
													dataType:"text",
													success:function(html)
													{
														$('#meavailibility').html(html);
													}
												})
											})
										})
									</script>
							


								<span class="error_form" id="mpwd_error_message"></span><span class="error_form" id="mcpwd_error_message"></span>
								<div class="form-group d-flex">
									
									<input type="password" id="mpwd" name="pwd" placeholder="Password*" required>
									
									<input type="password" id="mcpwd" name="cpwd" placeholder="Confirm Password*" required>
								</div>
								
										<script type="text/javascript">
											$(function() {
												$("#mfname_error_message").hide();
												$("#mlname_error_message").hide();
									
												$("#memail_error_message").hide();
												$("#mpwd_error_message").hide();
												$("#mcpwd_error_message").hide();
												var error_fname = false;
												var error_lname = false;
											
												var error_email = false;
												var error_pwd = false;
												var error_cpwd = false;
												$("#mfname").focusout(function(){
													check_fname();
												});
												$("#mlname").focusout(function() {
													check_lname();
												});
												
												$("#memail").focusout(function() {
													check_email();
												});
												$("#mpwd").focusout(function() {
													check_pwd();
												});
												$("#mcpwd").focusout(function() {
													check_cpwd();
												});
												function check_fname() {
													var pattern = /^[a-zA-Z]*$/;
													var fname = $("#mfname").val();
													if (pattern.test(fname) && fname !== '') {
													$("#mfname_error_message").hide();
													$("#mfname").css("border-bottom","2px solid #34F458");
													} else {
													$("#mfname_error_message").html("First name should only Characters");
													$("#mlname_error_message").hide();
													$("#mfname_error_message").show();
													$("#mfname").css("border-bottom","2px solid #F90A0A");
													error_fname = true;
													}
												}
												function check_lname() {
													var pattern = /^[a-zA-Z]*$/;
													var sname = $("#mlname").val()
													if (pattern.test(sname) && sname !== '') {
													$("#mlname_error_message").hide();
													$("#mlname").css("border-bottom","2px solid #34F458");
													} else {
													$("#mlname_error_message").html("Last name should only Characters");
													$("#mfname_error_message").hide();
													$("#mlname_error_message").show();
													$("#mlname").css("border-bottom","2px solid #F90A0A");
													error_lname = true;
													}
												}
												
												
												function check_email() {
													var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
													var email = $("#memail").val();
													if (pattern.test(email) && email !== '') {
													$("#memail_error_message").hide();
													$("#memail").css("border-bottom","2px solid #34F458");
													} else {
													$("#memail_error_message").html("Invalid Email");
													$("#memail_error_message").show();
													$("#memail").css("border-bottom","2px solid #F90A0A");
													error_email = true;
													}
												}

												function check_pwd() {
													var password_length = $("#mpwd").val().length;
													if (password_length < 8) {
													$("#mpwd_error_message").html("Atleast 8 Characters");
													$("#mcpwd_error_message").hide();
													$("#mpwd_error_message").show();
													$("#mpwd").css("border-bottom","2px solid #F90A0A");
													error_pwd = true;
													} else {
													$("#mpwd_error_message").hide();
													$("#mpwd").css("border-bottom","2px solid #34F458");
													}
												}
												function check_cpwd() {
													var pwd = $("#mpwd").val();
													var cpwd = $("#mcpwd").val();
													if (pwd !== cpwd) {
													$("#mcpwd_error_message").html("Passwords do not match");
													$("#mpwd_error_message").hide();
													$("#mcpwd_error_message").show();
													$("#mcpwd").css("border-bottom","2px solid #F90A0A");
													error_cpwd = true;
													} else {
													$("#mcpwd_error_message").hide();
													$("#mcpwd").css("border-bottom","2px solid #34F458");
													}
												}

												$("#sform").submit(function() {
													error_fname = false;
													error_lname = false;
												
													error_email = false;
													error_pwd = false;
													error_cpwd = false;
													check_fname();
													check_lname();
											
													check_email();
													check_pwd();
													check_cpwd();
													if (error_fname === false && error_lname === false && error_email === false && error_pwd === false && error_cpwd === false) {
													alert("Registration successful, Wait for the verification");
													return true;
													} else {
													alert("Please Fill the form Correctly");
													return false;
													}
												});
											});
										</script>
								<div class="form-group d-flex">
									<input type="text" id="address" name="address" placeholder="Address*" required>
									<input type="text" id="garage" name="garage" placeholder="Associated Garage*" required>
								</div>
								
								<div class="form-group d-flex" id="slct">
									<input type="text" id="city" name="city" placeholder="City*" required>
								
									<!-- <div class="slct"> -->
									<select name="state" id="state">
										<option value="province1">Province1</option>
										<option value="province2">Province2</option>
										<option value="province3">Province3</option>
										<option value="province4">Province4</option>
										<option value="province5">Province5</option>
										<option value="province6">Province6</option>
										<option value="province7">Province7</option>
									</select>
									<!-- </div> -->
								</div>

							</div>
							<div class="img text-left">
								<img id="output_image">
								<div class="mt-2">
									<label for="image">Upload Image</label>
									<input type="file" name="image" id="image" accept="image/*" onchange="preview_image(event)">
							
									<button type="submit" name="submit" id="sbutn" class="btn ml-4 w-50">SIGNUP</button>
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
						</form>
						
					</section>
				</div>	
			</div>
		</div>
<?php
	require_once("footer.php");
?>