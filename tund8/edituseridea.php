<?php

	require ("functions.php");
	require ("editideafunctions.php");

	$notice = "";


	if(!isset($_SESSION["userid"])){
		header("Location: login.php");
		exit();
	}
	
	//väljalogimine
	if(isset($_GET["logout"])){
		session_destroy(); //lõpetab sessiooni
	}
	
	//Kui klõpsati uuendamise nuppu
	if(isset($_POST["ideaBtn"])){
		updateIdea($_POST["id"], test_input($_POST["useridea"]), $_POST["ideaColor"]);
		//echo $_POST["id"];
		//header("Location: ?id=" .$_POST["id"] ."&success=true");
		header("Location: userideas.php");
		exit();
	}
	//Kas kustutatakse
	if(isset($_GET["delete"])){
		deleteIdea(($_GET["id"]));
		header("Location: userideas.php");
		exit();
	}
	
	if(isset($_GET["success"])){
		$notice = "Kõik läks jube hästi!";
	}
	
	$idea = getSingleIdea($_GET["id"]);
	
	

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
  <p> <a href="userideas.php">Tagasi mõtete lehele</a> </p>
 <h2>Hea mõtte muutmine</h2>
 <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	<input name="id" type="hidden" value="<?php echo $_GET["id"]; ?>">
	 <label>Hea mõte!</label>
	 <textarea name="useridea"><?php echo $idea->text; ?></textarea>
	 <br>
	 <label>Mõttega seostuv värv</label>
	 <input name="ideaColor" type="color" value="<?php echo $idea->color; ?>">
	 <br>
	 <input name="ideaBtn" type="Submit" value="Salvesta mõte"><br>
	 <span><?php echo $notice; ?></span>
 
 </form>
	<p><a href="?id=<?=$_GET["id"];?>&delete=true">Kustuta see mõte</a></p>
 <hr>

  
</body>

</html>
