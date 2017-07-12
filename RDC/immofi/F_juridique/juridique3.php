<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';
	$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="immofi" and RDC_OBJECTIF="F" and MISSION_ID='.$mission_id.' and RDC_RANG=4');

	$donnees=$reponse1->fetch();

	$commentaire1=$donnees['RDC_COMMENTAIRE'];
	$qcm1=$donnees['RDC_REPONSE'];

?>

<html>
<head>

</head>
<link rel="stylesheet" href="../RDC/immofi/css.css">
<script>

	// Droit cycle by Tolotra
    // Page : RDC -> Immobilisations financière
    // Tâche : B-Immobilisations incorporelles et corporelles, 15
    $.ajax(
        {
            type: 'POST',
            url: 'droitCycle.php',
            data: {task_id: 15},
            success: function (e) {
                var result = 0 === Number(e);
                $("#qcm1").attr('disabled', result);
                $("#comment1").attr('disabled', result);
            }
        }
    );
	
	$(function(){
		$('#bt_retour1').click(function(){
			$("#contenue").load("RDC/immofi/F_juridique/juridique2.php");

		});
		$('#revue').click(function(){
			$('#bt_retour1').hide();
			$('#bt_precedent').show();
			$('#bt_suivant').show();
			$('#contenue_rdc').show();
			$('#contenue_travail').show();
			$('#contenue_question').show();
			$('#upload').show();
			//$('#contenue_travail').load("RDC/immofi/F_juridique/table_C1.php");
		});
		
		$('#bt_suivant').click(function(){
			var reponse1=$('#qcm1').val();
			var commentaire1=$('#comment1').val();
			if((reponse1=="non" && commentaire1=="") || reponse1==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse1,commentaire1,'immofi','F',4,<?php echo $mission_id; ?>);
				$('#contenue').load("RDC/immofi/index.php");
			}
		});
		
		$('#bt_non').click(function(){
			$("#contenue").load("RDC/immofi/index.php");
		});
		
		$('#bt_oui').click(function(){
			alert("ok");
		});
		$('#bt_precedent').click(function(){
			$("#contenue").load("RDC/immofi/F_juridique/juridique2.php");
		});
	});
	function add_Data(reponse,commentaire,cycle,objectif,rang,mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/immofi/F_juridique/add_Data.php',
			data:{reponse:reponse, commentaire:commentaire, cycle:cycle, objectif:objectif, rang:rang, mission_id:mission_id},
			success:function(){
			}
		});	
	}
	function enregistrerSynthese(){
		var synthese=$('#syntheseC1').val();
		$.ajax({
			type:'POST',
			url:'RDC/immofi/F_juridique/addSyntheseRa.php',
			data:{synthese:synthese, mission_id:<?php echo $mission_id;?>, cycle:'immofi', objectif:'F', reference:'C1'},
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
			<td><center><label class="grand_Titre">H - JURIDIQUE FISCAL ET DIVERS PARTIE :III</label></center></td>
		</tr>
	</table>
	<div style="overflow:auto;" >
		<table width="100%" height="470">
			<tr>
				<td width="72.5%">
				<div id="contenue_travail" style="height:450px;overflow:auto;width:900px;">
					<label><strong>Travaux à faire :</strong>
					<br/>Contrôler le respect des règles relatives à l’interdiction de prêts ou d’avances aux dirigeants .</label><br/><br/><br/>
					
					<label><strong>Documents et infos à obtenir</strong></label><br />
						<label>Convention de prêts ou d'octroi d'avances.</label><br/><br/><br/>
						
					<label><strong>Question :</strong></label><br />
						<label>Assurez-vous qu'aucune augmentation des immobilisations financières ne concerne les prêts ou avances accordés aux dirigeants ?</label><br/><br/><br/>
						
					<label id="label"><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">Questionnaires</label>
					<div id="upload" style="display:none;">
						<div id="uploadJustification">
							<iframe style="display:none;" name="uploadFrame"></iframe>
							<?php 
								$sql = "SELECT nom,extension FROM tab_pieces_justificatives WHERE mission_id=".$_SESSION['idMission']." AND pour = 'immofi_F3'";
								$rep =$bdd->query($sql);
								
								if($donnee = $rep->fetch()) {
							?>
								<a href="<?php echo "pieces_justificatives/pj_immofi_F3_".$_SESSION['idMission'].'.'.$donnee['extension'] ?>" target="_blank"><?php echo $donnee['nom'] ?></a>
							<?php
								}
							?>
							<form enctype="multipart/form-data" action="RDC/envoi_pieces_justificatives.php" method="POST" id="form" target="uploadFrame">
								<input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
								<input type="hidden" name="pour" value="immofi_F3" />
								<input type="hidden" name="mission_id" value="<?php echo $_SESSION['idMission']; ?>" />
								<input type="file" id="fichier" name="fichier"/>
								<input id="submit" type="submit" value="Upload" />
							</form>
						</div>
					</div>
				</div>
				</td>
				<td width="27.5%">
				<input type="button" id="bt_retour1" value="<" class="bouton" style="float:right;position:absolute;top:110;left:1160px;display:block;" />
				<div id="contenue_question" style="overflow;height:450px;" >
					<input type="button" id="bt_suivant" value=">I" class="bouton" style="float:right;display:none" />
					<input type="button" id="bt_precedent" value="<" class="bouton" style="float:right;display:none" /><br /><br />
					<div id="contenue_rdc" 
						<?php 
							if(@$_GET["juridique_visible"]!='OK')
							print 'style="display:none;"'
						?> >
						<label><strong>Question :</strong></label><br />
						<label>Assurez-vous qu'aucune augmentation des immobilisations financières ne concerne les prêts ou avances accordés aux dirigeants ?</label>
						<select id="qcm1" onchange="choixqcm1()">
							<option value=""></option>
							<option value="oui" <?php if($qcm1=="oui") echo 'selected'; ?> >Oui</option>
							<option value="na" <?php if($qcm1=="na") echo 'selected'; ?> >N/A</option>
							<option value="non" <?php if($qcm1=="non") echo 'selected'; ?> >Non</option>
						</select><br /><br />
						<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
						<textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1;?></textarea><br />
					</div>
				</div>
				</td>
			</tr>
		</table>
			<div id="boite_retour" style="display:none;top:-18px">
				<table border="1">
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
