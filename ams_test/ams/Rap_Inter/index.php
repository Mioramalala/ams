<?php
//Author: Niaina

@session_start();
include '../connexion.php';

$sql = 'SELECT * FROM tab_mission WHERE MISSION_ID='.$_SESSION['idMission'];
$req = $bdd->query($sql);
$tab = $req->fetch();
$idEntreprise = $tab['ENTREPRISE_ID'];
$utilisateur=$_SESSION["user"];

include "../Dossier_Rapport/connex.php";
include "../Dossier_Rapport/Reporting_Word/fonctions_rsci.php";

if(isset($_SESSION["user"])){
		$session_utiliser=$_SESSION["user"];
		$ID_mission =$_SESSION['idMission'];
		$ID_Entreprise =get_Entreprise ($ID_mission);
		$ID_Utilisateur =get_ID_utilisateur($session_utiliser);
		}else{
		//$session_utiliser="Utilisateur";
		$session_utiliser= $_SESSION['idMission'];
		$ID_mission =$_SESSION['idMission'];
		$ID_Entreprise= get_Entreprise ($ID_mission);
		$ID_Utilisateur =get_ID_utilisateur($session_utiliser);
		}

?>

<link rel="stylesheet" href="../css/Rap_Int.css"/>
<script text="javascript" src="../js/RapInt.js"></script>
<style type="text/css">

.Rapp_rond{
	text-align:center;
	font-size:16px;
	height:40px;
	width:85px;
	background-color:#48D1CC;
	color:#fff;


	vertical-align:middle;	
	border-radius: 100px;
	padding: 4px;
	margin-right: 15px;

	transition: box-shadow 0.4s, color 0.4s,padding 0.4s; 
	-webkit-transition: box-shadow 0.4s, color 0.4s,padding 0.4s; 
	-moz-transition: box-shadow 0.4s, color 0.4s,padding 0.4s; 
	-o-transition: box-shadow 0.4s, color 0.4s,padding 0.4s;
}

.Rapp_rond:hover{
	cursor:pointer;

	box-shadow: 0 0 0 3px #1e91ad;

	animation:animRoule 0.5s linear;
	-webkit-animation:animRoule 0.5s linear; 
	-moz-animation:animRoule 0.5s linear;
	-o-animation:animRoule 0.5s linear;
}
.head {
	background-color:#2da4f4;
	font-weight: bold;
}

.slash:hover {
	background-color: #fff;

}
.s_slash:hover {
	background-color: #fff; /*eee*/

}

#zone_telechargement{

	position:relative;
	top: 10px;
	height: 400px;
	width: 300px;
	/*left: 455px;
	margin-top: -195px;*/
}
#Menu_rapport_inter{
	float: left;
	left: 250px;
	top: 100px;
	position: absolute;

}

.Sous_rdc{
	display: none;
}

.cah2{
	display: none;
}

#cahe1 :hover { 
	background-image:url(Dossier_Rapport/img/btn2.png);
	background-repeat:no-repeat;
}
.cahe2:hover:before { 
	content:" » ";
}

#zone_telechargement strong:hover { 
	cursor:  pointer;
	color: #2da4f4;
	background-repeat:no-repeat;
}
#zone_telechargement strong:hover:before {
	cursor:  pointer; 
	content:" » ";
}
strong{
	color: #ccc;
}

#Global #gauche {
	float:left;
	width:50%;
}
#Global #droite {
	margin-left:10% ;


}

</style>

<?php
	function afficherLien($nom, $idLien){
		$lien1 = verifRapportExistant($_SESSION["user"],$nom,$_SESSION['idMission']);
		//echo "lien:".$lien1;
		if(!empty($lien1)) { 
		echo "<a id='".$idLien."' href=\"includes/google_docs_viewer.php?id=Dossier_Rapport/Sauvegarde_sortie/Excel/".$lien1."&amp;nomfichier=".$lien1."\" TARGET='_BLANK'><img src='../Dossier_Rapport/img/Excel.png' height='28px' width='28px'/></a>";                        	
		}
	}
?>

<div id="Global" style="top:100px">
<div id="gauche" style="padding-top:20px; padding-left:50px;">
	<table >
		<!-- id="Rap_Int_tbl" -->
		<tr>
			<td class="Rap_rond" id="Rap_RSCI">RSCI</td>
			<td class="Rap_rond" id="Rap_RA">RA</td>
			<td class="Rap_rond" id="Rap_RDC">RDC</td>
		</tr>
		<tr>
			<td class="Rap_rond" id="Rap_In_mission">Initialisation à la mission</td>
			
			<td class="Rap_rond" id="Rap_Memor">Memorandum</td>
		</tr>
	</table>
