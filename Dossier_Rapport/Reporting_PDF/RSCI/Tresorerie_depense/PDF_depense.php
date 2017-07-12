<?php
@session_start();
include('../../../../connexion.php');

$date_entete=date('d-m-Y');

//====================================================================================================================
	
	$resultat="select DISTINCT(m.ENTREPRISE_ID),m.MISSION_ANNEE,e.ENTREPRISE_DENOMINATION_SOCIAL 
 from tab_mission m,tab_entreprise e,tab_objectif o
  where m.MISSION_ID='".$_SESSION['idMission']."' 
        and m.ENTREPRISE_ID=e.ENTREPRISE_ID
        and o.MISSION_ID=m.MISSION_ID
        and UTIL_ID='".$_SESSION['id']."'";
	$rps=$bdd->query($resultat);
	$donnee=$rps->fetch();
	$nomEntreprise=$donnee['ENTREPRISE_DENOMINATION_SOCIAL'];
//====================CASE A COCHER===================================================================================

//SELECT QUESTION_ID FROM tab_objectif WHERE UTIL_ID=1 AND MISSION_ID=3 AND QUESTION_ID BETWEEN 23 AND 33
$req='SELECT QUESTION_ID,OBJECTIF_QCM,OBJECTIF_COMMENTAIRE FROM tab_objectif WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=22';
$r1=$r1b=$r2b=$r3b=$r4b=$r5b=$r6b=$r7b=$r8b=$r9b=$r10b=$r11b=$r12b=$r13b=$r14b=$r15b="";
$r2="";
$r3=$r4=$r5=$r6=$r7=$r8=$r9=$r10=$r11=$r12=$r13=$r14=$r15="";
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
	if(($donnee['QUESTION_ID']=="280")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r1="X";$scoreB[$k]=3;$k++;
	}
	//question numero 1 - b)
	else if(($donnee['QUESTION_ID']=="280")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r1b="X";$scoreB[$k]=0;$k++;
	}
	//=========================================================================================================
	if(($donnee['QUESTION_ID']=="281")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r2="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="281")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r2b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="282")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r3="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="282")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r3b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="283")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r4="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="283")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r4b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="284")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r5="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="284")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r5b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="285")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r6="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="285")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r6b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="286")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r7="X";$scoreB[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="286")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r7b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="287")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r8="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="287")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r8b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="288")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r9="X";$scoreB[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="288")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r9b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="289")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r10="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="289")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r10b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="290")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r11="X";$scoreB[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="290")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r11b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="291")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r12="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="291")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r12b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="292")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r13="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="292")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r13b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="293")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r14="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="293")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r14b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="294")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r15="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="294")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r15b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	
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
$q3=$q4=$q5=$q6=$q7=$q8=$q9=$q10=$q11=$q12=$q13=$q14=$q15=$q16=$q17=$q18=$q19=$q20=$q21=$q22=$q23=$q24="";
$req1='select FONCT_A_LIGNE,MISSION_ID,UTIL_ID from tab_fonct_a WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND FONCT_A_NOM="tresorerie_depense"';
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
$req21='SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE from tab_synthese WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=22';
$reponse11=$bdd->query($req21);
$donnee11=$reponse11->fetch();
$comm1=$donnee11['SYNTHESE_COMMENTAIRE'];
$synth1=$donnee11['SYNTHESE_RISQUE'];
//=======================================================================================================================
//CONCLUSION ET RISQUE C
$comm2=$synth2="";
$req211='SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE from tab_synthese WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=23';
$reponse111=$bdd->query($req211);
$donnee111=$reponse111->fetch();
$comm2=$donnee111['SYNTHESE_COMMENTAIRE'];
$synth2=$donnee111['SYNTHESE_RISQUE'];
//=======================================================================================================================
//CONCLUSION ET RISQUE D
$comm3=$synth3="";
$req2111='SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE from tab_synthese WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=24';
$reponse1111=$bdd->query($req2111);
$donnee1111=$reponse1111->fetch();
$comm3=$donnee1111['SYNTHESE_COMMENTAIRE'];
$synth3=$donnee1111['SYNTHESE_RISQUE'];
//=======================================================================================================================
//CONCLUSION ET RISQUE E
$comm4=$synth4="";
$req21111='SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE from tab_synthese WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=25';
$reponse11111=$bdd->query($req21111);
$donnee11111=$reponse11111->fetch();
$comm4=$donnee11111['SYNTHESE_COMMENTAIRE'];
$synth4=$donnee11111['SYNTHESE_RISQUE'];
//=======================================================================================================================

