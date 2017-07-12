<?php
@session_start();
include('../../../../connexion.php');
include "../../../connex.php"; 

//$_SESSION['idMission']=3;
$date_entete=date('d-m-Y');

//ENTREPRISE ET MISSION ANNEE
$get_entreprise=db_connect("select DISTINCT(m.ENTREPRISE_ID),m.MISSION_ANNEE,e.ENTREPRISE_DENOMINATION_SOCIAL 
 from tab_mission m,tab_entreprise e,tab_objectif o
  where m.MISSION_ID='".$_SESSION['idMission']."' 
        and m.ENTREPRISE_ID=e.ENTREPRISE_ID
        and o.MISSION_ID=m.MISSION_ID
        and UTIL_ID='".$_SESSION['id']."'");
foreach ($get_entreprise as $val){
		$Entreprise =$val['ENTREPRISE_DENOMINATION_SOCIAL'];
		$exercice =$val['MISSION_ANNEE'];
	}

//SELECT QUESTION_ID FROM tab_objectif WHERE UTIL_ID=1 AND MISSION_ID=3 AND QUESTION_ID BETWEEN 23 AND 33
$req='SELECT QUESTION_ID,OBJECTIF_QCM,OBJECTIF_COMMENTAIRE FROM tab_objectif WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=26';
$r1=$r1b=$r2b=$r3b=$r4b=$r5b=$r6b=$r7b=$r8b=$r9b=$r10b=$r11b=$r12b=$r13b=$r14b=$r15b=$r16b=$r17b=$r18b=$r19b=$r20b=$r21b=$r22b="";
$r2="";
$r3=$r4=$r5=$r6=$r7=$r8=$r9=$r10=$r11=$r12=$r13=$r14=$r15=$r16=$r17=$r18=$r19=$r20=$r21=$r22="";
$reponse2=$bdd->query($req);
$i=0;

$commentaire=array();
$k=0;
$scoreB=array();
while($donnee=$reponse2->fetch()){
	//eto no mi cocher anlé reporting
	$commentaire[$i]=$donnee['OBJECTIF_COMMENTAIRE'];
	$i++;
	/*if(empty($donnee['OBJECTIF_COMMENTAIRE'])){
		$commentaire[$i]="No Comment";
		$i++;
	}
	else {
		$commentaire[$i]=$donnee['OBJECTIF_COMMENTAIRE'];
		$i++;
	}*/
	//question numero 1 - a)
	if(($donnee['QUESTION_ID']=="318")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r1="X";$scoreB[$k]=1;$k++;
	}
	//question numero 1 - b)
	else if(($donnee['QUESTION_ID']=="318")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r1b="X";$scoreB[$k]=0;$k++;
	}
	//=========================================================================================================
	if(($donnee['QUESTION_ID']=="319")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r2="X";$scoreB[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="319")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r2b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="320")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r3="X";$scoreB[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="320")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r3b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="321")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r4="X";$scoreB[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="321")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r4b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="322")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r5="X";$scoreB[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="322")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r5b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="323")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r6="X";$scoreB[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="323")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r6b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="324")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r7="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="324")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r7b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="325")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r8="X";$scoreB[$k]=8;$k++;
	}
	else if(($donnee['QUESTION_ID']=="325")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r8b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="326")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r9="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="326")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r9b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="327")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r10="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="327")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r10b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="328")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r11="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="328")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r11b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="329")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r12="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="329")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r12b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="330")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r13="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="330")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r13b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="331")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r14="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="331")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r14b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="332")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r15="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="332")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r15b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="333")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r16="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="333")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r16b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="334")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r17="X";$scoreB[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="334")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r17b="X";$scoreB[$k]=0;$k++;
	}
	
	//==========================================================================================================

	/*if(($donnee['QUESTION_ID']=="18")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r18="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="18")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r18b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="19")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r19="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="19")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r19b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="20")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r20="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="20")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r20b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="21")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r21="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="21")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r21b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="22")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r22="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="22")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r22b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================
*/
}
$total_scoreB=0;
$max = sizeof($scoreB);
for($i=0;$i<$max;$i++){
	$total_scoreB=$total_scoreB + $scoreB[$i];
}
//====================================================================================================================================

// REQUETE MAKA ANLE CASE A COCHER CYCLE ACHAT

$q1="";
$q2="";
$q3=$q4=$q5=$q6=$q7=$q8=$q9=$q10=$q11=$q12=$q13=$q14=$q15=$q16=$q17=$q18=$q19=$q20=$q21=$q22="";
$q23=$q24=$q25=$q26=$q27=$q28=$q29="";
$q30=$q31=$q32=$q33=$q34=$q35="";
$req1='select FONCT_A_LIGNE,MISSION_ID,UTIL_ID from tab_fonct_a WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND FONCT_A_NOM="vente" ';
$reponse=$bdd->query($req1);
while($donnee=$reponse->fetch()){
	if($donnee['FONCT_A_LIGNE']=="1"){
		$q1="X";
	}
	if($donnee['FONCT_A_LIGNE']=="2"){
		$q2="X";
	}
	if($donnee['FONCT_A_LIGNE']=="3"){
		$q3="X";
	}
	if($donnee['FONCT_A_LIGNE']=="4"){
		$q4="X";
	}
	if($donnee['FONCT_A_LIGNE']=="5"){
		$q5="X";
	}
	if($donnee['FONCT_A_LIGNE']=="6"){
		$q6="X";
	}
	if($donnee['FONCT_A_LIGNE']=="7"){
		$q7="X";
	}
	if($donnee['FONCT_A_LIGNE']=="8"){
		$q8="X";
	}
	if($donnee['FONCT_A_LIGNE']=="9"){
		$q9="X";
	}
	if($donnee['FONCT_A_LIGNE']=="10"){
		$q10="X";
	}
	if($donnee['FONCT_A_LIGNE']=="11"){
		$q11="X";
	}
	if($donnee['FONCT_A_LIGNE']=="12"){
		$q12="X";
	}
	if($donnee['FONCT_A_LIGNE']=="13"){
		$q13="X";
	}
	if($donnee['FONCT_A_LIGNE']=="14"){
		$q14="X";
	}
	if($donnee['FONCT_A_LIGNE']=="15"){
		$q15="X";
	}
	if($donnee['FONCT_A_LIGNE']=="16"){
		$q16="X";
	}
	if($donnee['FONCT_A_LIGNE']=="17"){
		$q17="X";
	}
	if($donnee['FONCT_A_LIGNE']=="18"){
		$q18="X";
	}
	if($donnee['FONCT_A_LIGNE']=="19"){
		$q19="X";
	}
	if($donnee['FONCT_A_LIGNE']=="20"){
		$q20="X";
	}
	if($donnee['FONCT_A_LIGNE']=="21"){
		$q21="X";
	}
	if($donnee['FONCT_A_LIGNE']=="22"){
		$q22="X";
	}
	if($donnee['FONCT_A_LIGNE']=="23"){
		$q23="X";
	}
	if($donnee['FONCT_A_LIGNE']=="24"){
		$q24="X";
	}
	if($donnee['FONCT_A_LIGNE']=="25"){
		$q25="X";
	}
	if($donnee['FONCT_A_LIGNE']=="26"){
		$q26="X";
	}
	
		if($donnee['FONCT_A_LIGNE']=="27"){
		$q27="X";
	}
	if($donnee['FONCT_A_LIGNE']=="28"){
		$q28="X";
	}
	if($donnee['FONCT_A_LIGNE']=="29"){
		$q29="X";
	}
	if($donnee['FONCT_A_LIGNE']=="30"){
		$q30="X";
	}
	
	if($donnee['FONCT_A_LIGNE']=="31"){
		$q31="X";
	}
	if($donnee['FONCT_A_LIGNE']=="32"){
		$q32="X";
	}
	if($donnee['FONCT_A_LIGNE']=="33"){
		$q33="X";
	}
	if($donnee['FONCT_A_LIGNE']=="34"){
		$q34="X";
	}
	if($donnee['FONCT_A_LIGNE']=="35"){
		$q35="X";
	}
	
	
}
//-==============================================================================+++++++++++++++++++++++++++++++++++======
$comm=$synth="";
$req2='SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE from tab_synthese WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=26';
$reponse1=$bdd->query($req2);
$donnee1=$reponse1->fetch();
$comm=$donnee1['SYNTHESE_COMMENTAIRE'];
$synth=$donnee1['SYNTHESE_RISQUE'];
//=======================================================================================================================
//CONCLUSION ET RISQUE B
$comm1=$synth1="";
$req21='SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE from tab_synthese WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=2';
$reponse11=$bdd->query($req21);
$donnee11=$reponse11->fetch();
$comm1=$donnee11['SYNTHESE_COMMENTAIRE'];
$synth1=$donnee11['SYNTHESE_RISQUE'];
//=======================================================================================================================
//CONCLUSION ET RISQUE C
$comm2=$synth2="";
$req211='SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE from tab_synthese WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=3';
$reponse111=$bdd->query($req211);
$donnee111=$reponse111->fetch();
$comm2=$donnee111['SYNTHESE_COMMENTAIRE'];
$synth2=$donnee111['SYNTHESE_RISQUE'];
//=======================================================================================================================
//CONCLUSION ET RISQUE D
$comm3=$synth3="";
$req2111='SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE from tab_synthese WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=4';
$reponse1111=$bdd->query($req2111);
$donnee1111=$reponse1111->fetch();
$comm3=$donnee1111['SYNTHESE_COMMENTAIRE'];
$synth3=$donnee1111['SYNTHESE_RISQUE'];
//=======================================================================================================================
//CONCLUSION ET RISQUE E
$comm4=$synth4="";
$req21111='SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE from tab_synthese WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=5';
$reponse11111=$bdd->query($req21111);
$donnee11111=$reponse11111->fetch();
$comm4=$donnee11111['SYNTHESE_COMMENTAIRE'];
$synth4=$donnee11111['SYNTHESE_RISQUE'];
//=======================================================================================================================
//CONCLUSION ET RISQUE E
$comm5=$synth5="";
$req211111='SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE from tab_synthese WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=6';
$reponse111111=$bdd->query($req211111);
$donnee111111=$reponse111111->fetch();
$comm5=$donnee111111['SYNTHESE_COMMENTAIRE'];
$synth5=$donnee111111['SYNTHESE_RISQUE'];
//========================================================================================================================
$req3='SELECT QUESTION_ID,OBJECTIF_QCM,OBJECTIF_COMMENTAIRE FROM tab_objectif WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=27';
$c1=$c1b=$c2b=$c3b=$c4b=$c5b=$c6b=$c7b=$c8b=$c9b=$c10b=$c11b=$c12b=$c13b=$c14b=$c15b="";
$c2="";
$c3=$c4=$c5=$c6=$c7=$c8=$c9=$c10=$c11="";
$c12=$c13=$c14=$c15="";
$reponse2=$bdd->query($req3);
$ii=0;
$k=0;
$commentaireC=array();
$scoreC=array();

