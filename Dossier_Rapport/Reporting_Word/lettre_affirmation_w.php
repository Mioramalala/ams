<?php


@session_start();
include_once "../connex.php";
require_once 'class_word/PHPWord.php';
require_once 'recuperation_informations.php';
require_once 'fonctions_ra.php';

//============================SESSION=USER==================================================================//


	if(isset($_SESSION["user"])){
			$session_utiliser=$_SESSION["user"];
			$ID_mission =$_SESSION['idMission'];
			$ID_Entreprise =get_Entreprise($ID_mission);
			$ID_Utilisateur =get_ID_utilisateur($session_utiliser);
			
			}else{
			$session_utiliser= $_SESSION['idMission'];
			$ID_mission =$_SESSION['idMission'];
			$ID_Entreprise= get_Entreprise ($ID_mission);
			$ID_Utilisateur =get_ID_utilisateur($session_utiliser);
			}

// //==========================================================================================================//

$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('Template_word/lettre_d_affirmation.docx');
			   

//INITIALISATION DATE DE GENERATION EXPORT
$Date_gen = explode("-",date("d-m-Y"));
if($Date_gen[1] == "01") $Date_gen[1]="Janvier";
elseif($Date_gen[1] == "02") $Date_gen[1]="Fevrier";
elseif($Date_gen[1] == "03") $Date_gen[1]="Mars";
elseif($Date_gen[1] == "04") $Date_gen[1]="Avril";
elseif($Date_gen[1] == "05") $Date_gen[1]="Mai";
elseif($Date_gen[1] == "06") $Date_gen[1]="Juin";
elseif($Date_gen[1] == "07") $Date_gen[1]="Juillet";
elseif($Date_gen[1] == "08") $Date_gen[1]="Aout";
elseif($Date_gen[1] == "09") $Date_gen[1]="Septembre";
elseif($Date_gen[1] == "10") $Date_gen[1]="Octobre";
elseif($Date_gen[1] == "11") $Date_gen[1]="Novembre";
elseif($Date_gen[1] == "12") $Date_gen[1]="Decembre";

$DATE_GENERATION= $Date_gen[0]." ".$Date_gen[1]." ".$Date_gen[2];

// $document->setValue('Value1', $nomEntreprise); //NOM SOCIETE
// $document->setValue('Value2', utf8_decode($adresseEntreprise)); //ADRESSE SOCIETE
$document->setValue('Value3', $DATE_GENERATION); //Antananarivo le	
$document->setValue('Value4', $nomEntreprise); //NOM SOCIETE
$document->setValue('Value5', $dateClotureMission); //Date clôture mission

$document->setValue('weekday', date('l'));
$document->setValue('time', date('H:i'));

$fichier = 'LETTRE_AFFIRMATION (' . $DATE_GENERATION . ').docx';
if (file_exists($fichier)) {
    unlink($fichier);
    $document->save('../Sauvegarde_sortie/Word/LETTRE_AFFIRMATION (' . $DATE_GENERATION . ').docx');
			// AJOUTER INFORMATIONS DANS LA BASE tab_suivi_export_fichier
			//===================================================================================================
			    Ajout_base_aff($fichier,$session_utiliser,$ID_mission,$ID_Entreprise,$ID_Utilisateur); 
		    //===================================================================================================
} else {
    $document->save('../Sauvegarde_sortie/Word/LETTRE_AFFIRMATION (' . $DATE_GENERATION . ').docx');
			// AJOUTER INFORMATIONS DANS LA BASE tab_suivi_export_fichier
			//===================================================================================================
			   Ajout_base_aff($fichier,$session_utiliser,$ID_mission,$ID_Entreprise,$ID_Utilisateur); 
		    //===================================================================================================
}


 echo '<a href="includes/google_docs_viewer.php?id=Dossier_Rapport/Sauvegarde_sortie/Word/LETTRE_AFFIRMATION (' . $DATE_GENERATION . ').docx&amp;nomfichier=" TARGET="_BLANK"><img src="Dossier_Rapport/img/telecharger.png" height="28px" width="28px"/></a>';

//==========================FONCTION=AJOUT+INFORMATION=DS=LA=BASE=======================================//
function Ajout_base_aff($fichier,$session_utiliser,$ID_mission,$ID_Entreprise,$ID_Utilisateur) {

require "../connexionPDO.php";
		//===================================================================================================
			// AJOUTER INFORMATIONS DANS LA BASE tab_suivi_export_fichier
			//===================================================================================================
			$Date_sortie=date("Y-m-d");
			try{
					$res=$conx->prepare('INSERT INTO tab_suivi_export_fichier(Date_sortie,nom_fichier,session_utiliser,MISSION_ID,ENTREPRISE_ID,UTIL_ID)
					VALUES (:Date_sortie,:nom_fichier,:session_utiliser,:MISSION_ID,:ENTREPRISE_ID,:UTIL_ID )');
					$res->execute(array('Date_sortie'=>$Date_sortie,'nom_fichier'=>$fichier,'session_utiliser'=>$session_utiliser,'MISSION_ID'=>$ID_mission,'ENTREPRISE_ID'=>$ID_Entreprise,'UTIL_ID'=>$ID_Utilisateur ));
		    }catch(exception $e){
		    	
		    } 
}


?>