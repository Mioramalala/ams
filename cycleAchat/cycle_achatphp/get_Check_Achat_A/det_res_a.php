<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse=$bdd->query('SELECT FONCT_ACHAT_A_RESULT FROM tab_fonction_achat_a WHERE MISSION_ID='.$mission_id);

$res=0;

while($donnees=$reponse->fetch()){
	if($donnees['FONCT_ACHAT_A_RESULT']==1){
		$res=1;
	}
}

echo $res;
?>