while($donnee=$reponse2->fetch()){
	//eto no mi cocher anlé reporting
	$commentaireC[$ii]=$donnee['OBJECTIF_COMMENTAIRE'];
	$ii++;
	//question numero 1 - a)
	if(($donnee['QUESTION_ID']=="335")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$scoreC[$k]=2;$k++;
		$c1="X";
	}
	//question numero 1 - b)
	else if(($donnee['QUESTION_ID']=="335")&&($donnee['OBJECTIF_QCM']=="NON")){
		$scoreC[$k]=0;$k++;
		$c1b="X";
	}
	//=========================================================================================================
	if(($donnee['QUESTION_ID']=="336")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$scoreC[$k]=3;$k++;
		$c2="X";
	}
	else if(($donnee['QUESTION_ID']=="336")&&($donnee['OBJECTIF_QCM']=="NON")){
		$scoreC[$k]=0;$k++;
		$c2b="X";
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="337")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$scoreC[$k]=3;$k++;
		$c3="X";
	}
	else if(($donnee['QUESTION_ID']=="337")&&($donnee['OBJECTIF_QCM']=="NON")){
		$scoreC[$k]=0;$k++;
		$c3b="X";
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="338")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c4="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="338")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c4b="X";
		$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="339")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c5="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="339")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c5b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="340")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c6="X";$scoreC[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="340")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c6b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="341")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c7="X";$scoreC[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="341")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c7b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="342")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c8="X";$scoreC[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="342")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c8b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="343")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c9="X";$scoreC[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="343")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c9b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="344")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c10="X";$scoreC[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="344")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c10b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="345")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c11="X";$scoreC[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="345")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c11b="X";$scoreC[$k]=0;$k++;
	}
	
	//==========================================================================================================
		if(($donnee['QUESTION_ID']=="346")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c12="X";$scoreC[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="346")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c12b="X";$scoreC[$k]=0;$k++;
	}
	//==============================
	if(($donnee['QUESTION_ID']=="347")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c13="X";$scoreC[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="347")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c13b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="348")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c14="X";$scoreC[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="348")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c14b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="349")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c15="X";$scoreC[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="349")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c15b="X";$scoreC[$k]=0;$k++;
	}

}
$total_scoreC=0;
$max = sizeof($scoreC);
for($i=0;$i<$max;$i++){
	$total_scoreC=$total_scoreC + $scoreC[$i];
}
//========================================================================================================================
$req4='SELECT QUESTION_ID,OBJECTIF_QCM,OBJECTIF_COMMENTAIRE FROM tab_objectif WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=28';
$d1=$d1b=$d2b=$d3b=$d4b=$d5b=$d6b=$d7b=$d8b=$d9b=$d10b=$d11b=$d12b="";

$d13b=$d14b=$d15b=$d16b=$d17b=$d18b=$d19b=$d20b=$d21b=$d22b=$d23b=$d24b=$d25b="";
$d26b=$d27b=$d28b=$d29b=$d30b=$d31b=$d32b=$d33b=$d34b=$d35b="";

$d14=$d16=$d18=$d20=$d22=$d24=$d26=$d28=$d30=$d32="";
$d15=$d17=$d19=$d21=$d23=$d25=$d27=$d29=$d31=$d32=$d33=$d34=$d35="";

$d2="";
$d3=$d4=$d5=$d6=$d7=$d8=$d9=$d10=$d11=$d12="";

$d13=$d14=$d16=$d18=$d6=$d7=$d8=$d9=$d10=$d11=$d12="";
$d15=$d17=$d18=$d6=$d7=$d8=$d9=$d10=$d11=$d12="";

$reponse2=$bdd->query($req4);
$iii=0;
$commentaireD=array();
$k=0;
$scoreD=array();

while($donnee=$reponse2->fetch()){
	//eto no mi cocher anlé reporting
	$commentaireD[$iii]=$donnee['OBJECTIF_COMMENTAIRE'];
	$iii++;
	//question numero 1 - a)
	if(($donnee['QUESTION_ID']=="351")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d1="X";$scoreD[$k]=2;$k++;
	}
	//question numero 1 - b)
	else if(($donnee['QUESTION_ID']=="351")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d1b="X";$scoreD[$k]=0;$k++;
	}
	//=========================================================================================================
	if(($donnee['QUESTION_ID']=="352")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d2="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="352")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d2b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="353")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d3="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="353")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d3b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="354")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d4="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="354")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d4b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="355")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d5="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="355")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d5b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="356")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d6="X";$scoreD[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="356")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d6b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="357")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d7="X";$scoreD[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="357")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d7b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="358")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d8="X";$scoreD[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="358")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d8b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="359")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d9="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="359")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d9b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="360")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d10="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="360")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d10b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="361")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d11="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="361")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d11b="X";$scoreD[$k]=0;$k++;
	}
	
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="362")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d12="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="362")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d12b="X";$scoreD[$k]=0;$k++;
	}
	
	//==========================================================================================================

	
		//==========================================================================================================

	if(($donnee['QUESTION_ID']=="363")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d13="X";$scoreD[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="363")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d13b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="364")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d14="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="364")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d14b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="365")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d15="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="365")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d15b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="366")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d16="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="366")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d16b="X";$scoreD[$k]=0;$k++;
	}
	
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="367")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d17="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="367")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d17b="X";$scoreD[$k]=0;$k++;
	}
	
	//==========================================================================================================
if(($donnee['QUESTION_ID']=="368")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d18="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="368")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d18b="X";$scoreD[$k]=0;$k++;
	}
	
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="369")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d19="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="369")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d19b="X";$scoreD[$k]=0;$k++;
	}
		//==========================================================================================================
	if(($donnee['QUESTION_ID']=="370")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d20="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="370")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d20b="X";$scoreD[$k]=0;$k++;
	}
		//==========================================================================================================
	if(($donnee['QUESTION_ID']=="371")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d21="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="371")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d21b="X";$scoreD[$k]=0;$k++;
	}
		//==========================================================================================================
	if(($donnee['QUESTION_ID']=="372")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d22="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="372")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d22b="X";$scoreD[$k]=0;$k++;
	}
			//==========================================================================================================
	if(($donnee['QUESTION_ID']=="373")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d23="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="373")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d23b="X";$scoreD[$k]=0;$k++;
	}
				//==========================================================================================================
	if(($donnee['QUESTION_ID']=="374")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d24="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="374")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d24b="X";$scoreD[$k]=0;$k++;
	}
				//==========================================================================================================
	if(($donnee['QUESTION_ID']=="375")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d25="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="375")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d25b="X";$scoreD[$k]=0;$k++;
	}
					//==========================================================================================================
	if(($donnee['QUESTION_ID']=="376")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d26="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="376")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d26b="X";$scoreD[$k]=0;$k++;
	}
						//==========================================================================================================
	if(($donnee['QUESTION_ID']=="377")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d27="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="377")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d27b="X";$scoreD[$k]=0;$k++;
	}
							//==========================================================================================================
	if(($donnee['QUESTION_ID']=="378")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d28="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="378")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d28b="X";$scoreD[$k]=0;$k++;
	}
								//==========================================================================================================
	if(($donnee['QUESTION_ID']=="379")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d29="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="379")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d29b="X";$scoreD[$k]=0;$k++;
	}
								//==========================================================================================================
	if(($donnee['QUESTION_ID']=="380")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d30="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="380")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d30b="X";$scoreD[$k]=0;$k++;
	}
									//==========================================================================================================
	if(($donnee['QUESTION_ID']=="381")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d31="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="381")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d31b="X";$scoreD[$k]=0;$k++;
	}
										//==========================================================================================================
	if(($donnee['QUESTION_ID']=="382")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d32="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="382")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d32b="X";$scoreD[$k]=0;$k++;
	}
											//==========================================================================================================
	if(($donnee['QUESTION_ID']=="383")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d33="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="383")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d33b="X";$scoreD[$k]=0;$k++;
	}
												//==========================================================================================================
	if(($donnee['QUESTION_ID']=="384")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d34="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="384")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d34b="X";$scoreD[$k]=0;$k++;
	}
												//==========================================================================================================
	if(($donnee['QUESTION_ID']=="385")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d35="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="385")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d35b="X";$scoreD[$k]=0;$k++;
	}

	
}
$total_scoreD=0;
$max = sizeof($scoreD);
for($i=0;$i<$max;$i++){
	$total_scoreD=$total_scoreD + $scoreD[$i];
}

//========================================================================================================================
$req5='SELECT QUESTION_ID,OBJECTIF_QCM,OBJECTIF_COMMENTAIRE FROM tab_objectif WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=5';
$e1=$e1b=$e2b=$e3b=$e4b=$e5b=$e6b=$e7b=$e8b=$e9b="";
$e2="";
$e3=$e4=$e5=$e6=$e7=$e8=$e9="";
$reponse24=$bdd->query($req5);
$iiii=0;
$commentaireE=array();
$k=0;
$scoreE=array();
while($donnee=$reponse24->fetch()){
	//eto no mi cocher anlé reporting
	$commentaireE[$iiii]=$donnee['OBJECTIF_COMMENTAIRE'];
	$iiii++;
	//question numero 1 - a)
	if(($donnee['QUESTION_ID']=="46")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$e1="X";$scoreE[$k]=3;$k++;
	}
	//question numero 1 - b)
	else if(($donnee['QUESTION_ID']=="46")&&($donnee['OBJECTIF_QCM']=="NON")){
		$e1b="X";$scoreE[$k]=0;$k++;
	}
	//=========================================================================================================
	if(($donnee['QUESTION_ID']=="47")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$e2="X";$scoreE[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="47")&&($donnee['OBJECTIF_QCM']=="NON")){
		$e2b="X";$scoreE[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="48")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$e3="X";$scoreE[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="48")&&($donnee['OBJECTIF_QCM']=="NON")){
		$e3b="X";$scoreE[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="49")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$e4="X";$scoreE[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="49")&&($donnee['OBJECTIF_QCM']=="NON")){
		$e4b="X";$scoreE[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="50")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$e5="X";$scoreE[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="50")&&($donnee['OBJECTIF_QCM']=="NON")){
		$e5b="X";$scoreE[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="51")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$e6="X";$scoreE[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="51")&&($donnee['OBJECTIF_QCM']=="NON")){
		$e6b="X";$scoreE[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="52")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$e7="X";$scoreE[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="52")&&($donnee['OBJECTIF_QCM']=="NON")){
		$e7b="X";$scoreE[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="53")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$e8="X";$scoreE[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="53")&&($donnee['OBJECTIF_QCM']=="NON")){
		$e8b="X";$scoreE[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="54")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$e9="X";$scoreE[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="54")&&($donnee['OBJECTIF_QCM']=="NON")){
		$e9b="X";$scoreE[$k]=0;$k++;
	}
	//==========================================================================================================

}
$total_scoreE=0;
$max = sizeof($scoreE);
for($i=0;$i<$max;$i++){
	$total_scoreE=$total_scoreE + $scoreE[$i];
}

