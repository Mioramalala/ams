<?php
 set_time_limit(1200);				//ini_set('memory_limit', '48octets');
		ini_set('memory_limit','-1');
        ini_alter('memory_limit','-1');
      
		gc_enable(); 								//Garbage Collector ACTIVER
		gc_collect_cycles(); 
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
include "../connex.php";
require_once 'Classes/PHPExcel/IOFactory.php';
require_once 'recuperation_informations.php';
require_once '../Reporting_Excel/fonctions_rdc.php';
$objReader = PHPExcel_IOFactory::createReader('Excel5');

$objPHPExcel = $objReader->load("Template/Produits_cli.xls");

$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setPath('../../icone/Logo_2.png');
$objDrawing->setCoordinates('H5');
$objDrawing->setOffsetX('-60');
$objDrawing->setOffsetY('2');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

//INITIALISATION DATE DE GENERATION EXPORT
$date_font = date ("d-m-Y");

//RECUPERATION NOM CLIENT, DATE DE GENERATION ET DATE DE CLOTURE DE L'ENTREPRISE BY NIAINA
$feuille = $objPHPExcel->getSheet( 0 );
$feuille->setCellValue('A1', $nomEntreprise); //Nom Client A1
$feuille->setCellValue('A2', 'Audit '.$typeMission.' '.$anneeMission); //Type mission et année mission A2
$feuille->setCellValue('A3', 'Exercice clos le '.$dateClotureMission); //Date de clôture D3

//RECUPERATION COLLABORATEUR BY NIAINA
//Supprimer touts les fichiers texte avant de créer le fichier texte
$path='Collaborateurs/';
$rep=opendir($path);
while($file = readdir($rep)){
    if($file != '..' && $file !='.' && $file !='' && $file!='.txt'){
        unlink($path.$file);        
    }
}
$file ="Collaborateurs/prod_client_".$_SESSION['idMission'].".txt";
if (file_exists($file))
	unlink($file);
