<?php 
	@session_start();
	include("../../../../connexion.php");
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

	
	//=======================================================================================================================
	
	$q1="";
$q2="";
$q3=$q4=$q5=$q6=$q7=$q8=$q9=$q10=$q11=$q12=$q13="";
$req1='select FONCT_A_LIGNE,MISSION_ID,UTIL_ID from tab_fonct_a WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND FONCT_A_NOM="stocks"';
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
	
}
//============================================================================================================================
//============================================================================================================================

$req='SELECT QUESTION_ID,OBJECTIF_QCM,OBJECTIF_COMMENTAIRE FROM tab_objectif WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=11';
$r1=$r1b=$r2b=$r3b=$r4b=$r5b=$r6b=$r7b=$r8b=$r9b=$r10b=$r11b=$r12b=$r13b=$r14b=$r15b=$r16b=$r17b=$r18b="";
$r2="";
$r3=$r4=$r5=$r6=$r7=$r8=$r9=$r10=$r11=$r12=$r13=$r14=$r15=$r16=$r17=$r18="";
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
	if(($donnee['QUESTION_ID']=="117")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r1="X";$scoreB[$k]=2;$k++;
	}
	//question numero 1 - b)
	else if(($donnee['QUESTION_ID']=="117")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r1b="X";$scoreB[$k]=0;$k++;
	}
	//=========================================================================================================
	if(($donnee['QUESTION_ID']=="118")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r2="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="118")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r2b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="119")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r3="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="119")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r3b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="120")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r4="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="120")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r4b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="121")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r5="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="121")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r5b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="122")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r6="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="122")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r6b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="123")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r7="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="123")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r7b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="124")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r8="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="124")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r8b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="125")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r9="X";$scoreB[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="125")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r9b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="126")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r10="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="126")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r10b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="127")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r11="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="127")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r11b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="128")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r12="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="128")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r12b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="129")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r13="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="129")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r13b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="130")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r14="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="130")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r14b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="131")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r15="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="131")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r15b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="132")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r16="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="132")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r16b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="133")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r17="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="133")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r17b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="134")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$r18="X";$scoreB[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="134")&&($donnee['OBJECTIF_QCM']=="NON")){
		$r18b="X";$scoreB[$k]=0;$k++;
	}
	//==========================================================================================================

}
$total_scoreB=0;
$max = sizeof($scoreB);
for($i=0;$i<$max;$i++){
	$total_scoreB=$total_scoreB + $scoreB[$i];
}
	//==========================================================================================================
	//==========================================================================================================


