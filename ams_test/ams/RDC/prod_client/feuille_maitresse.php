<?php
@session_start();

$mission_id=@$_SESSION['idMission'];
?>
<html>
<head>
<link rel="stylesheet" href="../RDC/tresorerie/css.css">
<script>

	// Droit cycle by Tolotra
    // Page : RDC -> Produits clients
    // Tâche : Produits clients, 42
    $.ajax(
        {
            type: 'POST',
            url: 'droitCycle.php',
            data: {task_id: 42},
            success: function (e) {
                var result = 0 === Number(e);
                $("#synthese_feuille").attr('disabled', result);
            }
        }
    );

	$(function(){
		$('#bt_retour').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/index.php",stopWaiting);
		});
		
		$('#synthese_feuille').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/synthese_prod_client.php",stopWaiting);
		});
		
		$('#coh1').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/A_coherence/coherence1.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh11').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/A_coherence/coherence1.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh2').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/A_coherence/coherence2.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh3').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/A_coherence/coherence3.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh33').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/A_coherence/coherence3.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh333').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/A_coherence/coherence3.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh3333').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/A_coherence/coherence3.php?coherence_visible=OK",stopWaiting);
		});
		$('#exhaust1').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/B_exhaustivite/exhaustivite1.php?exhaustivite_visible=OK",stopWaiting);
		});
		$('#exhaust11').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/B_exhaustivite/exhaustivite1.php?exhaustivite_visible=OK",stopWaiting);
		});
		$('#reg1').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/C_regularite/regularite1.php?regularite_visible=OK",stopWaiting);
		});
		$('#reg11').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/C_regularite/regularite1.php?regularite_visible=OK",stopWaiting);
		});
		$('#reg2').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/C_regularite/regularite2.php?regularite_visible=OK",stopWaiting);
		});
		$('#exist1').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/D_existence/existence1.php?existence_visible=OK",stopWaiting);
		});
		$('#exist11').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/D_existence/existence1.php?existence_visible=OK",stopWaiting);
		});
		$('#exist2').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/D_existence/existence2.php?existence_visible=OK",stopWaiting);
		});
		$('#exist22').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/D_existence/existence2.php?existence_visible=OK",stopWaiting);
		});
		$('#exist222').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/D_existence/existence2.php?existence_visible=OK",stopWaiting);
		});
		$('#eval1').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/E_evaluation/evaluation1.php?evaluation_visible=OK",stopWaiting);
		});
		$('#eval2').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/E_evaluation/evaluation2.php?evaluation_visible=OK",stopWaiting);
		});
		$('#eval22').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/E_evaluation/evaluation2.php?evaluation_visible=OK",stopWaiting);
		});
		$('#eval222').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/E_evaluation/evaluation2.php?evaluation_visible=OK",stopWaiting);
		});
		$('#eval3').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/E_evaluation/evaluation3.php?evaluation_visible=OK",stopWaiting);
		});
		$('#eval4').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/E_evaluation/evaluation4.php?evaluation_visible=OK",stopWaiting);
		});
		$('#rattach1').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/F_rattachement/rattachement1.php?rattachement_visible=OK",stopWaiting);
		});
		$('#rattach11').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/F_rattachement/rattachement1.php?rattachement_visible=OK",stopWaiting);
		});
		$('#rattach2').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/F_rattachement/rattachement2.php?rattachement_visible=OK",stopWaiting);
		});
		$('#jurid1').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/G_juridique/juridique1.php?juridique_visible=OK",stopWaiting);
		});
		$('#jurid11').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/G_juridique/juridique1.php?juridique_visible=OK",stopWaiting);
		});
		$('#jurid2').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/G_juridique/juridique2.php?juridique_visible=OK",stopWaiting);
		});
		$('#jurid22').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/G_juridique/juridique2.php?juridique_visible=OK",stopWaiting);
		});
		$('#jurid222').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/G_juridique/juridique2.php?juridique_visible=OK",stopWaiting);
		});
		$('#jurid3').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/G_juridique/juridique3.php?juridique_visible=OK",stopWaiting);
		});
		$('#info1').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/H_information/information1.php?information_visible=OK",stopWaiting);
		});
		$('#info2').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/H_information/information2.php?information_visible=OK",stopWaiting);
		});
		$('#info3').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/H_information/information3.php?information_visible=OK",stopWaiting);
		});
		$('#info4').click(function(){
			waiting();$('#contenue').load("RDC/prod_client/H_information/information4.php?information_visible=OK",stopWaiting);
		});
	});
