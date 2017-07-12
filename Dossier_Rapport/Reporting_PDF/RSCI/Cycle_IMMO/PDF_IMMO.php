<?php 
	@session_start();
	include("../../../../connexion.php");
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
$q1="";
$q2="";
$q3=$q4=$q5=$q6=$q7=$q8=$q9=$q10=$q11="";
$req1='select FONCT_A_LIGNE,MISSION_ID,UTIL_ID from tab_fonct_a WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND FONCT_A_NOM="immo"';
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
		
}
//       OBJECTIF B
//============================================================================================================================
$req='SELECT QUESTION_ID,OBJECTIF_QCM,OBJECTIF_COMMENTAIRE FROM tab_objectif WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=7';
$r1=$r1b=$r2b=$r3b=$r4b=$r5b=$r6b=$r7b=$r8b=$r9b=$r10b=$r11b=$r12b=$r13b=$r14b=$r15b=$r16b=$r17b=$r18b=$r19b=$r20b=$r21b=$r22b=$r23b="";
$r2="";
$r3=$r4=$r5=$r6=$r7=$r8=$r9=$r10=$r11=$r12=$r13=$r14=$r15=$r16=$r17=$r18=$r19=$r20=$r21=$r22=$r23="";
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
	if(($donnee['QUESTION_ID']=="70")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r1="X";$scoreB[$k]=3;$k++;
	}
	//question numero 1 - b)
	else if(($donnee['QUESTION_ID']=="70")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r1b="X";$scoreB[$k]=0;$k++;
	}
	//=========================================================================================================
	if(($donnee['QUESTION_ID']=="71")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r2="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="71")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r2b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="72")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r3="X";$scoreB[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="72")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r3b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="73")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r4="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="73")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r4b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="74")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r5="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="74")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r5b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="75")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r6="X";$scoreB[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="75")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r6b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="76")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r7="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="76")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r7b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="77")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r8="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="77")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r8b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="78")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r9="X";$scoreB[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="78")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r9b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="79")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r10="X";$scoreB[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="79")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r10b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="80")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r11="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="80")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r11b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="81")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r12="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="81")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r12b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="82")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r13="X";$scoreB[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="82")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r13b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="83")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r14="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="83")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r14b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="84")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r15="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="84")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r15b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="85")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r16="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="85")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r16b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="86")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r17="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="86")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r17b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="87")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r18="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="87")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r18b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="88")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r19="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="88")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r19b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="89")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r20="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="89")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r20b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="90")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r21="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="90")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r21b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="91")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r22="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="91")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r22b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================
	
	if(($donnee['QUESTION_ID']=="92")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r23="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="92")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r23b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

}
$total_scoreB=0;
$max = sizeof($scoreB);
for($i=0;$i<$max;$i++){
	$total_scoreB=$total_scoreB + $scoreB[$i];
}
//====================================================================================================================================
//     OBJECTIF C
$req3='SELECT QUESTION_ID,OBJECTIF_QCM,OBJECTIF_COMMENTAIRE FROM tab_objectif WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=8';
$c1=$c1b=$c2b=$c3b=$c4b=$c5b=$c6b=$c7b=$c8b=$c9b=$c10b=$c11b=$c12b=$c13b="";
$c2="";
$c3=$c4=$c5=$c6=$c7=$c8=$c9=$c10=$c11=$c12=$c13="";
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
	if(($donnee['QUESTION_ID']=="93")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$scoreC[$k]=1;$k++;
		$c1="X";
	}
	//question numero 1 - b)
	else if(($donnee['QUESTION_ID']=="93")&&($donnee['OBJECTIF_QCM']=="NON")){
		$scoreC[$k]=0;$k++;
		$c1b="X";
	}
	//=========================================================================================================
	if(($donnee['QUESTION_ID']=="94")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$scoreC[$k]=2;$k++;
		$c2="X";
	}
	else if(($donnee['QUESTION_ID']=="94")&&($donnee['OBJECTIF_QCM']=="NON")){
		$scoreC[$k]=0;$k++;
		$c2b="X";
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="95")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$scoreC[$k]=2;$k++;
		$c3="X";
	}
	else if(($donnee['QUESTION_ID']=="95")&&($donnee['OBJECTIF_QCM']=="NON")){
		$scoreC[$k]=0;$k++;
		$c3b="X";
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="96")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c4="X";$scoreC[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="96")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c4b="X";
		$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="97")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c5="X";$scoreC[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="97")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c5b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="98")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c6="X";$scoreC[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="98")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c6b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="99")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c7="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="99")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c7b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="100")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c8="X";$scoreC[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="100")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c8b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="101")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c9="X";$scoreC[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="101")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c9b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="102")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c10="X";$scoreC[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="102")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c10b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="103")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c11="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="103")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c11b="X";$scoreC[$k]=0;$k++;
	}
	
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="104")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c12="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="104")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c12b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="105")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c13="X";$scoreC[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="105")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c13b="X";$scoreC[$k]=0;$k++;
	}
	
	//==========================================================================================================
}
$total_scoreC=0;
$max = sizeof($scoreC);
for($i=0;$i<$max;$i++){
	$total_scoreC=$total_scoreC + $scoreC[$i];
}
//========================================================================================================================
$req4='SELECT QUESTION_ID,OBJECTIF_QCM,OBJECTIF_COMMENTAIRE FROM tab_objectif WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=9';
$d1=$d1b=$d2b=$d3b=$d4b=$d5b=$d6b=$d7b=$d8b=$d9b=$d10b=$d11b="";
$d2="";
$d3=$d4=$d5=$d6=$d7=$d8=$d9=$d10=$d11="";
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
	if(($donnee['QUESTION_ID']=="106")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d1="X";$scoreD[$k]=2;$k++;
	}
	//question numero 1 - b)
	else if(($donnee['QUESTION_ID']=="106")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d1b="X";$scoreD[$k]=0;$k++;
	}
	//=========================================================================================================
	if(($donnee['QUESTION_ID']=="107")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d2="X";$scoreD[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="107")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d2b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="108")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d3="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="108")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d3b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="109")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d4="X";$scoreD[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="109")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d4b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="110")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d5="X";$scoreD[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="110")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d5b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="111")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d6="X";$scoreD[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="111")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d6b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="112")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d7="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="112")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d7b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="113")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d8="X";$scoreD[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="113")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d8b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="114")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d9="X";$scoreD[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="114")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d9b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="115")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d10="X";$scoreD[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="115")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d10b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="116")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d11="X";$scoreD[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="116")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d11b="X";$scoreD[$k]=0;$k++;
	}
	
	//==========================================================================================================
	
	
	//==========================================================================================================

}
$total_scoreD=0;
$max = sizeof($scoreD);
for($i=0;$i<$max;$i++){
	$total_scoreD=$total_scoreD + $scoreD[$i];
}
//-===================================================================================================================================
$comm=$synth="";
$req2='SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE from tab_synthese WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=7';
$reponse1=$bdd->query($req2);
$donnee1=$reponse1->fetch();
$comm=$donnee1['SYNTHESE_COMMENTAIRE'];
$synth=$donnee1['SYNTHESE_RISQUE'];
//=======================================================================================================================
//CONCLUSION ET RISQUE B
$comm1=$synth1="";
$req21='SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE from tab_synthese WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=7';
$reponse11=$bdd->query($req21);
$donnee11=$reponse11->fetch();
$comm1=$donnee11['SYNTHESE_COMMENTAIRE'];
$synth1=$donnee11['SYNTHESE_RISQUE'];

