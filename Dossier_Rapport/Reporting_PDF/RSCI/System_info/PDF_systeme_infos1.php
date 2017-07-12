<?php
session_start();
$date_entete=date('d-m-Y');
include "../../../connex.php";  
//-==============================================================================
        set_time_limit(1200);				
		ini_set("memory_limit","-1");
        ini_alter("memory_limit","-1");
		
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
		
  //[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[ COCHE ]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]  
$achat_1=$achat_2=$achat_3="";
$vente_1=$vente_2=$vente_3="";
$tresor_1=$tresor_2=$tresor_3="";
$compt_1=$compt_2=$compt_3="";
$paie_1=$paie_2=$paie_3="";
$stock_1=$stock_2=$stock_3="";

  $get_coche =db_connect("SELECT COMPLEXITE,CASE
				WHEN NOM_CYCLE='achat' THEN '1'
				WHEN NOM_CYCLE='vente' THEN '2'
				WHEN NOM_CYCLE='tresorerie' THEN '3'
				WHEN NOM_CYCLE='comptabilite' THEN '4'
				WHEN NOM_CYCLE='paie' THEN '5'
				ELSE '6'
				END AS 'val_complexite'
 				FROM tab_sys_info WHERE MISSION_ID='".$_SESSION['idMission']."'");
  
 foreach ($get_coche as $val){
	 $COMPLEXITE = $val['COMPLEXITE'];
	 $val_complexite = $val['val_complexite'];
	 
	 if($val_complexite==1){ //ACHAT
               if($COMPLEXITE=='s') {$achat_1='X';}else{}
               if($COMPLEXITE=='c') {$achat_2='X';}else{}
               if($COMPLEXITE=='t') {$achat_3='X';}else{}
    }
  if($val_complexite==2){ //VENTE
               if($COMPLEXITE=='s') {$vente_1='X';}else{}
               if($COMPLEXITE=='c') {$vente_2='X';}else{}
               if($COMPLEXITE=='t') {$vente_3='X';}else{}
    }
    if($val_complexite==3){ //tresorerie
               if($COMPLEXITE=='s') {$tresor_1='X';}else{}
               if($COMPLEXITE=='c') {$tresor_2='X';}else{}
               if($COMPLEXITE=='t') {$tresor_3='X';}else{}
    }
    if($val_complexite==4){ //comptabilisation
               if($COMPLEXITE=='s') {$compt_1='X';}else{}
               if($COMPLEXITE=='c') {$compt_2='X';}else{}
               if($COMPLEXITE=='t') {$compt_3='X';}else{}
    }
     if($val_complexite==5){ //PAIE
               if($COMPLEXITE=='s') {$paie_1='X';}else{}
               if($COMPLEXITE=='c') {$paie_2='X';}else{}
               if($COMPLEXITE=='t') {$paie_3='X';}else{}
    }
     if($val_complexite==6){ //STOCK
               if($COMPLEXITE=='s') {$stock_1='X';}else{}
               if($COMPLEXITE=='c') {$stock_2='X';}else{}
               if($COMPLEXITE=='t') {$stock_3='X';}else{}
    }
	 
	 
	  
  }

  //[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[ QUESTIONNAIRE  I ]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]  		
$Q1_a1=$Q1_a2=$Q1_a3=$Q1_a4=$Q1_a5="";	
$Q1_b1=$Q1_b2=$Q1_b3=$Q1_b4=$Q1_b5=""; 		
$Q2_1=$Q2_2=$Q2_3=$Q2_4=$Q2_5=""; 		
$Q3_b1=$Q3_b2=$Q3_b3=$Q3_b4=$Q3_b5="";	
$Q3_a1=$Q3_a2=$Q3_a3=$Q3_a4=$Q3_a5="";	
$Q3_c1=$Q3_c2=$Q3_c3=$Q3_c4=$Q3_c5="";	
$Q3_1_a1=$Q3_1_a2=$Q3_1_a3=$Q3_1_a4=$Q3_1_a5="";
$Q3_1_b1=$Q3_1_b2=$Q3_1_b3=$Q3_1_b4=$Q3_1_b5="";
$Q3_1_c1=$Q3_1_c2=$Q3_1_c3=$Q3_1_c4=$Q3_1_c5="";
$Q4_a1=$Q4_a2=$Q4_a3=$Q4_a4=$Q4_a5="";
$Q4_b1=$Q4_b2=$Q4_b3=$Q4_b4=$Q4_b5="";
$Q4_c1=$Q4_c2=$Q4_c3=$Q4_c4=$Q4_c5="";

$Q5_a1=$Q5_a2=$Q5_a3=$Q5_a4=$Q5_a5="";
$Q5_b1=$Q5_b2=$Q5_b3=$Q5_b4=$Q5_b5="";
$Q5_c1=$Q5_c2=$Q5_c3=$Q5_c4=$Q5_c5=""; 

$QB_1=$QB_2=$QB_3=$QB_4=$QB_5=""; 

			

$get_question=db_connect("SELECT QUESTION_ID,CASE 
WHEN OBJECTIF_QCM='OUI' THEN '1'
WHEN OBJECTIF_QCM='NON' THEN '2'
WHEN OBJECTIF_QCM='faible' THEN '3'
WHEN OBJECTIF_QCM='moyen' THEN '4'
ELSE '5'
END AS 'q_result'
 FROM tab_objectif 
 WHERE UTIL_ID='".$_SESSION['id']."' AND MISSION_ID='".$_SESSION['idMission']."' AND CYCLE_ACHAT_ID=32 ");
 //UTIL_ID='".$UTIL_ID."' AND MISSION_ID='".$idMission."' AND //CYCLE_ACHAT_ID=32
 foreach ($get_question as $value){
	 $Question =$value['q_result']; 
	 $QUESTION_ID =$value['QUESTION_ID'];
	 
   if($QUESTION_ID==431){
			//QUESTION 1 - A Q 431
		 if($Question==1)  {$Q1_a1='X';}else{}
	   if($Question==2) {$Q1_a2='X';}else{}
	   if($Question==3) {$Q1_a3='X';}else{}
	   if($Question==4) {$Q1_a4='X';}else{}
	   if($Question==5) {$Q1_a5='X';}else{}
	 }
	  if($QUESTION_ID>431 and $QUESTION_ID<433){
			//QUESTION 1 - B Q 432
		  if($Question==1) {$Q1_b1='X';}else{}
		  if($Question==2) {$Q1_b2='X';}else{}
      	  if($Question==3) {$Q1_b3='X';}else{}
          if($Question==4) {$Q1_b4='X';}else{}
		  if($Question==5) {$Q1_b5='X';}else{}
		  }
	  if($QUESTION_ID>432 and $QUESTION_ID<434){
			//QUESTION 2  Q 433
		  if($Question==1) {$Q2_1='X';}else{}
		  if($Question==2) {$Q2_2='X';}else{}
      	  if($Question==3) {$Q2_3='X';}else{}
          if($Question==4) {$Q2_4='X';}else{}
		  if($Question==5) {$Q2_5='X';}else{}
		  }
	  if($QUESTION_ID>433 and $QUESTION_ID<435){
			//QUESTION 3 A Q 434
		  if($Question==1) {$Q3_a1='X';}else{}
		  if($Question==2) {$Q3_a2='X';}else{}
      	  if($Question==3) {$Q3_a3='X';}else{}
          if($Question==4) {$Q3_a4='X';}else{}
		  if($Question==5) {$Q3_a5='X';}else{}
		  }
	  if($QUESTION_ID>434 and $QUESTION_ID<436){
			//QUESTION 3 B Q 435
		  if($Question==1) {$Q3_b1='X';}else{}
		  if($Question==2) {$Q3_b2='X';}else{}
      	  if($Question==3) {$Q3_b3='X';}else{}
          if($Question==4) {$Q3_b4='X';}else{}
		  if($Question==5) {$Q3_b5='X';}else{}
		  } 
	if($QUESTION_ID>435 and $QUESTION_ID<437){
			//QUESTION 3 C Q 436
		  if($Question==1) {$Q3_c1='X';}else{}
		  if($Question==2) {$Q3_c2='X';}else{}
      	  if($Question==3) {$Q3_c3='X';}else{}
          if($Question==4) {$Q3_c4='X';}else{}
		  if($Question==5) {$Q3_c5='X';}else{}
		  } 
	 	if($QUESTION_ID>436 and $QUESTION_ID<438){
			//QUESTION 3 - 1 Q 437
		  if($Question==1) {$Q3_1_a1='X';}else{}
		  if($Question==2) {$Q3_1_a2='X';}else{}
      	  if($Question==3) {$Q3_1_a3='X';}else{}
          if($Question==4) {$Q3_1_a4='X';}else{}
		  if($Question==5) {$Q3_1_a5='X';}else{}
		  }
		   	if($QUESTION_ID>437 and $QUESTION_ID<439){
			//QUESTION 3 - 2 Q 438
		  if($Question==1) {$Q3_1_b1='X';}else{}
		  if($Question==2) {$Q3_1_b2='X';}else{}
      	  if($Question==3) {$Q3_1_b3='X';}else{}
          if($Question==4) {$Q3_1_b4='X';}else{}
		  if($Question==5) {$Q3_1_b5='X';}else{}
		  }
		   	if($QUESTION_ID>438 and $QUESTION_ID<440){
			//QUESTION 3 - 3 Q 439
		  if($Question==1) {$Q3_1_c1='X';}else{}
		  if($Question==2) {$Q3_1_c2='X';}else{}
      	  if($Question==3) {$Q3_1_c3='X';}else{}
          if($Question==4) {$Q3_1_c4='X';}else{}
		  if($Question==5) {$Q3_1_c5='X';}else{}
		  }
		  
		if($QUESTION_ID>439 and $QUESTION_ID<441){
			//QUESTION 4 A Q 440
		  if($Question==1) {$Q4_a1='X';}else{}
		  if($Question==2) {$Q4_a2='X';}else{}
      	  if($Question==3) {$Q4_a3='X';}else{}
          if($Question==4) {$Q4_a4='X';}else{}
		  if($Question==5) {$Q4_a5='X';}else{}
		  }
		 if($QUESTION_ID>440 and $QUESTION_ID<442){
			//QUESTION  4 B Q 441
		  if($Question==1) {$Q4_b1='X';}else{}
		  if($Question==2) {$Q4_b2='X';}else{}
      	  if($Question==3) {$Q4_b3='X';}else{}
          if($Question==4) {$Q4_b4='X';}else{}
		  if($Question==5) {$Q4_b5='X';}else{}
		  }
		  
		   if($QUESTION_ID>441 and $QUESTION_ID<443){
			//QUESTION 4 C Q 442
		  if($Question==1) {$Q4_c1='X';}else{}
		  if($Question==2) {$Q4_c2='X';}else{}
      	  if($Question==3) {$Q4_c3='X';}else{}
          if($Question==4) {$Q4_c4='X';}else{}
		  if($Question==5) {$Q4_c5='X';}else{}
		  }
		  
		if($QUESTION_ID>442 and $QUESTION_ID<444){
			//QUESTION 5 A Q 443
		  if($Question==1) {$Q5_a1='X';}else{}
		  if($Question==2) {$Q5_a2='X';}else{}
      	  if($Question==3) {$Q5_a3='X';}else{}
          if($Question==4) {$Q5_a4='X';}else{}
		  if($Question==5) {$Q5_a5='X';}else{}
		  }
		if($QUESTION_ID>443 and $QUESTION_ID<445){
			//QUESTION 5 B Q 444
		  if($Question==1) {$Q5_b1='X';}else{}
		  if($Question==2) {$Q5_b2='X';}else{}
      	  if($Question==3) {$Q5_b3='X';}else{}
          if($Question==4) {$Q5_b4='X';}else{}
		  if($Question==5) {$Q5_b5='X';}else{}
		  }
		  	if($QUESTION_ID>444 and $QUESTION_ID<446){
			//QUESTION 5 C Q 445
		  if($Question==1) {$Q5_c1='X';}else{}
		  if($Question==2) {$Q5_c2='X';}else{}
      	  if($Question==3) {$Q5_c3='X';}else{}
          if($Question==4) {$Q5_c4='X';}else{}
		  if($Question==5) {$Q5_c5='X';}else{}
		  } 
		  	if($QUESTION_ID>445 and $QUESTION_ID<447){
			//QUESTION 5 C Q 446
		  if($Question==1) {$QB_1='X';}else{}
		  if($Question==2) {$QB_2='X';}else{}
      	  if($Question==3) {$QB_3='X';}else{}
          if($Question==4) {$QB_4='X';}else{}
		  if($Question==5) {$QB_5='X';}else{}
		  }
		  

   }//foreach
	// echo 'llllll';

     
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
          <td colspan="2"><b>Client</b><br><span style="color: CMYK(0, 0, 100%, 0)"><b><h4><?php if(empty($Entreprise)){}else{ echo $Entreprise;}?></h4></b></span></td>
          <td colspan="2" align="center"><strong>QUEST.  DE PRISE DE CONNAISSANCE <br>INFO. (syst&eacute;mes simples)</strong></td>
          <td width="147"><b>CODE</b><br><br><span style="color: CMYK(0, 0, 100%, 0)">FC 1</span>  
	      </td>
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
 
    <page_footer><div align="center">Questionnaire  de prise de connaissance informatique____________ <span style="width: 40px; text-align: right">[[page_cu]] </span>_________________ <strong>G. C</strong></div></page_footer>
    
<!--================================================================================= -->

<div class="niveau0">

<div style="border:solid;padding-right:30px;padding-left:15px;width:600px"  >
  <p><div align="center">MODE D&rsquo;EMPLOI</div></p>
  <p>&nbsp;</p>
  <p>Ce questionnaire est  destin&eacute; &agrave; aider le commissaire aux comptes &agrave; la fois &agrave; prendre connaissance <br>des  sp&eacute;cificit&eacute;s du syst&egrave;me informatique de l&rsquo;entreprise et &agrave; &eacute;valuer les risques <br> qui lui sont attach&eacute;s.<br>
    Il est adapt&eacute; aux syst&egrave;mes simples,  mais peut &ecirc;tre, si certains points le justifient, compl&eacute;t&eacute; gr&acirc;ce <br>au  questionnaire &laquo;&nbsp;syst&egrave;me complexe&nbsp;&raquo;.<br>
    Le choix entre ces deux  questionnaires d&eacute;pend de la connaissance pr&eacute;alable du commissaire<br> aux comptes  de l&rsquo;organisation informatique de l&rsquo;entreprise.<br>
    Des feuilles de travail ont &eacute;t&eacute;  &eacute;galement d&eacute;velopp&eacute;es pour aider &agrave; la description de l&rsquo;organisation<br>  informatique des PME.<br>
    L&rsquo;&eacute;valuation des risques sera  report&eacute;e sur le tableau r&eacute;capitulatif des risques.<br>
    Ce questionnaire comporte 5  parties&nbsp;:</p>
  <ol>
    <li>traitements informatis&eacute;s des cycles</li>
    <li>fonction informatique</li>
    <li>mat&eacute;riel</li>
    <li>logiciels</li>
    <li>dispositions l&eacute;gales et r&eacute;glementaires</li>
  </ol>


</div>

</div>




<page pageset="old">
  <bookmark title="Chapitre 1" level="0"></bookmark><h1></h1>
  <br><br><br>
        <br><br>
        <br>
    <div class="niveau">
    
      <div style="border:solid;padding-right:30px;padding-left:15px;width:600px"  >
          <p>TRAITEMENTS AUTOMATISES DES CYCLES</p>
          <p>Pour chaque application, &eacute;valuer le degr&eacute; de complexit&eacute; en fonction du  degr&eacute; d&rsquo;informatisation des t&acirc;ches.<br>
            Pour chaque application,  le risque sera gradu&eacute; en fonction de&nbsp;:</p>
          <ul>
            <li>l&rsquo;existence d&rsquo;une documentation utilisateur plus  ou moins importante,</li>
            <li>la facilit&eacute; apparente de suivre le chemin de  r&eacute;vision (flux, annulations, centralisations) en pr&eacute;servant la s&eacute;curit&eacute; des  informations,</li>
            <li>des d&eacute;lais de validation.<strong></strong></li>
          </ul>
        
        <br>
        <br>
          <table width="600" border="1" style="bord">
            <tr>
              <td width="400">&nbsp;</td>
              <td width="50"><strong>Simple</strong></td>
              <td width="60"><strong>Complexe</strong></td>
              <td width="96"><strong>Tr&egrave;s complexe</strong></td>
            </tr>
            <tr>
              <td><strong>Achat</strong></td>
              <td><?php echo $achat_1; ?></td>
              <td><?php echo $achat_2; ?></td>
              <td><?php echo $achat_3; ?></td>
            </tr>
            <tr>
              <td><strong>Vente</strong></td>
              <td><?php echo $vente_1; ?></td>
              <td><?php echo $vente_2; ?></td>
              <td><?php echo $vente_3; ?></td>
            </tr>
            <tr>
              <td><strong>Tr&eacute;sorerie</strong></td>
              <td><?php echo $tresor_1; ?></td>
              <td><?php echo $tresor_2; ?></td>
              <td><?php echo $tresor_3; ?></td>
            </tr>
            <tr>
              <td><strong>Comptabilit&eacute;</strong></td>
              <td><?php echo $compt_1; ?></td>
              <td><?php echo $compt_2; ?></td>
              <td><?php echo $compt_3; ?></td>
            </tr>
            <tr>
              <td><strong>Paie</strong></td>
              <td><?php echo $paie_1; ?></td>
              <td><?php echo $paie_2; ?></td>
              <td><?php echo $paie_3; ?></td>
            </tr>
            <tr>
              <td><strong>Stock</strong></td>
              <td><?php echo $stock_1; ?></td>
              <td><?php echo $stock_2; ?></td>
              <td><?php echo $stock_3; ?></td>
            </tr>
          </table>
        </div>
  </div>
</page>


<page pageset="old">
    <bookmark title="Chapitre 2" level="0" ></bookmark><h1></h1>
    <br><br>
  <div class="niveau" style="padding-right:30px">
    <table height="748" border="1">
  	    <tr>
  	      <td width="208" height="59" rowspan="2"><table border="0" cellspacing="0" cellpadding="0" >
  	        <tr>
  	          <td width="359" valign="top"><p><strong>II. FONCTION INFORMATIQUE</strong></p></td>
	          </tr>
  	        <tr>
  	          <td width="359" valign="top"><p><strong>Prise de connaissance</strong></p></td>
	          </tr>
  	       
  	        <tr>
  	          <td width="359" valign="top"><p>PERSONNEL INFORMATIQUE</p></td>
	          </tr>
  	        <tr>
  	          <td width="359" valign="top"><p>- Effectif,</p></td>
	          </tr>
  	        <tr>
  	          <td width="359" valign="top"><p>- Degr&eacute; de    formation,</p></td>
	          </tr>
  	        <tr>
  	          <td width="359" valign="top"><p>- Co&ucirc;t (le tableau    &laquo;&nbsp;Budget&nbsp;&raquo; peut &ecirc;tre utilis&eacute;)</p></td>
	          </tr>
  	        <tr>
  	          <td width="359" valign="top"><p>- Une solution    simple consiste &agrave; analyser le dernier exercice clos</p></td>
	          </tr>
          </table></td>
  	      <td height="23"><strong>Description (ou r&eacute;f.  feuille de travail)</strong></td>
        </tr>
  	    <tr>
  	      <td height="122">&nbsp;</td>
        </tr>
  	    <tr>
  	      <td colspan="2"><table width="100%" border="1">
  	        <tr>
  	          <td><strong>ANALYSE DES RISQUES</strong></td>
  	          <td colspan="5"><strong>RISQUES</strong></td>
            </tr>
  	        <tr>
  	          <td>1. La  direction g&eacute;n&eacute;rale exerce-t-elle un contr&ocirc;le sur le service informatique&nbsp;:</td>
  	          <td>Oui</td>
  	          <td>Non</td>
  	          <td>Faible</td>
  	          <td>Moyen</td>
  	          <td>Elev&eacute;</td>
            </tr>
  	        <tr>
  	          <td>-  Contr&ocirc;le renforc&eacute;&nbsp;?</td>
  	          <td><?php echo $Q1_a1;?></td>
  	          <td><?php echo $Q1_a2;?></td>
  	          <td><?php echo $Q1_a3;?></td>
  	          <td><?php echo $Q1_a4;?></td>
  	          <td><?php echo $Q1_a5;?></td>
            </tr>
  	        <tr>
  	          <td>- Contr&ocirc;le  des objectifs&nbsp;?</td>
  	         <td><?php echo $Q1_b1;?></td>
  	          <td><?php echo $Q1_b2;?></td>
  	          <td><?php echo $Q1_b3;?></td>
  	          <td><?php echo $Q1_b4;?></td>
  	          <td><?php echo $Q1_b5;?></td>
            </tr>
  	        <tr>
  	          <td>Est-elle  impliqu&eacute;e dans les d&eacute;cisions informatiques&nbsp;?</td>
  	         <td><?php echo $Q2_1;?></td>
  	          <td><?php echo $Q2_2;?></td>
  	          <td><?php echo $Q2_3;?></td>
  	          <td><?php echo $Q2_4;?></td>
  	          <td><?php echo $Q2_5;?></td>
            </tr>
  	        <tr>
  	          <td><p>2. Tous  les services utilisateurs sont-ils consult&eacute;s pour <br>les d&eacute;cisions informatiques  qui les concernent&nbsp;?</p></td>
  	          <td><?php echo $Q3_a1;?></td>
  	          <td><?php echo $Q3_a2;?></td>
  	          <td><?php echo $Q3_a3;?></td>
  	          <td><?php echo $Q3_a4;?></td>
  	          <td><?php echo $Q3_a5;?></td>
            </tr>
  	        <tr>
  	          <td><p>3. La conception  interne est-elle&nbsp;:</p></td>
  	          <td>&nbsp;</td>
  	          <td>&nbsp;</td>
  	          <td>&nbsp;</td>
  	          <td>&nbsp;</td>
  	          <td>&nbsp;</td>
            </tr>
  	        <tr>
  	          <td> -int&eacute;grale&nbsp;?</td>
  	           <td><?php echo $Q3_b1;?></td>
  	          <td><?php echo $Q3_b2;?></td>
  	          <td><?php echo $Q3_b3;?></td>
  	          <td><?php echo $Q3_b4;?></td>
  	          <td><?php echo $Q3_b5;?></td>
            </tr>
  	        <tr>
  	          <td>-partielle&nbsp;?</td>
  	           <td><?php echo $Q3_c1;?></td>
  	          <td><?php echo $Q3_c2;?></td>
  	          <td><?php echo $Q3_c3;?></td>
  	          <td><?php echo $Q3_c4;?></td>
  	          <td><?php echo $Q3_c5;?></td>
            </tr>
  	        <tr>
  	          <td>-inexistante?</td>
  	         <td><?php echo $Q3_1_a1;?></td>
  	          <td><?php echo $Q3_1_a2;?></td>
  	          <td><?php echo $Q3_1_a3;?></td>
  	          <td><?php echo $Q3_1_a4;?></td>
  	          <td><?php echo $Q3_1_a5;?></td>
            </tr>
  	        <tr>
  	          <td><p>La conception externe  est-elle&nbsp;:</p></td>
  	          <td>&nbsp;</td>
  	          <td>&nbsp;</td>
  	          <td>&nbsp;</td>
  	          <td>&nbsp;</td>
  	          <td>&nbsp;</td>
            </tr>
  	        <tr>
  	          <td> -int&eacute;grale&nbsp;?</td>
  	           <td><?php echo $Q3_1_b1;?></td>
  	          <td><?php echo $Q3_1_b2;?></td>
  	          <td><?php echo $Q3_1_b3;?></td>
  	          <td><?php echo $Q3_1_b4;?></td>
  	          <td><?php echo $Q3_1_b5;?></td>
            </tr>
  	        <tr>
  	          <td>-partielle&nbsp;?</td>
  	          <td><?php echo $Q3_1_c1;?></td>
  	          <td><?php echo $Q3_1_c2;?></td>
  	          <td><?php echo $Q3_1_c3;?></td>
  	          <td><?php echo $Q3_1_c4;?></td>
  	          <td><?php echo $Q3_1_c5;?></td>
            </tr>
  	        <tr>
  	          <td>-inexistante?</td>
  	         <td><?php echo $Q4_a1;?></td>
  	          <td><?php echo $Q4_a2;?></td>
  	          <td><?php echo $Q4_a3;?></td>
  	          <td><?php echo $Q4_a4;?></td>
  	          <td><?php echo $Q4_a5;?></td>
            </tr>
  	        <tr>
  	          <td height="30"><p>4. L&rsquo;exploitation  interne est-elle&nbsp;:</p></td>
  	          <td>&nbsp;</td>
  	          <td>&nbsp;</td>
  	          <td>&nbsp;</td>
  	          <td>&nbsp;</td>
  	          <td>&nbsp;</td>
            </tr>
  	        <tr>
  	          <td> -int&eacute;grale&nbsp;?</td>
  	         <td><?php echo $Q4_b1;?></td>
  	          <td><?php echo $Q4_b2;?></td>
  	          <td><?php echo $Q4_b3;?></td>
  	          <td><?php echo $Q4_b4;?></td>
  	          <td><?php echo $Q4_b5;?></td>
            </tr>
  	        <tr>
  	          <td>-partielle&nbsp;?</td>
  	           <td><?php echo $Q4_c1;?></td>
  	          <td><?php echo $Q4_c2;?></td>
  	          <td><?php echo $Q4_c3;?></td>
  	          <td><?php echo $Q4_c4;?></td>
  	          <td><?php echo $Q4_c5;?></td>
            </tr>
  	        <tr>
  	          <td>-inexistante?</td>
  	          <td><?php echo $Q5_a1;?></td>
  	          <td><?php echo $Q5_a2;?></td>
  	          <td><?php echo $Q5_a3;?></td>
  	          <td><?php echo $Q5_a4;?></td>
  	          <td><?php echo $Q5_a5;?></td>
            </tr>
  	        <tr>
  	          <td><p>L&rsquo;exploitation  externe est-elle&nbsp;:</p></td>
  	          <td>&nbsp;</td>
  	          <td>&nbsp;</td>
  	          <td>&nbsp;</td>
  	          <td>&nbsp;</td>
  	          <td>&nbsp;</td>
            </tr>
  	        <tr>
  	          <td> -int&eacute;grale&nbsp;?</td>
  	             <td><?php echo $Q5_b1;?></td>
  	          <td><?php echo $Q5_b2;?></td>
  	          <td><?php echo $Q5_b3;?></td>
  	          <td><?php echo $Q5_b4;?></td>
  	          <td><?php echo $Q5_b5;?></td>
            </tr>
  	        <tr>
  	          <td>-partielle&nbsp;?</td>
  	        <td><?php echo $Q5_c1;?></td>
  	          <td><?php echo $Q5_c2;?></td>
  	          <td><?php echo $Q5_c3;?></td>
  	          <td><?php echo $Q5_c4;?></td>
  	          <td><?php echo $Q5_c5;?></td>
            </tr>
  	        <tr>
  	          <td>-inexistante?</td>
  	           <td><?php echo $QB_1;?></td>
  	          <td><?php echo $QB_2;?></td>
  	          <td><?php echo $QB_3;?></td>
  	          <td><?php echo $QB_4;?></td>
  	          <td><?php echo $QB_5;?></td>
            </tr>
          </table></td>
        </tr>
      </table>
    
   
  
  </div>
    
</page>



<page pageset="old">
   
      <div class="niveau" style="padding-left:70px">
      <br><br><br><br>
    <table width="946" height="633"  border="1">
              <tr>
                <td width="300"><strong>III. MATERIEL</strong></td>
                <td colspan="5" ><strong>RISQUES</strong></td>
              </tr>
              <tr>
                <td  width="78%"><strong>ANALYSE DES RISQUES</strong></td>
                <td width="3%" ><strong>Oui</strong></td>
                <td  width="4%"><strong>Non</strong></td>
                <td  width="5%"><strong>Faible</strong></td>
                <td  width="6%"><strong>Moyen</strong></td>
                <td  width="4%"><strong>Elev&eacute;</strong></td>
              </tr>
              <tr>
                <td><p><strong>1. </strong>Les capacit&eacute;s sont-elles suffisantes&nbsp;?</p></td>
            
                 <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="6">&nbsp;</td>
              </tr>
              <tr>
                <td><p>2. Les sauvegardes  sont-elles exploitables et s&ucirc;res&nbsp;:</p></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>-Les  informations sont-elles sauvegard&eacute;es int&eacute;gralement&nbsp;?</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>-Des  essais de restauration ont-ils &eacute;t&eacute; r&eacute;alis&eacute;s r&eacute;cemment&nbsp;?</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>-S&rsquo;est-on  assur&eacute; qu&rsquo;aucune perte d&rsquo;informations n&rsquo;est intervenue&nbsp;?</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>La  p&eacute;riodicit&eacute; des sauvegardes est-elle satisfaisante?</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Existe-t-il  une conservation hors site des sauvegardes&nbsp;?</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="6">&nbsp;</td>
              </tr>
              <tr>
                <td>3. Maintenance du  mat&eacute;riel&nbsp;:</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>-Les  charges d&rsquo;entretien sont-elles bien d&eacute;finies&nbsp;?</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>-Le d&eacute;lai  d&rsquo;intervention est-il convenable&nbsp;?</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>-Les  proc&eacute;dures de d&eacute;pannage sont-elles pr&eacute;vues&nbsp;?</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="6">&nbsp;</td>
              </tr>
              <tr>
                <td>4. Assurances&nbsp;:</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>-Assurance  Bris de machine sp&eacute;cifique&nbsp;?</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>-Assurance  Protection des logiciels&nbsp;?</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>-Assurance  Perte d&rsquo;exploitation&nbsp;?</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="6">&nbsp;</td>
              </tr>
              <tr>
                <td>5. S&eacute;curit&eacute;s</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>-D&eacute;g&acirc;t des  eaux&nbsp;?</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>-&nbsp;Vol&nbsp;?</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>-Acc&egrave;s aux  locaux informatiques&nbsp;?</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table>
      </div>
    </page>
    
    
    <page pageset="old">
   
      <div class="niveau" style="padding-left:70px">
      <br><br><br><br>
      
      
      <table width="946" height="633"  border="1">
        <tr>
          <td width="300"><strong>IV. LOGICIELS</strong></td>
          <td colspan="5" ><strong>RISQUES</strong></td>
        </tr>
        <tr>
          <td  width="300"><strong>ANALYSE DES RISQUES</strong></td>
          <td width="3%" ><strong>Oui</strong></td>
          <td  width="4%"><strong>Non</strong></td>
          <td  width="5%"><strong>Faible</strong></td>
          <td  width="6%"><strong>Moyen</strong></td>
          <td  width="4%"><strong>Elev&eacute;</strong></td>
        </tr>
        <tr>
          <td><p><strong>1.Organisation  et structure&nbsp;:</strong>&nbsp;?</p></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="6">-La  s&eacute;paration des fonctions est-elle adapt&eacute;e au syst&egrave;me&nbsp;</td>
        </tr>
        <tr>
          <td><p>-Les  phases de d&eacute;veloppement et d&rsquo;exploitation sont-elles bien d&eacute;finies&nbsp;?</p></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Modification  de logiciels&nbsp;:</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>-Les  modifications par les utilisateurs sont-elles nombreuses&nbsp;&nbsp;?</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>-Les  modifications par les SSII sont-elles nombreuses&nbsp;?</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>-La phase  de modification est-elle bien d&eacute;finie&nbsp;&nbsp;?</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="6">&nbsp;</td>
        </tr>
        <tr>
          <td>2. Maintenance  (voir le contrat)&nbsp;&nbsp;:</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>-L&rsquo;assistance  est-elle bien d&eacute;finie&nbsp;?</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>-Les mises  &agrave; jour sont-elles pr&eacute;vues&nbsp;?</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>-Les mises  &agrave; niveau sont-elles r&eacute;guli&egrave;res&nbsp;&nbsp;?</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="6">-Les  d&eacute;lais d&rsquo;intervention sont-ils corrects&nbsp;?</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>4. Existence  de proc&eacute;dures &eacute;crites&nbsp;:</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Existence  d&rsquo;une documentation relative&nbsp;&nbsp;:</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>-Aux  analyses&nbsp;?</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>-A la  programmation&nbsp;&nbsp;?</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="6">-A  l&rsquo;ex&eacute;cution des traitements&nbsp;?</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>5. Les  mesures li&eacute;es &agrave; la s&eacute;curit&eacute; logique (codes ou mot de passe) sont-elles&nbsp;:</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>-bien  d&eacute;finies&nbsp;&nbsp;?</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>-&nbsp;R&eacute;guli&egrave;rement  mises &agrave; jour&nbsp;&nbsp;?</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        </table><br>
      <table width="946" border="0">
          <tr>
            <td><p>Synth&egrave;se des risque</p></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </div>
      </page>

 <page pageset="old">
   
    <div class="niveau" style=" padding-left:70px">
      <br><br><br><br>
            <?php //[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[ synthese globale]]]]]]]]]]]]]]]]]]]]]]]
			function synthese(){
		$get_synthese_g =db_connect ("SELECT   DISTINCT(UTIL_ID),SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE,SCORE
		 FROM tab_synthese
		 WHERE MISSION_ID=3 AND UTIL_ID=2 AND CYCLE_ACHAT_ID=32");
		 foreach ($get_synthese_g as $val){
			  $SYNTHESE_COMMENTAIRE=$val['SYNTHESE_COMMENTAIRE']; 
			  $SYNTHESE_RISQUE=$val['SYNTHESE_RISQUE'];
			  $SCORE=$val['SCORE'];
			   	echo ' <tr>
					  <td height="23" align="center"></td>
					  <td>'.$SCORE.'</td>
					  <td>'.$SYNTHESE_RISQUE.'</td>
					  <td>'.$SYNTHESE_COMMENTAIRE.'</td>
					</tr>';
				 }
			 
			 }
		 ?>
      
      <table width="946"  border="1">
        <tr>
          <td colspan="4" align="center"><strong>RESUME  DE LA REVUE DU SYSTEME DE CONTROLE INTERNE</strong> <strong>SYSTEME  D&rsquo;INORMATIONS &ndash; FC9</strong></td>
        </tr>
        <tr>
          <td width="9%">&nbsp;</td>
          <td width="10%" align="center">SCORE</td>
          <td width="8%" align="center">RISQUE</td>
          <td width="73%" align="center">COMMENTAIRES</td>
        </tr>
        <?php synthese(); ?>
        <tr>
          <td height="23" colspan="4" align="center"><strong>SYNTHESE</strong></td>
        </tr>
        <tr>
          <td colspan="4" height="80">&nbsp;</td>
        </tr>
      </table>
    
</div>
</page>



    
</body>
</html>
