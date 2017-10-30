<?php
$database = "if17_maisjuli_2";
require ("functions.php");
if(!isset($_SESSION["userid"])){
	header("Location: login.php");
	exit();
}
	//väljalogimine
	if(isset($_GET["logout"])){
		session_destroy(); //lõpetab sessiooni
		header("Location: login.php");
	}

	
	$create_table = create_table ();

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
  	
  <table>
	<p><span><?php echo $create_table; ?></span></p>
  
  </table>
  
</body>

</html>
