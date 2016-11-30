<?php   
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
?>
<script>
	alert(" Log out effettuato con successo. ");
	window.location.assign("index.php");
</script>