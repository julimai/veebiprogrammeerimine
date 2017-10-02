<?php
$database = "if17_maisjuli_2";
//alustame sessiooni


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
				if($password == $passwordFromDb){
				$notice = "Sisse logitud";
				
				$_SESSION["userid"] = $id;
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