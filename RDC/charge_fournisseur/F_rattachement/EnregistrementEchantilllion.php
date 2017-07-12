<?php
 @session_start();
 $mission_id=@$_SESSION['idMission'];
 $UTIL_ID=@$_SESSION['UTIL_ID'];
 
include '../../../connexion.php';

if(isset($_POST["comptes"]) && isset($_POST["cycle"])) {
 $comptes = $_POST["comptes"];
 $cycle = "F- Charges Fournisseurs";


 $comptes_a_enregistrer = explode('/', $comptes);

 $reponse=$bdd->query(
    "delete from tab_ehantillon_gl where GL_GEN_CYCLE='".$cycle."'  AND id_mission=".$mission_id
  ) or die(mysql_error());

 foreach ($comptes_a_enregistrer as $compte_a_enregistrer)
  {
    $compte_a_enregistrer_details = explode('-', $compte_a_enregistrer);
    $table = $compte_a_enregistrer_details[0];
    $id    = $compte_a_enregistrer_details[1];

    $i = intval($table);

    if($i == 1) 
    {
          $sql = "select GL_GEN_COMPTES AS compte,GL_GEN_DATE AS date,GL_GEN_JL AS jl,GL_GEN_REF AS ref, GL_GEN_LIBELLE AS libelle,
        GL_GEN_DEBIT AS debit,GL_GEN_CREDIT AS credit,GL_GEN_SOLDE AS solde,GL_GEN_CYCLE AS cycle
         from tab_gl_gen
          where GL_GEN_CYCLE='".$cycle."' AND GL_GEN_ID = ".$id." AND MISSION_ID=".$mission_id;
    } else
     {
         $sql = "select GL_GENC".$i."_COMPTES AS compte,GL_GENC".$i."_DATE AS date,GL_GENC".$i."_JL AS jl,GL_GENC".$i."_REF AS ref, GL_GENC".$i."_LIBELLE AS libelle,
          GL_GENC".$i."_DEBIT AS debit,GL_GENC".$i."_CREDIT AS credit,GL_GENC".$i."_SOLDE AS solde,GL_GENC".$i."_CYCLE AS cycle 

      from tab_gl_genc".$i."
       where GL_GENC".$i."_CYCLE='".$cycle."' AND GL_GENC".$i."_ID = ".$id." AND MISSION_ID=".$mission_id;
    }

   $reponse=$bdd->query($sql) or die(mysql_error());

   if($donnees=$reponse->fetch())
    {
      $req1="INSERT INTO  tab_ehantillon_gl (compt_ech_gl, date_ech_gl, journal_ech_gl, ref_ech_gl, libelle_ech_gl, debit_ech_gl, crd_ech_gl, sold_ech_gl, GL_GEN_CYCLE, id_mission, UTIL_ID) 
              VALUES('".$donnees['compte']."','".$donnees['date']."','".$donnees['jl']."','".$donnees['ref']."','".$donnees['libelle']."','".$donnees['debit']."','".$donnees['credit']."','".$donnees['solde']."','$cycle','".$mission_id."','".$UTIL_ID."')";
        
      $reqInsert=$bdd->query($req1);
      
      $file = $_SERVER["DOCUMENT_ROOT"]."/fichier/save_mission/mission.sql";
      file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);

   }
 }

} else {
}

/*
 $ListEchan_tab=Array();
 $ListEchan_tab=$_POST['listId'];

 for($i=0;$i<count($ListEchan_tab);$i++){
 
 //*********************************select*************************************
 $sql="select GL_GEN_COMPTES,GL_GEN_DATE,GL_GEN_JL,GL_GEN_REF,GL_GEN_LIBELLE,
  GL_GEN_DEBIT,GL_GEN_CREDIT,GL_GEN_SOLDE
  from tab_gl_gen where GL_GEN_ID=".$ListEchan_tab[$i]." AND MISSION_ID=".$mission_id ;
  
  echo $sql;
  $reponse=$bdd->query($sql) or die(mysql_error());
  $donnees=$reponse->fetch();
  //echo 'ity'.$donnees['GL_GEN_COMPTES'].$donnees['GL_GEN_DATE'].$donnees['GL_GEN_LIBELLE'].$donnees['GL_GEN_CREDIT']; 
  
 // ********************************insertion************************************
 // echo $ListEchan_tab[$i];

  $req1="INSERT INTO  tab_ehantillon_gl ( compt_ech_gl,date_ech_gl,journal_ech_gl,ref_ech_gl,libelle_ech_gl,
  debit_ech_gl,crd_ech_gl,sold_ech_gl, GL_GEN_CYCLE,id_mission,UTIL_ID) VALUE ('".$donnees['GL_GEN_COMPTES']."','".$donnees['GL_GEN_DATE']."','".$donnees['GL_GEN_JL']."','".$donnees['GL_GEN_REF']."','".$donnees['GL_GEN_LIBELLE']."','".$donnees['GL_GEN_DEBIT']."','".$donnees['GL_GEN_CREDIT']."','".$donnees['GL_GEN_SOLDE']."','B- Immobilisations incorporelles et corporelles',".$mission_id.",".$UTIL_ID.")";
    
  $reqInsert=$bdd->exec($req1);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
  
 }
 */
?>


