<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';
////////////////////question1///////////////
	$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="prod_client" and RDC_OBJECTIF="G" and MISSION_ID='.$mission_id.' and RDC_RANG=3');

	$donnees=$reponse1->fetch();

	$commentaire1=$donnees['RDC_COMMENTAIRE'];
	$qcm1=$donnees['RDC_REPONSE'];
////////////////////question2///////////////
	$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="prod_client" and RDC_OBJECTIF="G" and MISSION_ID='.$mission_id.' and RDC_RANG=4');

	$donnees2=$reponse2->fetch();

	$commentaire2=$donnees2['RDC_COMMENTAIRE'];
	$qcm2=$donnees2['RDC_REPONSE'];
////////////////////question3///////////////
	$reponse3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="prod_client" and RDC_OBJECTIF="G" and MISSION_ID='.$mission_id.' and RDC_RANG=5');

	$donnees3=$reponse3->fetch();

	$commentaire3=$donnees3['RDC_COMMENTAIRE'];
	$qcm3=$donnees3['RDC_REPONSE'];
?>

<html>
<head>

</head>
<link rel="stylesheet" href="../RDC/prod_client/css.css">
<script>

	// Droit cycle by Tolotra
    // Page : RDC -> Impots et taxes
    // Tâche : Impots et taxes, 50
    $.ajax(
        {
            type: 'POST',
            url: 'droitCycle.php',
            data: {task_id: 50},
            success: function (e) {
                var result = 0 === Number(e);
                $("#qcm1").attr('disabled', result);
                $("#qcm2").attr('disabled', result);
                $("#qcm3").attr('disabled', result);
                $("#comment1").attr('disabled', result);
                $("#comment2").attr('disabled', result);
                $("#comment3").attr('disabled', result);
            }
        }
    );

	$(function(){
		$('#bt_retour1').click(function(){
				$("#contenue").load("RDC/prod_client/G_juridique/juridique1.php");
		});
		
		$('#revue').click(function(){
			$('#bt_retour1').hide();
			$('#bt_suivant').show();
			$('#bt_suiv_retour').show();
			$('#contenue_rdc').show();
			$('#contenue_question').show();
			$('#contenue_travail').load("RDC/prod_client/G_juridique/table_G8.php");
		});
		
		$('#bt_suivant').click(function(){
			$('#progressbarRDC').show();
			var reponse1=$('#qcm1').val();
			var commentaire1=$('#comment1').val();
			
			var reponse2=$('#qcm2').val();
			var commentaire2=$('#comment2').val();
			
			var reponse3=$('#qcm3').val();
			var commentaire3=$('#comment3').val();
			if((reponse1=="non" && commentaire1=="") || (reponse2=="non" && commentaire2=="") || (reponse3=="non" && commentaire3=="") || reponse1=="" || reponse2=="" || reponse3==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse1,commentaire1,'prod_client','G',3,<?php echo $mission_id; ?>);
				add_Data(reponse2,commentaire2,'prod_client','G',4,<?php echo $mission_id; ?>);
				add_Data(reponse3,commentaire3,'prod_client','G',5,<?php echo $mission_id; ?>);
				saveTableData(table_g8);
				$('#contenue').load("RDC/prod_client/G_juridique/juridique3.php");
			}
		});
		
		$('#bt_non').click(function(){
			$("#contenue").load("RDC/prod_client/index.php");
		});
		
		$('#bt_oui').click(function(){
		
		});
		
		$('#bt_precedent').click(function(){
			$("#contenue").load("RDC/prod_client/G_juridique/juridique1.php");
		});
	});
	function add_Data(reponse,commentaire,cycle,objectif,rang,mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/prod_client/G_juridique/add_Data.php',
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
	
	function choixqcm2(){
		var reponse2=$('#qcm2').val();
		var commentaire2=$('#comment2').val();
		if(reponse2=="non" && commentaire2==""){
			alert('Des commentaires obligatoires ont été omis!');
		}
	}
	function choixqcm3(){
		var reponse3=$('#qcm3').val();
		var commentaire3=$('#comment3').val();
		if(reponse3=="non" && commentaire3==""){
			alert('Des commentaires obligatoires ont été omis!');
		}
	}
</script>
<body>
<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
	<tr>
		<td><center><label class="grand_Titre">G - JURIDIQUE FISCAL ET DIVERS PARTIE :II</label></center></td>
	</tr>
</table>
<table width="100%" height="470">
	<tr>
		<td width="72.5%">
		<div id="contenue_travail" style="height:450px;width:900px;">
			<label><strong>Travaux à faire :</strong>
			<br/>Effectuer / vérifier les travaux de cadrage des CA déclarés à la TVA.</label><br/><br/><br/>
			
			<label><strong>Documents et infos à obtenir</strong></label><br/>
				<label><strong>.</strong>Tabeaux de cadrage du chiffre d'affaires.</label><br/><br/>
				<label><strong>.</strong>Bordereaux de déclaration de TVA de l'exercice.</label><br/><br/><br/>
				
					<label><strong>Question 1 :</strong></label><br/>
						<label>Confirmez-vous l'absence d'écart entre le chiffre d'affaires déclaré et celui comptabilisé? </label><br/><br/><br/>
						
					<label><strong>Question 2 :</strong></label><br/>
						<label>Sinon, l'écart est-il justifié ou régularisé?</label><br/><br/><br/>
						
					<label><strong>Question 3 :</strong></label><br/>
						<label>Les soldes comptables des comptes de TVA (collectées, déductibles, à payer,…) correspondent-ils avec ceux des bordereaux de déclarations du dernier mois de l'exercice?</label><br/><br/><br/>
				
			<label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">Cadrage du chiffre d'affaires</label>	
		</div>
		</td>
		<div id="bt_suiv_retour" style="display:none;">
				<input type="button" id="bt_suivant" value=">" class="bouton" style="float:right;" />
				<input type="button" id="bt_precedent" value="<" class="bouton" style="float:right;" /><br /><br />
		</div>
		<td width="27.5%">
		<input type="button" id="bt_retour1" value="<" class="bouton" style="float:right;position:absolute;top:110;left:1160px;display:block;" />
		<div id="contenue_question" style="overflow:auto;height:450px">
		
			<div id="contenue_rdc"
			<?php 
				if(@$_GET["juridique_visible"]!='OK')
				print 'style="display:none;"'
			?> >
						<label><strong>Question 1 :</strong></label><br />
						<label>Confirmez-vous l'absence d'écart entre le chiffre d'affaires déclaré et celui comptabilisé?</label>
						<select id="qcm1" onchange="choixqcm1()">
							<option value=""></option>
							<option value="oui" <?php if($qcm1=="oui") echo 'selected'; ?> >Oui</option>
							<option value="na" <?php if($qcm1=="na") echo 'selected'; ?> >N/A</option>
							<option value="non" <?php if($qcm1=="non") echo 'selected'; ?> >Non</option>
						</select><br /><br />
						<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
						<textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1;?></textarea><br />
						
						<label><strong>Question 2 :</strong></label><br />
						<label>Sinon, l'écart est-il justifié ou régularisé?</label>
						<select id="qcm2" onchange="choixqcm2()">
							<option value=""></option>
							<option value="oui" <?php if($qcm2=="oui") echo 'selected'; ?> >Oui</option>
							<option value="na" <?php if($qcm2=="na") echo 'selected'; ?> >N/A</option>
							<option value="non" <?php if($qcm2=="non") echo 'selected'; ?> >Non</option>
						</select><br /><br />
						<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
						<textarea id="comment2" cols="35" rows="10"><?php echo $commentaire2;?></textarea><br />
						
						<label><strong>Question 3 :</strong></label><br />
						<label>Les soldes comptables des comptes de TVA (collectées, déductibles, à payer,…) correspondent-ils avec ceux des bordereaux de déclarations du dernier mois de l'exercice</label>
						<select id="qcm3" onchange="choixqcm3()">
							<option value=""></option>
							<option value="oui" <?php if($qcm3=="oui") echo 'selected'; ?> >Oui</option>
							<option value="na" <?php if($qcm3=="na") echo 'selected'; ?> >N/A</option>
							<option value="non" <?php if($qcm3=="non") echo 'selected'; ?> >Non</option>
						</select><br /><br />
						<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
						<textarea id="comment3" cols="35" rows="10"><?php echo $commentaire3;?></textarea><br />
			</div>
		</div>
		</td>
	</tr>
</table>
<div id="boite_retour2" style="display:none;">
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
		<div id="progressbarRDC" style="width:300px;height:60px;position:absolute;top:250px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
			<center><img src="../img/progressbar.gif" /><br />Veuillez patienter s'il vous plaît</center>
		</div>
</body>
</html>
