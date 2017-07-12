<?php
@session_start();

$mission_id=@$_SESSION['idMission'];
?>
<html>
<head>

<link rel="stylesheet" href="../RDC/tresorerie/css.css">
<script>
	// Droit cycle by Tolotra
    // Page : RDC ->  F-Charges Fournisseurs
    // Tâche :  Revue comptes Charges Fournisseurs, 37
    $.ajax(
        {
            type: 'POST',
            url: 'droitCycle.php',
            data: {task_id: 37},
            success: function (e) {
                var result = 0 === Number(e);
                $("#synthese_feuille").attr('disabled', result);
            }
        }
    );
	$(function(){
		$('#bt_retour').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/index.php");
		});
		
		$('#synthese_feuille').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/synthese_charge.php");
		});
		$('#coh1').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/A_coherence/coherence1.php?coherence_visible=OK");
		});
		$('#coh11').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/A_coherence/coherence1.php?coherence_visible=OK");
		});
		$('#coh2').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/A_coherence/coherence2.php?coherence_visible=OK");
		});
		$('#coh3').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/A_coherence/coherence3.php?coherence_visible=OK");
		});
		$('#coh33').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/A_coherence/coherence3.php?coherence_visible=OK");
		});
		$('#coh4').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/A_coherence/coherence4.php?coherence_visible=OK");
		});
		$('#coh44').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/A_coherence/coherence4.php?coherence_visible=OK");
		});
		$('#coh5').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/A_coherence/coherence5.php?coherence_visible=OK");
		});
		$('#coh55').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/A_coherence/coherence5.php?coherence_visible=OK");
		});
		$('#coh6').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/A_coherence/coherence6.php?coherence_visible=OK");
		});
		$('#coh7').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/A_coherence/coherence7.php?coherence_visible=OK");
		});
		$('#coh77').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/A_coherence/coherence7.php?coherence_visible=OK");
		});
		$('#coh777').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/A_coherence/coherence7.php?coherence_visible=OK");
		});
		$('#exhaust1').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/B_exhaustivite/exhaustivite1.php?exhaustivite_visible=OK");
		});
		$('#reg1').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/C_regularite/regularite1.php?regularite_visible=OK");
		});
		$('#reg11').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/C_regularite/regularite1.php?regularite_visible=OK");
		});
		$('#reg2').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/C_regularite/regularite2.php?regularite_visible=OK");
		});
		$('#reg3').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/C_regularite/regularite3.php?regularite_visible=OK");
		});
		$('#reg33').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/C_regularite/regularite3.php?regularite_visible=OK");
		});
		$('#exist1').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/D_existence/existence1.php?existence_visible=OK");
		});
		$('#exist11').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/D_existence/existence1.php?existence_visible=OK");
		});
		$('#exist2').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/D_existence/existence2.php?existence_visible=OK");
		});
		$('#exist22').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/D_existence/existence2.php?existence_visible=OK");
		});
		$('#evaluat1').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/E_evaluation/evaluation1.php?evaluation_visible=OK");
		});
		$('#evaluat11').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/E_evaluation/evaluation1.php?evaluation_visible=OK");
		});
		$('#evaluat2').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/E_evaluation/evaluation2.php?evaluation_visible=OK");
		});
		$('#evaluat22').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/E_evaluation/evaluation2.php?evaluation_visible=OK");
		});
		$('#evaluat3').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/E_evaluation/evaluation3.php?evaluation_visible=OK");
		});
		$('#evaluat33').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/E_evaluation/evaluation3.php?evaluation_visible=OK");
		});
		$('#evaluat333').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/E_evaluation/evaluation3.php?evaluation_visible=OK");
		});
		$('#rattach1').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/F_rattachement/rattachement1.php?rattachement_visible=OK");
		});
		$('#rattach2').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/F_rattachement/rattachement2.php?rattachement_visible=OK");
		});
		$('#jurid1').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/G_juridique/juridique1.php?juridique_visible=OK");
		});
		$('#jurid1_2').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/G_juridique/juridique1_part2.php?juridique_visible=OK");
		});
		$('#jurid1_22').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/G_juridique/juridique1_part2.php?juridique_visible=OK");
		});
		$('#jurid2').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/G_juridique/juridique2.php?juridique_visible=OK");
		});
		$('#jurid2_2').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/G_juridique/juridique2_part2.php?juridique_visible=OK");
		});
		$('#info1').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/H_information/information1.php?information_visible=OK");
		});
		$('#info2').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/H_information/information2.php?information_visible=OK");
		});
		$('#info3').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/H_information/information3.php?information_visible=OK");
		});
		$('#info4').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/H_information/information4.php?information_visible=OK");
		});
		
	});
	
