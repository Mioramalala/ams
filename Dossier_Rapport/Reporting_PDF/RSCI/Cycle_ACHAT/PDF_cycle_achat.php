<?php
@session_start();
include('../../../../connexion.php');
$date_entete=date('d-m-Y');
//SELECT QUESTION_ID FROM tab_objectif WHERE UTIL_ID=1 AND MISSION_ID=3 AND QUESTION_ID BETWEEN 23 AND 33
$req='SELECT QUESTION_ID,OBJECTIF_QCM,OBJECTIF_COMMENTAIRE FROM tab_objectif WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=2';
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
	if(($donnee['QUESTION_ID']=="1")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r1="X";$scoreB[$k]=1;$k++;
	}
	//question numero 1 - b)
	else if(($donnee['QUESTION_ID']=="1")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r1b="X";$scoreB[$k]=0;$k++;
	}
	//=========================================================================================================
	if(($donnee['QUESTION_ID']=="2")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r2="X";$scoreB[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="2")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r2b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="3")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r3="X";$scoreB[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="3")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r3b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="4")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r4="X";$scoreB[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="4")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r4b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="5")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r5="X";$scoreB[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="5")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r5b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="6")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r6="X";$scoreB[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="6")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r6b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="7")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r7="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="7")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r7b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="8")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r8="X";$scoreB[$k]=8;$k++;
	}
	else if(($donnee['QUESTION_ID']=="8")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r8b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="9")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r9="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="9")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r9b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="10")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r10="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="10")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r10b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="11")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r11="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="11")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r11b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="12")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r12="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="12")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r12b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="13")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r13="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="13")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r13b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="14")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r14="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="14")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r14b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="15")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r15="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="15")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r15b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="16")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r16="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="16")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r16b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="17")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r17="X";$scoreB[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="17")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r17b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="18")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
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
$req1='select FONCT_A_LIGNE,MISSION_ID,UTIL_ID from tab_fonct_a WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND FONCT_A_NOM="achat"';
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
}
//-==============================================================================+++++++++++++++++++++++++++++++++++======
$comm=$synth="";
$req2='SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE from tab_synthese WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=1';
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
$req3='SELECT QUESTION_ID,OBJECTIF_QCM,OBJECTIF_COMMENTAIRE FROM tab_objectif WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=3';
$c1=$c1b=$c2b=$c3b=$c4b=$c5b=$c6b=$c7b=$c8b=$c9b=$c10b=$c11b="";
$c2="";
$c3=$c4=$c5=$c6=$c7=$c8=$c9=$c10=$c11="";
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
	if(($donnee['QUESTION_ID']=="23")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$scoreC[$k]=2;$k++;
		$c1="X";
	}
	//question numero 1 - b)
	else if(($donnee['QUESTION_ID']=="23")&&($donnee['OBJECTIF_QCM']=="NON")){
		$scoreC[$k]=0;$k++;
		$c1b="X";
	}
	//=========================================================================================================
	if(($donnee['QUESTION_ID']=="24")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$scoreC[$k]=3;$k++;
		$c2="X";
	}
	else if(($donnee['QUESTION_ID']=="24")&&($donnee['OBJECTIF_QCM']=="NON")){
		$scoreC[$k]=0;$k++;
		$c2b="X";
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="25")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$scoreC[$k]=3;$k++;
		$c3="X";
	}
	else if(($donnee['QUESTION_ID']=="25")&&($donnee['OBJECTIF_QCM']=="NON")){
		$scoreC[$k]=0;$k++;
		$c3b="X";
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="26")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c4="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="26")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c4b="X";
		$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="27")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c5="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="27")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c5b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="28")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c6="X";$scoreC[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="28")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c6b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="29")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c7="X";$scoreC[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="29")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c7b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="30")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c8="X";$scoreC[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="30")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c8b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="31")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c9="X";$scoreC[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="31")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c9b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="32")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c10="X";$scoreC[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="32")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c10b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="33")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c11="X";$scoreC[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="33")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c11b="X";$scoreC[$k]=0;$k++;
	}
	
	//==========================================================================================================

}
$total_scoreC=0;
$max = sizeof($scoreC);
for($i=0;$i<$max;$i++){
	$total_scoreC=$total_scoreC + $scoreC[$i];
}
//========================================================================================================================
$req4='SELECT QUESTION_ID,OBJECTIF_QCM,OBJECTIF_COMMENTAIRE FROM tab_objectif WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=4';
$d1=$d1b=$d2b=$d3b=$d4b=$d5b=$d6b=$d7b=$d8b=$d9b=$d10b=$d11b=$d12b="";
$d2="";
$d3=$d4=$d5=$d6=$d7=$d8=$d9=$d10=$d11=$d12="";
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
	if(($donnee['QUESTION_ID']=="34")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d1="X";$scoreD[$k]=2;$k++;
	}
	//question numero 1 - b)
	else if(($donnee['QUESTION_ID']=="34")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d1b="X";$scoreD[$k]=0;$k++;
	}
	//=========================================================================================================
	if(($donnee['QUESTION_ID']=="35")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d2="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="35")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d2b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="36")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d3="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="36")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d3b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="37")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d4="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="37")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d4b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="38")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d5="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="38")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d5b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="39")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d6="X";$scoreD[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="39")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d6b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="40")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d7="X";$scoreD[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="40")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d7b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="41")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d8="X";$scoreD[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="41")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d8b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="42")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d9="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="42")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d9b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="43")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d10="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="43")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d10b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="44")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d11="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="44")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d11b="X";$scoreD[$k]=0;$k++;
	}
	
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="45")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d12="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="45")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d12b="X";$scoreD[$k]=0;$k++;
	}
	
	//==========================================================================================================

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
  padding-top:75px;
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
          <td width="223"><b>Client</b><br><span style="color: CMYK(0, 0, 100%, 0)"><b><h4> PROCHIMAD S.A</h4></b></span></td>
          <td width="384" align="center">QUESTIONNAIRE CONTR&Ocirc;LE INTERNE <br><b>ACHATS</b> GRANDE ENTITE </td>
          <td width="120"><b>CODE</b><br><br><span style="color: CMYK(0, 0, 100%, 0)">FC 1</span>  
	      </td>
        </tr>
        <tr>
          <td><b>COLLABORATEUR	<span style="color: CMYK(0, 0, 100%, 0)">auditeur</span></b></td>
          <td rowspan="2" align="center"><img src="images/pied.png" width="298" height="84" align="middle"></td>
          <td>FOLIO [[page_cu]]/[[page_nb]]</td>
        </tr>
        <tr>
          <td> <b> SUPERVISION</b>	<span style="color: RGB(255, 0, 0)">superviseur </span></td>
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
	<b>OBJECTIF DE CONTR&ocirc;LE :</b>
	<br>
	 <ol style="list-style-type: upper-alpha; height:100px">
                <li style="padding:15px;"> S&rsquo;assurer que les s&eacute;parations de fonctions sont suffisantes.</li>
                <li style="padding:15px;"> S&rsquo;assurer que tous les achats (retours) sont saisis et enregistr&eacute;s (exhaustivit&eacute;).</li>
                <li style="padding:15px;"> S&rsquo;assurer que toutes les factures (avoirs) enregistr&eacute;es correspondent &agrave; des achats r&eacute;els de l&rsquo;entreprise.</li>
                <li style="padding:15px;"> S&rsquo;assurer que tous les achats enregistr&eacute;s sont correctement &eacute;valu&eacute;s.</li>
                <li style="padding:15px;"> S&rsquo;assurer que tous les achats, ainsi que les produits et charges connexes sont enregistr&eacute;s dans la bonne p&eacute;riode</li>
                <li style="padding:15px;"> S&rsquo;assurer que tous les achats, ainsi que les charges et produits connexes sont correctement imput&eacute;s, totalis&eacute;s et centralis&eacute;s.</li>
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
						<div id="corp_objet"  style="left:3px; top: 130px;text-align: left; width:732px;  text-justify: newspaper">
							<b> OBJECTIF DE CONTR&ocirc;LE :<br> A - S&rsquo;assurer que les s&eacute;parations de fonctions sont suffisantes
						 </b> </div>		<br>
						  
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
							<td>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Demandeurs  d&rsquo;achats</td>
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
									  <td>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &Eacute;tablissement  des commandes</td>
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
									  <td >3&nbsp;&nbsp;&nbsp; Autorisation    des commandes</td>
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
									  <td>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; R&eacute;ception</td>
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
									  <td>5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Comparaison  commande-facture</td>
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
									  <td>6&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Comparaison  bon de r&eacute;ception-facture</td>
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
									  <td>7&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Imputation  comptable</td>
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
									  <td>8&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; V&eacute;rification  de l&rsquo;imputation comptable</td>
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
									  <td>9&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bon  &agrave; payer</td>
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
									  <td>10&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tenue  du journal des achats</td>
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
									  <td>11&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tenue  des comptes fournisseurs</td>
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
									  <td>12&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rapprochement  des relev&eacute;s fournisseurs avec les comptes</td>
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
									  <td>13&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rapprochement  de la balance fournisseurs avec le compte collectif</td>
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
									  <td>14&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Centralisation  des achats</td>
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
									  <td>15&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Signature  des ch&egrave;ques</td>
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
									  <td>16&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Envoi  des ch&egrave;ques</td>
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
									  <td>17&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Acceptation  des traites</td>
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
									  <td>18&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tenue  du journal des effets &agrave; payer</td>
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
									  <td>19&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tenue  du journal de tr&eacute;sorerie</td>
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
									   <td >20&nbsp; Annulation    des pi&egrave;ces justificatives</td>
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
									  <td>21&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Acc&egrave;s  &agrave; la comptabilit&eacute; g&eacute;n&eacute;rale</td>
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
									  <td>22&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Suivi  des avoirs</td>
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
								  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<!-- =========================================================================PAGE 3========================================================== -->
			 <div id="corp_objet"  style="left:3px; top: 130px;text-align: left; width:732px;  text-justify: newspaper">
							<b> OBJECTIF DE CONTR&ocirc;LE :<br><br> B - S&rsquo;assurer que tous les achats (retours) sont saisis et enregistr&eacute;s (exhaustivit&eacute;).
						 </b> </div><br>
			
			<table width="694" height="30"  border="1" class="table_p1" align="center" >
					
							<tr>
							  <td width="305" ><div align="center"><strong>QUESTIONS</strong></div></td>
							  <td width="34"><p><strong>R&eacute;f<br>Diag</strong></p></td>
							  <td width="55"><strong>OUI ou N/A</strong></td>
							  <td width="43"><strong>NON</strong></td>
							  <td width="181"> <div align="center"><strong>COMMENTAIRES</strong></div></td>
			  </tr>
							<tr>
									  <td width="305" >1.	Toutes les marchandises reçues sont-<br> elles enregistr&eacute;es :<br>a)	sur des documents standard ?<br>
											b)	pr&eacute;num&eacute;rot&eacute;s ?
