<?php
@session_start();
include('../../../../connexion.php');
include "../../../connex.php"; 


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
$req1='select FONCT_A_LIGNE,MISSION_ID,UTIL_ID from tab_fonct_a WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'"';
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
          <td width="384" align="center"><p align="center"><strong>QUEST.  CONTR&Ocirc;LE INTERNE </strong></p>
          <strong>TRESORERIE  DEPENSES </strong></td>
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
	
<p>	<b>EVALUATION DU <strong>&nbsp;CONTR&Ocirc;LE </strong></b></p>
<p align="center"><strong>tr&eacute;sorerie  recettes</strong></p>
</div>
<br><br><br><br><br><br>

	
	<div id="corp_objet">
	<b>OBJECTIF DE CONTR&ocirc;LE :</b>
	<br>
	<p><strong>A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong>S&rsquo;assurer que les s&eacute;parations de fonctions sont suffisantes.<br>
	  <strong>B&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong>S'assurer que tous les paiements effectu&eacute;s sont saisis et comptabilis&eacute;s  (exhaustivit&eacute;).<br>
	  <strong>C&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong>S'assurer que les r&egrave;glements comptabilis&eacute;s correspondent &agrave; des d&eacute;penses  r&eacute;elles de l'entreprise.<br>
	  <strong>D&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong>S'assurer que tous les paiements r&eacute;alis&eacute;s sont enregistr&eacute;s sur la bonne  p&eacute;riode.<br>
	  <strong>E&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong>S'assurer que les d&eacute;penses r&eacute;alis&eacute;es sont correctement &eacute;valu&eacute;es.<br>
	  <strong>F&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong>S'assurer que toutes les d&eacute;penses r&eacute;alis&eacute;es sont correctement imput&eacute;es,  totalis&eacute;es et centralis&eacute;es.</p>
	<br>
	<br>
	</div>
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
		
				<!-- tableau PAGE 2-->
                <page pageset="old">
                <br><br><br><br><br><br>
						<div id="corp_objet"  style="left:3px; top: 135px;text-align: left; width:732px;  text-justify: newspaper">
							<b> OBJECTIF DE CONTR&Ocirc;LE :<br> A - S&rsquo;assurer que les s&eacute;parations de fonctions sont suffisantes
						 </b> </div>		<br>
		  
				<table  border="1" class="table_p1">
					
							<tr>
									  <td width="207" rowspan="2" align="center"><strong>Fonctions</strong></td>
									  <td colspan="10" width="300" align="center"><strong>Personnel concern&eacute;</strong></td>
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
							<td>1  Tenue de la caisse</td>
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
									  <td>2 Détention de titres</td>
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
									  <td >3 Détention des chèques reçus des clients</td>
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
									  <td>4 Autorisation d'avance aux employés</td>
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
									  <td>5&nbsp;&nbsp;&nbsp;D&eacute;tention des carnets de ch&egrave;ques</td>
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
									  <td>6&nbsp;&nbsp;&nbsp;Pr&eacute;paration des ch&egrave;ques</td>
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
									  <td>7&nbsp;&nbsp;&nbsp;Approbation des pi&egrave;ces justificatives</td>
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
									  <td>8&nbsp;&nbsp;Signature des ch&egrave;ques</td>
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
									  <td>9&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Annulation des pi&egrave;ces justificatives</td>
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
									  <td>10&nbsp;&nbsp;&nbsp;&nbsp;Envoi des ch&egrave;ques</td>
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
									  <td>11&nbsp;Tenue du journal de tr&eacute;sorerie</td>
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
									  <td>12&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Liste des ch&egrave;ques re&ccedil;us au courrier</td>
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
									  <td>13&nbsp;&nbsp;&nbsp;&nbsp;D&eacute;p&ocirc;ts en banque des ch&egrave;ques ou esp&egrave;ces</td>
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
									  <td>14&nbsp;&nbsp;&nbsp;Tenue des comptes clients</td>
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
									  <td>15&nbsp;&nbsp;&nbsp;Tenue des comptes fournisseurs</td>
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
									  <td>16&nbsp;&nbsp;&nbsp;&Eacute;mission d'avoirs</td>
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
									  <td>17&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Approbation des avoirs</td>
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
									  <td>18&nbsp;&nbsp;&nbsp;&nbsp;R&eacute;ception des relev&eacute;s bancaires</td>
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
									  <td>19&nbsp;&nbsp;&nbsp;&nbsp;Pr&eacute;paration des rapprochements de banque</td>
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
									   <td >20&nbsp;Comparaison de la liste des ch&egrave;ques re&ccedil;us au  courrier avec les <br>bordereaux de remise en banque</td>
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
									  <td>21&nbsp;Acc&egrave;s &agrave; la comptabilit&eacute; g&eacute;n&eacute;rale</td>
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
									  <td>22&nbsp;&nbsp;Tenue du journal des ventes</td>
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
	    <td>23 Pr&eacute;paration des factures clients</td>
	    <td>&nbsp;</td>
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
                </page>
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
            B -<strong>-- S'assurer que toutes les recettes de l'entreprise sont enregistr&eacute;es et  encaiss&eacute;es (exhaustivit&eacute;).</strong></b></div></td>
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
            <td width="312" ><p>L'ouverture du courrier, les titres de paiement  re&ccedil;us sont-ils ?</p></td>
            <td width="48">&nbsp;</td>
            <td width="33" style="bordure:none"><?php echo $r1; ?><br>
              <?php echo $r2; ?>&nbsp;</td>
            <td width="36"><?php echo $r1b; ?><br>
              <?php echo $r2b; ?>&nbsp;</td>
            <td width="135"><?php  if(empty($commentaire[0])){}else{echo $commentaire[0];}?>
              &nbsp;</td>
          </tr>
          <tr>
            <td width="312" >a) isol&eacute;s du reste du courrier ?</td>
            <td width="48">&nbsp;</td>
            <td width="33" style="bordure:none">&nbsp;</td>
            <td width="36">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="5" >b) enregistr&eacute;s ?</td>
          </tr>
          <tr>
            <td >c) transmis directement au service tr&eacute;sorerie&nbsp;  ?</td>
            <td width="48">&nbsp;</td>
            <td width="33"><?php echo $r3; ?></td>
            <td width="36"><?php echo $r3b; ?></td>
            <td width="135"><?php  if(empty($commentaire[1])){}else{echo $commentaire[1];} ?></td>
          </tr>
          <tr>
            <td >Les r&egrave;glements sont-ils enregistr&eacute;s dans les  comptes clients &agrave; partir<br> des avis de paiement et non des titres de paiement  eux-m&ecirc;mes ? </td>
            <td width="48">&nbsp;</td>
            <td width="33"><?php echo $r4; ?></td>
            <td width="36"><?php echo $r4b; ?></td>
            <td width="135">&nbsp;</td>
          </tr>
          <tr>
            <td >Les titres de paiement re&ccedil;us sont-ils remis en  banque quotidiennement ?</td>
            <td width="48">&nbsp;</td>
            <td width="33"><?php echo $r5; ?></td>
            <td width="36"><?php echo $r5b; ?></td>
            <td width="135"><?php  if(empty($commentaire[2])){}else{echo $commentaire[2];}?></td>
          </tr>
          <tr>
            <td >Le montant des titres de paiement remis &agrave; la banque  est-il <br>r&eacute;guli&egrave;rement rapproch&eacute; &nbsp; ? </td>
            <td width="48">&nbsp;</td>
            <td width="33"><?php echo $r6; ?></td>
            <td width="36"><?php echo $r6b; ?></td>
            <td width="135">&nbsp;</td>
          </tr>
          <tr>
            <td >a)du total enregistr&eacute; en 1 ?</td>
            <td width="48">&nbsp;</td>
            <td width="33"><?php echo $r7; ?></td>
            <td width="36"><?php echo $r7b; ?></td>
            <td width="135"><?php  if(empty($commentaire[3])){}else{echo $commentaire[3];}?></td>
          </tr>
          <tr>
            <td >b)du total des r&egrave;glements enregistr&eacute;s au cr&eacute;dit des  comptes clients ?</td>
            <td width="48">&nbsp;</td>
            <td width="33"><?php echo $r8; ?></td>
            <td width="36"><?php echo $r8b; ?></td>
            <td width="135">&nbsp;</td>
          </tr>
          <tr>
            <td width="312" >Pour les recettes en esp&egrave;ces, sont-elles :</td>
            <td width="48">&nbsp;</td>
            <td width="33"><?php echo $r9; ?>&nbsp;</td>
            <td width="36"><?php echo $r9b; ?>&nbsp;</td>
            <td width="135"><?php if(empty($commentaire[4])){}else{echo $commentaire[4];}?>
              &nbsp;</td>
          </tr>
          <tr>
            <td >a)enregistr&eacute;es sur des pi&egrave;ces de caisse standard et  pr&eacute;num&eacute;rot&eacute;es ?</td>
            <td>&nbsp;</td>
            <td><?php echo $r10; ?></td>
            <td><?php echo $r10b; ?></td>
            <td><?php if(empty($commentaire[5])){}else{echo $commentaire[5];} ?></td>
          </tr>
          <tr>
            <td >b)enregistr&eacute;es au fur et &agrave; mesure dans le journal de  caisse ?</td>
            <td>&nbsp;</td>
            <td><?php echo $r11; ?>&nbsp;</td>
            <td><?php echo $r11b; ?>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="312" >c)rapproch&eacute;es des esp&egrave;ces en caisse ?</td>
            <td width="48">&nbsp;</td>
            <td width="33"><?php echo $r12; ?>&nbsp;</td>
            <td width="36"><?php echo $r12b; ?>&nbsp;</td>
            <td width="135"><?php if(empty($commentaire[6])){}else{echo $commentaire[6];} ?>
              &nbsp;</td>
          </tr>
          <tr>
            <td >Les anomalies d&eacute;tect&eacute;es lors des rapprochements de  banques sont-<br>elles  :</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td >a)analys&eacute;s ?</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td >b)soumises &agrave; autorisation ?</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td >c)corrig&eacute;es ?</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td >Les soldes des clients en retard de paiement  font-ils l'objet de recherches<br> r&eacute;guli&egrave;res afin de v&eacute;rifier que ces retards ne  sont pas dus au non-<br>enregistrement de recettes </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td >Les effets remis &agrave; l'escompte sont-ils :</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td >a)comptabilis&eacute;s?</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td >b)rapproch&eacute;s r&eacute;guli&egrave;rement avec la <br>
