<?php
@session_start();
include '../../connexion.php';
$mission_id=@$_SESSION['idMission'];
$cycles=$_POST['cycle'];
	$rep=$bdd->query('SELECT VALIDER FROM tab_planif_gen_ra where PLANIF_CYCLE="'.$cycles.'" and MISSION_ID='.$mission_id);
	$data=$rep->fetch();
	$nb=$data['VALIDER']; 
	if($nb==1){echo "disable";}
/*$rep=$bdd->query('SELECT count(*) AS COMPTE FROM tab_planification_ra  
				WHERE PLANIF_CYCLE="validation" AND MISSION_ID='.$mission_id);
				$data=$rep->fetch();
$nb=$data['COMPTE']; 
*/
//$rep=$bdd->query('SELECT VALIDER FROM tab_planif_gen_ra where PLANIF_CYCLE="'.$cycle.'" and MISSION_ID='.$mission_id);


?>