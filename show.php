<?php
//starter en session på siden
session_start();

//henter information fra connection.php, for at skabe kontakt til databasen
require_once "connection.php";

// tjekker om man er logget in
if(!isset($_SESSION['login'])){
    header('Location: login.php');
}




?>

<?php
// Henter information fra alle produkter på databasen
$query = "SELECT*FROM produkttest";
$results = mysqli_query($connection,$query);

//hvis der ikke er nogle resultater bliver fejlkode skrevet
if(!$results){
   die("could not query the database" .mysqli_error());
}


if (isset($_POST['Bukser']))
{
$query = "SELECT*FROM produkttest WHERE kategori='Bukser'";
$results = mysqli_query($connection,$query);
}
if(!$results){
   die("bukser virker ikke" .mysqli_error());
}

if (isset($_POST['Kjoler']))
{
$query = "SELECT*FROM produkttest WHERE kategori='Kjoler'";
$results = mysqli_query($connection,$query);
}
if(!$results){
   die("bukser virker ikke" .mysqli_error());
}

if (isset($_POST['Sko']))
{
$query = "SELECT*FROM produkttest WHERE kategori='Sko'";
$results = mysqli_query($connection,$query);
}
if(!$results){
   die("bukser virker ikke" .mysqli_error());
}

if (isset($_POST['Jakker']))
{
$query = "SELECT*FROM produkttest WHERE kategori='Jakker'";
$results = mysqli_query($connection,$query);
}
if(!$results){
   die("bukser virker ikke" .mysqli_error());
}
if (isset($_POST['Trøjer']))
{
$query = "SELECT*FROM produkttest WHERE kategori='Trøjer'";
$results = mysqli_query($connection,$query);
}
if(!$results){
   die("bukser virker ikke" .mysqli_error());
}






?>



<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="showstyle.css">
<title>Show</title>
<meta charset="utf-8">
</head>
<body>

<div class="header">

<a href="insert.php">Indsæt tøj</a>

<h2>Butik Strøyer Admin </h2>

<a href="logud.php" onclick="return confirm ('Er du sikker på at du vil logge ud?')">Log ud</a>
</div>



<h2>Produkt oversigt</h2>

<form action='shop.php'>

  <input type="submit"  value="vis alt">
  
  </form> 

  <form method="POST" action='<?php echo $_SERVER['PHP_SELF']?>'>

  <input type="submit" name="Bukser"  value="Bukser">
  
  </form> 


  <form method="POST" action='<?php echo $_SERVER['PHP_SELF']?>'>

  <input type="submit" name="Kjoler"  value="Kjoler">
  
  </form> 


  <form method="POST" action='<?php echo $_SERVER['PHP_SELF']?>'>

  <input type="submit" name="Sko"  value="Sko">
  
  </form> 

  <form method="POST" action='<?php echo $_SERVER['PHP_SELF']?>'>

  <input type="submit" name="Jakker"  value="Jakker">
  
  </form> 


  <form method="POST" action='<?php echo $_SERVER['PHP_SELF']?>'>

  <input type="submit" name="Trøjer"  value="Trøjer">
  
  </form> 





<!-- Table der indeholder alle produkter i databasen -->
<table>
  <tr>
    <th>Katagori</th>
    <th>Producent</th>
    <th>Model</th>
    <th>Billede</th>
    <th>Pris</th>
    <th>Beskrivelse</th>
  </tr>


<?php

  // While loop der kører igennem databasen og echoer de valgte resultater i en tabel
  while($row = mysqli_fetch_assoc($results)){


    echo '<tr>';

      echo "<td>".$row['kategori']."</td>";
      echo "<td>".$row['producent']."</td>";
      echo "<td>". $row['model']."</td>";
      echo "<td>"."<img src='billeder/". $row['billede']."'>"."</td>";
      echo "<td>". $row['pris']. ".kr". "</td>";
      echo "<td>".$row['beskrivelse']."</td>";
      ?>
      <!--"rediger.php?id=<?php //echo $row['ID']?>" Gør at id'en fra databasen bliver hentet og skaber en unik url for det enkelte produkt-->
      <!-- onclick laver en advarsel der spøger om brugeren er sikker på om man vil slette -->
      <td><a href="rediger.php?id=<?php echo $row['ID']?>">Rediger i <?php echo $row ['model'];?> </a></td>
      <td><a href="delete.php?id=<?php echo $row['ID']?>" onclick="return confirm ('Er du sikker på du vil slette <?php echo $row['model']?>?')"
      >Slet <?php echo $row ['model'];?>  </a></td>
   <?php

  }
  ?>
</table>

<div class="bg-billede">

</div>



</body>
</html>

<?php
mysqli_close($connection);
?>