//========================================================================================================================
$req3='SELECT QUESTION_ID,OBJECTIF_QCM,OBJECTIF_COMMENTAIRE FROM tab_objectif WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=23';
$c1=$c1b=$c2b=$c3b=$c4b=$c5b=$c6b=$c7b=$c8b=$c9b="";
$c2="";
$c3=$c4=$c5=$c6=$c7=$c8=$c9="";
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
	if(($donnee['QUESTION_ID']=="295")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$scoreC[$k]=3;$k++;
		$c1="X";
	}
	//question numero 1 - b)
	else if(($donnee['QUESTION_ID']=="295")&&($donnee['OBJECTIF_QCM']=="NON")){
		$scoreC[$k]=0;$k++;
		$c1b="X";
	}
	//=========================================================================================================
	if(($donnee['QUESTION_ID']=="296")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$scoreC[$k]=3;$k++;
		$c2="X";
	}
	else if(($donnee['QUESTION_ID']=="296")&&($donnee['OBJECTIF_QCM']=="NON")){
		$scoreC[$k]=0;$k++;
		$c2b="X";
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="297")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$scoreC[$k]=2;$k++;
		$c3="X";
	}
	else if(($donnee['QUESTION_ID']=="297")&&($donnee['OBJECTIF_QCM']=="NON")){
		$scoreC[$k]=0;$k++;
		$c3b="X";
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="298")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c4="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="298")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c4b="X";
		$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="299")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c5="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="299")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c5b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="300")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c6="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="300")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c6b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="301")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c7="X";$scoreC[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="301")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c7b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="302")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c8="X";$scoreC[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="302")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c8b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="303")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c9="X";$scoreC[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="303")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c9b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	
}
$total_scoreC=0;
$max = sizeof($scoreC);
for($i=0;$i<$max;$i++){
	$total_scoreC=$total_scoreC + $scoreC[$i];
}
//========================================================================================================================
$req4='SELECT QUESTION_ID,OBJECTIF_QCM,OBJECTIF_COMMENTAIRE FROM tab_objectif WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=24';
$d1=$d1b=$d2b=$d3b=$d4b=$d5b=$d6b=$d7b=$d8b="";
$d2="";
$d3=$d4=$d5=$d6=$d7=$d8="";
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
	if(($donnee['QUESTION_ID']=="304")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d1="X";$scoreD[$k]=2;$k++;
	}
	//question numero 1 - b)
	else if(($donnee['QUESTION_ID']=="304")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d1b="X";$scoreD[$k]=0;$k++;
	}
	//=========================================================================================================
	if(($donnee['QUESTION_ID']=="305")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d2="X";$scoreD[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="305")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d2b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="306")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d3="X";$scoreD[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="306")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d3b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="307")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d4="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="307")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d4b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="308")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d5="X";$scoreD[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="308")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d5b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="309")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d6="X";$scoreD[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="309")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d6b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="310")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d7="X";$scoreD[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="310")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d7b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="311")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d8="X";$scoreD[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="311")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d8b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

}
$total_scoreD=0;
$max = sizeof($scoreD);
for($i=0;$i<$max;$i++){
	$total_scoreD=$total_scoreD + $scoreD[$i];
}

