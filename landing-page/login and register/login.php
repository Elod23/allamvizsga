<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<?php
require('C:\xampp\htdocs\projekt-allamvizsga\landing-page\db.php');
session_start();
if (isset($_POST['tema'])&&isset($_POST['dropdown'])) {
	$query_update = "UPDATE Hallgato SET Tema='".$_POST['tema']."', Tanar='".$_POST['dropdown']."' where Email='".$_SESSION['mail']."'";
	echo $query_update;
	$result_update = mysqli_query($conn, $query_update);

	if ($result_update) {
		$msg = "Ön sikeresen kiválasztotta kidolgozandó témáját és vezető tanárát!";
		echo "<script type='text/javascript'>alert('".$msg."');</script>";
		sleep(2);
	}else{
		$msg = "Egy hiba lépett fel rendszerünkben, kérem próbálkozzon újra később!";
		echo "<script type='text/javascript'>alert('".$msg."');</script>";
	}
}
?>
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

	<title>Bejelentkezés</title>
</head>
<body>
	<div class="container">
		<div class="row main">
			<div class="panel-heading">
				<div class="panel-title text-center">
					<h1 class="title">Bejelentkezés</h1>
					<hr />
				</div>
			</div>
			<?php
			
				// If form submitted, insert values into the database.
			if (isset($_POST['email'])){
        			// removes backslashes
				$email = stripslashes($_POST['email']);
        			//escapes special characters in a string
				$email = mysqli_real_escape_string($conn,$email);

					//Checking is user existing in the database or not
				$query = "SELECT ID FROM HALLGATO WHERE email='$email'
				and jelszo='".sha1($_POST['password'])."'";
				echo $query;
				$result = mysqli_query($conn,$query) or die(mysql_error());
				$rows = mysqli_num_rows($result);
				echo $rows;
				if($rows==1){
					$_SESSION['email'] = $email;
            // Redirect user to index.php
					header("Location: ../homepage/fooldal.php");
				}else{
					echo "<div class='form'>
					<h3>Username/password is incorrect.</h3>
					<br/>Click here to <a href='login.php'>Login</a></div>";
				}
			}else{
				?>
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="<?=$_SERVER['PHP_SELF']?>">

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
							<button type="submit" class="btn btn-primary btn-lg btn-block login-button">Mehet</button>
						</div>
						<div class="login-register">
							<a href="register.php">Vissza a regisztrációhoz</a>
						</div>
						<?php } ?>
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	</body>
	</html>