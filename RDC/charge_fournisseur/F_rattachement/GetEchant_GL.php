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
 
 /*********************************select*************************************/
 $sql="select GL_GEN_COMPTES,GL_GEN_DATE,GL_GEN_JL,GL_GEN_REF,GL_GEN_LIBELLE,
  GL_GEN_DEBIT,GL_GEN_CREDIT,GL_GEN_SOLDE
  from tab_gl_gen where GL_GEN_ID=".$ListEchan_tab[$i]." AND MISSION_ID=".$mission_id ;
  
  echo $sql;
  
  $reponse=$bdd->query($sql);
  $donnees=$reponse->fetch();
  echo 'ity'.$donnees['GL_GEN_COMPTES'].$donnees['GL_GEN_DATE'].$donnees['GL_GEN_LIBELLE'].$donnees['GL_GEN_CREDIT']; 
   
 /********************************insertion************************************/
 // echo $ListEchan_tab[$i];
 $requete1='INSERT INTO  tab_ehantillon_gl ( compt_ech_gl,date_ech_gl,journal_ech_gl,ref_ech_gl,libelle_ech_gl,
  debit_ech_gl,crd_ech_gl,sold_ech_gl, GL_GEN_CYCLE,id_mission,UTIL_ID) VALUE ("'.$donnees['GL_GEN_COMPTES'].'","'.$donnees['GL_GEN_DATE'].'","'.$donnees['GL_GEN_JL'].'","'.$donnees['GL_GEN_REF'].'","'.$donnees['GL_GEN_LIBELLE'].'","'.$donnees['GL_GEN_DEBIT'].'","'.$donnees['GL_GEN_CREDIT'].'","'.$donnees['GL_GEN_SOLDE'].'","F- Charges Fournisseurs",'.$_SESSION['idMission'].','.$UTIL_ID.')';
  $reqInsert=$bdd->exec($requete1);
  $file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $requete1.";", FILE_APPEND | LOCK_EX);

 }
?>


