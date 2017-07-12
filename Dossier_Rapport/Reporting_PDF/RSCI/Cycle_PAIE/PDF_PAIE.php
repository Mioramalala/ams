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
	
	// REQUETE MAKA ANLE CASE A COCHER CYCLE ACHAT

$q1="";
$q2="";
$q3=$q4=$q5=$q6=$q7=$q8=$q9=$q10=$q11=$q12=$q13=$q14=$q15=$q16="";
$req1='select FONCT_A_LIGNE,MISSION_ID,UTIL_ID from tab_fonct_a WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND FONCT_A_NOM="paie"';
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
	
}
//===========================================================================================================================
//  OBJECTIF B

$req='SELECT QUESTION_ID,OBJECTIF_QCM,OBJECTIF_COMMENTAIRE FROM tab_objectif WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=14';
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
	if(($donnee['QUESTION_ID']=="181")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r1="X";$scoreB[$k]=1;$k++;
	}
	//question numero 1 - b)
	else if(($donnee['QUESTION_ID']=="181")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r1b="X";$scoreB[$k]=0;$k++;
	}
	//=========================================================================================================
	if(($donnee['QUESTION_ID']=="182")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r2="X";$scoreB[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="182")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r2b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="183")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r3="X";$scoreB[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="183")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r3b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="184")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r4="X";$scoreB[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="184")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r4b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="185")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r5="X";$scoreB[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="185")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r5b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="186")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r6="X";$scoreB[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="186")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r6b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="187")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r7="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="187")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r7b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="188")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r8="X";$scoreB[$k]=8;$k++;
	}
	else if(($donnee['QUESTION_ID']=="188")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r8b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="189")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r9="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="189")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r9b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="190")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r10="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="190")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r10b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="191")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r11="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="191")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r11b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="192")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r12="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="192")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r12b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="193")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r13="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="193")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r13b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="194")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r14="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="194")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r14b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="195")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r15="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="195")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r15b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

}
$total_scoreB=0;
$max = sizeof($scoreB);
for($i=0;$i<$max;$i++){
	$total_scoreB=$total_scoreB + $scoreB[$i];
}

//=========================================================================================================================

$req3='SELECT QUESTION_ID,OBJECTIF_QCM,OBJECTIF_COMMENTAIRE FROM tab_objectif WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=15';
$c1=$c1b=$c2b=$c3b=$c4b=$c5b=$c6b=$c7b=$c8b=$c9b=$c10b=$c11b=$c12b=$c13b=$c14b=$c15b=$c16b=$c17b=$c18b=$c19b=$c20b=$c21b=$c22b=$c23b=$c24b=$c25b=$c26b="";
$c2="";
$c3=$c4=$c5=$c6=$c7=$c8=$c9=$c10=$c11=$c12=$c13=$c15=$c16=$c17=$c18=$c19=$c20=$c21=$c22=$c22=$c23=$c24=$c25=$c26=$c14="";
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
	if(($donnee['QUESTION_ID']=="196")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$scoreC[$k]=2;$k++;
		$c1="X";
	}
	//question numero 1 - b)
	else if(($donnee['QUESTION_ID']=="196")&&($donnee['OBJECTIF_QCM']=="NON")){
		$scoreC[$k]=0;$k++;
		$c1b="X";
	}
	//=========================================================================================================
	if(($donnee['QUESTION_ID']=="197")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$scoreC[$k]=2;$k++;
		$c2="X";
	}
	else if(($donnee['QUESTION_ID']=="197")&&($donnee['OBJECTIF_QCM']=="NON")){
		$scoreC[$k]=0;$k++;
		$c2b="X";
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="198")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$scoreC[$k]=2;$k++;
		$c3="X";
	}
	else if(($donnee['QUESTION_ID']=="198")&&($donnee['OBJECTIF_QCM']=="NON")){
		$scoreC[$k]=0;$k++;
		$c3b="X";
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="199")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c4="X";$scoreC[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="199")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c4b="X";
		$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="200")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c5="X";$scoreC[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="200")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c5b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="201")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c6="X";$scoreC[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="201")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c6b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="202")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c7="X";$scoreC[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="202")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c7b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="203")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c8="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="203")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c8b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="204")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c9="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="204")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c9b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="205")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c10="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="205")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c10b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="206")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c11="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="206")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c11b="X";$scoreC[$k]=0;$k++;
	}
		//==========================================================================================================

	if(($donnee['QUESTION_ID']=="207")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c12="X";$scoreC[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="207")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c12b="X";
		$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="208")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c13="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="208")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c13b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="209")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c14="X";$scoreC[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="209")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c14b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="210")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c15="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="210")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c15b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="211")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c16="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="211")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c16b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="212")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c17="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="212")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c17b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="213")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c18="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="213")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c18b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="214")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c19="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="214")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c19b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================
		//==========================================================================================================

	if(($donnee['QUESTION_ID']=="215")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c20="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="215")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c20b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="216")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c21="X";$scoreC[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="216")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c21b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="217")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c22="X";$scoreC[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="217")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c22b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="218")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c23="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="218")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c23b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="219")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c24="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="219")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c24b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="220")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c25="X";$scoreC[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="220")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c25b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="221")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c26="X";$scoreC[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="221")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c26b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================
	
}
$total_scoreC=0;
$max = sizeof($scoreC);
for($i=0;$i<$max;$i++){
	$total_scoreC=$total_scoreC + $scoreC[$i];
}

