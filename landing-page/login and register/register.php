<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
<head> 
	<meta name="viewport" content="width=device-width, initial-scale=1" http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">

	<!-- Website CSS style -->
	<link rel="stylesheet" type="text/css" href="style.css">

	<!-- Website Font style -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

	<title>Register</title>
</head>
<body>
	<div class="container">
		<div class="row main">
			<div class="panel-heading">
				<div class="panel-title text-center">
					<h1 class="title">Regisztráció</h1>
					<hr />
				</div>
			</div> 
			<div class="main-login main-center">
				<form class="form-horizontal" method="post" action="tema-tanarvalasztas\tema-tanarvalasztas.php">

					<div class="form-group">
						<label for="csaladnev" class="cols-sm-2 control-label">Családnév</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="csaladnev" id="csaladnev"  placeholder="Családnév ide..." required />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="keresztnev" class="cols-sm-2 control-label">Keresztnév</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="keresztnev" id="keresztnev"  placeholder="Keresztnév ide..." required />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="cols-sm-2 control-label">Emailcím</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="email" id="email"  placeholder="Email ide..." required />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="password" class="cols-sm-2 control-label">Jelszó</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
								<input type="password" class="form-control" name="password" id="password"  placeholder="Jelszó ide..." required />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="password" class="cols-sm-2 control-label">CNP</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="CNP" id="CNP"  placeholder="CNP ide..." required />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="password" class="cols-sm-2 control-label">Beiratkozási szám</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="beiratkozasi_szam" id="beiratkozasi_szam"  placeholder="Beiratkozási szám ide..." required />
							</div>
						</div>
					</div>

					<div class="form-group ">
						<button type="submit" class="btn btn-primary btn-lg btn-block login-button" >Regisztráció</button>
					</div>
					<div class="login-register">
						<a href="login.php">Login</a>
					</div>
					<?php
					require('C:\xampp\htdocs\projekt-allamvizsga\landing-page\db.php');
					if (isset($_POST['email'])) {
						echo $_POST['email'];

						$email = stripslashes($_POST['email']);
						$email = mysqli_real_escape_string($conn, $email);
						if (preg_match('/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/',  $_POST['email'] )) {
							$check_query = "SELECT Id FROM HALLGATO WHERE Email='".$email."'";
							echo $check_query;    
							$result_0 = mysqli_query($conn, $check_query);
						
							if($result_0){
    							$message = "Ezzel az emailcímmel már van egy regisztrált hallgatónk: ,".$email."! Kérem jelentkezzen be!";
    							echo "<script type='text/javascript'>alert('$message');</script>";
    							header("Location: login.php");
    						}
    					}   
					}

					?>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</body>
</html>