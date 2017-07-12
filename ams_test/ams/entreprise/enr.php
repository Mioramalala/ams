<?php 

include'../connexion.php';
session_start();
/*******************donnees GET distribution des tache************************/
$donne=array();
$pers=$_GET["pers"];
$donne=$_GET["cl1"];


//on cherche la dernier mission a inclure//
$sqlIdMission="SELECT MAX(MISSION_ID) as MISSION_ID FROM tab_mission";
$repIdMiss=$bdd->query($sqlIdMission);
// echo $sqlIdMission;
$donneeMissId=$repIdMiss->fetch();
$IdMission=$donneeMissId['MISSION_ID'];



foreach($donne as $i){
//print $i;
$req="SELECT formulation_tache, cycle_tache FROM tab_tache WHERE id_tache=".$i;
$rep=$bdd->query($req);
	$donn=$rep->fetch();
	$formulation=$donn["formulation_tache"];
	$cycle=$donn["cycle_tache"];
	// echo " <br/> ".$i." ".$formulation."  ".$cycle." pers:".$pers." mission:".$mission_id;
	
		/*insertion pour la sauveard des données*/
		$reqInsert=$bdd->prepare("INSERT INTO tab_distribution_tache ( tache_id,parent_tache,UTIL_ID,MISSION_ID) VALUE (:t,:u,:a,:z)");
			$reqInsert->execute(array(
			't'=>$i,
			'u'=>$cycle,
			'a'=>$pers,
			'z'=>$IdMission
			));
	// print "ok";
	}



 ?>