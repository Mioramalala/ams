<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];
$cycleName=$_POST['cycleName'];

//-----------Get the enterprise id-------------------------//

$reponse0=$bdd->query('SELECT ENTREPRISE_ID FROM tab_mission WHERE MISSION_ID='.$mission_id);

$donnees0=$reponse0->fetch();

$eseId=$donnees0['ENTREPRISE_ID'];

//-----------------------Get the 11 number for the tab_fonct_a------------------//

$reponse=$bdd->query('SELECT COUNT(FONCT_A_ID) AS COMPTE FROM tab_fonct_a WHERE MISSION_ID='.$mission_id.' AND FONCT_A_NOM="'.$cycleName.'"');

$donnees=$reponse->fetch();

$cpt=$donnees['COMPTE'];

//------------------------Comdare the poste_cycle_id in tab_fonct_a and tab_poste_cycle----//

$reponse1=$bdd->query('SELECT POSTE_CYCLE_ID FROM tab_poste_cycle WHERE POSTE_CYCLE_NOM="'.$cycleName.'" AND MISSION_ID='.$mission_id.' AND ENTREPRISE_ID='.$eseId);

$result=1;

$test=1;

while($donnees1=$reponse1->fetch()){

	$reponse2=$bdd->query('SELECT POSTE_CYCLE_ID FROM tab_fonct_a WHERE MISSION_ID='.$mission_id.' AND FONCT_A_NOM="'.$cycleName.'"');
	
	while($donnees2=$reponse2->fetch()){		
		if($donnees1['POSTE_CYCLE_ID']==$donnees2['POSTE_CYCLE_ID']){
			$test=0;
		}
	}
	if($test==1){
		$result=0;
		break;
	}	
	$test=1;	
}

if($cpt==11 && $result==1){
	echo '1';
}
?>