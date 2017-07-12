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
	$sql = "SELECT `commentaire`as com
			FROM `tab_rubrique_com`
			WHERE `rubrique_id` =".$rubrique_id ;
	$req = $bdd->query($sql) or die($sql);
	$res = $req->fetch();
	echo stripslashes($res['com']);
}
?>