//========================================================================================================================
$req6='SELECT QUESTION_ID,OBJECTIF_QCM,OBJECTIF_COMMENTAIRE FROM tab_objectif WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=6';
$f1=$f1b=$f2b=$f3b=$f4b=$f5b=$f6b=$f7b=$f8b=$f9b=$f10b=$f11b=$f12b=$f13b=$f14b=$f15b="";
$f2="";
$f3=$f4=$f5=$f6=$f7=$f8=$f9=$f10=$f11=$f12=$f13=$f14=$f15="";
$reponse241=$bdd->query($req6);
$iiiii=0;
$commentaireF=array();
$k=0;
$scoreF=array();
while($donnee=$reponse241->fetch()){
	//eto no mi cocher anlé reporting
	$commentaireF[$iiiii]=$donnee['OBJECTIF_COMMENTAIRE'];
	$iiiii++;
	//question numero 1 - a)
	if(($donnee['QUESTION_ID']=="55")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$f1="X";$scoreF[$k]=2;$k++;
	}
	//question numero 1 - b)
	else if(($donnee['QUESTION_ID']=="55")&&($donnee['OBJECTIF_QCM']=="NON")){
		$f1b="X";$scoreF[$k]=0;$k++;
	}
	//=========================================================================================================
	if(($donnee['QUESTION_ID']=="56")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$f2="X";$scoreF[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="56")&&($donnee['OBJECTIF_QCM']=="NON")){
		$f2b="X";$scoreF[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="57")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$f3="X";$scoreF[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="57")&&($donnee['OBJECTIF_QCM']=="NON")){
		$f3b="X";$scoreF[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="58")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$f4="X";$scoreF[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="58")&&($donnee['OBJECTIF_QCM']=="NON")){
		$f4b="X";$scoreF[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="59")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$f5="X";$scoreF[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="59")&&($donnee['OBJECTIF_QCM']=="NON")){
		$f5b="X";$scoreF[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="60")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$f6="X";$scoreF[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="60")&&($donnee['OBJECTIF_QCM']=="NON")){
		$f6b="X";$scoreF[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="61")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$f7="X";$scoreF[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="61")&&($donnee['OBJECTIF_QCM']=="NON")){
		$f7b="X";$scoreF[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="62")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$f8="X";$scoreF[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="62")&&($donnee['OBJECTIF_QCM']=="NON")){
		$f8b="X";$scoreF[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="63")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$f9="X";$scoreF[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="63")&&($donnee['OBJECTIF_QCM']=="NON")){
		$f9b="X";$scoreF[$k]=0;$k++;
	}
		//==========================================================================================================

	if(($donnee['QUESTION_ID']=="64")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$f10="X";$scoreF[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="64")&&($donnee['OBJECTIF_QCM']=="NON")){
		$f10b="X";$scoreF[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="65")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$f11="X";$scoreF[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="65")&&($donnee['OBJECTIF_QCM']=="NON")){
		$f11b="X";$scoreF[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="66")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$f12="X";$scoreF[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="66")&&($donnee['OBJECTIF_QCM']=="NON")){
		$f12b="X";$scoreF[$k]=0;$k++;
	}
		//==========================================================================================================

	if(($donnee['QUESTION_ID']=="67")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$f13="X";$scoreF[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="67")&&($donnee['OBJECTIF_QCM']=="NON")){
		$f13b="X";$scoreF[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="68")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$f14="X";$scoreF[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="68")&&($donnee['OBJECTIF_QCM']=="NON")){
		$f14b="X";$scoreF[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="69")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$f15="X";$scoreF[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="69")&&($donnee['OBJECTIF_QCM']=="NON")){
		$f15b="X";$scoreF[$k]=0;$k++;
	}
	//==========================================================================================================

}
$total_scoreF=0;
$max = sizeof($scoreF);
for($i=0;$i<$max;$i++){
	$total_scoreF=$total_scoreF + $scoreF[$i];
}

        set_time_limit(1200);				
		ini_set("memory_limit","-1");
        ini_alter("memory_limit","-1");
       
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css_cycle_achat.css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<style type="text/css">
<!--
    table.page_header {width: 100%; border: none; background-color: #DDDDFF; border-bottom: solid 1mm #AAAADD; padding: 2mm }
    table.page_footer {width: 100%; border: none; background-color: #DDDDFF; border-top: solid 1mm #AAAADD; padding: 2mm}
    h1 {color: #000033}
    h2 {color: #000055}
    h3 {color: #000077}

    div.niveau
    {
        padding-left: 5mm;
  padding-top:45px;
    } 
 .niveau0
    {
        padding-left: 5mm;
  padding-top:110px;
    }
 table
 {
 border-collapse:collapse;
 border :1px solid black;
 }
-->
</style>
<body>


<page_header>
      <table  border="1" class="table">
        <tr>
          <td width="223"><b>Client</b><br><span style="color: CMYK(0, 0, 100%, 0)"><b><h4><?php if(empty($Entreprise)){}else{ echo $Entreprise;}?></h4></b></span></td>
          <td width="384" align="center"><strong>QUESTIONNAIRE  CONTR&Ocirc;LE INTERNE VENTES </strong></td>
          <td width="120"><b>CODE</b><br><br><span style="color: CMYK(0, 0, 100%, 0)">FC 1</span>  
	      </td>
        </tr>
        <tr>
          <td><b>COLLABORATEUR</b></td>
          <td rowspan="2" align="center"><img src="images/pied.png" width="298" height="84" align="middle"></td>
          <td>FOLIO [[page_cu]]/[[page_nb]]</td>
        </tr>
        <tr>
          <td> <b> SUPERVISION</b></td>
          <td><b>DATE	 <span style="color: CMYK(0, 0, 100%, 0)"><?php echo $date_entete; ?></span></b></td></tr>
      </table>
</page_header>
 
    <page_footer>
        <table  border="0" >
		   <tr> <td colspan="3" >-------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td></tr>
		   <tr>
                <td style="width: 300px; text-align: right">
                  <img src="images/HEADER.png" width="100px" height="20px"  />
                </td>
				<td style="width: 380px; text-align: center">
                  Evaluation des proc&eacute;dures 
                </td><td style="width: 40px; text-align: right">
                    Page [[page_cu]]                </td>
          </tr>
        </table>
    </page_footer>
<!--================================================================================= -->
<div id="conteneur"  style="left:130px; top: 200px;text-align: center; width:560px;  text-justify: newspaper; align:center">
	
<p>	<b>EVALUATION DU CONTROLE DES FOURNISSEURS</b></p>
</div>
<br><br><br><br><br><br>

	
	<div id="corp_objet">
	<b>OBJECTIF DE CONTR&Ocirc;LE :</b>
	<br>
	 <ol style="list-style-type: upper-alpha; height:100px">
                <li style="padding:15px;"> S&rsquo;assurer que les s&eacute;parations de fonctions sont suffisantes.</li>
                <li style="padding:15px;"> S&rsquo;assurer que tous les ventes  (retours) sont saisies  et enregistr&eacute;s (exhaustivit&eacute;).</li>
                <li style="padding:15px;">S'assurer que toutes les ventes (retours) enregistr&eacute;es  sont r&eacute;elles (existence).</li>
                <li style="padding:15px;">S'assurer que toutes les ventes (avoirs)  enregistr&eacute;es sont correctement &eacute;valu&eacute;es.</li>
                <li style="padding:15px;">S'assurer que toutes les ventes (avoirs) sont  enregistr&eacute;es sur la bonne p&eacute;riode.</li>
                <li style="padding:15px;">S'assurer que toutes les ventes (avoirs)  enregistr&eacute;es sont correctement imput&eacute;es, totalis&eacute;es et centralis&eacute;es.</li>
	</ol>
	</div>
	<br><br>
	<div id="corp_objet2">
	<table class="table" align="center" >
	 <tr>
          <td  ><b>Etablissement et mise &agrave; jour :</b></td>
          <td ><b>Supervision :</b></td>
        
      </tr>
		<tr><td>  <br></td><td>  <br></td></tr>
	    <tr>
          <td >&Eacute;tabli par :  ___________________le _____________</td>
          <td >par  ____________________le ____________________</td>
        </tr>
		<tr>
          <td >Mis &agrave; jour par _________________le _____________	</td>
          <td >par ___________________	le ____________________</td>
        </tr><tr>
          <td >Mis &agrave; jour par _________________le _____________	</td>
          <td >par ___________________	le ____________________</td>
        </tr><tr>
          <td >Mis &agrave; jour par _________________le _____________	</td>
          <td >par ___________________	le ____________________</td>
        </tr>
	
	
	</table>
	</div>
	<!--========================================== PAGE 2 ============================================================= -->
	  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	
		
				<!-- tableau PAGE 2-->
						<div   style="padding-top:150px;left:3px; text-align: left; width:732px;  text-justify: newspaper">
							<div style="border:solid"><b> OBJECTIF DE CONTR&ocirc;LE :<br> A - S&rsquo;assurer que les s&eacute;parations de fonctions sont suffisantes
						 </b></div> </div>		<br>
						  
	            <?php echo $q22; ?>
	            <table  border="1" class="table_p1">
					
							<tr>
									  <td width="207" rowspan="2"><div align="center"><strong>Fonctions</strong></div></td>
									  <td colspan="10" width="300"><div align="center"><strong>Personnel concern&eacute;</strong></div></td>
						    </tr>
							<tr>
									  <td style="width:6px" >&nbsp;</td>
									  <td style="width:6px">&nbsp;</td>
									  <td style="width:6px">&nbsp;</td>
									  <td style="width:6px">&nbsp;</td>
									  <td style="width:6px">&nbsp;</td>
									  <td  style="width:6px">&nbsp;</td>
									  <td  style="width:6px">&nbsp;</td>
									  <td  style="width:6px">&nbsp;</td>
									  <td  style="width:6px">&nbsp;</td>
									  <td  style="width:6px">&nbsp;</td>
						    </tr>
						    <tr>
							<td>1 Traitement des commandes</td>
									  <td><?php echo $q1; ?>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
							</tr>
							<tr>
									  <td>2 Examen de la solvabilité des clients</td>
									  <td><?php echo $q2; ?>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
							</tr>
							<tr>
									  <td >3&nbsp;&nbsp;&nbsp;Facturation</td>
									  <td><?php echo $q3; ?>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
							</tr>
							<tr>
									  <td>4&nbsp;&nbsp;&nbsp;&nbsp;Contr&ocirc;le bon de livraison - facture</td>
									  <td><?php echo $q4; ?>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>5&nbsp;&nbsp;&nbsp;Contr&ocirc;le commande - facture</td>
									  <td><?php echo $q5; ?>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>6&nbsp;&nbsp;&nbsp;Tenue du journal des ventes</td>
									  <td><?php echo $q6; ?>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>7&nbsp;&nbsp;&nbsp;V&eacute;rification de la continuit&eacute; des num&eacute;ros de  factures comptabilis&eacute;es</td>
									  <td><?php echo $q7; ?>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>8&nbsp;&nbsp;Liste des bons de sortie non factur&eacute;s</td>
									  <td><?php echo $q8; ?>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>9&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tenue des comptes clients</td>
									  <td><?php echo $q9; ?>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>10&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&Eacute;tablissement de la balance clients</td>
									  <td><?php echo $q10; ?>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>11&nbsp;&nbsp;Etablissement de la balance clients par anciennet&eacute; de solde</td>
									  <td><?php echo $q11; ?>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>12&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rapprochement  balance clients - compte collectif</td>
									  <td><?php echo $q12; ?>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>13&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Centralisation des ventes</td>
									  <td><?php echo $q13; ?>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>14&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D&eacute;termination des conditions de paiement</td>
									  <td><?php echo $q14; ?>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>15&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Relev&eacute; des ch&egrave;ques re&ccedil;us au courrier</td>
									  <td><?php echo $q15; ?>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>16&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D&eacute;tention des effets &agrave; recevoir</td>
									  <td><?php echo $q16; ?>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>17&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tenue du journal des effets &agrave; recevoir</td>
									  <td><?php echo $q17; ?>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>18&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Inventaire des effets &agrave; recevoir</td>
									  <td><?php echo $q18; ?>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>19&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Acc&egrave;s &agrave; la comptabilit&eacute; g&eacute;n&eacute;rale</td>
									  <td><?php echo $q19; ?>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									   <td >20&nbsp;Tenue du journal de tr&eacute;sorerie</td>
									  <td><?php echo $q20; ?>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>21&nbsp;&nbsp;&nbsp;&Eacute;mission d'avoirs</td>
									  <td><?php echo $q21; ?>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>22&nbsp;&nbsp;Approbation des avoirs</td>
									  <td><?php echo $q22; ?>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr>
	  <tr>
	    <td>23  &Eacute;tablissement des relev&eacute;s clients</td>
	    <td><?php echo $q23; ?></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td>24 Envoi des relev&eacute;s aux clients</td>
	    <td><?php echo $q24; ?></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td>25 Comparaison des relev&eacute;s avec les comptes</td>
	    <td><?php echo $q25; ?></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td>26 Comparaison de la balance clients avec les comptes  individuels</td>
	    <td><?php echo $q26; ?></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td>27 Confirmation des comptes clients</td>
	    <td><?php echo $q27; ?></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td>28 Relance des clients</td>
	    <td><?php echo $q28; ?></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td>29 Prolongation des conditions de paiement</td>
	    <td><?php echo $q29; ?></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td>30 Accord d'escomptes</td>
	    <td><?php echo $q30; ?></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td>31 Autorisation de passer en pertes des cr&eacute;ances</td>
	    <td><?php echo $q31; ?></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td>32 D&eacute;tention  de la liste des clients pass&eacute;s en perte</td>
	    <td><?php echo $q32; ?></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td>33 Tenue des comptes d&eacute;biteurs divers</td>
	    <td><?php echo $q33; ?></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td>34 Exp&eacute;dition des produits finis</td>
	    <td><?php echo $q34; ?></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td>35 Surveillance des stocks</td>
	    <td><?php echo $q35; ?></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
				</table>
	<br>
						<table class="table" border="1">
							<tr>
								<td style="width:485px"><b>CONCLUSIONS :</b><br><b><?php echo $comm; ?></b><br><br></td>
								<td  style="width:250px"><b>NIVEAU DE RISQUE</b><br>
									<b><?php echo $synth; ?></b><br><br><br>
							  	</td>
							</tr>
</table>


<!--=============================================================================PAGE 4========================================================= -->
		<page pageset="old">
   <br><br><br><br><br><br><br><br><br><br><br><br>
     
        <table  border="1" style="width:600px">
          <tr>
            <td><div   style="border-solid:1px"> <b> OBJECTIF DE CONTR&ocirc;LE :<br>
              <br>
              B - S&rsquo;assurer que tous les achats (retours) sont saisis et enregistr&eacute;s (exhaustivit&eacute;). </b></div></td>
          </tr>
        </table>
        <br>
        <table width="694" height="30"  border="1" class="table_p1" align="center" >
          <tr>
            <td width="312" align="center"><strong>QUESTIONS</strong></td>
            <td width="48"><p><strong>R&eacute;f<br>
              Diag</strong></p></td>
            <td width="33"><strong>OUI ou N/A</strong></td>
            <td width="36"><strong>NON</strong></td>
            <td width="135"><strong>COMMENTAIRES</strong></td>
          </tr>
          <tr>
            <td width="312" ><p>
              L'acc&egrave;s aux zones de stockage et<br>
              d'exp&eacute;dition  est-il suffisamment prot&eacute;g&eacute;<br>
              pour &eacute;viter des :</p></td>
            <td width="48">&nbsp;</td>
            <td width="33" style="bordure:none"><br>              &nbsp;</td>
            <td width="36"><br>              &nbsp;</td>
            <td width="135">&nbsp;</td>
          </tr>
          <tr>
            <td >a)exp&eacute;ditions sans bon de livraison ?</td>
            <td>&nbsp;</td>
            <td style="bordure:none"><?php echo $r1; ?></td>
            <td><?php echo $r1b; ?></td>
            <td><?php  if(empty($commentaire[0])){}else{echo $commentaire[0];}?></td>
          </tr>
          <tr>
            <td width="312" >b) retours sans bon de retour ?</td>
            <td width="48">&nbsp;</td>
            <td width="33" style="bordure:none"><?php echo $r2; ?></td>
            <td width="36"><?php echo $r2b; ?></td>
            <td><?php  if(empty($commentaire[1])){}else{echo $commentaire[1];} ?></td>
          </tr>
          <tr>
            <td colspan="5" >Les bons d'exp&eacute;dition sont-ils :</td>
          </tr>
          <tr>
            <td >a)	&eacute;tablis sur des formulaires standard ?</td>
            <td width="48">&nbsp;</td>
            <td width="33"><?php echo $r3; ?></td>
            <td width="36"><?php echo $r3b; ?></td>
            <td width="135"><?php  if(empty($commentaire[2])){}else{echo $commentaire[2];} ?></td>
          </tr>
          <tr>
            <td >b)	pr&eacute;num&eacute;rot&eacute;s ? </td>
            <td width="48">&nbsp;</td>
            <td width="33"><?php echo $r4; ?></td>
            <td width="36"><?php echo $r4b; ?></td>
            <td width="135"><?php  if(empty($commentaire[3])){}else{echo $commentaire[3];} ?></td>
          </tr>
          <tr>
            <td colspan="5" >Les bons de retour sont-ils :</td>
          </tr>
          <tr>
            <td >a)	&eacute;tablis sur des formulaires standard ?</td>
            <td width="48">&nbsp;</td>
            <td width="33"><?php echo $r5; ?></td>
            <td width="36"><?php echo $r5b; ?></td>
            <td width="135"><?php  if(empty($commentaire[2])){}else{echo $commentaire[2];}?></td>
          </tr>
          <tr>
            <td >b)	pr&eacute;num&eacute;rot&eacute;s ? </td>
            <td width="48">&nbsp;</td>
            <td width="33"><?php echo $r6; ?></td>
            <td width="36"><?php echo $r6b; ?></td>
            <td width="135"><?php  if(empty($commentaire[4])){}else{echo $commentaire[4];}?></td>
          </tr>
          <tr>
            <td colspan="5" >Le service facturation v&eacute;rifie-t-il la s&eacute;quence  num&eacute;rique  :</td>
          </tr>
          <tr>
            <td >a)	des bons de livraison  ?</td>
            <td width="48">&nbsp;</td>
            <td width="33"><?php echo $r7; ?></td>
            <td width="36"><?php echo $r7b; ?></td>
            <td width="135"><?php  if(empty($commentaire[5])){}else{echo $commentaire[5];}?></td>
          </tr>
          <tr>
            <td >b)des bons de retour  ?pour s'assurer qu'il les re&ccedil;oit tous</td>
            <td width="48">&nbsp;</td>
            <td width="33"><?php echo $r8; ?></td>
            <td width="36"><?php echo $r8b; ?></td>
            <td width="135"><?php  if(empty($commentaire[6])){}else{echo $commentaire[6];}?></td>
          </tr>
          <tr>
            <td width="312" >Les factures et avoirs sont-ils des documents  pr&eacute;num&eacute;rot&eacute;s  ?</td>
            <td width="48">&nbsp;</td>
            <td width="33"><?php echo $r9; ?>&nbsp;</td>
            <td width="36"><?php echo $r9b; ?>&nbsp;</td>
            <td width="135"><?php if(empty($commentaire[7])){}else{echo $commentaire[7];}?>
              &nbsp;</td>
          </tr>
          <tr>
            <td >Le num&eacute;ro des bons de livraison est-il rapproch&eacute;  des num&eacute;ros<br>
              de factures pour s'assurer qu'il sont tous factur&eacute;s  ?</td>
            <td>&nbsp;</td>
            <td><?php echo $r10; ?></td>
            <td><?php echo $r10b; ?></td>
            <td><?php if(empty($commentaire[8])){}else{echo $commentaire[8];} ?></td>
          </tr>
          <tr>
            <td >Le num&eacute;ro des bons de retour est-il rapproch&eacute; des  num&eacute;ros<br>
              d'avoirs  ?</td>
            <td>&nbsp;</td>
            <td><?php echo $r11; ?>&nbsp;</td>
            <td><?php echo $r11b; ?>&nbsp;</td>
            <td><?php  if(empty($commentaire[9])){}else{echo $commentaire[9];}?></td>
          </tr>
          <tr>
            <td width="312" >Les bons de livraison sans facture et les<br>
              bons de  retour sans avoir font-ils l'objet <br>
              d'un examen r&eacute;gulier et de recherches  ?</td>
            <td width="48">&nbsp;</td>
            <td width="33"><?php echo $r12; ?>&nbsp;</td>
            <td width="36"><?php echo $r12b; ?>&nbsp;</td>
            <td width="135"><?php if(empty($commentaire[10])){}else{echo $commentaire[10];} ?>
              &nbsp;</td>
          </tr>
          <tr>
            <td >Les quantit&eacute;s re&ccedil;ues sont-elles rapproch&eacute;es des  quantit&eacute;s factur&eacute;es <br>
              pour &eacute;viter les facturations partielles ?</td>
            <td>&nbsp;</td>
            <td><?php echo $r13; ?></td>
            <td><?php echo $r13b; ?></td>
            <td><?php if(empty($commentaire[12])){}else{echo $commentaire[12];} ?></td>
          </tr>
          <tr>
            <td >Les quantit&eacute;s retourn&eacute;es sont-elles rapproch&eacute;es des  avoirs <br>
              &eacute;mis pour &eacute;viter les avoirs partiels ?</td>
            <td>&nbsp;</td>
            <td><?php echo $r14; ?></td>
            <td><?php echo $r14b; ?></td>
            <td><?php if(empty($commentaire[13])){}else{echo $commentaire[13];} ?></td>
          </tr>
          <tr>
            <td >Le service comptable v&eacute;rifie-t-il la s&eacute;quence <br> num&eacute;rique des factures pour s'assurer, avant comptabilisation,<br> qu'il les a  toutes re&ccedil;ues ?</td>
            <td>&nbsp;</td>
            <td><?php echo $r15; ?></td>
            <td><?php echo $r15b; ?></td>
            <td><?php if(empty($commentaire[14])){}else{echo $commentaire[14];} ?></td>
          </tr>
          <tr>
            <td >Le service comptable v&eacute;rifie-t-il la <br>s&eacute;quence  num&eacute;rique des avoirs pour s'assurer qu'il<br> les a tous re&ccedil;us  ?</td>
            <td>&nbsp;</td>
            <td><?php echo $r16; ?></td>
            <td><?php echo $r16b; ?></td>
            <td><?php if(empty($commentaire[15])){}else{echo $commentaire[15];} ?></td>
          </tr>
          <tr>
            <td >Les listings d&rsquo;anomalies font-ils l&rsquo;objet d&rsquo;un  suivi<br> pour s&rsquo;assurer qu&rsquo;elles sont toutes retrait&eacute;es  ?</td>
            <td>&nbsp;</td>
            <td><?php echo $r17; ?></td>
            <td><?php echo $r17b; ?></td>
            <td><?php if(empty($commentaire[16])){}else{echo $commentaire[16];} ?></td>
          </tr>
          </table>
        <br>
        <div style="border:solid">
          <table class="table" border="1">
            <tr>
              <td style="width:485px"><b>NIVEAU DE RISQUE</b><br>
                <b><?php //echo $comm; ?></b><span style="width:250px"><b><?php echo $synth2; ?></b></span><br>
                <br></td>
              <td  style="width:250px"><br>
                <br><?php echo '<font size="+3"><b>'.$total_scoreB.'/30</b></font>'; ?>
                <br>
                <br></td>
            </tr>
          </table>
        </div>
     
      </page>
      
	

      
      <page pageset="old">		 
