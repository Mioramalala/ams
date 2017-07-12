<?php  @session_start();
$mission_id=@$_SESSION['idMission'];
	include '../../connexion.php';
?>
<script>
	// Droit cycle by Tolotra
    // Page : RDC -> Fonds propres
    // Tâche : A-Fonds propres, 47
    var editable = false;
    $.ajax(
        {
            type: 'POST',
            url: 'droitCycle.php',
            data: {task_id: 47},
            success: function (e) {
                var result = 0 === Number(e);
                editable = !result;
                $("#synthese_feuille").attr('disabled', result);
            }
        }
    );

	$("#retour").click(function(){
		$("#contenue").load("RDC/fond_propre/accFP.php");
	});
	
	$('#synthese_feuille').click(function(){
		$('#contenue').load("RDC/fond_propre/synthese_fond.php");
	});
	
	$('#coh1').click(function(){
		$('#contenue').load("RDC/fond_propre/CohPriCo/TabRA.php");
	});
	
	$('#coh11').click(function(){
		$('#contenue').load("RDC/fond_propre/CohPriCo/TabRA.php");
	});
	
	$('#coh2').click(function(){
		$('#contenue').load("RDC/fond_propre/CohPriCo/TabRA2.php");
	});
	
	$('#coh22').click(function(){
		$('#contenue').load("RDC/fond_propre/CohPriCo/TabRA2.php");
	});
	
	$('#reg1').click(function(){
		$('#contenue').load("RDC/fond_propre/B/Feuill_B1.php");
	});
	
	$('#reg2').click(function(){
		$('#contenue').load("RDC/fond_propre/B/Feuill_B2.php");
	});
	
	$('#reg22').click(function(){
		$('#contenue').load("RDC/fond_propre/B/Feuill_B2.php");
	});
	
	$('#reg3').click(function(){
		$('#contenue').load("RDC/fond_propre/B/Feuill_B3.php");
	});
	
	$('#exist1').click(function(){
		$('#contenue').load("RDC/fond_propre/C/Feuill_C1.php");
	});
	
	$('#exist2').click(function(){
		$('#contenue').load("RDC/fond_propre/C/Feuill_C2.php");
	});
	
	$('#jurid1').click(function(){
		$('#contenue').load("RDC/fond_propre/D/Feuill_D1.php");
	});
	
	$('#jurid2').click(function(){
		$('#contenue').load("RDC/fond_propre/D/Feuill_D2.php");
	});
	
	$('#jurid22').click(function(){
		$('#contenue').load("RDC/fond_propre/D/Feuill_D2.php");
	});
	
	$('#jurid222').click(function(){
		$('#contenue').load("RDC/fond_propre/D/Feuill_D2.php");
	});
	
	$('#jurid2222').click(function(){
		$('#contenue').load("RDC/fond_propre/D/Feuill_D2.php");
	});
	
	$('#info1').click(function(){
		$('#contenue').load("RDC/fond_propre/E/Feuill_E.php");
	});
	
</script>
<style>
.fm-titre table{
border-collapse:collapse;
}
.fm-titre tr{
	background-color:#efefef;
}
.fm-titre table td{
border:1px solid #fff;
}
.fm table{
border-collapse:collapse;
}

.fm table td{
border:1px solid #ccc;
background-color:#fff;
}
.cadre-fm{
height:75%;
overflow:auto;
}
#retoure{
width: 100px;
height: 25px;
background-color: #ccc;
border: 2px solid #bfbfbf;
font-family: Calibri;
font-size: 12px;
border-radius: 3px 3px 3px 3px;
font-weight: bold;
}

