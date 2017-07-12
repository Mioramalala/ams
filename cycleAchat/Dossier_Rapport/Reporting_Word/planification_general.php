<?php

require_once 'class_word/PHPWord.php';
require_once 'recuperation_informations.php';
include "../connex.php";
require_once 'fonctions_ra.php';

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

$domaine = array( 
"Fonds",
"ImmoCorp",
"ImmoFi",
"Stocks",
"Tresorerie",
"Charges",
"Ventes",
"Paie",
"Impots",
"Emprunts",
"DCD"
);

//RECUPERATION INCIDENCES DE L'ENTREPRISE BY NIAINA
$sqlSyntheseRsci = 'SELECT * FROM tab_planification_ra WHERE MISSION_ID='.$_SESSION['idMission'];
$repSynthese = $bdd->query($sqlSyntheseRsci);  

while($donnee = $repSynthese->fetch())
{
    //CYCLE A
    if ($donnee['PLANIF_CYCLE'] == "fond") {
        $document->setValue('planificationFonds', utf8_decode($donnee['PLANIF_GEN']));
    }

    //CYCLE B
    if ($donnee['PLANIF_CYCLE'] == "immo") {
        $document->setValue('planificationImmoCorp', utf8_decode($donnee['PLANIF_GEN']));
    }

    //CYCLE C
    if ($donnee['PLANIF_CYCLE'] == "immofi") {
        $document->setValue('planificationImmoFi', utf8_decode($donnee['PLANIF_GEN']));
    }

    //CYCLE D
    if ($donnee['PLANIF_CYCLE'] == "stock") {
        $document->setValue('planificationStocks', utf8_decode($donnee['PLANIF_GEN']));
    }

    //CYCLE E
    if ($donnee['PLANIF_CYCLE'] == "tresorerie") {
        $document->setValue('planificationTresorerie', utf8_decode($donnee['PLANIF_GEN']));
    }

    //CYCLE F
    if ($donnee['PLANIF_CYCLE'] == "charge") {
        $document->setValue('planificationCharges', utf8_decode($donnee['PLANIF_GEN']));
    }

    //CYCLE G
    if ($donnee['PLANIF_CYCLE'] == "vente") {
        $document->setValue('planificationVentes', utf8_decode($donnee['PLANIF_GEN']));
    }

    //CYCLE H
    if ($donnee['PLANIF_CYCLE'] == "paie") {
        $document->setValue('planificationPaie', utf8_decode($donnee['PLANIF_GEN']));
    }

    //CYCLE I
    if ($donnee['PLANIF_CYCLE'] == "impot") {
        $document->setValue('planificationImpots', utf8_decode($donnee['PLANIF_GEN']));
    }

    //CYCLE J
    if ($donnee['PLANIF_CYCLE'] == "emprunt") {
        $document->setValue('planificationEmprunts', utf8_decode($donnee['PLANIF_GEN']));
    }

    //CYCLE K
    if ($donnee['PLANIF_CYCLE'] == "dcd") {
        $document->setValue('planificationDCD', utf8_decode($donnee['PLANIF_GEN']));        
    }
}			

nettoyerPlanif($document, $domaine);

//VERIFIER LE MISSION EN COURS MISSION_ID "Tab_objectif"
$fichier ='Planification_generale('.$DATE_Planification_generale.').docx';
if( file_exists ($fichier)) {
	unlink($fichier);
	$document->save('../Sauvegarde_sortie/Word/Planification_generale('.$DATE_Planification_generale.').docx');
		//===================================================================================================
		// AJOUTER INFORMATIONS DANS LA BASE tab_suivi_export_fichier
		//===================================================================================================
		$fichier ='Planification_generale('.$DATE_Planification_generale.').docx';
		Ajout_base ($fichier,$_SESSION["user"],$_SESSION['idMission'],get_Entreprise ($_SESSION['idMission']),get_ID_utilisateur($_SESSION["user"])); 
	    //=====================================================================================================
	}else{
	$document->save('../Sauvegarde_sortie/Word/Planification_generale('.$DATE_Planification_generale.').docx');
	   //===================================================================================================
		// AJOUTER INFORMATIONS DANS LA BASE tab_suivi_export_fichier
		//===================================================================================================
		Ajout_base ($fichier,$_SESSION["user"],$_SESSION['idMission'],get_Entreprise ($_SESSION['idMission']),get_ID_utilisateur($_SESSION["user"])); 
	    //=====================================================================================================
	}



echo '<a id="icone_planif" href="Dossier_Rapport/Sauvegarde_sortie/Word/Planification_generale('.$DATE_Planification_generale.').docx" TARGET="_BLANK"><img src="Dossier_Rapport/img/telecharger.png" height="28px" width="28px"/></a>';
/*
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
*/
?>