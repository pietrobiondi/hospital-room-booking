<!DOCTYPE html>
<html lang="en">
<script src="js/jquery.min.js"></script>
<?php
include "config.php";

	//variabili per query
$Nome = $_POST['Nome'];
$Cognome = $_POST['Cognome'];
$Nascita = $_POST['Nascita'];
$Telefono = $_POST['Telefono'];

$queryInsertDottore = "INSERT INTO dottori (Nome, Cognome, DatadiNascita, Telefono) VALUE( '" .$Nome ."','".$Cognome ."','" .$Nascita."','" .$Telefono."');";

$query = $conn->query($queryInsertDottore);
if($query){
	?>
	<script>
		alert(" Dottore inserito con successo !");
		window.location.assign("admin.php");
	</script>

	<?php
}
?>
</html>
