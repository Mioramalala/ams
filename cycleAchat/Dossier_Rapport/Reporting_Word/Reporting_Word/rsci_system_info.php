<?php
session_start();
include "../connex.php";
require_once 'class_word/PHPWord.php';
require_once 'fonctions_rsci.php';

$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('Template_word/RSCI_system_info.docx');

//INITIALISATION =================================
$DATE_SI = date("d-m-Y");
//$heure_ajout = date("H:i");
$DATE_depense = date("d-m-Y");
//$heure_ajout = date("H:i");
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
//VERIFIER LE MISSION EN COURS MISSION_ID "Tab_objectif"	

		
$Auditeur="AUDITEUR";
$Superviseur="Superviseur"; 	

$document->setValue('Auditeur',$Auditeur); //Auditeur
$document->setValue('Superviseur', $Superviseur); //Superviseur	
// TABLEAU ASSOCIATIF CYCLE - LETTRE
$cycle = array( 
	"A"=>"100000000",
	"B"=>"32",
	"C"=>"33",  
	"D"=>"34"
);					
			
foreach ($cycle as $lettre_cycle => $id_cycle) {
	// lettre_cycle A, id_cycle 1
	$nb_Reponses = compterReponses($id_cycle, $ID_mission);
	$nb_Reponses_Necessaires = compterReponsesNecessaires($id_cycle);
	//echo $nb_Reponses_Necessaires;

	remplirTableauWord($document, $lettre_cycle, $id_cycle, $ID_mission);		
	if(verifSyntheseExistant($id_cycle, $ID_mission)>0){
		remplirSynthese($document, $lettre_cycle, $id_cycle, $ID_mission);
	}

	nettoyerCasesVides($document,$lettre_cycle,$nb_Reponses_Necessaires);	
}

syntheseFinale($document, "info", $ID_mission);
remplirInfo($document, $ID_mission);


$fichier ='RSCI_Systeme_information('.$DATE_SI.').docx';
   if( file_exists ($fichier)){
		unlink($fichier);
		$document->save('../Sauvegarde_sortie/Word/RSCI_Systeme_information('.$DATE_SI.').docx');
			//===================================================================================================
			// AJOUTER INFORMATIONS DANS LA BASE tab_suivi_export_fichier
			//===================================================================================================
			$fichier ='RSCI_Systeme_information('.$DATE_SI.').docx';
			    Ajout_base ($fichier,$session_utiliser); 
		    //=====================================================================================================
		}else{
		$document->save('../Sauvegarde_sortie/Word/RSCI_Systeme_information('.$DATE_SI.').docx');
		   //===================================================================================================
			// AJOUTER INFORMATIONS DANS LA BASE tab_suivi_export_fichier
			//===================================================================================================
			    Ajout_base ($fichier,$session_utiliser,$ID_mission,$ID_Entreprise,$ID_Utilisateur); 
		    //=====================================================================================================
		}



echo '<a id="icone_info" href="Dossier_Rapport/Sauvegarde_sortie/Word/RSCI_Systeme_information('.$DATE_SI.').docx" TARGET="_BLANK"><img src="Dossier_Rapport/img/telecharger.png" height="28px" width="28px"/></a>';

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