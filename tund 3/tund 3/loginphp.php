
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>LogIn.php Tund3</title>
</head>
<body>

<h1>Logi sisse</h1>
 <form method="post">
	<label>E-post</label><br>
	<input name="loginEmail" type="email"><br> 
	<label>Salasõna</label><br>
	<input name="loginPassword" type="password"><br>
    <br>
	<input id="login" type="submit" value="Logi sisse">
	</form>

<h1>Uue kasutaja registreerimine</h1>	
<form method="post">
	<label>Eesnimi</label><br>
	<input name="signupFirstName" type="text" #value="<?php echo $firstname; ?>"> <br> 
	<label>Perenimi</label><br>
	<input name="signupFamilyName" type="text"><br>
    <br>
	<label>Sugu</label><br>
	<input type="radio" name="gender" value="1"> Naine<br>  
	<input type="radio" name="gender" value="2"> Mees<br>
    <br>
	<label>E-post</label>
	<input name="signupEmail" type="email">
	<label>Salasõna</label>
	<input name="signupPassword" type="password"><br>
    <br>
    <input id="login" type="submit" value="Kinnita">
	</form>	 

  <?php
    $firstname = $_POST["signupFirstName"]
    $email = $_POST["signupEmail"]
	//if (isset($_POST[$firstname])and $_POST[$firstname] != ""){
		echo "Teretulemast ". $firstname . "sinu e-posti aadress on ". $email ."ja sa oled ";
		}
    ?>	
</body>