//========================================================================================================================

$req4='SELECT QUESTION_ID,OBJECTIF_QCM,OBJECTIF_COMMENTAIRE FROM tab_objectif WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=16';
$d1=$d1b=$d2b=$d3b=$d4b=$d5b="";
$d2="";
$d3=$d4=$d5="";
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
	if(($donnee['QUESTION_ID']=="222")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d1="X";$scoreD[$k]=2;$k++;
	}
	//question numero 1 - b)
	else if(($donnee['QUESTION_ID']=="222")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d1b="X";$scoreD[$k]=0;$k++;
	}
	//=========================================================================================================
	if(($donnee['QUESTION_ID']=="223")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d2="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="223")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d2b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="224")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d3="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="224")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d3b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="225")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d4="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="225")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d4b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="226")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d5="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="226")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d5b="X";$scoreD[$k]=0;$k++;
	}
	
	//==========================================================================================================

}
$total_scoreD=0;
$max = sizeof($scoreD);
for($i=0;$i<$max;$i++){
	$total_scoreD=$total_scoreD + $scoreD[$i];
}
//========================================================================================================================
$req5='SELECT QUESTION_ID,OBJECTIF_QCM,OBJECTIF_COMMENTAIRE FROM tab_objectif WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=17';
$e1=$e1b=$e2b=$e3b=$e4b=$e5b=$e6b=$e7b=$e8b="";
$e2="";
$e3=$e4=$e5=$e6=$e7=$e8="";
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
	if(($donnee['QUESTION_ID']=="227")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$e1="X";$scoreE[$k]=3;$k++;
	}
	//question numero 1 - b)
	else if(($donnee['QUESTION_ID']=="227")&&($donnee['OBJECTIF_QCM']=="NON")){
		$e1b="X";$scoreE[$k]=0;$k++;
	}
	//=========================================================================================================
	if(($donnee['QUESTION_ID']=="228")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$e2="X";$scoreE[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="228")&&($donnee['OBJECTIF_QCM']=="NON")){
		$e2b="X";$scoreE[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="229")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$e3="X";$scoreE[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="229")&&($donnee['OBJECTIF_QCM']=="NON")){
		$e3b="X";$scoreE[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="230")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$e4="X";$scoreE[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="230")&&($donnee['OBJECTIF_QCM']=="NON")){
		$e4b="X";$scoreE[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="231")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$e5="X";$scoreE[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="231")&&($donnee['OBJECTIF_QCM']=="NON")){
		$e5b="X";$scoreE[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="232")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$e6="X";$scoreE[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="232")&&($donnee['OBJECTIF_QCM']=="NON")){
		$e6b="X";$scoreE[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="233")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$e7="X";$scoreE[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="233")&&($donnee['OBJECTIF_QCM']=="NON")){
		$e7b="X";$scoreE[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="234")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$e8="X";$scoreE[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="234")&&($donnee['OBJECTIF_QCM']=="NON")){
		$e8b="X";$scoreE[$k]=0;$k++;
	}
	//==========================================================================================================

}
$total_scoreE=0;
$max = sizeof($scoreE);
for($i=0;$i<$max;$i++){
	$total_scoreE=$total_scoreE + $scoreE[$i];
}


