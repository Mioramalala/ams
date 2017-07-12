<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="stock" and RDC_OBJECTIF="C" and MISSION_ID='.$mission_id.' and RDC_RANG=4');

$donnees=$reponse1->fetch();

$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];

$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="stock" and RDC_OBJECTIF="C" and MISSION_ID='.$mission_id.' and RDC_RANG=5');

$donnees2=$reponse2->fetch();

$commentaire2=$donnees2['RDC_COMMENTAIRE'];
$qcm2=$donnees2['RDC_REPONSE'];
?>

<html>
<head>

</head>
<link rel="stylesheet" href="../RDC/stock/css_stock.css">
<script>

	// Droit cycle by Tolotra
    // Page : RDC -> Stocks
    // Tâche : Stocks, 20
    $.ajax(
        {
            type: 'POST',
            url: 'droitCycle.php',
            data: {task_id: 20},
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
		$('#bt_precedent').click(function(){
			$('#contenue').load("RDC/stock/C_evaluation/evaluation2.php");
		});
		$('#bt_retour_1').click(function(){
			$("#contenue").load("RDC/stock/index.php");
		});
		
		$('#revue').click(function(){
			$('#contenue_rdc').show();
			$('#contenue_question').show();
			$('#bt_retour_1').hide();
			$('#rev').hide();
			// $('#contenue_travail').load("RDC/stock/C_evaluation/table_D45.php");
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
				add_Data(reponse1,commentaire1,'stock','C',4,<?php echo $mission_id; ?>);
				add_Data(reponse2,commentaire2,'stock','C',5,<?php echo $mission_id; ?>);
				$('#contenue').load("RDC/stock/C_evaluation/evaluation4.php");
			}
		});
		
		$('#bt_non').click(function(){
			$("#contenue").load("RDC/stock/index.php");
		});
		
		$('#bt_oui').click(function(){
		
		});
	});
	function add_Data(reponse,commentaire,cycle,objectif,rang,mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/stock/C_evaluation/add_Data.php',
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
		<td class="grand_Titre"><center><label>F - EVALUATION DES SOLDES : PARTIE  III</label></center></td>
	</tr>
</table>
<table width="100%" style="border:2px solid #ccc;" height="470">
	<tr>
		<td width="72.5%">
		<div id="contenue_travail" style="overflow:auto;height:450px;">
			<label><strong>Travaux à faire :</strong>
			<br/>Contrôler l’application et la permanence de la méthode de valorisation <br/>et de dépréciation des stocks et travaux en cours.</label><br/><br/><br/>
			<label><strong>Documents et infos à obtenir</strong></label><br/>
			<label><strong></strong>Etats valorisés des stocks en N et N-1</label><br/><br/><br/>
			<label><strong>Question 1 :</strong></label><br/>
			<label>Les articles rentrés en stocks sont-ils valorisés conformement aux méthodes utilisées par la société ?</label><br/><br/><br/>
			<label><strong>Question 2 :</strong></label><br/>
			<label>Ces articles font-ils l'objet d'un calcul de dépreciation à la clôture conformement <br />aux méthodes utilisés par la société ?</label><br/><br/><br/>
			<p id="rev"><label><strong>Feuille de Travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">&nbsp;
			Questionnaires</label></p>	
		</div>
		</td>
		<td width="27.5%">
		<input type="button" id="bt_retour_1" value="Retour" class="bouton" style="display:block;top:-210px;float:right;position:relative;"/>
		<div id="contenue_question" style="overflow:auto;height:450px;">
			
		<div>
			<input type="button" id="bt_precedent" value="<" class="bouton"/>
			<input type="button" id="bt_suivant" value=">" class="bouton"/>			
		</div>
			<div id="contenue_rdc" 
			<?php 
				if(@$_GET["evaluation_visible"]!='OK')
				print 'style="display:none;"'
			?> >
				<label><strong>Question 1 :</strong></label><br />
				<label>Les articles rentrés en stocks sont-ils valorisés conformement aux méthodes utilisées par la société ?</label>
				<select id="qcm1" onchange="choixqcm1()">
					<option value=""></option>
					<option value="oui" <?php if($qcm1=="oui") echo 'selected';?> >Oui</option>
					<option value="N/A" <?php if($qcm1=="N/A") echo 'selected';?> >N/A</option>
					<option value="non" <?php if($qcm1=="non") echo 'selected';?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1;?></textarea>
				<label><strong>Question 2 :</strong></label><br />
				<label>Ces articles font-ils l'objet d'un calcul de dépreciation à la clôture conformement aux méthodes utilisés par la société ?</label>
				<select id="qcm2" onchange="choixqcm2()">
					<option value=""></option>
					<option value="oui" <?php if($qcm2=="oui") echo 'selected';?> >Oui</option>
					<option value="N/A" <?php if($qcm2=="N/A") echo 'selected';?> >N/A</option>
					<option value="non" <?php if($qcm2=="non") echo 'selected';?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment2" cols="35" rows="10"><?php echo $commentaire2;?></textarea>
			</div>
		</div>
		</td>
	</tr>
</table>
</body>
</html>
