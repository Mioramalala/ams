<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="stock" and RDC_OBJECTIF="D" and MISSION_ID='.$mission_id.' and RDC_RANG=1');

$donnees=$reponse1->fetch();

$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];
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
                $("#comment1").attr('disabled', result);
                $("#comments").attr('disabled', result);
            }
        }
    );

	$(function(){
		$('#bt_retour').click(function(){
			$("#contenue").load("RDC/stock/index.php");
		});
		$('#bt_retour_1').click(function(){
			$("#contenue").load("RDC/stock/index.php");
		});
		
		$('#revue').click(function(){
			$('#contenue_rdc').show();
			$('#contenue_question').show();
			$('#bt_retour_1').hide();
			$('#rev').hide();
			// $('#contenue_travail').load("RDC/stock/D_rattachement/table_D53.php");
		});
		
		$('#bt_suivant').click(function(){
			 var commentaire1=$('#comments').val();
			 var reponse1=$('#qcm1').val();
			if((reponse1=="non" && commentaire1=="") || reponse1==""){ 
				alert('Des réponses commentaires obligatoires ont été omises!');
			} 
			else{
				 add_Data(reponse1,commentaire1,'stock','E',1,<?php echo $mission_id; ?>);
				 $('#contenue').load("RDC/stock/index.php");
			}
		});
		
		$('#bt_non').click(function(){
			$("#contenue").load("RDC/stock/index.php");
		});
		
		$('#bt_oui').click(function(){
		
		});
	});
	function add_Data(reponse,commentaire,cycle,objectif,rang,mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/stock/E_juridique/add_Data.php',
			data:{reponse:reponse, commentaire:commentaire, cycle:cycle, objectif:objectif, rang:rang, mission_id:mission_id},
			success:function(){
			}
		});	
	}
	function choixqcm1(){
		var reponse1=$('#qcm1').val();
		var commentaire1=$('#comment1').val();
		if(reponse1=="non" && commentaire1==""){
			alert('Des commentaires obligatoires ont été omis!');
		}
	}
</script>
<body>
<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
	<tr>
		<td class="grand_Titre"><center><label>H - JURIDIQUE FISCAL ET DIVERS</label></center></td>
	</tr>
</table>
<table width="100%" style="border:2px solid #ccc;" height="470">
	<tr>
		<td width="72.5%">
			<div id="contenue_travail" style="overflow:auto;height:450px;">
				<label><strong>Travaux à faire :</strong>
				<br/>Examiner la conformité avec les principes comptables et fiscaux des règles d'évaluation des stocks.</label><br /><br/><br/>
				<!--label><strong>.</strong>Fiches de stocks : derniers mouvements de clôture (N) et premiers mouvements d'ouverture (N+1)</label><br /-->
			<?php
				$rep0=$bdd->query('select COMMENTAIRE from tab_d6 where MISSION_ID='.$mission_id);
				$donnees0=$rep0->fetch();
			?>
			<label><strong>Commentaires :</strong></label><br />
			<!--label>Vous êtes-vous assuré de l'absence d'opération ne se rattachant pas au bon exercice ?</label><br /-->
			<textarea rows="20" cols="40" id="comments"><?php echo $donnees0['COMMENTAIRE'];?></textarea>	<br/>
			</div>
		</td>
		<td width="27.5%">
		
		<div id="contenue_question" style="overflow;height:450px;">
			<input type="button" id="bt_suivant" value=">|" class="bouton" style="display:block;float:right;position:relative;"/>
			<input type="button" id="bt_retour" value="retour" class="bouton" style="display:block;float:right;position:relative;"/>
			<div id="contenue_rdc"
			<?php 
				if(@$_GET["juridique_visible"]!='OK')
				print 'style="display:none;"'
			?>  
			>
				<label><strong>Question :</strong></label><br />
				<label>Vous êtes-vous assuré de l'absence d'opération ne se rattachant pas au bon exercice ?</label>
				<select id="qcm1" onchange="choixqcm1()">
					<option value=""></option>
					<option value="oui" <?php if($qcm1=="oui") echo 'selected';?> >Oui</option>
					<option value="N/A" <?php if($qcm1=="N/A") echo 'selected';?> >N/A</option>
					<option value="non" <?php if($qcm1=="non") echo 'selected';?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1;?></textarea>
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