//========================================================================================================================
$req5='SELECT QUESTION_ID,OBJECTIF_QCM,OBJECTIF_COMMENTAIRE FROM tab_objectif WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=25';
$e1=$e1b=$e2b=$e3b=$e4b=$e5b=$e6b="";
$e2="";
$e3=$e4=$e5=$e6="";
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
	if(($donnee['QUESTION_ID']=="312")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$e1="X";$scoreE[$k]=3;$k++;
	}
	//question numero 1 - b)
	else if(($donnee['QUESTION_ID']=="312")&&($donnee['OBJECTIF_QCM']=="NON")){
		$e1b="X";$scoreE[$k]=0;$k++;
	}
	//=========================================================================================================
	if(($donnee['QUESTION_ID']=="313")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$e2="X";$scoreE[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="313")&&($donnee['OBJECTIF_QCM']=="NON")){
		$e2b="X";$scoreE[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="314")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$e3="X";$scoreE[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="314")&&($donnee['OBJECTIF_QCM']=="NON")){
		$e3b="X";$scoreE[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="315")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$e4="X";$scoreE[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="315")&&($donnee['OBJECTIF_QCM']=="NON")){
		$e4b="X";$scoreE[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="316")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$e5="X";$scoreE[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="316")&&($donnee['OBJECTIF_QCM']=="NON")){
		$e5b="X";$scoreE[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="317")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$e6="X";$scoreE[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="317")&&($donnee['OBJECTIF_QCM']=="NON")){
		$e6b="X";$scoreE[$k]=0;$k++;
	}
	//==========================================================================================================
}
$total_scoreE=0;
$max = sizeof($scoreE);
for($i=0;$i<$max;$i++){
	$total_scoreE=$total_scoreE + $scoreE[$i];
}

