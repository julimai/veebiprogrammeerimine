<?php
require ("functions.php");
if(isset($_SESSION["userid"])){
	header("location: login.php");
	exit();
}
	//väljalogimine
	if(isset($_GET["logout"])){
		session_destroy(); //lõpetab sessiooni
		header("location: login.php");
	}



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Julika veebiprogrammeerimise asjad</title>
</head>
<body>
  
  <p>See veebileht on loodud õppetöö raames ning ei sisalda tõsiseltvõetavat sisu.</p>
 
  <p> <a href="?logout=1">Logi välja</a> </p>
  <p> <a href="main.php">Pealeht</a> </p>
 
  <table border="1" style="border-collapse: collapse:">
	<tr>
		<th>Eesnimi</th>
		<th>Perekonnanimi</th>
		<th>Kasutajanimi</th>
	</tr>
	<tr>
		<td>Julika</td>
		<td>Maiste</td>
		<td>julimai@tlu.ee</td>
	</tr>
	<tr>
		<td>Mari</td>
		<td>Karus</td>
		<td>karusmari@tlu.ee</td>
	</tr>
  
  </table>
  
</body>

</html>
