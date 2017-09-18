<?php
//muutujad
$myName = "Julika";
$myFamilyName = "Maiste";
$monthNamesEt = ["jaanuar", "veebruar", "märts", "aprill", "mai", "juuni", "juuli", "august", "september", "oktoober", "november", "detsember"];

//var_dump($monthNamesEt);

//echo $monthNamesEt[3];

$monthNow = $monthNamesEt[date("n") -1];

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
	//echo $minutesPassed;


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

//vanusega seotud muutujad
$myAge = 0;
$ageNote = "";
$mybirthYear;
$yearsofmylife = "";

//echo = $_POST;
//var_dump($_POST);
//echo $_POST["birthYear"];

//arvutame vanuse


if ( isset($_POST["birthYear"]) and $_POST["birthYear"] !=0 );
	$myAge = date("Y") - $_POST["birthYear"];
	$mybirthYear = $_POST["birthYear"];
//echo $myAge;
	$ageNote = "<p> Te olete umbes" . $myAge ." aastat vana.</p>";
	
	$yearsofmylife = "<ol> \n";
	$yearnow = date("Y");
	for ($i = $mybirthYear; $i <= $yearnow; $i ++){
		$yearsofmylife .="<li>" .$i ."</li> \n";
	}
	$yearsofmylife .="</ol> \n";
	
	
	
//lihtne tsükkel
/*for ($i = 0; $i < 5; $i ++){
echo "ha-";} */



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
  echo date("d.". $monthNow. date(" Y")) . ", käes on " . $partOfDay;
  echo ".</p>";
  echo "<p>Lehe avamise hetkel oli kell " .date("H:i:s") .".</p>";
  ?>
  
  <h2> Räägime vanusest</h2>
  <p>Sisesta oma sünniaasta, arvutame vanuse!</p>
  <form method="post">
	<label>Teie sünniaasta: </label>
	<input name="birthYear" id="birthYear" type="number" min="1900" max="2017" value="<?php echo $mybirthYear; ?>">
	
	<input id="submitBirthYear" type="submit" value="Kinnita">
	
	  </form>
	<?php
		if ( $ageNote != ""){
		echo $ageNote;
		}
		if ($yearsofmylife !=""){
			echo "\n <h3> Olete elanud järgmistel aastatel</h3> \n" . $yearsofmylife;
		}
	?>
	  
	  
</body>

</html>