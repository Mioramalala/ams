<?php
	@session_start();
	$mission_id=@$_SESSION['idMission'];
	include '../../../connexion.php';
	//include '../../../test_acces.php';

	$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="G" and MISSION_ID='.$mission_id.' and RDC_RANG=2');

	$donnees2=$reponse2->fetch();

	$commentaire2=$donnees2['RDC_COMMENTAIRE'];
	$qcm2=$donnees2['RDC_REPONSE'];

	$reponse3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="G" and MISSION_ID='.$mission_id.' and RDC_RANG=3');

	$donnees3=$reponse3->fetch();

	$commentaire3=$donnees3['RDC_COMMENTAIRE'];
	$qcm3=$donnees3['RDC_REPONSE'];

?>

<html>
<head>
<link rel="stylesheet" href="../RDC/charge_fournisseur/css_charge_frns.css">
</head>
<script>
	$(function(){
		$('#bt_retour').click(function(){
			$("#contenue").load("RDC/charge_fournisseur/G_juridique/juridique1_part2.php");
		});
		$('#bt_retour_1').click(function(){
			$("#contenue").load("RDC/charge_fournisseur/G_juridique/juridique1.php");
		});
		$('#revue').click(function(){
			$('#contenue_rdc').show();
			$('#bt_retour_1').hide();
			$('#revue,#feuilT').fadeOut();
			$('#contenue_question').show();
			// $('#contenue_travail').load("RDC/charge_fournisseur/G_juridique/table_F63.php");
		});
		
		$('#bt_suivant').click(function(){
			var reponse2=$('#qcm2').val();
			var commentaire2=$('#comment2').val();
			var reponse3=$('#qcm3').val();
			var commentaire3=$('#comment3').val();			
			
			if((reponse2=="non" && commentaire2=="") || (reponse3=="non" && commentaire3=="") || reponse2=="" || reponse3==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
			
				add_Data(reponse2,commentaire2,'charge_fournisseur','G',2,<?php echo $mission_id; ?>);
				add_Data(reponse3,commentaire3,'charge_fournisseur','G',3,<?php echo $mission_id; ?>);
				$("#contenue").load("RDC/charge_fournisseur/G_juridique/juridique2.php");
			}
		});
	});
	function add_Data(reponse,commentaire,cycle,objectif,rang,mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/charge_fournisseur/G_juridique/add_Data.php',
			data:{reponse:reponse, commentaire:commentaire, cycle:cycle, objectif:objectif, rang:rang, mission_id:mission_id},
			success:function(){
			}
		});	
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
		<td class="grand_Titre"><center><label style="font-weight:bold;">G - JURIDIQUE FISCAL ET DIVERS PARTIE : I</label></center></td>
	</tr>
</table>
<div style="overflow:auto;" >
<table width="100%" height="470">
	<tr>
		<td width="72.5%">
		<div id="contenue_travail" style="overflow:auto;height:450px;width:100%;">
			<label><strong>Travaux à faire :</strong></label>
				<p style="margin-left:15px;margin-top:5px;">Contrôler le traitement fiscal des charges n’ayant pas de lien direct avec l’exploitation.</p>
			<label><strong>Documents et infos à obtenir</strong></label><br />
			<ul>
				<li>Calcul du résultat fiscal</li>
				<li>Contrats sous-tendant certaines catégories d'opérations passées en charges (contrat de bail, autres contrats de location, etc.)</li>
			</ul>
		<label><strong>Questions :</strong></label><br />
		<ul>
			<li>Par pointage aux PJ, avez-vous constaté des opérations n'ayant pas de lien direct avec l'exploitation de la société ?</li>
			<li>Ont-elles été réintégrées lors du calcul du résultat fiscal ?</li>
			<li>Assurez-vous que ces opérations passées en charges sont appuyées par des contrats en bonne et due forme ?</li>
		</ul>
		<label><strong id="feuilT">Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;font-weight:bold;"> Questionnaires</label>	
		</div>
		</td>
		<td width="27.5%">
		<input type="button" id="bt_retour_1" value="Retour" class="bouton" style="display:block;top:-210px;float:right;position:relative;"/>
		<div id="contenue_question" style="overflow:auto;height:450px;">
			<input type="button" id="bt_suivant" value=">" class="bouton" style="float:right;" />
			<input type="button" id="bt_retour" value="Retour" class="bouton" style="float:right;" />			
			<div id="contenue_rdc"
				<?php 
				if(@$_GET["juridique_visible"]!='OK')
				print 'style="display:none;"'
			?>  >
				<label><strong>Question 1 :</strong></label><br />
				<label>Ont-elles été réintégrées lors du calcul du résultat fiscal ?</label>
				<select id="qcm2" onchange="choixqcm2()">
					<option value=""></option>
					<option value="oui" <?php if($qcm2=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm2=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm2=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment2" cols="35" rows="10"><?php echo $commentaire2;?></textarea><br />
				<label><strong>Question 2 :</strong></label><br />
				<label>Assurez-vous que ces opérations passées en charges sont appuyées par des contrats en bonne et due forme ?</label>
				<select id="qcm3" onchange="choixqcm3()">
					<option value=""></option>
					<option value="oui" <?php if($qcm3=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm3=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm3=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment3" cols="35" rows="10"><?php echo $commentaire3;?></textarea><br />
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
</div>
</body>
</html>