<br></td>
									  <td width="34"><div align="center"></div></td>
									  <td width="55" style="bordure:none"><?php echo $r1; ?><br><?php echo $r2; ?>&nbsp;</td>
									  <td width="43"><?php echo $r1b; ?><br><?php echo $r2b; ?>&nbsp;</td>
									  <td width="181"><?php  if(empty($commentaire[0])){}else{echo $commentaire[0];}?>&nbsp;</td>
						    </tr>
							<tr>
									  <td colspan="5" >Tous les services reçus sont-ils<br> enregistr&eacute;s :</td>
						    </tr>
							<tr>
							  <td >a)	sur des documents standard ?</td>
			                  <td width="34">&nbsp;</td>
			                  <td width="55"><?php echo $r3; ?></td>
			                  <td width="43"><?php echo $r3b; ?></td>
			                  <td width="181"><?php  if(empty($commentaire[1])){}else{echo $commentaire[1];} ?></td>
			  </tr>
							<tr>
							  <td >b)	pr&eacute;num&eacute;rot&eacute;s ? </td>
			                  <td width="34">&nbsp;</td>
			                  <td width="55"><?php echo $r4; ?></td>
			                  <td width="43"><?php echo $r4b; ?></td>
			                  <td width="181">&nbsp;</td>
			  </tr>
							<tr>
							  <td colspan="5" >Toutes les marchandises retourn&eacute;es et <br>les r&eacute;clamations effectu&eacute;es sont<br> enregistr&eacute;es sur des documents :
							    &nbsp;&nbsp;</td>
						    </tr>
							<tr>
							  <td >a)	standard ?</td>
			                  <td width="34">&nbsp;</td>
			                  <td width="55"><?php echo $r5; ?></td>
			                  <td width="43"><?php echo $r5b; ?></td>
			                  <td width="181"><?php  if(empty($commentaire[2])){}else{echo $commentaire[2];}?></td>
			  </tr>
							<tr>
							  <td >b)	pr&eacute;num&eacute;rot&eacute;s ?</td>
			                  <td width="34">&nbsp;</td>
			                  <td width="55"><?php echo $r6; ?></td>
			                  <td width="43"><?php echo $r6b; ?></td>
			                  <td width="181">&nbsp;</td>
			  </tr>
							<tr>
									  <td colspan="5" >Le service comptable v&eacute;rifie-t-il la<br> s&eacute;quence num&eacute;rique des :</td>
						    </tr>
						    <tr>
						      <td >a)	bons de r&eacute;ception ?</td>
		                      <td width="34">&nbsp;</td>
		                      <td width="55"><?php echo $r7; ?></td>
		                      <td width="43"><?php echo $r7b; ?></td>
		                      <td width="181"><?php  if(empty($commentaire[3])){}else{echo $commentaire[3];}?></td>
		      </tr>
						    <tr>
						      <td >b)	bons de retour ou de r&eacute;clamation pour s&rsquo;assurer qu&rsquo;il les re&ccedil;oit tous ?</td>
		                      <td width="34">&nbsp;</td>
		                      <td width="55"><?php echo $r8; ?></td>
		                      <td width="43"><?php echo $r8b; ?></td>
		                      <td width="181">&nbsp;</td>
		      </tr>
						    <tr>
									  <td width="305" >Le service comptable tient-il un registre<br> des r&eacute;ceptions et des retours ou <br> r&eacute;clamations pour lesquels les factures <br>et avoirs n&rsquo;ont pas &eacute;t&eacute; reçus ?</td>
									  <td width="34"><div align="center"></div></td>
									  <td width="55"><?php echo $r9; ?>&nbsp;</td>
									  <td width="43"><?php echo $r9b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaire[4])){}else{echo $commentaire[4];}?>&nbsp;</td>
						    </tr>
						    <tr>
						      <td colspan="5" >	Ce registre :</td>
						    </tr>
						    <tr>
						      <td >a)	fait-il l&rsquo;objet d&rsquo;une revue particuli&egrave;re <br>
					          pour identifier la cause des retards ?</td>
		                      <td>&nbsp;</td>
		                      <td><?php echo $r10; ?></td>
		                      <td><?php echo $r10b; ?></td>
		                      <td><?php if(empty($commentaire[5])){}else{echo $commentaire[5];} ?></td>
		      </tr>
						    <tr>
						      <td >b)	sert-il &agrave; &eacute;valuer les provisions pour <br>
					          factures et avoirs &agrave; recevoir ?</td>
		                      <td>&nbsp;</td>
		                      <td><?php echo $r11; ?>&nbsp;</td>
		                      <td><?php echo $r11b; ?>&nbsp;</td>
		                      <td>&nbsp;</td>
		      </tr>
						    <tr>
									  <td width="305" >Le journal des achats est-il rapproch&eacute; <br>de la liste des r&eacute;ception retours ou r&eacute;clamations pour s&rsquo;assurer que toutes<br> les factures et tous les avoirs sont <br>comptabilis&eacute;s ?</td>
									  <td width="34"><div align="center"></div></td>
									  <td width="55"><?php echo $r12; ?>&nbsp;</td>
									  <td width="43"><?php echo $r12b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaire[6])){}else{echo $commentaire[6];} ?>&nbsp;</td>
						    </tr>
				</table>	
				
				  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<!--=============================================================================PAGE 4========================================================= -->
		<div id="corp_objet4"  style="left:3px; top: 100px;text-align: left; width:732px;  text-justify: newspaper">					
					<table width="694" height="30"  border="1" class="table_p4" align="center" >
					
							<tr>
							  <td width="305" ><div align="center"><strong>QUESTIONS</strong></div></td>
							  <td width="34"><p align="justify"><strong>R&eacute;f<br>Diag</strong></p></td>
							  <td width="55"><strong>OUI ou N/A</strong></td>
							  <td width="43"><strong>NON</strong></td>
							  <td width="181"> <div align="center"><strong>COMMENTAIRES</strong></div></td>
							</tr>
							<tr>
						 <td colspan="5" >Les produits aff&eacute;rents aux achats <br>(ristournes) sont-ils identifi&eacute;s au fur et &agrave;<br> mesure des r&eacute;ceptions pour permettre<br> de v&eacute;rifier que :						   &nbsp;&nbsp;</td>
						    </tr>
							<tr>
							  <td >a)	les avoirs sont re&ccedil;us ?</td>
					          <td width="34">&nbsp;</td>
					          <td width="55" style="bordure:none"><?php echo $r13; ?></td>
					          <td width="43"><?php echo $r13b; ?></td>
					          <td width="181"><?php if(empty($commentaire[7])){}else{echo $commentaire[7];} ?></td>
					  </tr>
							<tr>
							  <td >b)	les avoirs sont comptabilit&eacute;s ?</td>
					          <td width="34">&nbsp;</td>
					          <td width="55" style="bordure:none"><?php echo $r14; ?></td>
					          <td width="43"><?php echo $r14b; ?></td>
					          <td width="181">&nbsp;</td>
					  </tr>
							<tr>
									  <td colspan="5" >Les charges aff&eacute;rentes aux achats<br> (frais de transport) sont-elles identifi&eacute;es <br>au fur et &agrave; mesure des r&eacute;ceptions pour<br> permettre de v&eacute;rifier que : </td>
						    </tr>
							<tr>
							  <td >a)	les factures sont re&ccedil;ues ?</td>
					          <td width="34">&nbsp;</td>
					          <td width="55"><?php echo $r15; ?></td>
					          <td width="43"><?php echo $r15b; ?></td>
					          <td width="181"><?php if(empty($commentaire[8])){}else{echo $commentaire[8];} ?></td>
					  </tr>
							<tr>
							  <td >b)	les factures sont comptabilis&eacute;es ?</td>
					          <td width="34">&nbsp;</td>
					          <td width="55"><?php echo $r16; ?></td>
					          <td width="43"><?php echo $r16b; ?></td>
					          <td width="181">&nbsp;</td>
					  </tr>
							<tr>
									  <td colspan="5" >Lorsque les factures et avoirs sont<br> envoy&eacute;s dans les services pour <br>contr&ocirc;le, le service comptable garde-t-il<br> 
									    la trace de ces envois ? </td>
						    </tr>
							<tr>
							  <td >a)	pour suivre les retours ?</td>
					          <td width="34">&nbsp;</td>
					          <td width="55"><?php echo $r17; ?></td>
					          <td width="43"><?php echo $r17b; ?></td>
					          <td width="181"><?php if(empty($commentaire[9])){}else{echo $commentaire[9];} ?></td>
					  </tr>
							<tr>
							  <td >b)	identifier les factures non enregistr&eacute;es ?</td>
					          <td width="34">&nbsp;</td>
					          <td width="55"><?php echo $r18; ?></td>
					          <td width="43"><?php echo $r18b; ?></td>
					          <td width="181">&nbsp;</td>
					  </tr>
							<tr>
									  <td colspan="5" >Les comptes fournisseurs sont-ils <br>r&eacute;guli&egrave;rement rapproch&eacute;s :									    &nbsp;</td>
						    </tr>
							<tr>
							  <td >a)	du compte g&eacute;n&eacute;ral ?</td>
					          <td width="34">&nbsp;</td>
					          <td width="55"><?php echo $r19; ?></td>
					          <td width="43"><?php echo $r19b; ?></td>
					          <td width="181"><?php if(empty($commentaire[10])){}else{echo $commentaire[10];} ?></td>
					  </tr>
							<tr>
							  <td >b)	des relev&eacute;s fournisseurs ?</td>
					          <td width="34">&nbsp;</td>
					          <td width="55"><?php echo $r20; ?></td>
					          <td width="43"><?php echo $r20b; ?></td>
					          <td width="181">&nbsp;</td>
					  </tr>
						    <tr>
						      <td >Lorsque le syst&egrave;me pr&eacute;voit le rejet <br> d&rsquo;op&eacute;rations non conformes, ces rejets sont-ils :<br>