</script>
</head>
<body>
<table style="text-align:center;background-color:#00698d;color:white;width:100%;padding-top:5px;">
	<tr>
		<td><label>LA FEUILLE MAITRESSE DU CYCLE PRODUITS CLIENTS</label></td>
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
	<table border="1">	
		<!------------------------------------------------A1-------------------------------------------->	
		<?php
			include '../../connexion.php';	
			
			$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="A" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees1=$reponse1->fetch();
			
			$reponse1=$donnees1['RDC_REPONSE'];
			$commentaire1=$donnees1['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white" align="left">
			<td width="20.2%">A-Cohérence et principes comptables</td>
			<td width="40.7%"><div id="coh1" style="color:blue"><u>A - t - on effectué une revue analytique des ventes et des clients par rapport à l'exercice précédent ?</u></div></td>
			<td width="10.1%"  align="center"><?php echo $reponse1; ?></td>
			<td width="29%"><?php echo $commentaire1; ?></td>
		</tr>
			<!------------------------------------------------A2-------------------------------------------->
		<?php
			$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="A" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees2=$reponse2->fetch();
			
			$reponse2=$donnees2['RDC_REPONSE'];
			$commentaire2=$donnees2['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="coh11" style="color:blue"><u>Les écarts significatifs sont - ils tous justifiés et expliqués ?</u></div></td>
			<td  align="center"><?php echo $reponse2; ?></td>
			<td><?php echo $commentaire2; ?></td>
		</tr>
			<!------------------------------------------------A3-------------------------------------------->
		<?php
			$reponse3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="A" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donnees3=$reponse3->fetch();
			
			$reponse3=$donnees3['RDC_REPONSE'];
			$commentaire3=$donnees3['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="coh2" style="color:blue"><u>Les soldes des grand - livres/balance auxiliaire/balance âgée/balance générale sont - ils cohérents entre eux ?</u></div></td>
			<td  align="center"><?php echo $reponse3; ?></td>
			<td><?php echo $commentaire3; ?></td>
		</tr>
			<!------------------------------------------------A4-------------------------------------------->
		<?php
			$reponse4=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="A" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donnees4=$reponse4->fetch();
			
			$reponse4=$donnees4['RDC_REPONSE'];
			$commentaire4=$donnees4['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="coh3" style="color:blue"><u>Assurez-vous que la comptabilisation des créances en devises respecte les dispositions du PCG 2005?</u></div></td>
			<td  align="center"><?php echo $reponse4; ?></td>
			<td><?php echo $commentaire4; ?></td>
		</tr>
		
		<!------------------------------------------------A5-------------------------------------------->
		<?php
			$reponse5=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="A" and RDC_RANG=5 and MISSION_ID='.$mission_id);
			
			$donnees5=$reponse5->fetch();
			
			$reponse5=$donnees5['RDC_REPONSE'];
			$commentaire5=$donnees5['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="coh33" style="color:blue"><u>Assurez-vous que la comptabilisation des factures à établir respecte les dispositions du PCG 2005?</u></div></td>
			<td  align="center"><?php echo $reponse5; ?></td>
			<td><?php echo $commentaire5; ?></td>
		</tr>
		
		<!------------------------------------------------A6-------------------------------------------->
		<?php
			$reponse6=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="A" and RDC_RANG=6 and MISSION_ID='.$mission_id);
			
			$donnees6=$reponse6->fetch();
			
			$reponse6=$donnees6['RDC_REPONSE'];
			$commentaire6=$donnees6['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="coh333" style="color:blue"><u>Assurez-vous que la comptabilisation des avances et acomptes clients respecte les dispositions du PCG 2005?</u></div></td>
			<td  align="center"><?php echo $reponse6; ?></td>
			<td><?php echo $commentaire6; ?></td>
		</tr>
		
		<!------------------------------------------------A7-------------------------------------------->
		<?php
			$reponse7=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="A" and RDC_RANG=7 and MISSION_ID='.$mission_id);
			
			$donnees7=$reponse7->fetch();
			
			$reponse7=$donnees7['RDC_REPONSE'];
			$commentaire7=$donnees7['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="coh3333" style="color:blue"><u>Les principes comptables appliquées par la société sont ils cohérents avec le secteur dans lequel elle exerce ?</u></div></td>
			<td  align="center"><?php echo $reponse7; ?></td>
			<td><?php echo $commentaire7; ?></td>
		</tr>
		<!------------------------------------------------------------------------------------------->
		<!------------------------------------------------B1-------------------------------------------->
		<?php

			$reponseB1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="B" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donneesB1=$reponseB1->fetch();
			
			$reponseB1=$donneesB1['RDC_REPONSE'];
			$commentaireB1=$donneesB1['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td>B - Exhaustivité des enregistrement</td>
			<td><div id="exhaust1" style="color:blue"><u>Confirmez-vous que la numérotation des factures de ventes est exhaustive ?</u></div></td>
			<td  align="center"><?php echo $reponseB1; ?></td>
			<td><?php echo $commentaireB1; ?></td>
		</tr>
		<!------------------------------------------------B2-------------------------------------------->
		<?php
			$reponseB2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="B" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donneesB2=$reponseB2->fetch();
			
			$reponseB2=$donneesB2['RDC_REPONSE'];
			$commentaireB2=$donneesB2['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="exhaust11" style="color:blue"><u>Confirmez-vous que la comptabilisation des opérations de vente de biens et services est exhaustive ?</u></div></td>
			<td  align="center"><?php echo $reponseB2; ?></td>
			<td><?php echo $commentaireB2; ?></td>
		</tr>
		<!------------------------------------------------------------------------------------------->
		<!------------------------------------------------C1-------------------------------------------->
		<?php
			$reponseC1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="C" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donneesC1=$reponseC1->fetch();
			
			$reponseC1=$donneesC1['RDC_REPONSE'];
			$commentaireC1=$donneesC1['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td>C-Régularité des enregistrements</td>
			<td><div id="reg1" style="color:blue"><u>Sur la base de sondage, confirmez-vous que les ventes comptabilisées sont appuyées par des factures en bonne et due forme ?</u></div></td>
			<td  align="center"><?php echo $reponseC1; ?></td>
			<td><?php echo $commentaireC1; ?></td>
		</tr>
		<!------------------------------------------------C2-------------------------------------------->
		<?php
			$reponseC2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="C" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donneesC2=$reponseC2->fetch();
			
			$reponseC2=$donneesC2['RDC_REPONSE'];
			$commentaireC2=$donneesC2['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="reg11" style="color:blue"><u>Confirmez-vous que l'ensemble des factures de ventes est appuyée par des bons de commandes et des bons de livraison?</u></div></td>
			<td  align="center"><?php echo $reponseC2; ?></td>
			<td><?php echo $commentaireC2; ?></td>
		</tr>
		<!------------------------------------------------C3-------------------------------------------->
		<?php
			$reponseC3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="C" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donneesC3=$reponseC3->fetch();
			
			$reponseC3=$donneesC3['RDC_REPONSE'];
			$commentaireC3=$donneesC3['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="reg2" style="color:blue"><u>Confirmez-vous que tous les clients à solde créditeur sont validés ?</u></div></td>
			<td  align="center"><?php echo $reponseC3; ?></td>
			<td><?php echo $commentaireC3; ?></td>
		</tr>
		<!------------------------------------------------------------------------------------------->
		<!------------------------------------------------D1-------------------------------------------->
		<?php
			$reponseD1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="D" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donneesD1=$reponseD1->fetch();
			
			$reponseD1=$donneesD1['RDC_REPONSE'];
			$commentaireD1=$donneesD1['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td>D-Existence des soldes</td>
			<td><div id="exist1" style="color:blue"><u>A-t-on effectué des confirmations directes auprès des clients ?</u></div></td>
			<td  align="center"><?php echo $reponseD1; ?></td>
			<td><?php echo $commentaireD1; ?></td>
		</tr>
		<!------------------------------------------------D2-------------------------------------------->
		<?php
			$reponseD2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="D" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donneesD2=$reponseD2->fetch();
			
			$reponseD2=$donneesD2['RDC_REPONSE'];
			$commentaireD2=$donneesD2['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="exist11" style="color:blue"><u>Assurez-vous que les résultats de ces confirmations directes ont été exploités?</u></div></td>
			<td  align="center"><?php echo $reponseD2; ?></td>
			<td><?php echo $commentaireD2; ?></td>
		</tr>
		<!------------------------------------------------D3-------------------------------------------->
	
		<?php
			$reponseD3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="D" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donneesD3=$reponseD3->fetch();
			
			$reponseD3=$donneesD3['RDC_REPONSE'];
			$commentaireD3=$donneesD3['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="exist2" style="color:blue"><u>Les opérations datant de plus d'un an sont-elles justifiées ?</u></div></td>
			<td  align="center"><?php echo $reponseD3; ?></td>
			<td><?php echo $commentaireD3; ?></td>
		</tr>
		<!------------------------------------------------D4-------------------------------------------->
		<?php
			$reponseD4=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="D" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donneesD4=$reponseD4->fetch();
			
			$reponseD4=$donneesD4['RDC_REPONSE'];
			$commentaireD4=$donneesD4['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="exist22" style="color:blue"><u>Les opérations de ventes sont-elles appuyées par des contrats ?</u></div></td>
			<td  align="center"><?php echo $reponseD4; ?></td>
			<td><?php echo $commentaireD4; ?></td>
		</tr>
		<!------------------------------------------------D5-------------------------------------------->
		<?php
			$reponseD5=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="D" and RDC_RANG=5 and MISSION_ID='.$mission_id);
			
			$donneesD5=$reponseD5->fetch();
			
			$reponseD5=$donneesD5['RDC_REPONSE'];
			$commentaireD5=$donneesD5['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="exist222" style="color:blue"><u>Assurez-vous que les créances ont été lettrées avec les paiements correspondants ?</u></div></td>
			<td  align="center"><?php echo $reponseD5; ?></td>
			<td><?php echo $commentaireD5; ?></td>
		</tr>
		<!------------------------------------------------------------------------------------------->
		<!------------------------------------------------E1-------------------------------------------->
		<?php
			$reponseE1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="E" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donneesE1=$reponseE1->fetch();
			
			$reponseE1=$donneesE1['RDC_REPONSE'];
			$commentaireE1=$donneesE1['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td>E-Evaluation des soldes</td>
			<td><div id="eval1" style="color:blue"><u>Assurez-vous que les piaements des créances sont rééls?</u></div></td>
			<td  align="center"><?php echo $reponseE1; ?></td>
			<td><?php echo $commentaireE1; ?></td>
		</tr>
		<!------------------------------------------------E2-------------------------------------------->
		<?php
			$reponseE2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="E" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donneesE2=$reponseE2->fetch();
			
			$reponseE2=$donneesE2['RDC_REPONSE'];
			$commentaireE2=$donneesE2['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="eval2" style="color:blue"><u>Assurez-vous qu'un système de suivi des créances litigieuses en cours a été instauré?</u></div></td>
			<td  align="center"><?php echo $reponseE2; ?></td>
			<td><?php echo $commentaireE2; ?></td>
		</tr>
		<!------------------------------------------------E3-------------------------------------------->
		<?php
			$reponseE3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="E" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donneesE3=$reponseE3->fetch();
			
			$reponseE3=$donneesE3['RDC_REPONSE'];
			$commentaireE3=$donneesE3['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="eval22" style="color:blue"><u>Assurez-vous que toutes créances douteuses/litigieuses sont correctement suivies et justifiées ?</u></div></td>
			<td  align="center"><?php echo $reponseE3; ?></td>
			<td><?php echo $commentaireE3; ?></td>
		</tr>
		<!------------------------------------------------E4-------------------------------------------->
		<?php
			$reponseE4=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="E" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donneesE4=$reponseE4->fetch();
			
			$reponseE4=$donneesE4['RDC_REPONSE'];
			$commentaireE4=$donneesE4['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="eval222" style="color:blue"><u>Assurez-vous que toutes les créances douteuses provisionnées déjà payées ont fait l'objet d'une reprise sur provision?</u></div></td>
			<td  align="center"><?php echo $reponseE4; ?></td>
			<td><?php echo $commentaireE4; ?></td>
		</tr>
		<!------------------------------------------------E5-------------------------------------------->
		<?php
			$reponseE5=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="E" and RDC_RANG=5 and MISSION_ID='.$mission_id);
			
			$donneesE5=$reponseE5->fetch();
			
			$reponseE5=$donneesE5['RDC_REPONSE'];
			$commentaireE5=$donneesE5['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="eval3" style="color:blue"><u>A-t-on vérifié que les créances anciennes n' ont pas de caractère douteux ?</u></div></td>
			<td  align="center"><?php echo $reponseE5; ?></td>
			<td><?php echo $commentaireE5; ?></td>
		</tr>
		<!------------------------------------------------E6-------------------------------------------->
		<?php
			$reponseE6=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="E" and RDC_RANG=6 and MISSION_ID='.$mission_id);
			
			$donneesE6=$reponseE6->fetch();
			
			$reponseE6=$donneesE6['RDC_REPONSE'];
			$commentaireE6=$donneesE6['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="eval4" style="color:blue"><u>Confirmez-vous que l'ensemble des créances libellées en monnaies étrangères a fait l'objet de réévaluation au taux de change de clôture de la BCM?</u></div></td>
			<td  align="center"><?php echo $reponseE6; ?></td>
			<td><?php echo $commentaireE6; ?></td>
		</tr>
		<!------------------------------------------------------------------------------------------->
		<!------------------------------------------------F1-------------------------------------------->
		<?php
			$reponseF1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="F" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donneesF1=$reponseF1->fetch();
			
			$reponseF1=$donneesF1['RDC_REPONSE'];
			$commentaireF1=$donneesF1['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td>F-Rattachemant des opérations</td>
			<td><div id="rattach1" style="color:blue"><u>Assurez-vous que la numérotation chronologique de la dernière facture de vente de l'exercice N et la première facture de vente de l'exercice N+1 a été respectée ?</u></div></td>
			<td  align="center"><?php echo $reponseF1; ?></td>
			<td><?php echo $commentaireF1; ?></td>
		</tr>
		<!------------------------------------------------F2-------------------------------------------->
		<?php
			$reponseF2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="F" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donneesF2=$reponseF2->fetch();
			
			$reponseF2=$donneesF2['RDC_REPONSE'];
			$commentaireF2=$donneesF2['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="rattach11" style="color:blue"><u>Assurez-vous que les factures de ventes de l'exerice N ont été tous comptabilisées dans le bon exercice?</u></div></td>
			<td  align="center"><?php echo $reponseF2; ?></td>
			<td><?php echo $commentaireF2; ?></td>
		</tr>
		<!------------------------------------------------F3-------------------------------------------->
		<?php
			$reponseF3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="F" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donneesF3=$reponseF3->fetch();
			
			$reponseF3=$donneesF3['RDC_REPONSE'];
			$commentaireF3=$donneesF3['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="rattach2" style="color:blue"><u>Les produits non encore facturés sont-ils comptabilisés dans l'exercice N?</u></div></td>
			<td  align="center"><?php echo $reponseF3; ?></td>
			<td><?php echo $commentaireF3; ?></td>
		</tr>
		<!------------------------------------------------------------------------------------------->
		<!------------------------------------------------G1-------------------------------------------->
		<?php
			$reponseG1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="G" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donneesG1=$reponseG1->fetch();
			
			$reponseG1=$donneesG1['RDC_REPONSE'];
			$commentaireG1=$donneesG1['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td>G-Juridique fiscal et divers</td>
			<td><div id="jurid1" style="color:blue"><u>Assurez-vous que les dotations aux provisions pour perte de valeur des comptes clients ne respectant pas les critères pour être admises en déduction dans le calcul du résultat fiscal ont été réintégrées?</u></div></td>
			<td  align="center"><?php echo $reponseG1; ?></td>
			<td><?php echo $commentaireG1; ?></td>
		</tr>
		<!------------------------------------------------G2-------------------------------------------->
		<?php
			$reponseG2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="G" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donneesG2=$reponseG2->fetch();
			
			$reponseG2=$donneesG2['RDC_REPONSE'];
			$commentaireG2=$donneesG2['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="jurid11" style="color:blue"><u>Assurez-vous que les reprises sur provisions dont les dotations correspondantes ont fait l'objet de réintégrations lors de sa constatation ont été déduites du résultat fiscal?</u></div></td>
			<td  align="center"><?php echo $reponseG2; ?></td>
			<td><?php echo $commentaireG2; ?></td>
		</tr>
		<!------------------------------------------------G3-------------------------------------------->
		<?php
			$reponseG3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="G" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donneesG3=$reponseG3->fetch();
			
			$reponseG3=$donneesG3['RDC_REPONSE'];
			$commentaireG3=$donneesG3['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="jurid2" style="color:blue"><u>Confirmez-vous l'absence d'écart entre le chiffre d'affaires déclaré et celui comptabilisé?</u></div></td>
			<td  align="center"><?php echo $reponseG3; ?></td>
			<td><?php echo $commentaireG3; ?></td>
		</tr>
		<!------------------------------------------------G4-------------------------------------------->
		<?php
			$reponseG4=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="G" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donneesG4=$reponseG4->fetch();
			
			$reponseG4=$donneesG4['RDC_REPONSE'];
			$commentaireG4=$donneesG4['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="jurid22" style="color:blue"><u>Sinon, l'écart est-il justifié ou régularisé?</u></div></td>
			<td  align="center"><?php echo $reponseG4; ?></td>
			<td><?php echo $commentaireG4; ?></td>
		</tr>
		<!------------------------------------------------G5-------------------------------------------->
		<?php
			$reponseG5=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="G" and RDC_RANG=5 and MISSION_ID='.$mission_id);
			
			$donneesG5=$reponseG5->fetch();
			
			$reponseG5=$donneesG5['RDC_REPONSE'];
			$commentaireG5=$donneesG5['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="jurid222" style="color:blue"><u>Les soldes comptables des comptes de TVA (collectées, déductibles, à payer,…) correspondent-ils avec ceux des bordereaux de déclarations du dernier mois de l'exercice?</u></div></td>
			<td  align="center"><?php echo $reponseG5; ?></td>
			<td><?php echo $commentaireG5; ?></td>
		</tr>
		<!------------------------------------------------G6-------------------------------------------->
		<?php
			$reponseG6=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="G" and RDC_RANG=6 and MISSION_ID='.$mission_id);
			
			$donneesG6=$reponseG6->fetch();
			
			$reponseG6=$donneesG6['RDC_REPONSE'];
			$commentaireG6=$donneesG6['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="jurid3" style="color:blue"><u>Tous les paiements des clients ont-été-t-il effectués par voie bancaire?</u></div></td>
			<td  align="center"><?php echo $reponseG6; ?></td>
			<td><?php echo $commentaireG6; ?></td>
		</tr>
		<!---------------------------------------------------------------------------------------------->
		<!------------------------------------------------H1-------------------------------------------->
		<?php
			$reponseH1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="H" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donneesH1=$reponseH1->fetch();
			
			$reponseH1=$donneesH1['RDC_REPONSE'];
			$commentaireH1=$donneesH1['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td>H-Informations et présentations</td>
			<td><div id="info1" style="color:blue"><u>Les comptes clients à solde débiteur sont ils présentés à l'actif courant du bilan et ceux à solde créditeur au passif courant du bilan ?</u></div></td>
			<td  align="center"><?php echo $reponseH1; ?></td>
			<td><?php echo $commentaireH1; ?></td>
		</tr>
		<!------------------------------------------------H2-------------------------------------------->
		<?php
			$reponseH2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="H" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donneesH2=$reponseH2->fetch();
			
			$reponseH2=$donneesH2['RDC_REPONSE'];
			$commentaireH2=$donneesH2['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="info2" style="color:blue"><u>Le passage de comptes au poste préconisé par le PCG est il bien respecté ?</u></div></td>
			<td  align="center"><?php echo $reponseH2; ?></td>
			<td><?php echo $commentaireH2; ?></td>
		</tr>
		<!------------------------------------------------H3---------------------------------------------->
		<?php
			$reponseH3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="H" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donneesH3=$reponseH3->fetch();
			
			$reponseH3=$donneesH3['RDC_REPONSE'];
			$commentaireH3=$donneesH3['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="info3" style="color:blue"><u>Confirmez - vous que les détails des comptes clients sont présentés en annexes ?</u></div></td>
			<td  align="center"><?php echo $reponseH3; ?></td>
			<td><?php echo $commentaireH3; ?></td>
		</tr>
		<!------------------------------------------------H4------------------------------------------------>
		<?php
			$reponseH4=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="prod_client" and RDC_OBJECTIF="H" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donneesH4=$reponseH4->fetch();
			
			$reponseH4=$donneesH4['RDC_REPONSE'];
			$commentaireH4=$donneesH4['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white" align="left">
			<td></td>
			<td><div id="info4" style="color:blue"><u>Assurez-vous que toutes les informations relatives aux créances et ventes figurent dans les annexes?</u></div></td>
			<td  align="center"><?php echo $reponseH4; ?></td>
			<td><?php echo $commentaireH4; ?></td>
		</tr>
	</table>
</div>
<input type="button" value="Retour" id="bt_retour" class="bouton"/>
<input type="button" value="synthèse" id="synthese_feuille" class="bouton">
</body>
</html>