//CONCLUSION ET RISQUE C
$comm2=$synth2="";
$req211='SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE from tab_synthese WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=8';
$reponse111=$bdd->query($req211);
$donnee111=$reponse111->fetch();
$comm2=$donnee111['SYNTHESE_COMMENTAIRE'];
$synth2=$donnee111['SYNTHESE_RISQUE'];

//CONCLUSION ET RISQUE D
$comm3=$synth3="";
$req2111='SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE from tab_synthese WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=9';
$reponse1111=$bdd->query($req2111);
$donnee1111=$reponse1111->fetch();
$comm3=$donnee1111['SYNTHESE_COMMENTAIRE'];
$synth3=$donnee1111['SYNTHESE_RISQUE'];
//=======================================================================================================================
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
 <page_header><div align="center" style="padding-left:20px">
      <table width="706" height="115"  border="1" class="table">
        <tr>
          <td colspan="2" ><b>Client</b><br><span style="color: CMYK(0, 0, 100%, 0)"><b><h4><?php echo $nomEntreprise; ?></h4></b></span></td>
          <td colspan="2" align="center"><strong>QUESTIONNAIRE CONTR&Ocirc;LE  <br>INTERNE IMMOBILISATIONS </strong></td>
          <td width="147"><b>CODE</b><br><br>
          <span style="color: CMYK(0, 0, 100%, 0)">FC 2 </span></td>
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
	
