<?php
@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../connexion.php';

?>
<html>
<head>

<link rel="stylesheet" href="../RDC/stock/css_stock.css">
<script>
	// Droit cycle by Tolotra
    // Page : RDC -> Stocks
    // Tâche : Stocks, 20
    $.ajax(
        {
            type: 'POST',
            url: 'droitCycle.php',
            data: {task_id: 20},
            success: function (e) {
                var result = 0 === Number(e);
                $("#synthese_feuille").attr('disabled', result);
            }
        }
    );

	$(function(){
		$('#bt_retour').click(function(){
			waiting();$('#contenue').load("RDC/stock/index.php",stopWaiting);
		});
		
		$('#synthese_feuille').click(function(){
			waiting();$('#contenue').load("RDC/stock/synthese_stock.php",stopWaiting);
		});
		
		$('#coh').click(function(){
			waiting();$('#contenue').load("RDC/stock/A_coherence/coherence.php?coherence_visible=OK",stopWaiting);
		});
		
		$('#coh1').click(function(){
			waiting();$('#contenue').load("RDC/stock/A_coherence/coherence1.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh2').click(function(){
			waiting();$('#contenue').load("RDC/stock/A_coherence/coherence2.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh22').click(function(){
			waiting();$('#contenue').load("RDC/stock/A_coherence/coherence2.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh3').click(function(){
			waiting();$('#contenue').load("RDC/stock/A_coherence/coherence3.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh4').click(function(){
			waiting();$('#contenue').load("RDC/stock/A_coherence/coherence4.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh44').click(function(){
			waiting();$('#contenue').load("RDC/stock/A_coherence/coherence4.php?coherence_visible=OK",stopWaiting);
		});
		$('#coh444').click(function(){
			waiting();$('#contenue').load("RDC/stock/A_coherence/coherence4.php?coherence_visible=OK",stopWaiting);
		});
		$('#exist1').click(function(){
			waiting();$('#contenue').load("RDC/stock/B_existence/existence1.php?existence_visible=OK",stopWaiting);
		});
		$('#exist2').click(function(){
			waiting();$('#contenue').load("RDC/stock/B_existence/existence2.php?existence_visible=OK",stopWaiting);
		});
		$('#exist3').click(function(){
			waiting();$('#contenue').load("RDC/stock/B_existence/existence3.php?existence_visible=OK",stopWaiting);
		});
		$('#exist4').click(function(){
			waiting();$('#contenue').load("RDC/stock/B_existence/existence4.php?existence_visible=OK",stopWaiting);
		});
		$('#exist44').click(function(){
			waiting();$('#contenue').load("RDC/stock/B_existence/existence44.php?existence_visible=OK",stopWaiting);
		});
		$('#eval1').click(function(){
			waiting();$('#contenue').load("RDC/stock/C_evaluation/evaluation1.php?evaluation_visible=OK",stopWaiting);
		});
		$('#eval2').click(function(){
			waiting();$('#contenue').load("RDC/stock/C_evaluation/evaluation2.php?evaluation_visible=OK",stopWaiting);
		});
		$('#eval22').click(function(){
			waiting();$('#contenue').load("RDC/stock/C_evaluation/evaluation2.php?evaluation_visible=OK",stopWaiting);
		});
		$('#eval3').click(function(){
			waiting();$('#contenue').load("RDC/stock/C_evaluation/evaluation3.php?evaluation_visible=OK",stopWaiting);
		});
		$('#eval33').click(function(){
			waiting();$('#contenue').load("RDC/stock/C_evaluation/evaluation3.php?evaluation_visible=OK",stopWaiting);
		});
		$('#eval4').click(function(){
			waiting();$('#contenue').load("RDC/stock/C_evaluation/evaluation4.php?evaluation_visible=OK",stopWaiting);
		});
		$('#eval44').click(function(){
			waiting();$('#contenue').load("RDC/stock/C_evaluation/evaluation4.php?evaluation_visible=OK",stopWaiting);
		});
		$('#eval5').click(function(){
			waiting();$('#contenue').load("RDC/stock/C_evaluation/evaluation5.php?evaluation_visible=OK",stopWaiting);
		});
		$('#eval55').click(function(){
			waiting();$('#contenue').load("RDC/stock/C_evaluation/evaluation5.php?evaluation_visible=OK",stopWaiting);
		});
		$('#eval6').click(function(){
			waiting();$('#contenue').load("RDC/stock/C_evaluation/evaluation6.php?evaluation_visible=OK",stopWaiting);
		});
		$('#rattach1').click(function(){
			waiting();$('#contenue').load("RDC/stock/D_rattachement/rattachement1.php?rattachement_visible=OK",stopWaiting);
		});
		$('#rattach2').click(function(){
			waiting();$('#contenue').load("RDC/stock/D_rattachement/rattachement2.php?rattachement_visible=OK",stopWaiting);
		});
		$('#rattach22').click(function(){
			waiting();$('#contenue').load("RDC/stock/D_rattachement/rattachement2.php?rattachement_visible=OK",stopWaiting);
		});
		$('#jurid1').click(function(){
			waiting();$('#contenue').load("RDC/stock/E_juridique/juridique1.php?juridique_visible=OK",stopWaiting);
		});
		$('#info1').click(function(){
			waiting();$('#contenue').load("RDC/stock/F_information/information1.php?information_visible=OK",stopWaiting);
		});
		$('#info2').click(function(){
			waiting();$('#contenue').load("RDC/stock/F_information/information2.php?information_visible=OK",stopWaiting);
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
		<td><label>LA FEUILLE MAITRESSE DU CYCLE STOCK</label></td>
	</tr>
</table>
<div>
	<table width="100%" style="color:white;">
		<tr align="center" bgcolor="#6495ED">
			<td width="20%">Objéctifs d'audit</td>
			<td width="40%">Questions / tests</td>
			<td width="10%">Réponses</td>
			<td width="30%">Commentaires</td>
		</tr>
	</table>
<div id="table_id" style="overflow:auto;height:410px;">
	<table class="tr_ligne" border="1">		
		<?php	
			
			$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="A" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees1=$reponse1->fetch();
			
			$reponse1=$donnees1['RDC_REPONSE'];
			$commentaire1=$donnees1['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc" rowspan="8">A-Cohérence et principes comptables </td>
			<td width="40.7%"><div id="coh" style="color:blue"><u>A-t-on effectué une revue analytique par rapport à(aux) l'exercice(s) précédent(s) ?</u></div></td>
			<td width="10.1%"><?php echo $reponse1; ?></td>
			<td width="29%"><?php echo $commentaire1; ?></td>
		</tr>
<?php	
			
			$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="A" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees2=$reponse2->fetch();
			
			$reponse2=$donnees2['RDC_REPONSE'];
			$commentaire2=$donnees2['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<!-- <td width="20.2%"></td> -->
			<td width="40.7%"><div id="coh1" style="color:blue"><u>Avez-vous effectué l'examen des ratios permettant de mesurer l'importance des stocks en nombre de jours de production (PF & en-cours) ou nombre de jours</u></div></td>
			<td width="10.1%"><?php echo $reponse2; ?></td>
			<td width="29%"><?php echo $commentaire2; ?></td>
		</tr>
		<?php	
			
			$reponse3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="A" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donnees3=$reponse3->fetch();
			
			$reponse3=$donnees3['RDC_REPONSE'];
			$commentaire3=$donnees3['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<!-- <td width="20.2%"></td> -->
			<td width="40.7%"><div id="coh2" style="color:blue"><u>Avez-vous examiné l'évolution du taux moyen de provision, globalement, et par catégorie de stocks ?</u></div></td>
			<td width="10.1%"><?php echo $reponse3; ?></td>
			<td width="29%"><?php echo $commentaire3; ?></td>
		</tr>
		<?php	
			
			$reponse4=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="A" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donnees4=$reponse4->fetch();
			
			$reponse4=$donnees4['RDC_REPONSE'];
			$commentaire4=$donnees4['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<!-- <td width="20.2%"></td> -->
			<td width="40.7%"><div id="coh22" style="color:blue"><u>Avez-vous obtenu des explications nécessaires sur les évolutions les plus significatives ?</u></div></td>
			<td width="10.1%"><?php echo $reponse4; ?></td>
			<td width="29%"><?php echo $commentaire4; ?></td>
		</tr>
		<?php	
			
			$reponse5=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="A" and RDC_RANG=5 and MISSION_ID='.$mission_id);
			
			$donnees5=$reponse5->fetch();
			
			$reponse5=$donnees5['RDC_REPONSE'];
			$commentaire5=$donnees5['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<!-- <td width="20.2%"></td> -->
			<td width="40.7%"><div id="coh3" style="color:blue"><u>Les stocks d'ouverture et les stocks de clôture sont-ils conformes avec la variation de stocks ?</u></div></td>
			<td width="10.1%"><?php echo $reponse5; ?></td>
			<td width="29%"><?php echo $commentaire5; ?></td>
		</tr>
		<?php	
			
			$reponse6=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="A" and RDC_RANG=6 and MISSION_ID='.$mission_id);
			
			$donnees6=$reponse6->fetch();
			
			$reponse6=$donnees6['RDC_REPONSE'];
			$commentaire6=$donnees6['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<!-- <td width="20.2%"></td> -->
			<td width="40.7%"><div id="coh4" style="color:blue"><u>Tous les éléments traités dans les stocks répondent-ils aux critères fixés par le PCG ?</u></div></td>
			<td width="10.1%"><?php echo $reponse6; ?></td>
			<td width="29%"><?php echo $commentaire6; ?></td>
		</tr>
		<?php	
			
			$reponse7=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="A" and RDC_RANG=7 and MISSION_ID='.$mission_id);
			
			$donnees7=$reponse7->fetch();
			
			$reponse7=$donnees7['RDC_REPONSE'];
			$commentaire7=$donnees7['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<!-- <td width="20.2%"></td> -->
			<td width="40.7%"><div id="coh44" style="color:blue"><u>Les principes comptables appliqués par la société sont-ils cohérents avec le secteur dans lequel elle exerce ?</u></div></td>
			<td width="10.1%"><?php echo $reponse7; ?></td>
			<td width="29%"><?php echo $commentaire7; ?></td>
		</tr>
		<?php				
			$reponse8=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="A" and RDC_RANG=8 and MISSION_ID='.$mission_id);
			
			$donnees8=$reponse8->fetch();
			
			$reponse8=$donnees8['RDC_REPONSE'];
			$commentaire8=$donnees8['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<!-- <td width="20.2%"></td> -->
			<td width="40.7%"><div id="coh444" style="color:blue"><u>La méthode de valorisation et de dépréciation appliquée est-elle utilisée de façon permanente (du moins sur les deux derniers exercices) ?</u></div></td><br/><br/>
			<td width="10.1%"><?php echo $reponse8; ?></td>
			<td width="29%"><?php echo $commentaire8; ?></td>
		</tr>
		<?php				
			$reponse9=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="B" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees9=$reponse9->fetch();
			
			$reponse9=$donnees9['RDC_REPONSE'];
			$commentaire9=$donnees9['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc" rowspan="5">B - Existence des soldes</td>
			<td width="40.7%"><div id="exist1" style="color:blue"><u>Les résultats d'inventaire physique de stocks en fin d'exercice sont-ils cohérents ?</u></div></td>
			<td width="10.1%"><?php echo $reponse9; ?></td>
			<td width="29%"><?php echo $commentaire9; ?></td>
		</tr>
		<?php				
			$reponse10=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="B" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees10=$reponse10->fetch();
			
			$reponse10=$donnees10['RDC_REPONSE'];
			$commentaire10=$donnees10['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<!-- <td width="20.2%"></td> -->
			<td width="40.7%"><div id="exist2" style="color:blue"><u>A-t-on rapproché, par sondage, l'état théorique final des stocks et l'état d'inventaire physique final ?</u></div></td>
			<td width="10.1%"><?php echo $reponse10; ?></td>
			<td width="29%"><?php echo $commentaire10; ?></td>
		</tr>
		<?php				
			$reponse11=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="B" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donnees11=$reponse11->fetch();
			
			$reponse11=$donnees11['RDC_REPONSE'];
			$commentaire11=$donnees11['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<!-- <td width="20.2%"></td> -->
			<td width="40.7%"><div id="exist3" style="color:blue"><u>A-t-on obtenu les états de stocks des tous les lieux de stockage ?</u></div></td>
			<td width="10.1%"><?php echo $reponse11; ?></td>
			<td width="29%"><?php echo $commentaire11; ?></td>
		</tr>
		<?php				
			$reponse12=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="B" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donnees12=$reponse12->fetch();
			
			$reponse12=$donnees12['RDC_REPONSE'];
			$commentaire12=$donnees12['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<!-- <td width="20.2%"></td> -->
			<td width="40.7%"><div id="exist4" style="color:blue"><u>Tous les stocks appartiennent-ils à la société ? (existence éventuel de stoks appartenant à des tiers dans le bilan)</u></div></td>
			<td width="10.1%"><?php echo $reponse12; ?></td>
			<td width="29%"><?php echo $commentaire12; ?></td>
		</tr>
		<?php				
			$reponse13=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="B" and RDC_RANG=5 and MISSION_ID='.$mission_id);
			
			$donnees13=$reponse13->fetch();
			
			$reponse13=$donnees13['RDC_REPONSE'];
			$commentaire13=$donnees13['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<!-- <td width="20.2%"></td> -->
			<td width="40.7%"><div id="exist44" style="color:blue"><u>Les stocks appartenant à la société et en dépôt à l'extérieur sont-ils bien recensés dans l'inventaire final valorisé ?</u></div></td>
			<td width="10.1%"><?php echo $reponse13; ?></td>
			<td width="29%"><?php echo $commentaire13; ?></td>
		</tr>
		<?php				
			$reponse14=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="C" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees14=$reponse14->fetch();
			
			$reponse14=$donnees14['RDC_REPONSE'];
			$commentaire14=$donnees14['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc" rowspan="10">C - Evaluation des soldes</td>
			<td width="40.7%"><div id="eval1" style="color:blue"><u>A-t-on effectué la vérification arthmétique de l'état détaillé d'inventaire de stocks ?</u></div></td>
			<td width="10.1%"><?php echo $reponse14; ?></td>
			<td width="29%"><?php echo $commentaire14; ?></td>
		</tr>
		<?php				
			$reponse15=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="C" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees15=$reponse15->fetch();
			
			$reponse15=$donnees15['RDC_REPONSE'];
			$commentaire15=$donnees15['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<!-- <td width="20.2%"></td> -->
			<td width="40.7%"><div id="eval2" style="color:blue"><u>Les stocks sont-ils valorisés correctement ?</u></div></td>
			<td width="10.1%"><?php echo $reponse15; ?></td>
			<td width="29%"><?php echo $commentaire15; ?></td>
		</tr>
		<?php				
			$reponse16=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="C" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donnees16=$reponse16->fetch();
			
			$reponse16=$donnees16['RDC_REPONSE'];
			$commentaire16=$donnees16['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<!-- <td width="20.2%"></td> -->
			<td width="40.7%"><div id="eval22" style="color:blue"><u>Les provisions pour dépréciation sont elles suffisantes et justifiées ?</u></div></td>
			<td width="10.1%"><?php echo $reponse16; ?></td>
			<td width="29%"><?php echo $commentaire16; ?></td>
		</tr>
		<?php				
			$reponse17=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="C" and RDC_RANG=4 and MISSION_ID='.$mission_id);
			
			$donnees17=$reponse17->fetch();
			
			$reponse17=$donnees17['RDC_REPONSE'];
			$commentaire17=$donnees17['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<!-- <td width="20.2%"></td> -->
			<td width="40.7%"><div id="eval3" style="color:blue"><u>Les articles rentrés en stocks sont-ils valorisés conformement aux méthodes utilisées par la société ?</u></div></td>
			<td width="10.1%"><?php echo $reponse17; ?></td>
			<td width="29%"><?php echo $commentaire17; ?></td>
		</tr>
		<?php				
			$reponse18=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="C" and RDC_RANG=5 and MISSION_ID='.$mission_id);
			
			$donnees18=$reponse18->fetch();
			
			$reponse18=$donnees18['RDC_REPONSE'];
			$commentaire18=$donnees18['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<!-- <td width="20.2%"></td> -->
			<td width="40.7%"><div id="eval33" style="color:blue"><u>Ces articles font-ils l'objet d'un calcul de dépreciation à la clôture conformement aux méthodes utilisés par la société ?</u></div></td>
			<td width="10.1%"><?php echo $reponse18; ?></td>
			<td width="29%"><?php echo $commentaire18; ?></td>
		</tr>
		<?php				
			$reponse19=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="C" and RDC_RANG=6 and MISSION_ID='.$mission_id);
			
			$donnees19=$reponse19->fetch();
			
			$reponse19=$donnees19['RDC_REPONSE'];
			$commentaire19=$donnees19['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<!-- <td width="20.2%"></td> -->
			<td width="40.7%"><div id="eval4" style="color:blue"><u>A-t-on effectué la comparaison du coût de revient /prix de marché et prix de vente ?</u></div></td>
			<td width="10.1%"><?php echo $reponse19; ?></td>
			<td width="29%"><?php echo $commentaire19; ?></td>
		</tr>
		<?php				
			$reponse20=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="C" and RDC_RANG=7 and MISSION_ID='.$mission_id);
			
			$donnees20=$reponse20->fetch();
			
			$reponse20=$donnees20['RDC_REPONSE'];
			$commentaire20=$donnees20['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<!-- <td width="20.2%"></td> -->
			<td width="40.7%"><div id="eval44" style="color:blue"><u>Les éventuelles pertes de valeur ont-elles été traitées régulièrement ?</u></div></td>
			<td width="10.1%"><?php echo $reponse20; ?></td>
			<td width="29%"><?php echo $commentaire20; ?></td>
		</tr>
		<?php				
			$reponse21=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="C" and RDC_RANG=8 and MISSION_ID='.$mission_id);
			
			$donnees21=$reponse21->fetch();
			
			$reponse21=$donnees21['RDC_REPONSE'];
			$commentaire21=$donnees21['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<!-- <td width="20.2%"></td> -->
			<td width="40.7%"><div id="eval5" style="color:blue"><u>Existe-t-il une comptabilité analytique permettant d'évaluer la sur ou sous-activité ?</u></div></td>
			<td width="10.1%"><?php echo $reponse21; ?></td>
			<td width="29%"><?php echo $commentaire21; ?></td>
		</tr>
		<?php				
			$reponse22=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="C" and RDC_RANG=9 and MISSION_ID='.$mission_id);
			
			$donnees22=$reponse22->fetch();
			
			$reponse22=$donnees22['RDC_REPONSE'];
			$commentaire22=$donnees22['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<!-- <td width="20.2%"></td> -->
			<td width="40.7%"><div id="eval55" style="color:blue"><u>La sur ou sous activité est-elle prise en compte dans la détermination du coût de revient ?</u></div></td>
			<td width="10.1%"><?php echo $reponse22; ?></td>
			<td width="29%"><?php echo $commentaire22; ?></td>
		</tr>
		<?php				
			$reponse23=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="C" and RDC_RANG=10 and MISSION_ID='.$mission_id);
			
			$donnees23=$reponse23->fetch();
			
			$reponse23=$donnees23['RDC_REPONSE'];
			$commentaire23=$donnees23['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<!-- <td width="20.2%"></td> -->
			<td width="40.7%"><div id="eval6" style="color:blue"><u>A-t-on verifié la régularité des enregistrements des dotations et de reprises de provision pour dépréciation ?</u></div></td>
			<td width="10.1%"><?php echo $reponse23; ?></td>
			<td width="29%"><?php echo $commentaire23; ?></td>
		</tr>	
		<?php				
			$reponse24=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="D" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees24=$reponse24->fetch();
			
			$reponse24=$donnees24['RDC_REPONSE'];
			$commentaire24=$donnees24['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc" rowspan="3">D - Rattachement des opérations</td>
			<td width="40.7%"><div id="rattach1" style="color:blue"><u>Vous êtes-vous assuré de l'absence d'opération ne se rattachant pas au bon exercice ?</u></div></td>
			<td width="10.1%"><?php echo $reponse24; ?></td>
			<td width="29%"><?php echo $commentaire24; ?></td>
		</tr>	
		<?php				
			$reponse25=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="D" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees25=$reponse25->fetch();
			
			$reponse25=$donnees25['RDC_REPONSE'];
			$commentaire25=$donnees25['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<!-- <td width="20.2%"></td> -->
			<td width="40.7%"><div id="rattach2" style="color:blue"><u>A-t-on obtenu l'état des stocks en transit ?</u></div></td>
			<td width="10.1%"><?php echo $reponse25; ?></td>
			<td width="29%"><?php echo $commentaire25; ?></td>
		</tr>		
		<?php				
			$reponse26=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="D" and RDC_RANG=3 and MISSION_ID='.$mission_id);
			
			$donnees26=$reponse26->fetch();
			
			$reponse26=$donnees26['RDC_REPONSE'];
			$commentaire26=$donnees26['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<!-- <td width="20.2%"></td> -->
			<td width="40.7%"><div id="rattach22" style="color:blue"><u>Les stocks en transit sont-ils traités correctement ?</u></div></td>
			<td width="10.1%"><?php echo $reponse26; ?></td>
			<td width="29%"><?php echo $commentaire26; ?></td>
		</tr>	
		<?php				
			$reponse27=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="E" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees27=$reponse27->fetch();
			
			$reponse27=$donnees27['RDC_REPONSE'];
			$commentaire27=$donnees27['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc">E - Juridique fiscal et divers</td>
			<td width="40.7%"><div id="jurid1" style="color:blue"><u>Vous êtes-vous assuré de l'absence d'opération ne se rattachant pas au bon exercice ?</u></div></td>
			<td width="10.1%"><?php echo $reponse27; ?></td>
			<td width="29%"><?php echo $commentaire27; ?></td>
		</tr>	
		<?php				
			$reponse28=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="F" and RDC_RANG=1 and MISSION_ID='.$mission_id);
			
			$donnees28=$reponse28->fetch();
			
			$reponse28=$donnees28['RDC_REPONSE'];
			$commentaire28=$donnees28['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<td width="20.2%" bgcolor="#ccc" rowspan="2">F - Information et présentation</td>
			<td width="40.7%"><div id="info1" style="color:blue"><u>Vous êtes-vous assuré que la perte de valeur éventuelle ne soit pas compensée avec la valeur brute des stocks ?</u></div></td>
			<td width="10.1%"><?php echo $reponse28; ?></td>
			<td width="29%"><?php echo $commentaire28; ?></td>
		</tr>	
		<?php				
			$reponse29=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="stock" and RDC_OBJECTIF="F" and RDC_RANG=2 and MISSION_ID='.$mission_id);
			
			$donnees29=$reponse29->fetch();
			
			$reponse29=$donnees29['RDC_REPONSE'];
			$commentaire29=$donnees29['RDC_COMMENTAIRE'];
		?>
		<tr bgcolor="white">
			<!-- <td width="20.2%"></td> -->
			<td width="40.7%"><div id="info2" style="color:blue"><u>Confirmez-vous que tous les détails des états financiers ainsi que toutes les informations devant figurer dans les annexes aux états financiers y sont présentées ?</u></div></td>
			<td width="10.1%"><?php echo $reponse29; ?></td>
			<td width="29%"><?php echo $commentaire29; ?></td>
		</tr>	
	</table>	
</div>
<input type="button" value="Retour" id="bt_retour" class="bouton" />
<input type="button" value="synthèse" id="synthese_feuille" class="bouton">
</body>
</html>