<!--============================================================================PAGE 5======================================================== -->
						 	<br><br><br><br><br><br>
<br><br><br><br>				<div   style="left:3px;text-align: left; width:732px;  text-justify: newspaper">
							<b> OBJECTIF DE CONTR&ocirc;LE :<br>C - S&rsquo;assurer que toutes les factures (avoirs) enregistr&eacute;es correspondent &agrave; des achats r&eacute;els de l&rsquo;entreprise.
						 </b> </div><br>			 
						 
						 <table width="694" height="30"  border="1" class="table_p4" align="center" >
							<tr>
							  <td width="305" align="center" ><strong>QUESTIONS</strong></td>
							  <td width="34"><p align="justify"><strong>R&eacute;f<br>Diag</strong></p></td>
							  <td width="55"><strong>OUI ou N/A</strong></td>
							  <td width="43"><strong>NON</strong></td>
							  <td  align="center"> <strong>COMMENTAIRES</strong></td>
							</tr>
							
							<tr>
						 <td width="305" >Les exp&eacute;ditions ne peuvent-elles &ecirc;tre faites qu'au  vu d'un bon<br> 
						   de commande accept&eacute; ?</td>
									  <td width="34"></td>
									  <td width="55" style="bordure:none"><?php echo $c1; ?>&nbsp;</td>
									  <td width="43"><?php echo $c1b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireC[0])){}else{echo $commentaireC[0];} ?>&nbsp;</td>
									 
						    </tr>
							
							<tr>
						      <td >S'assure-t-on de la concordance entre <br>
						        a)les bons d'expédition et les marchandises expédiées </td>
						      <td>&nbsp;</td>
						      <td><?php echo $c2; ?></td>
						      <td><?php echo $c2b; ?></td>
						      <td><?php if(empty($commentaireC[1])){}else{echo $commentaireC[1];} ?></td>
					       </tr>
						    <tr>
						      <td >b)les bons de retour et les marchandises retourn&eacute;es ?</td>
						      <td>&nbsp;</td>
						      <td><?php echo $c3; ?></td>
						      <td><?php echo $c3b; ?></td>
						      <td><?php if(empty($commentaireC[2])){}else{echo $commentaireC[2];} ?></td>
					       </tr>
						    <tr>
						      <td >Toute facture, pour &ecirc;tre &eacute;mise, doit-elle &ecirc;tre  pr&eacute;c&eacute;d&eacute;e<br> par un bon de livraison ?</td>
						      <td>&nbsp;</td>
						      <td><?php echo $c4; ?></td>
						      <td><?php echo $c4b; ?></td>
						      <td><?php if(empty($commentaireC[3])){}else{echo $commentaireC[3];} ?></td>
					       </tr>
						    <tr>
						      <td >Tout avoir, pour &ecirc;tre &eacute;mis, doit-il:</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
					       </tr>
						    <tr>
						      <td >a) &ecirc;tre pr&eacute;c&eacute;d&eacute; par un bon de retour ou un bon de  r&eacute;clamation ?</td>
						      <td>&nbsp;</td>
						      <td><?php echo $c5; ?></td>
						      <td><?php echo $c5b; ?></td>
						      <td><?php if(empty($commentaireC[4])){}else{echo $commentaireC[4];} ?></td>
					       </tr>
						    <tr>
						      <td >V&eacute;rifie-t-on qu'il n'est pas &eacute;mis :</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
					       </tr>
						    <tr>
						      <td >a) plusieurs factures pour la m&ecirc;me livraison&nbsp;?</td>
						      <td>&nbsp;</td>
						      <td><?php echo $c6; ?></td>
						      <td><?php echo $c6b; ?></td>
						      <td><?php if(empty($commentaireC[5])){}else{echo $commentaireC[5];} ?></td>
					       </tr>
						    <tr>
						      <td >b) plusieurs avoirs pour le m&ecirc;me retour ou la m&ecirc;me  r&eacute;clamation ?</td>
						      <td>&nbsp;</td>
						      <td><?php echo $c7; ?></td>
						      <td><?php echo $c7b; ?></td>
						      <td><?php if(empty($commentaireC[6])){}else{echo $commentaireC[6];} ?></td>
					       </tr>
						    <tr>
									  <td width="305" >V&eacute;rifie-t-on que :<br> a)la même facture n'est pas enregistrée plusieurs fois </td>
									  <td width="34"></td>
									  <td width="55"><?php echo $c8; ?>&nbsp;</td>
									  <td width="43"><?php echo $c8b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireC[7])){}else{echo $commentaireC[7];} ?>&nbsp;</td>
									  
						    </tr><tr>
									  <td width="305" >b)le m&ecirc;me avoir n'est pas enregistr&eacute; plusieurs fois ?</td>
									  <td width="34"></td>
									  <td width="55"><?php echo $c9; ?>&nbsp;</td>
									  <td width="43"><?php echo $c9b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireC[8])){}else{echo $commentaireC[8];} ?>&nbsp;</td>
									 
						    </tr>
						    <tr>
						      <td >Les op&eacute;rations diverses sur le journal des ventes  et les comptes clients <br>doivent-elles &ecirc;tre </td>
						      <td width="34"></td>
						      <td width="55">&nbsp;</td>
						      <td width="43">&nbsp;</td>
						      <td width="181">&nbsp;</td>
	                       </tr>
						    <tr>
						      <td >a) appuy&eacute;es par des justificatifs ?</td>
						      <td>&nbsp;</td>
						      <td><?php echo $c10; ?>&nbsp;</td>
						      <td><?php echo $c10b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireC[9])){}else{echo $commentaireC[9];} ?>&nbsp;</td>
						     
					       </tr>
						    <tr>
						      <td>b) approuv&eacute;es par une personne autoris&eacute;e ?</td>
						      <td>&nbsp;</td>
						      <td><?php echo $c11; ?>&nbsp;</td>
						      <td><?php echo $c11b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireC[10])){}else{echo $commentaireC[10];} ?>&nbsp;</td>
						     
					       </tr>
						    <tr>
						      <td>Les factures et avoirs sont-ils exp&eacute;di&eacute;s  directement aux clients <br>par le service facturation ?</td>
						      <td>&nbsp;</td>
						      <td><?php echo $c12; ?></td>
						      <td><?php echo $c12b; ?></td>
						      <td><?php if(empty($commentaireC[11])){}else{echo $commentaireC[11];} ?></td>
					       </tr>
						    <tr>
						      <td>La cr&eacute;ation d&rsquo;un nouveau code client est-elle  autoris&eacute;e  ?</td>
						      <td>&nbsp;</td>
						      <td><?php echo $c13; ?></td>
						      <td><?php echo $c13b; ?></td>
						      <td><?php if(empty($commentaireC[12])){}else{echo $commentaireC[12];} ?></td>
					       </tr>
						    <tr>
						      <td>Le fichier client est-il p&eacute;riodiquement  v&eacute;rifi&eacute;&nbsp; ?</td>
						      <td>&nbsp;</td>
						      <td><?php echo $c14; ?></td>
						      <td><?php echo $c14b; ?></td>
						      <td><?php if(empty($commentaireC[13])){}else{echo $commentaireC[13];} ?></td>
					       </tr>
						    <tr>
						      <td>Les anomalies d&eacute;tect&eacute;es par l&rsquo;ordinateur sont-elles  r&eacute;guli&egrave;rement <br>analys&eacute;es pour s&rsquo;assurer qu&rsquo;elles sont correctement retrait&eacute;es ?</td>
						      <td>&nbsp;</td>
						      <td><?php echo $c15; ?></td>
						      <td><?php echo $c15b; ?></td>
						      <td><?php if(empty($commentaireC[14])){}else{echo $commentaireC[14];} ?></td>
					       </tr>
									 
	            </table>	
			    <br>
				<table class="table" border="1">
				  <tr>
				    <td style="width:485px"><b>NIVEAU DE RISQUE :</b><br>
				      <b><?php echo $synth; ?></b><br>
				      <br></td>
				    <td  style="width:250px"><strong><?php echo '<font size="+3"><b>'.$total_scoreC.'/38</b></font>'; ?></strong><br>
				      <br>
				      <br>
			        <br></td>
			      </tr>
	    </table>
				<br> <br> <br>
