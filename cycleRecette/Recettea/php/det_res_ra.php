<?php
session_start();
$mission_id=$_SESSION['idMission'];
include '../../../connexion.php';


$reponse=$bdd->query('SELECT FONCT_A_RESULT FROM tab_fonct_a WHERE MISSION_ID='.$mission_id);
$res=0;

while($donnees=$reponse->fetch())
{
	if($donnees['FONCT_A_RESULT']==1){
		$res=1;
	}
}

echo $res;
?>