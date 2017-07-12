<?php
	@session_start();
	$mission_id=$_SESSION['idMission'];
	include '../../connexion.php';
	
	$sql1='SELECT CONCLUSION,MISSION_ID FROM  tab_conclusion_ra where MISSION_ID='.$mission_id.' AND CONCLUSION_OBJECTIF="charge"';
	$reponse = $bdd->query($sql1);
		
		$donnees=$reponse->fetch();
	
		if($donnees['CONCLUSION']!=""){
			 echo $donnees['CONCLUSION'];
			//print "conclusion no avoka";
		}
		/*
		else{
			$reponse0=$bdd->query('select SYNTHESE_ID_RA,SYNTHESE from  tab_synthese_ra where MISSION_ID='.$mission_id.' AND SYNTHESE_OBJECTIF="charge"');
			$donnees0=$reponse0->fetch();
				if($donnees0['SYNTHESE']!=""){
					echo $donnees0['SYNTHESE'];
				}
				else{
						//echo utf8_encode('Rédiger votre commentaire ici');
					}
	
			}
		*/	
	
?>