<!DOCTYPE html>
<html lang="en">
<script src="js/jquery.min.js"></script>
<?php
include "config.php";
$IDPrenotazione = $_GET['ID'];
$queryRifiuto =  "DELETE FROM prenotazioni
WHERE prenotazioni.IDPrenotazione = " .$IDPrenotazione.";";
$query = $conn->query($queryRifiuto);
if($query){
	?>
	<script>
		alert(" Prenotazione rifiutata con successo !");
		window.location.assign("admin.php");
	</script>
	<?php
}
?>
</html>

