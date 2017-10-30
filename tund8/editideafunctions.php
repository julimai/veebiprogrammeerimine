<?php
require("../../../config.php");
$database = "if17_maisjuli_2";

//Loeme toimetamiseks mõtte
function getSingleIdea($editId){
$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
$stmt = $mysqli->prepare("SELECT idea, ideacolor FROM userideas WHERE id=?");
$stmt->bind_param("i", $editId);
$stmt->bind_result($idea, $color);
$stmt->execute();
$ideaObject = new Stdclass();
if($stmt->fetch()) {
	$ideaObject->text = $idea;
	$ideaObject->color = $color;
}
$stmt->close();
$mysqli->close();
return $ideaObject;
}

function updateIdea($id, $idea, $ideacolor){
$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
$stmt=$mysqli->prepare("UPDATE userideas SET idea=?, ideacolor=? WHERE id=?");
$stmt->bind_param("ssi", $idea, $ideacolor, $id);
if($stmt->execute()){
	echo "Õnnestus";
} else {
	echo "Tekkis viga".$stmt->error;
}
$stmt->close();
$mysqli->close();
}

Function deleteIdea($id){
$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
$stmt = $mysqli->prepare("UPDATE userideas SET deleted=NOW() WHERE id=? ");
$stmt->bind_param("i", $id);
$stmt->execute();

$stmt->close();
$mysqli->close();
}
?>