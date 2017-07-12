<?php
session_start();
$date_entete=date('d-m-Y');


include "../../../connex.php";  
//-==============================================================================
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
        set_time_limit(1200);				
		ini_set("memory_limit","-1");
        ini_alter("memory_limit","-1");
//=====================================================================		
//CONCLUSION ET RISQUE (TAB_CONCLUSION ET TAB_OBJECTIF)
$get_conclusion=db_connect("select DISTINCT(CONCLUSION_ID),CONCLUSION_COMMENTAIRE,CONCLUSION_RISQUE
 from tab_conclusion c,tab_objectif o
  where  o.MISSION_ID='".$_SESSION['idMission']."' 
        and c.MISSION_ID=o.MISSION_ID
        and o.UTIL_ID='".$_SESSION['id']."'
        and o.CYCLE_ACHAT_ID=c.CYCLE_ACHAT_ID");
		
		foreach ($get_conclusion as $val){
			$conclusion=$val['CONCLUSION_COMMENTAIRE'];
			$risque=$val['CONCLUSION_RISQUE'];
			}
		
		
		
		
$total="";	

$Q1_1=$Q1_2=$Q1_3="";
$Q2_1=$Q2_2=$Q2_3="";
$Q3_1=$Q3_2=$Q3_3="";
$Q4_1=$Q4_2=$Q4_3="";
$Q5_1=$Q5_2=$Q5_3="";
$Q6_1=$Q6_2=$Q6_3="";
$Q7_1=$Q7_2=$Q7_3=""; 

$Q8_1=$Q8_2=$Q8_3="";
$Q9_1=$Q9_2=$Q9_3="";
$Q10_1=$Q10_2=$Q10_3="";
$Q11_1=$Q11_2=$Q11_3="";
$Q12_1=$Q12_2=$Q12_3="";
$Q13_1=$Q13_2=$Q13_3="";
$Q14_1=$Q14_2=$Q14_3=""; 
$Q15_1=$Q15_2=$Q15_3="";
$Q16_1=$Q16_2=$Q16_3="";
$Q17_1=$Q17_2=$Q17_3="";
$Q18_1=$Q18_2=$Q18_3="";
$Q19_1=$Q19_2=$Q19_3="";
$Q20_1=$Q20_2=$Q20_3="";
$Q21_1=$Q21_2=$Q21_3=""; 
$Q22_1=$Q22_2=$Q22_3="";
$Q23_1=$Q23_2=$Q23_3=""; 

$Q24_1=$Q24_2=$Q24_3=""; 
$Q25_1=$Q25_2=$Q25_3="";
$Q26_1=$Q26_2=$Q26_3=""; 




		
$get_select=db_connect("SELECT DISTINCT(o.QUESTION_ID),o.QUESTION_ID,o.OBJECTIF_COMMENTAIRE,CASE
WHEN OBJECTIF_QCM='NON' THEN '0'
WHEN OBJECTIF_QCM='OUI' THEN QUESTION_COEF
ELSE 'PAS DE VALEUR'
END AS Coef
 FROM tab_objectif o,tab_question q
 WHERE MISSION_ID='".$_SESSION['idMission']."' AND UTIL_ID='".$_SESSION['id']."'  AND o.QUESTION_ID=q.QUESTION_ID AND CYCLE_ACHAT_ID=31");
	$rec=array();	
foreach ($get_select as $val){
	$Coef=$val['Coef']; 
	$OBJ_COMMENTAIRE =$val ['OBJECTIF_COMMENTAIRE'];
	$QUESTION_ID =$val ['QUESTION_ID'];
	
		if($QUESTION_ID==405){
			//QUESTION 1 - A Q 431
			$total+=$Coef;
		   if($Coef>0)  {$Q1_1='X';}else{}
		   if($Coef>0)  {}else{$Q1_2='X';}
		   if(!empty($OBJ_COMMENTAIRE)) {$Q1_3=$OBJ_COMMENTAIRE;}else{}
	 }
	 //===========================================
	 	if($QUESTION_ID==406){
			//QUESTION 1 - A Q 431
			$total+=$Coef;
		   if($Coef>0)  {$Q2_1='X';}else{}
		   if($Coef>0)  {}else{$Q2_2='X';}
		   if(!empty($OBJ_COMMENTAIRE)) {$Q2_3=$OBJ_COMMENTAIRE;}else{}
	 }
	  //===========================================
	 	if($QUESTION_ID==407){
			//QUESTION 1 - A Q 431
			$total+=$Coef;
		   if($Coef>0)  {$Q3_1='X';}else{}
		   if($Coef>0)  {}else{$Q3_2='X';}
		   if(!empty($OBJ_COMMENTAIRE)) {$Q3_3=$OBJ_COMMENTAIRE;}else{}
	 }
	 	  //===========================================
	 	if($QUESTION_ID==408){
			//QUESTION 1 - A Q 431
			$total+=$Coef;
		   if($Coef>0)  {$Q4_1='X';}else{}
		   if($Coef>0)  {}else{$Q4_2='X';}
		   if(!empty($OBJ_COMMENTAIRE)) {$Q4_3=$OBJ_COMMENTAIRE;}else{}
	 }
	  	  //===========================================
	 	if($QUESTION_ID==409){
			//QUESTION 1 - A Q 431
			$total+=$Coef;
		   if($Coef>0)  {$Q5_1='X';}else{}
		   if($Coef>0)  {}else{$Q5_2='X';}
		   if(!empty($OBJ_COMMENTAIRE)) {$Q5_3=$OBJ_COMMENTAIRE;}else{}
	 }
	 	  	  //===========================================
	 	if($QUESTION_ID==410){
			//QUESTION 1 - A Q 431
			$total+=$Coef;
		   if($Coef>0)  {$Q6_1='X';}else{}
		   if($Coef>0)  {}else{$Q6_2='X';}
		   if(!empty($OBJ_COMMENTAIRE)) {$Q6_3=$OBJ_COMMENTAIRE;}else{}
	 }
		 	  	  //===========================================
	 	if($QUESTION_ID==411){
			//QUESTION 1 - A Q 431
			$total+=$Coef;
		   if($Coef>0)  {$Q7_1='X';}else{}
		   if($Coef>0)  {}else{$Q7_2='X';}
		   if(!empty($OBJ_COMMENTAIRE)) {$Q7_3=$OBJ_COMMENTAIRE;}else{}
	 }
	 	 	  	  //===========================================
	 	if($QUESTION_ID==412){
			//QUESTION 1 - A Q 431
			$total+=$Coef;
		   if($Coef>0)  {$Q8_1='X';}else{}
		   if($Coef>0)  {}else{$Q8_2='X';}
		   if(!empty($OBJ_COMMENTAIRE)) {$Q8_3=$OBJ_COMMENTAIRE;}else{}
	 }
	  	 	  	  //===========================================
	 	if($QUESTION_ID==413){
			//QUESTION 1 - A Q 431
			$total+=$Coef;
		   if($Coef>0)  {$Q9_1='X';}else{}
		   if($Coef>0)  {}else{$Q9_2='X';}
		   if(!empty($OBJ_COMMENTAIRE)) {$Q9_3=$OBJ_COMMENTAIRE;}else{}
	 }
	   	 	  	  //===========================================
	 	if($QUESTION_ID==414){
			//QUESTION 1 - A Q 431
			$total+=$Coef;
		   if($Coef>0)  {$Q10_1='X';}else{}
		   if($Coef>0)  {}else{$Q10_2='X';}
		   if(!empty($OBJ_COMMENTAIRE)) {$Q10_3=$OBJ_COMMENTAIRE;}else{}
	 }
	 	   	 	  	  //===========================================
	 	if($QUESTION_ID==415){
			//QUESTION 1 - A Q 431
			$total+=$Coef;
		   if($Coef>0)  {$Q11_1='X';}else{}
		   if($Coef>0)  {}else{$Q11_2='X';}
		   if(!empty($OBJ_COMMENTAIRE)) {$Q11_3=$OBJ_COMMENTAIRE;}else{}
	 }
	 	 	   	 	  	  //===========================================
	 	if($QUESTION_ID==416){
			//QUESTION 1 - A Q 431
			$total+=$Coef;
		   if($Coef>0)  {$Q12_1='X';}else{}
		   if($Coef>0)  {}else{$Q12_2='X';}
		   if(!empty($OBJ_COMMENTAIRE)) {$Q12_3=$OBJ_COMMENTAIRE;}else{}
	 }
//===========================================
	 	if($QUESTION_ID==417){
			//QUESTION 1 - A Q 431
			$total+=$Coef;
		   if($Coef>0)  {$Q13_1='X';}else{}
		   if($Coef>0)  {}else{$Q13_2='X';}
		   if(!empty($OBJ_COMMENTAIRE)) {$Q13_3=$OBJ_COMMENTAIRE;}else{}
	 }
	 //===========================================
	 	if($QUESTION_ID==418){
			//QUESTION 1 - A Q 431
			$total+=$Coef;
		   if($Coef>0)  {$Q14_1='X';}else{}
		   if($Coef>0)  {}else{$Q14_2='X';}
		   if(!empty($OBJ_COMMENTAIRE)) {$Q14_3=$OBJ_COMMENTAIRE;}else{}
	 }
	 	 //===========================================
	 	if($QUESTION_ID==419){
			//QUESTION 1 - A Q 431
			$total+=$Coef;
		   if($Coef>0)  {$Q15_1='X';}else{}
		   if($Coef>0)  {}else{$Q15_2='X';}
		   if(!empty($OBJ_COMMENTAIRE)) {$Q15_3=$OBJ_COMMENTAIRE;}else{}
	 }
	 	 //===========================================
	 	if($QUESTION_ID==420){
			//QUESTION 1 - A Q 431
			$total+=$Coef;
		   if($Coef>0)  {$Q16_1='X';}else{}
		   if($Coef>0)  {}else{$Q16_2='X';}
		   if(!empty($OBJ_COMMENTAIRE)) {$Q16_3=$OBJ_COMMENTAIRE;}else{}
	 }
	 	 //===========================================
	 	if($QUESTION_ID==421){
			//QUESTION 1 - A Q 431
			$total+=$Coef;
		   if($Coef>0)  {$Q17_1='X';}else{}
		   if($Coef>0)  {}else{$Q17_2='X';}
		   if(!empty($OBJ_COMMENTAIRE)) {$Q17_3=$OBJ_COMMENTAIRE;}else{}
	 }
	 	 //===========================================
	 	if($QUESTION_ID==422){
			//QUESTION 1 - A Q 431
			$total+=$Coef;
		   if($Coef>0)  {$Q18_1='X';}else{}
		   if($Coef>0)  {}else{$Q18_2='X';}
		   if(!empty($OBJ_COMMENTAIRE)) {$Q18_3=$OBJ_COMMENTAIRE;}else{}
	 }
	 	 	 //===========================================
	 	if($QUESTION_ID==423){
			//QUESTION 1 - A Q 431
			$total+=$Coef;
		   if($Coef>0)  {$Q19_1='X';}else{}
		   if($Coef>0)  {}else{$Q19_2='X';}
		   if(!empty($OBJ_COMMENTAIRE)) {$Q19_3=$OBJ_COMMENTAIRE;}else{}
	 }
	  	//===========================================
	 	if($QUESTION_ID==424){
			//QUESTION 1 - A Q 431
			$total+=$Coef;
		   if($Coef>0)  {$Q20_1='X';}else{}
		   if($Coef>0)  {}else{$Q20_2='X';}
		   if(!empty($OBJ_COMMENTAIRE)) {$Q20_3=$OBJ_COMMENTAIRE;}else{}
	 }
	 	  	//===========================================
	 	if($QUESTION_ID==425){
			//QUESTION 1 - A Q 431
			$total+=$Coef;
		   if($Coef>0)  {$Q21_1='X';}else{}
		   if($Coef>0)  {}else{$Q21_2='X';}
		   if(!empty($OBJ_COMMENTAIRE)) {$Q21_3=$OBJ_COMMENTAIRE;}else{}
	 }
	 	 	  	//===========================================
	 	if($QUESTION_ID==426){
			//QUESTION 1 - A Q 431
			$total+=$Coef;
		   if($Coef>0)  {$Q22_1='X';}else{}
		   if($Coef>0)  {}else{$Q22_2='X';}
		   if(!empty($OBJ_COMMENTAIRE)) {$Q22_3=$OBJ_COMMENTAIRE;}else{}
	 }
	  	 	  	//===========================================
	 	if($QUESTION_ID==427){
			//QUESTION 1 - A Q 431
			$total+=$Coef;
		   if($Coef>0)  {$Q23_1='X';}else{}
		   if($Coef>0)  {}else{$Q23_2='X';}
		   if(!empty($OBJ_COMMENTAIRE)) {$Q23_3=$OBJ_COMMENTAIRE;}else{}
	 }
	 
	 	  	 	  	//===========================================
	 	if($QUESTION_ID==428){
			//QUESTION 1 - A Q 431
			$total+=$Coef;
		   if($Coef>0)  {$Q24_1='X';}else{}
		   if($Coef>0)  {}else{$Q24_2='X';}
		   if(!empty($OBJ_COMMENTAIRE)) {$Q24_3=$OBJ_COMMENTAIRE;}else{}
	 }
	 	  	 	  	//===========================================
	 	if($QUESTION_ID==429){
			//QUESTION 1 - A Q 431
			$total+=$Coef;
		   if($Coef>0)  {$Q25_1='X';}else{}
		   if($Coef>0)  {}else{$Q25_2='X';}
		   if(!empty($OBJ_COMMENTAIRE)) {$Q25_3=$OBJ_COMMENTAIRE;}else{}
	 }
	 	  	 	  	//===========================================
	 	if($QUESTION_ID==430){
			//QUESTION 1 - A Q 431
			$total+=$Coef;
		   if($Coef>0)  {$Q26_1='X';}else{}
		   if($Coef>0)  {}else{$Q26_2='X';}
		   if(!empty($OBJ_COMMENTAIRE)) {$Q26_3=$OBJ_COMMENTAIRE;}else{}
	 }
	 
}
		
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
		padding-top:200px;
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
 <page_header>
 <div style="padding-left:80px">
   <table width="946" border="1">
     <tr>
       <td colspan="2">EXERCICE :<?php if(empty($exercice)){}else{ echo $exercice;}?> </td>
       <td rowspan="2" align="center"><font size="+3">QUESTIONNAIRE&nbsp; &nbsp;PME D&rsquo;ANALYSE DU CONTR&Ocirc;LE INTERNE</font></td>
       <td><b>DATE :<?php echo $date_entete;?></b></td>
     </tr>
     <tr>
       <td>ENTITE :</td>
       <td><img src="../../../img/EC.png" width="49" height="61"></td>
       <td><b><?php if(empty($Entreprise)){}else{ echo $Entreprise;}?></b></td>
     </tr>
   </table></div>
 </page_header>
 
    <page_footer><div style="padding-left:150px">------------------------------------------------[[page_cu]]------------------------------------------------</div></page_footer>
    
<!--================================================================================= -->
<div class="niveau0">

<div style="padding-left:50px;width:946"  >
  <table width="946" height="633"  border="1">
        <tr>
          <td  width="414"  align="center"><strong>ENVIRONNEMENT DE CONTROLE</strong></td>
          <td width="38" ><strong>O</strong></td>
          <td  width="30"><strong>N</strong></td>
          <td><strong>OBSERVATIONS</strong></td>
        </tr>
        <tr>
          <td height="80">
          <p>Les contr&ocirc;les des exercices pr&eacute;c&eacute;dents ont-ils r&eacute;v&eacute;l&eacute; l'existence<br> de  nombreuses faiblesses de contr&ocirc;le interne ?</p></td>
          <td><?php echo $Q1_1; ?></td>
          <td><?php echo $Q1_2; ?></td>
          <td><?php echo $Q1_3; ?></td>
        </tr>
        <tr>
          <td height="80"><p>Existe-t-il un manuel de proc&eacute;dures ? Est-il r&eacute;guli&egrave;rement mis &agrave; <br> jour&nbsp;? Selon quelle p&eacute;riodicit&eacute;&nbsp;?</p></td>
            <td><?php echo $Q2_1; ?></td>
          <td><?php echo $Q2_2; ?></td>
          <td><?php echo $Q2_3; ?></td>
        </tr>
        <tr>
          <td height="80"><p>Les comptes et op&eacute;rations personnels du propri&eacute;taire ou du<br> dirigeant  sont-ils s&eacute;par&eacute;s des comptes et op&eacute;rations de<br> l'entreprise&nbsp;?</p></td>
              <td><?php echo $Q3_1; ?></td>
          <td><?php echo $Q3_2; ?></td>
          <td><?php echo $Q3_3; ?></td>
        </tr>
        <tr>
          <td height="80"><p>Le dirigeant est il sensible &agrave; l'importance des contr&ocirc;les&nbsp;et a-t-il<br>  accord&eacute; une attention suffisante &agrave; nos recommandations <br>ant&eacute;rieures ?</p></td>
            <td><?php echo $Q4_1; ?></td>
          <td><?php echo $Q4_2; ?></td>
          <td><?php echo $Q4_3; ?></td>
        </tr>
        <tr>
          <td height="80">Le dirigeant s'implique-t-il dans l'activit&eacute; de l'entreprise&nbsp;?</td>
        <td><?php echo $Q5_1; ?></td>
          <td><?php echo $Q5_2; ?></td>
          <td><?php echo $Q5_3; ?></td>
        </tr>
        <tr>
          <td height="80"><p>Le dirigeant accorde-t-il une attention suffisante aux risques<br> inh&eacute;rents  &agrave; l'activit&eacute; (par exemple les aspects op&eacute;rationnels et<br> financiers li&eacute;s &agrave;  l'environnement)&nbsp;?</p></td>
         <td><?php echo $Q6_1; ?></td>
          <td><?php echo $Q6_2; ?></td>
          <td><?php echo $Q6_3; ?></td>
        </tr>
        <tr>
          <td height="80"><p>A-t-on relev&eacute; certaines situations ou &eacute;v&egrave;nements laissant <br>supposer  l'existence de fraudes ou d'erreurs conduisant &agrave; des <br>anomalies significatives  dans les comptes ?</p></td>
         <td><?php echo $Q7_1; ?></td>
          <td><?php echo $Q7_2; ?></td>
          <td><?php echo $Q7_3; ?></td>
        </tr>
    </table>


</div>
<div style="padding-top:150px">
<table width="946" border="0">
  <tr>
    <td><font size="-1">  Ce questionnaire est présenté à l’usage des dossiers correspondant au contrôle de petites entités. Des questionnaires par cycles sont développés parallèlement et les chapitres du présent questionnaire, inhérents à ces différents cycles, pourront faire l’objet de renvois vers les questionnaires plus détaillés en cas de nécessité ( entité de taille moyenne ).</font></td>
  </tr>
</table>
</div>

</div>








<page pageset="old">
   <br><br><br>
      <div class="niveau" style="padding-left:70px">
        <table width="946" height="607"  border="1">
          <tr>
            <td  width="414" height="42"  align="center"><strong>ENVIRONNEMENT DE CONTROLE<br>(Suite)</strong></td>
            <td width="38" ><strong>O</strong></td>
            <td  width="30"><strong>N</strong></td>
            <td><strong>OBSERVATIONS</strong></td>
          </tr>
          <tr>
            <td height="20"><p>Le personnel comptable, et de fa&ccedil;on plus g&eacute;n&eacute;rale, le personnel<br> de la  soci&eacute;t&eacute;,&nbsp; a-t-il une formation appropri&eacute;e  ?</p></td>
             <td><?php echo $Q8_1; ?></td>
          <td><?php echo $Q8_2; ?></td>
          <td><?php echo $Q8_3; ?></td>
          </tr>
          <tr>
            <td height="20"><p>La comptabilit&eacute; est-elle rigoureusement tenue &agrave; jour ?</p></td>
          <td><?php echo $Q9_1; ?></td>
          <td><?php echo $Q9_2; ?></td>
          <td><?php echo $Q9_3; ?></td>
          </tr>
          <tr>
            <td height="20"><p>Existe-t-il des budgets et des situations interm&eacute;diaires et ces<br> &eacute;l&eacute;ments  font ils l&rsquo;objet d&rsquo;un rapprochement r&eacute;gulier&nbsp;? Selon<br> quelle  p&eacute;riodicit&eacute;&nbsp;?</p></td>
          <td><?php echo $Q10_1; ?></td>
          <td><?php echo $Q10_2; ?></td>
          <td><?php echo $Q10_3; ?></td>
          </tr>
          <tr>
            <td height="2">La  direction &eacute;tablit ses &eacute;tats financiers avec pour objectif de <br>(cocher les  &eacute;l&eacute;ments applicables)&nbsp;:<br>
            -Maximiser le r&eacute;sultat<br>
            <br></td>
           <td><?php echo $Q11_1; ?></td>
          <td><?php echo $Q11_2; ?></td>
          <td><?php echo $Q11_3; ?></td>
          </tr>
          <tr>
            <td height="3">-Lisser la croissance des r&eacute;sultats</td>
             <td><?php echo $Q12_1; ?></td>
          <td><?php echo $Q12_2; ?></td>
          <td><?php echo $Q12_3; ?></td>
          </tr>
          <tr>
            <td height="8">-Atteindre les budgets/pr&eacute;visions</td>
               <td><?php echo $Q13_1; ?></td>
          <td><?php echo $Q13_2; ?></td>
          <td><?php echo $Q13_3; ?></td>
          </tr>
          <tr>
            <td height="19">-Minimiser le b&eacute;n&eacute;fice imposable</td>
          <td><?php echo $Q14_1; ?></td>
          <td><?php echo $Q14_2; ?></td>
          <td><?php echo $Q14_3; ?></td>
          </tr>
          <tr>
            <td height="23">-Pas de tendance particuli&egrave;re</td>
          <td><?php echo $Q15_1; ?></td>
          <td><?php echo $Q15_2; ?></td>
          <td><?php echo $Q15_3; ?></td>
          </tr>
          <tr>
            <td height="20">La direction a-t-elle mis en place un environnement de contr&ocirc;le<br>  permettant de minimiser les biais pouvant affecter les estimations <br>comptables  et les autres jugements&nbsp;?</td>
          <td><?php echo $Q16_1; ?></td>
          <td><?php echo $Q16_2; ?></td>
          <td><?php echo $Q16_3; ?></td>
          </tr>
          <tr>
            <td height="8">La  soci&eacute;t&eacute; a-t-elle recours aux services&nbsp;: <br>
            -d&rsquo;un expert comptable&nbsp;<br></td>
          <td><?php echo $Q17_1; ?></td>
          <td><?php echo $Q17_2; ?></td>
          <td><?php echo $Q17_3; ?></td>
          </tr>
          <tr>
            <td height="10">-d&rsquo;un avocat&nbsp;</td>
          <td><?php echo $Q18_1; ?></td>
          <td><?php echo $Q18_2; ?></td>
          <td><?php echo $Q18_3; ?></td>
          </tr>
          <tr>
            <td height="20"><p>La direction a-t-elle la ma&icirc;trise de la fonction informatique ?</p></td>
          <td><?php echo $Q19_1; ?></td>
          <td><?php echo $Q19_2; ?></td>
          <td><?php echo $Q19_3; ?></td>
          </tr>
          <tr>
            <td height="10">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="80">Quels sont les types de logiciels et d&rsquo;applications&nbsp;? ( D&eacute;tailler<br>  bri&egrave;vement s&rsquo;il s&rsquo;agit de logiciels standards ou d&eacute;velopp&eacute;s,  de<br> tableurs pr&eacute;programm&eacute;s, si les ventes,&nbsp;  les achats et la paye sont&nbsp;<br>  int&eacute;gr&eacute;s, comment&nbsp;? &hellip; )</td>
          <td><?php echo $Q20_1; ?></td>
          <td><?php echo $Q20_2; ?></td>
          <td><?php echo $Q20_3; ?></td>
          </tr>
        </table>
        <br>
  </div>
</page>


<page pageset="old">
   <br><br><br>
      <div class="niveau" style="padding-left:70px">
        <table width="946" height="445"  border="1">
          <tr>
            <td  width="414" height="42"  align="center"><strong>ENVIRONNEMENT DE CONTROLE<br>(Suite)</strong></td>
            <td width="38" ><strong>O</strong></td>
            <td  width="30"><strong>N</strong></td>
            <td><strong>OBSERVATIONS</strong></td>
          </tr>
          <tr>
            <td height="20"><p>Les logiciels utilis&eacute;s pour le traitement de l'information comptable<br> et  financi&egrave;re manquent-ils de fiabilit&eacute; ?</p></td>
           <td><?php echo $Q21_1; ?></td>
          <td><?php echo $Q21_2; ?></td>
          <td><?php echo $Q21_3; ?></td>
          </tr>
          <tr>
            <td height="20"><p>Le dirigeant a-t-il &eacute;labor&eacute; et d&eacute;velopp&eacute; un plan d'urgence appropri&eacute; <br>en  mati&egrave;re de syst&egrave;mes d'information pour assurer la poursuite du<br> fonctionnement  de l'entreprise en cas de sinistre ?</p></td>
           <td><?php echo $Q22_1; ?></td>
          <td><?php echo $Q22_2; ?></td>
          <td><?php echo $Q22_3; ?></td>
          </tr>
          <tr>
            <td height="20"><p>Le dirigeant a-t-il &eacute;labor&eacute; et d&eacute;velopp&eacute; des m&eacute;thodes appropri&eacute;es<br>  d'autorisation des op&eacute;rations, y compris pour &eacute;viter les<br> modifications non  autoris&eacute;es des<br> fichiers de donn&eacute;es et des programmes&nbsp;?</p></td>
		  <td><?php echo $Q23_1; ?></td>
          <td><?php echo $Q23_2; ?></td>
          <td><?php echo $Q23_3; ?></td>
          </tr>
          <tr>
            <td height="80">La s&eacute;paration des t&acirc;ches est-elle suffisante, &eacute;tant donn&eacute; la taille et <br> la complexit&eacute; de l'organisation et l'implication du dirigeant ( Cf <br>grille de  s&eacute;paration des fonctions )</td>
		  <td><?php echo $Q24_1; ?></td>
          <td><?php echo $Q24_2; ?></td>
          <td><?php echo $Q24_3; ?></td>
          </tr>
          <tr>
            <td height="20">La  soci&eacute;t&eacute; dispose-t-elle d&rsquo;une documentation suffisante et<br> r&eacute;guli&egrave;rement mise &agrave;  jour en mati&egrave;re comptable, fiscale et sociale&nbsp;?</td>
		  <td><?php echo $Q25_1; ?></td>
          <td><?php echo $Q25_2; ?></td>
          <td><?php echo $Q25_3; ?></td>
          </tr>
          <tr>
            <td height="20">S'il s'agit d'une filiale, d'une division ou d'un &eacute;tablissement, la <br> soci&eacute;t&eacute; m&egrave;re ou le si&egrave;ge exerce-t-il un contr&ocirc;le effectif <br>( Informations  financi&egrave;res p&eacute;riodiques, contr&ocirc;le des r&eacute;sultats, visites<br> des auditeurs internes  &hellip;)&nbsp;?</td>
		  <td><?php echo $Q26_1; ?></td>
          <td><?php echo $Q26_2; ?></td>
          <td><?php echo $Q26_3; ?></td>
          </tr>
        </table>
        <p><br><br>
        </p>
        <table width="946" border="1">
          <tr>
            <td width="500"><strong>CONCLUSION GENERALE&nbsp;:</strong></td>
            <td width="105"><strong>RISQUE</strong></td>
          </tr>
          <tr>
            <td rowspan="2"><?php if(empty($conclusion)){}else{ echo $conclusion; }?></td>
            <td><?php if(empty($risque)){}else{echo $risque;} ?></td>
          </tr>
          <tr>
            <td align="center"><font size="+3"><?php  echo $total.'/46'; ?></font></td>
          </tr>
        </table>
        <p><br>
        </p>
        <p>&nbsp;</p>
  </div>
</page>

    
</body>
</html>
