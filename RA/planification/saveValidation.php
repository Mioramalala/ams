<?php
	@session_start();

	include '../../connexion.php';
	$mission_id=@$_SESSION['idMission'];
	$UTIL_ID=$_SESSION['id'];
	$cycle=$_POST['cycle'];


	/*$rep=$bdd->query('SELECT count(*) AS COMPTE FROM tab_planification_ra  
					WHERE PLANIF_CYCLE="validation" AND MISSION_ID='.$mission_id);
	$data=$rep->fetch();
	$nb=$data['COMPTE']; 

	if($nb==0){
		$reponse=$bdd->exec('INSERT INTO tab_planification_ra(PLANIF_CYCLE,MISSION_ID,UTIL_ID) VALUES ("validation",'.$mission_id.','.$UTIL_ID.')');
	}
	
	echo "Valide";*/
	$rep=$bdd->query('SELECT VALIDER FROM tab_planif_gen_ra where PLANIF_CYCLE="'.$cycle.'" and MISSION_ID='.$mission_id);
	$data=$rep->fetch();
	$nb=$data['VALIDER']; 
	if($nb==1){echo "Valide";}

?>