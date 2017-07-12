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
 $sql="select BAL_AUX_COMPTE,BAL_AUX_LIBELLE,BAL_AUX_SOLDE
  from tab_bal_aux where BAL_AUX_ID=".$ListEchan_tab[$i]." AND MISSION_ID=".$mission_id ;
  
  echo $sql;
  $reponse=$bdd->query($sql) or die(mysql_error());
  $donnees=$reponse->fetch();
  
 /********************************insertion************************************/
 // echo $ListEchan_tab[$i];
  $reqInsert=$bdd->exec("INSERT INTO tab_echantillon_bal_aux (ECH_BAL_AUX_COMPTE,ECH_BAL_AUX_LIBELLE,ECH_BAL_AUX_SOLDE,	ECH_BAL_AUX_CYCLE,MISSION_ID,UTIL_ID) VALUE ('".$donnees['BAL_AUX_COMPTE']."','".$donnees['BAL_AUX_LIBELLE']."','".$donnees['BAL_AUX_SOLDE']."','F- Charges Fournisseurs','".$mission_id."','".$UTIL_ID."')") or die(mysql_error());

  $req1="INSERT INTO tab_echantillon_bal_aux (ECH_BAL_AUX_COMPTE,ECH_BAL_AUX_LIBELLE,ECH_BAL_AUX_SOLDE,	ECH_BAL_AUX_CYCLE,MISSION_ID,UTIL_ID) VALUE ('".$donnees['BAL_AUX_COMPTE']."','".$donnees['BAL_AUX_LIBELLE']."','".$donnees['BAL_AUX_SOLDE']."','F- Charges Fournisseurs','".$mission_id."','".$UTIL_ID."')";
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
  
 }
?>