//========================================================================================================================


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
          <td width="223"><b>Client</b><br><span style="color: CMYK(0, 0, 100%, 0)"><b><h4><?php if(empty($nomEntreprise)){}else{ echo $nomEntreprise;}?></h4></b></span></td>
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
<p align="center"><strong>tr&eacute;sorerie  d&eacute;penses</strong></p>
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
	    <td><?php echo $q23; ?>&nbsp;</td>
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
	    <td>24 Mise &agrave; jour du fichier permanent</td>
	    <td><?php echo $q24; ?>&nbsp;</td>
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
            B -<strong>- S'assurer que tous les paiements effectu&eacute;s sont saisis et  comptabilis&eacute;s (exhaustivit&eacute;).</strong></b></div></td>
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
            <td colspan="5" ><p>
              Les titres de paiement &eacute;mis sont-ils pr&eacute;num&eacute;rot&eacute;s ?</p></td>
          </tr>
          <tr>
            <td width="312" >a)ch&egrave;ques  ?</td>
            <td width="48">&nbsp;</td>
            <td width="33" style="bordure:none"><?php echo $r1; ?>&nbsp;</td>
            <td width="36"><?php echo $r1b; ?>&nbsp;</td>
            <td><?php  if(empty($commentaire[0])){}else{echo $commentaire[0];}?>&nbsp;</td>
          </tr>
          <tr>
            <td >b)traites ?</td>
            <td >&nbsp;</td>
            <td width="33" style="bordure:none"><?php echo $r2; ?>&nbsp;</td>
            <td width="36"><?php echo $r2b; ?>&nbsp;</td>
            <td><?php  if(empty($commentaire[1])){}else{echo $commentaire[1];}?>&nbsp;</td>
          </tr>
          <tr>
            <td >c)autres  ?</td>
            <td width="48">&nbsp;</td>
            <td width="33" style="bordure:none"><?php echo $r3; ?>&nbsp;</td>
            <td width="36"><?php echo $r3b; ?>&nbsp;</td>
            <td><?php  if(empty($commentaire[2])){}else{echo $commentaire[2];}?>&nbsp;</td>
          </tr>
          <tr>
            <td >Les titres de paiement vierges (y compris les  supports informatiques) <br>sont-ils correctement prot&eacute;g&eacute;s  ? </td>
            <td width="48">&nbsp;</td>
            <td width="33" style="bordure:none"><?php echo $r4; ?>&nbsp;</td>
            <td width="36"><?php echo $r4b; ?>&nbsp;</td>
            <td><?php  if(empty($commentaire[3])){}else{echo $commentaire[3];}?>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="5" >La mise en service des liasses de titres de  paiement est-elle (liasses manuelles ou informatiques)  :</td>
          </tr>
          <tr>
            <td >a)	enregistr&eacute;e ?</td>
            <td width="48">&nbsp;</td>
           <td width="33" style="bordure:none"><?php echo $r5; ?>&nbsp;</td>
            <td width="36"><?php echo $r5b; ?>&nbsp;</td>
            <td><?php  if(empty($commentaire[4])){}else{echo $commentaire[4];}?>&nbsp;</td>
          </tr>
          <tr>
            <td >b)rapproch&eacute;es  des journaux correspondants&nbsp; ? </td>
            <td width="48">&nbsp;</td>
           <td width="33" style="bordure:none"><?php echo $r6; ?>&nbsp;</td>
            <td width="36"><?php echo $r6b; ?>&nbsp;</td>
            <td><?php  if(empty($commentaire[5])){}else{echo $commentaire[5];}?>&nbsp;</td>
          </tr>
          <tr>
            <td >Les titres de paiements &eacute;mis sont-ils comptabilis&eacute;s  dans l'ordre num&eacute;rique ?   </td>
            <td >&nbsp;</td>
            <td width="33" style="bordure:none"><?php echo $r7; ?>&nbsp;</td>
            <td width="36"><?php echo $r7b; ?>&nbsp;</td>
            <td><?php  if(empty($commentaire[6])){}else{echo $commentaire[6];}?>&nbsp;</td>
          </tr>
          <tr>
            <td >La s&eacute;quence num&eacute;rique des titres de paiement sur le  journal de <br>tr&eacute;sorerie est-elle v&eacute;rifi&eacute;e   ?</td>
            <td width="48">&nbsp;</td>
           <td width="33" style="bordure:none"><?php echo $r8; ?>&nbsp;</td>
            <td width="36"><?php echo $r8b; ?>&nbsp;</td>
            <td><?php  if(empty($commentaire[7])){}else{echo $commentaire[7];}?>&nbsp;</td>
          </tr>
          <tr>
            <td >Les pr&eacute;l&egrave;vements automatiques sont-ils enregistr&eacute;s  d&egrave;s leur <br>
              &eacute;ch&eacute;ance ? </td>
            <td width="48">&nbsp;</td>
            <td width="33" style="bordure:none"><?php echo $r9; ?>&nbsp;</td>
            <td width="36"><?php echo $r9b; ?>&nbsp;</td>
            <td><?php  if(empty($commentaire[8])){}else{echo $commentaire[8];}?>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="5" >Les paiements en esp&egrave;ces sont-ils :</td>
          </tr>
          <tr>
            <td >a)saisis sur des pi&egrave;ces de caisse pr&eacute;num&eacute;rot&eacute;es ?</td>
            <td>&nbsp;</td>
            <td width="33" style="bordure:none"><?php echo $r10; ?>&nbsp;</td>
            <td width="36"><?php echo $r10b; ?>&nbsp;</td>
            <td><?php  if(empty($commentaire[9])){}else{echo $commentaire[9];}?>&nbsp;</td>
          </tr>
          <tr>
            <td >b)enregistr&eacute;s dans l'ordre de ces pi&egrave;ces ?</td>
            <td>&nbsp;</td>
            <td width="33" style="bordure:none"><?php echo $r11; ?>&nbsp;</td>
            <td width="36"><?php echo $r11b; ?>&nbsp;</td>
            <td><?php  if(empty($commentaire[10])){}else{echo $commentaire[10];}?>&nbsp;</td>
          </tr>
          <tr>
            <td width="312" >Pour les fournisseurs qui envoient des relev&eacute;s, les  r&egrave;glements &eacute;mis <br>
              sont-ils rapproch&eacute;s des relev&eacute;s ? </td>
            <td width="48">&nbsp;</td>
           <td width="33" style="bordure:none"><?php echo $r12; ?>&nbsp;</td>
            <td width="36"><?php echo $r12b; ?>&nbsp;</td>
            <td><?php  if(empty($commentaire[11])){}else{echo $commentaire[11];}?>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="5" >Les &eacute;carts sont-ils :</td>
          </tr>
          <tr>
            <td >a)analys&eacute;s ?</td>
            <td>&nbsp;</td>
           <td width="33" style="bordure:none"><?php echo $r13; ?>&nbsp;</td>
            <td width="36"><?php echo $r13b; ?>&nbsp;</td>
            <td><?php  if(empty($commentaire[12])){}else{echo $commentaire[12];}?>&nbsp;</td>
          </tr>
          <tr>
            <td >b)corrig&eacute;s ?</td>
            <td>&nbsp;</td>
            <td width="33" style="bordure:none"><?php echo $r14; ?>&nbsp;</td>
            <td width="36"><?php echo $r14b; ?>&nbsp;</td>
            <td><?php  if(empty($commentaire[13])){}else{echo $commentaire[13];}?>&nbsp;</td>
          </tr>
          <tr>
            <td >Si des &eacute;tats d&rsquo;anomalies sont produits par  l&rsquo;informatique, sont-ils<br> 
              r&eacute;guli&egrave;rement analys&eacute;s par une personne ind&eacute;pendante ? </td>
            <td>&nbsp;</td>
            <td width="33" style="bordure:none"><?php echo $r15; ?>&nbsp;</td>
            <td width="36"><?php echo $r15b; ?>&nbsp;</td>
            <td><?php  if(empty($commentaire[14])){}else{echo $commentaire[14];}?>&nbsp;</td>
          </tr>
        </table>
        <br>
        <div style="border:solid">
          <table class="table" border="1">
            <tr>
              <td style="width:485px"><b>NIVEAU DE RISQUE :</b><br>
                <b><?php echo $comm; ?></b><br>
                <br></td>
              <td  style="width:250px"><br>
                <b><?php echo $total_scoreB; ?></b><br>
                <br>
                <br></td>
            </tr>
          </table>
        </div>
     
      </page>
      
	

      
      <page pageset="old">		 
