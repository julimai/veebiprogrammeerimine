<?php
//muutujad
$myName = "Julika";
$myFamilyName = "Maiste";

$hourNow = date("H");

/*$schoolDayStart = date("d:m:Y") ." " ."8.15";
//echo $schoolDayStart;
$schoolBegin = strtotime($schoolDayStart);
//echo "a".$schoolBegin;
$timeNow = strtotime("now");
//echo $timeNow;
$minutesPassed = round(($timeNow - $schoolBegin) / 60);
echo $minutesPassed;*/

	$schoolDayStart = date("d.m.Y") ." " ."8.15";
	//echo $schoolDayStart;
	$schoolBegin = strtotime($schoolDayStart);
	//echo $schoolBegin;
	$timeNow = strtotime("now");
	//echo ($timeNow - $schoolBegin);
	
	$minutesPassed = round(($timeNow - $schoolBegin) / 60);
	echo $minutesPassed;


//echo $hourNow
//võrdlen kellaaega ja annan hinnangu mis päevaosaga on tegemist. (< > == >= <= != )

$partOfDay = "";

if ($hourNow < 8 ){
$partOfDay = "varajane hommik";}
//echo $partOfDay;
if ($hourNow >= 8 and $hourNow < 16 ){
$partOfDay = "koolipäev";
}	
if ($hourNow > 16 ) {
$partOfDay = "vaba aeg" ;}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Julika veebiprogrammeerimise asjad</title>
</head>
<body>
  <h1>
  <?php
  echo $myName ." ".$myFamilyName;
  ?>
  </h1>
  <p>See veebileht on loodud õppetöö raames ning ei sisalda tõsiseltvõetavat sisu.</p>
  <p>Esimene katse kodust muudatust teha.</p>
  <h2>Pealkirja katsetus</h2>
  <p>koos tavateksti katsetusega</p>
  <p>Teine katsetus mitu päeva hiljem kodust tunneli kaudu muudatust teha.</p>
  <?php
  echo "<p>Kõige esimene PHP abil väljastatud sõnum</p>";
  echo "<p>Täna on ";
  echo date("d.m.Y"). ", käes on " . $partOfDay;
  echo ".</p>";
  echo "<p>Lehe avamise hetkel oli kell " .date("H:i:s") .".</p>";
  
  ?>
</body>

</html>