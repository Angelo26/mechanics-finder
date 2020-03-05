<?php
	require_once("head.php");
?>
	
	<nav class="navbar navbar-expand-sm p-0 sticky-top">
		<div class="container p-0">	
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				  <i class="fa fa-bars" style="color: white;"></i>
			</button>
			<div class="collapse navbar-collapse justify-content-center p-0" id="collapsibleNavbar">
				  <ul class="navbar-nav">
					<li class="nav-item"><a href="index.php" class="nav-link p-3">find a mechanic</a></li>
					<li class="nav-item"><a href="parts.php" class="nav-link p-3">parts and accessories</a></li>
					<li class="nav-item"><a href="road.php" class="nav-link p-3" id="active">roadside assistance</a></li>
					<li class="nav-item"><a href="mechanics.php?login=" class="nav-link p-3">for mechanics</a></li>
					<li class="nav-item"><a href="contact.php" class="nav-link p-3">contact us</a></li>
				  </ul>
			</div>
		</div>
		  
	</nav> 
		<div class="container">
			<section class="content">
				<div class="top mt-4 text-center">
					<h2> Here are some fuelstations near your area!</h2>
				</div>
				<div class="map my-4 text-center">
					<div><iframe class="gmap_canvas w-75" height="400"
						src="https://maps.google.com/maps?q=fuel%20stations%20near%20me&t=&z=13&ie=UTF8&iwloc=&output=embed"
						frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
		
					</div>
				</div>
			</section>
		</div>
<?php
	require_once("footer.php");
?>