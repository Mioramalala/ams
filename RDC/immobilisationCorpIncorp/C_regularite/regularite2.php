<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="C" and MISSION_ID='.$mission_id.' and RDC_RANG=4');
$donnees=$reponse1->fetch();
$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];

$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="C" and MISSION_ID='.$mission_id.' and RDC_RANG=5');
$donnees2=$reponse2->fetch();
$commentaire2=$donnees2['RDC_COMMENTAIRE'];
$qcm2=$donnees2['RDC_REPONSE'];

?>

<html>
<head>

</head>
<link rel="stylesheet" href="../RDC/immobilisationCorpIncorp/css.css">
<script>
	$(function(){

		// Droit cycle by Tolotra
	    // Page : RDC -> Immobilisations
	    // Tâche : B-Immobilisations incorporelles et corporelles, 13
	    $.ajax(
	        {
	            type: 'POST',
	            url: 'droitCycle.php',
	            data: {task_id: 13},
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
		
		$('#bt_precedent').click(function(){
			$("#contenue").load("RDC/immobilisationCorpIncorp/C_regularite/regularite1.php");
		});
		$('#bt_retour2').click(function(){
			$("#contenue").load("RDC/immobilisationCorpIncorp/C_regularite/regularite2.php");
		});
		
		//Renvoi B5.4
		$('#revue').click(function(){
			$('#bt_suivant').show();
			$('#bt_retour2').show();
			$('#bt_precedent').hide();
			$('#contenue_rdc').show();
			$('#contenue_question').show();
			$('#contenue_travail').load("RDC/immobilisationCorpIncorp/C_regularite/table_B54.php");
		});
		
		$('#bt_suivant').click(function(){
			var reponse1=$('#qcm1').val();
			var commentaire1=$('#comment1').val();
			
			var reponse2=$('#qcm2').val();
			var commentaire2=$('#comment2').val();
			
			if((reponse1=="non" && commentaire1=="") || (reponse2=="non" && commentaire2=="") || reponse1=="" || reponse2==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse1,commentaire1,'immobilisation corporelle et incorporelle','C',4,<?php echo $mission_id; ?>);
				add_Data(reponse2,commentaire2,'immobilisation corporelle et incorporelle','C',5,<?php echo $mission_id; ?>);
				$('#contenue').load("RDC/immobilisationCorpIncorp/C_regularite/regularite3.php");
			}
		});
		
		$('#bt_non').click(function(){
			$("#contenue").load("RDC/immobilisationCorpIncorp/index.php");
		});
		
		$('#bt_oui').click(function(){
		
		});
		
		
	});
	function add_Data(reponse,commentaire,cycle,objectif,rang,mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/immobilisationCorpIncorp/C_regularite/add_Data.php',
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
</script>
<body>
<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
	<tr>
		<td><center><label class="grand_Titre">C- REGULARITE DES ENREGISTREMENTS PARTIE :II</label></center></td>
	</tr>
</table>
<div style="overflow:auto;" >
<div style="float:right; height:30px;">
	<input type="button" id="bt_suivant" value=">" class="bouton" style="float:right;" />
	<input type="button" id="bt_precedent" value="<" class="bouton" style="float:right;" />
	<input type="button" id="bt_retour2" value="<" class="bouton" style="float:right;display:none;" />	
</div>
<table width="100%" height="470">
	<tr>
		<td width="72.5%">
		<div id="contenue_travail" style="overflow:auto;height:450px; width:70%;">
			<label><strong>Travaux à faire :</strong>
			<br/>Reconstituer et justifier la production immobilisée</label><br /><br/><br/>
			<label><strong>Documents et infos à obtenir</strong></label><br />
			.Etat de suivi des travaux de production/construction<br/><br/>
			.GL des comptes 2xx / 72xx<br/><br/>
			.Factures et pièces justificatives des opérations concernées<br/><br/><br/>

		<label><strong>Question 1:</strong></label><br />
		<label>Les productions en-cours/immobilisées sont-elles correctement comptabilisées ?</label><br /><br/><br/>
		<label><strong>Question 2:</strong></label><br />
		<label>Tous les éléments incorporables aux coûts de production ont-ils été considérés dans les immobilisations ?</label><br /><br/><br/>
		
		<!--Renvoi B5.4-->
		<label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">Principes de comptabilisation 4. Détermination du coût de production des immo en cours</label>
		
		</div>
		</td>
		<td width="27.5%">
		<div id="contenue_question" style="overflow:auto;height:450px;">
			
			<div id="contenue_rdc"
			<?php 
				if(@$_GET["regularite_visible"]!='OK')
				print 'style="display:none;"'
			?>  
			>
				<label><strong>Question 1:</strong></label><br />
				<label>Les productions en-cours/immobilisées sont-elles correctement comptabilisées ?</label>
				<select id="qcm1" onchange="choixqcm1()">
					<option value=""></option>
					<option value="oui" <?php if($qcm1=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm1=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm1=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1;?></textarea><br />
				
				<label><strong>Question 2:</strong></label><br />
				<label>Tous les éléments incorporables aux coûts de production ont-ils été considérés dans les immobilisations ?</label>
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
<div id="sms_retour" style="display:none;">
	<table>
		<tr align="center">
			<td height="60">Voulez-vous enregistrer ?</td>
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
