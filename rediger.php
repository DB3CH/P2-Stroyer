<?php
//starter en session på siden
session_start();

//henter information fra connection.php, for at skabe kontakt til databasen
require_once "connection.php";

// tjekker om man er logget in
if(!isset($_SESSION['login'])){
    header('Location: login.php');
}


//Kode til at redigere i tøjet, bliver kun kørt hvis der trykkes på rediger knappen
if (isset($_POST['rediger'])) {
  //Tager informationen fra formen og sætter den i variabler, HTMLentities sørger for at det ikke er skrevet kode i formen.
    $kategori = htmlentities($_POST['kategori']);
    $producent = htmlentities($_POST['producent']);
    $model = htmlentities($_POST['model']);
    $storrelse = htmlentities($_POST['storrelse']);
    $beskrivelse = ($_POST['beskrivelse']);
    $pris = htmlentities($_POST['pris']);
    $id = htmlentities($_POST['id']);


    if (isset($_FILES['file'])) {


      $file = $_FILES['file'];


      $fileName = $_FILES['file']['name'];
      $fileTmpName = $_FILES['file']['tmp_name'];
      $fileSize = $_FILES['file']['size'];
      $fileError = $_FILES['file']['error'];
      $fileType = $_FILES['file']['type'];

      //deler filnavnet ved hvert . for at finde filtypen
      $fileExt = explode('.', $fileName);

      //laver alt tekst til lowercase og vælger den sidste del for at finde filtypen
      $fileActualExt = strtolower(end($fileExt));

      //en array med alle de tilladte filtyper
      $allowed = array('jpg', 'jpeg', 'png', 'raw', 'jpe', 'jif', 'jfif', 'jfi', 'webp', 'heif', 'heic');

      //første if tjekker om filtypen der er uplaoded er en af de tilladte filtyper
      if (in_array($fileActualExt, $allowed)) {
          //Den anden if tjekker at der er 0 fejl under upload af filen
          if ($fileError === 0) {
            //laver et unikt navn til filen inden den bliver lagt i mappen med billeder
            $fileNameNew = uniqid('', true).".".$fileActualExt;
            $fileDestination = 'billeder/'.$fileNameNew;


            //sql kode der finder billednavnet der passer med det valgte produkt
          	$sql = "SELECT billede FROM produkttest WHERE id= $id";

          	$results = mysqli_query($connection,$sql);
          	$row = mysqli_fetch_assoc($results);
          	$navn = $row['billede'];

            //sletter billedet fra mappen med billeder
            unlink('billeder/'.$navn);

            $sql = "UPDATE produkttest SET billede='$fileNameNew'
            WHERE id='$id';";
            if (mysqli_query($connection, $sql)) {
          move_uploaded_file($fileTmpName, $fileDestination);
          echo "New record created successfully";
          mysqli_close($connection);
          header("location: show.php?uploadsuccess");
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($connection);
  }

          }else {
            //hvis der er fejl i upload skrives fejlkode
            echo "Der skete en fejl under upload, prøv igen.";
        }
      } else {
        //hvis den forkerte filtype uploades skrives det
        echo "Denne filtype understøttes ikke.";
      }

    }


      //Sætter sql query til at indsætte data i en variabel
      $sql = "UPDATE produkttest SET kategori='$kategori', producent='$producent', storrelse='$storrelse', model='$model', pris='$pris', beskrivelse='$beskrivelse'
      WHERE id='$id';";

      if (mysqli_query($connection, $sql)) {
          echo "New record created successfully";
          //header sender brugeren videre til show.php
         header("location: show.php");
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($connection);
      }



}


?>


<?php

//tjekker om der er blevet valgt et produkt
if(isset($_GET['id'])){

	//id fra URL bliver sat i en variabel
    $id=htmlentities($_GET['id']);

  // tjekker at id variablen ikke er tom
	if(!empty($id)){

    //sql kode der henter alt informationen om produktet med det givne id
		$query = "SELECT * FROM produkttest WHERE id= $id ";

        $results = mysqli_query($connection,$query);


        $row = mysqli_fetch_assoc($results);
    }
}

//informationen om produktet bliver anvendt i HTML formen for at udfylde values,
//så brugeren kan se hvad de stod før, når de redigerer
?>

<!DOCTYPE html>
<html>
<head>
	<title>Insert  </title>
	<meta charset="utf-8">
</head>

<body>

	<form name="rediger" id="rediger" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" autocomplete="on" enctype="multipart/form-data">
        <label>Kategori:</label>
        <input type="text" id="kategori" name="kategori" value="<?php echo $row['kategori']?>" required>
        <Lable>Producent:</Lable>
        <input type="text" id="producent" name="producent" value="<?php echo $row['producent']?>" required>
        <Lable>Model:</Lable>
        <input type="text" id="model" name="model" value="<?php echo $row['model']?>" required>
        <lable>Størrelse:</lable>
        <input type="text" id="storrelse" name="storrelse" value="<?php echo $row['storrelse']?>" required>
        <Lable>Beskrivelse:</Lable>
        <input type="text" id="beskrivelse" name="beskrivelse" value="<?php echo $row['beskrivelse']?>">
        <label>Rediger billede:</lable>
        <input type="file" name="file" value="">
        <Lable>Pris:</Lable>
        <input type="number" min="0,00" max="999999,00" step="1.00" id="pris" name="pris" value="<?php echo $row['pris']?>" required>

        <input type="submit" name="rediger" value="Rediger">
        <input type="hidden" name="id" value="<?php echo $id?>">
    </form>

</body>
</html>

<?php
mysqli_close($connection);
?>