banque ?</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
        <br>
	  </page>
      
<page pageset="old">
    <br><br><br><br>
</page>

      
      <page pageset="old">		 
<!--============================================================================PAGE 5======================================================== -->
						 	<table width="694" border="1">
						 	  <tr>
						 	    <td><strong>QUESTIONS</strong></td>
						 	    <td><p><strong>R&eacute;f </strong></p>
                                <strong>Diag</strong></td>
						 	    <td><strong>OUI ou N/A</strong></td>
						 	    <td><strong>NON</strong></td>
						 	    <td><strong>COMMENTAIRES</strong></td>
					 	      </tr>
						 	  <tr>
						 	    <td>Les ch&egrave;ques et effets sans b&eacute;n&eacute;ficiaires sont-ils,  d&egrave;s l'ouverture du courrier,<br> compl&eacute;t&eacute;s au nom de l'entreprise </td>
						 	    <td>&nbsp;</td>
						 	    <td>&nbsp;</td>
						 	    <td>&nbsp;</td>
						 	    <td>&nbsp;</td>
					 	      </tr>
						 	  <tr>
						 	    <td>Lorsque des encaissements sont effectu&eacute;s par des  repr&eacute;sentants,<br> livreurs... , ces personnes sont-elles tenues </td>
						 	    <td>&nbsp;</td>
						 	    <td>&nbsp;</td>
						 	    <td>&nbsp;</td>
						 	    <td>&nbsp;</td>
					 	      </tr>
						 	  <tr>
						 	    <td>a)d'&eacute;tablir des re&ccedil;us pr&eacute;num&eacute;rot&eacute;s ?</td>
						 	    <td>&nbsp;</td>
						 	    <td>&nbsp;</td>
						 	    <td>&nbsp;</td>
						 	    <td>&nbsp;</td>
					 	      </tr>
						 	  <tr>
						 	    <td>b)de transmettre ces recettes imm&eacute;diatement &agrave; la  soci&eacute;t&eacute; ou la <br>
