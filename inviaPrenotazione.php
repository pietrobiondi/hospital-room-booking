<!DOCTYPE html>
<html lang="en">
<script src="js/jquery.min.js"></script>
<?php
include "config.php";

	session_start();//da usare per fare il relocation ad admin-utente
	$user = $_SESSION["IDUtente"];
	//variabili per query
	$Dottori = $_POST['Dottori'];
	$Camere = $_POST['Camere'];
	$DataInizio = $_POST['DataInizio'];
	$DataFine = $_POST['DataFine'];

	$queryInvioPrenotazione = "INSERT INTO prenotazioni (DataInizio, DataFine, IDCamera, IDDottore) VALUE( '" .$DataInizio ."','".$DataFine ."','" .$Camere."','" .$Dottori."');";

	$query = $conn->query($queryInvioPrenotazione);
	if($query){
		?>
		<script>
			alert(" Prenotazione inviata con successo !");
	var utente = "<?php echo $user; ?>"; //passaggio di var da php a JS
	if(utente != 1) window.location.assign("home.php");
	else window.location.assign("admin.php");
</script>

<?php
}
?>
</html>