a)	list&eacute;s ?<br>
b)	suivis pour v&eacute;rifier qu&rsquo;ils sont tous recycl&eacute;s ?</td>
														  <td>&nbsp;</td>
						      <td><?php echo $r21; ?><br><?php echo $r22; ?>&nbsp;</td>
						      <td><?php echo $r21b; ?><br><?php echo $r22b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaire[11])){}else{echo $commentaire[11];} ?>&nbsp;</td>
						</tr>
				</table>	
				<br>
				<br>
				<br><div id="p_div_pied">
						<table class="table" border="0" style="padding-left:40px">
							<tr>
								<td style="width:500px"><b>NIVEAU DE RISQUE</b><br><b><?php echo $synth1; ?></b><br><br>Conclusions: <?php echo $comm1; ?></td>
								<td  style="width:150px" align="left">NB :n/a<b> <?php echo $total_scoreB; ?>/78</b><br>
									
							  </td>
							</tr>
				</table></div>
</div>
				  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<!--============================================================================PAGE 5======================================================== -->
						 	<br>
				<div id="corp_objet"  style="left:3px; top: 130px;text-align: left; width:732px;  text-justify: newspaper">
							<b> OBJECTIF DE CONTR&ocirc;LE :<br>C - S&rsquo;assurer que toutes les factures (avoirs) enregistr&eacute;es correspondent &agrave; des achats r&eacute;els de l&rsquo;entreprise
						 </b> </div>			 
						 
						 <table width="694" height="30"  border="1" class="table_p4" align="center" >
							<tr>
							  <td width="305" align="center" ><strong>QUESTIONS</strong></td>
							  <td width="34"><p align="justify"><strong>R&eacute;f<br>Diag</strong></p></td>
							  <td width="55"><strong>OUI ou N/A</strong></td>
							  <td width="43"><strong>NON</strong></td>
							  <td width="181" align="center"> <strong>COMMENTAIRES</strong></td>
							</tr>
							
							<tr>
						 <td width="305" >Les factures et avoirs reçus ne peuvent-ils &ecirc;tre enregistr&eacute;s que s&rsquo;ils <br>sont rapproch&eacute;s d&rsquo;un bon de r&eacute;ception, retour ou r&eacute;clamation ? <br>(ou autre justificatif pour les services).</td>
									  <td width="34"></td>
									  <td width="55" style="bordure:none"><?php echo $c1; ?>&nbsp;</td>
									  <td width="43"><?php echo $c1b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireC[0])){}else{echo $commentaireC[0];} ?>&nbsp;</td>
									 
						    </tr>
							
							<tr>
									  <td width="305" >Les bons de r&eacute;ception, retour ou r&eacute;clamation sont-ils accroch&eacute;s <br>aux factures et avoirs pour &eacute;viter leur utilisation multiple ?
							  <br></td>
									  <td width="34"></td>
									  <td width="55"><?php echo $c2; ?>&nbsp;</td>
									  <td width="43"><?php echo $c2b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireC[1])){}else{echo $commentaireC[1];} ?>&nbsp;</td>
									 
						    </tr>
						    <tr>
						      <td >Les  factures et avoirs enregistr&eacute;s sont-ils annul&eacute;s pour &eacute;viter <br>leur enregistrement  multiple ?</td>
						      <td>&nbsp;</td>
						      <td><?php echo $c3; ?>&nbsp;</td>
						      <td><?php echo $c3b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireC[2])){}else{echo $commentaireC[2];} ?>&nbsp;</td>
						      
					       </tr>
						    <tr>
									  <td width="305" >Les doubles de factures et avoirs sont-ils identifi&eacute;s d&egrave;s r&eacute;ception <br>pour &eacute;viter leur comptabilisation ?</td>
									  <td width="34"></td>
									  <td width="55"><?php echo $c4; ?>&nbsp;</td>
									  <td width="43"><?php echo $c4b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireC[3])){}else{echo $commentaireC[3];} ?>&nbsp;</td>
									  
						    </tr><tr>
									  <td width="305" >La comptabilisation de duplicata est-elle interdite <br>ou soumise &agrave; autorisation particuli&egrave;re ?</td>
									  <td width="34"></td>
									  <td width="55"><?php echo $c5; ?>&nbsp;</td>
									  <td width="43"><?php echo $c5b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireC[4])){}else{echo $commentaireC[4];} ?>&nbsp;</td>
									 
						    </tr>
						    <tr>
						      <td >Les factures et avoirs sont-ils rapproch&eacute;s <br>des bons de livraison, de retour ou r&eacute;clamation <br>et des bons de commande pour &eacute;viter les erreurs de facturation ?</td>
						      <td>&nbsp;</td>
						      <td><?php echo $c6; ?>&nbsp;</td>
						      <td><?php echo $c6b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireC[5])){}else{echo $commentaireC[5];} ?>&nbsp;</td>
						     
					       </tr>
						    <tr>
						      <td>La liste des fournisseurs autoris&eacute;s est-elle r&eacute;guli&egrave;rement <br>mise &agrave; jour et contr&ocirc;l&eacute;e ?</td>
						      <td>&nbsp;</td>
						      <td><?php echo $c7; ?>&nbsp;</td>
						      <td><?php echo $c7b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireC[6])){}else{echo $commentaireC[6];} ?>&nbsp;</td>
						     
					       </tr>
						    <tr>
						      <td >Le fichier fournisseur est-il r&eacute;guli&egrave;rement rapproch&eacute; de <br>la liste &eacute;tablie en 7 ?</td>
						      <td>&nbsp;</td>
						      <td><?php echo $c8; ?>&nbsp;</td>
						      <td><?php echo $c8b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireC[7])){}else{echo $commentaireC[7];} ?>&nbsp;</td>
						     
					       </tr>
						    <tr>
						      <td >L&rsquo;ouverture d&rsquo;un nouveau compte fournisseur est-elle <br> soumise &agrave; autorisation ?</td>
						      <td>&nbsp;</td>
						      <td><?php echo $c9; ?>&nbsp;</td>
						      <td><?php echo $c9b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireC[8])){}else{echo $commentaireC[8];} ?>&nbsp;</td>
						    
					       </tr>
						    <tr>
						      <td >Existe-t-il une liste des personnes habilit&eacute;es &agrave; engager <br>la soci&eacute;t&eacute; (&eacute;ventuellement avec des plafonds) ?</td>
						      <td>&nbsp;</td>
						      <td><?php echo $c10; ?>&nbsp;</td>
						      <td><?php echo $c10b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireC[9])){}else{echo $commentaireC[9];} ?>&nbsp;</td>
						     
					       </tr>
						    <tr>
						      <td >Les op&eacute;rations diverses relatives aux op&eacute;rations d&rsquo;achat sont-elles <br>soumises &agrave; autorisation avant enregistrement ?</td>
														  <td>&nbsp;</td>
						      <td><?php echo $c11; ?>&nbsp;</td>
						      <td><?php echo $c11b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireC[10])){}else{echo $commentaireC[10];} ?>&nbsp;</td>
						    
						</tr>
									 
				</table>	<br>
				
				<table class="table" border="1">
							<tr>
								<td style="width:485px"><b>CONCLUSIONS :</b><br><b><?php echo $comm2; ?></b><br><br></td>
								<td  style="width:250px"><b>NIVEAU DE RISQUE</b><br>
									<b><?php echo $synth2; ?></b><br><br><br>
							  </td>
							</tr>
				</table>
                <br> <br> <br>
