<?php
	require_once("head.php");
?>
	<link rel="stylesheet" type="text/css" href="css/roadstyle.css">
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
                <div class="top mt-3">
                    <h2> Welcome to Nextdoor Mechanic Roadside Assistance service!</h2>
					<ul class="ml-3">
						<li>Qualified local service providers</li>
						<li>All service providers details available</li>
						<li>Get back on the road as soon as possible</li>
					</ul>
                </div>
                <div class="middle">
					<h3>What do you want to search for?</h3>
						<div class="row d-flex my-4">
							<div class="col-md-1 my-auto text-center"><img src="imgs/towing.png" class="mx-4" height="40px"></div>
							<div class="col-md-3 my-auto text-center"><p class="mx-4">Roadside Assistances</p></div>
							<div class="col-md-4 my-auto text-center"><a class="start" href="roadlist.php">Get Direction <i class="fa fa-check-square-o"></i></a></div>
						</div>

						<div class="row d-flex my-4">
							<div class="col-md-1 my-auto text-center"><img src="imgs/fuelstations.png" class="mx-4" height="40px"></div>
							<div class="col-md-3 my-auto text-center"><p class="mx-4">Fuel Stations</p></div>
							<div class="col-md-4 my-auto text-center"><a class="start" href="fuelstations.php">Get Direction <i class="fa fa-check-square-o"></i></a></div>
						</div>

						<div class=" row d-flex my-4">
							<div class="col-md-1 my-auto text-center"><img src="imgs/tyre.png" class="mx-4" height="40px"></div>
							<div class="col-md-3 my-auto text-center"><p class="mx-4">Garages</p></div>
							<div class="col-md-4 my-auto text-center"><a class="start"href="garages.php">Get Direction <i class="fa fa-check-square-o"></i></a></div>
						</div>
						
				</div>
				<div class="bottom my-4">
					<p>
						When your car breaks down, you run out of gas, you are locked out or you have a flat tyre, Roadside Assistance helps
					make it simple and easy to get you back on the road or towed to your preferred location. We are always prepared to
					provide the best care for you and your family with the best towing services possible. Roadside rescuers stand prepared 
					to provide professional, quick-response services at prompt notice.
					</p>
				</div>
			</section>
		</div>
<?php
	require_once("footer.php");
?>