<?php
	require_once("head.php");
?>
	<link rel="stylesheet" type="text/css" href="css/contactstyle.css">
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
						<li class="nav-item"><a href="mechanics.php?login=" class="nav-link p-3">for mechanics</a></li>
						<li class="nav-item"><a href="contact.php" class="nav-link p-3" id="active">contact us</a></li>
				  	</ul>
				</div>
			</div>  
		</nav>
		<div class="container">
			<div class="contact">
			    <div class="contact-us text-center my-2">
			        <h2>Contact Us</h2>
			        <p>Swing by for a cup of coffee, or leave us a message:</p>
			    </div>
			    <div class="row mb-3">
			        <div class="col-md-6">
							
						<div class="gmap_canvas">
							<iframe id="gmap_canvas"
								src="https://maps.google.com/maps?q=C_Get Computer Center Pvt. Ltd.&t=&z=16&ie=UTF8&iwloc=&output=embed"
								height= "380px" width= "100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
							</iframe>
						</div>
			        </div>
			        <div class="col-md-6">
			            <form action="includes/message.inc.php" method="post">
			                <label for="name">Name</label>
			                <input type="text" class="contact-form mb-2" id="name" name="name" placeholder="Your name..">
			                <label for="email">Email</label>
			                <input type="text" class="contact-form mb-2" id="email" name="email" placeholder="Your email..">
			                <label for="message">Message</label>
			                <textarea id="message" class="contact-form mb-2" name="message" placeholder="Write something.." style="height:160px; resize: none; overflow-y: auto;"></textarea>
							<div class="text-right">
								<button type="submit" class="btn px-3" id="bton" name="submit">Send</button>
							</div>
			            </form>
			        </div>
			    </div>
			</div>
		</div>
<?php
	require_once("footer.php");
?>