$comm=$synth="";
$req2='SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE from tab_synthese WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=1';
$reponse1=$bdd->query($req2);
$donnee1=$reponse1->fetch();
$comm=$donnee1['SYNTHESE_COMMENTAIRE'];
$synth=$donnee1['SYNTHESE_RISQUE'];
//CONCLUSION ET RISQUE B
$comm1=$synth1="";
$req21='SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE from tab_synthese WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=14';
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
$req2111='SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE from tab_synthese WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=15';
$reponse1111=$bdd->query($req2111);
$donnee1111=$reponse1111->fetch();
$comm3=$donnee1111['SYNTHESE_COMMENTAIRE'];
$synth3=$donnee1111['SYNTHESE_RISQUE'];
//=======================================================================================================================
//CONCLUSION ET RISQUE E
$comm4=$synth4="";
$req21111='SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE from tab_synthese WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=16';
$reponse11111=$bdd->query($req21111);
$donnee11111=$reponse11111->fetch();
$comm4=$donnee11111['SYNTHESE_COMMENTAIRE'];
$synth4=$donnee11111['SYNTHESE_RISQUE'];
//=======================================================================================================================
//CONCLUSION ET RISQUE E
$comm5=$synth5="";
$req211111='SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE from tab_synthese WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=17';
$reponse111111=$bdd->query($req211111);
$donnee111111=$reponse111111->fetch();
$comm5=$donnee111111['SYNTHESE_COMMENTAIRE'];
$synth5=$donnee111111['SYNTHESE_RISQUE'];
//========================================================================================================================
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css_cycle_achat.css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
</head>
<body>
 <page_header><div style="padding-left:20px">
      <table width="706" height="115"  border="1" class="table">
        <tr>
          <td colspan="2"><b>Client</b><br><span style="color: CMYK(0, 0, 100%, 0)"><b><h4><?php echo $nomEntreprise; ?></h4></b></span></td>
          <td colspan="2" align="center"><strong>QUESTIONNAIRE CONTR&Ocirc;LE  INTERNE<br> PAIE PERSONNEL</strong></td>
          <td width="147"><b>CODE</b><br><br>
          <span style="color: CMYK(0, 0, 100%, 0)">FC 4 </span></td>
        </tr>
        <tr>
          <td width="143"><b>COLLABORATEUR</b></td>
          <td width="65">&nbsp;</td>
          <td width="133" rowspan="2" align="center"><strong>Cabinet CATEIN</strong></td>
          <td width="184" rowspan="2" align="center">&nbsp;</td>
          <td>FOLIO [[page_cu]]/[[page_nb]]</td>
        </tr>
        <tr>
          <td> <b> SUPERVISION</b></td>
          <td>&nbsp;</td>
          <td><b>DATE	 <span style="color: CMYK(0, 0, 100%, 0)"><?php echo 'DATE'; ?></span></b></td></tr>
      </table></div>
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

 <div id="conteneur"  style="left:20px; top: 200px;text-align: center; width:560px;  text-justify: newspaper; align:center">
	
<p>	<b>EVALUATION DU CONTROLE </b></p>
<p align="center"><strong>PAIE - PERSONNEL </strong></p>
</div>
<br><br><br><br><br><br>

	
	<div id="corp_objet">
	<b>OBJECTIF DE CONTR&ocirc;LE :</b>
	<br>
	 <ol style="list-style-type: upper-alpha; height:100px">
                <li style="padding:15px;">S&rsquo;assurer que les s&eacute;parations de fonctions sont suffisantes.</li>
                <li style="padding:15px;">S'assurer que toutes les charges et recettes  relatives au personnel sont enregistr&eacute;es (exhaustivit&eacute;).</li>
                <li style="padding:15px;">S'assurer que les charges et produits relatifs au  personnel sont r&eacute;els.</li>
				<li style="padding:15px;">S'assurer que les charges et produits relatifs au  personnel sont correctement &eacute;valu&eacute;s.</li>
       <li style="padding:15px;">S'assurer que les charges et produits relatifs au  personnel sont correctement imput&eacute;s, totalis&eacute;s et centralis&eacute;s.</li>
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
<!--	=====================================================================================================================
-->	
	<page pageset="old">
		<div id="corp_objet"  style="left:3px; top: 130px;text-align: left; width:732px;  text-justify: newspaper">
							<b> OBJECTIF DE CONTR&ocirc;LE :<br> A - S&rsquo;assurer que les s&eacute;parations de fonctions sont suffisantes
						 </b> </div>		<br>
						  
				<table width="736"  border="1" class="table_p1">
					
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
							<td>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Approbation des entr&eacute;es ou sorties de personnel</td>
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
									  <td>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D&eacute;termination des niveaux de r&eacute;mun&eacute;rations</td>
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
									  <td >3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Autorisation des primes</td>
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
									  <td>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mise &agrave; jour du fichier permanent</td>
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
									  <td>5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Approbation des heures travaill&eacute;es</td>
									  <td><?php echo $q5; ?></td>
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
									  <td>6&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pr&eacute;paration de la paie</td>
									  <td><?php echo $q6; ?></td>
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
									  <td>7&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;V&eacute;rification des calculs</td>
									  <td><?php echo $q7; ?></td>
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
									  <td>8&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Approbation finale de la paie apr&egrave;s sa pr&eacute;paration</td>
									  <td><?php echo $q8; ?></td>
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
									  <td>9&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pr&eacute;paration des enveloppes de paie</td>
									  <td><?php echo $q9; ?></td>
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
									  <td>10&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Distribution des enveloppess</td>
									  <td><?php echo $q10; ?></td>
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
									  <td>11&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Signature des ch&egrave;ques ou virements de salaires</td>
									  <td><?php echo $q11; ?></td>
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
	    <td>12&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rapprochement de banque du compte bancaire <br>r&eacute;serv&eacute;  aux salaires</td>
	    <td><?php echo $q12; ?></td>
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
	    <td>13&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Centralisation de la paie</td>
	    <td><?php echo $q13; ?></td>
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
	    <td>14&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; D&eacute;tention  des dossiers individuels du personnel</td>
	    <td><?php echo $q14; ?></td>
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
	    <td>15&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Comparaison  p&eacute;riodique du journal de paie <br>avec les dossiers individuels</td>
	    <td><?php echo $q15; ?></td>
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
	    <td>16&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Autorisation  d'acomptes ou avances</td>
	    <td><?php echo $q16; ?></td>
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
						<table width="741" border="1" class="table">
							<tr>
								<td width="481" style="width:485px"><b>CONCLUSIONS :</b><br>
								<br>
							  <br></td>
								<td width="254"  style="width:250px"><b>NIVEAU DE RISQUE</b><br>
								<br>
								<br><br>
						  	  </td>
							</tr>
