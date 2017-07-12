<?php 
	// session_start();
	require_once "../../../connexion.php";
	//requiert
	// $mission_id = $_SESSION['idMission'];
	//$mission_id = 18;
	// $rb_cycle = @$_GET['p'];
	$rubrique_id = @$_GET['rubrique'];

if($rubrique_id !="")
{
	$sql = "SELECT `rubrique_id`, `rubrique_libelle`, `rubrique_cycle`, `ENTREPRISE_ID` FROM `tab_rubrique_notes_annexes` WHERE `rubrique_cycle` = '".$cycle."' ORDER BY `rubrique_cycle` ASC ";
	$req = $bdd->query($sql) or die($sql);
	$res = $req->fetch();
	echo stripslashes($res['com']);
}
?>