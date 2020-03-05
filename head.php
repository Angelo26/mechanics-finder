
<?php
    session_start();
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
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<script type="text/javascript">
		var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
		(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src='https://embed.tawk.to/5dd42ba5d96992700fc83a49/default';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
		})();
	</script>

		
	<style>
		/* div{border: 1px solid red;	} */
	</style>
</head>
<body>
	<div class="container">
		<header>
			<div class="row mt-2 mb-3">
				<div class="col-md-10 text-center">
					<div class="row">
						<div class="col-md-2" id="plogo">
							<a href="index.php"><img src="imgs/mf.png" height="90" title="NextDoor Mechanic" alt="Nextdoor Mechanic"></a>
						</div>
						<div class="col-md-10 m-auto" id="page-title">
							<h1>YOUR NEXTDOOR MECHANIC IS HERE</h1>
						</div>
					</div>
				</div>

				<div class="col-md-2 text-center m-auto d-flex justify-content-center">
				<?php
					if(isset($_SESSION['useremail'])) {
                    echo '<form action="includes/userlogout.inc.php" method="POST">
                            <button class="logreg mx-2" type="submit" name="submit">Log out</button>
                        </form>';	
					}
					else {
					?>
						<h6 class="logreg mx-2" data-toggle="modal" data-target="#login">Login</h6>
							
						<div class="modal" data-keyboard="false" data-backdrop="static" id="login">
							<div class="modal-dialog">
							<div class="modal-content">
							
								<div class="modal-header">
								<h2 class="modal-title mx-auto" style="color: steelblue">Login to Your Account</h2>
								</div>
							
								<div class="modal-body">
									<form action="includes/userlogin.inc.php" class="needs-validation" method="POST">
								
										<div class="form-group mb-5">
											<label class="label" for="userl">EMAIL/USERNAME</label>
											<span id="uavail"></span>
											<input type="text" class="form-control w-50 mx-auto text-center p-1" id="userl" name="userid" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); border-radius: 0; background: transparent;" required>
											<div class="valid-feedback">Valid.</div>
											<div class="invalid-feedback">Please fill out this field.</div>
										</div>
														<script>
															$(document).ready(function(){
																$('#userl').blur(function(){
																	var userlog = $(this).val();
																	$.ajax({
																		url:"checkuname.php",
																		method:"POST",
																		data:{user_log:userlog},
																		dataType:"text",
																		success:function(html)
																		{
																			$('#uavail').html(html);
																		}
																	})
																})

															})
														</script>
													
										<div class="form-group mt-4 mb-5">
											<label class="label" for="pwd">PASSWORD</label>
											<input type="password" class="form-control w-50 mx-auto text-center p-1" id="pwd" name="password" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); border-radius: 0; background: transparent;" required>
											<div class="valid-feedback">Valid.</div>
											<div class="invalid-feedback">Please fill out this field.</div>
										</div>		
										<button type="submit" name="login" class="btn btn-primary w-50">SIGN IN</button>
										</form>
									</div>
							
								<div class="modal-footer">
								<button type="button" class="btn btn-danger" class="close" data-dismiss="modal">Close</button>
								</div>			  
							</div>
							</div>
						</div>
					
						<h4><i class="fa fa-link"></i></h4>
						<h6 class="logreg mx-2" data-toggle="modal" data-target="#register">Register</h6>	
							
						<div class="modal" data-keyboard="false" data-backdrop="static" id="register">
						
								<div class="modal-dialog" modal-dialog-centered>
										<div class="modal-content">
										
										<div class="modal-header">
											<h2 class="modal-title mx-auto" style="color: salmon">Register new acccount</h2>
										</div>
										
										<div class="modal-body">
												<form action="usersignupprc.php" class="needs-validation" id="usform" novalidate method="POST">
													
														<div class="row text-left">
															<div class="col-md-6 mb-2">
																<div class="form-group">
																	<label class="label" for="fname">FIRST NAME*<span class="error_form" id="fname_error_message"></span></label>
																	<input type="text" class="form-control " id="fname" name="fname" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); border-radius: 0; padding: 3px;" required autofocus>
																	
																	<div class="invalid-feedback">Please fill out this field.</div>
																</div>
															</div>
																<div class="col-md-6">
																<div class="form-group">
																	<label class="label" for="lname">LAST NAME*<span class="error_form" id="lname_error_message"></span></label>
																	<input type="text" class="form-control" id="lname" name="lname" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); border-radius: 0; padding: 3px;" required>
																	
																	<div class="invalid-feedback">Please fill out this field.</div>
																</div>
															</div>
														</div>
									
														<div class="form-group text-left mb-2">
														
															<label class="label" id="uname" for="username">USERNAME*<span class="error_form" id="uname_error_message"></span><span id="availibility"></span></label>
															<input type="text" class="form-control w-75" id="username" name="uname" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); border-radius: 0; padding: 3px;" required>
																	
															<div class="invalid-feedback">Please fill out this field.</div>
														</div>
														
														<script>
															$(document).ready(function(){
																$('#username').blur(function(){
																	var username = $(this).val();
																	$.ajax({
																		url:"checkuname.php",
																		method:"POST",
																		data:{user_name:username},
																		dataType:"text",
																		success:function(html)
																		{
																			$('#availibility').html(html);
																		}
																	})
																})

															})
														</script>
														
														<div class="form-group text-left mb-2">
															<label class="label" for="email">EMAIL*<span class="error_form" id="email_error_message"></span><span id="eavailibility"></span></label>
															<input type="text" class="form-control w-75" id="semail" name="email" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); border-radius: 0; padding: 3px;" required>
																	
															<div class="invalid-feedback">Please fill out this field.</div>
														</div>
														<script>
															$(document).ready(function(){
																$('#semail').blur(function(){
																	var useremail = $(this).val();
																	$.ajax({
																		url:"checkuname.php",
																		method:"POST",
																		data:{user_email:useremail},
																		dataType:"text",
																		success:function(html)
																		{
																			$('#eavailibility').html(html);
																		}
																	})
																})

															})
														</script>
								
									
														
														<div class="form-group text-left m-2">
															<label class="label" for="pwd">PASSWORD*<span class="error_form" id="pwd_error_message"></span></label>
															<input type="password" class="form-control w-75" id="spwd" name="spwd" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); border-radius: 0; padding: 3px;" required>
																	
															<div class="invalid-feedback">Please fill out this field.</div>
														</div>
												
									
																
														<div class="form-group text-left">
															<label class="label" for="cpwd">CONFIRM PASSWORD*<span class="error_form" id="cpwd_error_message"></span></label>
															<input type="password" class="form-control w-75" id="cpwd" name="cpwd" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); border-radius: 0; padding: 3px;" required>
																	
															<div class="invalid-feedback">Please fill out this field.</div>
														</div>
														
														<button type="submit" name="submit" class="btn btn-danger w-50">SIGN UP</button>
													</form>
											</div>

											<script type="text/javascript">
												$(function() {
													$("#fname_error_message").hide();
													$("#lname_error_message").hide();
													$("#uname_error_message").hide();
													$("#email_error_message").hide();
													$("#pwd_error_message").hide();
													$("#cpwd_error_message").hide();
													var error_fname = false;
													var error_lname = false;
													var error_uname = false;
													var error_email = false;
													var error_pwd = false;
													var error_cpwd = false;
													$("#fname").focusout(function(){
														check_fname();
													});
													$("#lname").focusout(function() {
														check_lname();
													});
													$("#username").focusout(function() {
														check_uname();
													});
													$("#semail").focusout(function() {
														check_email();
													});
													$("#spwd").focusout(function() {
														check_pwd();
													});
													$("#cpwd").focusout(function() {
														check_cpwd();
													});
													function check_fname() {
														var pattern = /^[a-zA-Z]*$/;
														var fname = $("#fname").val();
														if (pattern.test(fname) && fname !== '') {
														$("#fname_error_message").hide();
														$("#fname").css("border-bottom","2px solid #34F458");
														} else {
														$("#fname_error_message").html("  Only Characters");
														$("#fname_error_message").show();
														$("#fname").css("border-bottom","2px solid #F90A0A");
														error_fname = true;
														}
													}
													function check_lname() {
														var pattern = /^[a-zA-Z]*$/;
														var sname = $("#lname").val()
														if (pattern.test(sname) && sname !== '') {
														$("#lname_error_message").hide();
														$("#lname").css("border-bottom","2px solid #34F458");
														} else {
														$("#lname_error_message").html("  Only Characters").css("color: #F90A0A");
														$("#lname_error_message").show();
														$("#lname").css("border-bottom","2px solid #F90A0A");
														error_lname = true;
														}
													}
													
													function check_uname() {
														var uname_length = $("#username").val().length;
														if (uname_length > 2) {
														$("#uname_error_message").hide();
														$("#username").css("border-bottom","2px solid #34F458");
														
														} else {
														$("#uname_error_message").html("  Atleast 3 characters");
														$("#uname_error_message").show();
														$("#username").css("border-bottom","2px solid #F90A0A");
														error_uname = true;
														}
													}

													
													function check_email() {
														var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
														var email = $("#semail").val();
														if (pattern.test(email) && email !== '') {
														$("#email_error_message").hide();
														$("#semail").css("border-bottom","2px solid #34F458");
														} else {
														$("#email_error_message").html("  Invalid Email");
														$("#email_error_message").show();
														$("#semail").css("border-bottom","2px solid #F90A0A");
														error_email = true;
														}
													}

													function check_pwd() {
														var password_length = $("#spwd").val().length;
														if (password_length < 8) {
														$("#pwd_error_message").html("Atleast 8 Characters");
														$("#pwd_error_message").show();
														$("#spwd").css("border-bottom","2px solid #F90A0A");
														error_pwd = true;
														} else {
														$("#pwd_error_message").hide();
														$("#spwd").css("border-bottom","2px solid #34F458");
														}
													}
													function check_cpwd() {
														var pwd = $("#spwd").val();
														var cpwd = $("#cpwd").val();
														if (pwd !== cpwd) {
														$("#cpwd_error_message").html("  Passwords do not match");
														$("#cpwd_error_message").show();
														$("#cpwd").css("border-bottom","2px solid #F90A0A");
														error_cpwd = true;
														} else {
														$("#cpwd_error_message").hide();
														$("#cpwd").css("border-bottom","2px solid #34F458");
														}
													}

													$("#usform").submit(function() {
														error_fname = false;
														error_lname = false;
														error_uname = false;
														error_email = false;
														error_pwd = false;
														error_cpwd = false;
														check_fname();
														check_lname();
														check_uname();
														check_email();
														check_pwd();
														check_cpwd();
														if (error_fname === false && error_lname === false &&  error_uname === false && error_email === false && error_pwd === false && error_cpwd === false) {
														alert("Registration Successfull");
														return true;
														} else {
														alert("Please Fill the form Correctly");
														return false;
														}
													});
												});
											</script>
										
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" class="close" data-dismiss="modal">Close</button>
										</div>			  
									</div>
								</div>
						
						</div>	
					<script>
						(function() {
						'use strict';
						window.addEventListener('load', function() {
							var forms = document.getElementsByClassName('needs-validation');
							var validation = Array.prototype.filter.call(forms, function(form) {
							form.addEventListener('submit', function(event) {
							if (form.checkValidity() === false) {
								event.preventDefault();
								event.stopPropagation();
							}
							form.classList.add('was-validated');
						}, false);
						});
						}, false);
						})();
					</script>	
					<?php
					}
					?>
				</div>
			</div>
		</header>
	</div>

	