</table>
    </page>
<!--	==============================================================================================================
-->
 <page pageset="old">
   
      <div class="niveau" style="padding-left:20px">
       <div id="corp_objet"  style="left:3px; top: 40px;text-align: left; width:720px;  text-justify: newspaper">
						 <b> OBJECTIF DE CONTR&ocirc;LE :<br><br> 
						 B -<strong>S'assurer que tous les mouvements de stocks sont saisis et enregistr&eacute;s  (exhaustivit&eacute;).</strong></b>		</div>
       <br><br><br>
       
      
      <table width:"720px"  border="1">
        <tr>
          <td  width="463"><strong>QUESTIONS</strong></td>
          <td width="28" ><strong>R&eacute;f <br>diag </strong></td>
          <td  width="24"><strong>Oui</strong></td>
          <td  width="28"><strong>Non</strong></td>
          <td  width="156"><strong>Commentaires</strong></td>
        </tr>
        <tr>
          <td>Les    salaires sont-ils r&eacute;gl&eacute;s sur un compte bancaire distinct ?</td>
          <td>&nbsp;</td>
          <td><?php echo $r1; ?>&nbsp;</td>
          <td><?php echo $r1b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[0])){}else{echo $commentaire[0];}?>&nbsp;</td>
        </tr>
        <tr>
          <td>Si oui,  l'apurement de ce compte est-il r&eacute;guli&egrave;rement v&eacute;rifi&eacute; <br>par une personne  ind&eacute;pendante de la paie ?</td>
          <td>&nbsp;</td>
           <td><?php echo $r2; ?>&nbsp;</td>
          <td><?php echo $r2b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[1])){}else{echo $commentaire[1];}?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="5">Existe-t-il  une liste :</td>
        </tr>
        <tr>
          <td>a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; des diff&eacute;rentes retenues &agrave;  effectuer sur les salaires (r&eacute;gimes sociaux) ?</td>
          <td>&nbsp;</td>
          <td><?php echo $r3; ?>&nbsp;</td>
          <td><?php echo $r3b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[2])){}else{echo $commentaire[2];}?>&nbsp;</td>
        </tr>
        <tr>
          <td>b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; des primes et avantages divers  accord&eacute;s au personnel ?</td>
          <td>&nbsp;</td>
          <td><?php echo $r4; ?>&nbsp;</td>
          <td><?php echo $r4b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[3])){}else{echo $commentaire[3];}?>&nbsp;</td>
        </tr>
        <tr>
          <td>Si oui,  ces listes pr&eacute;cisent-elles la p&eacute;riodicit&eacute; des r&egrave;glements ?</td>
          <td>&nbsp;</td>
           <td><?php echo $r5; ?>&nbsp;</td>
          <td><?php echo $r5b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[4])){}else{echo $commentaire[4];}?>&nbsp;</td>
        </tr>
        <tr>
          <td>Sont-elles  utilis&eacute;es pour provisionner les charges correspondantes ?</td>
          <td>&nbsp;</td>
           <td><?php echo $r6; ?>&nbsp;</td>
          <td><?php echo $r6b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[5])){}else{echo $commentaire[5];}?>&nbsp;</td>
        </tr>
        <tr>
          <td>Si ces  donn&eacute;es sont incluses dans le fichier permanent informatique, <br>le fichier est-il  r&eacute;guli&egrave;rement mis &agrave; jour ?</td>
          <td>&nbsp;</td>
           <td><?php echo $r7; ?>&nbsp;</td>
          <td><?php echo $r7b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[6])){}else{echo $commentaire[6];}?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">Les  diff&eacute;rentes charges sont-elles rapproch&eacute;es des bases r&eacute;guli&egrave;rement ?</td>
          <td>&nbsp;</td>
          <td><?php echo $r8; ?>&nbsp;</td>
          <td><?php echo $r8b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[7])){}else{echo $commentaire[7];}?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">Le total  du journal des salaires est-il rapproch&eacute; avec<br> celui du mois pr&eacute;c&eacute;dent et  l'&eacute;cart expliqu&eacute; ?</td>
          <td>&nbsp;</td>
           <td><?php echo $r9; ?>&nbsp;</td>
          <td><?php echo $r9b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[8])){}else{echo $commentaire[8];}?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">Lorsque  l'entreprise se substitue aux r&eacute;gimes sociaux pour <br>le paiement de prestations,  celles-ci sont-elles identifi&eacute;es afin de <br>permettre le suivi de leur  r&eacute;cup&eacute;ration ?</td>
          <td>&nbsp;</td>
           <td><?php echo $r10; ?>&nbsp;</td>
          <td><?php echo $r10b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[9])){}else{echo $commentaire[9];}?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">S'assure-t-on  que toutes les modifications aux donn&eacute;es <br> permanentes de la paie sont saisies ?</td>
          <td>&nbsp;</td>
           <td><?php echo $r11; ?>&nbsp;</td>
          <td><?php echo $r11b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[10])){}else{echo $commentaire[10];}?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="5">Les  informations n&eacute;cessaires pour le calcul des cong&eacute;s pay&eacute;s restant :</td>
        </tr>
        <tr>
          <td>a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; sur la p&eacute;riode ant&eacute;rieure</td>
          <td>&nbsp;</td>
           <td><?php echo $r12; ?>&nbsp;</td>
          <td><?php echo $r12b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[11])){}else{echo $commentaire[11];}?>&nbsp;</td>
        </tr>
        <tr>
          <td>b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; sur la p&eacute;riode en cours<br>sont-elles tenues par le service paie ?</td>
          <td>&nbsp;</td>
           <td><?php echo $r13; ?>&nbsp;</td>
          <td><?php echo $r13b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[12])){}else{echo $commentaire[12];}?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="5">Le service  paie a-t-il les moyens de v&eacute;rifier :</td>
        </tr>
        <tr>
          <td>a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; qu'il est inform&eacute; de toutes les  absences ?</td>
          <td>&nbsp;</td>
           <td><?php echo $r14; ?>&nbsp;</td>
          <td><?php echo $r14b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[13])){}else{echo $commentaire[13];}?>&nbsp;</td>
        </tr>
        <tr>
          <td>b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; qu'elles sont toutes r&eacute;percut&eacute;es sur  les <br>
