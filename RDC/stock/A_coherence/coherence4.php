<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="stock" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=6');

$donnees=$reponse1->fetch();

$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];

$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="stock" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=7');

$donnees2=$reponse2->fetch();

$commentaire2=$donnees2['RDC_COMMENTAIRE'];
$qcm2=$donnees2['RDC_REPONSE'];

$reponse3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="stock" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=8');

$donnees3=$reponse3->fetch();

$commentaire3=$donnees3['RDC_COMMENTAIRE'];
$qcm3=$donnees3['RDC_REPONSE'];
?>
<html>
<head>

</head>
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
                $("#qcm1").attr('disabled', result);
                $("#qcm2").attr('disabled', result);
                $("#qcm3").attr('disabled', result);
                $("#comment").attr('disabled', result);
                $("#comment1").attr('disabled', result);
                $("#comment2").attr('disabled', result);
            }
        }
    );

	$(function(){
		$('#bt_retour').click(function(){
			$('#sms_retour').show();
		});
		
		$('#revue').click(function(){
			$('#contenue_rdc').show();
			$('#contenue_question').show();
			$('#bt_retour').hide();
			// $('#contenue_travail').load("RDC/stock/A_coherence/table_D12.php");
		});
		
		$('#bt_precedent').click(function(){
			$('#contenue').load("RDC/stock/A_coherence/coherence3.php");
		});
		
		$('#bt_suivant').click(function(){
			var reponse=$('#qcm').val();
			var commentaire=$('#comment').val();
			var reponse2=$('#qcm1').val();
			var commentaire2=$('#comment1').val();
			var reponse3=$('#qcm2').val();
			var commentaire3=$('#comment2').val();
			if((reponse=="non" && commentaire=="") || (reponse2=="non" && commentaire2=="") || (reponse3=="non" && commentaire3=="") || reponse=="" || reponse2=="" || reponse3==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse,commentaire,'stock','A',6,<?php echo $mission_id; ?>);
				add_Data(reponse2,commentaire2,'stock','A',7,<?php echo $mission_id; ?>);
				add_Data(reponse3,commentaire3,'stock','A',8,<?php echo $mission_id; ?>);
				enregistrerSyntheseD12();
				$("#contenue").load("RDC/stock/index.php");
			}
		});
		
		$('#bt_oui').click(function(){
			alert("Enregistrement des données");
			$("#contenue").load("RDC/stock/index.php");
		});
		
		$('#bt_non').click(function(){
			$("#contenue").load("RDC/stock/index.php");
		});
	});
	function add_Data(reponse,commentaire,cycle,objectif,rang,mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/stock/A_coherence/add_Data1.php',
			data:{reponse:reponse, commentaire:commentaire, cycle:cycle, objectif:objectif, rang:rang, mission_id:mission_id},
			success:function(){
			}
		});	
	}
	function enregistrerSyntheseD12(){
		var synthese=$('#syntheseD12').val();
		$.ajax({
			type:'POST',
			url:'RDC/stock/A_coherence/addSyntheseRa.php',
			data:{synthese:synthese, mission_id:<?php echo $mission_id;?>, cycle:'stock', objectif:'A', reference:'D12'},
			success:function(){
			}
		});
	}
	
	function choixqcm1(){
		var reponse=$('#qcm').val();
		var commentaire=$('#comment').val();
		if(reponse1=="non" && commentaire1==""){
			alert('Des commentaires obligatoires ont été omis!');
		}
	}
	
	function choixqcm2(){
		var reponse2=$('#qcm1').val();
		var commentaire2=$('#comment1').val();
		if(reponse2=="non" && commentaire2==""){
			alert('Des commentaires obligatoires ont été omis!');
		}
	}
	function choixqcm3(){
		var reponse3=$('#qcm2').val();
		var commentaire3=$('#comment2').val();
		if(reponse3=="non" && commentaire3==""){
			alert('Des commentaires obligatoires ont été omis!');
		}
	}
</script>
<body>
<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
	<tr>
		<td class="grand_Titre"><center><label>A- COHERENCES ET PRINCIPES COMPTABLES : PARTIE III</label></center></td>
	</tr>
