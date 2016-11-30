<?php
include "config.php";

if(empty($_POST['username'])){
 echo " UserName is empty! ";
 return false;
}
elseif (empty($_POST['password'])){
  echo " Password is empty! ";
  return false;
}
else{
 $username = $_POST['username'];
 $password = $_POST['password'];
 $string = "SELECT * FROM Utenti 
 WHERE Utenti.Username = '" .$username . "' AND Utenti.Password = '" .$password."';";
 $query =$conn->query($string);
 if($query->num_rows){
   session_start();
   $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
   $_SESSION["IDUtente"] = $row['IDUtente'];
   if($_SESSION["IDUtente"] != 1) header("location: home.php");
   else header("location: admin.php");
 }
 else{
   echo " Accesso Rifiutato ";
 }
}
?>