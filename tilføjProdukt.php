
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
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="adminStyle.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>

	<input type="checkbox" id="check">
  <label for="check">
    <i class="fas fa-bars" id="btn"></i>
    <i class="fas fa-times" id="cancel"></i>
  </label>
  <div class="sidebar">
    <header>Menu</header>
    <a href="produktOversigt.php" class="active">
      <span>Produktoversigt</span>
    </a>
    <a href="ordrer.php">
      <span>Igangværende ordrer</span>
    </a>
    <a href="afsluttedeOrdrer.php">
      <span>Afsluttede ordrer</span>
    </a>
  </div>


  <header>
    <div class="logo">
    
   </div>
   <div class="nav">
     <h1 class="logo-text"> <a class="logo-text" href="logud.php" onclick="return confirm ('Er du sikker på at du vil logge ud?')">Log ud</a></h1>
   </div>
 </header>

 <div class="admin-wrapper">

  <div class="admin-content">


   <div class="content">

    <h2 class="page-title">Tilføj produkt</h2>


    <div class="form">
      <!-- Form hvor data kan indsættes, post sender informationen videre til upload.php, hvor det bliver sat på databasen. -->
      <form action="upload.php" method="POST" class="container" enctype="multipart/form-data">



        <label for="Kategori">Kategori</label>
        <select id="kategori" name="kategori" required>
          <option value="" disabled selected hidden>Vælg kategori...</option>
          <option value="Sko">Sko</option>
          <option value="Kjoler">Kjoler</option>
          <option value="Trojer">Trøjer</option>
          <option value="Bukser">Bukser</option>
          <option value="Jakker">Jakker</option>
        </select>


        <Label>Producent:</Label>
        <input type="text" id="producent" name="producent" required>
        <label>Model:</label>
        <input type="text" id="model" name="model" required>
        <Label>Størrelse:</Label>
        <input type="text" id="storrelse" name="storrelse" required>
        <Label>Beskrivelse:</Label>
        <input type="text" id="beskrivelse" name="beskrivelse">
        <label>Indsæt billede:</label>
        <input type="file" name="file" value="" required>
        <Label>Pris:</Label>
        <input type="number" min="0,00" max="999999,00" id="pris" name="pris" required>
        <Label>Produkt nummer:</Label>
        <input type="text" id="produkt" name="produkt"required>

        <input class="btn" type="submit" value="Indsæt">

      </form>
    </div>

  </div>
</div>
</div>

</body>
</html>
<?php
mysqli_close($connection);
?>
