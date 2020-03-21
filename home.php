<?php include("database.php")?>
<?php 

	if(isset($_SESSION['username'])){
		$_SESSION['msg'] ="You must log in first to view in this page";
		
	}
	if (isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['username']);
		header("location:login.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Home Page</title>
	<link rel="stylesheet" href="style1.css">
</head>
<body>
	<div class="wrapper">
		<nav class="navbar">
			<label class="logo">Car Rental</label>
			<ul>
				<li><a class="active" href="home.php">Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="cars.php">Cars</a></li>
				<li><a href="rent.php">Rent</a></li>
				<li><a href="contact.php">Contact Us</a></li>
			 	<li><a href="login.php?Logout='1'">Logout</a></li>
			</ul>
		</nav>
		<div class="center">
			<h1>Welcome to Car Rental Website</h1>
			<h2>Choose your Ride Here</h2>
			<div class="buttons">
			<button ><a class="active" href="login.php">Log In</a></button>
			<button class="btn"><a href="registration.php">Sign In</a></button>
			</div>
		</div>
		
	</div>
	<?php
	if(isset($_SESSION['success'])): ?>
	<div>
		<h4>
			<?php
			echo $_SESSION['success'];
			unset($_SESSION['success']);
			?>
		</h4>
	</div>
<?php endif ?>
<?php if(isset($_SESSION['username'])):?>
	
<?php endif ?>

</body>
</html>

