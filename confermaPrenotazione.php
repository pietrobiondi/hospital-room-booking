<!DOCTYPE html>
<html lang="en">
<script src="js/jquery.min.js"></script>
<?php
	include "config.php";
	$IDPrenotazione = $_GET['ID'];
	$queryConferma =  "UPDATE prenotazioni SET Confermata = 1
						WHERE prenotazioni.Confermata = 0 AND prenotazioni.IDPrenotazione = " .$IDPrenotazione.";";
	$query = $conn->query($queryConferma);
	if($query){
?>
	<script>
  	alert(" Conferma avvenuta con successo !");
	window.location.assign("admin.php");
  	</script>
<?php
}
?>
</html>