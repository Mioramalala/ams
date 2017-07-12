<?php
@session_start();

$mission_id=@$_SESSION['idMission'];
?>
<html>
<head>

<link rel="stylesheet" href="../RDC/immobilisationCorpIncorp/css.css">
<script>
 	// Droit cycle by Tolotra
    // Page : RDC -> Immobilisations
    // Tâche : B-Immobilisations incorporelles et corporelles, 13
    $.ajax(
        {
            type: 'POST',
            url: 'droitCycle.php',
            data: {task_id: 13},
            success: function (e) {
                var result = 0 === Number(e);
                $("#synthese_feuille").attr('disabled', result);
            }
        }
    );

	$(function(){
		$('#bt_retour').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/index.php",stopWaiting);
		});
		
		$('#synthese_feuille').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/synthese_immo.php",stopWaiting);
		});
		
		$('#coh1').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/A_coherence/coherence1.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh11').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/A_coherence/coherence1.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh2').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/A_coherence/coherence2.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh3').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/A_coherence/coherence3.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh33').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/A_coherence/coherence3.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh333').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/A_coherence/coherence3.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh4').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/A_coherence/coherence4.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh44').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/A_coherence/coherence4.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh5').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/A_coherence/coherence5.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh55').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/A_coherence/coherence5.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh555').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/A_coherence/coherence5.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh5555').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/A_coherence/coherence5.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh55555').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/A_coherence/coherence5.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh6').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/A_coherence/coherence6.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh7').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/A_coherence/coherence7.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh77').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/A_coherence/coherence7.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh777').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/A_coherence/coherence7.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh8').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/A_coherence/coherence8.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh88').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/A_coherence/coherence8.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh888').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/A_coherence/coherence8.php?coherence_visible=OK",stopWaiting);
		});
		$('#exhaust1').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/B_exhaustivite/exhaustivite1.php?exhaustivite_visible=OK",stopWaiting);
		});
		$('#reg1').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/C_regularite/regularite1.php?regularite_visible=OK",stopWaiting);
		});
		$('#reg11').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/C_regularite/regularite1.php?regularite_visible=OK",stopWaiting);
		});
		$('#reg111').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/C_regularite/regularite1.php?regularite_visible=OK",stopWaiting);
		});
		$('#reg2').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/C_regularite/regularite2.php?regularite_visible=OK",stopWaiting);
		});
		$('#reg22').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/C_regularite/regularite2.php?regularite_visible=OK",stopWaiting);
		});
		$('#reg3').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/C_regularite/regularite3.php?regularite_visible=OK",stopWaiting);
		});
		$('#reg33').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/C_regularite/regularite3.php?regularite_visible=OK",stopWaiting);
		});
		$('#reg4').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/C_regularite/regularite4.php?regularite_visible=OK",stopWaiting);
		});
		$('#exist1').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/D_existence/existence1.php?existence_visible=OK",stopWaiting);
		});
		$('#exist11').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/D_existence/existence1.php?existence_visible=OK",stopWaiting);
		});
		$('#exist2').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/D_existence/existence2.php?existence_visible=OK",stopWaiting);
		});
		$('#exist3').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/D_existence/existence3.php?existence_visible=OK",stopWaiting);
		});
		$('#exist4').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/D_existence/existence4.php?existence_visible=OK",stopWaiting);
		});
		$('#exist44').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/D_existence/existence4.php?existence_visible=OK",stopWaiting);
		});
		$('#eval1').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/E_evaluation/evaluation1.php?evaluation_visible=OK",stopWaiting);
		});
		$('#eval11').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/E_evaluation/evaluation1.php?evaluation_visible=OK",stopWaiting);
		});
		$('#eval2').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/E_evaluation/evaluation2.php?evaluation_visible=OK",stopWaiting);
		});
		$('#eval22').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/E_evaluation/evaluation2.php?evaluation_visible=OK",stopWaiting);
		});
		$('#eval222').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/E_evaluation/evaluation2.php?evaluation_visible=OK",stopWaiting);
		});
		$('#eval2222').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/E_evaluation/evaluation2.php?evaluation_visible=OK",stopWaiting);
		});
		$('#eval3').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/E_evaluation/evaluation3.php?evaluation_visible=OK",stopWaiting);
		});
		$('#eval33').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/E_evaluation/evaluation3.php?evaluation_visible=OK",stopWaiting);
		});
		$('#rattach1').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/F_rattachement/rattachement1.php?rattachement_visible=OK",stopWaiting);
		});
		$('#rattach11').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/F_rattachement/rattachement1.php?rattachement_visible=OK",stopWaiting);
		});
		$('#rattach111').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/F_rattachement/rattachement1.php?rattachement_visible=OK",stopWaiting);
		});
		$('#rattach2').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/F_rattachement/rattachement2.php?rattachement_visible=OK",stopWaiting);
		});
		$('#jurid1').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/G_juridique/juridique1.php?juridique_visible=OK",stopWaiting);
		});
		$('#jurid2').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/G_juridique/juridique2.php?juridique_visible=OK",stopWaiting);
		});
		$('#jurid3').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/G_juridique/juridique3.php?juridique_visible=OK",stopWaiting);
		});
		$('#jurid4').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/G_juridique/juridique4.php?juridique_visible=OK",stopWaiting);
		});
		$('#jurid5').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/G_juridique/juridique5.php?juridique_visible=OK",stopWaiting);
		});
		$('#info1').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/H_information/information1.php?information_visible=OK",stopWaiting);
		});
		$('#info11').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/H_information/information1.php?information_visible=OK",stopWaiting);
		});
		$('#info111').click(function(){
			waiting();$('#contenue').load("RDC/immobilisationCorpIncorp/H_information/information1.php?information_visible=OK",stopWaiting);
		});
	
	});
