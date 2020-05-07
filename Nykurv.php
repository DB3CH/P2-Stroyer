<?php
//henter information fra connection.php, for at skabe kontakt til databasen
require_once 'connection.php';

//starter en session på siden
session_start();

$samletpris = 0;
//tjekker om der er en inkøbskurv funktion
if (isset($_SESSION["indkobskurv"])) {

  if (isset($_SESSION["storrelse"])) {



$storrelser = $_SESSION["storrelse"];

foreach ($_SESSION["indkobskurv"] as $key => $item) {
  $id=$item;

  $query = "SELECT * FROM produkttest WHERE id= $id ";
  $result = mysqli_query($connection,$query);

?>



<!DOCTYPE html>
<html>
<head>
	<title>Shop</title>
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
			<li><a href="#">Kontakt</a></li>
		</ul>
		<hr class="navLinePage">

	</div>


	<div class="shopping-cart">
  <!-- Title -->
  <div class="title">
    Kurv
  </div>

  <!-- Product #1 -->
  <div class="item">

    <div class="image">
      <img src="test.jpg" alt="" />
    </div>

    <div class="description">
      <span>Common Projects</span>
      <span>Bball High</span>
      <span>White</span>
    </div>


    <div class="price">$549</div>

    <div class="btn-kurv">Slet</div>


  


  <div class="item">

    <div class="total-price">Totalpris $549</div>

   	<div class="btn-kurv-afslut">Shop videre</div>

   	<div class="btn-kurv-afslut">Gå til kassen</div>

  </div>
 </div>