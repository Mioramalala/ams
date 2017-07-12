<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
$mission_id=$_POST['mission_id'];
include '../../connexion.php';
	
$reponseDel=$bdd->exec('delete from tab_ra where RA_CYCLE="paie" AND MISSION_ID='.$mission_id);
	
?>