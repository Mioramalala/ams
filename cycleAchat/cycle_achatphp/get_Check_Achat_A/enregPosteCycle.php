<?php

include '../../../connexion.php';

$text=$_POST['text'];
$mission_id=$_POST['mission_id'];            
$entrepiseId=$_POST['entrepiseId'];
$UTIL_ID=$_SESSION['id'];

$tab=explode(",",$text);

// echo $tab[0];

//Get the poste_cle_id in the tab_poste_cle with enterprise id and job name

for($i=0; $i<count($tab); $i++){
	
	$reponse1=$bdd->query('SELECT POSTE_CLE_ID FROM tab_poste_cycle WHERE POSTE_CLE_ID='.$tab[$i]);
	
	$donnees1=$reponse1->fetch();
	
	if(!$reponse1) echo 'SELECT POSTE_CLE_ID FROM tab_poste_cycle WHERE POSTE_CLE_ID='.$tab[$i];
	
	$posteCleId=$donnees1['POSTE_CLE_ID']; 
	
	if($posteCleId==0){	
		$reponse2=$bdd->exec('INSERT INTO tab_poste_cycle (POSTE_CYCLE_NOM, POSTE_CLE_ID, MISSION_ID, ENTREPRISE_ID, UTIL_ID) VALUE ("achat",'.$tab[$i].','.$mission_id.','.$entrepiseId.','.$UTIL_ID.')');

	}
}
?>