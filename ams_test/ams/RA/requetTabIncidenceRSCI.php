<?php
	@session_start();
	include '../connexion.php';	
	$cycle = $_POST['cycle'];
	$result = array();
	if($_GET['mission_id']==""){
	$mission_id=$_SESSION['idMission'];
	}else{
	$mission_id=$_GET['mission_id'];
	}	$RisqueGlobalSystem = '...';


	$req = $bdd->query('SELECT * FROM tab_incidence_ra WHERE CYCLE = "'.$cycle.'" AND MISSION_ID ='.$mission_id);
	if($donnees = $req->fetch()){
		array_push($result,$donnees['FONCTIONNEMENT']);
		array_push($result,$donnees['COMPTE']);
	}
	else{
		array_push($result,'');
		array_push($result,'');		
	}

	echo json_encode($result);
?>