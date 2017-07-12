<?php
@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';
////////////////////question1///////////////
	$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="immofi" and RDC_OBJECTIF="D" and MISSION_ID='.$mission_id.' and RDC_RANG=1');

	$donnees=$reponse1->fetch();

	$commentaire1=$donnees['RDC_COMMENTAIRE'];
	$qcm1=$donnees['RDC_REPONSE'];
////////////////////question2///////////////
	$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="immofi" and RDC_OBJECTIF="D" and MISSION_ID='.$mission_id.' and RDC_RANG=2');

	$donnees2=$reponse2->fetch();

	$commentaire2=$donnees2['RDC_COMMENTAIRE'];
	$qcm2=$donnees2['RDC_REPONSE'];
////////////////////question3///////////////
	$reponse3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="immofi" and RDC_OBJECTIF="D" and MISSION_ID='.$mission_id.' and RDC_RANG=3');

	$donnees3=$reponse3->fetch();

	$commentaire3=$donnees3['RDC_COMMENTAIRE'];
	$qcm3=$donnees3['RDC_REPONSE'];
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
                $("#qcm2").attr('disabled', result);
                $("#qcm3").attr('disabled', result);
                $("#comment1").attr('disabled', result);
                $("#comment2").attr('disabled', result);
                $("#comment3").attr('disabled', result);
            }
        }
    );

	$(function(){
		$('#bt_retour_pc').click(function(){
			$("#contenue").load("RDC/immofi/index.php");
		});
		
		$('#revue').click(function(){
			$('#bt_suivant').show();
			$('#contenue_rdc').show();
			$('#contenue_travail').show();
			$('#contenue_question').show();
			$('#upload').show();
			//$('#contenue_travail').load("RDC/immofi/D_evaluation/table_C1.php");
		});
		
		$('#bt_suivant').click(function(){
			var reponse1=$('#qcm1').val();
			var reponse2=$('#qcm2').val();
			var reponse3=$('#qcm3').val();
			
			var commentaire1=$('#comment1').val();
			var commentaire2=$('#comment2').val();
			var commentaire3=$('#comment3').val();
			if((reponse1=="non" && commentaire1=="") || (reponse2=="non" && commentaire2=="") || (reponse3=="non" && commentaire3=="") || reponse1=="" || reponse2=="" || reponse3==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse1,commentaire1,'immofi','D',1,<?php echo $mission_id; ?>);
				add_Data(reponse2,commentaire2,'immofi','D',2,<?php echo $mission_id; ?>);
				add_Data(reponse3,commentaire3,'immofi','D',3,<?php echo $mission_id; ?>);
				$('#contenue').load("RDC/immofi/D_evaluation/evaluation2.php");
			}
		});
		
		$('#bt_non').click(function(){
			$("#contenue").load("RDC/immofi/index.php");
		});
		
		$('#bt_oui').click(function(){
			alert("ok");
		});
	});
	function add_Data(reponse,commentaire,cycle,objectif,rang,mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/immofi/D_evaluation/add_Data.php',
			data:{reponse:reponse, commentaire:commentaire, cycle:cycle, objectif:objectif, rang:rang, mission_id:mission_id},
			success:function(){
			}
		});	
	}
	function enregistrerSynthese(){
		var synthese=$('#syntheseC1').val();
		$.ajax({
			type:'POST',
			url:'RDC/immofi/A_coherence/addSyntheseRa.php',
			data:{synthese:synthese, mission_id:<?php echo $mission_id;?>, cycle:'immofi', objectif:'D', reference:'C1'},
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
			<td><center><label class="grand_Titre">F - EVALUATION DES SOLDES PARTIE :I</label></center></td>
		</tr>
	</table>
	<div style="overflow:auto;" >
		<table width="100%" height="470">
			<tr>
				<td width="72.5%">
				<div id="contenue_travail" style="height:450px;overflow:auto;width:900px;">
					<label><strong>Travaux à faire :</strong>
					<br/>Examiner l’évaluation des titres de participation et des créances rattachées</label><br /><br /><br/>
					<label><strong>Documents et infos à obtenir</strong></label><br />
					<label><strong>.</strong>PV dé réévaluation des titres de participation</label><br/><br/>
					<label><strong>.</strong>Etat d'évaluation des créances rattachées aux titres de participation</label><br/><br/>
					<label><strong>.</strong>GL enregistrant les dotations aux provisions pour perte de valeur des titres</label><br /><br /><br/>
					
					<label><strong>Question 1 :</strong></label><br />
						<label>Les titres de participation ont-ils été réévalués à la date de clôture ?</label><br/><br/>
								
					<label><strong>Question 2 :</strong></label><br />
						<label>Les dépréciations de valeur sont-elles correctement calculées ?</label><br/><br />
								
					<label><strong>Question 3 :</strong></label><br />
						<label>Les dotations aux provisions pour perte de valeur ont-elles été correctement comptabilisées ?</label><br/><br/><br/>
							
					<label id="label"><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">Questionnaires</label>	
					<div id="upload" style="display:none;">
						<div id="uploadJustification">
							<iframe style="display:none;" name="uploadFrame"></iframe>
							<?php 
								$sql = "SELECT nom,extension FROM tab_pieces_justificatives WHERE mission_id=".$_SESSION['idMission']." AND pour = 'immofi_D1'";
								$rep =$bdd->query($sql);
								
								if($donnee = $rep->fetch()) {
							?>
								<a href="<?php echo "pieces_justificatives/pj_immofi_D1_".$_SESSION['idMission'].'.'.$donnee['extension'] ?>" target="_blank"><?php echo $donnee['nom'] ?></a>
							<?php
								}
							?>
							<form enctype="multipart/form-data" action="RDC/envoi_pieces_justificatives.php" method="POST" id="form" target="uploadFrame">
								<input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
								<input type="hidden" name="pour" value="immofi_D1" />
								<input type="hidden" name="mission_id" value="<?php echo $_SESSION['idMission']; ?>" />
								<input type="file" id="fichier" name="fichier"/>
								<input id="submit" type="submit" value="Upload" />
							</form>
						</div>
					</div>
				</div>
				</td>
				<td width="27.5%">
				<div id="contenue_question" style="overflow;height:450px;" >
					<input type="button" id="bt_suivant" value=">" class="bouton" style="display:none;float:right;" />
					<input type="button" id="bt_retour_pc" value="<" class="bouton" style="float:right;" />
					<br /><br />			
					<div id="contenue_rdc" 
					<?php 
						if(@$_GET["evaluation_visible"]!='OK')
						print 'style="display:none;"'
					?> >
						<label><strong>Question 1 :</strong></label><br />
						<label>Les titres de participation ont-ils été réévalués à la date de clôture ? </label>
						<select id="qcm1" onchange="choixqcm1()">
							<option value=""></option>
							<option value="oui" <?php if($qcm1=="oui") echo 'selected'; ?> >Oui</option>
							<option value="na" <?php if($qcm1=="na") echo 'selected'; ?> >N/A</option>
							<option value="non" <?php if($qcm1=="non") echo 'selected'; ?> >Non</option>
						</select><br /><br />
						<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
						<textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1;?></textarea><br />
						
						<label><strong>Question 2 :</strong></label><br />
						<label>Les dépréciations de valeur sont-elles correctement calculées ?</label>
						<select id="qcm2" onchange="choixqcm2()">
							<option value=""></option>
							<option value="oui" <?php if($qcm2=="oui") echo 'selected'; ?> >Oui</option>
							<option value="na" <?php if($qcm2=="na") echo 'selected'; ?> >N/A</option>
							<option value="non" <?php if($qcm2=="non") echo 'selected'; ?> >Non</option>
						</select><br /><br />
						<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
						<textarea id="comment2" cols="35" rows="10"><?php echo $commentaire2;?></textarea><br />
						
						<label><strong>Question 3 :</strong></label><br />
						<label>Les dotations aux provisions pour perte de valeur ont-elles été correctement comptabilisées ?</label>
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