<p>	<b>EVALUATION DU CONTROLE DES IMMOBILISATIONS </b></p>
</div>
<br><br><br><br><br><br>

	
	<div id="corp_objet">
	<b>OBJECTIF DE CONTR&ocirc;LE :</b>
	<br>
	 <ol style="list-style-type: upper-alpha; height:100px">
                <li style="padding:15px;"> S&rsquo;assurer que les s&eacute;parations de fonctions sont suffisantes.</li>
                <li style="padding:15px;">S'assurer  que toutes les immobilisations, ainsi que les charges et revenus connexes, sont  enregistr&eacute;s (exhaustivit&eacute;).</li>
                <li style="padding:15px;">S'assurer  que les immobilisations, ainsi que les charges et revenus correspondants, sont  r&eacute;els et appartiennent &agrave; l'entreprise</li>
                <li style="padding:15px;">S'assurer que les  immobilisations, ainsi que les charges et revenus correspondants sont correctement  &eacute;valu&eacute;s.</li>
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
							<td>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Approbation des budgets</td>
									  <td align="center"><?php echo $q1; ?>&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td  align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
							</tr>
							<tr>
									  <td>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &Eacute;tablissement  des commandes</td>
									  <td align="center"><?php echo $q2; ?></td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
							</tr>
							<tr>
									  <td >3&nbsp;&nbsp;&nbsp;&Eacute;mission de commandes d'achats</td>
									  <td align="center"><?php echo $q3; ?></td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
							</tr>
							<tr>
									  <td>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Approbation finale des factures</td>
									  <td align="center"><?php echo $q4; ?></td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
	  </tr><tr>
									  <td>5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tenue des fiches individuelles d'immobilisations</td>
									  <td align="center"><?php echo $q5; ?></td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
	  </tr><tr>
									  <td>6&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rapprochement des fiches avec la comptabilit&eacute;</td>
									  <td align="center"><?php echo $q6; ?></td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
	  </tr><tr>
									  <td>7&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Inventaire physique</td>
									  <td align="center"><?php echo $q7; ?></td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
	  </tr><tr>
									  <td>8&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Responsabilit&eacute; du mat&eacute;riel</td>
									  <td align="center"><?php echo $q8; ?></td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
	  </tr><tr>
									  <td>9&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rapprochement des fiches avec l'inventaire physique</td>
									  <td align="center"><?php echo $q9; ?></td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
	  </tr><tr>
									  <td>10&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Approbation des ajustements de comptes apr&egrave;s  inventaire</td>
									  <td align="center"><?php echo $q10; ?></td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
	  </tr><tr>
									  <td>11&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mise &agrave; jour du fichier informatique</td>
									  <td align="center"><?php echo $q11; ?></td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
									  <td align="center">&nbsp;</td>
	  </tr>
				</table>
	<br>
						<table class="table" border="1">
							<tr>
								<td style="width:485px"><b>CONCLUSIONS :</b><br>
								<br>
								<br></td>
								<td  style="width:250px"><b>NIVEAU DE RISQUE</b><br>
								<br>
								<br><br>
							  	</td>
							</tr>
</table>
    </page>
