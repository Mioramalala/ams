<?php 
	@session_start();
	include("../../../connexion.php");
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
      <table width="706" height="112"  border="1" class="table">
        <tr>
          <td width="201" rowspan="2"><img src="images/HEADER.png" alt="haha" width="195" height="103"  /></td>
          <td width="489" height="64" align="left"><strong>Soci&eacute;t&eacute; : <span style="color: CMYK(0, 0, 100%, 0)"><b><?php echo $nomEntreprise; ?></b></span></strong></td>
        </tr>
        <tr>
          <td height="40" align="left">Exercice clos au : <?php $rer='SELECT MISSION_DATE_CLOTURE FROM tab_mission'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['MISSION_DATE_CLOTURE'];
																echo $dat;
															?>
		  </td>
        </tr>
    </table>
 </div>
</page_header>
 
<page_footer>
        <table  border="0" >
		   <tr> <td colspan="3" >-------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
		   </tr>
		   <tr>
                <td width="398" style="width: 300px; text-align: right">
                  <img src="images/HEADER.png" width="100px" height="20px"  />                </td>
				<td width="504" style="width: 380px; text-align:  ">
                  Evaluation des proc&eacute;dures                </td>
				<td width="75" style="width: 40px; text-align: right">
                    Page [[page_cu]]                </td>
          </tr>
        </table>
</page_footer>
    
<!--================================================================================= -->

 <div id="conteneur"  style="left:20px; top: 200px;text-align:  ; width:560px;  text-justify: newspaper; align: ">
	
<p>	<b>REPARTITION DES TACHES </b></p>
</div>
<br><br><p>	<b>Superviseur : </b>
									 <?php $re='SELECT SUPERVISEUR_NOM FROM tab_superviseur WHERE MISSION_ID="'.$_SESSION['idMission'].'"'; 
												$rps11=$bdd->query($re);
												
												while($donnee=$rps11->fetch()){
													$intervenant=$donnee['SUPERVISEUR_NOM'];
													echo $intervenant."<br>";
												}
				 				?>	 
	</p>
	
 
<div class="niveau0">