<!--============================================================================PAGE 5======================================================== -->
						 	<br><br><br><br><br><br><br><br><br>
<br><br><br><br>				<div   style="border:solid;left:3px;text-align: left; width:732px;  text-justify: newspaper">
							<b> OBJECTIF DE CONTR&ocirc;LE :<br>C -<strong>S'assurer que les r&egrave;glements comptabilis&eacute;s correspondent &agrave; des d&eacute;penses  r&eacute;elles de l'entreprise.</strong></b> </div><br>			 
						 
						 <table width="694" height="30"  border="1" class="table_p4" align="center" >
							<tr>
							  <td width="305" align="center" ><strong>QUESTIONS</strong></td>
							  <td width="34"><p align="justify"><strong>R&eacute;f<br>Diag</strong></p></td>
							  <td width="55"><strong>OUI ou N/A</strong></td>
							  <td width="43"><strong>NON</strong></td>
							  <td  align="center"> <strong>COMMENTAIRES</strong></td>
							</tr>
							
							<tr>
						 <td width="305" >Les duplicatas de titres de paiement sont-ils  syst&eacute;matiquement<br> 
						   annul&eacute;s pour &eacute;viter les doubles comptabilisations?</td>
									  <td width="34"></td>
									  <td width="55" style="bordure:none"><?php echo $c1; ?>&nbsp;</td>
									  <td width="43"><?php echo $c1b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireC[0])){}else{echo $commentaireC[0];} ?>&nbsp;</td>
						    </tr>
							
							<tr>
						      <td >Les pi&egrave;ces justificatives des titres de paiement  sont-elles annul&eacute;es<br> 
						        apr&egrave;s paiement pour &eacute;viter les doubles r&egrave;glements par le signataire ?</td>
						      <td width="34"></td>
									  <td width="55" style="bordure:none"><?php echo $c2; ?>&nbsp;</td>
									  <td width="43"><?php echo $c2b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireC[1])){}else{echo $commentaireC[1];} ?>&nbsp;</td>
					       </tr>
						    <tr>
						      <td >Les titres de paiement sont-ils transmis aux  b&eacute;n&eacute;ficiaires directement <br>
						        par le signataire (et non le demandeur) ?</td>
						      <td width="34"></td>
									  <td width="55" style="bordure:none"><?php echo $c3; ?>&nbsp;</td>
									  <td width="43"><?php echo $c3b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireC[2])){}else{echo $commentaireC[2];} ?>&nbsp;</td>
					       </tr>
						    <tr>
						      <td >Les signataires s'assurent-ils, au moins pas  sondage, que les <br>titres de paiement correspondent aux pi&egrave;ces justificatives  <br>jointes&nbsp;?</td>
						      <td width="34"></td>
									  <td width="55" style="bordure:none"><?php echo $c4; ?>&nbsp;</td>
									  <td width="43"><?php echo $c4b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireC[3])){}else{echo $commentaireC[3];} ?>&nbsp;</td>
					       </tr>
						    <tr>
						      <td >Les journaux de tr&eacute;sorerie sont-ils contr&ocirc;l&eacute;s pour  identifier les<br> 
						        doubles comptabilisations&nbsp;?</td>
						      <td width="34"></td>
									  <td width="55" style="bordure:none"><?php echo $c5; ?>&nbsp;</td>
									  <td width="43"><?php echo $c5b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireC[4])){}else{echo $commentaireC[4];} ?>&nbsp;</td>
					       </tr>
						    <tr>
						      <td >Les soldes de comptes fournisseurs sont-ils  analys&eacute;s<br> r&eacute;guli&egrave;rement pour identifier les doubles r&egrave;glements ?</td>
						      <td width="34"></td>
									  <td width="55" style="bordure:none"><?php echo $c6; ?>&nbsp;</td>
									  <td width="43"><?php echo $c6b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireC[5])){}else{echo $commentaireC[5];} ?>&nbsp;</td>
					       </tr>
						    <tr>
						      <td colspan="5" >Les op&eacute;rations diverses pass&eacute;es au d&eacute;bit des  comptes<br> fournisseurs ou sur le journal de tr&eacute;sorerie sont elles </td>
					       </tr>
						    <tr>
									  <td width="305" >a)accompagn&eacute;es de pi&egrave;ces justificatives ?</td>
									  <td width="34"></td>
									  <td width="55" style="bordure:none"><?php echo $c7; ?>&nbsp;</td>
									  <td width="43"><?php echo $c7b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireC[6])){}else{echo $commentaireC[6];} ?>&nbsp;</td>
						    </tr><tr>
									  <td width="305" >b)soumises &agrave; l'autorisation d'un responsable&nbsp;?</td>
									 <td width="34"></td>
									  <td width="55" style="bordure:none"><?php echo $c8; ?>&nbsp;</td>
									  <td width="43"><?php echo $c8b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireC[7])){}else{echo $commentaireC[7];} ?>&nbsp;</td>
									 
						    </tr>
						    <tr>
						      <td >Les &eacute;tats d&rsquo;anomalies produits par l&rsquo;informatique  sont-ils <br>
						        r&eacute;guli&egrave;rement analys&eacute;s par une personne ind&eacute;pendante ? </td>
						      <td width="34"></td>
									  <td width="55" style="bordure:none"><?php echo $c9; ?>&nbsp;</td>
									  <td width="43"><?php echo $c9b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireC[8])){}else{echo $commentaireC[8];} ?>&nbsp;</td>
	                       </tr>
	            </table>	
			    <br>
					
				<div style="border:solid">
          <table class="table" border="1">
            <tr>
              <td style="width:485px"><b>NIVEAU DE RISQUE :</b><br>
                <b><?php echo $comm2; ?></b><br>
                <br></td>
              <td  style="width:250px"><br>
                <b><?php echo $total_scoreC; ?> / 38</b><br>
                <br>
                <br></td>
            </tr>
          </table>
        </div>
				
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
            D -<strong>S'assurer que tous les paiements r&eacute;alis&eacute;s sont enregistr&eacute;s sur la bonne  p&eacute;riode.</strong></b></div></td>
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
            <td width="312" ><p>En fin de p&eacute;riode, la comptabilit&eacute; est-elle  inform&eacute;e des <br>derniers num&eacute;ros de titres de paiement utilis&eacute;s  ?</p></td>
            <td width="48">&nbsp;</td>
            <td width="33" style="bordure:none"><?php echo $d1; ?>&nbsp;</td>
            <td width="36"><?php echo $d1b; ?>&nbsp;</td>
            <td width="135"><?php if(empty($commentaireD[0])){}else{echo $commentaireD[0];} ?>&nbsp;</td>
          </tr>
          <tr>
            <td width="312" >La comptabilit&eacute; s'assure-t-elle que tous les titres  de paiements <br>&eacute;mis sur la p&eacute;riode ont &eacute;t&eacute; comptabilis&eacute;s  ?</td>
            <td width="48">&nbsp;</td>
            <td width="33" style="bordure:none"><?php echo $d2; ?>&nbsp;</td>
            <td width="36"><?php echo $d2b; ?>&nbsp;</td>
            <td width="135"><?php if(empty($commentaireD[1])){}else{echo $commentaireD[1];} ?>&nbsp;</td>
          </tr>
          <tr>
            <td >Les rapprochements de banque sont-ils revus par un  responsable <br>pour s'assurer que toutes les &eacute;critures significatives pass&eacute;es par  la<br> banque et pas par l'entreprise sont apur&eacute;es avant la cl&ocirc;ture des <br>comptes ?</td>
            <td width="48">&nbsp;</td>
           <td width="33" style="bordure:none"><?php echo $d3; ?>&nbsp;</td>
            <td width="36"><?php echo $d3b; ?>&nbsp;</td>
            <td width="135"><?php if(empty($commentaireD[2])){}else{echo $commentaireD[2];} ?>&nbsp;</td>
          </tr>
          <tr>
            <td >La comptabilit&eacute; est-elle inform&eacute;e des derniers  num&eacute;ros de pi&egrave;ces de<br> caisse de la p&eacute;riode  ?</td>
            <td width="48">&nbsp;</td>
           <td width="33" style="bordure:none"><?php echo $d4; ?>&nbsp;</td>
            <td width="36"><?php echo $d4b; ?>&nbsp;</td>
            <td width="135"><?php if(empty($commentaireD[3])){}else{echo $commentaireD[3];} ?>&nbsp;</td>
          </tr>
          <tr>
            <td >La comptabilit&eacute; v&eacute;rifie-t-elle que toutes les  pi&egrave;ces de caisse de la<br> p&eacute;riode ont &eacute;t&eacute; saisies  ?</td>
            <td width="48">&nbsp;</td>
           <td width="33" style="bordure:none"><?php echo $d5; ?>&nbsp;</td>
            <td width="36"><?php echo $d5b; ?>&nbsp;</td>
            <td width="135"><?php if(empty($commentaireD[4])){}else{echo $commentaireD[4];} ?>&nbsp;</td>
          </tr>
          <tr>
            <td >Les esp&egrave;ces en caisse sont-elles physiquement  contr&ocirc;l&eacute;es et <br>
              rapproch&eacute;es du livre de caisse en fin de p&eacute;riode ?</td>
            <td width="48">&nbsp;</td>
           <td width="33" style="bordure:none"><?php echo $d6; ?>&nbsp;</td>
            <td width="36"><?php echo $d6b; ?>&nbsp;</td>
            <td width="135"><?php if(empty($commentaireD[5])){}else{echo $commentaireD[5];} ?>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="5" >Les comptes bancaires sont-ils cr&eacute;dit&eacute;s :</td>
          </tr>
          <tr>
            <td >a)au jour de l'&eacute;ch&eacute;ance pour les effets ?</td>
            <td width="48">&nbsp;</td>
           <td width="33" style="bordure:none"><?php echo $d7; ?>&nbsp;</td>
            <td width="36"><?php echo $d7b; ?>&nbsp;</td>
            <td width="135"><?php if(empty($commentaireD[6])){}else{echo $commentaireD[6];} ?>&nbsp;</td>
          </tr>
          <tr>
            <td >b)&nbsp; au  jour de leur &eacute;mission pour les ch&egrave;ques&nbsp;</td>
            <td width="48">&nbsp;</td>
           <td width="33" style="bordure:none"><?php echo $d8; ?>&nbsp;</td>
            <td width="36"><?php echo $d8b; ?>&nbsp;</td>
            <td width="135"><?php if(empty($commentaireD[7])){}else{echo $commentaireD[7];} ?>&nbsp;</td>
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
				    E -<strong>S'assurer que les d&eacute;penses r&eacute;alis&eacute;es sont correctement &eacute;valu&eacute;es.</strong></b></div>
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
						 <td colspan="5" >Les souches des titres de paiement sont-elles  rapproch&eacute;es par une personne ind&eacute;pendante de celle qui les a &eacute;mis </td>
						    </tr>
							<tr>
							  <td >a) des justificatifs  ?</td>
						       <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $e1; ?></td>
						      <td width="43"><?php echo $e1b; ?></td>
						      <td width="181"><?php if(empty($commentaireE[0])){}else{echo $commentaireE[0];} ?></td>
						   </tr>
							<tr>
							  <td >b) de l'original ?</td>
						      <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $e2; ?></td>
						      <td width="43"><?php echo $e2b; ?></td>
						      <td width="181"><?php if(empty($commentaireE[1])){}else{echo $commentaireE[1];} ?></td>
						   </tr>
							<tr>
							  <td colspan="5" >Les d&eacute;ductions effectu&eacute;es lors du paiement  (acompte, escompte...) sont-elles  :</td>
					       </tr>
							<tr>
							  <td >a) signal&eacute;es &agrave; la comptabilit&eacute; ? </td>
						       <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $e3; ?></td>
						      <td width="43"><?php echo $e3b; ?></td>
						      <td width="181"><?php if(empty($commentaireE[2])){}else{echo $commentaireE[2];} ?></td>
						   </tr>
							
							<tr>
									  <td width="305" >b)comptabilis&eacute;es imm&eacute;diatement   ?
							  <br></td>
									   <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $e4; ?></td>
						      <td width="43"><?php echo $e4b; ?></td>
						      <td width="181"><?php if(empty($commentaireE[3])){}else{echo $commentaireE[3];} ?></td>
						    </tr>
						    <tr>
						      <td >Les personnes charg&eacute;es d'enregistrer les paiements  en devises <br>disposent-elles de listes de taux de change &agrave; jour ? </td>
						       <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $e5; ?></td>
						      <td width="43"><?php echo $e5b; ?></td>
						      <td width="181"><?php if(empty($commentaireE[4])){}else{echo $commentaireE[4];} ?></td>
					       </tr>
						    <tr>
									  <td width="305" >Les diff&eacute;rences de change sur r&egrave;glement sont-elles  r&eacute;guli&egrave;rement enregistr&eacute;es  ?</td>
									   <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $e6; ?></td>
						      <td width="43"><?php echo $e6b; ?></td>
						      <td width="181"><?php if(empty($commentaireE[5])){}else{echo $commentaireE[5];} ?></td>
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
            <td colspan="4"><strong>SYNTHESE</strong></td>
          </tr>
          <tr>
		  	<?php 
				
				$requete='select SYNTHESE from tab_synthese_rsci where UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE="tresorerie_depense"';
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
