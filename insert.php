
<?php
//Starter en session på siden
session_start();

//henter information fra connection.php, for at skabe kontakt til databasen
require_once "connection.php";

// tjekker om man er logget in
if(!isset($_SESSION['login'])){
    header('Location: login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Insert  </title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="insertstyle.css">
</head>

<body>
    <div class="header">

<a href="insert.php">Indsæt tøj</a>

<h2> <a class="logo" href="show.php">Butik Strøyer Admin </a> </h2>

<a href="logud.php">Log ud</a>

</div>

<!-- Form hvor data kan indsættes, post sender informationen videre til upload.php, hvor det bliver sat på databasen. -->
	<form action="upload.php" method="POST" class="container" enctype="multipart/form-data">
        <ul>
       <li> <label>Kategori:</label>
        <input type="text" id="kategori" name="kategori"> </li>
       <li> <Lable>Producent:</Lable>
        <input type="text" id="producent" name="producent"> </li>
       <li> <Lable>Model:</Lable>
        <input type="text" id="model" name="model"> </li>
       <li> <Lable>Størrelse:</Lable>
         <input type="text" id="storrelse" name="storrelse" placeholder="Vi har størrelse..."> </li>
        <li> <Lable>Beskrivelse:</Lable>
        <input type="text" id="beskrivelse" name="beskrivelse"> </li>
        <li><label>Indsæt billede:</lable>
        <input type="file" name="file" value=""></li>
       <li> <Lable>Pris:</Lable>
        <input type="number" min="0,00" max="999999,00" id="pris" name="pris"> </li>


        <input type="submit" value="Indsæt">
        </ul>
    </form>

</body>
</html>


<?php
//Lukker forbindelsen til databasen
mysqli_close($connection);
?>