<!--=============================================================================================================================================
-->	
           
           
      
</page>
<!--======================================================= PAGE D ====================================================================================
-->

<!--=============================================================================PAGE 4========================================================= -->
		<page pageset="old">
   <br><br><br><br><br><br><br><br><br><br><br><br>
     
        <table  border="1" style="width:600px">
          <tr>
            <td><div   style="border-solid:1px"> <b> OBJECTIF DE CONTR&Ocirc;LE :<br>
              <br>
              D -<strong>S'assurer que toutes les ventes (avoirs) enregistr&eacute;es sont correctement  &eacute;valu&eacute;es.</strong></b></div></td>
          </tr>
        </table>
        <br>
        <table width="694" height="30"  border="1"  align="center" >
          <tr>
            <td width="312" align="center"><strong>QUESTIONS</strong></td>
            <td width="48"><p><strong>R&eacute;f<br>
              Diag</strong></p></td>
            <td width="33"><strong>OUI ou N/A</strong></td>
            <td width="36"><strong>NON</strong></td>
            <td width="135"><strong>COMMENTAIRES</strong></td>
          </tr>
          <tr>
            <td width="312" ><p>Les  tarifs prix sont-ils ?</p></td>
            <td width="48">&nbsp;</td>
            <td class="table_p4"><?php echo $d1; ?></td>
            <td class="table_p4"><?php echo $d1b; ?></td>
            <td class="table_p4"><?php if(empty($commentaireD[0])){}else{echo $commentaireD[0];} ?></td>
          </tr>
          <tr>
            <td width="312" >a)approuv&eacute;s ?</td>
            <td width="48">&nbsp;</td>
            <td class="table_p4"><?php echo $d2; ?></td>
            <td class="table_p4"><?php echo $d2b; ?></td>
            <td class="table_p4"><?php if(empty($commentaireD[1])){}else{echo $commentaireD[1];} ?></td>
          </tr>
          <tr>
            <td >b)r&eacute;guli&egrave;rement  mis &agrave; jour ?</td>
            <td width="48">&nbsp;</td>
            <td class="table_p4"><?php echo $d3; ?></td>
            <td class="table_p4"><?php echo $d3b; ?></td>
            <td class="table_p4"><?php if(empty($commentaireD[2])){}else{echo $commentaireD[2];} ?></td>
          </tr>
          <tr>
            <td >c)diffus&eacute;s  &agrave; tous les intervenants dans le processus<br> 
              de facturation ?</td>
            <td>&nbsp;</td>
            <td class="table_p4"><?php echo $d4; ?></td>
            <td class="table_p4"><?php echo $d4b; ?></td>
            <td class="table_p4"><?php if(empty($commentaireD[3])){}else{echo $commentaireD[3];} ?></td>
          </tr>
          <tr>
            <td >d)correctement  incorpor&eacute;s dans le fichier permanent ?</td>
            <td>&nbsp;</td>
            <td class="table_p4"><?php echo $d5; ?></td>
            <td class="table_p4"><?php echo $d5b; ?></td>
            <td class="table_p4"><?php if(empty($commentaireD[4])){}else{echo $commentaireD[4];} ?></td>
          </tr>
          <tr>
            <td >Les  conditions de remises, ristournes et autres rabais<br> sont-elles </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="312" >a)approuv&eacute;s ?</td>
            <td>&nbsp;</td>
            <td class="table_p4"><?php echo $d6; ?></td>
            <td class="table_p4"><?php echo $d6; ?></td>
            <td class="table_p4"><?php if(empty($commentaireD[5])){}else{echo $commentaireD[5];} ?></td>
          </tr>
          <tr>
            <td >b)r&eacute;guli&egrave;rement  mis &agrave; jour ?</td>
            <td>&nbsp;</td>
            <td class="table_p4"><?php echo $d7; ?></td>
            <td class="table_p4"><?php echo $d7b; ?></td>
            <td class="table_p4"><?php if(empty($commentaireD[6])){}else{echo $commentaireD[6];} ?></td>
          </tr>
          <tr>
            <td >c)diffus&eacute;s  &agrave; tous les intervenants dans le processus<br>
              de facturation ?</td>
            <td>&nbsp;</td>
            <td class="table_p4"><?php echo $d8; ?></td>
            <td class="table_p4"><?php echo $d8b; ?></td>
            <td class="table_p4"><?php if(empty($commentaireD[7])){}else{echo $commentaireD[7];} ?></td>
          </tr>
          <tr>
            <td >d)correctement  incorpor&eacute;s dans le fichier permanent ?</td>
            <td>&nbsp;</td>
            <td class="table_p4"><?php echo $d9; ?></td>
            <td class="table_p4"><?php echo $d9b; ?></td>
            <td class="table_p4"><?php if(empty($commentaireD[8])){}else{echo $commentaireD[8];} ?></td>
          </tr>
          <tr>
            <td >L'acc&egrave;s  au fichier prix </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td >a)manuel</td>
            <td>&nbsp;</td>
            <td class="table_p4"><?php echo $d10; ?></td>
            <td class="table_p4"><?php echo $d10b; ?></td>
            <td class="table_p4"><?php if(empty($commentaireD[9])){}else{echo $commentaireD[9];} ?></td>
          </tr>
          <tr>
            <td >b)informatique est-il prot&eacute;g&eacute; ?</td>
            <td>&nbsp;</td>
            <td class="table_p4"><?php echo $d11; ?></td>
            <td class="table_p4"><?php echo $d11b; ?></td>
            <td class="table_p4"><?php if(empty($commentaireD[10])){}else{echo $commentaireD[10];} ?></td>
          </tr>
          <tr>
            <td >Les  calculs des factures et avoirs sont-ils v&eacute;rifi&eacute;s <br>(ou le logiciel r&eacute;guli&egrave;rement  test&eacute;) </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td >Les taux  de T.V.A. utilis&eacute;s sont-ils v&eacute;rifi&eacute;s ?</td>
            <td>&nbsp;</td>
            <td class="table_p4"><?php echo $d12; ?></td>
            <td class="table_p4"><?php echo $d12b; ?></td>
            <td class="table_p4"><?php if(empty($commentaireD[11])){}else{echo $commentaireD[11];} ?></td>
          </tr>
          <tr>
            <td >Les  comptes clients sont-ils r&eacute;guli&egrave;rement lettr&eacute;s et<br> 
              les &eacute;carts analys&eacute;s ?</td>
            <td>&nbsp;</td>
            <td class="table_p4"><?php echo $d13; ?></td>
            <td class="table_p4"><?php echo $d13b; ?></td>
            <td class="table_p4"><?php if(empty($commentaireD[12])){}else{echo $commentaireD[12];} ?></td>
          </tr>
          <tr>
            <td >Les  clients mauvais payeurs sont-ils :</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td >a)r&eacute;guli&egrave;rement  identifi&eacute;s ?</td>
            <td>&nbsp;</td>
            <td class="table_p4"><?php echo $d14; ?></td>
            <td class="table_p4"><?php echo $d14b; ?></td>
            <td class="table_p4"><?php if(empty($commentaireD[13])){}else{echo $commentaireD[13];} ?></td>
          </tr>
          <tr>
            <td >b)signal&eacute;s  aux intervenants dans le processus de vente<BR> pour &eacute;viter des exp&eacute;ditions qui ne  pourront pas &ecirc;tre<BR> encaiss&eacute;es </td>
            <td>&nbsp;</td>
            <td class="table_p4"><?php echo $d15; ?></td>
            <td class="table_p4"><?php echo $d15b; ?></td>
            <td class="table_p4"><?php if(empty($commentaireD[14])){}else{echo $commentaireD[14];} ?></td>
          </tr>
          <tr>
            <td >c)relanc&eacute;s  de fa&ccedil;on syst&eacute;matique ?</td>
            <td>&nbsp;</td>
            <td class="table_p4"><?php echo $d16; ?></td>
            <td class="table_p4"><?php echo $d16b; ?></td>
            <td class="table_p4"><?php if(empty($commentaireD[15])){}else{echo $commentaireD[15];} ?></td>
          </tr>
          <tr>
            <td >d)remis au  contentieux sur une base r&eacute;guli&egrave;re ?</td>
            <td>&nbsp;</td>
            <td class="table_p4"><?php echo $d16; ?></td>
            <td class="table_p4"><?php echo $d16b; ?></td>
            <td class="table_p4"><?php if(empty($commentaireD[15])){}else{echo $commentaireD[15];} ?></td>
          </tr>
          <tr>
            <td >e)sortis  (ou bloqu&eacute;s) du fichier </td>
            <td>&nbsp;</td>
            <td class="table_p4"><?php echo $d17; ?></td>
            <td class="table_p4"><?php echo $d17b; ?></td>
            <td class="table_p4"><?php if(empty($commentaireD[16])){}else{echo $commentaireD[16];} ?></td>
          </tr>
          <tr>
            <td >Existe-t-il  une proc&eacute;dure de fixation de plafond de <br>
              cr&eacute;dit ?<br>Si oui, ces plafonds sont-ils </td>
            <td>&nbsp;</td>
            <td class="table_p4"><?php echo $d18; ?></td>
            <td class="table_p4"><?php echo $d18b; ?></td>
            <td class="table_p4"><?php if(empty($commentaireD[17])){}else{echo $commentaireD[17];} ?></td>
          </tr>
          <tr>
            <td >a)r&eacute;guli&egrave;rement  actualis&eacute;s ?</td>
            <td>&nbsp;</td>
            <td class="table_p4"><?php echo $d19; ?></td>
            <td class="table_p4"><?php echo $d19b; ?></td>
            <td class="table_p4"><?php if(empty($commentaireD[18])){}else{echo $commentaireD[18];} ?></td>
          </tr>
          <tr>
            <td >b)incorpor&eacute;s  aux fichiers informa-tiques ?</td>
            <td>&nbsp;</td>
            <td class="table_p4"><?php echo $d20; ?></td>
            <td class="table_p4"><?php echo $d20b; ?></td>
            <td class="table_p4"><?php if(empty($commentaireD[19])){}else{echo $commentaireD[19];} ?></td>
          </tr>
          <tr>
            <td >c)compar&eacute;s  avec les encours (y compris effets et <br>commandes non livr&eacute;es) avant acceptation  des<br> commandes ?</td>
            <td>&nbsp;</td>
            <td class="table_p4"><?php echo $d21; ?></td>
            <td class="table_p4"><?php echo $d21b; ?></td>
            <td class="table_p4"><?php if(empty($commentaireD[20])){}else{echo $commentaireD[20];} ?></td>
          </tr>
          <tr>
            <td >Est-il  interdit de faire des exp&eacute;ditions sans commandes<br>  pour &eacute;viter le refus de  livraison et les factures<br>  impay&eacute;es </td>
            <td>&nbsp;</td>
            <td class="table_p4"><?php echo $d22; ?></td>
            <td class="table_p4"><?php echo $d22b; ?></td>
            <td class="table_p4"><?php if(empty($commentaireD[21])){}else{echo $commentaireD[21];} ?></td>
          </tr>
        </table>
     
        
     
