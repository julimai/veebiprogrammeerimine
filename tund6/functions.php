<?php
require("../../../config.php");
$database = "if17_maisjuli_2";
//alustame sessiooni
session_start();


//read all ideas funktsioon
function readAllIdeas(){
	$ideas="";
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	//$stmt=$mysqli->prepare("SELECT idea, ideacolor FROM userideas"); //kõigi mõtted
	//$stmt=$mysqli->prepare("SELECT idea, ideacolor FROM userideas WHERE userid = ?"); //ainult sisse logitu mõtted
	//$stmt->bind_param("i", $_SESSION["userid"]); //ainult sisse logitu mõtted
	$stmt=$mysqli->prepare("SELECT idea, ideacolor FROM userideas WHERE userid = ? ORDER BY id DESC"); //uusim mõte võiks olla eespool
	$stmt->bind_param("i", $_SESSION["userid"]);
	
	$stmt->bind_result($idea, $color);
	$stmt->execute();
	while ($stmt->fetch()){
			$ideas .='<p style="background-color: ' .$color.'">'.$idea ."</p> \n";
	}	
	$stmt->close();
	$mysqli->close();
	return $ideas;
}


function create_table(){
	$database = "if17_maisjuli_2";
	$table = "";
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $mysqli->prepare("SELECT id, firstname, lastname, birthday, gender, email FROM loginusers");
	echo $mysqli->error;
	
	$stmt->bind_result($id, $firstname, $lastname, $birthday, $gender, $email);
	$stmt->execute();
	$table ="<table border='1' style='border-collapse: collapse:'><tr><th>ID</th><th>eesnimi</th><th>perekonnanimi</th><th>email</th><th>sünnipäev</th><th>sugu</th></tr>"; 
	while ($stmt->fetch()){
		if ($gender==1){
			$gender="mees";
		}else{
			$gender="naine";
		}
		$table .= "<tr><td>" .$id. "</td><td>" .$firstname. "</td><td>".$lastname. "</td><td>" .$email. "</td><td>" . $birthday. "</td><td>" .$gender ."</td></tr>";
	}
	$table .="</table>";

	$stmt->close();
	$mysqli->close();
	return $table;
}

function readLastIdea(){
	
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $mysqli->prepare("SELECT idea FROM userideas WHERE id= (SELECT MAX(id) FROM userideas)");
	$stmt->bind_result($idea);
	$stmt->execute();
	$stmt->fetch();
	$stmt->close();
	$mysqli->close();
	return $idea;
}
//hea mõtte salvestamise funktsioon
function saveIdea($idea, $color){
	//echo $_SESSION["userid"];
	$notice = "";
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $mysqli ->prepare("INSERT INTO userideas (userid, idea, ideacolor) VALUES(?,?,?)");
	echo $mysqli->error;
	$stmt->bind_param("iss", $_SESSION["userid"], $idea, $color);
	if ($stmt->execute()){
		$notice = "Mõte on salvestatud";
	}
	else {
		$notice = "Salvestamisel tekkis tõrge".$stmt->error;
	}
	
	
	$stmt->close();
	$mysqli->close();
	return $notice;
}

//sisestuse kontrollimise funktsioon
function test_input ($data){ //funktsiooni tegemine, esitatud andmete kontroll
			$data = trim($data); //eemaldab liigsed tühikud, TAB reavahetused jne.
			$data = stripslashes ($data); //eemaldab kaldkriipsud "\"
			$data = htmlspecialchars ($data); 
			return $data;
	}
	
	function signup($signupFirstName, $signupFamilyName, $signupBirthDate, $gender, $signupEmail, $signupPassword){
	//loome andmebaasiühenduse
		$database = "if17_maisjuli_2";
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		//valmistame ette käsu andmebaasiserverile
		$stmt = $mysqli->prepare("INSERT INTO loginusers (firstname, lastname, birthday, gender, email, password) VALUES (?, ?, ?, ?, ?, ?)");
		echo $mysqli->error;
		//s - string
		//i - integer
		//d - decimal
		$stmt->bind_param("sssiss", $signupFirstName, $signupFamilyName, $signupBirthDate, $gender, $signupEmail, $signupPassword);
		//$stmt->execute();
		if ($stmt->execute()){
			echo "\n Õnnestus!";
		} else {
			echo "\n Tekkis viga : " .$stmt->error;
		}
		$stmt->close();
		$mysqli->close();
	}
		
	function signIn($email, $password){
			$notice = "";
			$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
			$stmt = $mysqli->prepare("SELECT id, email, password FROM loginusers WHERE email = ?");
			$stmt->bind_param("s",$email);
			$stmt->bind_result($id, $emailFromDb, $passwordFromDb);
			$stmt->execute();
			
			//kui vähemalt 1 tulemus
			if ($stmt->fetch()){
				$hash = hash("sha512", $password);
				if($hash == $passwordFromDb){
				$notice = "Sisse logitud";
				
				$_SESSION["userid"] = $id;
				$_SESSION["firstname"] = $firstnameFromDb;
				$_SESSION["lastname"] = $lastnameFromDb;
				$_SESSION["useremail"] = $emailFromDb;
				
				//lähen pealehele
				header("location: main.php");
				exit ();
				
				} else {
				$notice = "Vale salasõna";	
				}	
			} else {
			$notice = "Sellise e-postiga kasutajat ei ole";	
			}
	
		$stmt->close();
		$mysqli->close();
		return $notice;
	}
	/*$x=7;
	$y=4;
	echo "Esimene summa on ". ($x + $y);
	addValues();
	
	function addValues (){
		echo ("Teine summa on". ($GLOBALS["x"] + $GLOBALS["y"]) . "\n"
		$a=3;
		$b=2;
		echo ("Kolmas summa on". ($a + $b) . "\n"
	}*/
	
?>