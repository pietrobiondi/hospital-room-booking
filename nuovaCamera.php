<!DOCTYPE html>
<html lang="en">
<script src="js/jquery.min.js"></script>
<?php
include "config.php";

	//variabili per query
$Camera = $_POST['Camera'];
$PostiLetto = $_POST['PostiLetto'];

$queryInsertCamera = "INSERT INTO camere (IDCamera, PostiLetto) VALUE( '" .$Camera ."','".$PostiLetto."');";

$query = $conn->query($queryInsertCamera);
if($query){
	?>
	<script>
		alert(" Camera inserita con successo !");
		window.location.assign("admin.php");
	</script>

	<?php
}
else{
	?>
	<script>
		alert(" ERRORE: Camera già presente. ");
		window.location.assign("admin.php");
	</script>

	<?php
}


?>

</html>
