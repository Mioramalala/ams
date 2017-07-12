<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=15');
$donnees=$reponse1->fetch();
$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];

$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=16');
$donnees2=$reponse2->fetch();
$commentaire2=$donnees2['RDC_COMMENTAIRE'];
$qcm2=$donnees2['RDC_REPONSE'];

$reponse3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=17');
$donnees3=$reponse3->fetch();
$commentaire3=$donnees3['RDC_COMMENTAIRE'];
$qcm3=$donnees3['RDC_REPONSE'];

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
			// $('#sms_retour').show();
			$("#contenue").load("RDC/immobilisationCorpIncorp/A_coherence/coherence6.php");
		});
		$('#bt_retour2').click(function(){
			// $('#sms_retour').show();
			$("#contenue").load("RDC/immobilisationCorpIncorp/A_coherence/coherence7.php");
		});
		//Renvoi B5.3
		$('#revue').click(function(){
			$('#bt_suivant').show();
			$('#bt_retour2').show();
			$('#bt_retour').hide();
			$('#contenue_rdc').show();
			// $('#contenue_question').show();
			$('#frais_accessoir').show();
			// $('#contenue_travail').load("RDC/immobilisationCorpIncorp/A_coherence/table_B53.php");
		});
		
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
				add_Data(reponse1,commentaire1,'immobilisation corporelle et incorporelle','A',15,<?php echo $mission_id; ?>);
				add_Data(reponse2,commentaire2,'immobilisation corporelle et incorporelle','A',16,<?php echo $mission_id; ?>);
				add_Data(reponse3,commentaire3,'immobilisation corporelle et incorporelle','A',17,<?php echo $mission_id; ?>);

				$('#contenue').load("RDC/immobilisationCorpIncorp/A_coherence/coherence8.php");
			}
		});
		
		$('#bt_non').click(function(){
			$("#contenue").load("RDC/immobilisationCorpIncorp/index.php");
		});
		
		$('#bt_oui').click(function(){
		
		});
		
		$('#bt_precedent').click(function(){
			$("#contenue").load("RDC/immobilisationCorpIncorp/A_coherence/coherence6.php");
		});
		////////////////////////////frais accessoire///////////////////////////////
		$("#btnFraiAcc").click(function(){
			var rubrique=$("#txtaccessoire").val();
			// alert(rubrique);
			if(rubrique!=''){
			$.ajax({
				type:"post",
				url:"RDC/immobilisationCorpIncorp/A_coherence/postFraisAcc.php",
				data:{a:rubrique},
				success:function(e){
					// alert(e);
					$("#txtaccessoire").val("");
					$("#listFraiAcc").load("RDC/immobilisationCorpIncorp/A_coherence/listFraiAcc.php");
				}
			
			});
		}
		});
		$("#suivant").click(function(){
			$('#contenue_question').show();
			$('#frais_accessoir').hide();
			$('#contenue_travail').load("RDC/immobilisationCorpIncorp/A_coherence/table_B53.php");
		
		});
		
	});
	function add_Data(reponse,commentaire,cycle,objectif,rang,mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/immobilisationCorpIncorp/A_coherence/add_Data.php',
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
		<td><center><label class="grand_Titre">A- COHERENCES ET PRINCIPES COMPTABLES PARTIE :VII</label></center></td>
	</tr>
</table>
<div style="overflow:auto;" >
<div style="float:right; height:30px;">
	<input type="button" id="bt_suivant" value=">" class="bouton" style="display:none;float:right;" />
	<input type="button" id="bt_retour" value="<" class="bouton" style="float:right;" />	
	<input type="button" id="bt_retour2" value="<" class="bouton" style="float:right;display:none;" />	
</div>
<table width="100%" height="470">
	<tr>
		<td>
		<div id="contenue_travail" style="overflow:auto;height:450px; width:1000px; ">
			<label><strong>Travaux à faire :</strong>
			<br/>Principes de comptabilisation</label><br /><br/><br/>
			<label><strong>Documents et infos à obtenir</strong></label><br />
			.Détermination du coût d'acquisition<br/><br/><br/>
			
		<label><strong>Questions :</strong></label><br />
		<label>Le coût d'acquisition des immobilisations importées est-il constitué par les éléments suivants :</label><br /><br/><br/>
			
		<label><strong>Question 1 :</strong></label><br />
		<label>-Prix d'achat résultant de l'accord des parties à la date de la transaction ?</label><br /><br/><br/>
		
		<label><strong>Question 2 :</strong></label><br />
		<label>-Droits de douanes et autres taxes fiscales non récupérables ?</label><br /><br/><br/>
		
		<label><strong>Question 3 :</strong></label><br />
		<label>-Frais accessoires : frais de livraison et de manutention initiaux,</br> honoraires de professionnels tels qu'architecte et ingénieurs?</label><br /><br/><br/>
		
		<!--Renvoi B5.3-->
		<label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">Détermination du coût d'acquisition/production</label>	
		</div>
		</td>
		<td width="27.5%">
		
		<!------------------------ frais accessoir ------------------------------><center>
		<div id="frais_accessoir"style="overflow:auto;display:none; background-color:#fff; border:1px solid #ccc;" >
			<label class="grand_Titre" style="color:#fff;">Entrer les frais accessoires</label>
			<table>
				<tr>
					<td>Rubrique :</td>
					<td><input type="text" id="txtaccessoire" placeholder="Entrer le frais accessoire"></td>
				</tr>
				<tr>
					<td colspan="2"> <input type="button" value="Enregistrer" id="btnFraiAcc"/></td>
				</tr>
			</table>
			<div id="listFraiAcc" style="border-top:2px solid #ccc;">
				<label><b>liste des frais accessoires</b></label>
				<p class="grand_Titre" style="color:#fff">Rubrique</p>
			<div style="overflow:auto;margin-top:-10px;">
				<table style="border-collapse:collapse; width:100%;">
					<?php 
						$reponse=$bdd->query("select nom_frais_acc from tab_Frais_Accessoire where id_mission=".$mission_id);
				while($donnees=$reponse->fetch()){
				$rubrique=$donnees['nom_frais_acc'];

					?>
					<tr>
						<td style="height:15px; background-color:#F0FFF0;border:1px solid #778899;"><center><?php echo $rubrique ;?></center></td>
					</tr>
					<?php 
					}
					?>
				</table>
			</div>
			</div>
			<input type="button" value="Suivant" id="suivant"/>
		</div>
		


