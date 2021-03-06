<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Trends</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<meta charset="utf-8">
</head>
<body>
	<div class="cart">
		<a href="viskurv.php">
			<img class="cart" src="cart.png">
			<?php
			if (isset($_SESSION["pris"])) {
				echo "<p>". $_SESSION["pris"]. " kr." ."</p>";
			}else {
				echo "<p>"."0 kr."."</p>";
			}
			?>
		</a>
	</div>

	<div class="pageNav">

		<label for="toggle">&#9776;</label>
		<input type="checkbox" id="toggle">


		<div class="pageHeader">
			<a href="forside.php"><h1>STRØYER</h1></a>
		</div>

		<ul class="pageMenu">
			<li><a href="shop.php">Shop</a></li>
			<li><a href="trends.php">Trends</a></li>
			<li><a href="omOs.php">Om os</a></li>
			<li><a href="contact.php">Kontakt</a></li>
		</ul>
		<hr class="navLinePage">

	</div>

	<div class="trendsSection">

		<script src="https://apps.elfsight.com/p/platform.js" defer></script>
		<div class="elfsight-app-fcf70c6c-1c41-4f35-948a-5eec008e8817"></div>

	</div>

	<footer>
		<a href="https://www.facebook.com/stroyeraalborg/"><img src="faceb_icon.png" alt="facebook icon"></a>
		<a href="https://www.instagram.com/butikstroyer/?hl=da"><img src="insta_icon.png" alt="facebook icon"></a>
		<p>2017 STRØYER - ALL RIGHTS RESERVED</P>
		</footer>


	</body>
	</html>
