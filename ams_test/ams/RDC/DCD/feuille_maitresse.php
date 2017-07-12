<?php
@session_start();

$mission_id=@$_SESSION['idMission'];
?>
<html>
<head>
<link rel="stylesheet" href="../RDC/DCD/css.css">
<script>
	// Droit cycle by Tolotra
    // Page : RDC -> DÃ©biteurs et CrÃ©diteurs divers
    // Tâche : K-DÃ©biteurs et CrÃ©diteurs divers, 60
    $.ajax(
        {
            type: 'POST',
            url: 'droitCycle.php',
            data: {task_id: 60},
            success: function (e) {
                var result = 0 === Number(e);
                $("#synthese_feuille").attr('disabled', result);
            }
        }
    );
    
	$(function(){
		$('#bt_retour').click(function(){
			waiting();$('#contenue').load("RDC/DCD/index.php",stopWaiting);
		});
		
		$('#synthese_feuille').click(function(){
			waiting();$('#contenue').load("RDC/DCD/synthese_dcd.php",stopWaiting);
		});
		$('#coh1').click(function(){
			waiting();$('#contenue').load("RDC/DCD/A_coherence/coherence1.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh11').click(function(){
			waiting();$('#contenue').load("RDC/DCD/A_coherence/coherence1.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh2').click(function(){
			waiting();$('#contenue').load("RDC/DCD/A_coherence/coherence2.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh3').click(function(){
			waiting();$('#contenue').load("RDC/DCD/A_coherence/coherence3.php?coherence_visible=OK",stopWaiting);
		});
		$('#exhaust1').click(function(){
			waiting();$('#contenue').load("RDC/DCD/B_exhaustivite/exhaustivite1.php?exhaustivite_visible=OK",stopWaiting);
		});
		$('#exhaust11').click(function(){
			waiting();$('#contenue').load("RDC/DCD/B_exhaustivite/exhaustivite1.php?exhaustivite_visible=OK",stopWaiting);
		});
		$('#reg1').click(function(){
			waiting();$('#contenue').load("RDC/DCD/C_regularite/regularite1.php?regularite_visible=OK",stopWaiting);
		});
		$('#reg11').click(function(){
			waiting();$('#contenue').load("RDC/DCD/C_regularite/regularite1.php?regularite_visible=OK",stopWaiting);
		});
		$('#exist1').click(function(){
			waiting();$('#contenue').load("RDC/DCD/D_existence/existence1.php?existence_visible=OK",stopWaiting);
		});
		$('#eval1').click(function(){
			waiting();$('#contenue').load("RDC/DCD/E_evaluation/evaluation1.php?evaluation_visible=OK",stopWaiting);
		});
		$('#eval11').click(function(){
			waiting();$('#contenue').load("RDC/DCD/E_evaluation/evaluation1.php?evaluation_visible=OK",stopWaiting);
		});
		$('#jurid1').click(function(){
			waiting();$('#contenue').load("RDC/DCD/F_juridique/juridique1.php?juridique_visible=OK",stopWaiting);
		});
		$('#jurid11').click(function(){
			waiting();$('#contenue').load("RDC/DCD/F_juridique/juridique1.php?juridique_visible=OK",stopWaiting);
		});
		$('#jurid111').click(function(){
			waiting();$('#contenue').load("RDC/DCD/F_juridique/juridique1.php?juridique_visible=OK",stopWaiting);
		});
		$('#jurid1111').click(function(){
			waiting();$('#contenue').load("RDC/DCD/F_juridique/juridique1.php?juridique_visible=OK",stopWaiting);
		});
		$('#jurid11111').click(function(){
			waiting();$('#contenue').load("RDC/DCD/F_juridique/juridique1.php?juridique_visible=OK",stopWaiting);
		});
		$('#jurid111111').click(function(){
			waiting();$('#contenue').load("RDC/DCD/F_juridique/juridique1.php?juridique_visible=OK",stopWaiting);
		});
		$('#jurid1111111').click(function(){
			waiting();$('#contenue').load("RDC/DCD/F_juridique/juridique1.php?juridique_visible=OK",stopWaiting);
		});
		$('#info1').click(function(){
			waiting();$('#contenue').load("RDC/DCD/G_information/information1.php?information_visible=OK",stopWaiting);
		});
	});
</script>
</head>
<body>
<table style="text-align:center;background-color:#00698d;color:white;width:100%;padding-top:5px;">
	<tr>
		<td><label>LA FEUILLE MAITRESSE DU CYCLE DEBITEURS ET CREDITEURS DIVERS</label></td>
	</tr>
</table>
<div style="height:427px;overflow:hidden;">
	<table width="100%" border="1">
		<tr bgcolor="#6495ED" align="center">
			<td width="20%" style="color:white;">Objéctifs d'audit</td>
			<td width="40%" style="color:white;">Questions / tests</td>
			<td width="10%" style="color:white;">Réponses</td>
			<td width="30%" style="color:white;">Commentaires</td>
		</tr>
		<?php
			include '../../connexion.php';	
			
			$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="DCD" and RDC_OBJECTIF="A" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees1=$reponse1->fetch();
			
			$reponse1=$donnees1['RDC_REPONSE'];
			$commentaire1=$donnees1['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc">A- COHERENCES ET PRINCIPES COMPTABLES</td>
			<td width="40.7%"><div id="coh1" style="color:blue"><u>A-t-on effectué une revue analytique par rapport à l'exercice précédent ?</u></div></td>
			<td width="10.1%"><?php echo $reponse1; ?></td>
			<td width="29%"><?php echo $commentaire1; ?></td>
		</tr>
		<?php			
			$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="DCD" and RDC_OBJECTIF="A" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees2=$reponse2->fetch();
			
			$reponse2=$donnees2['RDC_REPONSE'];
			$commentaire2=$donnees2['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh11" style="color:blue"><u>Les écarts significatifs sont-ils tous justifiés?</u></div></td>
			<td width="10.1%"><?php echo $reponse2; ?></td>
			<td width="29%"><?php echo $commentaire2; ?></td>
		</tr>
		<?php			
			$reponse3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="DCD" and RDC_OBJECTIF="A" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donnees3=$reponse3->fetch();
			
			$reponse3=$donnees3['RDC_REPONSE'];
			$commentaire3=$donnees3['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh2" style="color:blue"><u>Les soldes des grand-livres/balance auxiliaire/balance âgée/balance générale sont-ils conformes entre eux ?</u></div></td>
			<td width="10.1%"><?php echo $reponse3; ?></td>
			<td width="29%"><?php echo $commentaire3; ?></td>
		</tr>
		<?php			
			$reponse4=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="DCD" and RDC_OBJECTIF="A" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donnees4=$reponse4->fetch();
			
			$reponse4=$donnees4['RDC_REPONSE'];
			$commentaire4=$donnees4['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh3" style="color:blue"><u>Les principes comptables appliqués par la société sont-ils cohérents avec le secteur dans lequel la société exerce ?</u></div></td>
			<td width="10.1%"><?php echo $reponse4; ?></td>
			<td width="29%"><?php echo $commentaire4; ?></td>
		</tr>
		<?php			
			$reponse5=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="DCD" and RDC_OBJECTIF="B" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees5=$reponse5->fetch();
			
			$reponse5=$donnees5['RDC_REPONSE'];
			$commentaire5=$donnees5['RDC_COMMENTAIRE'];
		?>
		
		<tr bgcolor="white">
			<td width="20.2%">B- EXHAUSTIVITE DES ENREGISTREMENTS</td>
			<td width="40.7%"><div id="exhaust1" style="color:blue"><u>A-t-on effectué une circularisation des DCD, notamment des  avocats de la société ?</u></div></td>
			<td width="10.1%"><?php echo $reponse5; ?></td>
			<td width="29%"><?php echo $commentaire5; ?></td>
		</tr>
		<?php			
			$reponse6=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="DCD" and RDC_OBJECTIF="C" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees6=$reponse6->fetch();
			
			$reponse6=$donnees6['RDC_REPONSE'];
			$commentaire6=$donnees6['RDC_COMMENTAIRE'];
		?>
		
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc"></td>
			<td width="40.7%"><div id="exhaust11" style="color:blue"><u>Tous les litiges sont-ils considérés correctement dans les comptes ?</u></div></td>
			<td width="10.1%"><?php echo $reponse6; ?></td>
			<td width="29%"><?php echo $commentaire6; ?></td>
		</tr>
		<?php			
			$reponse7=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="DCD" and RDC_OBJECTIF="C" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees7=$reponse7->fetch();
			
			$reponse7=$donnees7['RDC_REPONSE'];
			$commentaire7=$donnees7['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc">C - REGULARITE DES ENREGISTREMENTS</td>
			<td width="40.7%"><div id="reg1" style="color:blue"><u>Les montants des DCD comptabilisés sont-ils cohérents ?</u></div></td>
			<td width="10.1%"><?php echo $reponse7; ?></td>
			<td width="29%"><?php echo $commentaire7; ?></td>
		</tr>
		<?php			
			$reponse8=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="DCD" and RDC_OBJECTIF="B" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees8=$reponse8->fetch();
			
			$reponse8=$donnees8['RDC_REPONSE'];
			$commentaire8=$donnees8['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc"> </td>
			<td width="40.7%"><div id="reg11" style="color:blue"><u>Les soldes des DCD sont-ils apurés en N+1 ?</u></div></td>
			<td width="10.1%"><?php echo $reponse8; ?></td>
			<td width="29%"><?php echo $commentaire8; ?></td>
		</tr>
		
		<?php			
			$reponse9=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="DCD" and RDC_OBJECTIF="D" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees9=$reponse9->fetch();
			
			$reponse9=$donnees9['RDC_REPONSE'];
			$commentaire9=$donnees9['RDC_COMMENTAIRE'];
		?>
		
	
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc">E- EXISTENCE DES SOLDES</td>
			<td width="40.7%"><div id="exist1" style="color:blue"><u>Les soldes des DCD sont-ils tous justifiés ?</u></div></td>
			<td width="10.1%"><?php echo $reponse9; ?></td>
			<td width="29%"><?php echo $commentaire9; ?></td>
		</tr>
		<?php			
			$reponse10=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="DCD" and RDC_OBJECTIF="E" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees10=$reponse10->fetch();
			
			$reponse10=$donnees10['RDC_REPONSE'];
			$commentaire10=$donnees10['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%">	F- EVALUATION DES SOLDES</td>
			<td width="40.7%"><div id="eval1" style="color:blue"><u>Le calcul des provisions est-il cohérent ?</u></div></td>
			<td width="10.1%"><?php echo $reponse10; ?></td>
			<td width="29%"><?php echo $commentaire10; ?></td>
		</tr>
		<?php			
			$reponse11=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="DCD" and RDC_OBJECTIF="E" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees11=$reponse11->fetch();
			
			$reponse11=$donnees11['RDC_REPONSE'];
			$commentaire11=$donnees11['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc"></td>
			<td width="40.7%"><div id="eval11" style="color:blue"><u>Le classement des reprises sur provisions et des dépenses effectivement supportées est-il cohérent ?</u></div></td>
			<td width="10.1%"><?php echo $reponse11; ?></td>
			<td width="29%"><?php echo $commentaire11; ?></td>
		</tr>
		<?php			
			$reponse12=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="DCD" and RDC_OBJECTIF="F" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees12=$reponse12->fetch();
			
			$reponse12=$donnees12['RDC_REPONSE'];
			$commentaire12=$donnees12['RDC_COMMENTAIRE'];
		?>
		
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc">H- JURIDIQUE ET FISCAL </td>
			<td width="40.7%"><div id="jurid1" style="color:blue"><u>Existe-t-il des avances de fonds à titre de prêt/emprunt entre sociétés du Groupe et/ou autre tierce entité (à préciser) ?</u></div></td>
			<td width="10.1%"><?php echo $reponse12; ?></td>
			<td width="29%"><?php echo $commentaire12; ?></td>
		</tr>
		<?php			
			$reponse14=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="DCD" and RDC_OBJECTIF="F" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees14=$reponse14->fetch();
			
			$reponse14=$donnees14['RDC_REPONSE'];
			$commentaire14=$donnees14['RDC_COMMENTAIRE'];
		?>
		
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc"></td>
			<td width="40.7%"><div id="jurid11" style="color:blue"><u>Si oui, confirmez-vous l'existence de convention de trésorerie ?
			</u></div></td>
			<td width="10.1%"><?php echo $reponse14; ?></td>
			<td width="29%"><?php echo $commentaire14; ?></td>
		</tr>
		<?php			
			$reponse15=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="DCD" and RDC_OBJECTIF="F" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donnees15=$reponse15->fetch();
			
			$reponse15=$donnees15['RDC_REPONSE'];
			$commentaire15=$donnees15['RDC_COMMENTAIRE'];
		?>
		
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc"></td>
			<td width="40.7%"><div id="jurid111" style="color:blue"><u>Cette convention a-t-elle été soumise à approbation par :- le CAC ?
			</u></div></td>
			<td width="10.1%"><?php echo $reponse15; ?></td>
			<td width="29%"><?php echo $commentaire15; ?></td>
		</tr>
		<?php			
			$reponse16=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="DCD" and RDC_OBJECTIF="F" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donnees16=$reponse16->fetch();
			
			$reponse16=$donnees16['RDC_REPONSE'];
			$commentaire16=$donnees16['RDC_COMMENTAIRE'];
		?>
		
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc"></td>
			<td width="40.7%"><div id="jurid1111" style="color:blue"><u>- l'assemblée des actionnaires ?
			</u></div></td>
			<td width="10.1%"><?php echo $reponse16; ?></td>
			<td width="29%"><?php echo $commentaire16; ?></td>
		</tr>
		<?php			
			$reponse17=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="DCD" and RDC_OBJECTIF="F" and RDC_RANG=5 and MISSION_ID='.$mission_id);
			
			$donnees17=$reponse17->fetch();
			
			$reponse17=$donnees17['RDC_REPONSE'];
			$commentaire17=$donnees17['RDC_COMMENTAIRE'];
		?>
		
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc"></td>
			<td width="40.7%"><div id="jurid11111" style="color:blue"><u>Existe-t-il des apports en compte courants libellés en devises ?
			</u></div></td>
			<td width="10.1%"><?php echo $reponse17; ?></td>
			<td width="29%"><?php echo $commentaire17; ?></td>
		</tr>
		<?php			
			$reponse18=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="DCD" and RDC_OBJECTIF="F" and RDC_RANG=6 and MISSION_ID='.$mission_id);
			
			$donnees18=$reponse18->fetch();
			
			$reponse18=$donnees18['RDC_REPONSE'];
			$commentaire18=$donnees18['RDC_COMMENTAIRE'];
		?>
		
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc"></td>
			<td width="40.7%"><div id="jurid111111" style="color:blue"><u>Si oui, confirmez-vous l'existence d'autorisation préalable du FINEX ?
			</u></div></td>
			<td width="10.1%"><?php echo $reponse18; ?></td>
			<td width="29%"><?php echo $commentaire18; ?></td>
		</tr>
		<?php			
			$reponse19=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="DCD" and RDC_OBJECTIF="F" and RDC_RANG=7 and MISSION_ID='.$mission_id);
			
			$donnees19=$reponse19->fetch();
			
			$reponse19=$donnees19['RDC_REPONSE'];
			$commentaire19=$donnees19['RDC_COMMENTAIRE'];
		?>
		
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc"></td>
			<td width="40.7%"><div id="jurid1111111" style="color:blue"><u>Existe-t-il une convention de compte courants d'associés ?
			</u></div></td>
			<td width="10.1%"><?php echo $reponse19; ?></td>
			<td width="29%"><?php echo $commentaire19; ?></td>
		</tr>
		<?php			
			$reponse13=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="DCD" and RDC_OBJECTIF="G" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees13=$reponse13->fetch();
			
			$reponse13=$donnees13['RDC_REPONSE'];
			$commentaire13=$donnees13['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%">I- INFORMATION ET PRESENTATION</td>
			<td width="40.7%"><div id="info1" style="color:blue"><u>Confirmez-vous que tous les détails des états financiers ainsi que toutes les informations devant figurer dans les annexes aux états financiers y sont présentées?</u></div></td>
			<td width="10.1%"><?php echo $reponse13; ?></td>
			<td width="29%"><?php echo $commentaire13; ?></td>
		</tr>

	</table>
	<br/>
	<br/>

</div>
	<input type="button" value="Retour" id="bt_retour" class="bouton"/>
	<input type="button" value="synthèse" id="synthese_feuille" class="bouton">
</body>
</html>