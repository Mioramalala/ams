io<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';
$reponse=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="stock" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=3');

$donnees=$reponse->fetch();

$commentaire=$donnees['RDC_COMMENTAIRE'];
$qcm=$donnees['RDC_REPONSE'];

$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="stock" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=4');

$donnees2=$reponse2->fetch();

$commentaire2=$donnees2['RDC_COMMENTAIRE'];
$qcm2=$donnees2['RDC_REPONSE'];
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
                $("#qcm").attr('disabled', result);
                $("#qcm2").attr('disabled', result);
                $("#comment").attr('disabled', result);
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
			$('#contenue_travail').load("RDC/stock/A_coherence/table_D3.php");
		});
		
		$('#bt_precedent').click(function(){
			$('#contenue').load("RDC/stock/A_coherence/coherence1.php");
		});
		
		$('#bt_suivant').click(function(){
			var reponse=$('#qcm').val();
			var commentaire=$('#comment').val();
			var reponse2=$('#qcm2').val();
			var commentaire2=$('#comment2').val();
			if((reponse=="non" && commentaire=="") || (reponse2=="non" && commentaire2=="") || reponse=="" || reponse2==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse,commentaire,'stock','A',3,<?php echo $mission_id; ?>);
				add_Data(reponse2,commentaire2,'stock','A',4,<?php echo $mission_id; ?>);
				enregistreTableD3();
				$('#contenue').load("RDC/stock/A_coherence/coherence3.php");
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
	function enregistreTableD3(){
		var dataTable3String='';
		for(i=1;i<6;i++){
			for(j=1;j<5;j++){
				var id="#L"+i+"_C"+j+"";
				dataTable3String=dataTable3String+'*'+$(id).val();
			}
		}
		$.ajax({
			type:'POST',
			url:'RDC/stock/A_coherence/addDataTable3.php',
			data:{dataTable3String:dataTable3String, mission_id:<?php echo $mission_id; ?>},
			success:function(){
			}
		});
	}
	function add_Data(reponse,commentaire,cycle,objectif,rang,mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/stock/A_coherence/add_Data1.php',
			data:{reponse:reponse, commentaire:commentaire, cycle:cycle, objectif:objectif, rang:rang, mission_id:mission_id},
			success:function(){
			}
		});	
	}
	function choixqcm(){
		var reponse=$('#qcm').val();
		var commentaire=$('#comment').val();
		if(reponse=="non" && commentaire==""){
			alert('Des commentaires obligatoires ont été omis!');
		}
	}
	
	function choixqcm2(){
		var reponse2=$('#qcm2').val();
		var commentaire2=$('#comment2').val();
		if(reponse2=="non" && commentaire2==""){
			alert('Des commentaires obligatoires ont été omis!');
		}
	}
</script>
<body>
<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
	<tr>
		<td class="grand_Titre"><center><label>A- COHERENCES ET PRINCIPES COMPTABLES : PARTIE I</label></center></td>
	</tr>
</table>
<div id="table_scroll">
<table width="100%" style="border:2px solid #ccc;" height="470px">
	<tr>
		<td width="72%">
		
		<div id="contenue_travail" style="overflow:auto;height:450px;">
			<label><strong>Travaux à faire :</strong>
			<br/>Identifier et expliquer l'origine de tout écart significatif entre les deux exercices.</label><br/><br/><br/>
			<label><strong>Documents et infos à obtenir</strong></label><br/>
			<label><strong>.</strong>Etat récapitulatif des stocks et en-cours (valeurs brutes et provisions) par catégorie et par site sur les deux exercices</label><br/><br/><br/>
			<label><strong>Question 1 :</strong></label><br/>
			<label>Avez-vous examiné l'évolution du taux moyen de provision, globalement, et par catégorie de stocks ?</label><br/><br/><br/>
			<label><strong>Question 2 :</strong></label><br/>
			<label>Avez-vous obtenu des explications nécessaires sur les évolutions les plus significatives ?</label>
			<br/><br/><br/>
			<label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">
			&nbsp;Analyse de l'évolution du taux moyen de provision</label>			
		</div>
		
		</td>
		<td width="28%">
		<input type="button" id="bt_retour" value="Retour" class="bouton" style="display:block;top:-210px;float:right;position:relative;"/>		
		<div id="contenue_question" style="overflow:auto;height:450px;">
			<input type="button" id="bt_precedent" value="<" class="bouton" />
			<input type="button" id="bt_suivant" value=">" class="bouton" /><br />
		<div  id="contenue_rdc"
		<?php 
			if(@$_GET["coherence_visible"]!='OK')
			print 'style="display:none;"'
		?>>
		<label><strong>Question 1 :</strong></label><br />
		<label>Avez-vous examiné l'évolution du taux moyen de provision, globalement, et par catégorie de stocks ?</label>
		<select id="qcm" onchange="choixqcm()">
			<option value=""></option>
			<option value="oui" <?php if($qcm=="oui") echo 'selected';?> >Oui</option>
			<option value="N/A" <?php if($qcm=="N/A") echo 'selected';?> >N/A</option>
			<option value="non" <?php if($qcm=="non") echo 'selected';?> >Non</option>
		</select><br />
		<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
		<textarea id="comment" cols="35" rows="10"><?php echo $commentaire; ?></textarea>
		<label><strong>Question 2 :</strong></label><br />
		<label>Avez-vous obtenu des explications nécessaires sur les évolutions les plus significatives ?</label>
		<select id="qcm2" onchange="choixqcm2()">
			<option value=""></option>
			<option value="oui" <?php if($qcm2=="oui") echo 'selected';?> >Oui</option>
			<option value="N/A" <?php if($qcm2=="N/A") echo 'selected';?> >N/A</option>
			<option value="non" <?php if($qcm2=="non") echo 'selected';?> >Non</option>
		</select><br />
		<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
		<textarea id="comment2" cols="35" rows="10"><?php echo $commentaire2; ?></textarea>
		</div>
		</div>
		</td>
	</tr>
</table>
</div>
<div id="sms_retour" style="display:none;">
	<table>
		<tr align="center">
			<td height="60">Voulez-vous enregistrer</td>
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
