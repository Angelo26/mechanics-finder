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
						<li class="nav-item"><a href="index.php" class="nav-link p-3" id="active">find a mechanic</a></li>
						<li class="nav-item"><a href="parts.php" class="nav-link p-3">parts and accessories</a></li>
						<li class="nav-item"><a href="road.php" class="nav-link p-3">roadside assistance</a></li>
						<li class="nav-item"><a href="mechanics.php?login=" class="nav-link p-3">for mechanics</a></li>
						<li class="nav-item"><a href="contact.php" class="nav-link p-3">contact us</a></li>
				  	</ul>
				</div>
			</div>  
		</nav>
	<div class="container">
		
		<main>
			<section class="first p-0 mb-5">
				<h2 class="mx-2">Find mechanics near you</h2>
				
				<div class="text-center d-flex flex-row">
				<a href="#" data-toggle="tooltip" data-placement="top" title="Hey! I am a Super Mechanic. I'll help you to find some mechanics near you."><img src="imgs/mechanic.png" id="mec"></a>
				<script>
					$(document).ready(function(){
  					$('[data-toggle="tooltip"]').tooltip();   
				});
				</script>
				
					<div class="right text-center">
					
						<h4 id="ser"> Search mechanics by your nearest location</h4>
						
						<form id="input" action="mechanicslist.php" method="POST">
							<div class="srch d-flex flex-row">
								<input type="text" class="txt w-100 mt-3 mx-2" name="location" required>
				
								<button type="submit" class="butn mt-3" name="submit" id="btn"><img id="img" src="imgs/search.gif" ></button>
							</div>
						</form>
					</div>
				</div>
			
				<div class="text-left" id="info">
					<h2 class="mx-2">Find the right and eligible mechanic by your choice</h2>
					<p>
						Just tell us your location and we'll help you to find your mechanic. Our complete automotive repair shop search 
						is designed to make mechanic shop search and vehicle repairs simple, affordable and reliable. We offer an advanced 
						search engine so you can find complete vehicle care services for vehicle maintenance, complete diagnostics and full 
						service auto repair from trusted mechanics nearby.
					</p>
				</div>
			</section> 


			<section class="second my-5">
				<h2 class="text-center">What do we offer</h2>
				<div class="row" id="services">
					<div class="col-md-3">

						<div class="box my-3 mx-0 p-0" id="cont1">
							<div class="icon">
								<img src="imgs/mansearch.png" alt="">
							</div>
							<div class="content">
								<h3>Search Mechanic</h3>
								<p>
									Mechanic service at competitive rates! View the mechanics nearby and schedule appointments at your convenience.
								</p>
							</div>
						</div>
					</div>

					<div class="col-md-3" id="cont2">

						<div class="box my-3 mx-0 p-0">
							<div class="icon">
								<img src="imgs/parts.png" alt="">
							</div>
							<div class="content">
								<h3>Parts and Accessories</h3>
								<p>
									Save time from searching multiple sites for the details about auto parts. Know the price and information of
									your auto parts.
								</p>
							</div>
						</div>
					</div>

					<div class="col-md-3" id="cont3">

						<div class="box my-3 mx-0 p-0">
							<div class="icon">
								<img src="imgs/towtruck.png" alt="" id="tow">
							</div>
							<div class="content">
								<h3>Roadside Assistance</h3>
								<p>
									Stuck at home or on the road? Use our trusted roadside assistance tools to request a Tow, Lockout, fuel stations, 
									Tire Change and Jump Start.
								</p>
							</div>
						</div>
					</div>

					<div class="col-md-3" id="cont4">

						<div class="box my-3 mx-0 p-0">
							<div class="icon">
							<img src="imgs/mechanic4.png" alt="">
							</div>
							<div class="content">
								<h3>For Mechanics</h3>
								<p>
									Join us if you are a mechanic and we will do all the heavy lifting so you can focus on giving your customers
									great service!
								</p>
							</div>
						</div>
					</div>
				</div>
			</section>


			<section class="third">
				<h2 class="text-center">What our clients say</h2>
				
				<div class="row">
					<div class="col-md-8 col-center m-auto">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
							
							<ol class="carousel-indicators">
								<li data-target="#myCarousel" data-slide-to="0" class="active"><i class="fa fa-circle"></i></li>
								<li data-target="#myCarousel" data-slide-to="1"><i class="fa fa-circle"></i></li>
								<li data-target="#myCarousel" data-slide-to="2"><i class="fa fa-circle"></i></li>
							</ol>   
							<div class="carousel-inner">
								<div class="item carousel-item active">
									<div class="img-box"><img src="imgs/anil.jpg" alt=""></div>
									<p class="testimonial"><i class="fa fa-quote-left"></i>  It ended up costing about half of what it would have cost otherwise. And then when it came time to buy another bike, the mechanic came out twice to check out bikes and give me a full report over the phone. Really affordable. And it really worked out well for me. I did not have to make time to take my bike somewhere and drop it off to be repaired. <i class="fa fa-quote-right"></i></p>
									<p class="overview"><b>Anil Basnet</b> ,  Media Analyst</p>
								</div>
								<div class="item carousel-item">
									<div class="img-box"><img src="imgs/nitesh.jpg" alt=""></div>
									<p class="testimonial"><i class="fa fa-quote-left"></i>  I really like Angel because he really took a personal interest in the bike and explained to me
										everything he was going to do with the bike... and what problems I might have with something that I hadn't even
										noticed like the headlights. Nobody's done that for me before and I've had this bike for 4 years. Angel's
										the best mechanic I've ever seen. <i class="fa fa-quote-right"></i></p>
									<p class="overview"><b>Nitesh KC</b> ,  Web Developer</p>
								</div>
								<div class="item carousel-item">
									<div class="img-box"><img src="imgs/Udhav.jpg" alt=""></div>
									<p class="testimonial"><i class="fa fa-quote-left"></i>  Anil who services the cars here for Bhaktapur was sent out within two days of my request,
										and it has been very convenient. I didn't have to go find him - he came and found me and took care of it
										right at my home. He cleaned up everything. The car is already put together and that's great.  <i class="fa fa-quote-right"></i></p>
									<p class="overview"><b>Udhav Basnet</b> ,  Network Engineer</p>
								</div>
							</div>
							
							<a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							</a>
							<a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							</a>
						</div>
					</div>
				</div>
			</section>		
		</main>
	</div>
<?php
	require_once("footer.php");
?>