$req3='SELECT QUESTION_ID,OBJECTIF_QCM,OBJECTIF_COMMENTAIRE FROM tab_objectif WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=12';
$c1=$c1b=$c2b=$c3b=$c4b=$c5b=$c6b=$c7b=$c8b=$c9b=$c10b=$c11b=$c12b=$c13b=$c14b=$c15b=$c16b=$c17b="";
$c2="";
$c3=$c4=$c5=$c6=$c7=$c8=$c9=$c10=$c11=$c12=$c13=$c14=$c15=$c16=$c17="";
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
	if(($donnee['QUESTION_ID']=="135")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$scoreC[$k]=3;$k++;
		$c1="X";
	}
	//question numero 1 - b)
	else if(($donnee['QUESTION_ID']=="135")&&($donnee['OBJECTIF_QCM']=="NON")){
		$scoreC[$k]=0;$k++;
		$c1b="X";
	}
	//=========================================================================================================
	if(($donnee['QUESTION_ID']=="136")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$scoreC[$k]=3;$k++;
		$c2="X";
	}
	else if(($donnee['QUESTION_ID']=="136")&&($donnee['OBJECTIF_QCM']=="NON")){
		$scoreC[$k]=0;$k++;
		$c2b="X";
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="137")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$scoreC[$k]=3;$k++;
		$c3="X";
	}
	else if(($donnee['QUESTION_ID']=="137")&&($donnee['OBJECTIF_QCM']=="NON")){
		$scoreC[$k]=0;$k++;
		$c3b="X";
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="138")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c4="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="138")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c4b="X";
		$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="139")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c5="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="139")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c5b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="140")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c6="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="140")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c6b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="141")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c7="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="141")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c7b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="142")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c8="X";$scoreC[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="142")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c8b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="143")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c9="X";$scoreC[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="143")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c9b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="144")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c10="X";$scoreC[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="144")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c10b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="145")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c11="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="145")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c11b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="146")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c12="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="146")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c12b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="147")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c13="X";$scoreC[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="147")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c13b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="148")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c14="X";$scoreC[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="148")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c14b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="149")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c15="X";$scoreC[$k]=1;$k++;
	}
	else if(($donnee['QUESTION_ID']=="149")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c15b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="150")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c16="X";$scoreC[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="150")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c16b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="151")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$c17="X";$scoreC[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="151")&&($donnee['OBJECTIF_QCM']=="NON")){
		$c17b="X";$scoreC[$k]=0;$k++;
	}
	//==========================================================================================================
	
}
$total_scoreC=0;
$max = sizeof($scoreC);
for($i=0;$i<$max;$i++){
	$total_scoreC=$total_scoreC + $scoreC[$i];
}
//========================================================================================================================
//========================================================================================================================
$req4='SELECT QUESTION_ID,OBJECTIF_QCM,OBJECTIF_COMMENTAIRE FROM tab_objectif WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=13';
$d1=$d1b=$d2b=$d3b=$d4b=$d5b=$d6b=$d7b=$d8b=$d9b=$d10b=$d11b=$d12b=$d13b=$d14b=$d15b=$d16b=$d17b=$d18b=$d19b=$d20b=$d21b=$d22b=$d23b=$d24b=$d25b=$d26b=$d27b=$d28b=$d29b="";
$d2="";
$d3=$d4=$d5=$d6=$d7=$d8=$d9=$d10=$d11=$d12=$d13=$d14=$d15=$d16=$d17=$d18=$d19=$d20=$d21=$d22=$d23=$d24=$d25=$d26=$d27=$d28=$d29="";
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
	if(($donnee['QUESTION_ID']=="152")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d1="X";$scoreD[$k]=2;$k++;
	}
	//question numero 1 - b)
	else if(($donnee['QUESTION_ID']=="152")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d1b="X";$scoreD[$k]=0;$k++;
	}
	//=========================================================================================================
	if(($donnee['QUESTION_ID']=="153")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d2="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="153")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d2b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="154")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d3="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="154")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d3b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="155")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d4="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="155")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d4b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="156")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d5="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="156")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d5b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="157")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d6="X";$scoreD[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="157")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d6b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="158")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d7="X";$scoreD[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="158")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d7b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="159")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d8="X";$scoreD[$k]=3;$k++;
	}
	else if(($donnee['QUESTION_ID']=="159")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d8b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="160")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d9="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="160")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d9b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="161")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d10="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="161")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d10b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

	if(($donnee['QUESTION_ID']=="162")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d11="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="162")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d11b="X";$scoreD[$k]=0;$k++;
	}
	
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="163")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d12="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="163")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d12b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="164")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d13="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="164")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d13b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="165")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d14="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="165")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d14b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="166")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d15="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="166")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d15b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="167")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d16="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="167")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d16b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="168")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d17="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="168")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d17b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="169")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d18="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="169")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d18b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="170")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d19="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="170")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d19b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="171")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d20="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="171")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d20b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="172")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d21="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="172")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d21b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="173")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d22="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="173")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d22b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="174")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d23="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="174")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d23b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="175")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d24="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="175")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d24b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="176")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d25="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="176")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d25b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="177")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d26="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="177")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d26b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="178")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d27="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="178")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d27b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="179")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d28="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="179")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d28b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================
	if(($donnee['QUESTION_ID']=="180")&&(($donnee['OBJECTIF_QCM']=="N/A")||($donnee['OBJECTIF_QCM']=="OUI"))){
		$d29="X";$scoreD[$k]=2;$k++;
	}
	else if(($donnee['QUESTION_ID']=="180")&&($donnee['OBJECTIF_QCM']=="NON")){
		$d29b="X";$scoreD[$k]=0;$k++;
	}
	//==========================================================================================================

}
$total_scoreD=0;
$max = sizeof($scoreD);
for($i=0;$i<$max;$i++){
	$total_scoreD=$total_scoreD + $scoreD[$i];
}

//========================================================================================================================

$comm=$synth="";
$req2='SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE from tab_synthese WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=1';
$reponse1=$bdd->query($req2);
$donnee1=$reponse1->fetch();
$comm=$donnee1['SYNTHESE_COMMENTAIRE'];
$synth=$donnee1['SYNTHESE_RISQUE'];
//=======================================================================================================================
//CONCLUSION ET RISQUE B
$comm1=$synth1="";
$req21='SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE from tab_synthese WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=11';
$reponse11=$bdd->query($req21);
$donnee11=$reponse11->fetch();
$comm1=$donnee11['SYNTHESE_COMMENTAIRE'];
$synth1=$donnee11['SYNTHESE_RISQUE'];
//=======================================================================================================================
//CONCLUSION ET RISQUE C
$comm2=$synth2="";
$req211='SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE from tab_synthese WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=12';
$reponse111=$bdd->query($req211);
$donnee111=$reponse111->fetch();
$comm2=$donnee111['SYNTHESE_COMMENTAIRE'];
$synth2=$donnee111['SYNTHESE_RISQUE'];
//=======================================================================================================================
//CONCLUSION ET RISQUE D
$comm3=$synth3="";
$req2111='SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE from tab_synthese WHERE UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE_ACHAT_ID=13';
$reponse1111=$bdd->query($req2111);
$donnee1111=$reponse1111->fetch();
$comm3=$donnee1111['SYNTHESE_COMMENTAIRE'];
$synth3=$donnee1111['SYNTHESE_RISQUE'];

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
          <td colspan="2" align="center"><strong>QUESTIONNAIRE CONTR&Ocirc;LE  INTERNE STOCKS </strong></td>
          <td width="147"><b>CODE</b><br><br>
          <span style="color: CMYK(0, 0, 100%, 0)">FC 3 </span></td>
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
          <td><b>DATE	 <span style="color: CMYK(0, 0, 100%, 0)"><?php echo $date_entete; ?></span></b></td></tr>
      </table></div>
