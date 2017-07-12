<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="stock" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=2');

$donnees=$reponse1->fetch();

$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm=$donnees['RDC_REPONSE'];
?>
<html>
<head>

</head>
<link rel="stylesheet" href="../RDC/stock/css_stock.css">
<script type="text/javascript" src="../../../js/jquery.js"></script>
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
                $("#comment").attr('disabled', result);
            }
        }
    );

	$(function(){
		$('#bt_retour').click(function(){
			$("#contenue").load("RDC/stock/index.php");
		});
		
		$('#revue').click(function(){
			$('#contenue_rdc').show();
			$('#contenue_question').show();	
			$('#bt_retour').hide();
			$('#contenue_travail').load("RDC/stock/A_coherence/table_D2.php");
		});
		
		$('#bt_precedent').click(function(){
			$('#contenue').load("RDC/stock/A_coherence/coherence.php");
		});
		
		$('#bt_suivant').click(function(){
			var reponse=$('#qcm').val();
			var commentaire=$('#comment').val();
			if((reponse=="non" && commentaire=="") || reponse==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse,commentaire,'stock','A',2,<?php echo $mission_id; ?>);
				enregistrerTableD2();
				$('#contenue').load("RDC/stock/A_coherence/coherence2.php");
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
	function enregistrerTableD2(){
		dataTable2String='';
		for(i=1;i<5;i++){
			for(j=1;j<6;j++){
				for(k=1;k<4;k++){
					var id="#T"+i+"_L"+j+"_N"+k+"";
					dataTable2String=dataTable2String+'*'+$(id).val();
				}
			}
		}
		$.ajax({
			type:'POST',
			url:'RDC/stock/A_coherence/addDataTable2.php',
			data:{dataTable2String:dataTable2String, mission_id:<?php echo $mission_id;?>},
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
</script>
<body>
<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
	<tr>
		<td class="grand_Titre"><center><label>A- COHERENCES ET PRINCIPES COMPTABLES : PARTIE I</label></center></td>
	</tr>
</table>
<table width="100%" style="border:2px solid #ccc;" height="470">
	<tr>
		<td width="72.5%">
		
		<div id="contenue_travail" style="overflow:auto;height:450px;">
			<label><strong>Travaux à faire :</strong>
			<br/>Identifier et expliquer l'origine de tout écart significatif entre les deux exercices.</label><br/><br/><br/>
			<label><strong>Documents et infos à obtenir</strong></label><br/>
			<label><strong>.</strong>Balance générale des deux exercices (N-1 et N)</label><br/><br/><br/>
			<label><strong>Question :</strong></label><br/>
			<label>Avez-vous effectué l'examen des ratios permettant de mesurer l'importance des stocks <br />en nombre de jours de production (PF & en-cours) ou nombre de jours </label><br/><br/><br/>
			<label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">
			&nbsp;Examen des principaux ratios</label>			
		</div>
		
		</td>
		<td width="27.5%">
		<input type="button" id="bt_retour" value="Retour" class="bouton" style="display:block;top:-210px;float:right;position:relative;"/>		
		<div id="contenue_question" style="overflow;height:450px;">	
		<div>		
			<input type="button" id="bt_suivant" value=">" class="bouton" style="float:right;" />
			<input type="button" id="bt_precedent" value="<" class="bouton" style="float:right;" />
		</div>	
		<div id="contenue_rdc" 
		<?php 
			if(@$_GET["coherence_visible"]!='OK')
			print 'style="display:none;"'
		?>>
			<label><strong>Question :</strong></label><br />
			<label>Avez-vous effectué l'examen des ratios permettant de mesurer l'importance des stocks en nombre de jours de production (PF & en-cours) ou nombre de jours </label>
			<select id="qcm">
				<option value=""></option>
				<option value="oui" <?php if($qcm=="oui") echo 'selected';?> >Oui</option>
				<option value="N/A" <?php if($qcm=="N/A") echo 'selected';?> >N/A</option>
				<option value="non" <?php if($qcm=="non") echo 'selected';?> >Non</option>
			</select><br />
			<label><strong>Commentaires (obligatoire si réponse négative)<br/></strong>
			* Le ratio représente la durée de stockage moyen des matières premières.
			Plus le ratio est élevé, plus l’entreprise immobilise durablement de l’argent dans ses stocks</label><br />
			<textarea id="comment" cols="35" rows="10"><?php echo $commentaire1;?></textarea>
		</div>
		</div>
		</td>
	</tr>
</table>
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
