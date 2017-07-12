<?php
session_start();
require_once 'class_word/PHPWord.php';

$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('Template_word/Note_annexe.docx');

include "../connex.php";
//INITIALISATION =================================
$DATE_achat = date("d-m-Y");
//$heure_ajout = date("H:i");
	if(isset($_SESSION["user"])){
			$session_utiliser=$_SESSION["user"];
			$ID_mission =$_SESSION['idMission'];
			$ID_Entreprise =get_Entreprise ($ID_mission);
			$ID_Utilisateur =get_ID_utilisateur($session_utiliser);
			
			}else{
			$session_utiliser= $_SESSION['idMission'];
			$ID_mission =$_SESSION['idMission'];
			$ID_Entreprise= get_Entreprise ($ID_mission);
			$ID_Utilisateur =get_ID_utilisateur($session_utiliser);
			}

//INITIALISATION =================================
$DATE_MISSION="12-12-2014";
$DATE_export = date("d-m-Y");



$document->setValue('Value1', 'Cabinet Gérard CATEIN'); //NOM SOCIETE
$document->setValue('Value2', '135 bis Route Circulaire '); //ADRESSE SOCTE
$document->setValue('Value3', 'Venus');		 //antananarivo le	
$document->setValue('Value4', 'SICAM-POLI'); //NOM SOCIETE
$document->setValue('Value5', $DATE_MISSION); //date mission
//$document->setValue('Value6', 'Jupiter'); 
/*$document->setValue('Value7', 'Saturn');
$document->setValue('Value8', 'Uranus');
$document->setValue('Value9', 'Neptun');
$document->setValue('Value10', 'Pluto');
$document->setValue('myReplacedValue', 'dmldksklknlkn');*/

$document->setValue('weekday', date('l'));
$document->setValue('time', date('H:i'));

$fichier ='Note_annexe ('.$DATE_export.').docx';
   if( file_exists ($fichier)){
		unlink($fichier);
		$document->save('../Sauvegarde_sortie/Word/Note_annexe ('.$DATE_export.').docx');
		}else{
		$document->save('../Sauvegarde_sortie/Word/Note_annexe ('.$DATE_export.').docx');
		}



echo '<a href="Dossier_Rapport/Sauvegarde_sortie/Word/Note_annexe ('.$DATE_export.').docx" TARGET="_BLANK"><img src="Dossier_Rapport/img/telecharger.png" height="28px" width="28px"/></a>';













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
//PRENDRE ENTREPRISE
function get_Entreprise ($ID_mission){
//include "../connex.php";

$sqlNbrPo=db_connect("SELECT ENTREPRISE_ID  FROM  tab_mission WHERE MISSION_ID='".$ID_mission."' " );
	foreach ($sqlNbrPo as $val){
	 $ID_entreprise = $val["ENTREPRISE_ID"];	
	}
return $ID_entreprise;
	}
	
	//PRENDRE L'UTILISATEUR
	function get_ID_utilisateur($mail_utilisateur){
$get_ID_util=db_connect("SELECT UTIL_ID  FROM tab_utilisateur WHERE UTIL_LOGIN ='".$mail_utilisateur ."' ");
foreach ($get_ID_util as $val){
$ID_utilisateur =$val['UTIL_ID'];
}
return $ID_utilisateur;
}







?>