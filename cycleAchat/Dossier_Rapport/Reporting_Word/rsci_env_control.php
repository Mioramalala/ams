<?php
session_start();
include "../connex.php";
require_once 'class_word/PHPWord.php';
require_once 'fonctions_rsci.php';
$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('Template_word/RSCI_env_control.docx');

//INITIALISATION =================================
$DATE_control = date("d-m-Y");

//$heure_ajout = date("H:i");
	if(isset($_SESSION["user"])){
			$session_utiliser=$_SESSION["user"];
			$ID_mission =$_SESSION['idMission'];
			$ID_Entreprise =get_Entreprise($ID_mission);
			$ID_Utilisateur =get_ID_utilisateur($session_utiliser);
	}else{
			$session_utiliser="Utilisateur";
			$session_utiliser= $_SESSION['idMission'];
			$ID_mission =$_SESSION['idMission'];
			$ID_Entreprise= get_Entreprise($ID_mission);
			$ID_Utilisateur =get_ID_utilisateur($session_utiliser);
	}
//VERIFIER LE MISSION EN COURS MISSION_ID "Tab_objectif"	

$document->setValue("DATE", $DATE_control);
$document->setValue("ENTREPRISE", get_nom_entreprise($ID_Entreprise, $ID_mission));		
			
$Auditeur=getAuditeurs($ID_mission, "C8-Environnement de contrÃ´le");
$Superviseur=getSuperviseurs($ID_mission, "C8-Environnement de contrÃ´le"); 

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

$document->setValue('Auditeur',$listAuditeur); //Auditeur
$document->setValue('Superviseur', $listSuperviseur); //Superviseur
$document->setValue('Entreprise', get_nom_entreprise($ID_Entreprise, $ID_mission));

$cycle = array( 
	"B"=>"31"
);					

syntheseFinale($document, "environnement", $ID_mission);		

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



$fichier ='RSCI_Environnement_Control('.$DATE_control.').docx';
   if( file_exists ($fichier)){
		unlink($fichier);
		$document->save('../Sauvegarde_sortie/Word/RSCI_Environnement_Control('.$DATE_control.').docx');
			//===================================================================================================
			// AJOUTER INFORMATIONS DANS LA BASE tab_suivi_export_fichier
			//===================================================================================================
			$fichier ='RSCI_Environnement_Control('.$DATE_control.').docx';
			    Ajout_base ($fichier,$session_utiliser); 
		    //=====================================================================================================
		}else{
		$document->save('../Sauvegarde_sortie/Word/RSCI_Environnement_Control('.$DATE_control.').docx');
		   //===================================================================================================
			// AJOUTER INFORMATIONS DANS LA BASE tab_suivi_export_fichier
			//===================================================================================================
			   Ajout_base ($fichier,$session_utiliser,$ID_mission,$ID_Entreprise,$ID_Utilisateur); 
		    //=====================================================================================================
		}



echo '<a id="icone_env" href="Dossier_Rapport/Sauvegarde_sortie/Word/RSCI_Environnement_Control('.$DATE_control.').docx" TARGET="_BLANK"><img src="Dossier_Rapport/img/telecharger.png" height="28px" width="28px"/></a>';

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