<div style="padding-right:30px;padding-left:15px;width:860px">
 <br><br>
  <table width="630"  border="1">
    <tr bordercolor="#999999">
      <td width="150">El&eacute;ments communs </td>
      <td colspan="2">Intervenants</td>
      </tr>
    <tr>
      <td colspan="3">RSCI</td>
      </tr>
    <tr>
      <td colspan="2"align="">Achats</td>
      <td width="180"><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=1 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?>
        &nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"align="">Ventes</td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=37 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?>
        &nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"align="">Immobilisations</td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=7 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?>
        &nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"align="">Stocks</td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=16 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?>
        &nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"align="">Paie</td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=21 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?>
        &nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"align="">Environnement de Contr&ocirc;le </td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=43 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?>
        &nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"align="">Syst&egrave;me d'information </td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=46 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    
    <tr>
      <td colspan="3">&nbsp;</td>
      </tr>
    <tr>
      <td colspan="3">RA</td>
      </tr>
    <tr>
      <td>Revue par cycle </td>
      <td width="278">A-Fonds propre </td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=4 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td align="">&nbsp;</td>
      <td>B-Immobilisations corporelles et incorporelles</td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=11 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td align="">&nbsp;</td>
      <td>C-Immobilisation financi&egrave;res </td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=12 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td align="">&nbsp;</td>
      <td>D-Stocks</td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=19 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td align=" ">&nbsp;</td>
      <td>E-Tr&eacute;sorerie</td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=30 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td align=" ">&nbsp;</td>
      <td>F-Charges</td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=5 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td align=" ">&nbsp;</td>
      <td>G-Produits Clients </td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=41 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td align=" ">&nbsp;</td>
      <td>H-Paie et Personnel </td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=24 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td align=" ">&nbsp;</td>
      <td>I-Imp&ocirc;ts et taxes </td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=52 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td align=" ">&nbsp;</td>
      <td>J-Emprunts et Dettes financi&egrave;res&nbsp;</td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=55 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td align=" ">&nbsp;</td>
      <td>K-D&eacute;biteurs et cr&eacute;diteurs divers </td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=59 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
	</table>
	<page pageset="old">
	<table  width="630"  border="1" style="margin-top:200px;padding-left:100px" >
    <tr>
      <td colspan="3">&nbsp;</td>
      </tr>
    <tr>
      <td width="139" align=" ">Planification </td>
      <td width="295">A-Fonds propre </td>
      <td width="174"><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=48 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>B-Immobilisations corporelles et incorporelles</td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=9 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td align=" ">&nbsp;</td>
      <td>C-Immobilisation financi&egrave;res </td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=10 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td align=" ">&nbsp;</td>
      <td>D-Stocks</td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=18 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td align=" ">&nbsp;</td>
      <td>E-Tr&eacute;sorerie</td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=29 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td align=" ">&nbsp;</td>
      <td>F-Charges</td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=4 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td align=" ">&nbsp;</td>
      <td>G-Produits Clients </td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=39 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td align=" ">&nbsp;</td>
      <td>H-Paie et Personnel </td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=23 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td align=" ">&nbsp;</td>
      <td>I-Imp&ocirc;ts et taxes </td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=51 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td align=" ">&nbsp;</td>
      <td>J-Emprunts et Dettes financi&egrave;res&nbsp;</td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=54 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td align=" ">&nbsp;</td>
      <td>K-D&eacute;biteurs et cr&eacute;diteurs divers </td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=58 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
      </tr>
    <tr>
      <td>Circularisation</td>
      <td>A-Avocats</td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=56 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>B-Banques</td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=31 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td >&nbsp;</td>
      <td>C-Fournisseurs</td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=3 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td >&nbsp;</td>
      <td>D-Clients</td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=40 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td >&nbsp;</td>
      <td>E-D&eacute;biteurs et cr&eacute;diteurs divers </td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=57 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td >RDC</td>
      <td>Fonds propre </td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=47 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Immobilisations corporelles et incorporelles</td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=13 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td >&nbsp;</td>
      <td>Immobilisation financi&egrave;res </td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=15 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td >&nbsp;</td>
      <td>Stocks</td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=20 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td >&nbsp;</td>
      <td>Tr&eacute;sorerie recettes </td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=32 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td >&nbsp;</td>
      <td>Tr&eacute;sorerie d&eacute;penses </td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=33 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td >&nbsp;</td>
      <td>Charges fournisseurs </td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=6 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td >&nbsp;</td>
      <td>Produits Clients </td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=42 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Paie et Personnel </td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=25 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Imp&ocirc;ts et taxes </td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=50 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Emprunts et Dettes financi&egrave;res&nbsp;</td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=53 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>D&eacute;biteurs et cr&eacute;diteurs divers </td>
      <td><?php $requ="SELECT a.UTIL_ID,b.UTIL_NOM FROM tab_distribution_tache a,tab_utilisateur b WHERE a.UTIL_ID=b.UTIL_ID AND a.tache_id=60 AND a.MISSION_ID='".$_SESSION['idMission']."'"; 
					$rps1=$bdd->query($requ);
					$donnee=$rps1->fetch();
					$intervenant=$donnee['UTIL_NOM'];
					echo $intervenant;
				?></td>
    </tr>
  </table>
 </page>

</div>

</div>

<div class="niveau0">

<div style="padding-right:30px;padding-left:15px;width:860px"  >
 <br><br>
  <table width="750"  border="1">
    <tr bordercolor="#999999">
      <td width="300">Domaine</td>
      <td width="60">RISQUE</td>
      <td width="300">COMMENTAIRES</td>
    </tr>
    <tr>
      <td>IMMOBILISATIONS  Corporelles, incorporelles, financi&egrave;res</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>STOCK</td>
      <td></td>
      <td></td>
      </tr>
    <tr>
      <td>VENTES -  CLIENTS</td>
      <td></td>
      <td></td>
      </tr>
    <tr>
      <td>TRESORERIE ( Depense )</td>
       <td></td>
      <td></td>
    </tr>
    <tr>
      <td>TRESORERIE ( Recette )</td>
      <td></td>
      <td></td>
      </tr>
    <tr>
      <td>ACHATS -  FOURNISSEURS</td>
      <td></td>
      <td></td>
      </tr>
    <tr>
      <td>PAIE -  PERSONNEL</td>
      <td></td>
      <td></td>
      </tr>
    <tr>
      <td>SOUS  TRAITANCE</td>
      <td></td>
      <td></td>
      </tr>
  </table>
 

</div>

</div>
</body>
</html>
