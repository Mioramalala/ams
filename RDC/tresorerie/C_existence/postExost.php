<?php
	@session_start();
	$mission_id=@$_SESSION['idMission'];
	$UTIL_ID=$_SESSION['id'];
	include '../../../connexion.php';
		
	$listeChecked=Array();
	$listeChecked=$_POST['listId'];
		
	$listEchan=$listeChecked[0];
	$ListEchan_tab=@split('[,]',$listEchan);
	for($i=0;$i<count($ListEchan_tab);$i++){
		echo $ListEchan_tab[$i];
	/*********************************select*************************************/
	$sql="select IMPORT_ID,	IMPORT_COMPTES ,IMPORT_INTITULES,
				IMPORT_DEBIT,IMPORT_CREDIT,IMPORT_SOLDE from tab_importer where IMPORT_ID=".$ListEchan_tab[$i]." AND MISSION_ID=".$mission_id ;
		// echo $sql;
		
		$reponse=$bdd->query($sql);
		$donnees=$reponse->fetch();
		//echo 'ity'.$donnees['GL_GEN_COMPTES'].$donnees['GL_GEN_DATE'].$donnees['GL_GEN_LIBELLE'].$donnees['GL_GEN_CREDIT'];	
			
	/********************************insertion************************************/
	// echo $ListEchan_tab[$i];
	$cycle="E- Tresoreries";
		$reqInsert=$bdd->exec("INSERT INTO  tab_echantillon_bl ( compt_ech_bl,libelle_ech_bl,
		debit_ech_bl,crd_ech_bl,sold_ech_bl, BL_GEN_CYCLE,id_mission,UTIL_ID) VALUE ('".$donnees['IMPORT_COMPTES']."','".$donnees['IMPORT_INTITULES']."','".$donnees['IMPORT_DEBIT']."','".$donnees['IMPORT_CREDIT']."','".$donnees['IMPORT_SOLDE']."','".$cycle."',".$mission_id.",".$UTIL_ID.")");
		
		$req="INSERT INTO  tab_echantillon_bl ( compt_ech_bl,libelle_ech_bl,
		debit_ech_bl,crd_ech_bl,sold_ech_bl, BL_GEN_CYCLE,id_mission,UTIL_ID) VALUE ('".$donnees['IMPORT_COMPTES']."','".$donnees['IMPORT_INTITULES']."','".$donnees['IMPORT_DEBIT']."','".$donnees['IMPORT_CREDIT']."','".$donnees['IMPORT_SOLDE']."','".$cycle."',".$mission_id.")";
		
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
	}
?>