</page_header>
 
    <page_footer>
        <table  border="0" >
		   <tr> <td colspan="3" >-------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
		   </tr>
		   <tr>
                <td width="398" style="width: 300px; text-align: right">
                  <img src="images/HEADER.png" width="100px" height="20px"  />                </td>
				<td width="504" style="width: 380px; text-align: center">
                  Evaluation des proc&eacute;dures                </td>
				<td width="75" style="width: 40px; text-align: right">
                    Page [[page_cu]]                </td>
          </tr>
        </table>
    </page_footer>
    
<!--================================================================================= -->

 <div id="conteneur"  style="left:20px; top: 200px;text-align: center; width:560px;  text-justify: newspaper; align:center">
	
<p>	<b>EVALUATION DU CONTROLE </b></p>
<p align="center"><strong>STOCKS</strong></p>
</div>
<br><br><br><br><br><br>

	
	<div id="corp_objet">
	<b>OBJECTIF DE CONTR&ocirc;LE :</b>
	<br>
	 <ol style="list-style-type: upper-alpha; height:100px">
                <li style="padding:15px;">S&rsquo;assurer que les s&eacute;parations de fonctions sont suffisantes.</li>
                <li style="padding:15px;">S'assurer que tous les mouvements de stocks sont  saisis et enregistr&eacute;s (exhaustivit&eacute;)..</li>
                <li style="padding:15px;">S'assurer que les stocks  enregistr&eacute;s existent et appartiennent &agrave; l'entreprise (r&eacute;alit&eacute;).</li>
       <li style="padding:15px;">S'assurer que les stocks  enregistr&eacute;s sont correctement &eacute;valu&eacute;s.</li>
      </ol>
	</div>
	<br><br>
	<div id="corp_objet2">
	<table class="table" align="center" >
	 <tr>
          <td ><b>Etablissement et mise &agrave; jour :</b></td>
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
							<td>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; Magasin</td>
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
									  <td>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; R&eacute;ception</td>
									  <td><?php echo $q2; ?></td>
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
									  <td >3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Exp&eacute;dition</td>
									  <td><?php echo $q3; ?></td>
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
									  <td>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tenue  de fiches de stocks en quantit&eacute;s</td>
									  <td><?php echo $q4; ?></td>
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
									  <td>5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tenue  de l'inventaire permanent</td>
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
									  <td>6&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Responsable  de l'inventaire physique</td>
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
									  <td>7&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rapprochement  inventaire physique - inventaire permanent</td>
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
									  <td>8&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Approbation  des ajustements apr&egrave;s inventaire</td>
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
									  <td>9&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rapport  sur les stocks obsol&egrave;tes, inutilisables, etc.</td>
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
									  <td>10&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Autorisation  de cession des stocks d&eacute;t&eacute;rior&eacute;s ou inutilis&eacute;s</td>
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
									  <td>11&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rapprochement  comptabilit&eacute; g&eacute;n&eacute;rale/ analytique</td>
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
	    <td>12&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; D&eacute;finition  des prix de revient</td>
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
	    <td>13&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Comparaison  prix de revient/prix de vente</td>
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
   
      <div class="niveau" style="padding-left:20px;width:694px">
       <div id="corp_objet"  style="left:3px; top: 40px;text-align: left;  text-justify: newspaper">
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
          <td colspan="5">Les  mouvements de stocks suivants sont-ils saisis sur des<BR> documents standards au  moment o&ugrave; ils ont lieu :</td>
        </tr>
        <tr>
          <td>a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; r&eacute;ception ?</td>
          <td>&nbsp;</td>
          <td><?php echo $r1; ?>&nbsp;</td>
          <td><?php echo $r1b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[0])){}else{echo $commentaire[0];}?>&nbsp;</td>
        </tr>
        <tr>
          <td>b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; transferts vers la production ?</td>
          <td>&nbsp;</td>
          <td><?php echo $r2; ?>&nbsp;</td>
          <td><?php echo $r2b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[1])){}else{echo $commentaire[1];}?>&nbsp;</td>
        </tr>
        <tr>
          <td>c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; transferts inter-ateliers ?</td>
          <td>&nbsp;</td>
           <td><?php echo $r3; ?>&nbsp;</td>
          <td><?php echo $r3b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[2])){}else{echo $commentaire[2];}?>&nbsp;</td>
        </tr>
        <tr>
          <td>d)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; transferts de la production vers les  magasins de produits finis ?</td>
          <td>&nbsp;</td>
          <td><?php echo $r4; ?>&nbsp;</td>
          <td><?php echo $r4b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[3])){}else{echo $commentaire[3];}?>&nbsp;</td>
        </tr>
        <tr>
          <td>e)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; exp&eacute;ditions ?</td>
          <td>&nbsp;</td>
           <td><?php echo $r5; ?>&nbsp;</td>
          <td><?php echo $r5b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[4])){}else{echo $commentaire[4];}?>&nbsp;</td>
        </tr>
        <tr>
          <td>f)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; autres mouvements (&agrave; pr&eacute;ciser) ?</td>
          <td>&nbsp;</td>
           <td><?php echo $r6; ?>&nbsp;</td>
          <td><?php echo $r6b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[5])){}else{echo $commentaire[5];}?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23" colspan="5">S'ils  existent :</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ces documents sont-ils pr&eacute;num&eacute;rot&eacute;s  ?</td>
          <td>&nbsp;</td>
            <td><?php echo $r7; ?>&nbsp;</td>
          <td><?php echo $r7b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[6])){}else{echo $commentaire[6];}?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; sont-ils utilis&eacute;s pour mettre &agrave; jour  les fiches de stocks ?</td>
          <td>&nbsp;</td>
           <td><?php echo $r8; ?>&nbsp;</td>
          <td><?php echo $r8b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[7])){}else{echo $commentaire[7];}?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; sont-ils utilis&eacute;s pour mouvementer  le stock th&eacute;orique ?</td>
          <td>&nbsp;</td>
          <td><?php echo $r9; ?>&nbsp;</td>
          <td><?php echo $r9b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[8])){}else{echo $commentaire[8];}?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="5">La  s&eacute;quence num&eacute;rique de ces documents est-elle utilis&eacute;e pour :</td>
        </tr>
        <tr>
          <td>a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; v&eacute;rifier s'ils sont tous transmis  aux personnes charg&eacute;es <br>d'enregistrer les mouvements ?</td>
          <td>&nbsp;</td>
           <td><?php echo $r10; ?>&nbsp;</td>
          <td><?php echo $r10b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[9])){}else{echo $commentaire[9];}?>&nbsp;</td>
        </tr>
        <tr>
          <td>b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; v&eacute;rifier que tous les mouvements  sont enregistr&eacute;s ?</td>
          <td>&nbsp;</td>
           <td><?php echo $r11; ?>&nbsp;</td>
          <td><?php echo $r11b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[10])){}else{echo $commentaire[10];}?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="5">Les quantit&eacute;s en stocks figurant : <br>
          La comptabilit&eacute; :</td>
        </tr>
        <tr>
          <td>a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; sur les fiches de stock ?</td>
          <td>&nbsp;</td>
         <td><?php echo $r12; ?>&nbsp;</td>
          <td><?php echo $r12b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[11])){}else{echo $commentaire[11];}?>&nbsp;</td>
        </tr>
        <tr>
          <td>b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; dans le stock th&eacute;orique sont-elles  r&eacute;guli&egrave;rement<br> rapproch&eacute;es des existants physiques ?</td>
          <td>&nbsp;</td>
           <td><?php echo $r13; ?>&nbsp;</td>
          <td><?php echo $r13b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[12])){}else{echo $commentaire[12];}?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="5">Les stocks suivants sont-ils identifi&eacute;s    r&eacute;guli&egrave;rement :</td>
        </tr>
        <tr>
          <td>a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; stocks d&eacute;t&eacute;rior&eacute;s ?</td>
          <td>&nbsp;</td>
           <td><?php echo $r14; ?>&nbsp;</td>
          <td><?php echo $r14b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[13])){}else{echo $commentaire[13];}?>&nbsp;</td>
        </tr>
        <tr>
          <td>b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; stocks p&eacute;rim&eacute;s ?</td>
          <td>&nbsp;</td>
           <td><?php echo $r15; ?>&nbsp;</td>
          <td><?php echo $r15b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[14])){}else{echo $commentaire[14];}?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="5">Si oui,  les informations correspondantes sont-elles saisies imm&eacute;diatement :</td>
        </tr>
        <tr>
          <td>a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; sur les fiches de stocks ?</td>
          <td>&nbsp;</td>
         <td><?php echo $r16; ?>&nbsp;</td>
          <td><?php echo $r16b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[15])){}else{echo $commentaire[15];}?>&nbsp;</td>
        </tr>
        <tr>
          <td>b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; dans le stock th&eacute;orique ?</td>
          <td>&nbsp;</td>
          <td><?php echo $r17; ?>&nbsp;</td>
          <td><?php echo $r17b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[16])){}else{echo $commentaire[16];}?>&nbsp;</td>
        </tr>
        <tr>
          <td>Si les  contr&ocirc;les ci-dessus sont faits par informatique,<br> les rapports d&rsquo;anomalies  font-ils l&rsquo;objet d&rsquo;un contr&ocirc;le <br>permettant de s&rsquo;assurer qu&rsquo;elles sont toutes  retrait&eacute;es ?</td>
          <td>&nbsp;</td>
          <td><?php echo $r18; ?>&nbsp;</td>
          <td><?php echo $r18b; ?>&nbsp;</td>
          <td><?php  if(empty($commentaire[17])){}else{echo $commentaire[17];}?>&nbsp;</td>
        </tr>
        </table>
      <br>
	   <table width="720" border="0">
          <tr>
            <td><b>Niveau de risque </b></td>
            <td><b><?php echo $total_scoreB; ?>/ 18 </b></td>
            <td>&nbsp;</td>
        </tr>
          <tr>
            <td><strong>Conclusions : <b><?php echo $synth1; ?></b></strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </div>
     