<!--=============================================================================================================================================
-->				
				<page pageset="old">
				<br><br>
				  <div id="corp_objet"  style="left:3px; top: 130px;text-align: left; width:732px;  text-justify: newspaper">
							<b> OBJECTIF DE CONTR&ocirc;LE :<br>D - S&rsquo;assurer que tous les achats enregistr&eacute;s sont correctement &eacute;valu&eacute;s.
						 </b> </div>
				  
						
					<div class="niveau">
						 <table width="694" height="579"  border="1" class="table_p4" align="center" >
							<tr>
							  <td width="305" align="center" ><strong>QUESTIONS</strong></td>
							  <td width="34"><p align="justify"><strong>R&eacute;f<br>Diag</strong></p></td>
							  <td width="55"><strong>OUI ou N/A</strong></td>
							  <td width="43"><strong>NON</strong></td>
							  <td width="181" align="center"> <strong>COMMENTAIRES</strong></td>
							</tr>
							
							<tr>
						 <td colspan="5" >1.Les factures et avoirs re&ccedil;us sont-ils <br>v&eacute;rifi&eacute;s quant aux : </td>
						    </tr>
							<tr>
							  <td >a)    quantit&eacute;s ?</td>
						      <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d1; ?></td>
						      <td width="43"><?php echo $d1b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[0])){}else{echo $commentaireD[0];} ?></td>
						   </tr>
							<tr>
							  <td >b)    prix unitaires ?</td>
						      <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d2; ?></td>
						      <td width="43"><?php echo $d2b; ?></td>
						      <td width="181">&nbsp;</td>
						   </tr>
							<tr>
							  <td >c)    calculs ?</td>
						      <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d3; ?></td>
						      <td width="43"><?php echo $d3b; ?></td>
						      <td width="181">&nbsp;</td>
						   </tr>
							<tr>
							  <td >d)    TVA ? </td>
						      <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d4; ?></td>
						      <td width="43"><?php echo $d4b; ?></td>
						      <td width="181">&nbsp;</td>
						   </tr>
							<tr>
							  <td >&nbsp;e)    autres d&eacute;ductions ou charges ?</td>
						      <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d5; ?></td>
						      <td width="43"><?php echo $d5b; ?></td>
						      <td width="181">&nbsp;</td>
						   </tr>
							
							<tr>
									  <td width="305" >2.Si ces contr&ocirc;les sont faits par informatique, <br>les rejets font-ils l objet d un suivi ?
							  <br></td>
									  <td width="34"></td>
									  <td width="55"><br><?php echo $d6; ?>&nbsp;</td>
									  <td width="43"><br><?php echo $d6b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireD[1])){}else{echo $commentaireD[1];} ?>&nbsp;</td>
						    </tr>
						    <tr>
						      <td colspan="5" >3.L'&eacute;valuation des provisions pour factures <br>et avoirs &agrave; recevoir est-elle :					          </td>
					       </tr>
						    <tr>
						      <td >a)    v&eacute;rifi&eacute;e par une personne ind&eacute;pendante de celle qui l'&eacute;tablit ? </td>
					          <td>&nbsp;</td>
					          <td><?php echo $d7; ?></td>
					          <td><?php echo $d7b; ?></td>
					          <td><?php if(empty($commentaireD[2])){}else{echo $commentaireD[2];} ?></td>
					       </tr>
						    <tr>
						      <td >b)    rapproch&eacute;s des factures et avoirs r&eacute;els ult&eacute;rieurement ?</td>
					          <td>&nbsp;</td>
					          <td><?php echo $d8; ?></td>
					          <td><?php echo $d8b; ?></td>
					          <td>&nbsp;</td>
					       </tr>
						    <tr>
									  <td height="52" colspan="5" ><p>4.Lorsque des achats sont effectu&eacute;s <br>
									  en devises &eacute;trang&egrave;res :<br>
									  </p>									    </td>
						    </tr>
						    <tr>
						      <td >&nbsp; a)    les personnes charg&eacute;es de la comptabilisation sont-elles <br>r&eacute;guli&egrave;rement inform&eacute </td>
					          <td width="34"></td>
					          <td width="55"><?php echo $d9; ?></td>
					          <td width="43"><?php echo $d9b; ?></td>
					          <td width="181"><?php if(empty($commentaireD[3])){}else{echo $commentaireD[3];} ?></td>
					       </tr>
						    <tr>
						      <td >&nbsp;b)    les montants concern&eacute;s sont-ils facilement identifiables <br>pour permettre l'actualisation des taux en fin de p&eacute;riode ? </td>
					          <td width="34"></td>
					          <td width="55"><?php echo $d10; ?></td>
					          <td width="43"><?php echo $d10b; ?></td>
					          <td width="181">&nbsp;</td>
					       </tr>
						    <tr>
									  <td colspan="5" >5.Les bons de commande non honor&eacute;s sont-ils : 
								      &nbsp;</td>
						    </tr>
						    <tr>
						      <td >a)    chiffr&eacute;s ? </td>
					          <td width="34"></td>
					          <td width="55"><?php echo $d11; ?></td>
					          <td width="43"><?php echo $d11b; ?></td>
					          <td width="181"><?php if(empty($commentaireD[4])){}else{echo $commentaireD[4];} ?></td>
					       </tr>
						    <tr>
						      <td >b)    totalis&eacute;s ? </td>
					          <td width="34"></td>
					          <td width="55"><?php echo $d12; ?></td>
					          <td width="43"><?php echo $d12b; ?></td>
					          <td width="181">&nbsp;</td>
					       </tr>
				</table>
						 <br>
				<table class="table" border="1">
							<tr>
								<td style="width:485px"><b>CONCLUSIONS :</b><br><b><?php echo $comm3; ?></b><br><br></td>
								<td  style="width:250px"><b>NIVEAU DE RISQUE</b><br>
									<b><?php echo $synth3; ?></b><br><br><br>
							  </td>
							</tr>
				</table>
				 	</div>