$fileopen=(fopen("$file",'w+'));
$sql = "SELECT distinct(UTIL_NOM) FROM tab_rdc,tab_utilisateur WHERE tab_rdc.RDC_CYCLE='prod_client' and tab_rdc.UTIL_ID=tab_utilisateur.UTIL_ID and tab_rdc.MISSION_ID=".$_SESSION['idMission'];
$rep = $bdd->query($sql); 
while ($donnee = $rep->fetch()) {
    $utilID = $donnee['UTIL_NOM'];
	fwrite($fileopen,$utilID.' ');
}
fclose($fileopen);
$read=file($file);
$octet=filesize($file);
if ($octet==0) {
	$feuille->setCellValue('G2', 'Pas de collaborateur');
} 
else {
	$Auditeur = explode(",", $read[0]);
	$listAuditeur = ''; $i=0;
	foreach ($Auditeur as $key => $value) {
		if($i!=0) $listAuditeur .=', ';
		$listAuditeur .= substr($value, 0,1).'.';
	}

	$feuille->setCellValue('G2', $listAuditeur);

	// $feuille->setCellValue('G2', $read[0]);
}
getCollaborateurs($feuille, 'G2', $_SESSION['idMission'], 'G-Produit Clients');
getSuperviseurs($feuille, 'G3', $_SESSION['idMission']);
//RECUPERATION REPONSE ET COMMENTAIRE RDC BY NIAINA
//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 1
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="A" and RDC_RANG=1 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E8', $reponse1);
$feuille->setCellValue('G8', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 2
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="A" and RDC_RANG=2 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E9', $reponse1);
$feuille->setCellValue('G9', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 3
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="A" and RDC_RANG=3 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E10', $reponse1);
$feuille->setCellValue('G10', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 4
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="A" and RDC_RANG=4 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E14', $reponse1);
$feuille->setCellValue('G14', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 5
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="A" and RDC_RANG=5 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E15', $reponse1);
$feuille->setCellValue('G15', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 6
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="A" and RDC_RANG=6 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E16', $reponse1);
$feuille->setCellValue('G16', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 7
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="A" and RDC_RANG=7 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E17', $reponse1);
$feuille->setCellValue('G17', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - B 1
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="B" and RDC_RANG=1 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E18', $reponse1);
$feuille->setCellValue('G18', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - B 2
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="B" and RDC_RANG=2 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E19', $reponse1);
$feuille->setCellValue('G19', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - C 1
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="C" and RDC_RANG=1 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E21', $reponse1);
$feuille->setCellValue('G21', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - C 2
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="C" and RDC_RANG=2 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E22', $reponse1);
$feuille->setCellValue('G22', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - C 3
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="C" and RDC_RANG=3 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E23', $reponse1);
$feuille->setCellValue('G23', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - D 1
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="D" and RDC_RANG=1 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E24', $reponse1);
$feuille->setCellValue('G24', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - D 2
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="D" and RDC_RANG=2 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E25', $reponse1);
$feuille->setCellValue('G25', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - D 3
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="D" and RDC_RANG=3 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E26', $reponse1);
$feuille->setCellValue('G26', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - D 4
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="D" and RDC_RANG=4 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch(); 
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E27', $reponse1);
$feuille->setCellValue('G27', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - D 5
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="D" and RDC_RANG=5 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E28', $reponse1);
$feuille->setCellValue('G28', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - E 1
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="E" and RDC_RANG=1 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E29', $reponse1);
$feuille->setCellValue('G29', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - E 2
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="E" and RDC_RANG=2 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E30', $reponse1);
$feuille->setCellValue('G30', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - E 3
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="E" and RDC_RANG=3 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E31', $reponse1);
$feuille->setCellValue('G31', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - E 4
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="E" and RDC_RANG=4 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E32', $reponse1);
$feuille->setCellValue('G32', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - E 5
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="E" and RDC_RANG=5 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E33', $reponse1);
$feuille->setCellValue('G33', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - E 6
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="E" and RDC_RANG=6 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E34', $reponse1);
$feuille->setCellValue('G34', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - F 1
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="F" and RDC_RANG=1 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E35', $reponse1);
$feuille->setCellValue('G35', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - F 2
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="F" and RDC_RANG=2 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E36', $reponse1);
$feuille->setCellValue('G36', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - F 3
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="F" and RDC_RANG=3 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E37', $reponse1);
$feuille->setCellValue('G37', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - G 1
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="G" and RDC_RANG=1 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E39', $reponse1);
$feuille->setCellValue('G39', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - G 2
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="G" and RDC_RANG=2 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E41', $reponse1);
$feuille->setCellValue('G41', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - G 3
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="G" and RDC_RANG=3 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E42', $reponse1);
$feuille->setCellValue('G42', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - G 4
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="G" and RDC_RANG=4 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E43', $reponse1);
$feuille->setCellValue('G43', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - G 5
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="G" and RDC_RANG=5 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E44', $reponse1);
$feuille->setCellValue('G44', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - G 6
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="G" and RDC_RANG=6 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E45', $reponse1);
$feuille->setCellValue('G45', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - H 1
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="H" and RDC_RANG=1 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E46', $reponse1);
$feuille->setCellValue('G46', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - H 2
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="H" and RDC_RANG=2 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E48', $reponse1);
$feuille->setCellValue('G48', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - H 3
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="H" and RDC_RANG=3 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E49', $reponse1);
$feuille->setCellValue('G49', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - H 4
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="H" and RDC_RANG=4 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('E50', $reponse1);
$feuille->setCellValue('G50', $commentaire1);

$feuille->setCellValue('A53', setSynthese("produit_client", $_SESSION['idMission']));

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save(str_replace('.php', '.xls','../Sauvegarde_sortie/Excel/Produits_clients('.$date_font.').xls'));

echo '<a id="icone_Produits_clients" href="Dossier_Rapport/Sauvegarde_sortie/Excel/Produits_clients('.$date_font.').xls" TARGET="_BLANK"><img src="Dossier_Rapport/img/Excel.png" height="28px" width="28px"/></a>';
Ajout_base('Produits_clients('.$date_font.').xls',$_SESSION["user"],$_SESSION['idMission'],get_Entreprise ($_SESSION['idMission']),get_ID_utilisateur($_SESSION["user"])); 
