<?php
session_start();
include "../connex.php";
require_once 'class_word/PHPWord.php';
require_once 'fonctions_rsci.php';

$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('Template_word/RSCI_tresorie_recette.docx');

//INITIALISATION =================================
$DATE_recette = date("d-m-Y");
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

			
$Auditeur=getAuditeurs($ID_mission, "E-TÃ©sorerie");
$Superviseur=getSuperviseurs($ID_mission, "E-TÃ©sorerie"); 	
$document->setValue('Entreprise', get_nom_entreprise($ID_Entreprise, $ID_mission));

$Auditeur = explode(",", $Auditeur);
$listAuditeur = ''; $i=0;
foreach ($Auditeur as $key => $value) {
	if($i!=0) $listAuditeur .=', ';
	$value = explode(" ", trim($value));
	for ($j=0; $j < sizeof($value); $j++) { 
		$listAuditeur .= substr($value[$j], 0, 1);
	}
	$i++;
}

$Superviseur = explode(",", $Superviseur);
$listSuperviseur = ''; $i=0;
foreach ($Superviseur as $key => $value) {
	if($i!=0) $listSuperviseur .=', ';
	$value = explode(" ", trim($value));
	for ($j=0; $j < sizeof($value); $j++) { 
		$listSuperviseur .= substr($value[$j], 0, 1);
	}
	$i++;
}

$idMission=$_SESSION['idMission'];
$lienRSCI="http://".$_SERVER['HTTP_HOST']."/RSCISynthese_.php?lien=RECETTE/".$idMission;

$document->setValue('Auditeur',$listAuditeur); //Auditeur
$document->setValue('Superviseur', $listSuperviseur); //Superviseur
$document->setValue('Date', date("d-m-Y"));
$document->setValue('lien', $lienRSCI);
// TABLEAU ASSOCIATIF CYCLE - LETTRE
$cycle = array( 
	"A"=>"1000",
	"B"=>"18",
	"C"=>"19",  
	"D"=>"20",
	"E"=>"21"
);				

syntheseFinale($document, "tresorerie", $ID_mission);

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

for($i=1; $i<=23; $i++){
	remplirObjectifA($document, 1000, $ID_mission, $i, "recette");		
}

$fichier ='RSCI_Cycle_Recette('.$DATE_recette.').docx';
   if( file_exists ($fichier)){
		unlink($fichier);
		$document->save('../Sauvegarde_sortie/Word/RSCI_Cycle_Recette('.$DATE_recette.').docx');
			//===================================================================================================
			// AJOUTER INFORMATIONS DANS LA BASE tab_suivi_export_fichier
			//===================================================================================================
			$fichier ='RSCI_Cycle_Recette('.$DATE_recette.').docx';
			    Ajout_base ($fichier,$session_utiliser); 
		    //=====================================================================================================
		}else{
		$document->save('../Sauvegarde_sortie/Word/RSCI_Cycle_Recette('.$DATE_recette.').docx');
		   //===================================================================================================
			// AJOUTER INFORMATIONS DANS LA BASE tab_suivi_export_fichier
			//===================================================================================================
			    Ajout_base ($fichier,$session_utiliser,$ID_mission,$ID_Entreprise,$ID_Utilisateur); 
		    //=====================================================================================================
		}



echo '<a id="icone_recette" href="includes/google_docs_viewer.php?id=Dossier_Rapport/Sauvegarde_sortie/Word/RSCI_Cycle_Recette('.$DATE_recette.').docx&amp;nomfichier=" TARGET="_BLANK"><img src="Dossier_Rapport/img/telecharger.png" height="28px" width="28px"/></a>';

function Ajout_base ($fichier,$session_utiliser,$ID_mission,$ID_Entreprise,$ID_Utilisateur) {
include "../../connexion.php";
		//===================================================================================================
			// AJOUTER INFORMATIONS DANS LA BASE tab_suivi_export_fichier
			//===================================================================================================
			$Date_sortie=date("Y-m-d");
			try{
					$res=$bdd->prepare('INSERT INTO tab_suivi_export_fichier(Date_sortie,nom_fichier,session_utiliser,MISSION_ID,ENTREPRISE_ID,UTIL_ID)
					VALUES (:Date_sortie,:nom_fichier,:session_utiliser,:MISSION_ID,:ENTREPRISE_ID,:UTIL_ID )');
					$res->execute(array('Date_sortie'=>$Date_sortie,'nom_fichier'=>$fichier,'session_utiliser'=>$session_utiliser,'MISSION_ID'=>$ID_mission,'ENTREPRISE_ID'=>$ID_Entreprise,'UTIL_ID'=>$ID_Utilisateur ));
		    }catch(exception $e){}          
				//=====================================================================================================
}

?>