banque ?</td>
						 	    <td>&nbsp;</td>
						 	    <td>&nbsp;</td>
						 	    <td>&nbsp;</td>
						 	    <td>&nbsp;</td>
					 	      </tr>
						 	  <tr>
						 	    <td>Des contr&ocirc;les sont-ils p&eacute;riodiquement r&eacute;alis&eacute;s pour  s'assurer que les fonds collect&eacute;s en 10 sont r&eacute;guli&egrave;rement remis en banque.</td>
						 	    <td>&nbsp;</td>
						 	    <td>&nbsp;</td>
						 	    <td>&nbsp;</td>
						 	    <td>&nbsp;</td>
					 	      </tr>
 	    </table>
        <br><br>
        
						 	<div style="border:solid">
						 	  <table class="table" border="1">
						 	    <tr>
						 	      <td style="width:485px"><b>NIVEAU DE RISQUE :</b><br>
						 	        <b><?php echo $comm; ?></b><br>
						 	        <br></td>
						 	      <td  style="width:250px"><br>
						 	        <br>
						 	        <br>
						 	        <br></td>
					 	        </tr>
					 	      </table>
 	    </div>
						 	<br><br><br><br><br><br><br><br><br>
<br><br><br><br>				<div   style="border:solid;left:3px;text-align: left; width:732px;  text-justify: newspaper">
							<b> OBJECTIF DE CONTR&Ocirc;LE :<br>C -<strong>S'assurer que toutes les recettes enregistr&eacute;es correspondent &agrave; des  recettes r&eacute;elles de l'entreprise.</strong></b> </div><br>			 
						 
						 <table width="694" height="30"  border="1" class="table_p4" align="center" >
							<tr>
							  <td width="305" align="center" ><strong>QUESTIONS</strong></td>
							  <td width="34"><p align="justify"><strong>R&eacute;f<br>Diag</strong></p></td>
							  <td width="55"><strong>OUI ou N/A</strong></td>
							  <td width="43"><strong>NON</strong></td>
							  <td  align="center"> <strong>COMMENTAIRES</strong></td>
							</tr>
							
							<tr>
						 <td width="305" >Les op&eacute;rations diverses pass&eacute;es au cr&eacute;dit des  comptes<br> clients sont-elles </td>
									  <td width="34"></td>
									  <td width="55" style="bordure:none"><?php echo $c1; ?>&nbsp;</td>
									  <td width="43"><?php echo $c1b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireC[0])){}else{echo $commentaireC[0];} ?>&nbsp;</td>
									 
						    </tr>
							
							<tr>
						      <td >a) soumises &agrave; autorisation avant comptabilisation ?</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td><?php echo $c3b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireC[2])){}else{echo $commentaireC[2];} ?>&nbsp;</td>
						      
					       </tr>
						    <tr>
						      <td >b) revues par une personne ind&eacute;pendante ?</td>
						      <td>&nbsp;</td>
						      <td><?php echo $c3; ?></td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
					       </tr>
						    <tr>
						      <td >Les avis de paiement sont-ils annul&eacute;s apr&egrave;s  comptabilisation<br> pour &eacute;viter les enregistrements multiples  ?</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
					       </tr>
						    <tr>
						      <td >Les r&egrave;glements enregistr&eacute;s au cr&eacute;dit des comptes  clients sont-ils <br>rapproch&eacute;s des montants effectivement encaiss&eacute;s par la banque  ?</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
					       </tr>
						    <tr>
						      <td >Les signataires s'assurent-ils, au moins pas  sondage, que les <br>titres de paiement correspondent aux pi&egrave;ces justificatives  <br>jointes&nbsp;?</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
					       </tr>
						    <tr>
						      <td >L'&eacute;ch&eacute;ancier des effets &agrave; recevoir est-il:</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
					       </tr>
						    <tr>
						      <td >a) r&eacute;guli&egrave;rement rapproch&eacute; du montant pass&eacute; au cr&eacute;dit  des<br> comptes clients ?</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
					       </tr>
						    <tr>
						      <td >b) analys&eacute; par identifier les dates d'&eacute;ch&eacute;ances  anormales ?</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
					       </tr>
						    <tr>
									  <td width="305" >Ces dates font-elles l'objet d'explication  ?</td>
									  <td width="34"></td>
									  <td width="55"><?php echo $c4; ?>&nbsp;</td>
									  <td width="43"><?php echo $c4b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireC[3])){}else{echo $commentaireC[3];} ?>&nbsp;</td>
									  
						    </tr><tr>
									  <td width="305" >Les effets retourn&eacute;es impay&eacute;s sont-ils :</td>
									  <td width="34"></td>
									  <td width="55"><?php echo $c5; ?>&nbsp;</td>
									  <td width="43"><?php echo $c5b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireC[4])){}else{echo $commentaireC[4];} ?>&nbsp;</td>
									 
						    </tr>
						    <tr>
						      <td >a) imm&eacute;diatement red&eacute;bit&eacute;s au compte client ?</td>
						      <td width="34"></td>
						      <td width="55">&nbsp;</td>
						      <td width="43">&nbsp;</td>
						      <td width="181">&nbsp;</td>
	                       </tr>
						    <tr>
						      <td >b) soumis &agrave; un responsable ?</td>
						      <td></td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
					       </tr>
									 
                </table>	
			    <br>
				<table class="table" border="1">
				  <tr>
				    <td style="width:485px"><b>NIVEAU DE RISQUE :</b><br>
				      <br>
				      <br></td>
				    <td  style="width:250px"><strong>/38</strong><br>
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
            D -<strong>S'assurer que toutes les recettes sont enregistr&eacute;es dans la bonne  p&eacute;riode.</strong></b></div></td>
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
            <td width="312" ><p>Les virements de fonds sont-ils enregistr&eacute;s  simultan&eacute;ment sur les<br> comptes concern&eacute;s   ?</p></td>
            <td width="48">&nbsp;</td>
            <td width="33" style="bordure:none"><br>              
              &nbsp;</td>
            <td width="36"><br>              
              &nbsp;</td>
            <td width="135">&nbsp;</td>
          </tr>
          <tr>
            <td width="312" >Sinon, v&eacute;rifie-t-on que le compte virements de  fonds est <br>r&eacute;guli&egrave;rement apur&eacute; ?</td>
            <td width="48">&nbsp;</td>
            <td width="33" style="bordure:none">&nbsp;</td>
            <td width="36">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td >Les recettes sont-elles comptabilis&eacute;es au jour le  jour  ?</td>
            <td width="48">&nbsp;</td>
            <td width="33" style="bordure:none">&nbsp;</td>
            <td width="36">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td >En fin de p&eacute;riode, la comptabilit&eacute; s'assure-t-elle  qu'elle a enregistr&eacute; :</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td >a) tous les r&egrave;glements re&ccedil;us dans la p&eacute;riode&nbsp;?</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td >b) uniquement ceux-l&agrave;  ?</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="312" >Les recettes enregistr&eacute;es par la banque et non par  la soci&eacute;t&eacute;, <br>d&eacute;cel&eacute;es par les rapprochements de banque, sont-elles enregistr&eacute;es<br>  
              sur la p&eacute;riode ?</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td >Les reports d'&eacute;ch&eacute;ance sont-ils :</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td >a)autoris&eacute;s par une personne ind&eacute;-pendante&nbsp;?</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td >b) communiqu&eacute;s &agrave; la comptabilit&eacute; ?</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td >c) enregistr&eacute;s sur l'&eacute;ch&eacute;ancier d&egrave;s qu'ils sont  accord&eacute;s ?</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
     <br><br>
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