</script>
</head>
<body>
<table style="text-align:center;background-color:#00698d;color:white;width:100%;padding-top:5px;">
	<tr>
		<td><label>LA FEUILLE MAITRESSE DU CYCLE IMMOBILISATIONS CORPORELLES ET INCORPORELLES</label></td>
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
			
			$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
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
			$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
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
			$reponse3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donnees3=$reponse3->fetch();
			
			$reponse3=$donnees3['RDC_REPONSE'];
			$commentaire3=$donnees3['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh2" style="color:blue"><u>Les montants portés dans le bilan/CR/tableau de variation des immobilisations/
			tableau d'amortissement des immobilisations sont-ils conformes entre eux ?</u></div></td>
			<td width="10.1%"><?php echo $reponse3; ?></td>
			<td width="29%"><?php echo $commentaire3; ?></td>
		</tr>
		<?php			
			$reponse4=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donnees4=$reponse4->fetch();
			
			$reponse4=$donnees4['RDC_REPONSE'];
			$commentaire4=$donnees4['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh3" style="color:blue"><u>Un rapprochement des investissements réalisés avec le budget a-t-il été réalisé ?</u></div></td>
			<td width="10.1%"><?php echo $reponse4; ?></td>
			<td width="29%"><?php echo $commentaire4; ?></td>
		</tr>
		<?php			
			$reponse5=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=5 and MISSION_ID='.$mission_id);
			
			$donnees5=$reponse5->fetch();
			
			$reponse5=$donnees5['RDC_REPONSE'];
			$commentaire5=$donnees5['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh33" style="color:blue"><u>Toutes les acquisitions ont-elles été prévues par le budget ?</u></div></td>
			<td width="10.1%"><?php echo $reponse5; ?></td>
			<td width="29%"><?php echo $commentaire5; ?></td>
		</tr>
		<?php			
			$reponse6=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=6 and MISSION_ID='.$mission_id);
			
			$donnees6=$reponse6->fetch();
			
			$reponse6=$donnees6['RDC_REPONSE'];
			$commentaire6=$donnees6['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh333" style="color:blue"><u> écarts significatifs sont-ils tous justifiés ?</u></div></td>
			<td width="10.1%"><?php echo $reponse6; ?></td>
			<td width="29%"><?php echo $commentaire6; ?></td>
		</tr>
		<?php			
			$reponse7=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=7 and MISSION_ID='.$mission_id);
			
			$donnees7=$reponse7->fetch();
			
			$reponse7=$donnees7['RDC_REPONSE'];
			$commentaire7=$donnees7['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh4" style="color:blue"><u>Avez-vous rapproché la valeur assurée avec la valeur brute des immobilisations ?</u></div></td>
			<td width="10.1%"><?php echo $reponse7; ?></td>
			<td width="29%"><?php echo $commentaire7; ?></td>
		</tr>
		<?php			
			$reponse8=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=8 and MISSION_ID='.$mission_id);
			
			$donnees8=$reponse8->fetch();
			
			$reponse8=$donnees8['RDC_REPONSE'];
			$commentaire8=$donnees8['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh44" style="color:blue"><u>Tous les biens sont-ils assurés ? </u></div></td>
			<td width="10.1%"><?php echo $reponse8; ?></td>
			<td width="29%"><?php echo $commentaire8; ?></td>
		</tr>
		<?php			
			$reponse9=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=9 and MISSION_ID='.$mission_id);
			
			$donnees9=$reponse9->fetch();
			
			$reponse9=$donnees9['RDC_REPONSE'];
			$commentaire9=$donnees9['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh5" style="color:blue"><u>Tous les biens inscrits parmi les immobilisations présentent-ils les critères suivants:- '- Elément identifiable ? </u></div></td>
			<td width="10.1%"><?php echo $reponse9; ?></td>
			<td width="29%"><?php echo $commentaire9; ?></td>
		</tr>
		<?php			
			$reponse10=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=10 and MISSION_ID='.$mission_id);
			
			$donnees10=$reponse10->fetch();
			
			$reponse10=$donnees10['RDC_REPONSE'];
			$commentaire10=$donnees10['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh55" style="color:blue"><u>Porteur d'avantages économiques futurs ? </u></div></td>
			<td width="10.1%"><?php echo $reponse10; ?></td>
			<td width="29%"><?php echo $commentaire10; ?></td>
		</tr>
		<?php			
			$reponse11=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=11 and MISSION_ID='.$mission_id);
			
			$donnees11=$reponse11->fetch();
			
			$reponse11=$donnees11['RDC_REPONSE'];
			$commentaire11=$donnees11['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh555" style="color:blue"><u>Eléments contrôlés ?</u></div></td>
			<td width="10.1%"><?php echo $reponse11; ?></td>
			<td width="29%"><?php echo $commentaire11; ?></td>
		</tr>
		<?php			
			$reponse12=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=12 and MISSION_ID='.$mission_id);
			
			$donnees12=$reponse12->fetch();
			
			$reponse12=$donnees12['RDC_REPONSE'];
			$commentaire12=$donnees12['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh5555" style="color:blue"><u>Son coût est évalué avec une fiabilité suffisante ?</u></div></td>
			<td width="10.1%"><?php echo $reponse12; ?></td>
			<td width="29%"><?php echo $commentaire12; ?></td>
		</tr>
		<?php			
			$reponse13=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=13 and MISSION_ID='.$mission_id);
			
			$donnees13=$reponse13->fetch();
			
			$reponse13=$donnees13['RDC_REPONSE'];
			$commentaire13=$donnees13['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh55555" style="color:blue"><u>Dont l'entité attend qu'il soit utilisé au-delà de l'exercice en cours ?</u></div></td>
			<td width="10.1%"><?php echo $reponse13; ?></td>
			<td width="29%"><?php echo $commentaire13; ?></td>
		</tr>
		<?php			
			$reponse14=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=14 and MISSION_ID='.$mission_id);
			
			$donnees14=$reponse14->fetch();
			
			$reponse14=$donnees14['RDC_REPONSE'];
			$commentaire14=$donnees14['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh6" style="color:blue"><u>Les méthodes comptables appliquées sont-elles conformes à celles de l'exercice précédent ?</u></div></td>
			<td width="10.1%"><?php echo $reponse14; ?></td>
			<td width="29%"><?php echo $commentaire14; ?></td>
		</tr>
		<?php			
			$reponse15=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=15 and MISSION_ID='.$mission_id);
			
			$donnees15=$reponse15->fetch();
			
			$reponse15=$donnees15['RDC_REPONSE'];
			$commentaire15=$donnees15['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh7" style="color:blue"><u>Prix d'achat résultant de l'accord des parties à la date de la transaction ?</u></div></td>
			<td width="10.1%"><?php echo $reponse15; ?></td>
			<td width="29%"><?php echo $commentaire15; ?></td>
		</tr>	
		<?php			
			$reponse16=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=16 and MISSION_ID='.$mission_id);
			
			$donnees16=$reponse16->fetch();
			
			$reponse16=$donnees16['RDC_REPONSE'];

			$commentaire16=$donnees16['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh77" style="color:blue"><u>Droits de douanes et autres taxes fiscales non récupérables ?</u></div></td>
			<td width="10.1%"><?php echo $reponse16; ?></td>
			<td width="29%"><?php echo $commentaire16; ?></td>
		</tr>
		<?php			
			$reponse17=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=17 and MISSION_ID='.$mission_id);
			
			$donnees17=$reponse17->fetch();
			
			$reponse17=$donnees17['RDC_REPONSE'];
			$commentaire17=$donnees17['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh777" style="color:blue"><u>Frais accessoires : frais de livraison et de manutention initiaux,
			honoraires de professionnels tels qu'architecte et ingénieurs ?</u></div></td>
			<td width="10.1%"><?php echo $reponse17; ?></td>
			<td width="29%"><?php echo $commentaire17; ?></td>
		</tr>		
		<?php			
			$reponse18=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=18 and MISSION_ID='.$mission_id);
			
			$donnees18=$reponse18->fetch();
			
			$reponse18=$donnees18['RDC_REPONSE'];
			$commentaire18=$donnees18['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh8" style="color:blue"><u>Coût d'acquisition des matières consommées et
			des services utilisés pour la production de cet élément ?</u></div></td>
			<td width="10.1%"><?php echo $reponse18; ?></td>
			<td width="29%"><?php echo $commentaire18; ?></td>
		</tr>	
		<?php			
			$reponse19=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=19 and MISSION_ID='.$mission_id);
			
			$donnees19=$reponse19->fetch();
			
			$reponse19=$donnees19['RDC_REPONSE'];
			$commentaire19=$donnees19['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh88" style="color:blue"><u>Charges directes de production ?</u></div></td>
			<td width="10.1%"><?php echo $reponse19; ?></td>
			<td width="29%"><?php echo $commentaire19; ?></td>
		</tr>
		<?php			
			$reponse20=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=20 and MISSION_ID='.$mission_id);
			
			$donnees20=$reponse20->fetch();
			
			$reponse20=$donnees20['RDC_REPONSE'];
			$commentaire20=$donnees20['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="coh888" style="color:blue"><u>Charges indirectes raisonnablement rattachables à la production ?</u></div></td>
			<td width="10.1%"><?php echo $reponse20; ?></td>
			<td width="29%"><?php echo $commentaire20; ?></td>
		</tr>
		
		
		
		
		<!--**********************************************************************************************************************!-->
		<?php			
			$reponse21=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="B" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees21=$reponse21->fetch();
			
			$reponse21=$donnees21['RDC_REPONSE'];
			$commentaire21=$donnees21['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc">B - Exhaustivité des enregistrements</td>
			<td width="40.7%"><div id="exhaust1" style="color:blue"><u>Sur la base de la sélection, confirmez-vous que la comptabilisation des opérations d'immobilisations est exhaustive ?</u></div></td>
			<td width="10.1%"><?php echo $reponse21; ?></td>
			<td width="29%"><?php echo $commentaire21; ?></td>
		</tr>
		
		
		<!---**********************************************************************************************************************-!-->
		<?php			
			$reponse22=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="C" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees22=$reponse22->fetch();
			
			$reponse22=$donnees22['RDC_REPONSE'];
			$commentaire22=$donnees22['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white" >
			<td width="20.2%" bgcolor="#ccc"> C - Régularité des enregistrements</td>
			<td width="40.7%"><div id="reg1" style="color:blue"><u>Toutes les acquisitions ont-elles été comptabilisées dans les bons comptes ?</u></div></td>
			<td width="10.1%"><?php echo $reponse22; ?></td>
			<td width="29%"><?php echo $commentaire22; ?></td>
		</tr>
		<?php			
			$reponse23=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="C" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees23=$reponse23->fetch();
			
			$reponse23=$donnees23['RDC_REPONSE'];
			$commentaire23=$donnees23['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="reg11" style="color:blue"><u>Tous les éléments incorporables aux coûts d'acquisition ont-ils été comptabilisés parmi les immobilisations ?</u></div></td>
			<td width="10.1%"><?php echo $reponse23; ?></td>
			<td width="29%"><?php echo $commentaire23; ?></td>
		</tr>
		<?php			
			$reponse24=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="C" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donnees24=$reponse24->fetch();
			
			$reponse24=$donnees24['RDC_REPONSE'];
			$commentaire24=$donnees24['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="reg111" style="color:blue"><u>Toutes les acquisitions sont-elles appuyées par des factures régulières ?</u></div></td>
			<td width="10.1%"><?php echo $reponse24; ?></td>
			<td width="29%"><?php echo $commentaire24; ?></td>
		</tr>
		<?php			
			$reponse25=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="C" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donnees25=$reponse25->fetch();
			
			$reponse25=$donnees25['RDC_REPONSE'];
			$commentaire25=$donnees25['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="reg2" style="color:blue"><u>Les productions en-cours/immobilisées sont-elles correctement comptabilisées ?</u></div></td>
			<td width="10.1%"><?php echo $reponse25; ?></td>
			<td width="29%"><?php echo $commentaire25; ?></td>
		</tr>
		<?php			
			$reponse26=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="C" and RDC_RANG=5 and MISSION_ID='.$mission_id);
			
			$donnees26=$reponse26->fetch();
			
			$reponse26=$donnees26['RDC_REPONSE'];
			$commentaire26=$donnees26['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="reg22" style="color:blue"><u>Tous les éléments incorporables aux coûts de production ont-ils été considérés dans les immobilisations ?</u></div></td>
			<td width="10.1%"><?php echo $reponse26; ?></td>
			<td width="29%"><?php echo $commentaire26; ?></td>
		</tr>
		<?php			
			$reponse27=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="C" and RDC_RANG=6 and MISSION_ID='.$mission_id);
			
			$donnees27=$reponse27->fetch();
			
			$reponse27=$donnees27['RDC_REPONSE'];
			$commentaire27=$donnees27['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="reg3" style="color:blue"><u>Toutes les cessions d'immobilisations sont-elles correctement comptabilisées ?</u></div></td>
			<td width="10.1%"><?php echo $reponse27; ?></td>
			<td width="29%"><?php echo $commentaire27; ?></td>
		</tr>
		<?php			
			$reponse28=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="C" and RDC_RANG=7 and MISSION_ID='.$mission_id);
			
			$donnees28=$reponse28->fetch();
			
			$reponse28=$donnees28['RDC_REPONSE'];
			$commentaire28=$donnees28['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="reg33" style="color:blue"><u>Toutes les cessions d'actifs sont-elles appuyées par des factures régulières ?</u></div></td>
			<td width="10.1%"><?php echo $reponse28; ?></td>
			<td width="29%"><?php echo $commentaire28; ?></td>
		</tr>
		<?php			
			$reponse29=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="C" and RDC_RANG=8 and MISSION_ID='.$mission_id);
			
			$donnees29=$reponse29->fetch();
			
			$reponse29=$donnees29['RDC_REPONSE'];
			$commentaire29=$donnees29['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="reg4" style="color:blue"><u>Les produits et charges exceptionnels sont-ils correctement comptabilisés ?</u></div></td>
			<td width="10.1%"><?php echo $reponse29; ?></td>
			<td width="29%"><?php echo $commentaire29; ?></td>
		</tr>	
		
		<?php			
			$reponse31=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="D" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees31=$reponse31->fetch();
			
			$reponse31=$donnees31['RDC_REPONSE'];
			$commentaire31=$donnees31['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc">E - Existence des soldes</td>
			<td width="40.7%"><div id="exist1" style="color:blue"><u>A-t-on rapproché le fichier des immobilisations avec la comptabilité?</u></div></td>
			<td width="10.1%"><?php echo $reponse31; ?></td>
			<td width="29%"><?php echo $commentaire31; ?></td>
		</tr>
		<?php			
			$reponse32=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="D" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees32=$reponse32->fetch();
			
			$reponse32=$donnees32['RDC_REPONSE'];
			$commentaire32=$donnees32['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="exist11" style="color:blue"><u>Les écarts sont-ils tous justifiés et expliqués ?</u></div></td>
			<td width="10.1%"><?php echo $reponse32; ?></td>
			<td width="29%"><?php echo $commentaire32; ?></td>
		</tr>
		<?php			
			$reponse33=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="D" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donnees33=$reponse33->fetch();
			
			$reponse33=$donnees33['RDC_REPONSE'];
			$commentaire33=$donnees33['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="exist2" style="color:blue"><u>A-t-on contrôlé la réalité des valeurs immobilisées ?</u></div></td>
			<td width="10.1%"><?php echo $reponse33; ?></td>
			<td width="29%"><?php echo $commentaire33; ?></td>
		</tr>
		<?php			
			$reponse34=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="D" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donnees34=$reponse34->fetch();
			
			$reponse34=$donnees34['RDC_REPONSE'];
			$commentaire34=$donnees34['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="exist3" style="color:blue"><u>A-t-on recensé les dépenses relatives aux recherches et au développement ?</u></div></td>
			<td width="10.1%"><?php echo $reponse34; ?></td>
			<td width="29%"><?php echo $commentaire34; ?></td>
		</tr>
		<?php			
			$reponse35=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="D" and RDC_RANG=5 and MISSION_ID='.$mission_id);
			
			$donnees35=$reponse35->fetch();
			
			$reponse35=$donnees35['RDC_REPONSE'];
			$commentaire35=$donnees35['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="exist4" style="color:blue"><u>Le paiement d'acomptes versés sur commande a-t-il fait l'objet d'entrée en immobilisation en cours ?</u></div></td>
			<td width="10.1%"><?php echo $reponse35; ?></td>
			<td width="29%"><?php echo $commentaire35; ?></td>
		</tr>
		<?php			
			$reponse36=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="D" and RDC_RANG=6 and MISSION_ID='.$mission_id);
			
			$donnees36=$reponse36->fetch();
			
			$reponse36=$donnees36['RDC_REPONSE'];
			$commentaire36=$donnees36['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="exist44" style="color:blue"><u>Les acomptes versés sur commande d'immobilisation et d'immobilisations en cours sont-ils justifiés ?</u></div></td>
			<td width="10.1%"><?php echo $reponse36; ?></td>
			<td width="29%"><?php echo $commentaire36; ?></td>
		</tr>
		<?php			
			$reponse37=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="E" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees37=$reponse37->fetch();
			
			$reponse37=$donnees37['RDC_REPONSE'];
			$commentaire37=$donnees37['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc">F - Evaluation des soldes</td>
			<td width="40.7%"><div id="eval1" style="color:blue"><u>Le mode d'amortissement appliqué est-il cohérent avec celui fixé ?</u></div></td>
			<td width="10.1%"><?php echo $reponse37; ?></td>
			<td width="29%"><?php echo $commentaire37; ?></td>
		</tr>
		<?php			
			$reponse38=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="E" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees38=$reponse38->fetch();
			
			$reponse38=$donnees38['RDC_REPONSE'];
			$commentaire38=$donnees38['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="eval11" style="color:blue"><u>Seuls les biens qui ont été mis en service sont-ils soumis aux dotations aux amortissements ?</u></div></td>
			<td width="10.1%"><?php echo $reponse38; ?></td>
			<td width="29%"><?php echo $commentaire38; ?></td>
		</tr>
		<?php			
			$reponse39=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="E" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donnees39=$reponse39->fetch();
			
			$reponse39=$donnees39['RDC_REPONSE'];
			$commentaire39=$donnees39['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="eval2" style="color:blue"><u>Les dotations de l'exercice ont-elles été calculées correctement ?</u></div></td>
			<td width="10.1%"><?php echo $reponse39; ?></td>
			<td width="29%"><?php echo $commentaire39; ?></td>
		</tr>
		<?php			
			$reponse40=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="E" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donnees40=$reponse40->fetch();
			
			$reponse40=$donnees40['RDC_REPONSE'];
			$commentaire40=$donnees40['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="eval22" style="color:blue"><u>Les dotations de l'exercice ont-elles été comptabilisées exhaustivement ?</u></div> </td>
			<td width="10.1%"><?php echo $reponse40; ?></td>
			<td width="29%"><?php echo $commentaire40; ?></td>
		</tr>
		<?php			
			$reponse41=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="E" and RDC_RANG=5 and MISSION_ID='.$mission_id);
			
			$donnees41=$reponse41->fetch();
			
			$reponse41=$donnees41['RDC_REPONSE'];
			$commentaire41=$donnees41['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="eval222" style="color:blue"><u>Les dotations de l'exercice relatives aux nouvelles acquisitions sont-elles calculées correctement (prorata temporis) ?</u></div></td>
			<td width="10.1%"><?php echo $reponse41; ?></td>
			<td width="29%"><?php echo $commentaire41; ?></td>
		</tr>
		<?php			
			$reponse30=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="E" and RDC_RANG=6 and MISSION_ID='.$mission_id);
			
			$donnees30=$reponse30->fetch();
			
			$reponse30=$donnees30['RDC_REPONSE'];
			$commentaire30=$donnees30['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc"></td>
			<td width="40.7%"><div id="eval2222" style="color:blue"><u>Les méthodes appliquées sont-elles identiques à celles de l'exercice précédent ?</u></div></td>
			<td width="10.1%"><?php echo $reponse30; ?></td>
			<td width="29%"><?php echo $commentaire30; ?></td>
		</tr>
		<?php			
			$reponse42=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="E" and RDC_RANG=7 and MISSION_ID='.$mission_id);
			
			$donnees42=$reponse42->fetch();
			
			$reponse42=$donnees42['RDC_REPONSE'];
			$commentaire42=$donnees42['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="eval3" style="color:blue"><u>Les réévaluations ont-elles été comptabilisées correctement ?</u></div></td>
			<td width="10.1%"><?php echo $reponse42; ?></td>
			<td width="29%"><?php echo $commentaire42; ?></td>
		</tr>
		<?php			
			$reponse43=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="E" and RDC_RANG=8 and MISSION_ID='.$mission_id);
			
			$donnees43=$reponse43->fetch();
			
			$reponse43=$donnees43['RDC_REPONSE'];
			$commentaire43=$donnees43['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="eval33" style="color:blue"><u>Les (catégories) immobilisations ont-elles été réévaluées en totalité ?</u></div></td>
			<td width="10.1%"><?php echo $reponse43; ?></td>
			<td width="29%"><?php echo $commentaire43; ?></td>
		</tr>
		<?php			
			$reponse44=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="F" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees44=$reponse44->fetch();
			
			$reponse44=$donnees44['RDC_REPONSE'];
			$commentaire44=$donnees44['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc">G - Rattachement des opérations</td>
			<td width="40.7%"><div id="rattach1" style="color:blue"><u>Les brevets et les licences ont-ils été comptabilisés exhaustivement ?</u></div></td>
			<td width="10.1%"><?php echo $reponse44; ?></td>
			<td width="29%"><?php echo $commentaire44; ?></td>
		</tr>
		<?php			
			$reponse45=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="F" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees45=$reponse45->fetch();
			
			$reponse45=$donnees45['RDC_REPONSE'];
			$commentaire45=$donnees45['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="rattach11" style="color:blue"><u>La valeur portée dans les comptes est-elle correcte par rapport à celle du brevet ?</u></div></td>
			<td width="10.1%"><?php echo $reponse45; ?></td>
			<td width="29%"><?php echo $commentaire45; ?></td>
		</tr>	
		<?php			
			$reponse46=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="F" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donnees46=$reponse46->fetch();
			
			$reponse46=$donnees46['RDC_REPONSE'];
			$commentaire46=$donnees46['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="rattach111" style="color:blue"><u>L'enregistrement comptable est-il appuyé par de pièces justificatives comptables régulières ?</u></div></td>
			<td width="10.1%"><?php echo $reponse46; ?></td>
			<td width="29%"><?php echo $commentaire46; ?></td>
		</tr>	
		<?php			
			$reponse47=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="F" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donnees47=$reponse47->fetch();
			
			$reponse47=$donnees47['RDC_REPONSE'];
			$commentaire47=$donnees47['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="rattach2" style="color:blue"><u>Confirmez-vous que tous les éléments comptabilisés parmi les immobilisations en cours concernent des immobilisations non encore mises en service ?</u></div></td>
			<td width="10.1%"><?php echo $reponse47; ?></td>
			<td width="29%"><?php echo $commentaire47; ?></td>
		</tr>
		<?php			
			$reponse48=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="G" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees48=$reponse48->fetch();
			
			$reponse48=$donnees48['RDC_REPONSE'];
			$commentaire48=$donnees48['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc">H - Juridique fiscal et divers</td>
			<td width="40.7%"><div id="jurid1" style="color:blue"><u>La récupération de la TVA sur les factures d'acquisition respecte-t-elle les dispositions fiscales ?</u></div></td>
			<td width="10.1%"><?php echo $reponse48; ?></td>
			<td width="29%"><?php echo $commentaire48; ?></td>
		</tr>
		<?php			
			$reponse49=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="G" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees49=$reponse49->fetch();
			
			$reponse49=$donnees49['RDC_REPONSE'];
			$commentaire49=$donnees49['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="jurid2" style="color:blue"><u>Le calcul de la TVA sur les cessions est-il effectué sur la valeur la plus significative entre le prix de vente et la valeur nette comptable ?</u></div></td>
			<td width="10.1%"><?php echo $reponse49; ?></td>
			<td width="29%"><?php echo $commentaire49; ?></td>
		</tr>
		<?php			
			$reponse50=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="G" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donnees50=$reponse50->fetch();
			
			$reponse50=$donnees50['RDC_REPONSE'];
			$commentaire50=$donnees50['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="jurid3" style="color:blue"><u>La récupération de la TVA ne dépasse-t-elle pas le délai autorisé par le CGI ?</u></div></td>
			<td width="10.1%"><?php echo $reponse50; ?></td>
			<td width="29%"><?php echo $commentaire50; ?></td>
		</tr>
		<?php			
			$reponse51=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="G" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donnees51=$reponse51->fetch();
			
			$reponse51=$donnees51['RDC_REPONSE'];
			$commentaire51=$donnees51['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="jurid4" style="color:blue"><u>La TVA relative à la livraison à soi-même est-elle été comptabilisée et déclarée ?</u></div></td>
			<td width="10.1%"><?php echo $reponse51; ?></td>
			<td width="29%"><?php echo $commentaire51; ?></td>
		</tr>
		<?php			
			$reponse52=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="G" and RDC_RANG=5 and MISSION_ID='.$mission_id);
			
			$donnees52=$reponse52->fetch();
			
			$reponse52=$donnees52['RDC_REPONSE'];
			$commentaire52=$donnees52['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="jurid5" style="color:blue"><u>Les taux d'amortisssement appliqués ne dépassent-ils pas ceux admis fiscalement ?</u></div></td>
			<td width="10.1%"><?php echo $reponse52; ?></td>
			<td width="29%"><?php echo $commentaire52; ?></td>
		</tr>
		<?php			
			$reponse53=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="H" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees53=$reponse53->fetch();
			
			$reponse53=$donnees53['RDC_REPONSE'];
			$commentaire53=$donnees53['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc"> I - Information et présentation</td>
			<td width="40.7%"><div id="info1" style="color:blue"><u>Confirmez-vous que les informations suivantes ont été présentées en annexe :- mode d'amortissement?</u></div></td>
			<td width="10.1%"><?php echo $reponse53; ?></td>
			<td width="29%"><?php echo $commentaire53; ?></td>
		</tr>
		<?php			
			$reponse54=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="H" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees54=$reponse54->fetch();
			
			$reponse54=$donnees54['RDC_REPONSE'];
			$commentaire54=$donnees54['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="info11" style="color:blue"><u>- état de l'actif immobilisé ?</u></div></td>
			<td width="10.1%"><?php echo $reponse54; ?></td>
			<td width="29%"><?php echo $commentaire54; ?></td>
		</tr>
		<?php			
			$reponse55=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="H" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donnees55=$reponse55->fetch();
			
			$reponse55=$donnees55['RDC_REPONSE'];
			$commentaire55=$donnees55['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%"></td>
			<td width="40.7%"><div id="info111" style="color:blue"><u>- état des amortissements et perte de valeur avec indication des modes de calcul utilisés et des dotations ou annulation effectuées au cours de l'exercice ?</u></div></td>
			<td width="10.1%"><?php echo $reponse55; ?></td>
			<td width="29%"><?php echo $commentaire55; ?></td>
		</tr>
		
	</table>
</div>
<input type="button" value="Retour" id="bt_retour" class="bouton"/>
<input type="button" value="synthèse" id="synthese_feuille" class="bouton">
</body>
</html>