</page>

<!--========================================================================================================================
-->
<page pageset="old">
   
      <div class="niveau" style="padding-left:20px;width:694px">
       <div id="corp_objet"  style="left:3px; top: 40px;text-align: left;  text-justify: newspaper">
						 <b> OBJECTIF DE CONTR&ocirc;LE :<br><br>
						 <strong>C - S'assurer que les stocks enregistr&eacute;s existent et appartiennent &agrave;  l'entreprise (r&eacute;alit&eacute;).</strong></b>		</div>
       <br>
      
      <table height="743"  border="1">
        <tr>
          <td  width=""><strong>QUESTIONS</strong></td>
          <td width="28" ><strong>R&eacute;f diag </strong></td>
          <td  width="24"><strong>Oui</strong></td>
          <td  width="29"><strong>Non</strong></td>
          <td  width="156"><strong>Commentaires</strong></td>
        </tr>
        <tr>
          <td height="23" colspan="5"><p>Les conditions de stockage permettent-elles  d'&eacute;viter :</p></td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; les  d&eacute;t&eacute;riorations ?</td>
           <td width="34"></td>
									  <td width="55" style="bordure:none"><?php echo $c1; ?>&nbsp;</td>
									  <td width="43"><?php echo $c1b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireC[0])){}else{echo $commentaireC[0];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; l'acc&egrave;s  par des personnes non autoris&eacute;es ?</td>
           <td width="34"></td>
									  <td width="55"><?php echo $c2; ?>&nbsp;</td>
									  <td width="43"><?php echo $c2b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireC[1])){}else{echo $commentaireC[1];} ?>&nbsp;</td>
        </tr>
        
        <tr>
          <td height="23" colspan="5">Les stocks suivants sont-ils compt&eacute;s physiquement  au moins une fois par an ?</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mati&egrave;res  premi&egrave;res et fournitures ?</td>
         <td>&nbsp;</td>
						      <td><?php echo $c3; ?>&nbsp;</td>
						      <td><?php echo $c3b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireC[2])){}else{echo $commentaireC[2];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; travaux  en cours ?</td>
           <td width="34"></td>
									  <td width="55"><?php echo $c4; ?>&nbsp;</td>
									  <td width="43"><?php echo $c4b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireC[3])){}else{echo $commentaireC[3];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; produits  finis ?</td>
           <td width="34"></td>
									  <td width="55"><?php echo $c5; ?>&nbsp;</td>
									  <td width="43"><?php echo $c5b; ?>&nbsp;</td>
									  <td width="181"><?php if(empty($commentaireC[4])){}else{echo $commentaireC[4];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">d)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; autres  stocks (&agrave; pr&eacute;ciser ) ?</td>
          <td>&nbsp;</td>
						      <td><?php echo $c6; ?>&nbsp;</td>
						      <td><?php echo $c6b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireC[5])){}else{echo $commentaireC[5];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">Si l'inventaire est r&eacute;alis&eacute; en une seule fois, <br>les  proc&eacute;dures d'inventaire sont-elles fiables (voir questionnaire sp&eacute;cial) ?</td>
           <td>&nbsp;</td>
						      <td><?php echo $c7; ?>&nbsp;</td>
						      <td><?php echo $c7b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireC[6])){}else{echo $commentaireC[6];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23" colspan="5">Si des inventaires tournants sont effectu&eacute;s :</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; existe-t-il  un programme qui permet <br>de suivre l'avancement des comptages ?</td>
          <td>&nbsp;</td>
						      <td><?php echo $c8; ?>&nbsp;</td>
						      <td><?php echo $c8b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireC[7])){}else{echo $commentaireC[7];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; les  proc&eacute;dures utilis&eacute;es permettent-elles de s'assurer<br> que tous les stocks d'un  m&ecirc;me produit sont compt&eacute;s en une seule fois ?</td>
         <td>&nbsp;</td>
						      <td><?php echo $c9; ?>&nbsp;</td>
						      <td><?php echo $c9b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireC[8])){}else{echo $commentaireC[8];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="35">c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; les  mouvements physiques et comptables sont-ils <br>arr&ecirc;t&eacute;s simultan&eacute;ment pour chaque  produit compt&eacute; ?</td>
          <td>&nbsp;</td>
						      <td><?php echo $c10; ?>&nbsp;</td>
						      <td><?php echo $c10b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireC[9])){}else{echo $commentaireC[9];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">Les quantit&eacute;s compt&eacute;es sont-elle rapproch&eacute;es des  quantit&eacute;s th&eacute;oriques ?</td>
         <td>&nbsp;</td>
						      <td><?php echo $c11; ?>&nbsp;</td>
						      <td><?php echo $c11b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireC[10])){}else{echo $commentaireC[10];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23" colspan="5">Les &eacute;carts &eacute;ventuels sont-ils :</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; expliqu&eacute;s  ?</td>
          <td>&nbsp;</td>
						      <td><?php echo $c12; ?>&nbsp;</td>
						      <td><?php echo $c12b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireC[11])){}else{echo $commentaireC[11];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; enregistr&eacute;s  sur les fiches de stocks apr&egrave;s<br> autorisation par un responsable ?</td>
          <td>&nbsp;</td>
						      <td><?php echo $c13; ?>&nbsp;</td>
						      <td><?php echo $c13b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireC[12])){}else{echo $commentaireC[12];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23" colspan="5">Les stocks d&eacute;tenus par des tiers sont-ils :</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; suivis  sur des fiches de stocks distinctes&nbsp;?</td>
         <td>&nbsp;</td>
						      <td><?php echo $c14; ?>&nbsp;</td>
						      <td><?php echo $c14b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireC[13])){}else{echo $commentaireC[13];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; contr&ocirc;l&eacute;s  r&eacute;guli&egrave;rement ?</td>
         <td>&nbsp;</td>
						      <td><?php echo $c15; ?>&nbsp;</td>
						      <td><?php echo $c15b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireC[14])){}else{echo $commentaireC[14];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23" colspan="5">Les stocks d&eacute;tenus pour le compte de tiers sont-ils  :</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; isol&eacute;s  ?</td>
          <td>&nbsp;</td>
						      <td><?php echo $c16; ?>&nbsp;</td>
						      <td><?php echo $c16b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireC[15])){}else{echo $commentaireC[15];} ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; confirm&eacute;s  r&eacute;guli&egrave;rement avec les tiers ?</td>
          <td>&nbsp;</td>
						      <td><?php echo $c17; ?>&nbsp;</td>
						      <td><?php echo $c17b; ?>&nbsp;</td>
						      <td><?php if(empty($commentaireC[16])){}else{echo $commentaireC[16];} ?>&nbsp;</td>
        </tr>
        </table>
      <br>
	  <table width="720" border="0">
          <tr>
            <td><b>Niveau de risque </b></td>
            <td><b><?php echo $synth2; ?>/ 21 </b></td>
            <td>&nbsp;</td>
        </tr>
          <tr>
            <td><strong>Conclusions : <b><?php echo $comm2; ?></b></strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </div>
      