salaires ?</td>
          <td>&nbsp;</td>
           <td><?php echo $r15; ?>&nbsp;</td>
          <td><?php echo $r15b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[14])){}else{echo $commentaire[14];}?>&nbsp;</td>
        </tr>
        </table>
      <br>
	   <table width="720" border="0">
          <tr>
            <td><b>Niveau de risque </b></td>
            <td><b>/ 18 </b></td>
            <td>&nbsp;</td>
        </tr>
          <tr>
            <td><strong>Conclusions : </strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </div>
     
</page>

<!--========================================================================================================================
-->
<page pageset="old">
   
      <div class="niveau" style="padding-left:20px">
       <div id="corp_objet"  style="left:3px; top: 40px;text-align: left; width:720px;  text-justify: newspaper">
						 <b> OBJECTIF DE CONTR&ocirc;LE :<br><br>
						 <strong>C - S'assurer que les charges et produits relatifs au personnel sont r&eacute;els.</strong></b>		</div>
       <br>
      
      <table height="731"  border="1">
        <tr>
          <td  width="463"><strong>QUESTIONS</strong></td>
          <td width="28" ><strong>R&eacute;f diag </strong></td>
          <td  width="24"><strong>Oui</strong></td>
          <td  width="29"><strong>Non</strong></td>
          <td  width="156"><strong>Commentaires</strong></td>
        </tr>
        <tr>
          <td height="23" colspan="5"><p>Existe-t-il un fichier du personnel contenant, pour  chaque employ&eacute; :</p></td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; photo  ?</td>
          <td>&nbsp;</td>
          <td><?php echo $c1; ?>&nbsp;</td>
          <td><?php echo $c1b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[0])){}else{echo $commentaireC[0];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; sp&eacute;cimen  de signature ?</td>
          <td>&nbsp;</td>
          <td><?php echo $c2; ?>&nbsp;</td>
          <td><?php echo $c2b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[1])){}else{echo $commentaireC[1];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; situation  de famille ?</td>
          <td>&nbsp;</td>
           <td><?php echo $c3; ?>&nbsp;</td>
          <td><?php echo $c3b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[2])){}else{echo $commentaireC[2];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">d)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; date  d'engagement ?</td>
          <td>&nbsp;</td>
          <td><?php echo $c4; ?>&nbsp;</td>
          <td><?php echo $c4b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[3])){}else{echo $commentaireC[3];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">e)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d&eacute;tail  des r&eacute;mun&eacute;rations et retenues &agrave; effectuer ?</td>
          <td>&nbsp;</td>
           <td><?php echo $c5; ?>&nbsp;</td>
          <td><?php echo $c5b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[4])){}else{echo $commentaireC[4];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">f)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; contrat  de travail ?</td>
          <td>&nbsp;</td>
          <td><?php echo $c6; ?>&nbsp;</td>
          <td><?php echo $c6b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[5])){}else{echo $commentaireC[5];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">g)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; pensions  et indemnit&eacute;s dues ?</td>
          <td>&nbsp;</td>
           <td><?php echo $c7; ?>&nbsp;</td>
          <td><?php echo $c7b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[6])){}else{echo $commentaireC[6];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23" colspan="5">Les op&eacute;rations suivantes sont-elles soumises &agrave;  l'autorisation d'un responsable :</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; embauche  ?</td>
          <td>&nbsp;</td>
          <td><?php echo $c8; ?>&nbsp;</td>
          <td><?php echo $c8b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[7])){}else{echo $commentaireC[7];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; renvoi  ?</td>
          <td>&nbsp;</td>
          <td><?php echo $c9; ?>&nbsp;</td>
          <td><?php echo $c9b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[8])){}else{echo $commentaireC[8];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; modification  de salaire ?</td>
          <td>&nbsp;</td>
          <td><?php echo $c10; ?>&nbsp;</td>
          <td><?php echo $c10b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[9])){}else{echo $commentaireC[9];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">d)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; octroi  de pr&ecirc;t ?</td>
          <td>&nbsp;</td>
          <td><?php echo $c11; ?>&nbsp;</td>
          <td><?php echo $c11b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[10])){}else{echo $commentaireC[10];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">Les donn&eacute;es permanentes du fichier informatique  paie sont-elles<br> r&eacute;guli&egrave;rement rapproch&eacute;es du fichier individuel ?</td>
          <td>&nbsp;</td>
          <td><?php echo $c12; ?>&nbsp;</td>
          <td><?php echo $c12b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[11])){}else{echo $commentaireC[11];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23" colspan="5">L'acc&egrave;s au fichier du personnel est-il prot&eacute;g&eacute; :</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; fichier  manuel ?</td>
          <td>&nbsp;</td>
           <td><?php echo $c13; ?>&nbsp;</td>
          <td><?php echo $c13b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[12])){}else{echo $commentaireC[12];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; rapproch&eacute;s  de la liste du personne ?</td>
          <td>&nbsp;</td>
           <td><?php echo $c14; ?>&nbsp;</td>
          <td><?php echo $c14b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[13])){}else{echo $commentaireC[13];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">Les modifications au fichier servant &agrave; la  pr&eacute;paration de la paie sont-elles :</td>
          
		  <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; identifi&eacute;es  ?</td>
          <td>&nbsp;</td>
           <td><?php echo $c15; ?>&nbsp;</td>
          <td><?php echo $c15b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[14])){}else{echo $commentaireC[14];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; approuv&eacute;es  par un responsable ?</td>
          <td>&nbsp;</td>
         <td><?php echo $c16; ?>&nbsp;</td>
          <td><?php echo $c16b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[15])){}else{echo $commentaireC[15];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23" colspan="5">Les donn&eacute;es variables, telles que les heures  suppl&eacute;mentaires, les commissions... sont-elles approuv&eacute;es par un responsable  avant :</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; saisie  ?</td>
          <td>&nbsp;</td>
          <td><?php echo $c17; ?>&nbsp;</td>
          <td><?php echo $c17b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[16])){}else{echo $commentaireC[16];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; paiement  ?</td>
          <td>&nbsp;</td>
          <td><?php echo $c18; ?>&nbsp;</td>
          <td><?php echo $c18b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[17])){}else{echo $commentaireC[17];} ?>&nbsp;</td>
        </tr>
        </table>
      <br>
      </div>
