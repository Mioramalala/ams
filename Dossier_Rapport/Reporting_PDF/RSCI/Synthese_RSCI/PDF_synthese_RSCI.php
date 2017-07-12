<?php
@session_start();
include('../../../../connexion.php');
$date_entete=date('d-m-Y');

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
      <table width="603" height="115"  border="1" class="table">
        <tr>
          <td colspan="2"><b>Client</b><br><span style="color: CMYK(0, 0, 100%, 0)"><b><h4><?php $reps="select DISTINCT(m.ENTREPRISE_ID),m.MISSION_ANNEE,e.ENTREPRISE_DENOMINATION_SOCIAL 
										 from tab_mission m,tab_entreprise e,tab_objectif o
										  where m.MISSION_ID='".$_SESSION['idMission']."' 
												and m.ENTREPRISE_ID=e.ENTREPRISE_ID
												and o.MISSION_ID=m.MISSION_ID
												";
											
									  $rps=$bdd->query($reps);
										$donnee=$rps->fetch();
										$soc=$donnee['ENTREPRISE_DENOMINATION_SOCIAL'];
										echo $soc;
									?></h4></b></span></td>
          <td width="163" align="center"><strong>SYNTHESE RISQUES <br>CONCEPTION <br>SYSTEME </strong></td>
          <td width="169"><b>CODE</b><br>
            <br>
          <span style="color: CMYK(0, 0, 100%, 0)">FC OI 1 </span></td>
        </tr>
        <tr>
          <td width="145"><b>COLLABORATEUR</b></td>
          <td width="98"><?php $re1='SELECT DISTINCT UTIL_NOM FROM tab_utilisateur a,tab_distribution_tache b WHERE 
				   							   a.UTIL_ID=b.UTIL_ID
											   AND MISSION_ID="'.$_SESSION['idMission'].'" 
											   AND tache_id=21';
														$rps1=$bdd->query($re1);
														
														while($donnee=$rps1->fetch()){
															$intervenant1=$donnee['UTIL_NOM'];
															echo $intervenant1."<br>";
														}
					?></td>
          <td rowspan="2" align="center"><strong>Cabinet <br>
          CATEIN</strong></td>
          <td>FOLIO [[page_cu]]/[[page_nb]]</td>
        </tr>
        <tr>
          <td> <b> SUPERVISION</b></td>
          <td><?php $re='SELECT SUPERVISEUR_NOM FROM tab_superviseur WHERE MISSION_ID="'.$_SESSION['idMission'].'"'; 
												$rps11=$bdd->query($re);
												
												while($donnee=$rps11->fetch()){
													$intervenant=$donnee['SUPERVISEUR_NOM'];
													echo $intervenant."<br>";
												}
				?></td>
          <td><b>DATE	 <span style="color: CMYK(0, 0, 100%, 0)"><?php echo $date_entete; ?></span></b></td></tr>
    </table>
 </div>
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

<br><br><br><br>
   
      <div class="niveau" style="padding-left:20px"><br>
        <br><br>
       
      
      <table width="732"   border="1">
        <tr>
          <td colspan="11"><p><b>Ce tableau  permet d&rsquo;affecter un niveau de risque aux objectifs de chaque domaine.</b></p><br>
          L&rsquo;&eacute;valuation  du risque peut &ecirc;tre r&eacute;alis&eacute;e &agrave; partir des crit&egrave;res suivants&nbsp;:<br>
          RISQUE FAIBLE  (F)<br>
