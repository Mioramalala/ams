<?php
function nettoyerRisqueSys($document, $tableau){
	foreach ($tableau as $domaine) {
	   $document->setValue('caractere'.$domaine, "");
     $document->setValue('exhaustivite'.$domaine, "");
     $document->setValue('realite'.$domaine, "");
     $document->setValue('propriete'.$domaine, "");
     $document->setValue('evaluation'.$domaine, "");
     $document->setValue('enregistrement'.$domaine, "");
     $document->setValue('imputation'.$domaine, "");
     $document->setValue('totalisation'.$domaine, "");
     $document->setValue('bonne'.$domaine, "");
     $document->setValue('risque'.$domaine, "");
	}
}

function nettoyerIncidence($document, $tableau){
   foreach ($tableau as $domaine) {
      $document->setValue('fonctionnementImmo'.$domaine, "");
      $document->setValue('compteImmo'.$domaine, "");
   }
}

function nettoyerSeuil($document, $tableau){
   foreach ($tableau as $domaine) {
      $document->setValue('seuil'.$domaine, "");
   }
}

function nettoyerSondage($document, $tableau){
   foreach ($tableau as $domaine) {
      $document->setValue('sondage'.$domaine, "");
   }
}

function nettoyerPlanif($document, $tableau){
   foreach ($tableau as $domaine) {
      $document->setValue('planification'.$domaine, "");
   }
}

function Ajout_base ($fichier,$session_utiliser,$ID_mission,$ID_Entreprise,$ID_Utilisateur) {
include "../connexionPDO.php";
    //===================================================================================================
      // AJOUTER INFORMATIONS DANS LA BASE tab_suivi_export_fichier
      //===================================================================================================
      $Date_sortie=date("Y-m-d");
      try{
          $res=$conx->prepare('INSERT INTO tab_suivi_export_fichier(Date_sortie,nom_fichier,session_utiliser,MISSION_ID,ENTREPRISE_ID,UTIL_ID)
          VALUES (:Date_sortie,:nom_fichier,:session_utiliser,:MISSION_ID,:ENTREPRISE_ID,:UTIL_ID )');
          $res->execute(array('Date_sortie'=>$Date_sortie,'nom_fichier'=>$fichier,'session_utiliser'=>$session_utiliser,'MISSION_ID'=>$ID_mission,'ENTREPRISE_ID'=>$ID_Entreprise,'UTIL_ID'=>$ID_Utilisateur ));
        }catch(exception $e){}          
        //=====================================================================================================
}

function get_Entreprise ($ID_mission){
    //include "../connex.php";

    $sqlNbrPo=db_connect("SELECT ENTREPRISE_ID  FROM  tab_mission WHERE MISSION_ID='".$ID_mission."' " );
      foreach ($sqlNbrPo as $val){
       $ID_entreprise = $val["ENTREPRISE_ID"];  
      }
    return $ID_entreprise;
  }

  //ENDRE L'UTILISATEUR
function get_ID_utilisateur($mail_utilisateur){
    //include "../connex.php";

    $get_ID_util=db_connect("SELECT UTIL_ID  FROM tab_utilisateur WHERE UTIL_LOGIN ='".$mail_utilisateur ."' ");
    foreach ($get_ID_util as $val){
    $ID_utilisateur =$val['UTIL_ID'];
    }
    return $ID_utilisateur;
}

  function getCollaborateurs($feuille, $case, $mission_id, $cycle){
    $collaborateurs = array();

    //$sql = "SELECT distinct(UTIL_NOM) FROM tab_rdc,tab_utilisateur WHERE tab_rdc.RDC_CYCLE='".$cycle."' 
    //and tab_rdc.UTIL_ID=tab_utilisateur.UTIL_ID and tab_rdc.MISSION_ID=".$mission_id;
    $sql = "SELECT `COLLAB_UTIL_NOM` FROM `tab_collaborateur` WHERE `COLLAB_STATUT`='actif' 
    AND COLLAB_MISSION_ID=".$mission_id;

    $rep = db_connect($sql); 

    foreach ($rep as $donnee){
        $utilID = $donnee['COLLAB_UTIL_NOM'];
        array_push($collaborateurs, $utilID);
    }

    $s_collab = implode($collaborateurs, ", ");
    $feuille->setCellValue($case, $s_collab);
  }
?>