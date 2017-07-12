<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';

$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="DCD" and RDC_OBJECTIF="E" and MISSION_ID='.$mission_id.' and RDC_RANG=1');

$donnees=$reponse1->fetch();

$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];

$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="DCD" and RDC_OBJECTIF="E" and MISSION_ID='.$mission_id.' and RDC_RANG=2');

$donnees2=$reponse2->fetch();

$commentaire2=$donnees2['RDC_COMMENTAIRE'];
$qcm2=$donnees2['RDC_REPONSE'];
?>

<html>
<head>
<link rel="stylesheet" href="../RDC/DCD/css.css">
</head>
<script>
	// Droit cycle by Tolotra
    // Page : RDC -> DÃ©biteurs et CrÃ©diteurs divers
    // Tâche : K-DÃ©biteurs et CrÃ©diteurs divers, 60
    $.ajax(
        {
            type: 'POST',
            url: 'droitCycle.php',
            data: {task_id: 60},
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
			//DCD
			$("#contenue").load("RDC/DCD/index.php");
		});
		
		//Renvoi B6
		$('#revue').click(function(){
			$('#bt_suivant').show();
			$('#contenue_rdc').show();
			$('#rev').fadeOut();
			//E_evaluation
			//$('#contenue_travail').load("RDC/DCD/E_evaluation/table_K3.php");
		});
		
		$('#bt_suivant').click(function(){

			var reponse1=$('#qcm1').val();
			var commentaire1=$('#comment1').val();	

			var reponse2=$('#qcm2').val();
			var commentaire2=$('#comment2').val();	
			
			if((reponse1=="non" && commentaire1=="") || (reponse2=="non" && commentaire2=="") || reponse1=="" || reponse2==""){ 
				alert('Des reponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse1,commentaire1,'DCD','E',1,<?php echo $mission_id; ?>);			
				add_Data(reponse2,commentaire2,'DCD','E',2,<?php echo $mission_id; ?>);	

				$("#contenue").load("RDC/DCD/index.php");
				//$('#contenue').load("RDC/DCD/E_evaluation/coherence2.php");
			}
		});
		
		$('#bt_non').click(function(){
			$("#contenue").load("RDC/DCD/index.php");
		});
		
		$('#bt_oui').click(function(){
		
		});
	});
	function add_Data(reponse,commentaire,cycle,objectif,rang,mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/DCD/E_evaluation/add_Data.php',
			data:{reponse:reponse, commentaire:commentaire, cycle:cycle, objectif:objectif, rang:rang, mission_id:mission_id},
			success:function(){
			}
		});	
	}
	
	function choixqcm1(){
		var reponse1=$('#qcm1').val();
		var commentaire1=$('#comment1').val();
		if(reponse1=="non" && commentaire1==""){
			alert('des commentaires obligatoires ont été omis!!');
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
		<td><center><label class="grand_Titre">F- EVALUATION DES SOLDES PARTIE :I</label></center></td>
	</tr>
</table>
<div style="overflow:auto;" >
<table width="100%" height="470">
	<tr>
		<td width="72.5%">
		<div id="contenue_travail" style="overflow:auto;height:450px;width:100%;">
			<label><strong>Travaux à faire :</strong>
			<br/>Contrôler l'évaluation des provisions et des montants des DCD
			</label><br /><br/><br/>
			<label><strong>Documents et infos à obtenir :</strong></label><br />
			.Tableau de calcul des provisions<br/><br/>
			.Etat des provisions<br/><br/>
			.GL des DCD<br /><br/><br/>
		<label><strong>Question 1 :</strong></label><br />
		<label>Le calcul des provisions est-il cohérent ?</label><br /><br/><br/>		
		<label><strong>Question 2 :</strong></label><br />
		<label>Le classement des reprises sur provisions et des dépenses effectivement supportées est-il cohérent ?</label><br /><br/><br/>
		<p id="rev"><label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">QUESTIONNAIRE</label></p>
		
		</div>
		</td>
		<td width="27.5%">
		<div id="contenue_question" style="overflow:auto;height:450px;" >
			<input type="button" id="bt_suivant" value=">|" class="bouton" style="display:none;float:right;" />
			<input type="button" id="bt_retour" value="retour" class="bouton" style="float:right;" />
			
			
			<div id="contenue_rdc" 
			<?php 
				if(@$_GET["evaluation_visible"]!='OK')
				print 'style="display:none;"'
			?>  >

				<label><strong>Question 1:</strong></label><br />
				<label>Le calcul des provisions est-il cohérent ?</label>
				<select id="qcm1" onchange="choixqcm1()">
					<option value=""></option>
					<option value="oui" <?php if($qcm1=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm1=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm1=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1;?></textarea><br />	

				<label><strong>Question 2:</strong></label><br />
				<label>Le classement des reprises sur provisions et des dépenses effectivement supportées est-il cohérent ?</label>
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
