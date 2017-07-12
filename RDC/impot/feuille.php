<?php @session_start();
$mission_id=@$_SESSION['idMission'];
	include '../../connexion.php';
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="../RDC/impot/impot.css">
		<script type="text/javascript" src="../../js/jquery-1.7.2.js"></script>
		<script type="text/javascript">

			// Droit cycle by Tolotra
	        // Page : RDC -> Impots et taxes
	        // Tâche : Impots et taxes, 50
	        $.ajax(
	            {
	                type: 'POST',
	                url: 'droitCycle.php',
	                data: {task_id: 50},
	                success: function (e) {
	                    var result = 0 === Number(e);
	                    $("#synthese_feuille").attr('disabled', result);
	                }
	            }
	        );
		
			$("#RPP").click(function(){
				$("#contenue").load("RDC/impot/accIT.php");
			});
			
			$('#synthese_feuille').click(function(){
				$('#contenue').load("RDC/impot/synthese_impot.php");
			});
			$('#coh1').click(function(){
				$('#contenue').load("RDC/impot/impotA/objetAIT1.php?coherence_visible=OK");
			});
			$('#coh11').click(function(){
				$('#contenue').load("RDC/impot/impotA/objetAIT1.php?coherence_visible=OK");
			});
			$('#coh12').click(function(){
				$('#contenue').load("RDC/impot/impotA/objetAIT2.php?coherence_visible=OK");
			});
			$('#exhaust1').click(function(){
				$('#contenue').load("RDC/impot/impotB/objetBIT1.php?exhaustivite_visible=OK");
			});
			$('#reg1').click(function(){
				$('#contenue').load("RDC/impot/impotC/objetCIT1.php?regularite_visible=OK");
			});
			$('#reg11').click(function(){
				$('#contenue').load("RDC/impot/impotC/objetCIT1.php?regularite_visible=OK");
			});
			$('#reg2').click(function(){
				$('#contenue').load("RDC/impot/impotC/objetCIT2.php?regularite_visible=OK");
			});
			$('#reg22').click(function(){
				$('#contenue').load("RDC/impot/impotC/objetCIT2.php?regularite_visible=OK");
			});
			$('#exist1').click(function(){
				$('#contenue').load("RDC/impot/impotD/objetDIT1.php?existence_visible=OK");
			});
			$('#exist11').click(function(){
				$('#contenue').load("RDC/impot/impotD/objetDIT1.php?existence_visible=OK");
			});
			$('#exist111').click(function(){
				$('#contenue').load("RDC/impot/impotD/objetDIT1.php?existence_visible=OK");
			});
			$('#exist1111').click(function(){
				$('#contenue').load("RDC/impot/impotD/objetDIT1.php?existence_visible=OK");
			});
			$('#eval1').click(function(){
				$('#contenue').load("RDC/impot/impotE/objetEIT1.php?evaluation_visible=OK");
			});
			$('#eval11').click(function(){
				$('#contenue').load("RDC/impot/impotE/objetEIT1.php?evaluation_visible=OK");
			});
			$('#rattach1').click(function(){
				$('#contenue').load("RDC/impot/impotF/objetFIT1.php?rattachement_visible=OK");
			});
			$('#rattach2').click(function(){
				$('#contenue').load("RDC/impot/impotF/objetFIT2.php?rattachement_visible=OK");
			});
			$('#rattach22').click(function(){
				$('#contenue').load("RDC/impot/impotF/objetFIT2.php?rattachement_visible=OK");
			});
			$('#rattach222').click(function(){
				$('#contenue').load("RDC/impot/impotF/objetFIT2.php?rattachement_visible=OK");
			});
			$('#rattach2222').click(function(){
				$('#contenue').load("RDC/impot/impotF/objetFIT2.php?rattachement_visible=OK");
			});
			$('#jurid1').click(function(){
				$('#contenue').load("RDC/impot/impotG/objetGIT1.php?juridique_visible=OK");
			});
			$('#jurid2').click(function(){
				$('#contenue').load("RDC/impot/impotG/objetGIT2.php?juridique_visible=OK");
			});
			$('#jurid22').click(function(){
				$('#contenue').load("RDC/impot/impotG/objetGIT2.php?juridique_visible=OK");
			});
			$('#jurid222').click(function(){
				$('#contenue').load("RDC/impot/impotG/objetGIT2.php?juridique_visible=OK");
			});
			$('#jurid2222').click(function(){
				$('#contenue').load("RDC/impot/impotG/objetGIT2.php?juridique_visible=OK");
			});
			$('#jurid22222').click(function(){
				$('#contenue').load("RDC/impot/impotG/objetGIT2.php?juridique_visible=OK");
			});
			$('#jurid222222').click(function(){
				$('#contenue').load("RDC/impot/impotG/objetGIT2.php?juridique_visible=OK");
			});
			$('#jurid2222222').click(function(){
				$('#contenue').load("RDC/impot/impotG/objetGIT2.php?juridique_visible=OK");
			});
			$('#jurid22222222').click(function(){
				$('#contenue').load("RDC/impot/impotG/objetGIT2.php?juridique_visible=OK");
			});
			$('#info1').click(function(){
				$('#contenue').load("RDC/impot/impotH/objetHIT1.php?information_visible=OK");
			});
			$('#info11').click(function(){
				$('#contenue').load("RDC/impot/impotH/objetHIT1.php?information_visible=OK");
			});
			$('#info2').click(function(){
				$('#contenue').load("RDC/impot/impotH/objetHIT2a.php?information_visible=OK");
			});
			$('#info3').click(function(){
				$('#contenue').load("RDC/impot/impotH/objetHIT2b.php?information_visible=OK");
			});
			$('#info33').click(function(){
				$('#contenue').load("RDC/impot/impotH/objetHIT2b.php?information_visible=OK");
			});
			$('#info333').click(function(){
				$('#contenue').load("RDC/impot/impotH/objetHIT2b.php?information_visible=OK");
			});
			$('#info3333').click(function(){
				$('#contenue').load("RDC/impot/impotH/objetHIT2b.php?information_visible=OK");
			});
			
		</script>
	</head>

	<body>
		<div id="GranTitre">FEUILLE MAITRESSE</div>
		<div class="fm-titre">
			<table width="100%">
				<tr class="sous-titre">
					<td width="20%">Objectifs d'audit</td>
					<td width="40%">Questions/Tests</td>
					<td width="10%">Réponses</td>
					<td width="30%">Commentaires</td>
				</tr>
			</table>
		</div>

		<div class="cadre-fm">
			<div class="fm">
				<table width="100%">
					<?php
						include '../../connexion.php';	
						
						$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="A" and RDC_RANG=1 and MISSION_ID='.$mission_id);
						$donnees1=$reponse1->fetch();
						
						$reponse1=$donnees1['RDC_REPONSE'];
						$commentaire1=$donnees1['RDC_COMMENTAIRE'];
					?>
					<tr>
						<td width="20%" rowspan="3" class="fm_objectif" bgcolor="#ccc">A - COHERENCES ET PRINCIPES COMPTABLES</td>
						<td width="40%" class="fm_qst"><div id="coh1" style="color:blue"><u>A-t-on effectué une revue analytique des comptes d'impôts et taxes ainsi que des comptes de tiers associés par rapport à l'exercice précédent ?</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse1; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire1; ?></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="A" and RDC_RANG=2 and MISSION_ID='.$mission_id);
						$donnees2=$reponse2->fetch();
						
						$reponse2=$donnees2['RDC_REPONSE'];
						$commentaire2=$donnees2['RDC_COMMENTAIRE'];
					?>
					<tr>
						<td width="40%" class="fm_qst"><div id="coh11" style="color:blue"><u>Les écarts significatifs sont-ils tous justifiés et expliqués ?</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse2; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire2; ?></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="A" and RDC_RANG=3 and MISSION_ID='.$mission_id);
						$donnees3=$reponse3->fetch();
						
						$reponse3=$donnees3['RDC_REPONSE'];
						$commentaire3=$donnees3['RDC_COMMENTAIRE'];
					?>					
					<tr>
						<td width="40%" class="fm_qst"><div id="coh2" style="color:blue"><u>Les principes comptables appliquées par la société sont-ils cohérents avec le secteur dans lequel elle exerce ?</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse3; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire3; ?></td>
					</tr>
					<!-- Objectif B -->
					<?php
						include '../../connexion.php';	
						
						$reponse4=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="B" and RDC_RANG=1 and MISSION_ID='.$mission_id);
						$donnees4=$reponse4->fetch();
						
						$reponse4=$donnees4['RDC_REPONSE'];
						$commentaire4=$donnees4['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="20%" class="fm_objectif" bgcolor="#ccc">B - EXHAUSTIVITE DES ENREGISTREMENTS</td>
						<td width="40%" class="fm_qst"><div id="exhaust1" style="color:blue"><u>Tous les impôts et taxes applicables à la société ont-ils été correctement comptabilisés ?</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse4; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire4; ?></td>
					</tr>
					<!-- Objectif C -->
					<?php
						include '../../connexion.php';	
						
						$reponse5=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="B" and RDC_RANG=2 and MISSION_ID='.$mission_id);
						$donnees5=$reponse5->fetch();
						
						$reponse5=$donnees5['RDC_REPONSE'];
						$commentaire5=$donnees5['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="20%" rowspan="4" class="fm_objectif" bgcolor="#ccc">C - REGULARITE DES ENREGISTREMENTS</td>
						<td width="40%" class="fm_qst"><div id="reg1" style="color:blue"><u>A-t-on obtenu le tableau de détermination du résultat fiscal ?</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse1; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire1; ?></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse6=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="C" and RDC_RANG=1 and MISSION_ID='.$mission_id);
						$donnees6=$reponse6->fetch();
						
						$reponse6=$donnees6['RDC_REPONSE'];
						$commentaire6=$donnees6['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst"><div id="reg11" style="color:blue"><u>Le mode de calcul du résultat fiscal est-il correct ?</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse6; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire6; ?></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse7=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="C" and RDC_RANG=2 and MISSION_ID='.$mission_id);
						$donnees7=$reponse7->fetch();
						
						$reponse7=$donnees7['RDC_REPONSE'];
						$commentaire7=$donnees7['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst"><div id="reg2" style="color:blue"><u>Le solde du compte d'acomptes provisionnels est-il justifié ?</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse7; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire7; ?></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse8=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="C" and RDC_RANG=3 and MISSION_ID='.$mission_id);
						$donnees8=$reponse8->fetch();
						
						$reponse8=$donnees8['RDC_REPONSE'];
						$commentaire8=$donnees8['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst"><div id="reg2" style="color:blue"><u>Confirmez-vous que la provision d'IR et l'IR à payer sont corrects ?</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse8; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire8; ?></td>
					</tr>
					<!-- Objectif D -->
					<?php
						include '../../connexion.php';	
						
						$reponse9=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="D" and RDC_RANG=1 and MISSION_ID='.$mission_id);
						$donnees9=$reponse9->fetch();
						
						$reponse9=$donnees9['RDC_REPONSE'];
						$commentaire9=$donnees9['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="20%" rowspan="4" class="fm_objectif" bgcolor="#ccc">E - EXISTENCE DES SOLDES</td>
						<td width="40%" class="fm_qst"><div id="exist1" style="color:blue"><u>Le solde de chaque créance d'impôt est-il justifié ?</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse9; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire9; ?></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse10=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="D" and RDC_RANG=2 and MISSION_ID='.$mission_id);
						$donnees10=$reponse10->fetch();
						
						$reponse10=$donnees10['RDC_REPONSE'];
						$commentaire10=$donnees10['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst"><div id="exist11" style="color:blue"><u>Le solde de chaque dette d'impôt est-il justifié ?</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse10; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire10; ?></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse11=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="D" and RDC_RANG=3 and MISSION_ID='.$mission_id);
						$donnees11=$reponse11->fetch();
						
						$reponse11=$donnees11['RDC_REPONSE'];
						$commentaire11=$donnees11['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst"><div id="exist111" style="color:blue"><u>Les travaux de lettrage des comptes liés aux impôts et taxes sont-ils à jour ?</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse11; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire11; ?></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse12=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="D" and RDC_RANG=4 and MISSION_ID='.$mission_id);
						$donnees12=$reponse12->fetch();
						
						$reponse12=$donnees12['RDC_REPONSE'];
						$commentaire12=$donnees12['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst"><div id="exist1111" style="color:blue"><u>Tous les comptes composant chaque poste du bilan sont-ils conformes aux soldes de la balance générale ?</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse12; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire12; ?></td>
					</tr>
					<!-- Objectif E -->
					<?php
						include '../../connexion.php';	
						
						$reponse13=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="E" and RDC_RANG=1 and MISSION_ID='.$mission_id);
						$donnees13=$reponse13->fetch();
						
						$reponse13=$donnees13['RDC_REPONSE'];
						$commentaire13=$donnees13['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="20%" rowspan="2" class="fm_objectif" bgcolor="#ccc">F - EVALUATION DES SOLDES</td>
						<td width="40%" class="fm_qst"><div id="eval1" style="color:blue"><u>Assurez-vous que les risques et litiges des derniers contrôles fiscaux ont été pris en compte ?</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse13; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire13; ?></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse14=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="E" and RDC_RANG=2 and MISSION_ID='.$mission_id);
						$donnees14=$reponse14->fetch();
						
						$reponse14=$donnees14['RDC_REPONSE'];
						$commentaire14=$donnees14['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst"><div id="eval11" style="color:blue"><u>Si oui, les écritures de provisions pour charges sont-elles justifiées et régulièrement comptabilisées ?</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse14; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire14; ?></td>
					</tr>
					<!-- Objectif F -->
					<?php
						include '../../connexion.php';	
						
						$reponse15=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="F" and RDC_RANG=1 and MISSION_ID='.$mission_id);
						$donnees15=$reponse15->fetch();
						
						$reponse15=$donnees15['RDC_REPONSE'];
						$commentaire15=$donnees15['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="20%" rowspan="5" class="fm_objectif" bgcolor="#ccc">G - RATTACHEMENT DES OPERATIONS</td>
						<td width="40%" class="fm_qst"><div id="rattach1" style="color:blue"><u>Les opérations enregistrées sont-elles comptabilisées à l'exercice auquel elles se rattachent ?</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse15; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire15; ?></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse16=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="F" and RDC_RANG=2 and MISSION_ID='.$mission_id);
						$donnees16=$reponse16->fetch();
						
						$reponse16=$donnees16['RDC_REPONSE'];
						$commentaire16=$donnees16['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst"><div id="rattach2" style="color:blue"><u>En cas de résultat déficitaire/réduction sur investissement, un impôt différé actif a-t-il été constaté?</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse16; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire16; ?></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse17=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="F" and RDC_RANG=3 and MISSION_ID='.$mission_id);
						$donnees17=$reponse17->fetch();
						
						$reponse17=$donnees17['RDC_REPONSE'];
						$commentaire17=$donnees17['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst"><div id="rattach22" style="color:blue"><u>Y-a-t-il d'autres cas nécessitant la constatation d'ID passif ?</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse17; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire17; ?></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse18=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="F" and RDC_RANG=4 and MISSION_ID='.$mission_id);
						$donnees18=$reponse18->fetch();
						
						$reponse18=$donnees18['RDC_REPONSE'];
						$commentaire18=$donnees18['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst"><div id="rattach222" style="color:blue"><u>Si oui, les écritures comptabilisées sont-elles cohérentes et justifiées  ?</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse18; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire18; ?></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse19=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="F" and RDC_RANG=5 and MISSION_ID='.$mission_id);
						$donnees19=$reponse19->fetch();
						
						$reponse19=$donnees19['RDC_REPONSE'];
						$commentaire19=$donnees19['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst"><div id="rattach2222" style="color:blue"><u>Le mode de calcul des impôts différés est-il correct ?</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse19; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire19; ?></td>
					</tr>
					<!-- Objectif G -->
					<?php
						include '../../connexion.php';	
						
						$reponse20=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="G" and RDC_RANG=1 and MISSION_ID='.$mission_id);
						$donnees20=$reponse20->fetch();
						
						$reponse20=$donnees20['RDC_REPONSE'];
						$commentaire20=$donnees20['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="20%" rowspan="10" class="fm_objectif" bgcolor="#ccc">H - JURIDIQUE FISCAL ET DIVERS</td>
						<td width="40%" class="fm_qst"><div id="jurid1" style="color:blue"><u>Le dossier respecte-t-il toutes les dispositions requises à cet effet ?</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse20; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire20; ?></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse21=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="G" and RDC_RANG=2 and MISSION_ID='.$mission_id);
						$donnees21=$reponse21->fetch();
						
						$reponse21=$donnees21['RDC_REPONSE'];
						$commentaire21=$donnees21['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst"><div id="jurid2" style="color:blue"><u>Avez-vous analysé la situation fiscale de la société ?</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse21; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire21; ?></td>
					</tr>
					<?php
						// include '../../connexion.php';	
						
						// $reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="G" and RDC_RANG=3 and MISSION_ID='.$mission_id);
						// $donnees1=$reponse1->fetch();
						
						// $reponse1=$donnees1['RDC_REPONSE'];
						// $commentaire1=$donnees1['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst"  style="border-right:0;"><div id="coh1" style="color:blue"><u>Avez-vous recensé et vérifié que la société est en règle par rapport aux impôts, droits et taxes suivants :</u></div></td>
						<td width="10%" class="fm_rep" style="border-left:0;border-right:0;"></td>
						<td width="30%" class="fm_cmt" style="border-left:0;border-right:0;"></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse22=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="G" and RDC_RANG=3 and MISSION_ID='.$mission_id);
						$donnees22=$reponse22->fetch();
						
						$reponse22=$donnees22['RDC_REPONSE'];
						$commentaire22=$donnees22['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst"><div id="jurid22" style="color:blue"><u>- IR/TVA intermittent</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse22; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire22; ?></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse23=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="G" and RDC_RANG=4 and MISSION_ID='.$mission_id);
						$donnees23=$reponse23->fetch();
						
						$reponse23=$donnees23['RDC_REPONSE'];
						$commentaire23=$donnees23['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst"><div id="jurid222" style="color:blue"><u>- IRCM</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse23; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire23; ?></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse24=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="G" and RDC_RANG=5 and MISSION_ID='.$mission_id);
						$donnees24=$reponse24->fetch();
						
						$reponse24=$donnees24['RDC_REPONSE'];
						$commentaire24=$donnees24['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst"><div id="jurid2222" style="color:blue"><u>- Droit d'enregistrement</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse24; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire24; ?></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse25=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="G" and RDC_RANG=6 and MISSION_ID='.$mission_id);
						$donnees25=$reponse25->fetch();
						
						$reponse25=$donnees25['RDC_REPONSE'];
						$commentaire25=$donnees25['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst"><div id="jurid22222" style="color:blue"><u>- IFPB</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse25; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire25; ?></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse26=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="G" and RDC_RANG=7 and MISSION_ID='.$mission_id);
						$donnees26=$reponse26->fetch();
						
						$reponse26=$donnees26['RDC_REPONSE'];
						$commentaire26=$donnees26['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst"><div id="jurid222222" style="color:blue"><u>- IFT</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse26; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire26; ?></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse27=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="G" and RDC_RANG=8 and MISSION_ID='.$mission_id);
						$donnees27=$reponse27->fetch();
						
						$reponse27=$donnees27['RDC_REPONSE'];
						$commentaire27=$donnees27['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst"><div id="jurid2222222" style="color:blue"><u>- Droit de communication (se référer aux art. 20.06.12 et suivants)</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse27; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire27; ?></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse28=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="G" and RDC_RANG=9 and MISSION_ID='.$mission_id);
						$donnees28=$reponse28->fetch();
						
						$reponse28=$donnees28['RDC_REPONSE'];
						$commentaire28=$donnees28['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst"><div id="jurid22222222" style="color:blue"><u>- Droit d'accises</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse28; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire28; ?></td>
					</tr>
					<!-- Objectif H -->
					<?php
						include '../../connexion.php';	
						
						$reponse29=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="H" and RDC_RANG=1 and MISSION_ID='.$mission_id);
						$donnees29=$reponse29->fetch();
						
						$reponse29=$donnees29['RDC_REPONSE'];
						$commentaire29=$donnees29['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="20%" rowspan="8" class="fm_objectif" bgcolor="#ccc">I - INFORMATION ET PRESENTATION</td>
						<td width="40%" class="fm_qst"><div id="info1" style="color:blue"><u>Les créances d'impôt sont-elles présentées à l'actif courant du bilan ?</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse29; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire29; ?></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse30=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="H" and RDC_RANG=2 and MISSION_ID='.$mission_id);
						$donnees30=$reponse30->fetch();
						
						$reponse30=$donnees30['RDC_REPONSE'];
						$commentaire30=$donnees30['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst"><div id="info11" style="color:blue"><u>Les dettes d'impôt sont-elles présentées au passif courant du bilan ?</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse30; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire30; ?></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse31=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="H" and RDC_RANG=3 and MISSION_ID='.$mission_id);
						$donnees31=$reponse31->fetch();
						
						$reponse31=$donnees31['RDC_REPONSE'];
						$commentaire31=$donnees31['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst"><div id="info2" style="color:blue"><u>Toutes les rubriques concernant les impôts et taxes sont-elles suffisamment renseignées dans les annexes?</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse31; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire31; ?></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse32=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="H" and RDC_RANG=4 and MISSION_ID='.$mission_id);
						$donnees32=$reponse32->fetch();
						
						$reponse32=$donnees32['RDC_REPONSE'];
						$commentaire32=$donnees32['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst" style="border-right:0;"><div id="coh1" style="color:blue"><u>Les informations suivantes sont-elles correctement présentées en annexes :</u></div></td>
						<td width="10%" class="fm_rep" style="border-left:0;border-right:0;"></td>
						<td width="30%" class="fm_cmt" style="border-left:0;border-right:0;"></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse33=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="H" and RDC_RANG=4 and MISSION_ID='.$mission_id);
						$donnees33=$reponse33->fetch();
						
						$reponse33=$donnees33['RDC_REPONSE'];
						$commentaire33=$donnees33['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst"><div id="info3" style="color:blue"><u>- Le total de l'impôt exigible et différé relatif aux éléments débités ou crédités dans les capitaux propres</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse33; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire33; ?></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse34=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="H" and RDC_RANG=5 and MISSION_ID='.$mission_id);
						$donnees34=$reponse34->fetch();
						
						$reponse34=$donnees34['RDC_REPONSE'];
						$commentaire34=$donnees34['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst"><div id="info33" style="color:blue"><u>- Une explication de la relation entre la charge/produit d'impôt et le bénéfice comptable</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse34; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire34; ?></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse35=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="H" and RDC_RANG=6 and MISSION_ID='.$mission_id);
						$donnees35=$reponse35->fetch();
						
						$reponse35=$donnees35['RDC_REPONSE'];
						$commentaire35=$donnees1['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst"><div id="info333" style="color:blue"><u>- Le montant des différences temporelles déductibles, pertes fiscales et crédits d'impôt non utilisés pour lesquels aucun actif d'impôt différé n'a été comptabilisé au bilan</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse35; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire35; ?></td>
					</tr>
					<?php
						include '../../connexion.php';	
						
						$reponse36=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="impot_taxe" and RDC_OBJECTIF="H" and RDC_RANG=7 and MISSION_ID='.$mission_id);
						$donnees36=$reponse36->fetch();
						
						$reponse36=$donnees36['RDC_REPONSE'];
						$commentaire36=$donnees36['RDC_COMMENTAIRE'];
					?>	
					<tr>
						<td width="40%" class="fm_qst"><div id="info3333" style="color:blue"><u>- Pour chaque catégorie de différence temporelle et pour chaque catégorie de pertes fiscales et de crédits d'impôts non utilisés, le montant des actifs et passifs d'ID comptabilisés au bilan pour chaque exercice présenté et le montant du produit ou de la charge d'ID comptabilisé dans le compte de résultat, s'il n'est pas mis en évidence par les variations des montants comptabilisés au bilan</u></div></td>
						<td width="10%" class="fm_rep"><?php echo $reponse36; ?></td>
						<td width="30%" class="fm_cmt"><?php echo $commentaire36; ?></td>
					</tr>
				</table>
			</div>
		</div>
		<input type="submit" class="bouton" value="Retour" id="RPP" />
		<input type="button" value="synthèse" id="synthese_feuille" class="bouton">
	</body>
</html>