<?php
 @session_start();
 $mission_id=@$_SESSION['idMission'];
 include '../../../connexion.php';
 $UTIL_ID=$_SESSION['id'];
  
 // $listeChecked=Array();
 // $listeChecked=$_POST['listId'];
 $ListEchan_tab=Array();
 $ListEchan_tab=$_POST['listId'];
  
// echo $listeChecked[0];
 // $listEchan=$listeChecked[0];
 // $ListEchan_tab=@split('[,]',$listEchan);
 for($i=0;$i<count($ListEchan_tab);$i++){
 
 /*********************************select*************************************/
 $sql="select BAL_AUX_COMPTE ,BAL_AUX_LIBELLE,BAL_AUX_SOLDE
  from  tab_bal_aux where BAL_AUX_ID=".$ListEchan_tab[$i]." AND MISSION_ID=".$mission_id ;
  
  echo $sql;
  
  $reponse=$bdd->query($sql);
  $donnees=$reponse->fetch();
 // echo 'ity'.$donnees['BAL_AUX_COMPTE'].$donnees['BAL_AUX_LIBELLE'].$donnees['BAL_AUX_SOLDE']; 
   
 /********************************insertion************************************/
  echo $ListEchan_tab[$i];
  $reqInsert=$bdd->exec("INSERT INTO tab_echantillon_bal_aux (ECH_BAL_AUX_COMPTE, ECH_BAL_AUX_LIBELLE,ECH_BAL_AUX_SOLDE,ECH_BAL_AUX_CYCLE,MISSION_ID,UTIL_ID) VALUE ('".$donnees['BAL_AUX_COMPTE']."','".$donnees['BAL_AUX_LIBELLE']."','".$donnees['BAL_AUX_SOLDE']."','G- Produits Clients',".$mission_id.",".$UTIL_ID.")");
  
  $req1="INSERT INTO tab_echantillon_bal_aux (ECH_BAL_AUX_COMPTE, ECH_BAL_AUX_LIBELLE,ECH_BAL_AUX_SOLDE,ECH_BAL_AUX_CYCLE,MISSION_ID,UTIL_ID) VALUE ('".$donnees['BAL_AUX_COMPTE']."','".$donnees['BAL_AUX_LIBELLE']."','".$donnees['BAL_AUX_SOLDE']."','G- Produits Clients',".$mission_id.",".$UTIL_ID.")";
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
  
 }
?>