</page>

<!-- ====================================================================== -->
<page pageset="old" >
<div style="padding-left:40px">
<br><br><br><br><br><br><br><br><br><br><br><br><br>
				<table width="694" border="1">
				  <tr>
				    <td width="351" class="table_p1"  align="center"><strong>QUESTIONS</strong></td>
				    <td width="70"><strong>R&eacute;f<br>
Diag</strong></td>
				    <td width="35"><strong>OUI ou N/A</strong></td>
				    <td width="56"><strong>NON</strong></td>
				    <td width="148" align="center"><strong>COMMENTAIRES</strong></td>
			      </tr>
				  <tr>
				    <td class="table_p1" >L'insertion  d'un nouveau client dans le fichier est-elle :</td>
				    <td>&nbsp;</td>
				    <td class="table_p4">&nbsp;</td>
				    <td class="table_p4">&nbsp;</td>
				    <td class="table_p4">&nbsp;</td>
			      </tr>
				  <tr>
				    <td class="table_p1" >a)autoris&eacute;e ?</td>
				    <td>&nbsp;</td>
				    <td class="table_p4"><?php echo $d22; ?></td>
				    <td class="table_p4"><?php echo $d22b; ?></td>
				    <td class="table_p4"><?php if(empty($commentaireD[21])){}else{echo $commentaireD[21];} ?></td>
			      </tr>
				  <tr>
				    <td class="table_p1" >b)justifi&eacute;e  par un document officiel prouvant <Br>
				      l'existence du client ?</td>
				    <td>&nbsp;</td>
				    <td class="table_p4"><?php echo $d23; ?></td>
				    <td class="table_p4"><?php echo $d23b; ?></td>
				    <td class="table_p4"><?php if(empty($commentaireD[22])){}else{echo $commentaireD[22];} ?></td>
			      </tr>
				  <tr>
				    <td class="table_p1" >c)v&eacute;rifi&eacute;e  apr&egrave;s saisie dans le fichier informatique </td>
				    <td>&nbsp;</td>
				    <td class="table_p4"><?php echo $d24; ?></td>
				    <td class="table_p4"><?php echo $d24b; ?></td>
				    <td class="table_p4"><?php if(empty($commentaireD[23])){}else{echo $commentaireD[23];} ?></td>
			      </tr>
				  <tr>
				    <td class="table_p1" >Les  modifications du fichier client (notamment <br>
				      changement d'adresse)  sont-elles&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
			      </tr>
				  <tr>
				    <td class="table_p1" >a)autoris&eacute;es ?</td>
				    <td>&nbsp;</td>
				    <td class="table_p4"><?php echo $d25; ?></td>
				    <td class="table_p4"><?php echo $d25b; ?></td>
				    <td class="table_p4"><?php if(empty($commentaireD[24])){}else{echo $commentaireD[24];} ?></td>
			      </tr>
				  <tr>
				    <td class="table_p1" >b)appuy&eacute;es  par des documents officiels du client ?</td>
				    <td>&nbsp;</td>
				    <td class="table_p4"><?php echo $d26; ?></td>
				    <td class="table_p4"><?php echo $d26b; ?></td>
				    <td class="table_p4"><?php if(empty($commentaireD[25])){}else{echo $commentaireD[25];} ?></td>
			      </tr>
				  <tr>
				    <td class="table_p1" >Une  balance par anciennet&eacute; de cr&eacute;ance est-elle&nbsp;:</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
			      </tr>
				  <tr>
				    <td class="table_p1" >a)r&eacute;guli&egrave;rement  &eacute;tablie ?</td>
				    <td>&nbsp;</td>
				    <td class="table_p4"><?php echo $d27; ?></td>
				    <td class="table_p4"><?php echo $d27b; ?></td>
				    <td class="table_p4"><?php if(empty($commentaireD[26])){}else{echo $commentaireD[26];} ?></td>
			      </tr>
				  <tr>
				    <td class="table_p1" >b)exploit&eacute;e  pour d&eacute;terminer les provisions pour <br>
				      clients douteux ?</td>
				    <td>&nbsp;</td>
				    <td class="table_p4"><?php echo $d28; ?></td>
				    <td class="table_p4"><?php echo $d28b; ?></td>
				    <td class="table_p4"><?php if(empty($commentaireD[27])){}else{echo $commentaireD[27];} ?></td>
			      </tr>
				  <tr>
				    <td class="table_p1" >La  politique d'&eacute;tablissement des cr&eacute;ances douteuses <br>
				      est-elle </td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
			      </tr>
				  <tr>
				    <td class="table_p1" >a)clairement  d&eacute;finie ?</td>
				    <td>&nbsp;</td>
				    <td class="table_p4"><?php echo $d29; ?></td>
				    <td class="table_p4"><?php echo $d29b; ?></td>
				    <td class="table_p4"><?php if(empty($commentaireD[28])){}else{echo $commentaireD[28];} ?></td>
			      </tr>
				  <tr>
				    <td class="table_p1" >b)suffisamment  prudente ?</td>
				    <td>&nbsp;</td>
				    <td class="table_p4"><?php echo $d30; ?></td>
				    <td class="table_p4"><?php echo $d30b; ?></td>
				    <td class="table_p4"><?php if(empty($commentaireD[29])){}else{echo $commentaireD[29];} ?></td>
			      </tr>
				  <tr>
				    <td class="table_p1" >Les  cr&eacute;ances pass&eacute;es en perte sont-elles soumises &agrave; <br>
				      l'autorisation d'un responsable ?</td>
				    <td>&nbsp;</td>
				    <td class="table_p4"><?php echo $d31; ?></td>
				    <td class="table_p4"><?php echo $d31b; ?></td>
				    <td class="table_p4"><?php if(empty($commentaireD[30])){}else{echo $commentaireD[30];} ?></td>
			      </tr>
				  <tr>
				    <td class="table_p1" >Lorsque  des ventes sont effectu&eacute;es en devises <br>
				      &eacute;trang&egrave;res :</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
			      </tr>
				  <tr>
				    <td class="table_p1" >a)les  personnes charg&eacute;es de la comptabilisation sont-<br>
				      elles r&eacute;guli&egrave;rement inform&eacute;es  des taux &agrave; utiliser </td>
				    <td>&nbsp;</td>
				    <td class="table_p4"><?php echo $d32; ?></td>
				    <td class="table_p4"><?php echo $d32b; ?></td>
				    <td class="table_p4"><?php if(empty($commentaireD[31])){}else{echo $commentaireD[31];} ?></td>
			      </tr>
				  <tr>
				    <td class="table_p1" >b)les  montants concern&eacute;s sont-ils facilement <br>
				      identifiables pour permettre l'actualisation  des taux <br>
				      en fin de p&eacute;riode </td>
				    <td>&nbsp;</td>
				    <td class="table_p4"><?php echo $d33; ?></td>
				    <td class="table_p4"><?php echo $d33b; ?></td>
				    <td class="table_p4"><?php if(empty($commentaireD[32])){}else{echo $commentaireD[32];} ?></td>
			      </tr>
				  </table></div>
                  <br>
                  <div style="border:solid">
          <table class="table" border="1">
            <tr>
              <td style="width:485px"><b><span style="width:250px"><b>NIVEAU DE RISQUE</b></span>:</b><br>
                <br>
              <br></td>
              <td  style="width:250px"><br>
                <br>
                <br>
              <br></td>
            </tr>
          </table>
        </div>
				</page>
                
            <page pageset="old">
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				<div  style="border:solid;left:3px;text-align: left; width:732px;  text-justify: newspaper">
				  <div id="corp_objet3"  style="border:solid;left:3px; top: 130px;text-align: left; width:732px;  text-justify: newspaper"> <b> OBJECTIF DE CONTR&Ocirc;LE :<br>
				    E - <strong>S'assurer que toutes les ventes (avoirs) sont enregistr&eacute;es sur la bonne  p&eacute;riode</strong></b></div>
				  <b></b></div>
				
					<div class="niveau">
						 <table width="694" height="30"  border="1" class="table_p4" align="center" >
							<tr>
							  <td width="305" align="center" ><strong>QUESTIONS</strong></td>
							  <td width="34"><p align="justify"><strong>R&eacute;f<br>Diag</strong></p></td>
							  <td width="55"><strong>OUI ou N/A</strong></td>
							  <td width="43"><strong>NON</strong></td>
							  <td width="181" align="center"> <strong>COMMENTAIRES</strong></td>
							</tr>
							
							<tr>
						 <td colspan="5" >Le service facturation s'assure-t-il qu'il re&ccedil;oit  sans d&eacute;lai <br>				           &nbsp;&nbsp;</td>
						    </tr>
							<tr>
							  <td >&nbsp;a)tous les bons de livraison  ?</td>
						      <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $e1; ?></td>
						      <td width="43"><?php echo $e1b; ?></td>
						      <td width="181"><?php if(empty($commentaireE[0])){}else{echo $commentaireE[0];} ?></td>
						   </tr>
							<tr>
							  <td >b)tous les bons de retour ?</td>
						      <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $e2; ?></td>
						      <td width="43"><?php echo $e2b; ?></td>
						      <td width="181">&nbsp;</td>
						   </tr>
							<tr>
							  <td >Les factures et avoirs sont-ils &eacute;mis sans d&eacute;lais  apr&egrave;s r&eacute;ception <br>
							    des bons d'exp&eacute;dition et de retour ?</td>
						      <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $e3; ?></td>
						      <td width="43"><?php echo $e3b; ?></td>
						      <td width="181">&nbsp;</td>
						   </tr>
							<tr>
							  <td >La comptabilit&eacute; s'assure-t-elle que les factures et  avoirs &eacute;mis<br> lui sont transmis sans d&eacute;lai  ? </td>
						      <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $e4; ?></td>
						      <td width="43"><?php echo $e4b; ?></td>
						      <td width="181">&nbsp;</td>
						   </tr>
							
							<tr>
									  <td width="305" >Les factures et avoirs sont-ils comptabilis&eacute;s sans  d&eacute;lai  ?
							  <br></td>
									  <td width="34"></td>
									  <td width="55"><br><?php echo $e5; ?>&nbsp;</td>
									  <td width="43"><br><?php echo $e5b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireE[1])){}else{echo $commentaireE[1];} ?>&nbsp;</td>
						    </tr>
						    <tr>
						      <td >Les contr&ocirc;les r&eacute;alis&eacute;s en 2 et 3 ci-dessus  permettent-ils de<br> s'assurer, en fin de p&eacute;riode, que les exp&eacute;ditions, les  facturations<br> et le journal des ventes sont arr&ecirc;t&eacute;s &agrave; la m&ecirc;me date&nbsp; ? </td>
						      <td>&nbsp;</td>
						      <td><br><?php echo $e6; ?>&nbsp;</td>
						      <td><br><?php echo $e6b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireE[2])){}else{echo $commentaireE[2];} ?>&nbsp;</td>
					       </tr>
						    <tr>
									  <td width="305" >Si certains de ces contr&ocirc;les sont r&eacute;alis&eacute;s par  informatique, <br>les listings d&rsquo;anomalies sont-ils r&eacute;guli&egrave;rement analys&eacute;s ?</td>
									  <td width="34"></td>
									  <td width="55"><br><?php echo $e7; ?>&nbsp;</td>
									  <td width="43"><br><?php echo $e7b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireE[3])){}else{echo $commentaireE[3];} ?>&nbsp;</td>
						    </tr>
				</table>
						 <br>
					<table class="table" border="1">
							<tr>
								<td style="width:485px"><b>NIVEAU DE RISQUE</b><br>
							  <br><br></td>
								<td  style="width:250px"><br>
								  <br><br><br>
							  </td>
							</tr>
				</table>
				 	</div>
