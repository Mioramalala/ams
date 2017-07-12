<?php

	@session_start();
	$mission_id=@$_SESSION['idMission'];
	include '../../../connexion.php';
	//include '../../../test_acces.php';

	$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="G" and MISSION_ID='.$mission_id.' and RDC_RANG=5');
	$donnees2=$reponse2->fetch();

	$commentaire2=$donnees2['RDC_COMMENTAIRE'];
	$qcm2=$donnees2['RDC_REPONSE'];
?>

<html>
<head>
<link rel="stylesheet" href="../RDC/charge_fournisseur/css_charge_frns.css">
</head>
<script>
	$(function(){
		$('#bt_precedent').click(function(){
			$("#contenue").load("RDC/charge_fournisseur/G_juridique/juridique2_part2.php");
		});
		$('#bt_retour_1').click(function(){
			$("#contenue").load("RDC/charge_fournisseur/G_juridique/juridique2.php");
		});
		$('#revue').click(function(){
			$('#contenue_rdc').show();
			$('#bt_retour_1').hide();
			$('#revue,#feuilT').fadeOut();
			$('#contenue_question').show();
			// $('#contenue_travail').load("RDC/charge_fournisseur/G_juridique/table_F64.php");
		});
		
		$('#bt_suivant').click(function(){
			var reponse2=$('#qcm2').val();
			var commentaire2=$('#comment2').val();
			if((reponse2=="non" && commentaire2=="") || reponse2==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse2,commentaire2,'charge_fournisseur','G',5,<?php echo $mission_id; ?>);
				$("#contenue").load("RDC/charge_fournisseur/index.php");
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
</script>
<body>
<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
	<tr>
		<td class="grand_Titre"><center><label style="font-weight:bold;">G - JURIDIQUE FISCAL ET DIVERS PARTIE : II</label></center></td>
	</tr>
</table>
<div style="overflow:auto;" >
<table width="100%" height="470">
	<tr>
		<td width="72.5%">
		<div id="contenue_travail" style="overflow:auto;height:450px;width:100%;">
			<label><strong>Travaux à faire :</strong></label>
				<p style="margin-left:15px;margin-top:5px;">Contrôler le traitement fiscal des factures/PJ irrégulières.</p>
			<label><strong>Documents et infos à obtenir</strong></label>
			<ul>
				<li>Calcul du résultat fiscal</li>
			</ul>
		<label><strong>Question :</strong></label><br />
			<p style="margin-left:15px;margin-top:5px;">Vous êtes-vous référé au plafond de déductibilité à l'IR de 2,5% pour les PJ non conformes ?</p>		
		<label><strong id="feuilT">Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;font-weight:bold;"> Questionnaires</label>	
		</div>
		</td>
		<td width="27.5%">
		<input type="button" id="bt_retour_1" value="Retour" class="bouton" style="display:block;top:-210px;float:right;position:relative;"/>
		<div id="contenue_question" style="overflow:auto;height:450px;">
			<input type="button" id="bt_suivant" value=">I" class="bouton" style="float:right;" />
			<input type="button" id="bt_precedent" value="<" class="bouton" style="float:right;" />			
			<div id="contenue_rdc"
			<?php 
				if(@$_GET["juridique_visible"]!='OK')
				print 'style="display:none;"'
			?> >
				<label><strong>Question :</strong></label><br />
				<label>Vous êtes-vous référé au plafond de déductibilité à l'IR de 2,5% pour les PJ non conformes ?</label>
				<select id="qcm2" onchange="choixqcm2()">
					<option value=""></option>
					<option value="oui" <?php if($qcm2=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm2=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm2=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment2" cols="35" rows="10"><?php echo $commentaire2;?></textarea><br />
			</div>
		</div>
		</td>
	</tr>
</table>
</div>
</body>
</html>
i