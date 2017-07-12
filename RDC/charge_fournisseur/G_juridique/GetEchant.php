<?php
 @session_start();
 $mission_id=@$_SESSION['idMission'];
 $UTIL_ID=@$_SESSION['UTIL_ID'];
 
 include '../../../connexion.php';
  
 $ListEchan_tab=Array();
 $ListEchan_tab=$_POST['listId'];
   
 //$listEchan=$listeChecked[0];
// $ListEchan_tab=@split('[,]',$listEchan);
 //echo  $ListEchan_tab;
 for($i=0;$i<count($ListEchan_tab);$i++){
 
 /*********************************select*************************************/
 $sql="select IMPORT_COMPTES,IMPORT_INTITULES,IMPORT_DEBIT,IMPORT_CREDIT,IMPORT_SOLDE from 	tab_importer where IMPORT_ID=".$ListEchan_tab[$i]." AND MISSION_ID=".$mission_id ;
  
  //echo $sql;
  $reponse=$bdd->query($sql) or die(mysql_error());
  $donnees=$reponse->fetch();
  
 /********************************insertion************************************/
 // echo $ListEchan_tab[$i];
  $reqInsert=$bdd->exec("INSERT INTO tab_echantillon_bl (compt_ech_bl,libelle_ech_bl,debit_ech_bl,crd_ech_bl,sold_ech_bl, BL_GEN_CYCLE,id_mission,UTIL_ID) VALUE ('".$donnees['IMPORT_COMPTES']."','".$donnees['IMPORT_INTITULES']."','".$donnees['IMPORT_DEBIT']."','".$donnees['IMPORT_CREDIT']."','".$donnees['IMPORT_SOLDE']."','F- Charges Fournisseurs','".$mission_id."','".$UTIL_ID."')") or die(mysql_error());
 
  $req1="INSERT INTO tab_echantillon_bl (compt_ech_bl,libelle_ech_bl,debit_ech_bl,crd_ech_bl,sold_ech_bl, BL_GEN_CYCLE,id_mission,UTIL_ID) VALUE ('".$donnees['IMPORT_COMPTES']."','".$donnees['IMPORT_INTITULES']."','".$donnees['IMPORT_DEBIT']."','".$donnees['IMPORT_CREDIT']."','".$donnees['IMPORT_SOLDE']."','F- Charges Fournisseurs','".$mission_id."','".$UTIL_ID."')";
		print($req1);
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
  
 }
?>


