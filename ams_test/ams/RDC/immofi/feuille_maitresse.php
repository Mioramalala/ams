<?php
@session_start();

$mission_id=@$_SESSION['idMission'];
?>
<html>
<head>
<link rel="stylesheet" href="../RDC/immofi/css.css">
<script>

	// Droit cycle by Tolotra
    // Page : RDC -> Immobilisations financière
    // Tâche : B-Immobilisations incorporelles et corporelles, 15
    $.ajax(
        {
            type: 'POST',
            url: 'droitCycle.php',
            data: {task_id: 15},
            success: function (e) {
                var result = 0 === Number(e);
                $("#synthese_feuille").attr('disabled', result);
            }
        }
    );

	$(function(){
		$('#bt_retour').click(function(){
			waiting();$('#contenue').load("RDC/immofi/index.php",stopWaiting);
		});
		
		$('#synthese_feuille').click(function(){
			waiting();$('#contenue').load("RDC/immofi/synthese_immofi.php",stopWaiting);
		});
		$('#coh1').click(function(){
			waiting();$('#contenue').load("RDC/immofi/A_coherence/coherence1.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh11').click(function(){
			waiting();$('#contenue').load("RDC/immofi/A_coherence/coherence1.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh2').click(function(){
			waiting();$('#contenue').load("RDC/immofi/A_coherence/coherence2.php?coherence_visible=OK",stopWaiting);
		});
		$('#reg1').click(function(){
			waiting();$('#contenue').load("RDC/immofi/B_regularite/regularite1.php?regularite_visible=OK",stopWaiting);
		});
		$('#reg11').click(function(){
			waiting();$('#contenue').load("RDC/immofi/B_regularite/regularite1.php?regularite_visible=OK",stopWaiting);
		});
		$('#reg111').click(function(){
			waiting();$('#contenue').load("RDC/immofi/B_regularite/regularite1.php?regularite_visible=OK",stopWaiting);
		});
		$('#reg2').click(function(){
			waiting();$('#contenue').load("RDC/immofi/B_regularite/regularite2.php?regularite_visible=OK",stopWaiting);
		});
		$('#reg22').click(function(){
			waiting();$('#contenue').load("RDC/immofi/B_regularite/regularite2.php?regularite_visible=OK",stopWaiting);
		});
		$('#reg3').click(function(){
			waiting();$('#contenue').load("RDC/immofi/B_regularite/regularite3.php?regularite_visible=OK",stopWaiting);
		});
		$('#reg33').click(function(){
			waiting();$('#contenue').load("RDC/immofi/B_regularite/regularite3.php?regularite_visible=OK",stopWaiting);
		});
		$('#exist1').click(function(){
			waiting();$('#contenue').load("RDC/immofi/C_existence/existence1.php?existence_visible=OK",stopWaiting);
		});
		$('#eval1').click(function(){
			waiting();$('#contenue').load("RDC/immofi/D_evaluation/evaluation1.php?evaluation_visible=OK",stopWaiting);
		});
		$('#eval11').click(function(){
			waiting();$('#contenue').load("RDC/immofi/D_evaluation/evaluation1.php?evaluation_visible=OK",stopWaiting);
		});
		$('#eval111').click(function(){
			waiting();$('#contenue').load("RDC/immofi/D_evaluation/evaluation1.php?evaluation_visible=OK",stopWaiting);
		});
		$('#eval2').click(function(){
			waiting();$('#contenue').load("RDC/immofi/D_evaluation/evaluation2.php?evaluation_visible=OK",stopWaiting);
		});
		$('#rattach1').click(function(){
			waiting();$('#contenue').load("RDC/immofi/E_rattachement/rattachement1.php?rattachement_visible=OK",stopWaiting);
		});
		$('#jurid1').click(function(){
			waiting();$('#contenue').load("RDC/immofi/F_juridique/juridique1.php?juridique_visible=OK",stopWaiting);
		});
		$('#jurid11').click(function(){
			waiting();$('#contenue').load("RDC/immofi/F_juridique/juridique1.php?juridique_visible=OK",stopWaiting);
		});
		$('#jurid2').click(function(){
			waiting();$('#contenue').load("RDC/immofi/F_juridique/juridique2.php?juridique_visible=OK",stopWaiting);
		});
		$('#jurid3').click(function(){
			waiting();$('#contenue').load("RDC/immofi/F_juridique/juridique3.php?juridique_visible=OK",stopWaiting);
		});
		$('#info1').click(function(){
			waiting();$('#contenue').load("RDC/immofi/G_information/information1.php?information_visible=OK",stopWaiting);
		});
		$('#info11').click(function(){
			waiting();$('#contenue').load("RDC/immofi/G_information/information1.php?information_visible=OK",stopWaiting);
		});
		$('#info2').click(function(){
			waiting();$('#contenue').load("RDC/immofi/G_information/information2.php?information_visible=OK",stopWaiting);
		});
		$('#info3').click(function(){
			waiting();$('#contenue').load("RDC/immofi/G_information/information3.php?information_visible=OK",stopWaiting);
		});
	});
</script>

</style>
</head>
<body>
<table style="text-align:center;background-color:#00698d;color:white;width:100%;padding-top:5px;">
	<tr>
		<td><label>LA FEUILLE MAITRESSE DU CYCLE IMMOBILISATIONS FINANCIERES</label></td>
	</tr>
</table>
<div>
	<table width="100%">
		<tr bgcolor="#ccc" align="center">
			<td width="20%">Objéctifs d'audit</td>
			<td width="40%">Questions / tests</td>
			<td width="10%">Réponses</td>
			<td width="30%">Commentaires</td>
		</tr>
	</table>
<div id="table_id" style="overflow:auto;height:460px;">
	<table>	
		<!------------------------------------------------A1------------------------------------------->	
		<?php
			include '../../connexion.php';	
			
			$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immofi" and RDC_OBJECTIF="A" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees1=$reponse1->fetch();
			
			$reponse1=$donnees1['RDC_REPONSE'];
			$commentaire1=$donnees1['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white" align="left">
			<td width="20.2%">A-Cohérence et principes comptables</td>
			<td width="40.7%"><div id="coh1" style="color:blue"><u>A-t-on effectué une revue analytique des immobilisations financières par rapport à l'exercice précédent ?</u></div></td>
			<td width="10.1%"  align="center"><?php echo $reponse1; ?></td>
			<td width="29%"><?php echo $commentaire1; ?></td>
		</tr>
			<!------------------------------------------------A2------------------------------------------->
		<?php
			$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immofi" and RDC_OBJECTIF="A" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees2=$reponse2->fetch();
			
			$reponse2=$donnees2['RDC_REPONSE'];
			$commentaire2=$donnees2['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td ><div id="coh11" style="color:blue"><u>Les écarts significatifs sont-ils tous justifiés et expliqués ?</u></div></td>
			<td  align="center"><?php echo $reponse2; ?></td>
			<td><?php echo $commentaire2; ?></td>
		</tr>
			<!------------------------------------------------A3------------------------------------------->
		<?php
			$reponse3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immofi" and RDC_OBJECTIF="A" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donnees3=$reponse3->fetch();
			
			$reponse3=$donnees3['RDC_REPONSE'];
			$commentaire3=$donnees3['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="coh2" style="color:blue"><u>Les principes comptables appliquées par la société sont-ils cohérents avec le secteur dans lequel la société exerce ?</u></div></td>
			<td  align="center"><?php echo $reponse3; ?></td>
			<td><?php echo $commentaire3; ?></td>
		</tr>
		<!------------------------------------------------------------------------------------------->
		<!------------------------------------------------B1------------------------------------------->
		<?php

			$reponseB1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immofi" and RDC_OBJECTIF="B" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donneesB1=$reponseB1->fetch();
			
			$reponseB1=$donneesB1['RDC_REPONSE'];
			$commentaireB1=$donneesB1['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td>B - Régularité des enregistrement</td>
			<td><div id="reg1" style="color:blue"><u>Les acquisitions d'immobilisations financières sont-elles toutes justifiées et correctement comptabilisées ?</u></div></td>
			<td  align="center"><?php echo $reponseB1; ?></td>
			<td><?php echo $commentaireB1; ?></td>
		</tr>
		<!------------------------------------------------B2------------------------------------------->
		<?php
			$reponseB2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immofi" and RDC_OBJECTIF="B" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donneesB2=$reponseB2->fetch();
			
			$reponseB2=$donneesB2['RDC_REPONSE'];
			$commentaireB2=$donneesB2['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="reg11" style="color:blue"><u>Les changements survenus quant à l'augmentation de valeur des immobilisations financières sont-ils tous justifiés et correctement comptabilisés ?</u></div></td>
			<td  align="center"><?php echo $reponseB2; ?></td>
			<td><?php echo $commentaireB2; ?></td>
		</tr>
		<!------------------------------------------------B3------------------------------------------->
		<?php
			$reponseB3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immofi" and RDC_OBJECTIF="B" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donneesB3=$reponseB3->fetch();
			
			$reponseB3=$donneesB3['RDC_REPONSE'];
			$commentaireB3=$donneesB3['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="reg111" style="color:blue"><u>Les augmentations de valeur sont-elles correctement comptabilisées ?</u></div></td>
			<td  align="center"><?php echo $reponseB3; ?></td>
			<td><?php echo $commentaireB3; ?></td>
		</tr>
		<!------------------------------------------------B4------------------------------------------->
		<?php
			$reponseB4=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immofi" and RDC_OBJECTIF="B" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donneesB4=$reponseB4->fetch();
			
			$reponseB4=$donneesB4['RDC_REPONSE'];
			$commentaireB4=$donneesB4['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="reg2" style="color:blue"><u>Les cessions d'immobilisations financières sont-elles justifiées et correctement comptabilisées ?</u></div></td>
			<td  align="center"><?php echo $reponseB4; ?></td>
			<td><?php echo $commentaireB4; ?></td>
		</tr>
		<!------------------------------------------------B5------------------------------------------->
		<?php
			$reponseB5=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immofi" and RDC_OBJECTIF="B" and RDC_RANG=5 and MISSION_ID='.$mission_id);
			
			$donneesB5=$reponseB5->fetch();
			
			$reponseB5=$donneesB5['RDC_REPONSE'];
			$commentaireB5=$donneesB5['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="reg22" style="color:blue"><u>Les changements survenus quant à la diminution de valeur des immobilisations financières sont-ils justifiés et correctement comptabilisés ?</u></div></td>
			<td  align="center"><?php echo $reponseB5; ?></td>
			<td><?php echo $commentaireB5; ?></td>
		</tr>
		<!------------------------------------------------B6------------------------------------------->
		<?php
			$reponseB6=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immofi" and RDC_OBJECTIF="B" and RDC_RANG=6 and MISSION_ID='.$mission_id);
			
			$donneesB6=$reponseB6->fetch();
			
			$reponseB6=$donneesB6['RDC_REPONSE'];
			$commentaireB6=$donneesB6['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="reg3" style="color:blue"><u>Les produits liés aux immobilisations financières ont-ils été comptabilisés dans les bons comptes ?</u></div></td>
			<td  align="center"><?php echo $reponseB6; ?></td>
			<td><?php echo $commentaireB6; ?></td>
		</tr>
		<!------------------------------------------------B7------------------------------------------->
		<?php
			$reponseB7=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immofi" and RDC_OBJECTIF="B" and RDC_RANG=7 and MISSION_ID='.$mission_id);
			
			$donneesB7=$reponseB7->fetch();
			
			$reponseB7=$donneesB7['RDC_REPONSE'];
			$commentaireB7=$donneesB7['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="reg33" style="color:blue"><u>Les charges liés aux immobilisations financières ont-elles été comptabilisées dans les bons comptes ?</u></div></td>
			<td  align="center"><?php echo $reponseB7; ?></td>
			<td><?php echo $commentaireB7; ?></td>
		</tr>
		<!------------------------------------------------------------------------------------------->
		<!------------------------------------------------C1------------------------------------------->
		<?php
			$reponseC1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immofi" and RDC_OBJECTIF="C" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donneesC1=$reponseC1->fetch();
			
			$reponseC1=$donneesC1['RDC_REPONSE'];
			$commentaireC1=$donneesC1['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td>C-Existence des soldes</td>
			<td><div id="exist1" style="color:blue"><u>Les soldes sont-ils justifiés sur la base des titres de propriété et des contrats de prêts ?</u></div></td>
			<td  align="center"><?php echo $reponseC1; ?></td>
			<td><?php echo $commentaireC1; ?></td>
		</tr>
		
		<!------------------------------------------------------------------------------------------->
		<!------------------------------------------------D1------------------------------------------->
		<?php
			$reponseD1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immofi" and RDC_OBJECTIF="D" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donneesD1=$reponseD1->fetch();
			
			$reponseD1=$donneesD1['RDC_REPONSE'];
			$commentaireD1=$donneesD1['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td>D-Evaluation des soldes</td>
			<td><div id="eval1" style="color:blue"><u>Les titres de participation ont-ils été réévalués à la date de clôture ?</u></div></td>
			<td  align="center"><?php echo $reponseD1; ?></td>
			<td><?php echo $commentaireD1; ?></td>
		</tr>
		<!------------------------------------------------D2------------------------------------------->
		<?php
			$reponseD2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immofi" and RDC_OBJECTIF="D" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donneesD2=$reponseD2->fetch();
			
			$reponseD2=$donneesD2['RDC_REPONSE'];
			$commentaireD2=$donneesD2['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="eval11" style="color:blue"><u>Les dépréciations de valeur sont-elles correctement calculées ?</u></div></td>
			<td  align="center"><?php echo $reponseD2; ?></td>
			<td><?php echo $commentaireD2; ?></td>
		</tr>
		<!------------------------------------------------D3------------------------------------------->
	
		<?php
			$reponseD3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immofi" and RDC_OBJECTIF="D" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donneesD3=$reponseD3->fetch();
			
			$reponseD3=$donneesD3['RDC_REPONSE'];
			$commentaireD3=$donneesD3['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="eval111" style="color:blue"><u>Les dotations aux provisions pour perte de valeur ont-elles été correctement comptabilisées ?</u></div></td>
			<td  align="center"><?php echo $reponseD3; ?></td>
			<td><?php echo $commentaireD3; ?></td>
		</tr>
		<!------------------------------------------------D4------------------------------------------->
		<?php
			$reponseD4=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immofi" and RDC_OBJECTIF="D" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donneesD4=$reponseD4->fetch();
			
			$reponseD4=$donneesD4['RDC_REPONSE'];
			$commentaireD4=$donneesD4['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="eval2" style="color:blue"><u>Appréciez-vous le niveau des provisions pour dépréciation comptabilisées ?</u></div></td>
			<td  align="center"><?php echo $reponseD4; ?></td>
			<td><?php echo $commentaireD4; ?></td>
		</tr>
		
		<!------------------------------------------------------------------------------------------->
		<!------------------------------------------------E1------------------------------------------->
		<?php
			$reponseE1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immofi" and RDC_OBJECTIF="E" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donneesE1=$reponseE1->fetch();
			
			$reponseE1=$donneesE1['RDC_REPONSE'];
			$commentaireE1=$donneesE1['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td>E-Rattachemant des opérations</td>
			<td><div id="rattach1" style="color:blue"><u>Les produits liés aux immobilisations financières sont-ils comptabilisés à l'exercice auquel ils se rattachent ?</u></div></td>
			<td  align="center"><?php echo $reponseE1; ?></td>
			<td><?php echo $commentaireE1; ?></td>
		</tr>
		
		<!------------------------------------------------------------------------------------------->
		<!------------------------------------------------F1------------------------------------------->
		<?php
			$reponseF1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immofi" and RDC_OBJECTIF="F" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donneesF1=$reponseF1->fetch();
			
			$reponseF1=$donneesF1['RDC_REPONSE'];
			$commentaireF1=$donneesF1['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td>F-Juridique fiscal et divers</td>
			<td><div id="jurid1" style="color:blue"><u>Le traitement des produits des immobilisations financières respecte-il les législations fiscales ?</u></div></td>
			<td  align="center"><?php echo $reponseF1; ?></td>
			<td><?php echo $commentaireF1; ?></td>
		</tr>
		<!------------------------------------------------F2------------------------------------------->
		<?php
			$reponseF2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immofi" and RDC_OBJECTIF="F" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donneesF2=$reponseF2->fetch();
			
			$reponseF2=$donneesF2['RDC_REPONSE'];
			$commentaireF2=$donneesF2['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="jurid11" style="color:blue"><u>Les intérêts et tous les autres produits relatifs aux obligations et prêts ont-ils été déclarés à l'IRCM ?</u></div></td>
			<td  align="center"><?php echo $reponseF2; ?></td>
			<td><?php echo $commentaireF2; ?></td>
		</tr>
		<!------------------------------------------------F3------------------------------------------->
		<?php
			$reponseF3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immofi" and RDC_OBJECTIF="F" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donneesF3=$reponseF3->fetch();
			
			$reponseF3=$donneesF3['RDC_REPONSE'];
			$commentaireF3=$donneesF3['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="jurid2" style="color:blue"><u>Les dotations et reprises aux provisions pour dépréciations des titres ont-elles été considérées lors de la détermination du résultat fiscal ?</u></div></td>
			<td  align="center"><?php echo $reponseF3; ?></td>
			<td><?php echo $commentaireF3; ?></td>
		</tr>
		<!------------------------------------------------F4------------------------------------------->
		<?php
			$reponseF3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immofi" and RDC_OBJECTIF="F" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donneesF3=$reponseF3->fetch();
			
			$reponseF3=$donneesF3['RDC_REPONSE'];
			$commentaireF3=$donneesF3['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="jurid3" style="color:blue"><u>Assurez-vous qu'aucune augmentation des immobilisations financières ne concerne les prêts ou avances accordés aux dirigeants ?</u></div></td>
			<td  align="center"><?php echo $reponseF3; ?></td>
			<td><?php echo $commentaireF3; ?></td>
		</tr>
		<!------------------------------------------------------------------------------------------->
		<!------------------------------------------------G1------------------------------------------->
		<?php
			$reponseG1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immofi" and RDC_OBJECTIF="G" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donneesG1=$reponseG1->fetch();
			
			$reponseG1=$donneesG1['RDC_REPONSE'];
			$commentaireG1=$donneesG1['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td>G-Informations et présentations</td>
			<td><div id="info1" style="color:blue"><u>Les plus values sur les titres immobilisés sont-elles présentées parmi les produits de la société ?</u></div></td>
			<td  align="center"><?php echo $reponseG1; ?></td>
			<td><?php echo $commentaireG1; ?></td>
		</tr>
		<!------------------------------------------------G2------------------------------------------->
		<?php
			$reponseG2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immofi" and RDC_OBJECTIF="G" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donneesG2=$reponseG2->fetch();
			
			$reponseG2=$donneesG2['RDC_REPONSE'];
			$commentaireG2=$donneesG2['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="info11" style="color:blue"><u>Les moins values sur les titres immobilisés sont-elles présentées parmi les charges de la société ?</u></div></td>
			<td  align="center"><?php echo $reponseG2; ?></td>
			<td><?php echo $commentaireG2; ?></td>
		</tr>
		<!------------------------------------------------G3------------------------------------------->
		<?php
			$reponseG3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immofi" and RDC_OBJECTIF="G" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donneesG3=$reponseG3->fetch();
			
			$reponseG3=$donneesG3['RDC_REPONSE'];
			$commentaireG3=$donneesG3['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="info2" style="color:blue"><u>Justifiez-vous la ventilation des immobilisations financières entre court et long terme selon leurs caractéristiques ?</u></div></td>
			<td  align="center"><?php echo $reponseG3; ?></td>
			<td><?php echo $commentaireG3; ?></td>
		</tr>
		<!------------------------------------------------G4------------------------------------------->
		<?php
			$reponseG4=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immofi" and RDC_OBJECTIF="G" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donneesG4=$reponseG4->fetch();
			
			$reponseG4=$donneesG4['RDC_REPONSE'];
			$commentaireG4=$donneesG4['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="info3" style="color:blue"><u>Confirmez-vous que tous les détails des états financiers ainsi que toutes les informations devant figurer dans les annexes aux états financiers y sont présentées ?</u></div></td>
			<td  align="center"><?php echo $reponseG4; ?></td>
			<td><?php echo $commentaireG4; ?></td>
		</tr>
		
	</table>
</div>
<input type="button" value="Retour" id="bt_retour" class="bouton"/>
<input type="button" value="synthèse" id="synthese_feuille" class="bouton">
</body>
</html>