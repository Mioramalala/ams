<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
$mission_id=$_SESSION['idMission'];

include '../../connexion.php';
   	$enregistrer_tableau_import1=array();
	$enregistrer_tableau_import2=array();
	$enregistrer_tableau_import3=array();
	$enregistrer_tableau_import4=array();
	$enregistrer_tableau_import5=array();
	$enregistrer_tableau_import6=array();
	$enregistrer_tableau_import7=array();
	$enregistrer_tableau_import8=array();
	$enregistrer_tableau_import9=array();
	


	    $enregistrer_tableau_import1=$_POST['import_compteN'];
		$enregistrer_tableau_import2=$_POST['import_intituleN'];
		$enregistrer_tableau_import3=$_POST['import_debitN'];
		$enregistrer_tableau_import4=$_POST['import_creditN'];
		$enregistrer_tableau_import5=$_POST['import_soldeN'];
		$enregistrer_tableau_import6=$_POST['import_soldeN1'];
		$enregistrer_tableau_import7=$_POST['import_variation'];
		$enregistrer_tableau_import8=$_POST['pourcentages'];
		$enregistrer_tableau_import9=$_POST['commentaire'];

		
	


		$nbrres=count($enregistrer_tableau_import1);
		$req="";
		for($i=0;$i<$nbrres;$i++)
		{


		   				$rep=$bdd->query('SELECT COUNT(RA_ID) AS COMPTE, RA_ID FROM tab_ra WHERE MISSION_ID='.$mission_id.' AND RA_COMPTE='.$enregistrer_tableau_import1[$i]);
						$res=$rep->fetch();
						$compte = $res['COMPTE'];
						$id = $res['RA_ID'];
						if($compte==0)
						{
							$reponse=$bdd->exec('INSERT INTO tab_ra(RA_COMPTE,RA_LIBELLE,RA_D,RA_C,RA_SOLDE_N,RA_SOLDE_N1,RA_VARIATION,RA_POURCENTAGE,RA_COMMENTAIRE,MISSION_ID,	RA_CYCLE,UTIL_ID) VALUES ("'.$enregistrer_tableau_import1[$i].'","'.$enregistrer_tableau_import2[$i].'","'.$enregistrer_tableau_import3[$i].'", "'.$enregistrer_tableau_import4[$i].'","'.$enregistrer_tableau_import5[$i].'","'.$enregistrer_tableau_import6.'", "'.$enregistrer_tableau_import7.'","'.$enregistrer_tableau_import8.'","'.$enregistrer_tableau_import9[$i].'","'.$mission_id.'","vente","'.$UTIL_ID.'")');
							$req=$req.'INSERT INTO tab_ra(RA_COMPTE,RA_LIBELLE,RA_D,RA_C,RA_SOLDE_N,RA_SOLDE_N1,RA_VARIATION,RA_POURCENTAGE,RA_COMMENTAIRE,MISSION_ID,	RA_CYCLE,UTIL_ID) VALUES ("'.$enregistrer_tableau_import1[$i].'","'.$enregistrer_tableau_import2[$i].'","'.$enregistrer_tableau_import3[$i].'", "'.$enregistrer_tableau_import4[$i].'","'.$enregistrer_tableau_import5[$i].'","'.$enregistrer_tableau_import6.'", "'.$enregistrer_tableau_import7.'","'.$enregistrer_tableau_import8.'","'.$enregistrer_tableau_import9[$i].'","'.$mission_id.'","vente","'.$UTIL_ID.'");';
							
						} else
						{
							$reponse=$bdd->exec('UPDATE tab_ra SET RA_COMMENTAIRE="'.$enregistrer_tableau_import9[$i].'",UTIL_ID='.$UTIL_ID.' WHERE	MISSION_ID='.$mission_id.' AND RA_ID='.$id);
											
						}	


		}
		  	//# code...
		 
			
		$file = '../../fichier/save_mission/mission.sql';
		file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
	
?>