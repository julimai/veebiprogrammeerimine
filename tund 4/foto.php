<?php
$picsDir = "../../pics/";
$picFiles = [];
$picFileTypes = ["jpg", "jpeg", "png", "gif"];

$allFiles = array_slice (scandir($picsDir), 2);

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
$picFile = $picFiles[$picNumber];

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Julika veebiprogrammeerimise asjad</title>
</head>
<body>
  <h1>
 
  </h1>
  <p>See veebileht on loodud õppetöö raames ning ei sisalda tõsiseltvõetavat sisu.</p>
 
  
  <h1>Pilt ülikoolist</h1>
  <img src="<?php echo $picsDir .$picFile; ?>" alt="Tallinna Ülikool">
  
  
</body>

</html>