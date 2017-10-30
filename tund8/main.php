<?php

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


	
$signupFirstName = ("Location: login.php");
$picsDir = "../../pics/";
$picFiles = [];
$picFileTypes = ["jpg", "jpeg", "png", "gif"];

$allFiles = array_slice(scandir($picsDir), 2);

foreach ($allFiles as $file){
	$fileType = pathinfo($file, PATHINFO_EXTENSION);
	if (in_array($fileType, $picFileTypes) ==true) {
		array_push($picFiles, $file);
	}
}

//var_dump ($picFiles);
//$picFiles = ;
$fileCount = count($picFiles);
$picNumber = mt_rand(0, ($fileCount - 1));
//echo $picNumber;
$picFile = $picFiles[$picNumber];


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $_SESSION["firstname"] ." " .$_SESSION["lastname"]; ?>
		veebiprogrammeerimise asjad
	</title>
</head>
<body>
	<h1><?php echo $_SESSION["firstname"] ." " .$_SESSION["lastname"]; ?></h1>
	<p>See veebileht on loodud õppetöö raames ning ei sisalda tõsiseltvõetavat sisu.</p>
	<p> <a href="?logout=1">Logi välja</a> </p>
	<p> <a href="usersinfo.php">Info kasutajate kohta</a> </p>
	<p> <a href="userideas.php">Head mõtted</a> </p>
	<h2>Pilt ülikoolist</h2>
	<img src="<?php echo $picsDir .$picFile; ?>" alt="Tallinna Ülikool">
  
  
</body>

</html>
