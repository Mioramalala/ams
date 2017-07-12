<?php

@session_start();
$mission_id=$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';

$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="DCD" and RDC_OBJECTIF="G" and MISSION_ID='.$mission_id.' and RDC_RANG=1');

$donnees=$reponse1->fetch();

$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];

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
                $("#comment1").attr('disabled', result);
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
			//G_information
			$('#contenue_travail').load("RDC/DCD/G_information/table_K4.php");
		});
		
		$('#bt_suivant').click(function(){
			// delete_table(<?php echo $mission_id; ?>);

			var reponse1=$('#qcm1').val();
			var commentaire1=$('#comment1').val();	
			if((reponse1=="non" && commentaire1=="") || reponse1==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{

				add_Data(reponse1,commentaire1,'DCD','G',1,<?php echo $mission_id; ?>);			

				var lignes = parseInt(document.getElementById('nbLignes').value);

				for(var i=1; i <(lignes+1); i++){
					var nature = document.getElementById('nature_'+i).value;
					var annexe = document.getElementById('annexe_'+i).value;	
					var ligne = i;

					if(nature!='' || annexe!=''){
						add_Input(nature, annexe, ligne, <?php echo $mission_id; ?>);
					}
				}

				$("#contenue").load("RDC/DCD/index.php");
				//$('#contenue').load("RDC/DCD/G_information/coherence2.php");
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
			url:'RDC/DCD/G_information/add_Data.php',
			data:{reponse:reponse, commentaire:commentaire, cycle:cycle, objectif:objectif, rang:rang, mission_id:mission_id},
			success:function(){
			}
		});	
	}
		function add_Input(nature, note , ligne, mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/DCD/G_information/add_Input_K4.php',
			data:{nature:nature, note:note, ligne:ligne, mission_id:mission_id},
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
		<td><center><label class="grand_Titre">I -  INFORMATION ET PRESENTATION PARTIE :I</label></center></td>
	</tr>
</table>
<div style="overflow:auto;" >
<table width="100%" height="470">
	<tr>
		<td width="72.5%">
		<div id="contenue_travail" style="overflow:auto;height:450px;width:100%;">
			<label><strong>Travaux à faire :</strong>
			<br/>Informations données en annexe : charges constatées d’avance, état des dettes, charges à payer, produits constatés d’avances, …</label><br /><br/><br/>
			<label><strong>Documents et infos à obtenir :</strong></label><br />
			Annexes des états financiers.<br/><br/><br/>			
		<label><strong>Question  :</strong></label><br />
		<label>Confirmez-vous que tous les détails des états financiers ainsi que toutes les informations devant figurer dans les annexes aux états financiers y sont présentées?</label><br /><br/><br/>
		<label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">ELEMENTS EN ANNEXE</label>
		
		</div>
		</td>
		<td width="27.5%">
		<div id="contenue_question" style="overflow:auto;height:450px;" >
			<input type="button" id="bt_suivant" value=">|" class="bouton" style="display:none;float:right;" />
			<input type="button" id="bt_retour" value="retour" class="bouton" style="float:right;" />
			
			
			<div id="contenue_rdc" 
			<?php 
				if(@$_GET["information_visible"]!='OK')
				print 'style="display:none;"'
			?>  >

				<label><strong>Question :</strong></label><br />
				<label>Confirmez-vous que tous les détails des états financiers ainsi que toutes les informations devant figurer dans les annexes aux états financiers y sont présentées?</label>
				<select id="qcm1">
					<option value=""></option onchange="choixqcm1()">
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