<!--	==============================================================================================================-->
 <page pageset="old">
   
      <div class="niveau" style="padding-left:20px">
       <div id="corp_objet"  style="left:3px; top: 40px;text-align: left; width:720px;  text-justify: newspaper">
						 <b> OBJECTIF DE CONTR&ocirc;LE :<br><br> 
						 B -<strong> S'assurer que toutes les immobilisations, ainsi que les charges et  revenus connexes, sont enregistr&eacute;s (exhaustivit&eacute;).</strong>						 </b>		</div><br><br><br>
       
      
      <table width:"720px"  border="1">
        <tr>
          <td  width="463"><strong>QUESTIONS</strong></td>
          <td width="28" ><strong>R&eacute;f <br>diag </strong></td>
          <td  width="24"><strong>Oui</strong></td>
          <td  width="28"><strong>Non</strong></td>
          <td  width="156"><strong>Commentaires</strong></td>
        </tr>
        <tr>
          <td>Existe-t-il des r&egrave;gles pr&eacute;cises :</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>      
		</tr>
        <tr>
          <td>a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d'imputation  des d&eacute;penses en charges ou en immobilisations ?</td>
           <td>&nbsp;</td>
          <td align="center"><?php echo $r1; ?>&nbsp;</td>
          <td align="center"><?php echo $r1b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[0])){}else{echo $commentaire[0];}?>&nbsp;</td>
        </tr>
        <tr>
          <td>b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d'identification  des productions d'immobilisations r&eacute;alis&eacute;es <br>par l'entreprise pour elle-m&ecirc;me ?</td>
          <td>&nbsp;</td>
          <td align="center"><?php echo $r2; ?>&nbsp;</td>
          <td align="center"><?php echo $r2b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[1])){}else{echo $commentaire[1];}?>&nbsp;</td>
        </tr>

        <tr>
          <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td height="53">Le compte de charges &quot;entretien&quot; fait-il l'objet  d'une revue ind&eacute;pendante<br> p&eacute;riodique pour v&eacute;rifier que les r&egrave;gles pr&eacute;c&eacute;dentes  ont &eacute;t&eacute; respect&eacute;es ?</td>
          <td>&nbsp;</td>
          <td align="center"><?php echo $r3; ?>&nbsp;</td>
          <td align="center"><?php echo $r3b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[2])){}else{echo $commentaire[2];}?>&nbsp;</td>
        </tr>

        <tr>
          <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td>Les cessions et destructions :</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; font-elles  l'objet d'autorisation ?</td>
          <td>&nbsp;</td>
                   <td><?php echo $r4; ?>&nbsp;</td>
          <td align="center"><?php echo $r4b; ?>&nbsp;</td>
          <td align="center"><?php  if(empty($commentaire[3])){}else{echo $commentaire[3];}?>&nbsp;</td>
        </tr>

        <tr>
          <td>b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; sont-elles  communiqu&eacute;es sans d&eacute;lai &agrave; la comptabilit&eacute; ?</td>
          <td>&nbsp;</td>
                    <td><?php echo $r5; ?>&nbsp;</td>
          <td align="center"><?php echo $r5b; ?>&nbsp;</td>
          <td align="center"><?php  if(empty($commentaire[4])){}else{echo $commentaire[4];}?>&nbsp;</td>
        </tr>

        <tr>
          <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td>L'information de la comptabilit&eacute; est-elle faite sur <br> des documents pr&eacute;num&eacute;rot&eacute;s ?</td>
          <td>&nbsp;</td>
                    <td><?php echo $r6; ?>&nbsp;</td>
          <td align="center"><?php echo $r6b; ?>&nbsp;</td>
          <td align="center"><?php  if(empty($commentaire[5])){}else{echo $commentaire[5];}?>&nbsp;</td>
        </tr>

        <tr>
          <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td>La comptabilit&eacute; :</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>

        <tr>
          <td>a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; s'assure-t-elle  qu'elle les re&ccedil;oit tous ?</td>
           <td>&nbsp;</td>
          <td align="center"><?php echo $r7; ?>&nbsp;</td>
          <td align="center"><?php echo $r7b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[6])){}else{echo $commentaire[6];}?>&nbsp;</td>
        </tr>
        <tr>
          <td>b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; qu'ils  sont tous comptabilit&eacute;s ?</td>
          <td>&nbsp;</td>
          <td align="center"><?php echo $r8; ?>&nbsp;</td>
          <td align="center"><?php echo $r8b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[7])){}else{echo $commentaire[7];}?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td>Des documents pr&eacute;num&eacute;rot&eacute;s sont-ils utilis&eacute;s pour  informer la comptabilit&eacute; :</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; de  la r&eacute;ception des immobilisations ?</td>
          <td>&nbsp;</td>
         <td align="center"><?php echo $r9; ?>&nbsp;</td>
          <td align="center"><?php echo $r9b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[8])){}else{echo $commentaire[8];}?>&nbsp;</td>
        </tr>
        <tr>
          <td>b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; de  la mise en service ?</td>
          <td>&nbsp;</td>
          <td align="center"><?php echo $r10; ?>&nbsp;</td>
          <td align="center"><?php echo $r10b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[9])){}else{echo $commentaire[9];}?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td>La comptabilit&eacute; s'assure-t-elle :</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; qu'elle  re&ccedil;oit tous les documents ?</td>
          <td>&nbsp;</td>
         <td align="center"><?php echo $r11; ?>&nbsp;</td>
          <td align="center"><?php echo $r11b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[10])){}else{echo $commentaire[10];}?>&nbsp;</td>
        </tr>
        <tr>
          <td>b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; qu'elle  les comptabilise tous ?</td>
          <td>&nbsp;</td>
          <td align="center"><?php echo $r12; ?>&nbsp;</td>
          <td align="center"><?php echo $r12b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[11])){}else{echo $commentaire[11];}?>&nbsp;</td>
        </tr>
        <tr>
          <td>c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; compar&eacutee avec l&#39ann&eacutee pr&eacutec&eacutedente ?</td>
          <td>&nbsp;</td>
          <td align="center"><?php echo $r13; ?>&nbsp;</td>
          <td align="center"><?php echo $r13b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[12])){}else{echo $commentaire[12];}?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td>Le total du fichier des immobilisations est-il  r&eacute;guli&egrave;rement <br>rapproch&eacute; du Grand-Livre ?</td>
          <td>&nbsp;</td>
           <td align="center"><?php echo $r14; ?>&nbsp;</td>
          <td align="center"><?php echo $r14b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[13])){}else{echo $commentaire[13];}?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td>Les &eacute;carts &eacute;ventuels sont-ils :</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; analys&eacute;s  ?</td>
          <td>&nbsp;</td>
          <td align="center"><?php echo $r15; ?>&nbsp;</td>
          <td align="center"><?php echo $r15b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[14])){}else{echo $commentaire[14];}?>&nbsp;</td>
        </tr>
        <tr>
          <td>b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; corrig&eacute;s  ?</td>
          <td>&nbsp;</td>
          <td align="center"><?php echo $r16; ?>&nbsp;</td>
          <td align="center"><?php echo $r16b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[15])){}else{echo $commentaire[15];}?>&nbsp;</td>
        </tr>
        </table>
      <br>
      </div>
      <div class="niveau" style="padding-left:20px;padding-top:120px">
      
      
      <table width:"720px"   border="1">
        <tr>
          <td  width="463" height="43"><strong>QUESTIONS</strong></td>
          <td width="28" ><strong>R&eacute;f diag </strong></td>
          <td  width="24"><strong>Oui</strong></td>
          <td  width="28"><strong>Non</strong></td>
          <td  width="156"><strong>Commentaires</strong></td>
        </tr>
        <tr>
          <td height="23"><p>La dotation annuelle aux amortissements est-elle :</p></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; rapproch&eacute;e  du fichier ?</td>
          <td>&nbsp;</td>
           <td align="center"><?php echo $r17; ?>&nbsp;</td>
          <td align="center"><?php echo $r17b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[16])){}else{echo $commentaire[16];}?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; v&eacute;rifi&eacute;e  globalement ?</td>
          <td>&nbsp;</td>
           <td align="center"><?php echo $r18; ?>&nbsp;</td>
          <td align="center"><?php echo $r18b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[17])){}else{echo $commentaire[17];}?>&nbsp;</td>
        </tr>
        <tr>
          <td height="32"><p>c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; qu'il  ne s&rsquo;&eacute;coule pas de d&eacute;lais anormaux entre la<br> r&eacute;ception et la mise en service ?</p></td>
          <td>&nbsp;</td>
           <td align="center"><?php echo $r19; ?>&nbsp;</td>
          <td align="center"><?php echo $r19b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[18])){}else{echo $commentaire[18];}?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23" colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td height="42">Les immobilisations devant g&eacute;n&eacute;rer des revenus <br> 
          (location, redevances, dividendes,&nbsp;...) sont-elles clairement  identi-fi&eacute;es&nbsp;?</td>
          <td>&nbsp;</td>
           <td align="center"><?php echo $r20; ?>&nbsp;</td>
          <td align="center"><?php echo $r20b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[19])){}else{echo $commentaire[19];}?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23" colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td height="23">Les revenus correspondants font-ils l'objet d'un  suivi individualis&eacute; ?</td>
          <td>&nbsp;</td>
           <td align="center"><?php echo $r21; ?>&nbsp;</td>
          <td align="center"><?php echo $r21b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[20])){}else{echo $commentaire[20];}?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23" colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td height="28">Les charges connexes aux immobilisations sont-elles  <br>clairement identifi&eacute;es ?</td>
          <td>&nbsp;</td>
           <td align="center"><?php echo $r22; ?>&nbsp;</td>
          <td align="center"><?php echo $r22b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[21])){}else{echo $commentaire[21];}?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23" colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td height="24">La comptabilit&eacute; s&rsquo;assure-t-elle qu&rsquo;elles sont  toutes enregistr&eacute;es ?</td>
          <td>&nbsp;</td>
           <td align="center"><?php echo $r23; ?>&nbsp;</td>
          <td align="center"><?php echo $r23b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[22])){}else{echo $commentaire[22];}?>&nbsp;</td>
        </tr>
        </table>
      <br>
     <!-- <table width="720" border="0">
          <tr>
            <td><b>Niveau de risque </b></td>
            <td><b>/ 45</b></td>
            <td>&nbsp;</td>
        </tr>
          <tr>
            <td><strong>Conclusions : </strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>-->
		<table  border="1">
				   <tr>
					<td width="466" ><b>NIVEAU DE RISQUE</b><br>
					  <b><?php echo $synth1; ?></b><br>
				     <br></td>
					<td width="246" align="center" ><br>
					  <b><?php echo $total_scoreB; ?>/78</b><br>
					  <br><br>
					 </td>
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
						 <strong>C - S'assurer que les immobilisations, ainsi que les charges et revenus  correspondants, sont r&eacute;els et appartiennent &agrave; l'entreprise.</strong></b>		</div>
       <br>
      
      <table height="566"  border="1">
        <tr>
          <td  width="463"><strong>QUESTIONS</strong></td>
          <td width="28" ><strong>R&eacute;f diag </strong></td>
          <td  width="24"><strong>Oui</strong></td>
          <td  width="29"><strong>Non</strong></td>
          <td  width="156"><strong>Commentaires</strong></td>
        </tr>
        <tr>
          <td height="23"><p>Les r&eacute;ceptions d'immobilisations font-elles l'objet  de <br>proc&egrave;s-verbaux de r&eacute;ception ?</p></td>
          <td>&nbsp;</td>
          <td><?php echo $c1; ?>&nbsp;</td>
          <td><?php echo $c1b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[0])){}else{echo $commentaireC[0];} ?>&nbsp;</td>
        </tr>
        
        <tr>
          <td height="32">Les imputations en immobilisations sont-elles  <br>contr&ocirc;l&eacute;es par une personne ind&eacute;pendante ?</td>
          <td>&nbsp;</td>
          <td><?php echo $c2; ?>&nbsp;</td>
          <td><?php echo $c2b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[1])){}else{echo $commentaireC[1];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23" colspan="5">Ce contr&ocirc;le porte-il sur l'imputation :</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; en  comptabilit&eacute; g&eacute;n&eacute;rale ?</td>
          <td>&nbsp;</td>
           <td><?php echo $c3; ?>&nbsp;</td>
          <td><?php echo $c3b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[2])){}else{echo $commentaireC[2];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; en  comptabilit&eacute; analytique ?</td>
          <td>&nbsp;</td>
          <td><?php echo $c4; ?>&nbsp;</td>
          <td><?php echo $c4b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[3])){}else{echo $commentaireC[3];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; en  budget d'investissement ?</td>
          <td>&nbsp;</td>
         <td><?php echo $c5; ?>&nbsp;</td>
          <td><?php echo $c5b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[4])){}else{echo $commentaireC[4];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="35">Le fichier des immobilisations est-il r&eacute;guli&egrave;rement <br> rapproch&eacute; des existants physiques ?</td>
          <td>&nbsp;</td>
         <td><?php echo $c6; ?>&nbsp;</td>
          <td><?php echo $c6b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[5])){}else{echo $commentaireC[5];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="42">Les cessions et mises au rebut d'immobilisations  sont-elles<br> 
          accompagn&eacute;es de factures de vente ou d'avis de destruction ?</td>
          <td>&nbsp;</td>
         <td><?php echo $c7; ?>&nbsp;</td>
          <td><?php echo $c7b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[6])){}else{echo $commentaireC[6];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23" colspan="5">Les immobilisations d&eacute;tenues par des tiers  sont-elles :</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; r&eacute;guli&egrave;rement  contr&ocirc;l&eacute;es ?</td>
          <td>&nbsp;</td>
          <td><?php echo $c8; ?>&nbsp;</td>
          <td><?php echo $c8b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[7])){}else{echo $commentaireC[7];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; confirm&eacute;es  par les tiers qui les d&eacute;tiennent&nbsp;?</td>
          <td>&nbsp;</td>
          <td><?php echo $c9; ?>&nbsp;</td>
          <td><?php echo $c9b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[8])){}else{echo $commentaireC[8];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="29">L'acc&egrave;s aux actifs qui peuvent &ecirc;tre facilement  <br>d&eacute;plac&eacute;s est-il suffisamment contr&ocirc;l&eacute; ?</td>
          <td>&nbsp;</td>
         <td><?php echo $c10; ?>&nbsp;</td>
          <td><?php echo $c10b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[9])){}else{echo $commentaireC[9];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">Les titres de propri&eacute;t&eacute; sont-ils :</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; tous  au nom de la soci&eacute;t&eacute; ?</td>
         <td>&nbsp;</td>
          <td><?php echo $c11; ?>&nbsp;</td>
          <td><?php echo $c11b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[10])){}else{echo $commentaireC[10];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; conserv&eacute;s  dans un coffre ?</td>
          <td>&nbsp;</td>
          <td><?php echo $c12; ?>&nbsp;</td>
          <td><?php echo $c12b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[11])){}else{echo $commentaireC[11];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="57">La proc&eacute;dure de cl&ocirc;ture des budgets  d&rsquo;investissement permet-elle<br> de s&rsquo;assurer qu&rsquo;ils ne sont pas utilis&eacute;s &agrave; <br> d&rsquo;autres fins que celles initialement pr&eacute;vues ?</td>
          <td>&nbsp;</td>
          <td><?php echo $c13; ?>&nbsp;</td>
          <td><?php echo $c13b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireC[12])){}else{echo $commentaireC[12];} ?>&nbsp;</td>
        </tr>
        </table>
      <br>
	  <!--<table width="720" border="0">
          <tr>
            <td><b>Niveau de risque </b></td>
            <td><b>/ 27 </b></td>
            <td>&nbsp;</td>
        </tr>
          <tr>
            <td><strong>Conclusions : </strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>-->
		<table  border="1">
				   <tr>
					<td width="466" ><b>NIVEAU DE RISQUE</b><br>
					  <b><?php echo $synth2; ?></b><br>
				     <br></td>
					<td width="246" align="center" ><br>
					  <b><?php echo $total_scoreC; ?>/78</b><br>
					  <br><br>
					 </td>
				   </tr>
		</table>
      </div>
      