</page>
<!--===============================================================================================================================
-->  
<page pageset="old">
   
      <div class="niveau" style="padding-left:20px;padding-top:110px"><br>
      
      <table height="308"  border="1">
        <tr>
          <td  width="463" height="52"><strong>QUESTIONS</strong></td>
          <td width="28" ><strong>R&eacute;f diag </strong></td>
          <td  width="24"><strong>Oui</strong></td>
          <td  width="29"><strong>Non</strong></td>
          <td  width="156"><strong>Commentaires</strong></td>
        </tr>
        <tr>
          <td height="23">Le total des heures pay&eacute;es est-il rapproch&eacute; avec le  total des heures <br>travaill&eacute;es ?</td>
          <td>&nbsp;</td>
         <td><?php echo $c19; ?>&nbsp;</td>
          <td><?php echo $c19b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[18])){}else{echo $commentaireC[18];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23" colspan="5">Les comptes d'avances, pr&ecirc;ts... sont-ils  r&eacute;guli&egrave;rement :</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; confirm&eacute;s  avec les b&eacute;n&eacute;ficiaires ?</td>
          <td>&nbsp;</td>
          <td><?php echo $c20; ?>&nbsp;</td>
          <td><?php echo $c20b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[19])){}else{echo $commentaireC[19];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; rapproch&eacute;s  de la liste du personne ?</td>
          <td>&nbsp;</td>
          <td><?php echo $c21; ?>&nbsp;</td>
          <td><?php echo $c21b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[20])){}else{echo $commentaireC[20];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; particulier ? </td>
          <td height="23">&nbsp;</td>
          <td><?php echo $c22; ?>&nbsp;</td>
          <td><?php echo $c22b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[21])){}else{echo $commentaireC[21];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23" colspan="5">Lorsque des salaires sont pay&eacute;s en esp&egrave;ces :</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; v&eacute;rifie-t-on  l'identit&eacute; du b&eacute;n&eacute;ficiaire ?</td>
          <td>&nbsp;</td>
        	<td><?php echo $c23; ?>&nbsp;</td>
          <td><?php echo $c23b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[22])){}else{echo $commentaireC[22];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; les  salaires non r&eacute;clam&eacute;s font-ils l'objet d'un contr&ocirc;le ?</td>
          <td>&nbsp;</td>
          <td><?php echo $c24; ?>&nbsp;</td>
          <td><?php echo $c24b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[23])){}else{echo $commentaireC[23];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">Lorsque les salaires sont pay&eacute;s par virement, <br> exige-t-on un relev&eacute; d'identit&eacute; bancaire <br>pour toute modification des  coordonn&eacute;es bancaires&nbsp;?</td>
          <td>&nbsp;</td>
           <td><?php echo $c25; ?>&nbsp;</td>
          <td><?php echo $c25b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[24])){}else{echo $commentaireC[24];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">Si des salaires sont pay&eacute;s &agrave; des tiers autres que  l'employ&eacute;,<br> exige-t-on une procuration &eacute;crite ?</td>
          <td>&nbsp;</td>
          <td><?php echo $c26; ?>&nbsp;</td>
          <td><?php echo $c26b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[25])){}else{echo $commentaireC[25];} ?>&nbsp;</td>
        </tr>
        </table>
      <br>
	  <table width="720" border="0">
          <tr>
            <td><b>Niveau de risque </b></td>
            <td><b>/ 37 </b></td>
            <td>&nbsp;</td>
        </tr>
          <tr>
            <td><strong>Conclusions : </strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
  </div>
      