</page><br>
<!--===========================================================================================================================================
-->
				<page pageset="old">
				<br><br><br><br><br><br><br><br><br><br><br><br>
				  <div   style="border:solid;left:3px;text-align: left; width:732px;  text-justify: newspaper">
							<b> OBJECTIF DE CONTR&Ocirc;LE :<br>F - S&rsquo;assurer que tous les achats, ainsi que les charges et produits connexes sont correctement imput&eacute;s, totalis&eacute;s et centralis&eacute;s.
						 </b> </div>
				  
					
					<div class="niveau">
						 <table width="694" height="30"  border="1" class="table_p4" align="center" >
							<tr>
							  <td width="305" align="center" ><strong>QUESTIONS</strong></td>
							  <td width="34"><p align="justify"><strong>R&eacute;f<br>Diag</strong></p></td>
							  <td width="55"><strong>OUI ou N/A</strong></td>
							  <td width="43"><strong>NON</strong></td>
							  <td width="181" align="center"> <strong>COMMENTAIRES</strong></td>
							</tr>
							
							<tr>
							  <td >Le service comptable dispose-t-il d'une liste &agrave;  jour des <br>codes clients ?</td>
						      <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $f1; ?></td>
						      <td width="43"><?php echo $f1b; ?></td>
						      <td width="181"><?php if(empty($commentaireF[0])){}else{echo $commentaireF[0];} ?></td>
						   </tr>
							<tr>
							  <td >Cette liste est-elle coh&eacute;rente avec le fichier  informatique ?</td>
						      <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $f2; ?></td>
						      <td width="43"><?php echo $f2b; ?></td>
						      <td width="181">&nbsp;</td>
						   </tr>
							<tr>
							  <td >Les imputations port&eacute;es sur les factures et avoirs  sont-elles<br> 
							    v&eacute;rifi&eacute;es ?</td>
						      <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $f3; ?></td>
						      <td width="43"><?php echo $f3b; ?></td>
						      <td width="181">&nbsp;</td>
						   </tr>
							
							<tr>
									  <td width="305" >Y compris les imputations dans les statistiques  n&eacute;cessaires <br>&agrave; la pr&eacute;paration de l'annexe (analyse du chiffre d'affaires) <br>et au  calcul des charges connexes<br></td>
									  <td width="34"></td>
									  <td width="55"><br><?php echo $f4; ?>&nbsp;</td>
									  <td width="43"><br><?php echo $f4b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireF[1])){}else{echo $commentaireF[1];} ?>&nbsp;</td>
						    </tr>
						    <tr>
						      <td >Les comptes clients sont-ils r&eacute;guli&egrave;rement lettr&eacute;s ? </td>
						      <td>&nbsp;</td>
						      <td><br><?php echo $f5; ?>&nbsp;</td>
						      <td><br><?php echo $f5b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireF[2])){}else{echo $commentaireF[2];} ?>&nbsp;</td>
					       </tr>
						    <tr>
									  <td width="305" >Les anomalies d'imputation &eacute;ventuellement d&eacute;tect&eacute;es  <br>sont-elles (par informatique ou manuellement) </td>
									  <td width="34"></td>
									  <td width="55"><br><?php echo $f6; ?>&nbsp;</td>
									  <td width="43"><br><?php echo $f6b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireF[3])){}else{echo $commentaireF[3];} ?>&nbsp;</td>
						    </tr>
							<tr>
									  <td width="305" >a)analys&eacute;es?						      </td>
									  <td width="34"></td>
									  <td width="55"><br><?php echo $f7; ?>&nbsp;</td>
									  <td width="43"><br><?php echo $f7b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireF[4])){}else{echo $commentaireF[4];} ?>&nbsp;</td>
						    </tr>
							<tr>
							  <td >b)soumises &agrave; un responsable </td>
						      <td width="34"></td>
						      <td width="55"><?php echo $f8; ?></td>
						      <td width="43"><?php echo $f8b; ?></td>
						      <td width="181"><?php if(empty($commentaireF[5])){}else{echo $commentaireF[5];} ?></td>
						   </tr>
							<tr>
							  <td > c)corrig&eacute;es ?</td>
						      <td width="34"></td>
						      <td width="55"><?php echo $f9; ?></td>
						      <td width="43"><?php echo $f9b; ?></td>
						      <td width="181">&nbsp;</td>
						   </tr>
							<tr>
									  <td width="305" >La totalisation des journaux et balances est-elle  v&eacute;rifi&eacute;e ?</td>
									  <td width="34"></td>
									  <td width="55"><br><?php echo $f10; ?>&nbsp;</td>
									  <td width="43"><br><?php echo $f10b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireF[6])){}else{echo $commentaireF[6];} ?>&nbsp;</td>
						    </tr>
							<tr>
							  <td >Les balances auxiliaires sont-elles rapproch&eacute;es des  journaux <br>pour d&eacute;tecter les &eacute;ventuelles erreurs de centralisation ?</td>
							  <td></td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
						   </tr>
							<tr>
							  <td >Envoie-t-on des relev&eacute;s mensuels aux clients&nbsp;?</td>
							  <td></td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
						   </tr>
							<tr>
							  <td >Si oui, les r&eacute;clamations des clients sont-elles  soumises &agrave; une<br> personne ind&eacute;pendante </td>
							  <td></td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
						   </tr>
			          </table>
						 <br>
				<table class="table" border="1">
							<tr>
								<td style="width:485px"><b>NIVEAU DE RISQUE :</b><br><b><?php echo $comm5; ?></b><br><br></td>
								<td  style="width:250px"><br>
									<b><?php echo $synth5; ?></b><br><br><br>
							  </td>
							</tr>
