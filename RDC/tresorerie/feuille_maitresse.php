<?php
@session_start();
$mission_id=@$_SESSION['idMission'];
?>
<html>
<head>
<link rel="stylesheet" href="../RDC/tresorerie/css.css">
<script>

	// Droit cycle by Tolotra
    // Page : RDC -> Trésorerie
    // Tâche : Trésorerie, 32
    $.ajax(
        {
            type: 'POST',
            url: 'droitCycle.php',
            data: {task_id: 32},
            success: function (e) {
                var result = 0 === Number(e);
                $("#synthese_feuille").attr('disabled', result);
            }
        }
    );

	$(function(){
		$('#bt_retour').click(function(){
			$('#contenue').load("RDC/tresorerie/index.php");
		});
		
		$('#synthese_feuille').click(function(){
			$('#contenue').load("RDC/tresorerie/synthese_tresorerie.php");
		});
		$('#coh1').click(function(){
			$('#contenue').load("RDC/tresorerie/A_coherence/coherence1.php?coherence_visible=OK");
		});
		$('#coh11').click(function(){
			$('#contenue').load("RDC/tresorerie/A_coherence/coherence1.php?coherence_visible=OK");
		});
		$('#coh2').click(function(){
			$('#contenue').load("RDC/tresorerie/A_coherence/coherence2.php?coherence_visible=OK");
		});
		$('#reg1').click(function(){
			$('#contenue').load("RDC/tresorerie/B_regularite/regularite1.php?regularite_visible=OK");
		});
		$('#reg2').click(function(){
			$('#contenue').load("RDC/tresorerie/B_regularite/regularite2.php?regularite_visible=OK");
		});
		$('#reg3').click(function(){
			$('#contenue').load("RDC/tresorerie/B_regularite/regularite3.php?regularite_visible=OK");
		});
		$('#reg33').click(function(){
			$('#contenue').load("RDC/tresorerie/B_regularite/regularite3.php?regularite_visible=OK");
		});
		$('#exist1').click(function(){
			$('#contenue').load("RDC/tresorerie/C_existence/existence1.php?existence_visible=OK");
		});
		$('#exist11').click(function(){
			$('#contenue').load("RDC/tresorerie/C_existence/existence1.php?existence_visible=OK");
		});
		$('#exist111').click(function(){
			$('#contenue').load("RDC/tresorerie/C_existence/existence1.php?existence_visible=OK");
		});
		$('#exist2').click(function(){
			$('#contenue').load("RDC/tresorerie/C_existence/existence2.php?existence_visible=OK");
		});
		$('#exist22').click(function(){
			$('#contenue').load("RDC/tresorerie/C_existence/existence2.php?existence_visible=OK");
		});
		$('#exist222').click(function(){
			$('#contenue').load("RDC/tresorerie/C_existence/existence2.php?existence_visible=OK");
		});
		$('#exist2222').click(function(){
			$('#contenue').load("RDC/tresorerie/C_existence/existence2.php?existence_visible=OK");
		});
		$('#exist3').click(function(){
			$('#contenue').load("RDC/tresorerie/C_existence/existence3.php?existence_visible=OK");
		});
		$('#exist33').click(function(){
			$('#contenue').load("RDC/tresorerie/C_existence/existence3.php?existence_visible=OK");
		});
		$('#exist333').click(function(){
			$('#contenue').load("RDC/tresorerie/C_existence/existence3.php?existence_visible=OK");
		});
		$('#exist3333').click(function(){
			$('#contenue').load("RDC/tresorerie/C_existence/existence3.php?existence_visible=OK");
		});
		$('#exist33333').click(function(){
			$('#contenue').load("RDC/tresorerie/C_existence/existence3.php?existence_visible=OK");
		});
		$('#exist333333').click(function(){
			$('#contenue').load("RDC/tresorerie/C_existence/existence3.php?existence_visible=OK");
		});
		$('#exist4').click(function(){
			$('#contenue').load("RDC/tresorerie/C_existence/existence4.php?existence_visible=OK");
		});
		$('#exist5').click(function(){
			$('#contenue').load("RDC/tresorerie/C_existence/existence5.php?existence_visible=OK");
		});
		$('#exist55').click(function(){
			$('#contenue').load("RDC/tresorerie/C_existence/existence5.php?existence_visible=OK");
		});
		$('#exist6').click(function(){
			$('#contenue').load("RDC/tresorerie/C_existence/existence6.php?existence_visible=OK");
		});
		$('#rattach1').click(function(){
			$('#contenue').load("RDC/tresorerie/D_rattachement/rattachement1.php?rattachement_visible=OK");
		});
		$('#rattach11').click(function(){
			$('#contenue').load("RDC/tresorerie/D_rattachement/rattachement1.php?rattachement_visible=OK");
		});
		$('#jurid1').click(function(){
			$('#contenue').load("RDC/tresorerie/E_juridique/juridique1.php?juridique_visible=OK");
		});
		$('#info1').click(function(){
			$('#contenue').load("RDC/tresorerie/F_information/information1.php?information_visible=OK");
		});
		$('#info11').click(function(){
			$('#contenue').load("RDC/tresorerie/F_information/information1.php?information_visible=OK");
		});
		$('#info111').click(function(){
			$('#contenue').load("RDC/tresorerie/F_information/information1.php?information_visible=OK");
		});
		$('#info2').click(function(){
			$('#contenue').load("RDC/tresorerie/F_information/information2.php?information_visible=OK");
		});
		$('#info22').click(function(){
			$('#contenue').load("RDC/tresorerie/F_information/information2.php?information_visible=OK");
		});
		$('#info222').click(function(){
			$('#contenue').load("RDC/tresorerie/F_information/information2.php?information_visible=OK");
		});
		
	});
