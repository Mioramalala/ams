<?php
@session_start();
$mission_id=@$_SESSION['idMission'];
$UTIL_ID=@$_SESSION['id'];

include '../connex.php';
require_once '../Reporting_Excel/fonctions_rdc.php';

$ENTREPRISE_DENOMINATION_SOCIAL=$MISSION_DATE_CLOTURE=$MISSION_TYPE="";


$get_entreprise =db_connect ("select ENTREPRISE_DENOMINATION_SOCIAL,MISSION_DATE_CLOTURE,MISSION_TYPE from tab_mission m,tab_entreprise e
								where MISSION_ID='".$mission_id."' and m.ENTREPRISE_ID=e.ENTREPRISE_ID ");
			foreach ($get_entreprise as $valeur){
			$ENTREPRISE_DENOMINATION_SOCIAL=$valeur['ENTREPRISE_DENOMINATION_SOCIAL'];
			$MISSION_DATE_CLOTURE=$valeur['MISSION_DATE_CLOTURE'];
			$MISSION_TYPE=$valeur['MISSION_TYPE'];
			}
			
			
					//SYNTHESE
$get_synth = db_connect ('SELECT SYNTHESE_CYCLE FROM tab_synthese_feuille_rdc WHERE MISSION_ID='.$mission_id);
			foreach ($get_synth as $valeur){
			$SYNTHESE_CYCLE=$valeur['SYNTHESE_CYCLE'];
			}	
if (empty($SYNTHESE_CYCLE)){ $SYNTHESE_CYCLE = "";}
			


	//===============LOG====================	
	$date_font = date ("d-m-Y");

	if(isset($_SESSION["user"])){
			$session_utiliser=$_SESSION["user"];
			}else{
			$session_utiliser="Utilisateur";
			}


$fichier ='Fond_propre('.$date_font.').xls';

Ajout_base($fichier,$session_utiliser,$mission_id,$ENTREPRISE_DENOMINATION_SOCIAL,$UTIL_ID); 		
	
		//==================================	
			
			
	$A1=$AC1=$A11=$AC11=$AC13=$A13=$AC14=$A14="";
	
	$B1=$BC1=$B2=$BC2=$B3=$BC3=$B4=$BC4="";
	
	$C1=$CC1=$C2=$CC2="";
	$D1=$DC1=$D2=$DC2=$D3=$DC3=$D4=$DC4="";
	
	$E=$EC="";

        set_time_limit(1200);
		ini_set('memory_limit','-1');
        ini_alter('memory_limit','-1');
      //Garbage Collector ACTIVER
		gc_enable(); 						
		gc_collect_cycles(); 
			
	//====================================================================================================
	//                                REQUETE SQL 
	//====================================================================================================
	
	//COMMENTAIRE A RG 1
		$Afficher_A=db_connect('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="A" and RDC_RANG=1 and MISSION_ID='.$mission_id);
		foreach ($Afficher_A as $val){
		$A1=$val['RDC_REPONSE'];
		$AC1=$val['RDC_COMMENTAIRE'];
		
		if(empty($A1) or empty($AC1)){
		$AC1=""; $A1="";
		}}
	//COMMENTAIRE A1 RG 2
		$Afficher_A1=db_connect('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="A" and RDC_RANG=2 and MISSION_ID='.$mission_id);
		foreach ($Afficher_A1 as $val){
		$A11=$val['RDC_REPONSE'];
		$AC11=$val['RDC_COMMENTAIRE'];
		
		if(empty($A11) or empty($AC11)){
		$AC11=""; $A11="";
		}}
	//COMMENTAIRE A1 RG 3
		$Afficher_A3=db_connect('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="A" and RDC_RANG=3 and MISSION_ID='.$mission_id);
		foreach ($Afficher_A3 as $val){
		$A13=$val['RDC_REPONSE'];
		$AC13=$val['RDC_COMMENTAIRE'];
		
		if(empty($A13) or empty($AC13)){
		$AC13=""; $A13="";
		}}
	//COMMENTAIRE A1 RG 4
		$Afficher_A4=db_connect('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="A" and RDC_RANG=4 and MISSION_ID='.$mission_id);
		foreach ($Afficher_A4 as $val){
		$A14=$val['RDC_REPONSE'];
		$AC14=$val['RDC_COMMENTAIRE'];
		
		if(empty($A13) or empty($AC14)){
		$AC14=""; $A14="";
		}}
		
		
    //=================================================B==================================================
		//COMMENTAIRE B RG 1
		$Afficher_B=db_connect('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="B" and RDC_RANG=1 and MISSION_ID='.$mission_id);
		foreach ($Afficher_B as $val){
		$B1=$val['RDC_REPONSE'];
		$BC1=$val['RDC_COMMENTAIRE'];
		
		if(empty($B1) or empty($BC1)){
		$BC1=""; $B1="";
		}}
	//COMMENTAIRE A1 RG 2
		$Afficher_B2=db_connect('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="B" and RDC_RANG=2 and MISSION_ID='.$mission_id);
		foreach ($Afficher_B2 as $val){
		$B2=$val['RDC_REPONSE'];
		$BC2=$val['RDC_COMMENTAIRE'];
		
		if(empty($B2) or empty($BC2)){
		$B2=""; $BC2="";
		}}
	//COMMENTAIRE A1 RG 3
		$Afficher_B3=db_connect('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="B" and RDC_RANG=3 and MISSION_ID='.$mission_id);
		foreach ($Afficher_B3 as $val){
		$B3=$val['RDC_REPONSE'];
		$BC3=$val['RDC_COMMENTAIRE'];
		
		if(empty($B3) or empty($BC3)){
		$B3=""; $BC3="";
		}}
	//COMMENTAIRE A1 RG 4
		$Afficher_B4=db_connect('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="B" and RDC_RANG=4 and MISSION_ID='.$mission_id);
		foreach ($Afficher_B4 as $val){
		$B4=$val['RDC_REPONSE'];
		$BC4=$val['RDC_COMMENTAIRE'];
		
		if(empty($B4) or empty($BC4)){
		$BC4=""; $B4="";
		}}
		//=================================================C==================================================
		//COMMENTAIRE C RG 1
		$Afficher_C=db_connect('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="C" and RDC_RANG=1 and MISSION_ID='.$mission_id);
		foreach ($Afficher_C as $val){
		$C1=$val['RDC_REPONSE'];
		$CC1=$val['RDC_COMMENTAIRE'];
		
		if(empty($C1) or empty($CC1)){
		$CC1=""; $C1="";
		}}
	//COMMENTAIRE C1 RG 2
		$Afficher_C2=db_connect('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="C" and RDC_RANG=2 and MISSION_ID='.$mission_id);
		foreach ($Afficher_C2 as $val){
		$C2=$val['RDC_REPONSE'];
		$CC2=$val['RDC_COMMENTAIRE'];
		
		if(empty($C2) or empty($CC2)){
		$C2=""; $CC2="";
		}}
		//=================================================D==================================================
		//COMMENTAIRE C RG 1
		$Afficher_D=db_connect('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="D" and RDC_RANG=1 and MISSION_ID='.$mission_id);
		foreach ($Afficher_D as $val){
		$D1=$val['RDC_REPONSE'];
		$DC1=$val['RDC_COMMENTAIRE'];
		
		if(empty($D1) or empty($DC1)){
		$DC1=""; $D1="";
		}}
	//COMMENTAIRE C1 RG 2
		$Afficher_D2=db_connect('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="D" and RDC_RANG=2 and MISSION_ID='.$mission_id);
		foreach ($Afficher_D2 as $val){
		$D2=$val['RDC_REPONSE'];
		$DC2=$val['RDC_COMMENTAIRE'];
		
		if(empty($D2) or empty($DC2)){
		$D2=""; $DC2="";
		}}
		//COMMENTAIRE C RG 1
		$Afficher_D3=db_connect('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="D" and RDC_RANG=3 and MISSION_ID='.$mission_id);
		foreach ($Afficher_D3 as $val){
		$D3=$val['RDC_REPONSE'];
		$DC3=$val['RDC_COMMENTAIRE'];
		
		if(empty($D3) or empty($DC3)){
		$DC3=""; $D3="";
		}}
	//COMMENTAIRE C1 RG 2
		$Afficher_D4=db_connect('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="D" and RDC_RANG=4 and MISSION_ID='.$mission_id);
		foreach ($Afficher_D4 as $val){
		$D4=$val['RDC_REPONSE'];
		$DC4=$val['RDC_COMMENTAIRE'];
		
		if(empty($D4) or empty($DC4)){
		$D4=""; $DC4="";
		}}
	
	//COMMENTAIRE E
		$Afficher_E=db_connect('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="E" and RDC_RANG=1 and MISSION_ID='.$mission_id);
		foreach ($Afficher_E as $val){
		$E=$val['RDC_REPONSE'];
		$EC=$val['RDC_COMMENTAIRE'];
		
		if(empty($E) or empty($EC)){
		$E=""; $EC="";
		}}
	
    //====================================================================================================
	//                               FIN REQUETE
	//====================================================================================================

		
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

require_once 'Classes/PHPExcel/IOFactory.php';



//echo date('H:i:s') , " Load from Excel5 template" , EOL;
$objReader = PHPExcel_IOFactory::createReader('Excel5');

$objPHPExcel = $objReader->load("Template/Fond_propre.xls");




$F="DFDFDFD";
$feuille = $objPHPExcel->getSheet( 1 );
$feuille->setCellValue('D1', PHPExcel_Shared_Date::PHPToExcel(time())); //Date D 1

//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//COMMENTAIRE A RG1
$objPHPExcel->getActiveSheet()->setCellValue('A1',$ENTREPRISE_DENOMINATION_SOCIAL); 
$objPHPExcel->getActiveSheet()->setCellValue('A2',$MISSION_TYPE); 
$objPHPExcel->getActiveSheet()->setCellValue('A3','Exercice clos le'.$MISSION_DATE_CLOTURE);


//COMMENTAIRE A RG1
$objPHPExcel->getActiveSheet()->setCellValue('D9',$A1); 
$objPHPExcel->getActiveSheet()->setCellValue('E9',$AC1); 

//COMMENTAIRE A1 RG2
$objPHPExcel->getActiveSheet()->setCellValue('D10',$A11); 
$objPHPExcel->getActiveSheet()->setCellValue('E10',$AC11); 

//COMMENTAIRE A1 RG3
$objPHPExcel->getActiveSheet()->setCellValue('D11',$A13); 
$objPHPExcel->getActiveSheet()->setCellValue('E11',$AC13); 

//COMMENTAIRE A1 RG4
$objPHPExcel->getActiveSheet()->setCellValue('D12',$A14); 
$objPHPExcel->getActiveSheet()->setCellValue('E12',$AC14); 

//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//COMMENTAIRE B RG1

$objPHPExcel->getActiveSheet()->setCellValue('D14',$B1); 
$objPHPExcel->getActiveSheet()->setCellValue('E14',$BC1); 


//COMMENTAIRE B2 RG2
$objPHPExcel->getActiveSheet()->setCellValue('D15',$B2); 
$objPHPExcel->getActiveSheet()->setCellValue('E15',$BC2); 

//COMMENTAIRE B3 RG3
$objPHPExcel->getActiveSheet()->setCellValue('D16',$B3); 
$objPHPExcel->getActiveSheet()->setCellValue('E16',$BC3); 

//COMMENTAIRE B4 RG4
$objPHPExcel->getActiveSheet()->setCellValue('D17',$B4);

