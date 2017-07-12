<?php
include "../connex.php";
require_once 'class_word/PHPWord.php';
require_once 'recuperation_informations.php';
require_once 'fonctions_rsci.php';
$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('Template_word/rsci_recap.docx');

//INITIALISATION DATE DE GENERATION EXPORT
$DATE_GENERATION = date("d-m-Y");

    if(isset($_SESSION["user"])){
            $session_utiliser=$_SESSION["user"];
            $ID_mission =$_SESSION['idMission'];
            $ID_Entreprise =get_Entreprise ($ID_mission);
            $ID_Utilisateur =get_ID_utilisateur($session_utiliser);
            }else{
            //$session_utiliser="Utilisateur";
            $session_utiliser= $_SESSION['idMission'];
            $ID_mission =$_SESSION['idMission'];
            $ID_Entreprise= get_Entreprise ($ID_mission);
            $ID_Utilisateur =get_ID_utilisateur($session_utiliser);
            }

//RECUPERATION NOM CLIENT, DATE DE GENERATION, DATE DE CLOTURE ET NOM SUPERVISEUR DE L'ENTREPRISE BY NIAINA
$document->setValue('nomClient', utf8_decode($nomEntreprise));
$document->setValue('dateCloture', $dateClotureMission);
$document->setValue('dateGeneration', $DATE_GENERATION);
//NOM SUPERVISEUR
$sqlSuperviseur = 'SELECT * FROM tab_superviseur WHERE MISSION_ID = '.$_SESSION['idMission'];
$reqSuperviseur = $bdd->query($sqlSuperviseur);
$tabSuperviseur = $reqSuperviseur->fetch();
$nom = $tabSuperviseur['SUPERVISEUR_NOM'];
$document->setValue('nomSuperviseur', $nom);

//RECUPERATION CYCLE, RISQUE ET SYNTHESE DE L'ENTREPRISE BY NIAINA
$sqlSyntheseRsci = 'SELECT * FROM tab_synthese_rsci WHERE MISSION_ID='.$_SESSION['idMission'];
$repSynthese = $bdd->query($sqlSyntheseRsci);  

while($donnee = $repSynthese->fetch())
{
    //Tresorerie
    if ($donnee['CYCLE'] == "tresorerie") {
        $document->setValue('risqueTresorerie', utf8_decode($donnee['RISQUE']));
        $document->setValue('commentTresorerie', utf8_decode($donnee['SYNTHESE']));
    }
    
    //Achats
    if ($donnee['CYCLE'] == "achat") {
        $document->setValue('risqueAchats', utf8_decode($donnee['RISQUE']));
        $document->setValue('commentAchats', utf8_decode($donnee['SYNTHESE']));
    }
    
    //Immobilisations
    if ($donnee['CYCLE'] == "immobilisation") {        
        $document->setValue('risqueImmobilisations', utf8_decode($donnee['RISQUE']));
        $document->setValue('commentImmobilisations', utf8_decode($donnee['SYNTHESE']));
    }
    
    //Stock
    if ($donnee['CYCLE'] == "stock") {        
        $document->setValue('risqueStock', utf8_decode($donnee['RISQUE']));
        $document->setValue('commentStock', utf8_decode($donnee['SYNTHESE']));
    }
        
    //Ventes
    if ($donnee['CYCLE'] == "vente") {        
        $document->setValue('risqueVentes', utf8_decode($donnee['RISQUE']));
        $document->setValue('commentVentes', utf8_decode($donnee['SYNTHESE']));
    }
        
    //Sous traitance
    if ($donnee['CYCLE'] == "sous_traitance") {        
        $document->setValue('risqueSousTraitance', utf8_decode($donnee['RISQUE']));
        $document->setValue('commentSousTraitance', utf8_decode($donnee['SYNTHESE']));
    }
        
    //Paie
    if ($donnee['CYCLE'] == "paie_personnel") {        
        $document->setValue('risquePaie', $donnee['RISQUE']);
        $document->setValue('commentPaie', $donnee['SYNTHESE']);
    }
}
//FIN RECUPERATION BY NIAINA


// NETTOYAGE
        $document->setValue('risqueTresorerie', "");
        $document->setValue('commentTresorerie', "");
        $document->setValue('risqueAchats', "");
        $document->setValue('commentAchats', "");
        $document->setValue('risqueImmobilisations', "");
        $document->setValue('commentImmobilisations', "");
        $document->setValue('risqueStock', "");
        $document->setValue('commentStock', "");
        $document->setValue('risqueVentes', "");
        $document->setValue('commentVentes', "");
        $document->setValue('risqueSousTraitance', "");
        $document->setValue('commentSousTraitance', "");        
        $document->setValue('risquePaie', "");
        $document->setValue('commentPaie', "");
/*
$fichier = 'RSCI_SYNTHESE (' . $DATE_GENERATION . ').docx';
if (file_exists($fichier)) {
    unlink($fichier);
    $document->save('../Sauvegarde_sortie/Word/RSCI_SYNTHESE (' . $DATE_GENERATION . ').docx');
} else {
    $document->save('../Sauvegarde_sortie/Word/RSCI_SYNTHESE (' . $DATE_GENERATION . ').docx');
}
*/

$fichier ='RSCI_SYNTHESE('.$DATE_GENERATION.').docx';
   if( file_exists ($fichier)){
        unlink($fichier);
        $document->save('../Sauvegarde_sortie/Word/RSCI_SYNTHESE('.$DATE_GENERATION.').docx');
            //===================================================================================================
            // AJOUTER INFORMATIONS DANS LA BASE tab_suivi_export_fichier
            //===================================================================================================
            $fichier ='RSCI_Systeme_information('.$DATE_GENERATION.').docx';
                Ajout_base ($fichier,$session_utiliser); 
            //=====================================================================================================
        }else{
        $document->save('../Sauvegarde_sortie/Word/RSCI_SYNTHESE('.$DATE_GENERATION.').docx');
           //===================================================================================================
            // AJOUTER INFORMATIONS DANS LA BASE tab_suivi_export_fichier
            //===================================================================================================
                Ajout_base ($fichier,$session_utiliser,$ID_mission,$ID_Entreprise,$ID_Utilisateur); 
            //=====================================================================================================
        }

echo '<a id="icone_synthese" href="Dossier_Rapport/Sauvegarde_sortie/Word/RSCI_SYNTHESE (' . $DATE_GENERATION . ').docx" TARGET="_BLANK"><img src="Dossier_Rapport/img/telecharger.png" height="28px" width="28px"/></a>';


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
?>