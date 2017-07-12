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
$reponse1=$bdd->query("select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE='immobilisation corporelle et incorporelle' and RDC_OBJECTIF='A' and MISSION_ID='$mission_id' and RDC_RANG='1'");
$donnees=$reponse1->fetch();
$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];

$reponse2=$bdd->query("select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE='immobilisation corporelle et incorporelle' and RDC_OBJECTIF='A' and MISSION_ID='$mission_id' and RDC_RANG='2'");
$donnees2=$reponse2->fetch();
$commentaire2=$donnees2['RDC_COMMENTAIRE'];
$qcm2=$donnees2['RDC_REPONSE'];

?>
<html>
<head>
<meta charset="utf-8"/>
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
                $("#comment1").attr('disabled', result);
                $("#comment2").attr('disabled', result);
            }
        }
    );

	$(function(){
		$('#bt_retour').click(function(){
			//immobilisationCorpIncorp
			$("#contenue").load("RDC/immobilisationCorpIncorp/index.php");
			// $("#contenue").load("RDC/immobilisationCorpIncorp/A_coherence/coherence1.php");	
		});
		$('#bt_retour2').click(function(){
			//immobilisationCorpIncorp
			$("#contenue").load("RDC/immobilisationCorpIncorp/index.php");
			//$("#contenue").load("RDC/immobilisationCorpIncorp/A_coherence/coherence1.php");	
		});
		
		//Renvoi B1
		$('#revue').click(function(){
			$('#bt_suivant').show();
			$('#bt_retour2').show();
			$('#bt_retour').hide();
			$('#contenue_rdc').show();
			$('#contenue_travail').load("RDC/immobilisationCorpIncorp/A_coherence/table_B1.php");
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
				add_Data(reponse1,commentaire1,'immobilisation corporelle et incorporelle','A',1,<?php echo $mission_id; ?>);
				add_Data(reponse2,commentaire2,'immobilisation corporelle et incorporelle','A',2,<?php echo $mission_id; ?>);
				$('#contenue').load("RDC/immobilisationCorpIncorp/A_coherence/coherence2.php");
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
			url:'RDC/immobilisationCorpIncorp/A_coherence/add_Data.php',
			data:{reponse:reponse, commentaire:commentaire, cycle:cycle, objectif:objectif, rang:rang, mission_id:mission_id},
			success:function(e){
				// alert(e);
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
		<td><center><label class="grand_Titre">A- COHERENCES ET PRINCIPES COMPTABLES PARTIE :I</label></center></td>
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
		<td  style=" overflow:auto; width:1000px">
		<div id="contenue_travail" style="overflow:auto;height:450px;width:1000px;">
			<label><strong>Travaux à faire :</strong>
			<br/>Revue analytique et comparaison des comptes d'immobilisations : identifier et expliquer l'origine de tout écart significatif entre les deux exercices</label><br /><br/><br/>
			<label><strong>Documents et infos à obtenir</strong></label><br />
			<label><strong>.</strong>Balances générales et EF N et N-1</label><br /><br/><br/>
			<label><strong>Question 1 :</strong></label><br />
			<label>A-t-on effectué une revue analytique des immobilisations par rapport à l'exercice précédent ?</label><br /><br/><br/>		
			<label><strong>Question 2 :</strong></label><br />
			<label>Les écarts significatifs sont-ils tous justifiés et expliqués ?</label><br /><br/><br/>
			
			<!--RENVOI B1-->
			<label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">Revue analytique</label>
		
		</div>
		</td>
		<td width="27.5%">
		<div id="contenue_question" style="overflow:auto;height:450px;" >
					
			<div id="contenue_rdc" 
				<?php 
					if(@$_GET["coherence_visible"]!='OK')
					print 'style="display:none;"'
				?>  >
				<label><strong>Question 1 :</strong></label><br />
				<label>A-t-on effectué une revue analytique des charges par rapport à l'exercice précédent ?</label>
				<select id="qcm1" onchange="choixqcm1()">
					<option value=""></option>
					<option value="oui" <?php if($qcm1=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm1=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm1=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1;?></textarea><br />
					<label><strong>Question 2 :</strong></label><br />
				<label>Les écarts significatifs sont-ils tous justifiés et expliqués ?</label>
				<select id="qcm2" onchange="choixqcm2()">
					<option value=""></option>
					<option value="oui" <?php if($qcm2=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm2=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm2=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment2" cols="35" rows="10"><?php echo $commentaire2;?></textarea>
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