</page>
<!--===============================================================================================================================
-->   <page pageset="old">
   
      <div class="niveau" style="padding-left:20px;width:694px">
       <div id="corp_objet"  style="left:3px; top: 40px;text-align: left;  text-justify: newspaper">
						 <b> OBJECTIF DE CONTR&ocirc;LE :<br><br>
						 <strong>D-- S'assurer que les stocks enregistr&eacute;s sont correctement &eacute;valu&eacute;s.</strong></b>		</div>
       <br>
      
      <table height="620"  border="1">
        <tr>
          <td  width="" height="48"><strong>QUESTIONS</strong></td>
          <td width="28" ><strong>R&eacute;f diag </strong></td>
          <td  width="24"><strong>Oui</strong></td>
          <td  width="29"><strong>Non</strong></td>
          <td  width="156"><strong>Commentaires</strong></td>
        </tr>
        <tr>
          <td height="42"><p>Des fiches de production sont-elles utilis&eacute;es pour  suivre et<br> contr&ocirc;ler le stade d'avancement des travaux en cours ?</p></td>
         <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d1; ?></td>
						      <td width="43"><?php echo $d1b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[0])){}else{echo $commentaireD[0];} ?></td>
        </tr>
        <tr>
          <td height="23" colspan="5">Les co&ucirc;ts de production de stocks incorporent-ils :</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; les  charges directes ?</td>
          <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d2; ?></td>
						      <td width="43"><?php echo $d2b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[1])){}else{echo $commentaireD[1];} ?></td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; les  charges indirectes ?</td>
         <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d3; ?></td>
						      <td width="43"><?php echo $d3b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[2])){}else{echo $commentaireD[2];} ?></td>
        </tr>
        <tr>
          <td height="23" colspan="5">Si les charges indirectes sont imput&eacute;es :</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; sont-elles  justifi&eacute;es ?</td>
         <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d4; ?></td>
						      <td width="43"><?php echo $d4b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[3])){}else{echo $commentaireD[3];} ?></td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; les  clefs de r&eacute;partition utilis&eacute;es sont-elle r&eacute;alistes ?</td>
           <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d5; ?></td>
						      <td width="43"><?php echo $d5b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[4])){}else{echo $commentaireD[4];} ?></td>
        </tr>
        <tr>
          <td height="29">Les charges imput&eacute;es &agrave; la production sont-elles<br>  rapproch&eacute;es de la comptabilit&eacute; g&eacute;n&eacute;rale&nbsp;?</td>
           <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d6; ?></td>
						      <td width="43"><?php echo $d6b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[5])){}else{echo $commentaireD[5];} ?></td>
        </tr>
        <tr>
          <td height="31" colspan="5"><strong>Co&ucirc;ts standard</strong><br>Les coûts standard sont-ils :</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d&eacute;termin&eacute;s  sur la base des formules de fabrication ?</td>
          <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d7; ?></td>
						      <td width="43"><?php echo $d7b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[6])){}else{echo $commentaireD[6];} ?></td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &eacute;tablis  en tenant compte de conditions normales d'activit&eacute; ?</td>
           <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d8 ?></td>
						      <td width="43"><?php echo $d8b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[7])){}else{echo $commentaireD[7];} ?></td>
        </tr>
        <tr>
          <td height="23">c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; compar&eacute;s  avec les fiches de fabrication <br>(surtout pour les nouveaux produits) ?</td>
          <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d9; ?></td>
						      <td width="43"><?php echo $d9b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[8])){}else{echo $commentaireD[8];} ?></td>
        </tr>
        <tr>
          <td height="23">d)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mis  &agrave; jour annuellement ?</td>
           <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d10; ?></td>
						      <td width="43"><?php echo $d10b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[9])){}else{echo $commentaireD[9];} ?></td>
        </tr>
        <tr>
          <td height="23" colspan="5">Les &eacute;carts entre co&ucirc;ts standards et co&ucirc;ts r&eacute;els  sont-ils :</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; saisis  r&eacute;guli&egrave;rement ?</td>
         <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d11; ?></td>
						      <td width="43"><?php echo $d11b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[10])){}else{echo $commentaireD[10];} ?></td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; analys&eacute;s  ?</td>
         <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d12; ?></td>
						      <td width="43"><?php echo $d12b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[11])){}else{echo $commentaireD[11];} ?></td>
        </tr>
        <tr>
          <td height="23">c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; communiqu&eacute;s  &agrave; la direction ?</td>
          <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d13; ?></td>
						      <td width="43"><?php echo $d13b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[12])){}else{echo $commentaireD[12];} ?></td>
        </tr>
        <tr>
          <td height="23">d)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; r&eacute;int&eacute;gr&eacute;s,  si n&eacute;cessaire, &agrave; la valeur des stocks <br>pour obtenir le co&ucirc;t de production r&eacute;el ?</td>
          <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d14; ?></td>
						      <td width="43"><?php echo $d14b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[11])){}else{echo $commentaireD[11];} ?></td>
        </tr>
        <tr>
          <td height="31" colspan="5"><strong>Autres m&eacute;thodes</strong><br>Les coûts de production et d'acquisition utilisés sont-ils :</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d&eacute;termin&eacute;s  sur des documents v&eacute;rifiables&nbsp;?</td>
          <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d15; ?></td>
						      <td width="43"><?php echo $d15b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[14])){}else{echo $commentaireD[14];} ?></td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; v&eacute;rifi&eacute;s  r&eacute;guli&egrave;rement par une personne ind&eacute;pendante ?</td>
          <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d16; ?></td>
						      <td width="43"><?php echo $d16b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[15])){}else{echo $commentaireD[15];} ?></td>
        </tr>
        </table>
      <br>
	  
      </div>
      