</page>
<!--===============================================================================================================================
-->   <page pageset="old">
   
      <div class="niveau" style="padding-left:20pxw">
       <div id="corp_objet"  style="left:3px; top: 40px;text-align: left; width:720px;  text-justify: newspaper">
						 <b> OBJECTIF DE CONTR&ocirc;LE :<br><br>
						 <strong>D-- S'assurer que les immobilisations, ainsi que les charges et revenus  correspondants, sont correctement &eacute;valu&eacute;s.</strong></b>		</div>
       <br>
      
      <table height="626"  border="1">
        <tr>
          <td  width="463" height="48"><strong>QUESTIONS</strong></td>
          <td width="28" ><strong>R&eacute;f diag </strong></td>
          <td  width="24"><strong>Oui</strong></td>
          <td  width="29"><strong>Non</strong></td>
          <td  width="156"><strong>Commentaires</strong></td>
        </tr>
        <tr>
          <td height="42"><p>Les  &eacute;l&eacute;ments constitutifs du prix de revient <br>des immobilisations acquises &agrave;  l'ext&eacute;rieur sont-ils v&eacute;rifi&eacute;s <br>par une personne ind&eacute;pendante ?</p></td>
          <td>&nbsp;</td>
          <td><?php echo $d1; ?>&nbsp;</td>
          <td><?php echo $d1b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireD[0])){}else{echo $commentaireD[0];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="28" colspan="5">Les  r&egrave;gles d'&eacute;valuation des immobilisations<br> produites par l'entreprise sont-elles :</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; conformes au principes ?</td>
          <td>&nbsp;</td>
           <td><?php echo $d2; ?>&nbsp;</td>
          <td><?php echo $d2b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireD[1])){}else{echo $commentaireD[1];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; v&eacute;rifi&eacute;es par une personne  ind&eacute;pendante ?</td>
          <td>&nbsp;</td>
          <td><?php echo $d3; ?>&nbsp;</td>
          <td><?php echo $d3b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireD[2])){}else{echo $commentaireD[2];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="35">Les  immobilisations acquises en cr&eacute;dit-bail, <br>font-elles l'objet d'un suivi  suffisant <br>pour permettre l'&eacute;valuation des engagements hors bilan ?</td>
          <td>&nbsp;</td>
          <td><?php echo $d4; ?>&nbsp;</td>
          <td><?php echo $d4b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireD[3])){}else{echo $commentaireD[3];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23" colspan="5">Les  immobilisations compl&egrave;tement amorties sont-elles </td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; maintenues au bilan ?</td>
          <td>&nbsp;</td>
          <td><?php echo $d5; ?>&nbsp;</td>
          <td><?php echo $d5b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireD[4])){}else{echo $commentaireD[4];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="30">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; p&eacute;riodiquement analys&eacute;es pour  v&eacute;rifier<br> qu'elle sont encore utilis&eacute;es ?</td>
          <td>&nbsp;</td>
         <td><?php echo $d6; ?>&nbsp;</td>
          <td><?php echo $d6b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireD[5])){}else{echo $commentaireD[5];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="29">Existe-t-il  une proc&eacute;dure suffisante permettre le suivi des nantissements, <br>hypoth&egrave;que... et  autre engagements limitant la propri&eacute;t&eacute; des immobilisations ?</td>
          <td>&nbsp;</td>
          <td><?php echo $d7; ?>&nbsp;</td>
          <td><?php echo $d7b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireD[6])){}else{echo $commentaireD[6];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="31">La  politique d'amortissement est-elle fond&eacute;e<br> sur une estimation r&eacute;aliste de la  dur&eacute;e normale <br>d'utilisation des immobilisations ?</td>
          <td>&nbsp;</td>
         <td><?php echo $d8; ?>&nbsp;</td>
          <td><?php echo $d8b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireD[7])){}else{echo $commentaireD[7];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="30">Le  syst&egrave;me comptable utilis&eacute; permet-il<br> l'identification des amortissements  d&eacute;rogatoires ?</td>
          <td>&nbsp;</td>
          <td><?php echo $d9; ?>&nbsp;</td>
          <td><?php echo $d9b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireD[8])){}else{echo $commentaireD[8];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="31">V&eacute;rifie-t-on  que les dur&eacute;es et mode d&rsquo;amortissement<br> ne sont pas modifi&eacute;es sans autorisation  ? (fichier permanent)</td>
          <td>&nbsp;</td>
          <td><?php echo $d10; ?>&nbsp;</td>
          <td><?php echo $d10b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireD[9])){}else{echo $commentaireD[9];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="57">La valeur  nette des immobilisations fait-elle l'objet d'une revue r&eacute;guli&egrave;re, <br>afin de  v&eacute;rifier qu'aucune d&eacute;pr&eacute;ciation <br>(autre que l'amortissement) n'est n&eacute;cessaire ?</td>
          <td>&nbsp;</td>
          <td><?php echo $d11; ?>&nbsp;</td>
          <td><?php echo $d11b; ?>&nbsp;</td>
          <td><?php if(empty($commentaireD[10])){}else{echo $commentaireD[10];} ?>&nbsp;</td>
        </tr>
        </table>
      <br>
	  <table  border="1">
				   <tr>
					<td width="466" ><b>NIVEAU DE RISQUE</b><br>
					  <b><?php echo $synth3; ?></b><br>
				     <br></td>
					<td width="246" align="center" ><br>
					  <b><?php echo $total_scoreD; ?>/78</b><br>
					  <br><br>
					 </td>
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
            <td colspan="4" ><strong>RESUME DE LA REVUE DU SYSTEME DE CONTROLE INTERNE IMMOBILISATIONS &ndash; FC2</strong></td>
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
