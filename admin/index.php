
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mechanic Finder</title>
	<link rel="stylesheet" type="text/css" href="../css/adminstyle.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
	<body>
	<header>
		<div class="container w-100 mt-5 mx-auto ">
			<div class="form">
				<div class="form-panel">
					<div class="form-header mb-5 mx-auto">
						<h1>ADMIN AUTHENICATION</h1>
					</div>
					<div class="form-content">
						<form action="include/login.inc.php" method="POST">
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" id="username" name="uid" required="required"/>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" id="password" name="pwd" required="required"/>
							</div>
							<div class="form-group">
								<a class="form-recovery" href="#">Forgot Password?</a>
							</div>
							<div class="form-group">
								<button type="submit" name="submit" class="btn btn-primary">LOG IN</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</header>
</body>

</html>

