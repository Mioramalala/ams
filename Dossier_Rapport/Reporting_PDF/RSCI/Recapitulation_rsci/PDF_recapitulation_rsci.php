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
	
	$C1=$C2=$C3=$C4=$C5=$C6=$C7=$C8="";
	$R1=$R2=$R3=$R4=$R5=$R6=$R7=$R8="";
	
$GET_info=db_connect("SELECT CYCLE,SYNTHESE,RISQUE,CASE
                WHEN CYCLE='immobilisation' THEN '1'
				WHEN CYCLE='stocks' THEN '2'
				WHEN CYCLE='vente' THEN '3'
				WHEN CYCLE='tresorerie_depense' THEN '4'
				WHEN CYCLE='tresorerie_recette' THEN '5'
                WHEN CYCLE='achat' THEN '6'
                WHEN CYCLE='paie_personnel' THEN '7'
     
				ELSE '0'
				END AS 'val_cycle'
FROM tab_synthese_rsci WHERE MISSION_ID=3 AND UTIL_ID=3");	
	
	foreach ($GET_info as $val){
		$Val_cycle=$val['val_cycle'];
		//IMMOBILISATIONS
		if ($Val_cycle=1){
			 $R1=$val['SYNTHESE']; 
			 $C1=$val['RISQUE'];
			  }else{}
		//STOCKS
		 if ($Val_cycle=2){
			 $R2=$val['SYNTHESE']; 
			 $C2=$val['RISQUE'];
			  }else{}
	   //VENTES
		 if ($Val_cycle=3){
			 $R3=$val['SYNTHESE']; 
			 $C3=$val['RISQUE'];
			  }else{}
	    //tresorerie_depense
		 if ($Val_cycle=4){
			 $R4=$val['SYNTHESE']; 
			 $C4=$val['RISQUE'];
			  }else{}
		 //tresorerie_recette
		 if ($Val_cycle=5){
			 $R5=$val['SYNTHESE']; 
			 $C5=$val['RISQUE'];
			  }else{}
		 //ACHAT
		 if ($Val_cycle=6){
			 $R6=$val['SYNTHESE']; 
			 $C6=$val['RISQUE'];
			  }else{}
		//PAIE
		 if ($Val_cycle=7){
			 $R7=$val['SYNTHESE']; 
			 $C7=$val['RISQUE'];
			  }else{}
		
		
		
		
		
		
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
       /* padding-left: 5mm;*/
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
 <page_header><div style="padding-left:15px">
      <table width="800" height="115"  border="1" class="table">
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

<!--<div style="padding-right:30px;padding-left:5px;width:860px"  >-->
 <br><br>
  <table width="800"  border="1">
    <tr bordercolor="#999999">
      <td width="300">Domaine</td>
      <td width="60">RISQUE</td>
      <td width="300">COMMENTAIRES</td>
    </tr>
    <tr>
      <td>IMMOBILISATIONS  Corporelles, incorporelles, financi&egrave;res</td>
      <td><?php echo $R1;?></td>
      <td><?php echo $C1;?></td>
    </tr>
    <tr>
      <td>STOCK</td>
      <td><?php echo $R2;?></td>
      <td><?php echo $C2;?></td>
      </tr>
    <tr>
      <td>VENTES -  CLIENTS</td>
      <td><?php echo $R3;?></td>
      <td><?php echo $C3;?></td>
      </tr>
    <tr>
      <td>TRESORERIE ( Depense )</td>
       <td><?php echo $R4;?></td>
      <td><?php echo $C4;?></td>
    </tr>
    <tr>
      <td>TRESORERIE ( Recette )</td>
      <td><?php echo $R5;?></td>
      <td><?php echo $C5;?></td>
      </tr>
    <tr>
      <td>ACHATS -  FOURNISSEURS</td>
      <td><?php echo $R6;?></td>
      <td><?php echo $C6;?></td>
      </tr>
    <tr>
      <td>PAIE -  PERSONNEL</td>
      <td><?php echo $R7;?></td>
      <td><?php echo $C7;?></td>
      </tr>
    <tr>
      <td>SOUS  TRAITANCE</td>
      <td><?php echo $R8;?></td>
      <td><?php echo $C8;?></td>
      </tr>
  </table>
 
<!--
</div>
-->


</div>



</body>
</html>