<!-- ====================================================================== -->

                
            <page pageset="old">
        <br><br><br><br><br><br><br><br><br><br><br><br><br>
				<div  style="border:solid;left:3px;text-align: left; width:732px;  text-justify: newspaper">
				  <div id="corp_objet3"  style="border:solid;left:3px; top: 130px;text-align: left; width:732px;  text-justify: newspaper"> <b> OBJECTIF DE CONTR&Ocirc;LE :<br>
				    E <strong>S'assurer que toutes les recettes enregistr&eacute;es sont correctement  &eacute;valu&eacute;es.</strong></b></div>
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
						 <td colspan="5" >Les &eacute;carts constat&eacute;s entre les r&egrave;glements re&ccedil;us et  les factures sont-ils:<br>				           &nbsp;&nbsp;</td>
						    </tr>
							<tr>
							  <td >a) analys&eacute;s ?</td>
						      <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $e1; ?></td>
						      <td width="43"><?php echo $e1b; ?></td>
						      <td width="181"><?php if(empty($commentaireE[0])){}else{echo $commentaireE[0];} ?></td>
						   </tr>
							<tr>
							  <td >b) corrig&eacute;s rapidement ?</td>
						      <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $e2; ?></td>
						      <td width="43"><?php echo $e2b; ?></td>
						      <td width="181">&nbsp;</td>
						   </tr>
							<tr>
							  <td >c) soumis &agrave; autorisation ?</td>
						      <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $e3; ?></td>
						      <td width="43"><?php echo $e3b; ?></td>
						      <td width="181">&nbsp;</td>
						   </tr>
							<tr>
							  <td >Les effets en portefeuille sont-ils r&eacute;guli&egrave;rement  totalis&eacute;s et <br>rapproch&eacute;s </td>
						      <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $e4; ?></td>
						      <td width="43"><?php echo $e4b; ?></td>
						      <td width="181">&nbsp;</td>
						   </tr>
							
							<tr>
									  <td width="305" >a) de l'&eacute;ch&eacute;ancier    ?
							  <br></td>
									  <td width="34"></td>
									  <td width="55"><br><?php echo $e5; ?>&nbsp;</td>
									  <td width="43"><br><?php echo $e5b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireE[1])){}else{echo $commentaireE[1];} ?>&nbsp;</td>
						    </tr>
						    <tr>
						      <td >b) du compte g&eacute;n&eacute;ral ?</td>
						      <td>&nbsp;</td>
						      <td><br><?php echo $e6; ?>&nbsp;</td>
						      <td><br><?php echo $e6b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireE[2])){}else{echo $commentaireE[2];} ?>&nbsp;</td>
					       </tr>
						    <tr>
									  <td width="305" >Les r&egrave;glements re&ccedil;us en devis sont-ils rapproch&eacute;s  des <br>montants effectivement encaiss&eacute;s par la banque   ?</td>
									  <td width="34"></td>
									  <td width="55"><br><?php echo $e7; ?>&nbsp;</td>
									  <td width="43"><br><?php echo $e7b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireE[3])){}else{echo $commentaireE[3];} ?>&nbsp;</td>
						    </tr>
						    <tr>
						      <td >Les diff&eacute;rences de change &eacute;ventuelles sont-elles<br>  imm&eacute;diatement enregistr&eacute;es </td>
						      <td></td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
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
  
<!--============================================================================================================================================
-->				
			  <page pageset="old">
   			<br><br><br><br><br><br><br><br><br><br>
      <div class="niveau" style="padding-left:60px">
        <table width="690" border="1">
          <tr>
            <td colspan="4" ><strong>RESUME DE LA REVUE DU SYSTEME DE CONTROLE INTERNE TRESORERIE  &ndash; FC5</strong></td>
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