</div>
<div id="droite"> <div id="zone_telechargement" >
		<!-- id="Sous_rsci_tbl"-->

			<!-- DEBUT Sous_Memorandum -->
			<!-- Les evenements dans le memorandum se trouvent dans C:\wamp\www\Rap_Inter\memorandum\index.php -->
                <div id="Sous_Memorandum" style="display:none" class="rapIntermediaire">
                            <table style="background:url('Dossier_Rapport/img/fong_img.png'); background-repeat:no-repeat"  width="485" height="150" border="0"  >
                                <tr><td colspan="4" align="left" ><b> > Mémorandum</b></td></tr>
                                <tr class="head"><td width="262"><div align="center"><span style="color:#fff">Titre</span></div></td> <td style="width:20%"><div align="center"><span style="color:#fff" >Document</span></div></td><td><div align="center"><span style="color:#fff">#</div></td>
                                </tr>
                                <tr class="s_slash">
                                    <td ><pre>Note de synthèse</pre></td>
                                    <td align="center" id="btn-preparer-memorandum"><strong >Preparer</strong></td>
                                    <td></td>
                                </tr>
								<tr class="s_slash">
                                    <td ></td>
                                    <td align="center" id="btn-generer-memorandum"><strong >Générer</strong></td>
                                    <td><div align="center" id="ltr_affirm_memo"></div></td>
                                </tr>
                                
                
                            </table>
                 </div>
                   <!-- FIN Sous_Memorandum -->

		<!-- ============================ RSCI =====================================-->
		<div class="div_RSCI">
			<table style="background:url('Dossier_Rapport/img/fong_img.png'); background-repeat:no-repeat"  width="485" height="112" border="0"  >
				<tr><td colspan="4" align="left" ><b> > R S C I</b></td></tr>
				<tr class="head"><td width="262"><div align="center"><span style="color:#fff">Titre</span></div></td> <td style="width:20%"><div align="center"><span style="color:#fff" >Document</span></div></td><td><div align="center"><span style="color:#fff">#</div></td>
				</tr>
				<tr class="s_slash" style="margin-top: 5px;">
					<td ><pre>FC 1 - Cycle Achat </pre></td>
					<td align="center"><strong  id="btn_ltr_cycle_achat">Générer</strong></td>
					<td><div align="center" id="ltr_cycle_achat">
						<?php $lien1 = verifRapportExistant($utilisateur,"RSCI_Cycle_Achat",$_SESSION['idMission']);
						if(!empty($lien1)) { 
							$path = "Dossier_Rapport/Sauvegarde_sortie/Word/".$lien1;
							?>							
							<a target='_blank' id="icone_achat" href="includes/google_docs_viewer.php?id= <?php echo $path ?>&amp;nomfichier=<?= $lien1 ?>" title="cliquer pour visualiser"> <img src="../Dossier_Rapport/img/telecharger.png" alt="icon" height="28px" width="28px" /> </a>
						<?php
						}
						?>    
					</div></td>
				</tr>
				<tr class="s_slash">
					<td><pre>FC 2 - Cycle Immobilisation</pre> </td>
					<td align="center"><strong  id="btn_ltr_cycle_immo">Générer</strong></td>
					<td><div align="center" id="ltr_cycle_immo">
						<?php $lien2 = verifRapportExistant($utilisateur,"RSCI_Cycle_Immobilisation",$_SESSION['idMission']);
						if(!empty($lien2)) { $path = "Dossier_Rapport/Sauvegarde_sortie/Word/".$lien1;
							?>							
							<a target='_blank' id="icone_immo" href="includes/google_docs_viewer.php?id= <?php echo $path ?>&amp;nomfichier=<?= $lien1 ?>" title="cliquer pour visualiser"> <img src="../Dossier_Rapport/img/telecharger.png" alt="icon" height="28px" width="28px" /> </a>
						<?php
						}
						?>                          
					</div></td>
				</tr>
				<tr class="s_slash">
					<td><pre>FC 3 - Cycle Stocks</pre>  </td>
					<td align="center"><strong  id="btn_ltr_rsci_stocks">Générer</strong></td>
					<td><div align="center" id="ltr_rsci_stocks">
					  <?php $lien3 = verifRapportExistant($utilisateur,"RSCI_Cycle_Stocks",$_SESSION['idMission']);
						if(!empty($lien3)) {
						$path = "Dossier_Rapport/Sauvegarde_sortie/Word/".$lien3;
							?>							
							<a target='_blank' id="icone_stock" href="includes/google_docs_viewer.php?id= <?php echo $path ?>&amp;nomfichier=<?= $lien1 ?>" title="cliquer pour visualiser"> <img src="../Dossier_Rapport/img/telecharger.png" alt="icon" height="28px" width="28px" /> </a>
						<?php
						}
						?>                               
					</div></td>
				</tr>
				<tr class="s_slash">
					<td><pre>FC 4 - Paie</pre> </td>
					<td align="center"><strong  id="btn_ltr_rsci_paie">Générer</strong></td>
					<td><div align="center" id="ltr_rsci_paie">
					<?php $lien4 = verifRapportExistant($utilisateur,"RSCI_Cycle_Paie",$_SESSION['idMission']);
						if(!empty($lien4)) { 
						$path = "Dossier_Rapport/Sauvegarde_sortie/Word/".$lien4;
							?>							
							<a target='_blank' id="icone_paie" href="includes/google_docs_viewer.php?id= <?php echo $path ?>&amp;nomfichier=<?= $lien1 ?>" title="cliquer pour visualiser"> <img src="../Dossier_Rapport/img/telecharger.png" alt="icon" height="28px" width="28px" /> </a>
						<?php
						}
					?>
					</div>
					</td>
				</tr>
				<tr class="s_slash">
					<td><pre>FC 5 - Tr&eacute;sorerie recettes </pre></td>
					<td align="center"><strong  id="btn_ltr_rsci_tr_recette">Générer</strong></td>
					<td><div align="center" id="ltr_rsci_tr_recette">
					<?php $lien5 = verifRapportExistant($utilisateur,"RSCI_Cycle_Recette",$_SESSION['idMission']);
						if(!empty($lien5)) { 
						$path = "Dossier_Rapport/Sauvegarde_sortie/Word/".$lien5;
							?>							
							<a target='_blank' id="icone_recette" href="includes/google_docs_viewer.php?id= <?php echo $path ?>&amp;nomfichier=<?= $lien1 ?>" title="cliquer pour visualiser"> <img src="../Dossier_Rapport/img/telecharger.png" alt="icon" height="28px" width="28px" /> </a>
						<?php
						}
					?>
					</div></td>
				</tr>
				<tr class="s_slash">
					<td ><pre>FC 6 - Tr&eacute;soreries depense</pre> </td>
					<td align="center"><strong  id="btn_ltr_rsci_tr_depense">Générer</strong></td>
					<td><div align="center" id="ltr_rsci_tr_depense">
					<?php $lien6 = verifRapportExistant($utilisateur,"RSCI_Cycle_Depense",$_SESSION['idMission']);
						if(!empty($lien6)) { 
							$path = "Dossier_Rapport/Sauvegarde_sortie/Word/".$lien6;
							?>							
							<a target='_blank' id="icone_depense" href="includes/google_docs_viewer.php?id= <?php echo $path ?>&amp;nomfichier=<?= $lien1 ?>" title="cliquer pour visualiser"> <img src="../Dossier_Rapport/img/telecharger.png" alt="icon" height="28px" width="28px" /> </a>
						<?php
						}
					?>
					</div>
					</td>
				</tr>
				<tr class="s_slash">
					<td><pre>FC 7 - Cycle Ventes </pre> </td>
					<td align="center"><strong  id="btn_ltr_rsci_ventes">Générer</strong></td>
					<td><div align="center" id="ltr_rsci_ventes">
					<?php $lien7 = verifRapportExistant($utilisateur,"RSCI_Cycle_Ventes",$_SESSION['idMission']);
						if(!empty($lien7)) { 
						$path = "Dossier_Rapport/Sauvegarde_sortie/Word/".$lien7;
							?>							
							<a target='_blank' id="icone_vente" href="includes/google_docs_viewer.php?id= <?php echo $path ?>&amp;nomfichier=<?= $lien1 ?>" title="cliquer pour visualiser"> <img src="../Dossier_Rapport/img/telecharger.png" alt="icon" height="28px" width="28px" /> </a>
						<?php
						}
					?>
					</div></td>
				</tr>
				<tr class="s_slash">
					<td><pre>FC 8 - Environnement de contr&ocirc;le </pre></td>
					<td align="center"><strong  id="btn_ltr_rsci_EC">Générer</strong></td>
					<td><div align="center" id="ltr_rsci_EC">
					<?php $lien8 = verifRapportExistant($utilisateur,"RSCI_Environnement_Control",$_SESSION['idMission']);
						if(!empty($lien8)) { 
						$path = "Dossier_Rapport/Sauvegarde_sortie/Word/".$lien8;
							?>							
							<a target='_blank' id="icone_env" href="includes/google_docs_viewer.php?id= <?php echo $path ?>&amp;nomfichier=<?= $lien1 ?>" title="cliquer pour visualiser"> <img src="../Dossier_Rapport/img/telecharger.png" alt="icon" height="28px" width="28px" /> </a>
						<?php
						}
					?>
					</div></td>
				</tr>
				<tr class="s_slash">
					<td><pre>FC 9 - Syst&egrave;me d&rsquo;information </pre></td>
					<td align="center"><strong  id="btn_ltr_rsci_SI">Générer</strong></td>
					<td><div align="center" id="ltr_rsci_SI">
					<?php $lien9 = verifRapportExistant($utilisateur,"RSCI_Systeme_information",$_SESSION['idMission']);
						if(!empty($lien9)) { 
						$path = "Dossier_Rapport/Sauvegarde_sortie/Word/".$lien9;
							?>							
							<a target='_blank' id="icone_info" href="includes/google_docs_viewer.php?id= <?php echo $path ?>&amp;nomfichier=<?= $lien1 ?>" title="cliquer pour visualiser"> <img src="../Dossier_Rapport/img/telecharger.png" alt="icon" height="28px" width="28px" /> </a>
						<?php
						}
					?>
					</div></td>
				</tr>
				<tr class="s_slash">
					<td><pre>FC 10 - Synthèse RSCI</pre></td>
					<td align="center"><strong  id="btn_ltr_SYNTHESE">Générer</strong></td>
					<td><div align="center" id="ltr_SYNTHESE">
					<?php $lien10 = verifRapportExistant($utilisateur,"RSCI_SYNTHESE",$_SESSION['idMission']);
						if(!empty($lien10)) { 
						$path = "Dossier_Rapport/Sauvegarde_sortie/Word/".$lien10;
							?>							
							<a target='_blank' id="icone_synthese" href="includes/google_docs_viewer.php?id= <?php echo $path ?>&amp;nomfichier=<?= $lien1 ?>" title="cliquer pour visualiser"> <img src="../Dossier_Rapport/img/telecharger.png" alt="icon" height="28px" width="28px" /> </a>
						<?php
						}
					?>
					</div></td>
				</tr>

			</table>
		</div>

		<!-- ============================ RDC =====================================-->
		<div class="Sous_rdc"><!-- id="Sous_rdc_tbl" -->
			<table style="background:url('Dossier_Rapport/img/fong_img.png'); background-repeat:no-repeat"  width="500px" height="112" border="0"  >
				<tr><td colspan="4" align="left" ><b> >  R D C</b></td></tr>
				<tr class="head"><td width="262"><div align="center"><span style="color:#fff">Titre</span></div></td> <td style="width:20%"><div align="center"><span style="color:#fff" >Document</span></div></td><td><div align="center"><span style="color:#fff">#</div></td>
				</tr>
				<tr class="s_slash">
					<td ><pre>FA 00 - CYCLE FONDS PROPRES </pre></td>
					<td align="center"><strong  id="btn_Font_propre">Générer</strong></td>
					<td><div align="center" id="Font_propre_excel">
						<?php afficherLien("Fonds_propres","icone_fondPropre"); ?>   
					</div></td>
				</tr>
				<tr class="s_slash">
					<td><pre >FE 00 - Trésorerie</pre> </td>
					<td align="center"><strong  id="btn_rdc_tresor">Générer</strong></td>
					<td><div align="center" id="rdc_tresor">
						<?php afficherLien("Tresorerie","icone_treso"); ?>  
					</div></td>
				</tr>
				<tr class="s_slash">
					<td><pre>FC 00 - Immo financières </pre>  </td>
					<td align="center"><strong  id="btn_immo_fin">Générer</strong></td>
					<td><div align="center" id="immo_fin">
						<?php afficherLien("Immo_fin","icone_Immo_fin"); ?>  
					</div></td>
				</tr>
				<tr class="s_slash">
					<td><pre>FJ 00- Emprunts et dettes financières</pre> </td>
					<td align="center"><strong  id="btn_emprunt">Générer</strong></td>
					<td><div align="center" id="emprunt">
						<?php afficherLien("Emprunt_dette","icone_emprunt"); ?>  						
					</div></td>
				</tr>
				<tr class="s_slash">
					<td><pre>FB 00 -Immo incorporelles corporelles</pre></td>
					<td align="center"><strong  id="btn_in_corp">Générer</strong></td>
					<td><div align="center" id="in_corp">
						<?php afficherLien("Immo_in_corp","icone_immoCorp"); ?>  
					</div></td>
				</tr>
				<tr class="s_slash">
					<td ><pre>FD 00 - STOCKS</pre> </td>
					<td align="center"><strong  id="btn_stock">Générer</strong></td>
					<td><div align="center" id="stock">
						<?php afficherLien("STOCKS","icone_STOCKS"); ?> 
					</div></td>
				</tr>
				<tr class="s_slash">
					<td><pre>FH 00 - Paie et personnel </pre> </td>
					<td align="center"><strong  id="btn_paie_pers">Générer</strong></td>
					<td><div align="center" id="paie_pers">
						<?php afficherLien("Paie_personnel","icone_Paie_personnel"); ?> 
					</div></td>
				</tr>
				<tr class="s_slash">
					<td><pre>FK 00 - Débiteurs et créditeurs divers </pre></td>
					<td align="center"><strong  id="btn_deb_cred">Générer</strong></td>
					<td><div align="center" id="deb_cred">
						<?php afficherLien("Debiteurs_crediteurs","icone_Debiteurs_crediteurs"); ?> 
					</div></td>
				</tr>
				<tr class="s_slash">
					<td><pre>FG 00 - Produit Client </pre></td>
					<td align="center"><strong  id="btn_prod_cli">Générer</strong></td>
					<td><div align="center" id="prod_cli">
						<?php afficherLien("Produits_clients","icone_Produits_clients"); ?> 
					</div></td>
				</tr>

				<tr class="s_slash">
					<td><pre>FF 00 - Charges fournisseurs</pre></td>
					<td align="center"><strong  id="btn_chrg_frs">Générer</strong></td>
					<td><div align="center" id="chrg_frs">
						<?php afficherLien("Charges_fournisseurs","icone_Charges_fournisseurs"); ?> 
					</div></td>
				</tr><tr class="s_slash">
					<td><pre>FI 00 - Impôts et taxes</pre></td>
					<td align="center"><strong  id="btn_impot_taxe">Générer</strong></td>
					<td><div align="center" id="impot_taxe">
						<?php afficherLien("Impots_taxes","icone_Impots_taxes"); ?> 
					</div></td>
				</tr>

			</table>



		</div>

		<!-- ============================= RA ===================================== -->
		<div id="Sous_RA">

			<table style="background:url('Dossier_Rapport/img/fong_img.png'); background-repeat:no-repeat"  width="485" height="112" border="0"  >
				<tr><td colspan="4" align="left" ><b> > R A</b></td></tr>
				<tr class="head"><td width="262"><div align="center"><span style="color:#fff">Titre</span></div></td> <td style="width:20%"><div align="center"><span style="color:#fff" >Document</span></div></td><td><div align="center"><span style="color:#fff">#</div></td>
				</tr>
				<tr class="s_slash">
					<td ><pre>Synth&egrave;se risques conception syst&egrave;mes  </pre></td>
					<td align="center"><strong  id="btn_synthese_risques">Générer</strong></td>
					<td><div align="center" id="synthese_risque">
						<?php $lien1 = verifRapportExistant($utilisateur,"SYNTHESE_RISQUES_CONCEPTION_SYSTEMES",$_SESSION['idMission']);
						if(!empty($lien1)) { 
							$path = "Dossier_Rapport/Sauvegarde_sortie/Word/".$lien1;
						?>							
							<a target='_blank' id="icone_risque" href="includes/google_docs_viewer.php?id= <?php echo $path ?>&amp;nomfichier=<?= $lien1 ?>" title="cliquer pour visualiser"> <img src="../Dossier_Rapport/img/telecharger.png" alt="icon" height="28px" width="28px" /> </a>
						<?php
						}
						?>                           
					</div></td>
				</tr>
				<tr class="s_slash">
					<td><pre>Incidences</pre> </td>
					<td align="center"><strong  id="btn_incidences">Générer</strong></td>
					<td><div align="center" id="incidences">
						<?php $lien1 = verifRapportExistant($utilisateur,"INCIDENCES",$_SESSION['idMission']);
						if(!empty($lien1)) { 
							$path = "Dossier_Rapport/Sauvegarde_sortie/Word/".$lien1;
						?>							
							<a target='_blank' id="icone_incidences" href="includes/google_docs_viewer.php?id= <?php echo $path ?>&amp;nomfichier=<?= $lien1 ?>" title="cliquer pour visualiser"> <img src="../Dossier_Rapport/img/telecharger.png" alt="icon" height="28px" width="28px" /> </a>
						<?php
						}
						?>                              
					</div></td>
				</tr>
				<tr class="s_slash">
					<td><pre>Seuil de signification</pre> </td>
					<td align="center"><strong  id="btn_seuil_signification">Générer</strong></td>
					<td><div align="center" id="seuil_signification">
						 <?php $lien1 = verifRapportExistant($utilisateur,"SEUIL_SIGNIFICATION",$_SESSION['idMission']);
						if(!empty($lien1)) { 
							$path = "Dossier_Rapport/Sauvegarde_sortie/Word/".$lien1;
						?>
                        <a target='_blank' id="icone_seuil" href="includes/google_docs_viewer.php?id= <?php echo $path ?>&amp;nomfichier=<?= $lien1 ?>" title="cliquer pour visualiser"> <img src="../Dossier_Rapport/img/telecharger.png" alt="icon" height="28px" width="28px" /> </a>
						<?php
						}
						?>                           
					</div></td>
				</tr>
				<tr class="s_slash">
					<td><pre>Taux de sondage</pre> </td>
					<td align="center"><strong  id="btn_taux_sondage">Générer</strong></td>
					<td><div align="center" id="taux_sondage">
						<?php $lien1 = verifRapportExistant($utilisateur,"TAUX_SONDAGE",$_SESSION['idMission']);
						if(!empty($lien1)) { 
							$path = "Dossier_Rapport/Sauvegarde_sortie/Word/".$lien1;
						?>							
							<a target='_blank' id="icone_sondage" href="includes/google_docs_viewer.php?id= <?php echo $path ?>&amp;nomfichier=<?= $lien1 ?>" title="cliquer pour visualiser"> <img src="../Dossier_Rapport/img/telecharger.png" alt="icon" height="28px" width="28px" /> </a>
						<?php
						}
						?>                                
					</div></td>
				</tr>
				<tr class="s_slash">
					<td><pre>Planification g&eacute;n&eacute;rale</pre> </td>
					<td align="center"><strong  id="btn_planification_generale">Générer</strong></td>
					<td><div align="center" id="planification_generale">
						<?php $lien1 = verifRapportExistant($utilisateur,"Planification_generale",$_SESSION['idMission']);
						if(!empty($lien1)) { 
							$path = "Dossier_Rapport/Sauvegarde_sortie/Word/".$lien1;
						?>							
							<a target='_blank' id="icone_planif" href="includes/google_docs_viewer.php?id= <?php echo $path ?>&amp;nomfichier=<?= $lien1 ?>" title="cliquer pour visualiser"> <img src="../Dossier_Rapport/img/telecharger.png" alt="icon" height="28px" width="28px" /> </a>
						<?php
						}
						?>   
					</div></td>
				</tr>
				<tr class="s_slash">
					<td><pre>Revues analytique </pre>  </td>
					<td align="center"><strong  id="btn_revues_analytique">Générer</strong></td>
					<td><div align="center" id="revues_analytique">
						<?php $lien1 = verifRapportExistant($utilisateur,"Revues_analytiques",$_SESSION['idMission']);
						if(!empty($lien1)) { 
							$path = "Dossier_Rapport/Sauvegarde_sortie/Word/".$lien1;
						?>							
							<a target='_blank' id="icone_ra" href="includes/google_docs_viewer.php?id= <?php echo $path ?>&amp;nomfichier=<?= $lien1 ?>" title="cliquer pour visualiser"> <img src="../Dossier_Rapport/img/Excel.png" alt="icon" height="28px" width="28px" /> </a>
						<?php
						}
						?>                             
					</div></td>
				</tr>
			</table>
		</div>	
		<!-- ============================= Mission ===================================== -->

		<div id="Sous_Rap_In_mission">
			<table style="background:url('Dossier_Rapport/img/fong_img.png'); background-repeat:no-repeat"  width="485" height="112" border="0"  >
				<tr><td colspan="4" align="left" ><b> > Initialisation &agrave; la mission </b></td></tr>
				<tr class="head"><td width="262"><div align="center"><span style="color:#fff">Titre</span></div></td> <td style="width:20%"><div align="center"><span style="color:#fff" >Document</span></div></td><td><div align="center"><span style="color:#fff">#</div></td>
				</tr>
				<tr class="s_slash">
					<td ><pre>Lettre d&rsquo;affirmation  </pre></td>
					<td align="center">
   <strong id="btn_ltr_affirm" onClick="enregistrerGeneration(<?php echo($_SESSION['idMission']); ?>,'affirmation');">Générer</strong></td>
 
					<td><div align="center" id="ltr_affirm">

					<?php $lien10 = verifRapportExistant($utilisateur,"LETTRE_AFFIRMATION",$_SESSION['idMission']);
						if(!empty($lien10)) { 
					$path = "Dossier_Rapport/Sauvegarde_sortie/Word/".$lien10;
						?>							
							<a target='_blank' id="icone_affirm" href="includes/google_docs_viewer.php?id= <?php echo $path ?>&amp;nomfichier=<?= $lien1 ?>" title="cliquer pour visualiser"> <img src="../Dossier_Rapport/img/telecharger.png" alt="icon" height="28px" width="28px" /> </a>
						<?php
						}
					?>

					</div></td>
				</tr>
				<tr class="s_slash">
					<td><pre>Lettre de mission</pre> </td>
					<td align="center"><strong  id="btn_ltr_mission" onClick="enregistrerGeneration(<?php echo($_SESSION['idMission']); ?>,'mission');">Générer</strong></td>
					<td><div align="center" id="ltr_mission">						

					<?php $lien11 = verifRapportExistant($utilisateur,"LETTRE_MISSION",$_SESSION['idMission']);
						if(!empty($lien11)) { 
						$path = "Dossier_Rapport/Sauvegarde_sortie/Word/".$lien11;
						?>							
							<a target='_blank' id="icone_mission" href="includes/google_docs_viewer.php?id= <?php echo $path ?>&amp;nomfichier=<?= $lien1 ?>" title="cliquer pour visualiser"> <img src="../Dossier_Rapport/img/telecharger.png" alt="icon" height="28px" width="28px" /> </a>
						<?php
						}
					?>

					</div></td>
				</tr>
				<tr class="s_slash">
					<td><pre>R&eacute;partition des t&acirc;ches</pre>  </td>
					<td align="center"><strong  id="btn_ltr_repartition" onClick="enregistrerGeneration(<?php echo($_SESSION['idMission']); ?>,'mission');">Générer</strong></td>
					<td><div align="center" id="ltr_repartition">
						
					<?php $lien12 = verifRapportExistant($utilisateur,"REPARTITION_TACHE",$_SESSION['idMission']);
						if(!empty($lien12)) { 
						$path = "Dossier_Rapport/Sauvegarde_sortie/Word/".$lien12;
						?>							
							<a target='_blank' id="icone_tache" href="includes/google_docs_viewer.php?id= <?php echo $path ?>&amp;nomfichier=<?= $lien1 ?>" title="cliquer pour visualiser"> <img src="../Dossier_Rapport/img/telecharger.png" alt="icon" height="28px" width="28px" /> </a>
						<?php
						}
					?>


					</div></td>
				</tr>

			</table>
		</div>


	</div>  </div>
	
<!-- Preparation memorandum -->
<?php include("memorandum/index.php"); ?>
<!-- Fin preparation memorandum -->

</div>
<!--</center> -->

<script type="text/javascript" src="../Dossier_Rapport/js_telechargement/all_js_telechargement.js" ></script>
<script type="text/javascript" src="../Dossier_Rapport/js_telechargement/Event_page.js" ></script>

<script type="text/javascript">             
function enregistrerGeneration(idEntreprise,type){
	$.ajax({
		type:'post',
		url:'enregistrerGeneration.php',
		data:{idEnt:idEntreprise,typeGen:type}
	});
}


</script>