#retoure:hover{
background-color:#fff;
cursor:pointer;

}
</style>

		<div id="GranTitre">FEUILLE MAITRESSE</div>
		<div class="fm-titre">
			<table width="100%">
				<tr class="sous-titre">
					<td width="19.7%">Objectifs d'audit</td>
					<td width="39.5%">Questions/Tests</td>
					<td width="10%">Réponses</td>
					<td width="35%">Commentaires</td>
				</tr>
			</table>
		</div>
		<div class="cadre-fm">
			<div class="fm">
				<table>
					<tr>
						<td colspan="4"  bgcolor="#ccc">A- COHERENCES ET PRINCIPES COMPTABLES</td>
					</tr>
					<tr>
						<?php
						$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="A" and RDC_RANG=1 and MISSION_ID='.$mission_id);
						$donnees1=$reponse1->fetch();
						
						$reponse1=$donnees1['RDC_REPONSE'];
						$commentaire1=$donnees1['RDC_COMMENTAIRE'];
						?>
						
						<td  width="20%" rowspan="2">  </td>
						<td  width="40%"><div id="coh1" style="color:blue"><u>Avez-vous réalisé une revue analytique?</u></div></td>
						<td  width="10%"><?php echo $reponse1;?></td>
						<td  width="30%"><?php echo $commentaire1?></td>
					</tr>
						<?php
						$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="A" and RDC_RANG=2 and MISSION_ID='.$mission_id);
						$donnees2=$reponse2->fetch();
						
						$reponse2=$donnees2['RDC_REPONSE'];
						$commentaire2=$donnees2['RDC_COMMENTAIRE'];
						?>					
					<tr>
						<td width="40%"><div id="coh11" style="color:blue"><u>Cette revue a-t-elle fait l'objet d'une analyse?</u></div></td>
						<td width="10%"><?php echo $reponse2;?></td>
						<td width="30%"><?php echo $commentaire2;?></td>
					</tr>
					<tr>
						<?php 
						$reponse3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="A" and RDC_RANG=3 and MISSION_ID='.$mission_id);
						$donnees3=$reponse3->fetch();
						
						$reponse3=$donnees3['RDC_REPONSE'];
						$commentaire3=$donnees3['RDC_COMMENTAIRE'];						
						
						?>
						<td width="20%" rowspan="2"></td>
						<td width="40%"><div id="coh2" style="color:blue"><u>Les registres sont-ils à jour et bien tenus ?</u></div></td>
						<td width="10%"><?php echo $reponse3;?></td>
						<td width="30%"><?php echo $commentaire3;?></td>
					</tr>
					<tr>
						<?php 
						$reponse4=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="A" and RDC_RANG=4 and MISSION_ID='.$mission_id);
						$donnees4=$reponse4->fetch();
						
						$reponse4=$donnees4['RDC_REPONSE'];
						$commentaire4=$donnees4['RDC_COMMENTAIRE'];						
						
						?>
						<td width="40%"><div id="coh22" style="color:blue"><u>Le principe de permanence des méthodes est-il régulièrement respecté?</u></div></td>
						<td width="10%"><?php echo $reponse4;?></td>
						<td width="30%"><?php echo $commentaire4;?></td>
					</tr>
					<tr>
						<td colspan="4"  bgcolor="#ccc">B- REGULARITE DES ENREGISTREMENTS</td>
					</tr>
					<tr>
						<?php 
						$reponse5=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="B" and RDC_RANG=1 and MISSION_ID='.$mission_id);
						$donnees5=$reponse5->fetch();
						
						$reponse5=$donnees5['RDC_REPONSE'];
						$commentaire5=$donnees5['RDC_COMMENTAIRE'];						
						?>
						<td width="20%"></td>
						<td width="40%"><div id="reg1" style="color:blue"><u>Les formalités légales et statutaires d'approbation des comptes sont-elles bien respectées?</u></div></td>
						<td width="10%"><?php echo $reponse5;?></td>
						<td width="30%"><?php echo $commentaire5;?></td>
					</tr>
					<tr>
						<?php
						$reponse6=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="B" and RDC_RANG=2 and MISSION_ID='.$mission_id);
						$donnees6=$reponse6->fetch();
						
						$reponse6=$donnees6['RDC_REPONSE'];
						$commentaire6=$donnees6['RDC_COMMENTAIRE'];	
						?>
						
						<td  width="20%" rowspan="2">  </td>
						<td  width="40%"><div id="reg2" style="color:blue"><u>Les conditions requises pour pouvoir distribuer des dividendes sont-elles remplies?</u></div></td>
						<td  width="10%"><?php echo $reponse6;?></td>
						<td  width="30%"><?php echo $commentaire6?></td>
					</tr>
					<tr>
						<?php
						$reponse7=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="B" and RDC_RANG=3 and MISSION_ID='.$mission_id);
						$donnees7=$reponse7->fetch();
						
						$reponse7=$donnees7['RDC_REPONSE'];
						$commentaire7=$donnees7['RDC_COMMENTAIRE'];	
						?>
						<td  width="40%"><div id="reg22" style="color:blue"><u>Les formalités relatives à l'octroi d'acompte sur dividendes sont-elles bien ?</u></div></td>
						<td  width="10%"><?php echo $reponse7;?></td>
						<td  width="30%"><?php echo $commentaire7?></td>
					</tr>
					<tr>
						<?php
						$reponse8=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="B" and RDC_RANG=4 and MISSION_ID='.$mission_id);
						$donnees8=$reponse8->fetch();
						
						$reponse8=$donnees8['RDC_REPONSE'];
						$commentaire8=$donnees8['RDC_COMMENTAIRE'];	
						?>
						
						<td  width="20%"> </td>
						<td  width="40%"><div id="reg3" style="color:blue"><u>Les opérations enregistrées concernant la classe 1 sont-elles justifiées ?</u></div></td>
						<td  width="10%"><?php echo $reponse8;?></td>
						<td  width="30%"><?php echo $commentaire8?></td>
					</tr>
					<tr colspan="4">
						<td colspan="4"  bgcolor="#ccc">C- EXISTENCE DES SOLDES</td>
					</tr>
					
					<tr>
						<?php
						$reponse9=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="C" and RDC_RANG=1 and MISSION_ID='.$mission_id);
						$donnees9=$reponse9->fetch();
						
						$reponse9=$donnees9['RDC_REPONSE'];
						$commentaire9=$donnees9['RDC_COMMENTAIRE'];	
						?>
						
						<td width="20%" rowspan="2"></td>
						<td width="40%"><div id="exist1" style="color:blue"><u>Les soldes des comptes de la classe 1 (hors emprunts) sont-ils justifiés ?</u></div></td>
						<td width="10%"><?php echo $reponse9;?></td>
						<td width="30%"><?php echo $commentaire9;?></td>

					</tr>
					<tr>
						<?php
						$reponse10=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="C" and RDC_RANG=2 and MISSION_ID='.$mission_id);
						$donnees10=$reponse10->fetch();
						
						$reponse10=$donnees10['RDC_REPONSE'];
						$commentaire10=$donnees10['RDC_COMMENTAIRE'];	
						?>
						
						<td width="40%"><div id="exist2" style="color:blue"><u>Les ID sont-ils bien recensés? Les calculs et le mode de comptabilisation sont-ils effectués correctement ?</u></div></td>
						<td width="10%"><?php echo $reponse10;?></td>
						<td width="30%"><?php echo $commentaire10;?></td>

					</tr>
					
					<tr>
						<td colspan="4"  bgcolor="#ccc">D- JURIDIQUE, FISCAL ET DIVERS</td>
					</tr>
					<tr>
						<?php
						$reponse11=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="D" and RDC_RANG=1 and MISSION_ID='.$mission_id);
						$donnees11=$reponse11->fetch();
						
						$reponse11=$donnees11['RDC_REPONSE'];
						$commentaire11=$donnees11['RDC_COMMENTAIRE'];	
						?>
						
						<td width="20%"> </td>
						<td width="40%"><div id="jurid1" style="color:blue"><u>Les dispositions légales et statutaires relatives à des affaires sociales (droit des sociétés)
												qui ont survenus au cours de l'exercice sont-elles respectées? </u></div></td>
						<td width="10%"><?php echo $reponse11;?></td>
						<td width="30%"><?php echo $commentaire11;?></td>

					</tr>
					<tr>
						<?php
						$reponse12=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="D" and RDC_RANG=2 and MISSION_ID='.$mission_id);
						$donnees12=$reponse12->fetch();
						
						$reponse12=$donnees12['RDC_REPONSE'];
						$commentaire12=$donnees12['RDC_COMMENTAIRE'];	
						?>
						
						<td width="20%"> </td>
						<td width="40%"><div id="jurid2" style="color:blue"><u>Les procédures consécutives à la perte de la moitié du capital social sont-elles réalisées ? </u></div></td>
						<td width="10%"><?php echo $reponse12;?></td>
						<td width="30%"><?php echo $commentaire12;?></td>

					</tr>
					<tr>
						<?php
						$reponse13=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="D" and RDC_RANG=3 and MISSION_ID='.$mission_id);
						$donnees13=$reponse13->fetch();
						
						$reponse13=$donnees13['RDC_REPONSE'];
						$commentaire13=$donnees13['RDC_COMMENTAIRE'];	
						?>
						
						<td width="20%">  </td>
						<td width="40%"><div id="jurid22" style="color:blue"><u>Les dettes sont-elles liquides et exigibles? </u></div></td>
						<td width="10%"><?php echo $reponse13;?></td>
						<td width="30%"><?php echo $commentaire13;?></td>

					</tr>
					<tr>
						<?php
						$reponse14=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="D" and RDC_RANG=4 and MISSION_ID='.$mission_id);
						$donnees14=$reponse14->fetch();
						
						$reponse14=$donnees14['RDC_REPONSE'];
						$commentaire14=$donnees14['RDC_COMMENTAIRE'];	
						?>
						
						<td width="20%"></td>
						<td width="40%"><div id="jurid222" style="color:blue"><u>Les statuts sont-ils mis à jour consécutivement aux modifications survenues ?</u></div></td>
						<td width="10%"><?php echo $reponse14;?></td>
						<td width="30%"><?php echo $commentaire14;?></td>

					</tr>
					<tr>
						<?php
						$reponse15=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="D" and RDC_RANG=5 and MISSION_ID='.$mission_id);
						$donnees15=$reponse15->fetch();
						
						$reponse15=$donnees15['RDC_REPONSE'];
						$commentaire15=$donnees15['RDC_COMMENTAIRE'];	
						?>
						
						<td width="20%">  </td>
						<td width="40%"><div id="jurid2222" style="color:blue"><u>Les statuts sont-ils mis en harmonie avec la nouvelle loi sur les sociétés commerciales ?</u></div></td>
						<td width="10%"><?php echo $reponse15;?></td>
						<td width="30%"><?php echo $commentaire15;?></td>

					</tr>
					<tr>
						<?php
						$reponse16=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="E" and RDC_RANG=1 and MISSION_ID='.$mission_id);
						$donnees16=$reponse16->fetch();
						
						$reponse16=$donnees16['RDC_REPONSE'];
						$commentaire16=$donnees16['RDC_COMMENTAIRE'];	
						?>
						
						<td width="20%"  bgcolor="#ccc">E- INFORMATION ET PRESENTATION</td>
						<td width="40%"><div id="info1" style="color:blue"><u>Toutes les informations devant être portées dans les annexes sont-elles bien recensées ?</u></div></td>
						<td width="10%"><?php echo $reponse16;?></td>
						<td width="30%"><?php echo $commentaire16;?></td>

					</tr>
				</table>
			</div>
		</div>
		
	<!--retour	-->
		
		<input type="button" value="Retour" id="retour" class="bouton"/>
		<input type="button" value="synthèse" id="synthese_feuille" class="bouton">
		
