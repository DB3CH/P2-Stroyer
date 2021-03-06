<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Om os</title>
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

	<div class="flex-2">
		<div class="flexItem flexText">
			<h2>Placeret centralt i Gravensgade</h2>
			<p> Butik Strøyer ligger i Aalborg midtby, i en af de hyggeligste og ældste gader. Der er hyggelig atmosfære og unikke muligheder for shopping til alle aldre. Butik Strøyer er ejet af ægteparret Kirsten og Allan, der tilsammen startede butikken i 2006. Deres version har været at starte en tøjbutik til den stilsikre kvinde, der ønsker et stilsikkert design, men samtidig også med nogle detaljer, som gør tøjet unikt og lidt eksperimenterende. Butikken fører kendte danske mærker, der har fokus på høj kvalitet og lækkert materiale. I butikken møder du oftest den ene af indehaverne, Kirsten, som står klar til at give inspiration og gode råd, til at opnå det komplette outfit. Den samme rådgivning og inspiration får du også på denne webshop, der emmer af inspiration og gode råd til, hvordan du opnår det perfekte outfit. Se mere under Trends. Dertil kan du altid besøge vores Instagram, der løbende bliver opdateret med outfits og lækre detaljer.</p>
			<div class="icons">
				<a href="https://www.facebook.com/stroyeraalborg/"><img src="faceb_icon.png" alt="facebook icon"></a>
				<a href="https://www.instagram.com/butikstroyer/?hl=da"><img src="insta_icon.png" alt="facebook icon"></a>
			</div>
		</div>

		<div class="flexItem">
			<img src="omosbillede.jpg" class="mobileHide">
		</div>

	</div>

	<footer>
		<a href="https://www.facebook.com/stroyeraalborg/"><img src="faceb_icon.png" alt="facebook icon"></a>
		<a href="https://www.instagram.com/butikstroyer/?hl=da"><img src="insta_icon.png" alt="facebook icon"></a>
		<p>2017 STRØYER - ALL RIGHTS RESERVED</P>
		</footer>

	</body>
	</html>
