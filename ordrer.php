<?php
//starter en session på siden
session_start();

//henter information fra connection.php, for at skabe kontakt til databasen
require_once "connection.php";

// tjekker om man er logget in
if(!isset($_SESSION['login'])){
    header('Location: login.php');
}

// Henter information fra alle produkter på databasen
$query = "SELECT*FROM ordrer";
$results = mysqli_query($connection,$query);

//hvis der ikke er nogle resultater bliver fejlkode skrevet
if(!$results){
   die("could not query the database" .mysqli_error());
}

if (isset($_POST['aldeste']))
{
$query = "SELECT*FROM ordrer ORDER BY tidspunkt ASC";
$results = mysqli_query($connection,$query);
}
if(!$results){
   die("bukser virker ikke" .mysqli_error());
}

if (isset($_POST['nyeste']))
{
$query = "SELECT*FROM ordrer ORDER BY tidspunkt DESC";
$results = mysqli_query($connection,$query);
}
if(!$results){
   die("bukser virker ikke" .mysqli_error());
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="adminStyle.css">
</head>
<body>


	<header>
		<div class="logo">
			<h1 class="logo-text">Strøyer</h1>
		</div>
		<div class="nav">
			<h1 class="logo-text">Username</h1>
		</div>
	</header>

	<div class="admin-wrapper">

		<div class="left-sidebar">
			<ul>
				<li><a href="produktOversigt.php">Produktoversigt</a></li>
				<li><a href="ordrer.php">Igangværende ordrer</a></li>
				<li><a href="afsluttedeOrdrer.html">Afsluttede ordrer</a></li>
				<li><a href="#">Admin Konti</a></li>
			</ul>
		</div>

		<div class="admin-content">

		

			<div class="content">

				<h2 class="page-title">Igangværende ordrer</h2>

 <form method="POST" action='<?php echo $_SERVER['PHP_SELF']?>'>

  <input type="submit" name="aldeste"  value="Vis ældeste ordrer">

  <input type="submit" name="nyeste"  value="Vis Nyeste ordrer">

  </form>




		<!-- Table der indeholder alle produkter i databasen -->
<table>
  <tr>
    <th>Tidspunkt</th>
    <th>Id</th>
    <th>Navn</th>
    <th>Efternavn</th>
    <th>Telefonnummer</th>
 

  </tr>

					<tbody>

<?php

  // While loop der kører igennem databasen og echoer de valgte resultater i en tabel
  while($row = mysqli_fetch_assoc($results)){


    echo '<tr <div class="table">';

      echo "<td>".$row['tidspunkt']."</td>";
      echo "<td>".$row['id']."</td>";
      echo "<td>".$row['navn']."</td>";
      echo "<td>". $row['efternavn']."</td>";
      echo "<td>". $row['telefonnummer']. "</td>";


      ?>
      <!--"rediger.php?id=<?php //echo $row['ID']?>" Gør at id'en fra databasen bliver hentet og skaber en unik url for det enkelte produkt-->
      <!-- onclick laver en advarsel der spøger om brugeren er sikker på om man vil slette -->
      <td><a href="ordrerside.php?id=<?php echo $row['id']?>" class="godkend">vis </a></td>
      <td><a href="rediger.php?id=<?php echo $row['id']?>" class="godkend">Godkend</a></td>
      <td><a href="afvisordrer.php?id=<?php echo $row['id']?>" class="afvis" onclick="return confirm ('Er du sikker på du vil slette <?php echo $row['model']?>?')"
      >Afvis </a></td>
   <?php

  }
  ?>
</div>
</table>



				</table>

			</div>
		</div>
	</div>

</body>
<?php
mysqli_close($connection);
 ?>
</html>