</page>
<!--===========================================================================================================================================
-->
				<page pageset="old">
				<br><br>
				  <div id="corp_objet"  style="left:3px; top: 130px;text-align: left; width:732px;  text-justify: newspaper">
							<b> OBJECTIF DE CONTR&ocirc;LE :<br>E - S&rsquo;assurer que tous les achats, ainsi que les produits et charges connexes, sont enregistr&eacute;s dans la bonne p&eacute;riode
						 </b> </div>
				  
						<br>
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
						 <td colspan="5" >1.En fin de p&eacute;riode, la comptabilit&eacute; utilise-t-elle :
						   <br>				           &nbsp;&nbsp;</td>
						    </tr>
							<tr>
							  <td >&nbsp;a)    la liste des bons de livraison non factur&eacute;s ?</td>
						      <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $e1; ?></td>
						      <td width="43"><?php echo $e1b; ?></td>
						      <td width="181"><?php if(empty($commentaireE[0])){}else{echo $commentaireE[0];} ?></td>
						   </tr>
							<tr>
							  <td >b)    la liste des bons de retour et de r&eacute;clamation dans avoir ?</td>
						      <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $e2; ?></td>
						      <td width="43"><?php echo $e2b; ?></td>
						      <td width="181">&nbsp;</td>
						   </tr>
							<tr>
							  <td >&nbsp;c)    la liste des factures connexes (frais de transport) ? </td>
						      <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $e3; ?></td>
						      <td width="43"><?php echo $e3b; ?></td>
						      <td width="181">&nbsp;</td>
						   </tr>
							<tr>
							  <td >&nbsp;d)    la liste des produits aff&eacute;rents aux achats (voir B8) ? </td>
						      <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $e4; ?></td>
						      <td width="43"><?php echo $e4b; ?></td>
						      <td width="181">&nbsp;</td>
						   </tr>
							
							<tr>
									  <td width="305" >2.La comptabilit&eacute; est-elle inform&eacute;e des derniers num&eacute;ros de s&eacute;quence <br>des documents ci-dessus pour pouvoir v&eacute;rifier la coh&eacute;rence <br>des dates d arr&ecirc; t&eacute;s ?
							  <br></td>
									  <td width="34"></td>
									  <td width="55"><br><?php echo $e5; ?>&nbsp;</td>
									  <td width="43"><br><?php echo $e5b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireE[1])){}else{echo $commentaireE[1];} ?>&nbsp;</td>
						    </tr>
						    <tr>
						      <td >3.L apurement des provisions ainsi constat&eacute;es d'une p&eacute;riode <br>sur l'autre est-elle v&eacute;rifi&eacute;e <br>par une personne ind&eacute;pendante ? </td>
						      <td>&nbsp;</td>
						      <td><br><?php echo $e6; ?>&nbsp;</td>
						      <td><br><?php echo $e6b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireE[2])){}else{echo $commentaireE[2];} ?>&nbsp;</td>
					       </tr>
						    <tr>
									  <td width="305" >4.Pour les charges r&eacute;currentes (loyers, assurances...) s assure-t-on <br>que le montant pass&eacute; en charge correspond &agrave; la p&eacute;riode ?</td>
									  <td width="34"></td>
									  <td width="55"><br><?php echo $e7; ?>&nbsp;</td>
									  <td width="43"><br><?php echo $e7b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireE[3])){}else{echo $commentaireE[3];} ?>&nbsp;</td>
						    </tr><tr>
									  <td colspan="5" >5.Pour les charges sp&eacute;cifiques (publicit&eacute;, honoraires...) la comptabilit&eacute; a-t-elle les moyens : </td>
									  </tr>
						    <tr>
						      <td >a)    d obtenir les informations n&eacute;cessaires &agrave; l &eacute;valu </td>
					          <td width="34"></td>
					          <td width="55"><?php echo $e8; ?></td>
					          <td width="43"><?php echo $e8b; ?></td>
					          <td width="181"><?php if(empty($commentaireE[4])){}else{echo $commentaireE[4];} ?></td>
					       </tr>
						    <tr>
						      <td >b)    au contr&ocirc; le du bien-fond&eacute; des montants concern&eacute;s ?</td>
					          <td width="34"></td>
					          <td width="55"><?php echo $e9; ?></td>
					          <td width="43"><?php echo $e9b; ?></td>
					          <td width="181">&nbsp;</td>
					       </tr>
				</table>
						 <br>
					<table class="table" border="1">
							<tr>
								<td style="width:485px"><b>CONCLUSIONS :</b><br><b><?php echo $comm4; ?></b><br><br></td>
								<td  style="width:250px"><b>NIVEAU DE RISQUE</b><br>
									<b><?php echo $synth4; ?></b><br><br><br>
							  </td>
							</tr>
				</table>
				 	</div>
