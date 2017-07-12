<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
$mission_id=@$_SESSION['idMission'];
include './../../../connexion.php';
  
 $listeChecked=Array();
 $listeChecked=$_POST['listId'];
   // $compt='';
   // $date='';
   // $jl='';
   // $ref='';
   // $lib='';
   // $debit='';
   // $crd='';
   // $sold='';
	// echo $listeChecked[0];
 $listEchan=$listeChecked[0];
 $ListEchan_tab=@split('[,]',$listEchan);
 for($i=0;$i<count($ListEchan_tab);$i++){
 
 /*********************************select*************************************/
 $sql="select BAL_AUX_COMPTE,BAL_AUX_LIBELLE,BAL_AUX_SOLDE from tab_bal_aux where BAL_AUX_ID=".$ListEchan_tab[$i]." AND MISSION_ID=".$mission_id ;
  
  echo $sql;
  
  $reponse=$bdd->query($sql);
  $donnees=$reponse->fetch();
  echo 'ity'.$donnees['BAL_AUX_COMPTE'].$donnees['BAL_AUX_LIBELLE'].$donnees['BAL_AUX_SOLDE']; 
   
 /********************************insertion************************************/
 $reqInsert=$bdd->exec('INSERT INTO  tab_echantillon_bal_aux(ECH_BAL_AUX_COMPTE,ECH_BAL_AUX_LIBELLE,ECH_BAL_AUX_SOLDE,ECH_BAL_AUX_CYCLE,MISSION_ID,UTIL_ID) VALUE 
("'.$donnees['BAL_AUX_COMPTE'].'","'.$donnees['BAL_AUX_LIBELLE'].'",'.$donnees['BAL_AUX_SOLDE'].',"frns","'.$mission_id.'","'.$UTIL_ID.'")');
 
$req='INSERT INTO  tab_echantillon_bal_aux(ECH_BAL_AUX_COMPTE,ECH_BAL_AUX_LIBELLE,ECH_BAL_AUX_SOLDE,ECH_BAL_AUX_CYCLE,MISSION_ID,UTIL_ID) VALUE 
("'.$donnees['BAL_AUX_COMPTE'].'","'.$donnees['BAL_AUX_LIBELLE'].'",'.$donnees['BAL_AUX_SOLDE'].',"frns","'.$mission_id.'","'.$UTIL_ID.'")';
$file = '../../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
  
 }
?>