</page>
<!--===============================================================================================================================
-->
 <page pageset="old">
   
      <div class="niveau" style="padding-left:20pxw">
       <div id="corp_objet"  style="left:3px; top: 40px;text-align: left; width:720px;  text-justify: newspaper">
						 <b> OBJECTIF DE CONTR&ocirc;LE :<br><br>
						 <strong>D-- S'assurer que les charges et produits relatifs au personnel sont  correctement &eacute;valu&eacute;s.</strong></b>		</div>
       <br>
      
      <table height="198"  border="1">
        <tr>
          <td  width="463" height="48"><strong>QUESTIONS</strong></td>
          <td width="28" ><strong>R&eacute;f diag </strong></td>
          <td  width="24"><strong>Oui</strong></td>
          <td  width="29"><strong>Non</strong></td>
          <td  width="156"><strong>Commentaires</strong></td>
        </tr>
        <tr>
          <td height="42"><p>Les fiches de paie font-elles l'objet d'un contr&ocirc;le  ind&eacute;pendant, <br>au moins par sondage, permettant de v&eacute;rifier que les bases et taux  utilis&eacute;s <br>sont corrects de m&ecirc;me que les calculs&nbsp;?</p></td>
          <td>&nbsp;</td>
          <td><?php echo $d1; ?>&nbsp;</td>
          <td><?php echo $d1b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireD[0])){}else{echo $commentaireD[0];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">Les charges connexes aux salaires sont-elles  p&eacute;riodiquement<br> rapproch&eacute;es des bases ?</td>
          <td height="23">&nbsp;</td>
         <td><?php echo $d2; ?>&nbsp;</td>
          <td><?php echo $d2b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireD[1])){}else{echo $commentaireD[1];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">Le chiffre d'affaires servant de base aux  commissions est-il<br> rapproch&eacute; du chiffre d'affaires comptable ?</td>
          <td>&nbsp;</td>
          <td><?php echo $d3; ?>&nbsp;</td>
          <td><?php echo $d3b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireD[2])){}else{echo $commentaireD[2];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">Les provisions pour charges &agrave; payer sur salaires  sont-elles <br>rapproch&eacute;es des charges r&eacute;elles ?</td>
          <td>&nbsp;</td>
          <td><?php echo $d4; ?>&nbsp;</td>
          <td><?php echo $d4b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireD[3])){}else{echo $commentaireD[3];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">Si des comparaisons sont faites par ordinateur,<br> les  variations anormales d&eacute;tect&eacute;es font-elles l&rsquo;objet de <br>recherches et de  correction ?</td>
          <td>&nbsp;</td>
          <td><?php echo $d5; ?>&nbsp;</td>
          <td><?php echo $d5b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireD[4])){}else{echo $commentaireD[4];} ?>&nbsp;</td>
        </tr>
        </table>
      <br>
	  <table width="720" border="0">
          <tr>
            <td><b>Niveau de risque </b></td>
            <td><b>/ 14 </b></td>
            <td>&nbsp;</td>
        </tr>
          <tr>
            <td><strong>Conclusions : </strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </div>
      