</table>
<div id="table_scroll">
<table width="100%" style="border:2px solid #ccc;" height="460">
	<tr>
		<td width="72%">
			
		<div id="contenue_travail" style="overflow:auto;height:460px;">
			<label><strong>Travaux à faire :</strong>
			<br/>Examiner les principes de comptabilisation et de la permanence de méthodes.</label><br/><br/><br/>
			<label><strong>Documents et infos à obtenir</strong></label><br/>
			<label><strong>.</strong>&nbsp;Journal / GL des stocks</label><br/><br/>
			<label><strong>.</strong>&nbsp;Etats valorisés de N et N-1 (vérification du mode de calcul par sondage)</label><br/><br/><br/>
			<label><strong>Question 1 :</strong></label><br/>
			<label>Tous les éléments traités dans les stocks répondent-ils aux critères fixés par le PCG ?</label><br/><br/><br/>
			<label><strong>Question 2 :</strong></label><br/>
			<label>Les principes comptables appliqués par la société sont-ils cohérents <br />avec le secteur dans lequel elle exerce ?</label><br/><br/><br/>
			<label><strong>Question 3 :</strong></label><br/>
			<label>La méthode de valorisation et de dépréciation appliquée est-elle utilisée <br />de façon permanente (du moins sur les deux derniers exercices) ?</label><br/><br/><br/>
			<label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">
			&nbsp;Questionnaires</label>			
		</div>
		
		</td>
		<td width="28%">
		<input type="button" id="bt_retour" value="Retour" class="bouton" style="display:block;top:-210px;float:right;position:relative;"/>	
		<div id="contenue_question" style="overflow:auto;width:100%;height:460px;">
		<div>
			<input type="button" id="bt_precedent" value="<" class="bouton" />
			<input type="button" id="bt_suivant" value=">I" class="bouton" />
		</div><br/>
			<div  id="contenue_rdc"
			<?php 
				if(@$_GET["coherence_visible"]!='OK')
				print 'style="display:none;"'
			?>
			>
				<label><strong>Question 1 :</strong></label><br />
				<label>Tous les éléments traités dans les stocks répondent-ils aux critères fixés par le PCG ?</label>
				<select id="qcm" onchange="choixqcm1()">
					<option value=""></option>
					<option value="oui" <?php if($qcm1=="oui") echo 'selected';?> >Oui</option>
					<option value="N/A" <?php if($qcm1=="N/A") echo 'selected';?> >N/A</option>
					<option value="non" <?php if($qcm1=="non") echo 'selected';?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment" cols="35" rows="10"><?php echo $commentaire1; ?></textarea>
				<label><strong>Question 2 :</strong></label><br />
				<label>Les principes comptables appliqués par la société sont-ils cohérents avec le secteur dans lequel elle exerce ?</label>
				<select id="qcm1" onchange="choixqcm2()">
					<option value=""></option>
					<option value="oui" <?php if($qcm2=="oui") echo 'selected';?> >Oui</option>
					<option value="N/A" <?php if($qcm2=="N/A") echo 'selected';?> >N/A</option>
					<option value="non" <?php if($qcm2=="non") echo 'selected';?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment1" cols="35" rows="10"><?php echo $commentaire2; ?></textarea>
				<label><strong>Question 3 :</strong></label><br />
				<label>La méthode de valorisation et de dépréciation appliquée est-elle utilisée de façon permanente (du moins sur les deux derniers exercices) ?</label>
				<select id="qcm2" onchange="choixqcm3()">
					<option value=""></option>
					<option value="oui" <?php if($qcm3=="oui") echo 'selected';?> >Oui</option>
					<option value="N/A" <?php if($qcm3=="N/A") echo 'selected';?> >N/A</option>
					<option value="non" <?php if($qcm3=="non") echo 'selected';?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment2" cols="35" rows="10"><?php echo $commentaire3; ?></textarea>
			</div>
		</div>
		</td>
	</tr>
</table>
</div>
<div id="sms_retour" style="display:none;">
	<table>
		<tr align="center">
			<td height="60">Vouler vous enregistrer</td>
		</tr>
		<tr>
			<td>
				<input type="button" id="bt_oui" value="Oui" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="bt_non" value="Non" class="bouton" />
			</td>
		</tr>
	</table>
</div>
</body>
</html>
