<?php
$database = "if17_maisjuli_2";
require ("functions.php");
if(isset($_SESSION["userid"])){
	header("Location: login.php");
	exit();
}
	//väljalogimine
	if(isset($_GET["logout"])){
		session_destroy(); //lõpetab sessiooni
		header("Location: login.php");
	}
function create_table(){
	$database = "if17_maisjuli_2";
	
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $mysqli->prepare("SELECT firstname, lastname, birthday, gender, email, password FROM loginusers");
		echo $mysqli->error;
	while($row = $stmt->fetc()){
         echo "<tr><td>" .$row["id"]. "</td><td>" . $row["firstname"]. $row["lastname"]. "</td><td>" . $row["email"]. "</td><td>" . $row["birthday"]. "</td><td>" . $row["gender"]. "</td></tr>";
		}	
	
	$stmt->close();
	$mysqli->close();
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
	<?php /*<tr>
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
	</tr> */?>
	 <?php echo "<table>
	 <tr>
	 <th>ID</th>
	 <th>Nimi</th>
	 <th>E-mail</th>
	 <th>Sünnipäev</th>
	 <th>Sugu</th>
	 </tr>
	 </table>";
		  ?>
  
  </table>
  
</body>

</html>
