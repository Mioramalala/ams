<?php
session_start();
require_once 'class_word/PHPWord.php';

$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('Template_word/liste_pieces.docx');

//INITIALISATION =================================
$DATE_PIECES = date("d-m-Y");
//$heure_ajout = date("H:i");
	if(isset($_SESSION["user"])){
			$session_utiliser=$_SESSION["user"];
			}else{
			$session_utiliser="Utilisateur";
			}

$document->setValue('weekday', date('l'));
$document->setValue('time', date('H:i'));

$fichier ='LETTRE_PIECES('.$DATE_PIECES.').docx';
   if( file_exists ($fichier)){
		unlink($fichier);
		$document->save('../Sauvegarde_sortie/Word/LETTRE_PIECES('.$DATE_PIECES.').docx');
			//===================================================================================================
			// AJOUTER INFORMATIONS DANS LA BASE tab_suivi_export_fichier
			//===================================================================================================
			$fichier ='LETTRE_PIECES('.$DATE_PIECES.').docx';
			    Ajout_base ($fichier,$session_utiliser); 
		    //=====================================================================================================
		}else{
		$document->save('../Sauvegarde_sortie/Word/LETTRE_PIECES('.$DATE_PIECES.').docx');
		   //===================================================================================================
			// AJOUTER INFORMATIONS DANS LA BASE tab_suivi_export_fichier
			//===================================================================================================
			    Ajout_base ($fichier,$session_utiliser); 
		    //=====================================================================================================
		}



echo '<a href="Dossier_Rapport/Sauvegarde_sortie/Word/LETTRE_PIECES('.$DATE_PIECES.').docx" TARGET="_BLANK"><img src="Dossier_Rapport/img/telecharger.png" height="28px" width="28px"/></a>';

function Ajout_base ($fichier,$session_utiliser){
include "../connexionPDO.php";
		//===================================================================================================
			// AJOUTER INFORMATIONS DANS LA BASE tab_suivi_export_fichier
			//===================================================================================================
			$Date_sortie=date("Y-m-d");
			try{
					$res=$conx->prepare('INSERT INTO tab_suivi_export_fichier(Date_sortie,nom_fichier,session_utiliser)
					VALUES (:Date_sortie,:nom_fichier,:session_utiliser )');
					$res->execute(array('Date_sortie'=>$Date_sortie,'nom_fichier'=>$fichier,'session_utiliser'=>$session_utiliser ));
		       }catch(exception $e){}            
				//=====================================================================================================
    
}

?>