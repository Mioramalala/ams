<?php @session_start();
	include '../../connexion.php';
$mission_id=@$_SESSION['idMission'];
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="../RDC/emprunt/emprunt.css">
		<script type="text/javascript" src="../../js/jquery-1.7.2.js"></script>
		<script type="text/javascript">
			// Droit cycle by Tolotra
	        // Page : RDC -> EMPRUNTS ET DETTES FINANCIERES
	        // Tâche : J-Emprunts et dettes financières, 53
	        $.ajax(
	            {
	                type: 'POST',
	                url: 'droitCycle.php',
	                data: {task_id: 53},
	                success: function (e) {
	                    var result = 0 === Number(e);
	                    $("#synthese_feuille").attr('disabled', result);
	                }
	            }
	        );
	        
			$("#RPP").click(function(){
				waiting();$("#contenue").load("RDC/emprunt/accED.php",stopWaiting);
			});
			
			$(function(){
				$('#synthese_feuille').click(function(){
					waiting();$('#contenue').load("RDC/emprunt/synthese_emprunt.php",stopWaiting);
				});
				$('#coh1').click(function(){
					waiting();$('#contenue').load("RDC/emprunt/empruntA/objetAED1.php?coherence_visible=OK",stopWaiting);
				});
				$('#coh11').click(function(){
					waiting();$('#contenue').load("RDC/emprunt/empruntA/objetAED1.php?coherence_visible=OK",stopWaiting);
				});
				$('#coh2').click(function(){
					waiting();$('#contenue').load("RDC/emprunt/empruntA/objetAED2.php?coherence_visible=OK",stopWaiting);
				});
				$('#reg1').click(function(){
					waiting();$('#contenue').load("RDC/emprunt/empruntB/objetBED1.php?regularite_visible=OK",stopWaiting);
				});
				$('#reg2').click(function(){
					waiting();$('#contenue').load("RDC/emprunt/empruntB/objetBED2.php?regularite_visible=OK",stopWaiting);
				});
				$('#eval1').click(function(){
					waiting();$('#contenue').load("RDC/emprunt/empruntC/objetCED1.php?evaluation_visible=OK",stopWaiting);
				});
				$('#eval11').click(function(){
					waiting();$('#contenue').load("RDC/emprunt/empruntC/objetCED1.php?evaluation_visible=OK",stopWaiting);
				});
				$('#info1').click(function(){
					waiting();$('#contenue').load("RDC/emprunt/empruntD/objetDED1.php?information_visible=OK",stopWaiting);
				});
				$('#info11').click(function(){
					waiting();$('#contenue').load("RDC/emprunt/empruntD/objetDED1.php?information_visible=OK",stopWaiting);
				});
				$('#info111').click(function(){
					waiting();$('#contenue').load("RDC/emprunt/empruntD/objetDED1.php?information_visible=OK",stopWaiting);
				});
				
				
			});
		</script>
	</head>

	<body>
		<div id="GranTitre">FEUILLE MAITRESSE</div>
		<div class="cadre-fm" style="overflow:auto;">
			<table width="100%" style="border-collapse:collapse;">
				<tr class="sous-titre" bgcolor="#6495ED">
					<td width="20%">Objectifs d'audit</td>
					<td width="40%">Questions/Tests</td>
					<td width="10%">Réponses</td>
					<td width="30%">Commentaires</td>
				</tr>
		<?php
			include '../../connexion.php';	
			
			$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="emprunt_dette" and RDC_OBJECTIF="A" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees1=$reponse1->fetch();
			
			$reponse1=$donnees1['RDC_REPONSE'];
			$commentaire1=$donnees1['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc">A-Cohérence et principes comptables</td>
			<td width="40.7%"><div id="coh1" style="color:blue"><u>A-t-on réalisé la revue analytique des comptes de trésorerie ?</u></div></td>
			<td width="10.1%"><?php echo $reponse1; ?></td>
			<td width="29%"><?php echo $commentaire1; ?></td>
		</tr>
		<?php			
			$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="emprunt_dette" and RDC_OBJECTIF="A" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees2=$reponse2->fetch();
			
			$reponse2=$donnees2['RDC_REPONSE'];
			$commentaire2=$donnees2['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh11" style="color:blue"><u>Est-ce que les variations importantes sont correctement justifiées ?</u></div></td>
			<td width="10.1%"><?php echo $reponse2; ?></td>
			<td width="29%"><?php echo $commentaire2; ?></td>
		</tr>
		<?php			
			$reponse3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="emprunt_dette" and RDC_OBJECTIF="A" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donnees3=$reponse3->fetch();
			
			$reponse3=$donnees3['RDC_REPONSE'];
			$commentaire3=$donnees3['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc"></td>
			<td width="40.7%"><div id="coh2" style="color:blue"><u>Les méthodes comptables appliquées sont-elles conformes à celles de l'exercice précédent ?</u></div></td>
			<td width="10.1%"><?php echo $reponse3; ?></td>
			<td width="29%"><?php echo $commentaire3; ?></td>
		</tr>

		<?php			
			$reponse4=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="emprunt_dette" and RDC_OBJECTIF="B" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees4=$reponse4->fetch();
			
			$reponse4=$donnees4['RDC_REPONSE'];
			$commentaire4=$donnees4['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%">B-Régularité des enregistrements et rattachement</td>
			<td width="40.7%"><div id="reg1" style="color:blue"><u>Confirmez-vous que le solde comptable est cohérent avec le tableau d'amortissement des emprunts ?</u></div></td>
			<td width="10.1%"><?php echo $reponse4; ?></td>
			<td width="29%"><?php echo $commentaire4; ?></td>
		</tr>
		<?php			
			$reponse5=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="emprunt_dette" and RDC_OBJECTIF="B" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees5=$reponse5->fetch();
			
			$reponse5=$donnees5['RDC_REPONSE'];
			$commentaire5=$donnees5['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc"></td>
			<td width="40.7%"><div id="reg2" style="color:blue"><u>Assurez-vous que toutes les charges d'intérêts sont justifiées et correctement comptabilisées ?</u></div></td>
			<td width="10.1%"><?php echo $reponse5; ?></td>
			<td width="29%"><?php echo $commentaire5; ?></td>
		</tr>
		<?php			
			$reponse6=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="emprunt_dette" and RDC_OBJECTIF="C" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees6=$reponse6->fetch();
			
			$reponse6=$donnees6['RDC_REPONSE'];
			$commentaire6=$donnees6['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%">C - Evaluation des soldes</td>
			<td width="40.7%"><div id="eval1" style="color:blue"><u>Les emprunts en devises sont-ils réévalués au  taux de clôture ?</u></div></td>
			<td width="10.1%"><?php echo $reponse6; ?></td>
			<td width="29%"><?php echo $commentaire6; ?></td>
		</tr>
		<?php			
			$reponse7=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="emprunt_dette" and RDC_OBJECTIF="C" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees7=$reponse7->fetch();
			
			$reponse7=$donnees7['RDC_REPONSE'];
			$commentaire7=$donnees7['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc"></td>
			<td width="40.7%"><div id="eval11" style="color:blue"><u>Les différences de change constatées sont-elles correctement comptabilisées ?</u></div></td>
			<td width="10.1%"><?php echo $reponse7; ?></td>
			<td width="29%"><?php echo $commentaire7; ?></td>
		</tr>	
		<?php			
			$reponse8=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="emprunt_dette" and RDC_OBJECTIF="D" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees8=$reponse8->fetch();
			
			$reponse8=$donnees8['RDC_REPONSE'];
			$commentaire8=$donnees8['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%">D - Information et présentation</td>
			<td width="40.7%"><div id="info1" style="color:blue"><u>Avez-vous vérifié les engagements financiers non inscrits au bilan (hypothèque, garanties, …) ?</u></div></td>
			<td width="10.1%"><?php echo $reponse8; ?></td>
			<td width="29%"><?php echo $commentaire8; ?></td>
		</tr>	
		<?php			
			$reponse9=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="emprunt_dette" and RDC_OBJECTIF="D" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees9=$reponse9->fetch();
			
			$reponse9=$donnees9['RDC_REPONSE'];
			$commentaire9=$donnees9['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="info11" style="color:blue"><u>Les engagements hors bilan sont-ils régulièrement mentionnés dans les annexes aux états financiers ?</u></div></td>
			<td width="10.1%"><?php echo $reponse9; ?></td>
			<td width="29%"><?php echo $commentaire9; ?></td>
		</tr>	
		<?php			
			$reponse10=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="emprunt_dette" and RDC_OBJECTIF="D" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donnees10=$reponse10->fetch();
			
			$reponse10=$donnees10['RDC_REPONSE'];
			$commentaire10=$donnees10['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="info111" style="color:blue"><u>Les différence de change présentant un montant significatif sont-elles données en annexes ?</u></div></td>
			<td width="10.1%"><?php echo $reponse10; ?></td>
			<td width="29%"><?php echo $commentaire10; ?></td>
		</tr>	
		</table>
		</div>
		<input type="submit" class="bouton" value="Retour" id="RPP" />
		<input type="button" value="synthèse" id="synthese_feuille" class="bouton">
	</body>
</html>