<?php

require_once 'class_word/PHPWord.php';
require_once 'recuperation_informations.php';

$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('Template_word/Planification_generale.docx');

//INITIALISATION =================================
$DATE_Planification_generale = date("d-m-Y");
if(isset($_SESSION["user"])){
		$session_utiliser=$_SESSION["user"];
		}else{
		$session_utiliser="Utilisateur";
		}

//INITIALISATION DATE DE GENERATION EXPORT
$DATE_GENERATION = date('d-m-Y');

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

//RECUPERATION COLLABORATEUR BY NIAINA
//Supprimer touts les fichiers texte avant de créer le fichier texte
$path='Collaborateurs/';
$rep=opendir($path);
while($file = readdir($rep)){
    if($file != '..' && $file !='.' && $file !='' && $file!='.txt'){
        unlink($path.$file);        
    }
}
$file ="Collaborateurs/ra_planification_general_".$_SESSION['idMission'].".txt";
if (file_exists($file))
	unlink($file);
$fileopen=(fopen("$file",'w+'));
$sql = "SELECT distinct(UTIL_NOM) FROM tab_planification_ra,tab_utilisateur WHERE tab_planification_ra.UTIL_ID=tab_utilisateur.UTIL_ID and tab_planification_ra.MISSION_ID=".$_SESSION['idMission'];
$rep = $bdd->query($sql); 
while ($donnee = $rep->fetch()) {
    $utilID = $donnee['UTIL_NOM'];
	fwrite($fileopen,$utilID.' ');
}
fclose($fileopen);
$read=file($file);
$octet=filesize($file);
if ($octet==0) {
	$document->setValue('nomCollaborateur', 'Pas de collabarateur');
} 
else {
	$document->setValue('nomCollaborateur', $read[0]);
}

//RECUPERATION INCIDENCES DE L'ENTREPRISE BY NIAINA
$sqlSyntheseRsci = 'SELECT * FROM tab_planification_ra WHERE MISSION_ID='.$_SESSION['idMission'];
$repSynthese = $bdd->query($sqlSyntheseRsci);  

while($donnee = $repSynthese->fetch())
{
    //CYCLE A
    if ($donnee['PLANIF_CYCLE'] == "A") {
        $document->setValue('planificationFonds', utf8_decode($donnee['PLANIF_GEN']));
    }

    //CYCLE B
    if ($donnee['PLANIF_CYCLE'] == "B") {
        $document->setValue('planificationImmoCorp', utf8_decode($donnee['PLANIF_GEN']));
    }

    //CYCLE C
    if ($donnee['PLANIF_CYCLE'] == "C") {
        $document->setValue('planificationImmoFi', utf8_decode($donnee['PLANIF_GEN']));
    }

    //CYCLE D
    if ($donnee['PLANIF_CYCLE'] == "D") {
        $document->setValue('planificationStocks', utf8_decode($donnee['PLANIF_GEN']));
    }

    //CYCLE E
    if ($donnee['PLANIF_CYCLE'] == "E") {
        $document->setValue('planificationTresorerie', utf8_decode($donnee['PLANIF_GEN']));
    }

    //CYCLE F
    if ($donnee['PLANIF_CYCLE'] == "F") {
        $document->setValue('planificationCharges', utf8_decode($donnee['PLANIF_GEN']));
    }

    //CYCLE G
    if ($donnee['PLANIF_CYCLE'] == "G") {
        $document->setValue('planificationVentes', utf8_decode($donnee['PLANIF_GEN']));
    }

    //CYCLE H
    if ($donnee['PLANIF_CYCLE'] == "H") {
        $document->setValue('planificationPaie', utf8_decode($donnee['PLANIF_GEN']));
    }

    //CYCLE I
    if ($donnee['PLANIF_CYCLE'] == "I") {
        $document->setValue('planificationImpots', utf8_decode($donnee['PLANIF_GEN']));
    }

    //CYCLE J
    if ($donnee['PLANIF_CYCLE'] == "J") {
        $document->setValue('planificationEmprunts', utf8_decode($donnee['PLANIF_GEN']));
    }

    //CYCLE K
    if ($donnee['PLANIF_CYCLE'] == "K") {
        $document->setValue('planificationDCD', utf8_decode($donnee['PLANIF_GEN']));        
    }
}			
		
//VERIFIER LE MISSION EN COURS MISSION_ID "Tab_objectif"
$fichier ='Planification_generale('.$DATE_Planification_generale.').docx';
if( file_exists ($fichier)) {
	unlink($fichier);
	$document->save('../Sauvegarde_sortie/Word/Planification_generale('.$DATE_Planification_generale.').docx');
		//===================================================================================================
		// AJOUTER INFORMATIONS DANS LA BASE tab_suivi_export_fichier
		//===================================================================================================
		$fichier ='Planification_generale('.$DATE_Planification_generale.').docx';
		    Ajout_base ($fichier,$session_utiliser); 
	    //=====================================================================================================
	}else{
	$document->save('../Sauvegarde_sortie/Word/Planification_generale('.$DATE_Planification_generale.').docx');
	   //===================================================================================================
		// AJOUTER INFORMATIONS DANS LA BASE tab_suivi_export_fichier
		//===================================================================================================
		    Ajout_base ($fichier,$session_utiliser); 
	    //=====================================================================================================
	}



echo '<a href="Dossier_Rapport/Sauvegarde_sortie/Word/Planification_generale('.$DATE_Planification_generale.').docx" TARGET="_BLANK"><img src="Dossier_Rapport/img/telecharger.png" height="28px" width="28px"/></a>';

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