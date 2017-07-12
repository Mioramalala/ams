<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse=$bdd->query('SELECT FONCT_A_RESULT FROM tab_fonct_a WHERE MISSION_ID='.$mission_id.' and FONCT_A_NOM="immo"');

$res=0;

while($donnees=$reponse->fetch()){
	if($donnees['FONCT_A_RESULT']==1){
		$res=1;
	}
}

echo $res;
?>