</page>
<page pageset="old">
   
      <div class="niveau" style="padding-left:20px;padding-top:110px;width:694px" >
       
      
      <table height="556"  border="1">
        <tr>
          <td  width="" height="48"><strong>QUESTIONS</strong></td>
          <td width="28" ><strong>R&eacute;f diag </strong></td>
          <td  width="24"><strong>Oui</strong></td>
          <td  width="29"><strong>Non</strong></td>
          <td  width="156"><strong>Commentaires</strong></td>
        </tr>
        <tr>
          <td height="42" colspan="5"><strong>Toutes m&eacute;thodes</strong><br>Des contrôles de cohérence sont-ils régulièrement effectués sur les données suivantes :</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; marge  brute par produit ou famille de produits ?</td>
           <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d17; ?></td>
						      <td width="43"><?php echo $d17b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[16])){}else{echo $commentaireD[16];} ?></td>
        </tr>
        <tr>
          <td height="42">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; valeur  relative des diff&eacute;rentes composantes <br>du co&ucirc;t de production ou d'acquisition ?</td>
           <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d18; ?></td>
						      <td width="43"><?php echo $d18b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[17])){}else{echo $commentaireD[17];} ?></td>
        </tr>
        <tr>
          <td height="23" colspan="5">Les anomalies &eacute;ventuelles d&eacute;tect&eacute;es lors de ces  contr&ocirc;les de coh&eacute;rence, sont-elles :</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; analys&eacute;es  ?</td>
           <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d19; ?></td>
						      <td width="43"><?php echo $d19b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[18])){}else{echo $commentaireD[18];} ?></td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; corrig&eacute;es  apr&egrave;s accord d'un responsable ?</td>
          <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d20; ?></td>
						      <td width="43"><?php echo $d20b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[19])){}else{echo $commentaireD[19];} ?></td>
        </tr>
        <tr>
          <td height="23" colspan="5"><strong>D&eacute;pr&eacute;ciations</strong><br>La politique de dépréciation des stocks est-elle :</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; clairement  d&eacute;finie ?</td>
           <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d21; ?></td>
						      <td width="43"><?php echo $d21b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[20])){}else{echo $commentaireD[20];} ?></td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; r&eacute;aliste  compte tenu des conditions d'exploitation des stocks ?</td>
         <td width="34"></td>
						       <td width="55" style="bordure:none"><?php echo $d22; ?></td>
						      <td width="43"><?php echo $d22b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[21])){}else{echo $commentaireD[21];} ?></td>
        </tr>
        <tr>
          <td height="29" colspan="5">Cette politique couvre-t-elle :</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; les  stocks d&eacute;t&eacute;rior&eacute;s ?</td>
         <td width="34"></td>
						     <td width="55" style="bordure:none"><?php echo $d23; ?></td>
						      <td width="43"><?php echo $d23b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[22])){}else{echo $commentaireD[22];} ?></td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; les  stocks &agrave; rotation lente ?</td>
         <td width="34"></td>
						       <td width="55" style="bordure:none"><?php echo $d24; ?></td>
						      <td width="43"><?php echo $d24b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[23])){}else{echo $commentaireD[23];} ?></td>
        </tr>
        <tr>
          <td height="23">c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; les  stocks &agrave; marge insuffisante ?</td>
          <td width="34"></td>
						     <td width="55" style="bordure:none"><?php echo $d25; ?></td>
						      <td width="43"><?php echo $d25b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[24])){}else{echo $commentaireD[24];} ?></td>
        </tr>
        <tr>
          <td height="31" colspan="5">Le syst&egrave;me de suivi des stocks permet-il  d'identifier r&eacute;guli&egrave;rement :</td>
        </tr>
        <tr>
          <td height="23">a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; les  stocks d&eacute;t&eacute;rior&eacute;s ?</td>
          <td width="34"></td>
						       <td width="55" style="bordure:none"><?php echo $d26; ?></td>
						      <td width="43"><?php echo $d26b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[25])){}else{echo $commentaireD[25];} ?></td>
        </tr>
        <tr>
          <td height="23">b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; les  stocks &agrave; rotation lente ?</td>
          <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d27; ?></td>
						      <td width="43"><?php echo $d27b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[26])){}else{echo $commentaireD[26];} ?></td>
        </tr>
        <tr>
          <td height="23">c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; les  stocks &agrave; marge insuffisante ?</td>
         <td width="34"></td>
						     <td width="55" style="bordure:none"><?php echo $d28; ?></td>
						      <td width="43"><?php echo $d28b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[27])){}else{echo $commentaireD[27];} ?></td>
        </tr>
        <tr>
          <td height="23"><strong>Autres</strong><br>Le système de suivi des stocks permet-il d'identifier<br> les stocks en provenance d'autres sociétés du groupe ?</td>
          <td width="34"></td>
						      <td width="55" style="bordure:none"><?php echo $d29; ?></td>
						      <td width="43"><?php echo $d29b; ?></td>
						      <td width="181"><?php if(empty($commentaireD[28])){}else{echo $commentaireD[28];} ?></td>
        </tr>
        </table>
      <br>
	  <table width="720" border="0">
          <tr>
            <td><b>Niveau de risque </b></td>
            <td><b><?php echo $synth3; ?>/ 56 </b></td>
            <td>&nbsp;</td>
        </tr>
          <tr>
            <td><strong>Conclusions : <b><?php echo $comm3; ?></b></strong></td>
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
            <td colspan="4" ><strong>RESUME DE LA REVUE DU SYSTEME DE CONTROLE INTERNE STOCKS &ndash; FC3</strong></td>
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
		  	<?php 
				
				$requete='select SYNTHESE from tab_synthese_rsci where UTIL_ID="'.$_SESSION['id'].'" AND MISSION_ID="'.$_SESSION['idMission'].'" AND CYCLE="immo"';
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
