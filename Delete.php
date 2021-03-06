<?php
//henter information fra connection.php, for at skabe kontakt til databasen
require_once 'connection.php';

// Med _GET funktionen bliver id'et fra URL hentet
if(isset($_GET['id'])){
	//id fra URL bliver sat i en variabel
	$id=htmlentities($_GET['id']);

	//sql kode der finder billednavnet der passer med det valgte produkt
	$sql = "SELECT billede FROM produkttest WHERE id= $id";

	$results = mysqli_query($connection,$sql);
	$row = mysqli_fetch_assoc($results);
	$navn = $row['billede'];

	//sletter billedet fra mappen med billeder
	unlink('billeder/'.$navn);

	if(!empty($id)){
		//$query indeholder sql kode der sletter alt indehold med den givne id
		$query = "DELETE FROM produkttest WHERE id= $id ";

		$results = mysqli_query($connection,$query);

		//hvis der bliver slettet bliver der henvist til show.php, ellers fejlmeddelelse
		if($results){
			header("Location: produktOversigt.php");
			exit();
		}else{
			die("could not query the database" .msqli_error());
		}
	}
}

//Lukker forbindelsen til databasen
mysqli_close($connection);

?>