</page>



<page pageset="old">
   
       
      <div class="niveau" style="padding-left:20pxw">
       <div id="corp_objet"  style="left:3px; top: 40px;text-align: left; width:720px;  text-justify: newspaper">
						 <b> OBJECTIF DE CONTR&ocirc;LE :<br><br>
						 <strong>E - S'assurer que les charges et produits relatifs au personnel sont  correctement imput&eacute;s, totalis&eacute;s et centralis&eacute;s.</strong></b>		</div>
       <br>
      
      <table height="323"  border="1">
        <tr>
          <td  width="463" height="48"><strong>QUESTIONS</strong></td>
          <td width="28" ><strong>R&eacute;f diag </strong></td>
          <td  width="24"><strong>Oui</strong></td>
          <td  width="29"><strong>Non</strong></td>
          <td  width="156"><strong>Commentaires</strong></td>
        </tr>
        <tr>
          <td height="42">L'imputation des &eacute;critures de charges et produits  relatifs &agrave; la paie <br>fait-elle l'objet d'un contr&ocirc;le ind&eacute;pendant ?</td>
          <td>&nbsp;</td>
          <td><?php echo $e1; ?>&nbsp;</td>
          <td><?php echo $e1b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireE[0])){}else{echo $commentaireE[0];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23" colspan="5">Ce contr&ocirc;le porte-t-il sur les imputations en :</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; comptabilit&eacute;  g&eacute;n&eacute;rale ?</td>
          <td>&nbsp;</td>
          <td><?php echo $e2; ?>&nbsp;</td>
          <td><?php echo $e2b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireE[1])){}else{echo $commentaireE[1];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; comptabilit&eacute;  analytique ?</td>
          <td>&nbsp;</td>
          <td><?php echo $e3; ?>&nbsp;</td>
          <td><?php echo $e3b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireE[2])){}else{echo $commentaireE[2];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">La totalisation du journal de paie est-elle  p&eacute;riodiquement<br> contr&ocirc;l&eacute;e ou le logiciel test&eacute;&nbsp;?</td>
          <td>&nbsp;</td>
          <td><?php echo $e4; ?>&nbsp;</td>
          <td><?php echo $e4b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireE[3])){}else{echo $commentaireE[3];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23" colspan="5">Les livres suivants sont-ils tenus &agrave; jour :</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; livre  de paie cot&eacute; et paraph&eacute; ?</td>
          <td>&nbsp;</td>
         <td><?php echo $e5; ?>&nbsp;</td>
          <td><?php echo $e5b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireE[4])){}else{echo $commentaireE[4];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; livre  d'entr&eacute;es et sorties de personnel ?</td>
          <td>&nbsp;</td>
         <td><?php echo $e6; ?>&nbsp;</td>
          <td><?php echo $e6b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireE[5])){}else{echo $commentaireE[5];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; livre  de main-d'&oelig;uvre &eacute;trang&egrave;re ?</td>
          <td>&nbsp;</td>
         <td><?php echo $e7; ?>&nbsp;</td>
          <td><?php echo $e7b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireE[6])){}else{echo $commentaireE[6];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">Si les contr&ocirc;les sont faits par informatique, les  rejets font-ils l&rsquo;objet <br>d&rsquo;un suivi pour v&eacute;rifier leur retraitement ?</td>
          <td>&nbsp;</td>
         <td><?php echo $e8; ?>&nbsp;</td>
          <td><?php echo $e8b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireE[7])){}else{echo $commentaireE[7];} ?>&nbsp;</td>
        </tr>
        </table>
      <br>
	  <table width="720" border="0">
          <tr>
            <td><b>Niveau de risque </b></td>
            <td><b>/ 10 </b></td>
            <td>&nbsp;</td>
        </tr>
          <tr>
            <td><strong>Conclusions : </strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </div>
      
</page>
<!--====================================================================================================================
-->
<page pageset="old">
   			<br><br><br><br><br><br><br>
      <div class="niveau" style="padding-left:20px" align="center">
        <table width="500" border="1">
          <tr>
            <td colspan="4" ><strong>RESUME DE LA REVUE DU SYSTEME DE CONTROLE INTERNE PERSONNEL  &ndash; FC4</strong></td>
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
		    <td colspan="4" height="50">&nbsp;</td>
          </tr>
        </table>
      </div>
</page>	

</body>
</html>
