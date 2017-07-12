<?php
	include '../../connexion.php';
	$mission_id=$_POST['mission_id'];
	
	$reponse0=$bdd->query('select SYNTHESE_ID_RA,SYNTHESE from  tab_synthese_ra where MISSION_ID='.$mission_id.' AND SYNTHESE_OBJECTIF="immofi"');
	
	$donnees0=$reponse0->fetch();
	if($donnees0['SYNTHESE']!=""){
		echo $donnees0['SYNTHESE'];
	}
	else{
		$reponse = $bdd->query('SELECT CONCLUSION,MISSION_ID FROM  tab_conclusion_ra where MISSION_ID='.$mission_id.' AND CONCLUSION_OBJECTIF="immofi"' );
		
		$donnees=$reponse->fetch();
	
		if($donnees['CONCLUSION']==""){
			echo utf8_encode('Rédiger votre commentaire ici');
		}
		else{		
			echo $donnees['CONCLUSION'];
		}
		
	}

?>