<?php
	require_once("head.php");
?>
	<link rel="stylesheet" type="text/css" href="css/mechanicsstyle.css">
	
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
	<?php session_destroy(); ?>
	<div class="container mt-5 mb-4">
		<div class="row">
			<div class="col-md-6 text-center">
				<section class="login-content">
					<h2>Login to Your Account</h2>
					 
					<?php
						if($_GET['login']) {
							$message = $_GET['login'];
					?>
						<p style="color: red; text-align: center;">**<?php echo $message;?>**</p> 
					<?php	
						}
					?> 
					<form  class="needs-validation" id="login" action="includes/login.inc.php" method="POST">
						<label for="email">EMAIL</label>
						<div>
							<input type="email" id="email" name="email" required autofocus>
							<div class="invalid-feedback">Please fill out this field.</div>
						</div>
						
						<label for="password">PASSWORD</label>
						<div>
							<input type="password" id="password" name="password" required>
							<div class="invalid-feedback">Please fill out this field.</div>
						</div>
						<a href="#" class="forgot">Forgot password?</a>
						<div class="mt-4"><button type="submit" class="btn" name="submit">SIGN IN</button></div>
					</form>  
					
				</section>
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

			<div class="col-md-6 text-center">
				<section class="signup-content">
					<div class="up">
						<h2>New here?</h2> 
						<p>Sign up and discover great amount of new opportunities!</p>
					</div>
					<div class="sgup"><a href="signup.php?signup=">SIGN UP</a></div>
				</section>
			</div>
		</div>
	</div>
<?php
	require_once("footer.php");
?>