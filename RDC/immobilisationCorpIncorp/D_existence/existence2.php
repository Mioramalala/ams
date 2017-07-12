<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="D" and MISSION_ID='.$mission_id.' and RDC_RANG=3');
$donnees=$reponse1->fetch();
$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];

?>

<html>
<head>

</head>
<link rel="stylesheet" href="../RDC/immobilisationCorpIncorp/css.css">
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
                $("#comment1").attr('disabled', result);
            }
        }
    );

	$(function(){
		$('#bt_precedent').click(function(){
			$("#contenue").load("RDC/immobilisationCorpIncorp/D_existence/existence1.php");
		});
		$('#bt_retour2').click(function(){
			$("#contenue").load("RDC/immobilisationCorpIncorp/D_existence/existence2.php");
		});
		
		//Renvoi B7
		$('#revue').click(function(){
			$('#bt_suivant').show();
			$('#bt_retour2').show();
			$('#bt_precedent').hide();
			$('#contenue_rdc').show();
			$('#contenue_question').show();
			$('#contenue_travail').load("RDC/immobilisationCorpIncorp/D_existence/table_B7.php");
		});
		
		$('#bt_suivant').click(function(){
			var reponse1=$('#qcm1').val();
			var commentaire1=$('#comment1').val();
			if((reponse1=="non" && commentaire1=="") || reponse1==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse1,commentaire1,'immobilisation corporelle et incorporelle','D',3,<?php echo $mission_id; ?>);			
				$('#contenue').load("RDC/immobilisationCorpIncorp/D_existence/existence3.php");
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
</script>
<body>
<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
	<tr>
		<td><center><label class="grand_Titre">D-  EXISTENCE DES SOLDES PARTIE :II</label></center></td>
	</tr>
</table>
<div style="overflow:auto;" >
<div style="float:right; height:30px;">
	<input type="button" id="bt_suivant" value=">" class="bouton" style="display:none;float:right;" />
	<input type="button" id="bt_precedent" value="retour" class="bouton" style="float:right;" />	
	<input type="button" id="bt_retour2" value="<" class="bouton" style="float:right; display:none;" />	
</div>
<table width="100%" height="470">
	<tr>
		<td width="72.5%">
		<div id="contenue_travail" style="overflow:auto;height:450px;">
			<label><strong>Travaux à faire :</strong>
			<br/>Contrôler la réalité des valeurs immobilisées</label><br /><br/><br/>
			<label><strong>Documents et infos à obtenir</strong></label><br />
			.Fichier des immobilisations<br/><br/>
			.Titres de propriété, factures, inventaire physique, autres PJ<br/><br/><br/>


			<label><strong>Question :</strong></label><br />
			<label>A-t-on contrôlé la réalité des valeurs immobilisées ?</label><br /><br/><br/>
			
			
			<!--Renvoi B7-->
			<label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">Vérification des titres de propriété</label>
		
		</div>
		</td>
		<td width="27.5%">
		<div id="contenue_question" style="overflow:auto;height:450px;">
			
			<div id="contenue_rdc"
			<?php 
				if(@$_GET["existence_visible"]!='OK')
				print 'style="display:none;"'
			?> >
				<label><strong>Question :</strong></label><br />
				<label>A-t-on contrôlé la réalité des valeurs immobilisées ?</label>
				<select id="qcm1" onchange="choixqcm1()">
					<option value=""></option>
					<option value="oui" <?php if($qcm1=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm1=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm1=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1;?></textarea><br />
				
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