RISQUE MOYEN  (M)<br>
RISQUE ELEVE  (E)</td>
        </tr>
        <tr>
          <td  width="145">DOMAINE</td>
          <td  width="62">Caract&egrave;re<br>  
          significa. <br>fonction</td>
          <td  width="56">Exhausti-<br>vit&eacute;          </td>
          <td  width="41">R&eacute;alit&eacute;</td>
          <td  width="56">Propri&eacute;t&eacute;</td>
          <td  width="50">Evalua-<br>tion<br> correcte          </td>
          <td  width="52">Enregist <br> bonne <br>p&eacute;riode</td>
          <td width="50" >Imputa-<br>
          tion <br> correcte</td>
          <td  width="48">Totali-<br>
          sation</td>
          <td  width="51">Bonne <br> 
          informa-<br>tion</td>
          <td  width="58"><strong>Risque  global fonction</strong></td>
        </tr>
        <tr>
          <td><p >IMMOBILISATIONS <br>Corporelles et incorp. <br>Financi&egrave;res</p>
          </td>
          <td> <?php $rer='SELECT CARACTERE FROM tab_synthese_rsci_ra where DOMAINE="IMMOBILISATIONS Corporelles, incorporelles, financières" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['CARACTERE'];
																echo $dat;
															?>&nbsp;</td>
          <td><?php $rer='SELECT EXHAUSTIVITE FROM tab_synthese_rsci_ra where DOMAINE="IMMOBILISATIONS Corporelles, incorporelles, financières" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['EXHAUSTIVITE'];
																echo $dat;
															?>&nbsp;</td>
          <td><?php $rer='SELECT REALITE FROM tab_synthese_rsci_ra where DOMAINE="IMMOBILISATIONS Corporelles, incorporelles, financières" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['REALITE'];
																echo $dat;
															?>&nbsp;</td>
          <td><?php $rer='SELECT PROPRIETE FROM tab_synthese_rsci_ra where DOMAINE="IMMOBILISATIONS Corporelles, incorporelles, financières" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['PROPRIETE'];
																echo $dat;
															?>&nbsp;</td>
          <td><?php $rer='SELECT EVALUATION_CORRECTE FROM tab_synthese_rsci_ra where DOMAINE="IMMOBILISATIONS Corporelles, incorporelles, financières" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['EVALUATION_CORRECTE'];
																echo $dat;
															?>&nbsp;</td>
          <td><?php $rer='SELECT ENREGISTREMENT_BP FROM tab_synthese_rsci_ra where DOMAINE="IMMOBILISATIONS Corporelles, incorporelles, financières" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['ENREGISTREMENT_BP'];
																echo $dat;
															?>&nbsp;</td>
          <td><?php $rer='SELECT IMPUTATION_CORRECTE FROM tab_synthese_rsci_ra where DOMAINE="IMMOBILISATIONS Corporelles, incorporelles, financières" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['IMPUTATION_CORRECTE'];
																echo $dat;
															?>&nbsp;</td>
          <td><?php $rer='SELECT TOTALISATION FROM tab_synthese_rsci_ra where DOMAINE="IMMOBILISATIONS Corporelles, incorporelles, financières" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['TOTALISATION'];
																echo $dat;
															?>&nbsp;</td>
          <td><?php $rer='SELECT BONNE_INFORMATION FROM tab_synthese_rsci_ra where DOMAINE="IMMOBILISATIONS Corporelles, incorporelles, financières" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['BONNE_INFORMATION'];
																echo $dat;
															?>&nbsp;</td>
          <td><?php $rer='SELECT RISQUE_GF FROM tab_synthese_rsci_ra where DOMAINE="IMMOBILISATIONS Corporelles, incorporelles, financières" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['RISQUE_GF'];
																echo $dat;
															?>&nbsp;</td>
        </tr>
        <tr>
          <td>STOCK</td>
          <td><?php $rer='SELECT CARACTERE FROM tab_synthese_rsci_ra where DOMAINE="STOCK" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['CARACTERE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT EXHAUSTIVITE FROM tab_synthese_rsci_ra where DOMAINE="STOCK" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['EXHAUSTIVITE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT REALITE FROM tab_synthese_rsci_ra where DOMAINE="STOCK" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['REALITE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT PROPRIETE FROM tab_synthese_rsci_ra where DOMAINE="STOCK" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['PROPRIETE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT EVALUATION_CORRECTE FROM tab_synthese_rsci_ra where DOMAINE="STOCK" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['EVALUATION_CORRECTE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT ENREGISTREMENT_BP FROM tab_synthese_rsci_ra where DOMAINE="STOCK" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['ENREGISTREMENT_BP'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT IMPUTATION_CORRECTE FROM tab_synthese_rsci_ra where DOMAINE="STOCK" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['IMPUTATION_CORRECTE'];
																echo $dat;
															?></td>
           <td><?php $rer='SELECT TOTALISATION FROM tab_synthese_rsci_ra where DOMAINE="STOCK" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['TOTALISATION'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT BONNE_INFORMATION FROM tab_synthese_rsci_ra where DOMAINE="STOCK" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['BONNE_INFORMATION'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT RISQUE_GF FROM tab_synthese_rsci_ra where DOMAINE="STOCK" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['RISQUE_GF'];
																echo $dat;
															?></td>
        </tr>
        <tr>
          <td>VENTES -  CLIENTS</td>
          <td><?php $rer='SELECT CARACTERE FROM tab_synthese_rsci_ra where DOMAINE="VENTES - CLIENTS" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['CARACTERE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT EXHAUSTIVITE FROM tab_synthese_rsci_ra where DOMAINE="VENTES - CLIENTS" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['EXHAUSTIVITE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT REALITE FROM tab_synthese_rsci_ra where DOMAINE="VENTES - CLIENTS" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['REALITE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT PROPRIETE FROM tab_synthese_rsci_ra where DOMAINE="VENTES - CLIENTS" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['PROPRIETE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT EVALUATION_CORRECTE FROM tab_synthese_rsci_ra where DOMAINE="VENTES - CLIENTS" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['EVALUATION_CORRECTE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT ENREGISTREMENT_BP FROM tab_synthese_rsci_ra where DOMAINE="VENTES - CLIENTS" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['ENREGISTREMENT_BP'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT IMPUTATION_CORRECTE FROM tab_synthese_rsci_ra where DOMAINE="VENTES - CLIENTS" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['IMPUTATION_CORRECTE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT TOTALISATION FROM tab_synthese_rsci_ra where DOMAINE="VENTES - CLIENTS" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['TOTALISATION'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT BONNE_INFORMATION FROM tab_synthese_rsci_ra where DOMAINE="VENTES - CLIENTS" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['BONNE_INFORMATION'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT RISQUE_GF FROM tab_synthese_rsci_ra where DOMAINE="VENTES - CLIENTS" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['RISQUE_GF'];
																echo $dat;
															?></td>
        </tr>
        <tr>
          <td>TRESORERIE</td>
          <td><?php $rer='SELECT CARACTERE FROM tab_synthese_rsci_ra where DOMAINE="TRESORERIE" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['CARACTERE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT EXHAUSTIVITE FROM tab_synthese_rsci_ra where DOMAINE="TRESORERIE" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['EXHAUSTIVITE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT REALITE FROM tab_synthese_rsci_ra where DOMAINE="TRESORERIE" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['REALITE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT PROPRIETE FROM tab_synthese_rsci_ra where DOMAINE="TRESORERIE" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['PROPRIETE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT EVALUATION_CORRECTE FROM tab_synthese_rsci_ra where DOMAINE="TRESORERIE" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['EVALUATION_CORRECTE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT ENREGISTREMENT_BP FROM tab_synthese_rsci_ra where DOMAINE="TRESORERIE" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['ENREGISTREMENT_BP'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT IMPUTATION_CORRECTE FROM tab_synthese_rsci_ra where DOMAINE="TRESORERIE" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['IMPUTATION_CORRECTE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT TOTALISATION FROM tab_synthese_rsci_ra where DOMAINE="TRESORERIE" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['TOTALISATION'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT BONNE_INFORMATION FROM tab_synthese_rsci_ra where DOMAINE="TRESORERIE" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['BONNE_INFORMATION'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT RISQUE_GF FROM tab_synthese_rsci_ra where DOMAINE="TRESORERIE" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['RISQUE_GF'];
																echo $dat;
															?></td>
        </tr>
        <tr>
          <td>ACHATS  - <br>FOURNISSEURS</td>
          <td><?php $rer='SELECT CARACTERE FROM tab_synthese_rsci_ra where DOMAINE="ACHATS - FOURNISSEURS" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['CARACTERE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT EXHAUSTIVITE FROM tab_synthese_rsci_ra where DOMAINE="ACHATS - FOURNISSEURS" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['EXHAUSTIVITE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT REALITE FROM tab_synthese_rsci_ra where DOMAINE="ACHATS - FOURNISSEURS" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['REALITE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT PROPRIETE FROM tab_synthese_rsci_ra where DOMAINE="ACHATS - FOURNISSEURS" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['PROPRIETE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT EVALUATION_CORRECTE FROM tab_synthese_rsci_ra where DOMAINE="ACHATS - FOURNISSEURS" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['EVALUATION_CORRECTE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT ENREGISTREMENT_BP FROM tab_synthese_rsci_ra where DOMAINE="ACHATS - FOURNISSEURS" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['ENREGISTREMENT_BP'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT IMPUTATION_CORRECTE FROM tab_synthese_rsci_ra where DOMAINE="ACHATS - FOURNISSEURS" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['IMPUTATION_CORRECTE'];
																echo $dat;
															?></td>
           <td><?php $rer='SELECT TOTALISATION FROM tab_synthese_rsci_ra where DOMAINE="VENTES - CLIENTS" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['TOTALISATION'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT BONNE_INFORMATION FROM tab_synthese_rsci_ra where DOMAINE="ACHATS - FOURNISSEURS" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['BONNE_INFORMATION'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT RISQUE_GF FROM tab_synthese_rsci_ra where DOMAINE="ACHATS - FOURNISSEURS" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['RISQUE_GF'];
																echo $dat;
															?></td>
        </tr>
        <tr>
          <td>PAIE  -PERSONNEL</td>
          <td><?php $rer='SELECT CARACTERE FROM tab_synthese_rsci_ra where DOMAINE="PAIE - PERSONNEL" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['CARACTERE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT EXHAUSTIVITE FROM tab_synthese_rsci_ra where DOMAINE="PAIE - PERSONNEL" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['EXHAUSTIVITE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT REALITE FROM tab_synthese_rsci_ra where DOMAINE="PAIE - PERSONNEL" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['REALITE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT PROPRIETE FROM tab_synthese_rsci_ra where DOMAINE="PAIE - PERSONNEL" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['PROPRIETE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT EVALUATION_CORRECTE FROM tab_synthese_rsci_ra where DOMAINE="PAIE - PERSONNEL" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['EVALUATION_CORRECTE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT ENREGISTREMENT_BP FROM tab_synthese_rsci_ra where DOMAINE="PAIE - PERSONNEL" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['ENREGISTREMENT_BP'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT IMPUTATION_CORRECTE FROM tab_synthese_rsci_ra where DOMAINE="PAIE - PERSONNEL" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['IMPUTATION_CORRECTE'];
																echo $dat;
															?></td>
           <td><?php $rer='SELECT TOTALISATION FROM tab_synthese_rsci_ra where DOMAINE="PAIE - PERSONNEL" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['TOTALISATION'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT BONNE_INFORMATION FROM tab_synthese_rsci_ra where DOMAINE="PAIE - PERSONNEL" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['BONNE_INFORMATION'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT RISQUE_GF FROM tab_synthese_rsci_ra where DOMAINE="PAIE - PERSONNEL" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['RISQUE_GF'];
																echo $dat;
															?></td>
        </tr>
        <tr>
          <td>SOUS  TRAITANCE</td>
          <td><?php $rer='SELECT CARACTERE FROM tab_synthese_rsci_ra where DOMAINE="SOUS TRAITANCE" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['CARACTERE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT EXHAUSTIVITE FROM tab_synthese_rsci_ra where DOMAINE="SOUS TRAITANCE" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['EXHAUSTIVITE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT REALITE FROM tab_synthese_rsci_ra where DOMAINE="SOUS TRAITANCE" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['REALITE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT PROPRIETE FROM tab_synthese_rsci_ra where DOMAINE="SOUS TRAITANCE" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['PROPRIETE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT EVALUATION_CORRECTE FROM tab_synthese_rsci_ra where DOMAINE="SOUS TRAITANCE" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['EVALUATION_CORRECTE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT ENREGISTREMENT_BP FROM tab_synthese_rsci_ra where DOMAINE="SOUS TRAITANCE" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['ENREGISTREMENT_BP'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT IMPUTATION_CORRECTE FROM tab_synthese_rsci_ra where DOMAINE="SOUS TRAITANCE" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['IMPUTATION_CORRECTE'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT TOTALISATION FROM tab_synthese_rsci_ra where DOMAINE="SOUS TRAITANCE" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['TOTALISATION'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT BONNE_INFORMATION FROM tab_synthese_rsci_ra where DOMAINE="SOUS TRAITANCE" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['BONNE_INFORMATION'];
																echo $dat;
															?></td>
          <td><?php $rer='SELECT RISQUE_GF FROM tab_synthese_rsci_ra where DOMAINE="SOUS TRAITANCE" AND MISSION_ID="'.$_SESSION['idMission'].'"'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['RISQUE_GF'];
																echo $dat;
															?></td>
        </tr>
        <tr>
          <td colspan="11"><p>CONCLUSIONS&nbsp;:</p>
            <p><strong>RISQUES LIES A LA CONCEPTION DES SYSTEMES</strong>&nbsp;:<strong><em> FAIBLE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; MOYEN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  ELEVE</em></strong></p>
          <p>&nbsp;</p></td>
        </tr>
        </table>
      <br>
   </div>


<!--===============================================================================================================================
-->  


</body>
</html>
