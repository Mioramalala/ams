<?php
@session_start();
$UTIL_ID=$_SESSION['id'];

include '../../connexion.php';
	$enregistrer_tableau_import1=$_POST['a'];
	$enregistrer_tableau_import2=$_POST['b'];
	$enregistrer_tableau_import3=$_POST['c'];
	$enregistrer_tableau_import4=$_POST['d'];
	$enregistrer_tableau_import5=$_POST['e'];
	$enregistrer_tableau_import6=$_POST['f'];
	$enregistrer_tableau_import7=$_POST['g'];
	$enregistrer_tableau_import8=$_POST['h'];
	$enregistrer_tableau_import9=$_POST['i'];
	$mission_id=$_POST['j'];
	
	$rep=$bdd->query('SELECT COUNT(RA_ID) AS COMPTE, RA_ID FROM tab_ra WHERE MISSION_ID='.$mission_id.' AND RA_COMPTE='.$enregistrer_tableau_import1);
	$res=$rep->fetch();
	
	$compte = $res['COMPTE'];
	$id = $res['RA_ID'];

	if($compte==0){
		$reponse=$bdd->exec('INSERT INTO tab_ra(RA_COMPTE,RA_LIBELLE,RA_D,RA_C,RA_SOLDE_N,RA_SOLDE_N1,RA_VARIATION,RA_POURCENTAGE,RA_COMMENTAIRE,MISSION_ID,	RA_CYCLE,UTIL_ID) VALUES ("'.$enregistrer_tableau_import1.'","'.$enregistrer_tableau_import2.'","'.$enregistrer_tableau_import3.'", "'.$enregistrer_tableau_import4.'","'.$enregistrer_tableau_import5.'","'.$enregistrer_tableau_import6.'", "'.$enregistrer_tableau_import7.'","'.$enregistrer_tableau_import8.'","'.$enregistrer_tableau_import9.'","'.$mission_id.'","immo","'.$UTIL_ID.'")');
		$req='INSERT INTO tab_ra(RA_COMPTE,RA_LIBELLE,RA_D,RA_C,RA_SOLDE_N,RA_SOLDE_N1,RA_VARIATION,RA_POURCENTAGE,RA_COMMENTAIRE,MISSION_ID,	RA_CYCLE,UTIL_ID) VALUES ("'.$enregistrer_tableau_import1.'","'.$enregistrer_tableau_import2.'","'.$enregistrer_tableau_import3.'", "'.$enregistrer_tableau_import4.'","'.$enregistrer_tableau_import5.'","'.$enregistrer_tableau_import6.'", "'.$enregistrer_tableau_import7.'","'.$enregistrer_tableau_import8.'","'.$enregistrer_tableau_import9.'","'.$mission_id.'","immo","'.$UTIL_ID.'")';
	} else {
		$reponse=$bdd->exec('UPDATE tab_ra SET 
			RA_LIBELLE="'.$enregistrer_tableau_import2.'",
			RA_D="'.$enregistrer_tableau_import3.'",
			RA_C="'.$enregistrer_tableau_import4.'",
			RA_SOLDE_N="'.$enregistrer_tableau_import5.'",
			RA_SOLDE_N1="'.$enregistrer_tableau_import6.'",
			RA_VARIATION="'.$enregistrer_tableau_import7.'",
			RA_POURCENTAGE="'.$enregistrer_tableau_import8.'",
			RA_COMMENTAIRE="'.$enregistrer_tableau_import9.'",	
			RA_CYCLE="immo",
			UTIL_ID='.$UTIL_ID.'
			WHERE
			MISSION_ID='.$mission_id.' AND RA_ID='.$id);


	}

	$file = '../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
	$bdd->close();
?>