</page><br>
<!--===========================================================================================================================================
-->
				<page pageset="old">
				<br><br>
				  <div id="corp_objet"  style="left:3px; top: 130px;text-align: left; width:732px;  text-justify: newspaper">
							<b> OBJECTIF DE CONTR&ocirc;LE :<br>F - S&rsquo;assurer que tous les achats, ainsi que les charges et produits connexes sont correctement imput&eacute;s, totalis&eacute;s et centralis&eacute;s.
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
						 <td colspan="5" >Les personnes charg&eacute;es d'imputer les factures disposent-elles  
						   <br>				           &nbsp;&nbsp;</td>
						    </tr>
							<tr>
							  <td > a)    d'une liste des codes fournisseurs ?</td>
						      <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $f1; ?></td>
						      <td width="43"><?php echo $f1b; ?></td>
						      <td width="181"><?php if(empty($commentaireF[0])){}else{echo $commentaireF[0];} ?></td>
						   </tr>
							<tr>
							  <td > b)    d'un plan comptable ?</td>
						      <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $f2; ?></td>
						      <td width="43"><?php echo $f2b; ?></td>
						      <td width="181">&nbsp;</td>
						   </tr>
							<tr>
							  <td >c)    de r&egrave;gles d'imputation pr&eacute;cises </td>
						      <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $f3; ?></td>
						      <td width="43"><?php echo $f3b; ?></td>
						      <td width="181">&nbsp;</td>
						   </tr>
							
							<tr>
									  <td width="305" >Ces documents sont-ils r&eacute;guli&egrave;rement mis &agrave; jour ?
							  <br></td>
									  <td width="34"></td>
									  <td width="55"><br><?php echo $f4; ?>&nbsp;</td>
									  <td width="43"><br><?php echo $f4b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireF[1])){}else{echo $commentaireF[1];} ?>&nbsp;</td>
						    </tr>
						    <tr>
						      <td >V&eacute;rifie-t-on que ces mises &agrave; jours sont diffus&eacute;es <br>et utilis&eacute;es par les personnes charg&eacute;es des imputations ? </td>
						      <td>&nbsp;</td>
						      <td><br><?php echo $f5; ?>&nbsp;</td>
						      <td><br><?php echo $f5b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireF[2])){}else{echo $commentaireF[2];} ?>&nbsp;</td>
					       </tr>
						    <tr>
									  <td width="305" >Les imputations donn&eacute;es sur les factures et avoirs sont-elles <br> v&eacute;rifi&eacute;es de fa&ccedil;on ind&eacute;pendante ? <br>Y compris les imputations en comptabilit&eacute; analytique <br>et celles servant aux analyses n&eacute;cessaires &agrave; la pr</td>
									  <td width="34"></td>
									  <td width="55"><br><?php echo $f6; ?>&nbsp;</td>
									  <td width="43"><br><?php echo $f6b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireF[3])){}else{echo $commentaireF[3];} ?>&nbsp;</td>
						    </tr>
							<tr>
									  <td width="305" >Si ces contr&Ocirc; les sont faits par informatique, <br>le retraitement des rejets est-il v&eacute;rifi&eacute; ?						      </td>
									  <td width="34"></td>
									  <td width="55"><br><?php echo $f7; ?>&nbsp;</td>
									  <td width="43"><br><?php echo $f7b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireF[4])){}else{echo $commentaireF[4];} ?>&nbsp;</td>
						    </tr>
							<tr>
									  <td colspan="5" >Les relev&eacute;s re&ccedil;us des fournisseurs sont-ils r&eacute;guli&egrave;rement rapproch&eacute;s <br>des comptes individuels ? Si oui, les &eacute;carts identifi&eacute;s sont-ils :</td>
						    </tr>
							<tr>
							  <td >a)    a</td>
						      <td width="34"></td>
						      <td width="55"><?php echo $f8; ?></td>
						      <td width="43"><?php echo $f8b; ?></td>
						      <td width="181"><?php if(empty($commentaireF[5])){}else{echo $commentaireF[5];} ?></td>
						   </tr>
							<tr>
							  <td > b)    corrig</td>
						      <td width="34"></td>
						      <td width="55"><?php echo $f9; ?></td>
						      <td width="43"><?php echo $f9b; ?></td>
						      <td width="181">&nbsp;</td>
						   </tr>
							<tr>
									  <td width="305" >Les comptes fournisseurs sont-ils r&eacute;guli&egrave;rement lettr&eacute;s <br>et analys&eacute;s pour identifier les erreurs d'imputation &eacute;ventuelles ?						      </td>
									  <td width="34"></td>
									  <td width="55"><br><?php echo $f10; ?>&nbsp;</td>
									  <td width="43"><br><?php echo $f10b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireF[6])){}else{echo $commentaireF[6];} ?>&nbsp;</td>
						    </tr>
							<tr>
									  <td colspan="5" >Les erreurs d&eacute;cel&eacute;es sont-elles : </td>
						    </tr>
							<tr>
							  <td >a)    soumises &agrave; un contr&ocirc; le ind&eacute;pendant ? </td>
						      <td width="34"></td>
						      <td width="55"><?php echo $f11; ?></td>
						      <td width="43"><?php echo $f11b; ?></td>
						      <td width="181"><?php if(empty($commentaireF[7])){}else{echo $commentaireF[7];} ?></td>
						   </tr>
							<tr>
							  <td >b)    corrig&eacute;es ? </td>
						      <td width="34"></td>
						      <td width="55"><?php echo $f12; ?></td>
						      <td width="43"><?php echo $f12b; ?></td>
						      <td width="181">&nbsp;</td>
						   </tr>
							<tr>
									  <td width="305" >La totalisation des journaux d'achats est-elle <br>r&eacute;guli&egrave;rement v&eacute;rifi&eacute;e (ou le logiciel test&eacute;) ?						      </td>
									  <td width="34"></td>
									  <td width="55"><br><?php echo $f13; ?>&nbsp;</td>
									  <td width="43"><br><?php echo $f13b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireF[8])){}else{echo $commentaireF[8];} ?>&nbsp;</td>
						    </tr>
							<tr>
									  <td width="305" >La balance fournisseur est-elle r&eacute;guli&egrave;rement <br>rapproch&eacute;e du Grand-Livre ?						      </td>
									  <td width="34"></td>
									  <td width="55"><br><?php echo $f14; ?>&nbsp;</td>
									  <td width="43"><br><?php echo $f14b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireF[9])){}else{echo $commentaireF[9];} ?>&nbsp;</td>
						    </tr>
							<tr>
									  <td width="305" >Si des &eacute;carts sont constat&eacute;s, <br>sont-ils imm&eacute;diatement analys&eacute;s et corrig&eacute;s ?						      </td>
									  <td width="34"></td>
									  <td width="55"><br><?php echo $f15; ?>&nbsp;</td>
									  <td width="43"><br><?php echo $f15b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireF[10])){}else{echo $commentaireF[10];} ?>&nbsp;</td>
						    </tr>
				</table>
						 <br>
				<table class="table" border="1">
							<tr>
								<td style="width:485px"><b>CONCLUSIONS :</b><br><b><?php echo $comm5; ?></b><br><br></td>
								<td  style="width:250px"><b>NIVEAU DE RISQUE</b><br>
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
   			<br><br><br><br><br><br><br>
      <div class="niveau" style="padding-left:20px">
        <table width="500" border="1">
          <tr>
            <td colspan="4" ><strong>RESUME DE LA REVUE DU SYSTEME DE CONTROLE INTERNE ACHAT &ndash; FC1</strong></td>
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