</script>
<style type="text/css">
	*{
		font-size: 8pt;
	}
</style>
</head>
<body>
<table style="text-align:center;background-color:#00698d;color:white;width:100%;padding-top:5px;">
	<tr>
		<td><label>LA FEUILLE MAITRESSE DU CYCLE TRESORERIE</label></td>
	</tr>
</table>
<div>
	<table width="100%" style="color:white;">
		<tr bgcolor="#6495ED" align="center">
			<td width="20%">Objéctifs d'audit</td>
			<td width="40%">Questions / tests</td>
			<td width="10%">Réponses</td>
			<td width="30%">Commentaires</td>
		</tr>
	</table>
<div id="table_id" style="overflow:auto;height:410px;">
	<table bgcolor="#6495ED" border="1">		
		<?php
			include '../../connexion.php';	
			
			$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="A" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees1=$reponse1->fetch();
			
			$reponse1=$donnees1['RDC_REPONSE'];
			$commentaire1=$donnees1['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc" rowspan="3">A-Cohérence et principes comptables</td>
			<td width="40.7%"><div id="coh1" style="color:blue"><u>A-t-on réalisé la revue analytique des comptes de trésorerie ?</u></div></td>
			<td width="10.1%"><?php echo $reponse1; ?></td>
			<td width="29%"><?php echo $commentaire1; ?></td>
		</tr>
		<?php
			$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="A" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees2=$reponse2->fetch();
			
			$reponse2=$donnees2['RDC_REPONSE'];
			$commentaire2=$donnees2['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="coh11" style="color:blue"><u>Les variations importantes sont-elles justifiées correctement ?</u></div></td>
			<td><?php echo $reponse2; ?></td>
			<td><?php echo $commentaire2; ?></td>
		</tr>
		<?php
			$reponse3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="A" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donnees3=$reponse3->fetch();
			
			$reponse3=$donnees3['RDC_REPONSE'];
			$commentaire3=$donnees3['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="coh2" style="color:blue"><u>Les méthodes comptables appliquées sont-elles conformes à celles de l'exercice précédent ?</u></div></td>
			<td><?php echo $reponse3; ?></td>
			<td><?php echo $commentaire3; ?></td>
		</tr>
		<?php
			$reponseB1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="B" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donneesB1=$reponseB1->fetch();
			
			$reponseB1=$donneesB1['RDC_REPONSE'];
			$commentaireB1=$donneesB1['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<td bgcolor="#ccc" rowspan="4">B-Régularité des enregistrements</td>
			<td><div id="reg1" style="color:blue"><u>Sur la base des avis d'opération sélectionnés, les écritures de banque sont-elles correctement comptabilisées ?</u></div></td>
			<td><?php echo $reponseB1; ?></td>
			<td><?php echo $commentaireB1; ?></td>
		</tr>
		<?php
			$reponseB2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="B" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donneesB2=$reponseB2->fetch();
			
			$reponseB2=$donneesB2['RDC_REPONSE'];
			$commentaireB2=$donneesB2['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="reg2" style="color:blue"><u>Sur la base des bons de caisse sélectionnés, les écritures de caisse sont-elles correctement comptabilisées ?</u></div></td>
			<td><?php echo $reponseB2; ?></td>
			<td><?php echo $commentaireB2; ?></td>
		</tr>
		<?php
			$reponseB3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="B" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donneesB3=$reponseB3->fetch();
			
			$reponseB3=$donneesB3['RDC_REPONSE'];
			$commentaireB3=$donneesB3['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="reg3" style="color:blue"><u>Les comptes libellés en devises font-ils régulièrement l'objet de réévaluation à la date de clôture ?</u></div></td>
			<td><?php echo $reponseB3; ?></td>
			<td><?php echo $commentaireB3; ?></td>
		</tr>
		<?php
			$reponseB4=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="B" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donneesB4=$reponseB4->fetch();
			
			$reponseB4=$donneesB4['RDC_REPONSE'];
			$commentaireB4=$donneesB4['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="reg33" style="color:blue"><u>Les opérations en devises sont-elles correctement comptabilisées ?</u></div></td>
			<td><?php echo $reponseB4; ?></td>
			<td><?php echo $commentaireB4; ?></td>
		</tr>
		<?php
			$reponseC1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donneesC1=$reponseC1->fetch();
			
			$reponseC1=$donneesC1['RDC_REPONSE'];
			$commentaireC1=$donneesC1['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<td bgcolor="#ccc" rowspan="17">C-Existence de solde</td>
			<td><div id="exist1" style="color:blue"><u>A-t-on circularisé tous les comptes "banques" ?</u></div></td>
			<td><?php echo $reponseC1; ?></td>
			<td><?php echo $commentaireC1; ?></td>
		</tr>
		<?php
			$reponseC2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donneesC2=$reponseC2->fetch();
			
			$reponseC2=$donneesC2['RDC_REPONSE'];
			$commentaireC2=$donneesC2['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="exist11" style="color:blue"><u>Les résultats des cricularisations sont ils cohérents avec la comptabilité ?</u></div></td>
			<td><?php echo $reponseC2; ?></td>
			<td><?php echo $commentaireC2; ?></td>
		</tr>
		<?php
			$reponseC3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donneesC3=$reponseC3->fetch();
			
			$reponseC3=$donneesC3['RDC_REPONSE'];
			$commentaireC3=$donneesC3['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="exist111" style="color:blue"><u>Si non, les a-t-on expliqué ?</u></div></td>
			<td><?php echo $reponseC3; ?></td>
			<td><?php echo $commentaireC3; ?></td>
		</tr>
		<?php
			$reponseC4=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donneesC4=$reponseC4->fetch();
			
			$reponseC4=$donneesC4['RDC_REPONSE'];
			$commentaireC4=$donneesC4['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="exist2" style="color:blue"><u>A chaque compte bancaire en balance générale correspond-il un rapprochement bancaire ?</u></div></td>
			<td><?php echo $reponseC4; ?></td>
			<td><?php echo $commentaireC4; ?></td>
		</tr>
		<?php
			$reponseC5=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and RDC_RANG=5 and MISSION_ID='.$mission_id);
			
			$donneesC5=$reponseC5->fetch();
			
			$reponseC5=$donneesC5['RDC_REPONSE'];
			$commentaireC5=$donneesC5['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="exist22" style="color:blue"><u>Les états de rapprochement bancaire sont-ils visés et signés par la Direction ou par le responsable hiérarchique ?</u></div></td>
			<td><?php echo $reponseC5; ?></td>
			<td><?php echo $commentaireC5; ?></td>
		</tr>
		<?php
			$reponseC6=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and RDC_RANG=6 and MISSION_ID='.$mission_id);
			
			$donneesC6=$reponseC6->fetch();
			
			$reponseC6=$donneesC6['RDC_REPONSE'];
			$commentaireC6=$donneesC6['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="exist222" style="color:blue"><u>Toutes les écritures à passer par la société ainsi que par la banque sont-elles correctement justifiées ?</u></div></td>
			<td><?php echo $reponseC6; ?></td>
			<td><?php echo $commentaireC6; ?></td>
		</tr>
		<?php
			$reponseC7=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and RDC_RANG=7 and MISSION_ID='.$mission_id);
			
			$donneesC7=$reponseC7->fetch();
			
			$reponseC7=$donneesC7['RDC_REPONSE'];
			$commentaireC7=$donneesC7['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="exist2222" style="color:blue"><u>Existe-t-il des courriers de réclamation pour relancer/justifier les éléments de rapprochement relatifs à des erreurs de la banque?,voir en particulier le cas des versements reçus non passés par la banque</u></div></td>
			<td><?php echo $reponseC7; ?></td>
			<td><?php echo $commentaireC7; ?></td>
		</tr>
		<?php
			$reponseC8=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and RDC_RANG=8 and MISSION_ID='.$mission_id);
			
			$donneesC8=$reponseC8->fetch();
			
			$reponseC8=$donneesC8['RDC_REPONSE'];
			$commentaireC8=$donneesC8['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="exist3" style="color:blue"><u>Existe-t-il un procès verbal de comptage de caisse à la date de clôture de l'exerice ?</u></div></td>
			<td><?php echo $reponseC8; ?></td>
			<td><?php echo $commentaireC8; ?></td>
		</tr>
		<?php
			$reponseC9=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and RDC_RANG=9 and MISSION_ID='.$mission_id);
			
			$donneesC9=$reponseC9->fetch();
			
			$reponseC9=$donneesC9['RDC_REPONSE'];
			$commentaireC9=$donneesC9['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="exist33" style="color:blue"><u>Le PV de caisse est-il visé et signé par la Direction ?</u></div></td>
			<td><?php echo $reponseC9; ?></td>
			<td><?php echo $commentaireC9; ?></td>
		</tr>
		<?php
			$reponseC10=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and RDC_RANG=10 and MISSION_ID='.$mission_id);
			
			$donneesC10=$reponseC10->fetch();
			
			$reponseC10=$donneesC10['RDC_REPONSE'];
			$commentaireC10=$donneesC10['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="exist333" style="color:blue"><u>Le solde retracé dans le PV/livre de caisse est-il cohérent avec la balance générale des comptes ?</u></div></td>
			<td><?php echo $reponseC10; ?></td>
			<td><?php echo $commentaireC10; ?></td>
		</tr>
		<?php
			$reponseC11=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and RDC_RANG=11 and MISSION_ID='.$mission_id);
			
			$donneesC11=$reponseC11->fetch();
			
			$reponseC11=$donneesC11['RDC_REPONSE'];
			$commentaireC11=$donneesC11['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="exist3333" style="color:blue"><u>Avez-vous réalisé un comptage physique des encaisses lors de l'intervention ?</u></div></td>
			<td><?php echo $reponseC11; ?></td>
			<td><?php echo $commentaireC11; ?></td>
		</tr>
		<?php
			$reponseC12=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and RDC_RANG=12 and MISSION_ID='.$mission_id);
			
			$donneesC12=$reponseC12->fetch();
			
			$reponseC12=$donneesC12['RDC_REPONSE'];
			$commentaireC12=$donneesC12['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="exist33333" style="color:blue"><u>Le résultat du comptage physique est-il cohérent avec le journal de caisse ?</u></div></td>
			<td><?php echo $reponseC12; ?></td>
			<td><?php echo $commentaireC12; ?></td>
		</tr>
		<?php
			$reponseC13=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and RDC_RANG=13 and MISSION_ID='.$mission_id);
			
			$donneesC13=$reponseC13->fetch();
			
			$reponseC13=$donneesC13['RDC_REPONSE'];
			$commentaireC13=$donneesC13['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="exist333333" style="color:blue"><u>Confirmez-vous qu'aucun règlement en espèces d'achat de biens et services supérieur à Ariary 200 000,00 n'est constaté dans la comptabilité ?</u></div></td>
			<td><?php echo $reponseC13; ?></td>
			<td><?php echo $commentaireC13; ?></td>
		</tr>
		<?php
			$reponseC14=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and RDC_RANG=14 and MISSION_ID='.$mission_id);
			
			$donneesC14=$reponseC14->fetch();
			
			$reponseC14=$donneesC14['RDC_REPONSE'];
			$commentaireC14=$donneesC14['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="exist4" style="color:blue"><u>Avez-vous obtenu le grand livre général des comptes de virements internes ?</u></div></td>
			<td><?php echo $reponseC14; ?></td>
			<td><?php echo $commentaireC14; ?></td>
		</tr>
		<?php
			$reponseC15=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and RDC_RANG=15 and MISSION_ID='.$mission_id);
			
			$donneesC15=$reponseC15->fetch();
			
			$reponseC15=$donneesC15['RDC_REPONSE'];
			$commentaireC15=$donneesC15['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="exist5" style="color:blue"><u>Les soldes des grand-livres des comptes de virements internes sont-ils cohérents avec la balance générale ?</u></div></td>
			<td><?php echo $reponseC15; ?></td>
			<td><?php echo $commentaireC15; ?></td>
		</tr>
		<?php
			$reponseC16=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and RDC_RANG=16 and MISSION_ID='.$mission_id);
			
			$donneesC16=$reponseC16->fetch();
			
			$reponseC16=$donneesC16['RDC_REPONSE'];
			$commentaireC16=$donneesC16['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="exist55" style="color:blue"><u>Les éléments constitutifs du solde sont-ils correctement justifiés ?</u></div></td>
			<td><?php echo $reponseC16; ?></td>
			<td><?php echo $commentaireC16; ?></td>
		</tr>
		<?php
			$reponseC17=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and RDC_RANG=17 and MISSION_ID='.$mission_id);
			
			$donneesC17=$reponseC17->fetch();
			
			$reponseC17=$donneesC17['RDC_REPONSE'];
			$commentaireC17=$donneesC17['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="exist6" style="color:blue"><u>Les différences de change résultant des réévaluations sont-ils correctement comptabilisées ?</u></div></td>
			<td><?php echo $reponseC17; ?></td>
			<td><?php echo $commentaireC17; ?></td>
		</tr>
		<?php
			$reponseD1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="D" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donneesD1=$reponseD1->fetch();
			
			$reponseD1=$donneesD1['RDC_REPONSE'];
			$commentaireD1=$donneesD1['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<td bgcolor="#ccc" rowspan="2">D-Rattachement des opérations</td>
			<td><div id="rattach1" style="color:blue"><u>Le principe de séparation des exercices est-il respecté ?</u></div></td>
			<td><?php echo $reponseD1; ?></td>
			<td><?php echo $commentaireD1; ?></td>
		</tr>
		<?php
			$reponseD2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="D" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donneesD2=$reponseD2->fetch();
			
			$reponseD2=$donneesD2['RDC_REPONSE'];
			$commentaireD2=$donneesD2['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="rattach11" style="color:blue"><u>Les intérêts courus non échus sont-ils pris en compte dans la comptabilité ?</u></div></td>
			<td><?php echo $reponseD2; ?></td>
			<td><?php echo $commentaireD2; ?></td>
		</tr>
		<?php
			$reponseE1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="E" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donneesE1=$reponseE1->fetch();
			
			$reponseE1=$donneesE1['RDC_REPONSE'];
			$commentaireE1=$donneesE1['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<td bgcolor="#ccc">E-Juridique, fiscal et divers</td>
			<td><div id="jurid1" style="color:blue"><u>La liste des signataires correspond-elle avec le résultat des confirmations directes ?</u></div></td>
			<td><?php echo $reponseE1; ?></td>
			<td><?php echo $commentaireE1; ?></td>
		</tr>
		<?php
			$reponseF1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="F" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donneesF1=$reponseF1->fetch();
			
			$reponseF1=$donneesF1['RDC_REPONSE'];
			$commentaireF1=$donneesF1['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<td bgcolor="#ccc" rowspan="6">F-Information et présentation</td>
			<td><div id="info1" style="color:blue"><u>Confirmez-vous qu'aucune compensation dans la présentation au bilan des soldes débiteurs et créditeurs ne subsiste ?</u></div></td>
			<td><?php echo $reponseF1; ?></td>
			<td><?php echo $commentaireF1; ?></td>
		</tr>
		<?php
			$reponseF2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="F" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donneesF2=$reponseF2->fetch();
			
			$reponseF2=$donneesF2['RDC_REPONSE'];
			$commentaireF2=$donneesF2['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="info11" style="color:blue"><u>Confirmez-vous que les gains et pertes de change n'ont pas fait l'objet de compensation ?</u></div></td>
			<td><?php echo $reponseF2; ?></td>
			<td><?php echo $commentaireF2; ?></td>
		</tr>
		<?php
			$reponseF3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="F" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donneesF3=$reponseF3->fetch();
			
			$reponseF3=$donneesF3['RDC_REPONSE'];
			$commentaireF3=$donneesF3['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="info111" style="color:blue"><u>Assurez-vous que les plus ou moins values de cession de valeurs mobilières n'ont pas fait l'objet de compensation ?</u></div></td>
			<td><?php echo $reponseF3; ?></td>
			<td><?php echo $commentaireF3; ?></td>
		</tr>
		<?php
			$reponseF4=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="F" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donneesF4=$reponseF4->fetch();
			
			$reponseF4=$donneesF4['RDC_REPONSE'];
			$commentaireF4=$donneesF4['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="info2" style="color:blue"><u>Avez-vous vérifié les engagements financiers non inscrits au bilan (hypothèque, garanties, nantissements, …) ?</u></div></td>
			<td><?php echo $reponseF4; ?></td>
			<td><?php echo $commentaireF4; ?></td>
		</tr>
		<?php
			$reponseF5=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="F" and RDC_RANG=5 and MISSION_ID='.$mission_id);
			
			$donneesF5=$reponseF5->fetch();
			
			$reponseF5=$donneesF5['RDC_REPONSE'];
			$commentaireF5=$donneesF5['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="info22" style="color:blue"><u>Les engagements hors bilan sont-ils mentionnés dans les annexes aux états financiers ?</u></div></td>
			<td><?php echo $reponseF5; ?></td>
			<td><?php echo $commentaireF5; ?></td>
		</tr>
		<?php
			$reponseF6=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="tresorerie" and RDC_OBJECTIF="F" and RDC_RANG=6 and MISSION_ID='.$mission_id);
			
			$donneesF6=$reponseF6->fetch();
			
			$reponseF6=$donneesF6['RDC_REPONSE'];
			$commentaireF6=$donneesF6['RDC_COMMENTAIRE'];			
		?>
		<tr bgcolor="white">
			<!-- <td></td> -->
			<td><div id="info222" style="color:blue"><u>Les différence de change présentant un montant significatif sont-elles données en annexes ?</u></div></td>
			<td><?php echo $reponseF6; ?></td>
			<td><?php echo $commentaireF6; ?></td>
		</tr>
	</table>
</div>
	<input type="button" value="Retour" id="bt_retour" class="bouton"/>
	<input type="button" value="synthèse" id="synthese_feuille" class="bouton">
</body>
</html>