</table>
				 	</div>
</page>
<!--============================================================================================================================================
-->               
<!--============================================================================================================================================
-->				<br><br><br>
			  <page pageset="old">
   			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <div class="niveau" style="padding-left:20px">
        <table width="500" border="1">
          <tr>
            <td colspan="4" ><strong>RESUME DE LA REVUE DU SYSTEME DE CONTROLE INTERNE VENTES &ndash; FC7</strong></td>
          </tr>
          <tr>
            <td width="87">&nbsp;</td>
            <td width="61">SCORE</td>
            <td width="56">RISQUE</td>
            <td width="200">COMMENTAIRES</td>
          </tr>
          <tr>
            <td>A</td>
            <td>&nbsp;</td>
            <td><?php echo $synth; ?>&nbsp;</td>
            <td><?php echo $comm; ?>&nbsp;</td>
          </tr>
          <tr>
            <td>B</td>
            <td><?php echo $total_scoreB; ?>&nbsp;</td>
            <td><?php echo $synth1; ?>&nbsp;</td>
            <td><?php echo $comm1; ?>&nbsp;</td>
          </tr>
          <tr>
            <td>C</td>
           <td><?php echo $total_scoreC; ?>&nbsp;</td>
            <td><?php echo $synth2; ?>&nbsp;</td>
            <td><?php echo $comm2; ?>&nbsp;</td>
          </tr>
          <tr>
            <td>D</td>
            <td><?php echo $total_scoreD; ?>&nbsp;</td>
            <td><?php echo $synth3; ?>&nbsp;</td>
            <td><?php echo $comm3; ?>&nbsp;</td>
          </tr>
          <tr>
            <td>E</td>
            <td><?php echo $total_scoreE; ?>&nbsp;</td>
            <td><?php echo $synth4; ?>&nbsp;</td>
            <td><?php echo $comm4; ?>&nbsp;</td>
          </tr>
          <tr>
            <td>F</td>
           <td>&nbsp;</td>
            <td><?php echo $synth5; ?>&nbsp;</td>
            <td><?php echo $comm5; ?>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="4"><strong>SYNTHESE</strong></td>
          </tr>
          <tr>
		  	<?php 
				
				$requete='select SYNTHESE from tab_synthese_rsci where UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE="achat"';
				$reps=$bdd->query($requete);
				$donnee=$reps->fetch();
			 ?>
            <td colspan="4" height="50"><?php echo $donnee['SYNTHESE']; ?>&nbsp;</td>
          </tr>
        </table>
      </div>
	  </page>	
				
</body>
</html>