</script>
</head>
<body>
<table style="text-align:center;background-color:#00698d;color:white;width:100%;padding-top:5px;">
	<tr>
		<td><label>LA FEUILLE MAITRESSE DU CYCLE CHARGES ET FOURNISSEURS</label></td>
	</tr>
</table>
<div>
	<table width="100%" style="color:white;">
		<tr align="center" bgcolor="#6495ED">
			<td width="20%">Objéctifs d'audit</td>
			<td width="40%">Questions / tests</td>
			<td width="10%" style="color:white;">Réponses</td>
			<td width="30%">Commentaires</td>
		</tr>
	</table>
<div id="table_id" style="overflow:auto;height:428px;">
	<table style="background-color:#6495ED" border="1">		
		<?php
			include '../../connexion.php';	
			
			$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="A" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees1=$reponse1->fetch();
			
			$reponse1=$donnees1['RDC_REPONSE'];
			$commentaire1=$donnees1['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc">A-Cohérence et principes comptables</td>
			<td width="40.7%"><div id="coh1" style="color:blue"><u>A-t-on effectué une revue analytique des charges par rapport à l'exercice précédent ?</u></div></td>
			<td width="10.1%"><?php echo $reponse1; ?></td>
			<td width="29%"><?php echo $commentaire1; ?></td>
		</tr>
		<?php			
			$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="A" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees2=$reponse2->fetch();
			
			$reponse2=$donnees2['RDC_REPONSE'];
			$commentaire2=$donnees2['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh11" style="color:blue"><u>Les écarts significatifs sont-ils tous justifiés et expliqués ?</u></div></td>
			<td width="10.1%"><?php echo $reponse2; ?></td>
			<td width="29%"><?php echo $commentaire2; ?></td>
		</tr>
		<?php			
			$reponse3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="A" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donnees3=$reponse3->fetch();
			
			$reponse3=$donnees3['RDC_REPONSE'];
			$commentaire3=$donnees3['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh2" style="color:blue"><u>A-t-on examiné l'évolution des ratios les plus pertinents (délai moyen de règlement notamment) ?</u></div></td>
			<td width="10.1%"><?php echo $reponse3; ?></td>
			<td width="29%"><?php echo $commentaire3; ?></td>
		</tr>
		<?php			
			$reponse4=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="A" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donnees4=$reponse4->fetch();
			
			$reponse4=$donnees4['RDC_REPONSE'];
			$commentaire4=$donnees4['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh3" style="color:blue"><u>A-t-on effectué une analyse des charges par rapport au budget?</u></div></td>
			<td width="10.1%"><?php echo $reponse4; ?></td>
			<td width="29%"><?php echo $commentaire4; ?></td>
		</tr>
		<?php			
			$reponse5=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="A" and RDC_RANG=5 and MISSION_ID='.$mission_id);
			
			$donnees5=$reponse5->fetch();
			
			$reponse5=$donnees5['RDC_REPONSE'];
			$commentaire5=$donnees5['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh33" style="color:blue"><u>Les écarts significatifs sont-ils tous justifiés et expliqués ?</u></div></td>
			<td width="10.1%"><?php echo $reponse5; ?></td>
			<td width="29%"><?php echo $commentaire5; ?></td>
		</tr>
		<?php			
			$reponse6=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="A" and RDC_RANG=6 and MISSION_ID='.$mission_id);
			
			$donnees6=$reponse6->fetch();
			
			$reponse6=$donnees6['RDC_REPONSE'];
			$commentaire6=$donnees6['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh4" style="color:blue"><u>A-t-on calculé les ratios relatifs aux comptes fournisseurs?</u></div></td>
			<td width="10.1%"><?php echo $reponse6; ?></td>
			<td width="29%"><?php echo $commentaire6; ?></td>
		</tr>
		<?php			
			$reponse7=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="A" and RDC_RANG=7 and MISSION_ID='.$mission_id);
			
			$donnees7=$reponse7->fetch();
			
			$reponse7=$donnees7['RDC_REPONSE'];
			$commentaire7=$donnees7['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh44" style="color:blue"><u>Les a-t-on analysé ?</u></div></td>
			<td width="10.1%"><?php echo $reponse7; ?></td>
			<td width="29%"><?php echo $commentaire7; ?></td>
		</tr>
		<?php			
			$reponse8=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="A" and RDC_RANG=8 and MISSION_ID='.$mission_id);
			
			$donnees8=$reponse8->fetch();
			
			$reponse8=$donnees8['RDC_REPONSE'];
			$commentaire8=$donnees8['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh5" style="color:blue"><u>A-t-on calculé les marges brutes ?</u></div></td>
			<td width="10.1%"><?php echo $reponse8; ?></td>
			<td width="29%"><?php echo $commentaire8; ?></td>
		</tr>
		<?php			
			$reponse9=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="A" and RDC_RANG=9 and MISSION_ID='.$mission_id);
			
			$donnees9=$reponse9->fetch();
			
			$reponse9=$donnees9['RDC_REPONSE'];
			$commentaire9=$donnees9['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh55" style="color:blue"><u>Les a-t-on analysé ?</u></div></td>
			<td width="10.1%"><?php echo $reponse9; ?></td>
			<td width="29%"><?php echo $commentaire9; ?></td>
		</tr>
		<?php			
			$reponse10=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="A" and RDC_RANG=10 and MISSION_ID='.$mission_id);
			
			$donnees10=$reponse10->fetch();
			
			$reponse10=$donnees10['RDC_REPONSE'];
			$commentaire10=$donnees10['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh6" style="color:blue"><u>Les soldes des grand-livres/balance auxiliaire/balance âgée/balance générale sont-ils conformes entre eux ?</u></div></td>
			<td width="10.1%"><?php echo $reponse10; ?></td>
			<td width="29%"><?php echo $commentaire10; ?></td>
		</tr>
		<?php			
			$reponse11=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="A" and RDC_RANG=11 and MISSION_ID='.$mission_id);
			
			$donnees11=$reponse11->fetch();
			
			$reponse11=$donnees11['RDC_REPONSE'];
			$commentaire11=$donnees11['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh7" style="color:blue"><u>Les principes comptables appliqués par la société sont-ils cohérents avec le secteur dans lequel la société exerce ?</u></div></td>
			<td width="10.1%"><?php echo $reponse11; ?></td>
			<td width="29%"><?php echo $commentaire11; ?></td>
		</tr>
		<?php			
			$reponse12=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="A" and RDC_RANG=12 and MISSION_ID='.$mission_id);
			
			$donnees12=$reponse12->fetch();
			
			$reponse12=$donnees12['RDC_REPONSE'];
			$commentaire12=$donnees12['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh77" style="color:blue"><u>Confirmez-vous l'existence d'une note définissant les critères d'affectation en charges/immo ?</u></div></td>
			<td width="10.1%"><?php echo $reponse12; ?></td>
			<td width="29%"><?php echo $commentaire12; ?></td>
		</tr>
		<?php			
			$reponse13=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="A" and RDC_RANG=13 and MISSION_ID='.$mission_id);
			
			$donnees13=$reponse13->fetch();
			
			$reponse13=$donnees13['RDC_REPONSE'];
			$commentaire13=$donnees13['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh777" style="color:blue"><u>Avez-vous contrôlé sa mise en application ?</u></div></td>
			<td width="10.1%"><?php echo $reponse13; ?></td>
			<td width="29%"><?php echo $commentaire13; ?></td>
		</tr>
		<?php			
			$reponse14=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="B" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees14=$reponse14->fetch();
			
			$reponse14=$donnees14['RDC_REPONSE'];
			$commentaire14=$donnees14['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc">B - Exhaustivité des enregistrements</td>
			<td width="40.7%"><div id="exhaust1" style="color:blue"><u>Sur la base de la sélection, confirmez-vous que la comptabilisation des opérations d'achat de biens et services est exhaustive ?</u></div></td>
			<td width="10.1%"><?php echo $reponse14; ?></td>
			<td width="29%"><?php echo $commentaire14; ?></td>
		</tr>
		<?php			
			$reponse15=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="C" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees15=$reponse15->fetch();
			
			$reponse15=$donnees15['RDC_REPONSE'];
			$commentaire15=$donnees15['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc"> C - Régularité des enregistrements</td>
			<td width="40.7%"><div id="reg1" style="color:blue"><u>Les opérations sélectionnées/testées ont-elles été enregistrées dans les bons comptes de charges ?</u></div></td>
			<td width="10.1%"><?php echo $reponse15; ?></td>
			<td width="29%"><?php echo $commentaire15; ?></td>
		</tr>
		<?php			
			$reponse16=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="C" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees16=$reponse16->fetch();
			
			$reponse16=$donnees16['RDC_REPONSE'];
			$commentaire16=$donnees16['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="reg11" style="color:blue"><u>Sur la base de la sélection, confirmez-vous que les éléments inscrits dans les factures correspondent avec les bons de commande et les bons de livraison ?</u></div></td>
			<td width="10.1%"><?php echo $reponse16; ?></td>
			<td width="29%"><?php echo $commentaire16; ?></td>
		</tr>
		<?php			
			$reponse17=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="C" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donnees17=$reponse17->fetch();
			
			$reponse17=$donnees17['RDC_REPONSE'];
			$commentaire17=$donnees17['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="reg3" style="color:blue"><u>Les achats et les paiements ont-ils été enregistrés aux tiers correspondants ?</u></div></td>
			<td width="10.1%"><?php echo $reponse17; ?></td>
			<td width="29%"><?php echo $commentaire17; ?></td>
		</tr>
		<?php			
			$reponse18=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="C" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donnees18=$reponse18->fetch();
			
			$reponse18=$donnees18['RDC_REPONSE'];
			$commentaire18=$donnees18['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="reg33" style="color:blue"><u>Avez-vous contrôlé le bon traitement des avances et acomptes?</u></div></td>
			<td width="10.1%"><?php echo $reponse18; ?></td>
			<td width="29%"><?php echo $commentaire18; ?></td>
		</tr>
		<?php			
			$reponse19=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="C" and RDC_RANG=5 and MISSION_ID='.$mission_id);
			
			$donnees19=$reponse19->fetch();
			
			$reponse19=$donnees19['RDC_REPONSE'];
			$commentaire19=$donnees19['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="reg2" style="color:blue"><u>Confirmez-vous que tous les fournisseurs à solde débiteur sont validés ?</u></div></td>
			<td width="10.1%"><?php echo $reponse19; ?></td>
			<td width="29%"><?php echo $commentaire19; ?></td>
		</tr>
		<?php			
			$reponse20=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="D" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees20=$reponse20->fetch();
			
			$reponse20=$donnees20['RDC_REPONSE'];
			$commentaire20=$donnees20['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc">D - Existence des soldes</td>
			<td width="40.7%"><div id="exist1" style="color:blue"><u>Le solde de chaque fournisseur sélectionné est-il justifié ?</u></div></td>
			<td width="10.1%"><?php echo $reponse20; ?></td>
			<td width="29%"><?php echo $commentaire20; ?></td>
		</tr>
		<?php			
			$reponse21=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="D" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees21=$reponse21->fetch();
			
			$reponse21=$donnees21['RDC_REPONSE'];
			$commentaire21=$donnees21['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="exist11" style="color:blue"><u>Les travaux de lettrage des comptes fournisseurs sont-ils à jour </u></div></td>
			<td width="10.1%"><?php echo $reponse21; ?></td>
			<td width="29%"><?php echo $commentaire21; ?></td>
		</tr>
		<?php			
			$reponse22=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="D" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donnees22=$reponse22->fetch();
			
			$reponse22=$donnees22['RDC_REPONSE'];
			$commentaire22=$donnees22['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="exist2" style="color:blue"><u>Les résultats de la circularisation correspondent-ils avec les soldes comptables ? Si non, les écarts sont-ils justifiés ?</u></div></td>
			<td width="10.1%"><?php echo $reponse22; ?></td>
			<td width="29%"><?php echo $commentaire22; ?></td>
		</tr>
		<?php			
			$reponse23=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="D" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donnees23=$reponse23->fetch();
			
			$reponse23=$donnees23['RDC_REPONSE'];
			$commentaire23=$donnees23['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="exist22" style="color:blue"><u>Tous les comptes composant chaque poste sont-ils conformes aux soldes de la balance générale ?</u></div></td>
			<td width="10.1%"><?php echo $reponse23; ?></td>
			<td width="29%"><?php echo $commentaire23; ?></td>
		</tr>
		<?php			
			$reponse24=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="E" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees24=$reponse24->fetch();
			
			$reponse24=$donnees24['RDC_REPONSE'];
			$commentaire24=$donnees24['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc">E - Evaluation des soldes</td>
			<td width="40.7%"><div id="evaluat1" style="color:blue"><u>Les soldes des comptes fournisseurs datant de plus d'un an sont-ils tous justifiés?</u></div></td>
			<td width="10.1%"><?php echo $reponse24; ?></td>
			<td width="29%"><?php echo $commentaire24; ?></td>
		</tr>
		<?php			
			$reponse25=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="E" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees25=$reponse25->fetch();
			
			$reponse25=$donnees25['RDC_REPONSE'];
			$commentaire25=$donnees25['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="evaluat11" style="color:blue"><u>A-t-on vérifié que les dettes anciennes n'ont pas de caractère litigieux ?</u></div></td>
			<td width="10.1%"><?php echo $reponse25; ?></td>
			<td width="29%"><?php echo $commentaire25; ?></td>
		</tr>
		<?php			
			$reponse26=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="E" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donnees26=$reponse26->fetch();
			
			$reponse26=$donnees26['RDC_REPONSE'];
			$commentaire26=$donnees26['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="evaluat2" style="color:blue"><u>Assurez-vous que tous les litiges fournisseurs sont correctement suivis et justifiés ? </u></div></td>
			<td width="10.1%"><?php echo $reponse26; ?></td>
			<td width="29%"><?php echo $commentaire26; ?></td>
		</tr>
		<?php			
			$reponse27=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="E" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donnees27=$reponse27->fetch();
			
			$reponse27=$donnees27['RDC_REPONSE'];
			$commentaire27=$donnees27['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="evaluat22" style="color:blue"><u>Les opérations se rattachant aux dossiers litigieux sont-ils régulièrement reflétés dans la comptabilité ? </u></div></td>
			<td width="10.1%"><?php echo $reponse27; ?></td>
			<td width="29%"><?php echo $commentaire27; ?></td>
		</tr>
		<?php			
			$reponse28=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="E" and RDC_RANG=5 and MISSION_ID='.$mission_id);
			
			$donnees28=$reponse28->fetch();
			
			$reponse28=$donnees28['RDC_REPONSE'];
			$commentaire28=$donnees28['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="evaluat3" style="color:blue"><u>Tous les fournisseurs en devises ont-ils été réévalués aux taux de clôture ? </u></div></td>
			<td width="10.1%"><?php echo $reponse28; ?></td>
			<td width="29%"><?php echo $commentaire28; ?></td>
		</tr>
		<?php			
			$reponse29=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="E" and RDC_RANG=6 and MISSION_ID='.$mission_id);
			
			$donnees29=$reponse29->fetch();
			
			$reponse29=$donnees29['RDC_REPONSE'];
			$commentaire29=$donnees29['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="evaluat33" style="color:blue"><u>Les écarts résultant de la réévaluation ont-ils été correctement comptabilisés ?</u></div></td>
			<td width="10.1%"><?php echo $reponse29; ?></td>
			<td width="29%"><?php echo $commentaire29; ?></td>
		</tr>
		<?php			
			$reponse30=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="E" and RDC_RANG=7 and MISSION_ID='.$mission_id);
			
			$donnees30=$reponse30->fetch();
			
			$reponse30=$donnees30['RDC_REPONSE'];
			$commentaire30=$donnees30['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="evaluat333" style="color:blue"><u>Les taux utilisés correspondent-ils aux taux indiqués par la BCM ou d'autres taux pouvant être admis</u></div></td>
			<td width="10.1%"><?php echo $reponse30; ?></td>
			<td width="29%"><?php echo $commentaire30; ?></td>
		</tr>
		<?php			
			$reponse31=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="F" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees31=$reponse31->fetch();
			
			$reponse31=$donnees31['RDC_REPONSE'];
			$commentaire31=$donnees31['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc">F - Rattachement des opérations</td>
			<td width="40.7%"><div id="rattach1" style="color:blue"><u>Les opérations enregistrées sont-elles comptabilisées à l'exercice auquel elles se rattachent ?</u></div></td>
			<td width="10.1%"><?php echo $reponse31; ?></td>
			<td width="29%"><?php echo $commentaire31; ?></td>
		</tr>
		<?php			
			$reponse32=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="F" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees32=$reponse32->fetch();
			
			$reponse32=$donnees32['RDC_REPONSE'];
			$commentaire32=$donnees32['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="rattach2" style="color:blue"><u>Les ristournes de fin d'année et avoirs à recevoir ont-ils été tous comptabilisés ?</u></div></td>
			<td width="10.1%"><?php echo $reponse32; ?></td>
			<td width="29%"><?php echo $commentaire32; ?></td>
		</tr>
		<?php			
			$reponse33=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="G" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees33=$reponse33->fetch();
			
			$reponse33=$donnees33['RDC_REPONSE'];
			$commentaire33=$donnees33['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc">G - Juridique fiscal et divers</td>
			<td width="40.7%"><div id="jurid1" style="color:blue"><u>Par pointage aux PJ, avez-vous constaté des opérations n'ayant pas de lien direct avec l'exploitation de la société ?</u></div></td>
			<td width="10.1%"><?php echo $reponse33; ?></td>
			<td width="29%"><?php echo $commentaire33; ?></td>
		</tr>
		<?php			
			$reponse34=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="G" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees34=$reponse34->fetch();
			
			$reponse34=$donnees34['RDC_REPONSE'];
			$commentaire34=$donnees34['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="jurid1_2" style="color:blue"><u>Ont-elles été réintégrées lors du calcul du résultat fiscal ?</u></div></td>
			<td width="10.1%"><?php echo $reponse34; ?></td>
			<td width="29%"><?php echo $commentaire34; ?></td>
		</tr>
		<?php			
			$reponse35=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="G" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donnees35=$reponse35->fetch();
			
			$reponse35=$donnees35['RDC_REPONSE'];
			$commentaire35=$donnees35['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="jurid1_22" style="color:blue"><u>Assurez-vous que ces opérations passées en charges sont appuyées par des contrats en bonne et due forme ?</u></div></td>
			<td width="10.1%"><?php echo $reponse35; ?></td>
			<td width="29%"><?php echo $commentaire35; ?></td>
		</tr>
		<?php			
			$reponse36=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="G" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donnees36=$reponse36->fetch();
			
			$reponse36=$donnees36['RDC_REPONSE'];
			$commentaire36=$donnees36['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="jurid2" style="color:blue"><u>Les pièces justificatives des charges comportent-elles les informations exigées par l'Administration fiscale ?</u></div></td>
			<td width="10.1%"><?php echo $reponse36; ?></td>
			<td width="29%"><?php echo $commentaire36; ?></td>
		</tr>
		<?php			
			$reponse37=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="G" and RDC_RANG=5 and MISSION_ID='.$mission_id);
			
			$donnees37=$reponse37->fetch();
			
			$reponse37=$donnees37['RDC_REPONSE'];
			$commentaire37=$donnees37['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="jurid2_2" style="color:blue"><u>Vous êtes-vous référé au plafond de déductibilité à l'IR de 2,5% pour les PJ non conformes ?</u></div></td>
			<td width="10.1%"><?php echo $reponse37; ?></td>
			<td width="29%"><?php echo $commentaire37; ?></td>
		</tr>
		<?php			
			$reponse38=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="H" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees38=$reponse38->fetch();
			
			$reponse38=$donnees38['RDC_REPONSE'];
			$commentaire38=$donnees38['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc"> H - Information et présentation</td>
			<td width="40.7%"><div id="info1" style="color:blue"><u>Les tiers à solde débiteur sont-ils présentés à l'actif courant du bilan et ceux à solde créditeur au passif courant du bilan ?</u></div></td>
			<td width="10.1%"><?php echo $reponse38; ?></td>
			<td width="29%"><?php echo $commentaire38; ?></td>
		</tr>
		<?php			
			$reponse39=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="H" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees39=$reponse39->fetch();
			
			$reponse39=$donnees39['RDC_REPONSE'];
			$commentaire39=$donnees39['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="info2" style="color:blue"><u>Le passage de comptes au poste préconisé par le PCG est-il bien respecté ?</u></div></td>
			<td width="10.1%"><?php echo $reponse39; ?></td>
			<td width="29%"><?php echo $commentaire39; ?></td>
		</tr>
		<?php			
			$reponse40=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="H" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donnees40=$reponse40->fetch();
			
			$reponse40=$donnees40['RDC_REPONSE'];
			$commentaire40=$donnees40['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="info3" style="color:blue"><u>Confirmez-vous que tous les détails des états financiers ainsi que toutes les informations devant figurer dans les annexes aux états financiers y sont présentées?</u></div></td>
			<td width="10.1%"><?php echo $reponse40; ?></td>
			<td width="29%"><?php echo $commentaire40; ?></td>
		</tr>
		<?php			
			$reponse41=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="H" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donnees41=$reponse41->fetch();
			
			$reponse41=$donnees41['RDC_REPONSE'];
			$commentaire41=$donnees41['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="info4" style="color:blue"><u>Tous les postes du bilan sont-ils suffisamment renseignés dans les annexes?</u></div></td>
			<td width="10.1%"><?php echo $reponse41; ?></td>
			<td width="29%"><?php echo $commentaire41; ?></td>
		</tr>
	</table>
</div>
<input type="button" value="Retour" id="bt_retour" class="bouton"/>
<input type="button" value="synthèse" id="synthese_feuille" class="bouton">
</body>
</html>