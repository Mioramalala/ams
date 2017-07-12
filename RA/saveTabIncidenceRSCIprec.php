<?php
	@session_start();
	$UTIL_ID=$_SESSION['id'];
	
	include '../connexion.php';

	$tabSelecter = $_POST['tabSelecter'];
	$cycle = $_POST['cycle'];

	$req0=$bdd->query('SELECT MISSION_ANNEE FROM tab_mission WHERE MISSION_ID ='.$_SESSION['idMission']);
	$res=$req0->fetch();
	$res2=$res["MISSION_ANNEE"]-1;
							
	$requete='SELECT * FROM tab_incidence_ra a,tab_mission b,tab_entreprise c WHERE CYCLE = "'.$cycle.'" AND b.ENTREPRISE_ID= c.ENTREPRISE_ID AND MISSION_ANNEE='.$res2;
	
	$req = $bdd->query($requete);
	
	$ligne = $req->fetch();
	

	if($ligne!=0){
		$update = $bdd->exec('UPDATE tab_incidence_ra SET UTIL_ID="'.$UTIL_ID.'",FONCTIONNEMENT="'.$tabSelecter[0].'",COMPTE="'.$tabSelecter[1].'" WHERE CYCLE = "'.$cycle.'" AND MISSION_ID='.$_SESSION['idMission']);
	}
	else{
		$insert = $bdd->exec('INSERT INTO tab_incidence_ra (FONCTIONNEMENT, COMPTE, CYCLE, MISSION_ID,UTIL_ID) VALUES ("'.$tabSelecter[0].'","'.$tabSelecter[1].'","'.$cycle.'","'.$_SESSION['idMission'].'","'.$UTIL_ID.'")');
	}
	
$req='INSERT INTO tab_incidence_ra (FONCTIONNEMENT, COMPTE, CYCLE, MISSION_ID,UTIL_ID) VALUES ("'.$tabSelecter[0].'","'.$tabSelecter[1].'","'.$cycle.'","'.$_SESSION['idMission'].'","'.$UTIL_ID.'")';

$file = '../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
	
$req2='UPDATE tab_incidence_ra SET UTIL_ID="'.$UTIL_ID.'",FONCTIONNEMENT="'.$tabSelecter[0].'",COMPTE="'.$tabSelecter[1].'" WHERE CYCLE = "'.$cycle.'" AND MISSION_ID='.$_SESSION['idMission'];
		
$file = '../fichier/save_mission/mission.sql';
file_put_contents($file, $req2.";", FILE_APPEND | LOCK_EX);
?>