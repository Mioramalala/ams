<?php
	include '../../connexion.php';
	$mission_id=$_POST['mission_id'];
	$sql1='SELECT CONCLUSION,MISSION_ID FROM  tab_conclusion_ra where MISSION_ID='.$mission_id.' AND CONCLUSION_OBJECTIF="immofi"';
	$reponse = $bdd->query($sql1);
		
		$donnees=$reponse->fetch();
	
		if($donnees['CONCLUSION']!=""){
			 echo $donnees['CONCLUSION'];
			//print "conclusion no avoka";
		}
		/*else{
			$reponse0=$bdd->query('select SYNTHESE_ID_RA,SYNTHESE from  tab_synthese_ra where MISSION_ID='.$mission_id.' AND SYNTHESE_OBJECTIF="immofi"');
			$donnees0=$reponse0->fetch();
				if($donnees0['SYNTHESE']!=""){
					echo $donnees0['SYNTHESE'];
					// print "synthèse no avoka";
					// print $sql1;
				}
				else{
						// echo utf8_encode('Rédiger votre commentaire ici');
					}
	
			}*/
	
?>