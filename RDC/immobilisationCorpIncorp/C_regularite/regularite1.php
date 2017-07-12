<?php

@session_start();

		/*
		Please don't move this file, it's using relative path #Jimmy
		
		Also, I decided to use __FILE__ to avoid problem with relative path if this file is included by some over file
		
		I'll define the project path if you want to move, the best solution is to direcly execute the request, not using two steps
		*/
	$project_path = dirname(__FILE__)."/../../../"; #using $project_path
	
	/*
	end #Jimmy
	*/
 /*
 if some day need the sql back-up to active, just use the following variable
 */
 $backup_sql="";
 
 /*
 Agent de alertant l'utilisateur qu'il à été deconnécté
 */
 
include "$project_path/agent_connex_detection.php";
include "$project_path/connexion.php";

//include '../../../test_acces.php';
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="C" and MISSION_ID='.$mission_id.' and RDC_RANG=1');
$donnees=$reponse1->fetch();
$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];

$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="C" and MISSION_ID='.$mission_id.' and RDC_RANG=2');
$donnees2=$reponse2->fetch();
$commentaire2=$donnees2['RDC_COMMENTAIRE'];
$qcm2=$donnees2['RDC_REPONSE'];

$reponse3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="C" and MISSION_ID='.$mission_id.' and RDC_RANG=3');
$donnees3=$reponse3->fetch();
$commentaire3=$donnees3['RDC_COMMENTAIRE'];
$qcm3=$donnees3['RDC_REPONSE'];

?>

<html>
<head>
<link rel="stylesheet" href="../RDC/immobilisationCorpIncorp/css.css">
</head>
<script>

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

	$(function(){
		$('#bt_retour').click(function(){
			//immobilisationCorpIncorp
			$("#contenue").load("RDC/immobilisationCorpIncorp/index.php");
		});	
		$('#bt_retour2').click(function(){
			//immobilisationCorpIncorp
			$("#contenue").load("RDC/immobilisationCorpIncorp/C_regularite/regularite1.php");
		});
		
		//Renvoi B6
		$('#revue1').click(function(){
			$('#bt_suivant').show();
			$('#bt_retour2').show();
			$('#bt_retour').hide();
			$('#contenue_rdc').show();
			$('#contenue_travail').load("RDC/immobilisationCorpIncorp/C_regularite/table_B6.php?objectif=C1");
		});
		//Renvoi B5.3
		// $('#revue2').click(function(){
			// $('#bt_suivant').show();
			// $('#bt_retour2').show();
			// $('#bt_retour').hide();
			// $('#contenue_rdc').show();
			// $('#contenue_travail').load("RDC/immobilisationCorpIncorp/C_regularite/table_B53.php");
		// });
		
		$('#bt_suivant').click(function(){
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
				add_Data(reponse1,commentaire1,'immobilisation corporelle et incorporelle','C',1,<?php echo $mission_id; ?>);
				add_Data(reponse2,commentaire2,'immobilisation corporelle et incorporelle','C',2,<?php echo $mission_id; ?>);
				add_Data(reponse3,commentaire3,'immobilisation corporelle et incorporelle','C',3,<?php echo $mission_id; ?>);
				//C_regularite
				$('#contenue').load("RDC/immobilisationCorpIncorp/C_regularite/regularite2.php");
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
		<td><center><label class="grand_Titre">C- REGULARITE DES ENREGISTREMENTS PARTIE :I</label></center></td>
	</tr>
</table>
<div style="overflow:auto;" >
<div style="float:right; height:30px;">
	<input type="button" id="bt_suivant" value=">" class="bouton" style="display:none;float:right;" />
	<input type="button" id="bt_retour" value="retour" class="bouton" style="float:right;" />	
	<input type="button" id="bt_retour2" value="<" class="bouton" style="float:right;display:none;" />	
</div>
<table width="100%" height="470">
	<tr>
		<td width="72.5%">
		<div id="contenue_travail" style="overflow:auto;height:450px;width:100%;">
			<label><strong>Travaux à faire :</strong>
			<br/>Reconstituer et justifier les acquisitions</label><br /><br/><br/>
			<label><strong>Documents et infos à obtenir</strong></label><br />
			.GL des immobilisations<br /><br/>
			.Détail de la détermination du coût d'acquisition<br/><br/>
			.Factures et pièces justificatives des acquisitions<br/><br/><br/>
		<label><strong>Question 1 :</strong></label><br />
		<label>Toutes les acquisitions ont-elles été comptabilisées dans les bons comptes ?</label><br /><br/><br/>		
		<label><strong>Question 2 :</strong></label><br />
		<label>Tous les éléments incorporables aux coûts d'acquisition ont-ils été comptabilisés parmi les immobilisations ?</label><br /><br/><br/>
		<label><strong>Question 3 :</strong></label><br />
		<label>Toutes les acquisitions sont-elles appuyées par des factures régulières ? </label><br /><br/><br/>
		
		
		<label><strong>Feuilles de travail :</strong></label>
		<!--Renvoi B6-->
		<label id="revue1" style="cursor:pointer;color:red;">.Vérification de l'exhaustivité/Régularité des enregistrements</label><br/>
		</div>
		</td>
		<td width="27.5%">
		<div id="contenue_question" style="overflow:auto;height:450px;" >
			
			<div id="contenue_rdc"
				<?php 
					if(@$_GET["regularite_visible"]!='OK')
					print 'style="display:none;"'
				?>  >
				<label><strong>Question 1 :</strong></label><br />
				<label>Toutes les acquisitions ont-elles été comptabilisées dans les bons comptes ?</label>
				<select id="qcm1" onchange="choixqcm1()">
					<option value=""></option>
					<option value="oui" <?php if($qcm1=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm1=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm1=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1;?></textarea><br />
				
				<label><strong>Question 2 :</strong></label><br />
				<label>Tous les éléments incorporables aux coûts d'acquisition ont-ils été comptabilisés parmi les immobilisations ?</label>
				<select id="qcm2" onchange="choixqcm2()">
					<option value=""></option>
					<option value="oui" <?php if($qcm2=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm2=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm2=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment2" cols="35" rows="10"><?php echo $commentaire2;?></textarea>
				
				<label><strong>Question 3 :</strong></label><br />
				<label>Toutes les acquisitions sont-elles appuyées par des factures régulières ?</label>
				<select id="qcm3" onchange="choixqcm3()">
					<option value=""></option>
					<option value="oui" <?php if($qcm3=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm3=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm3="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment3" cols="35" rows="10"><?php echo $commentaire3;?></textarea>
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
