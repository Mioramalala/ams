<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="stock" and RDC_OBJECTIF="C" and MISSION_ID='.$mission_id.' and RDC_RANG=10');

$donnees=$reponse1->fetch();

$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];
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
                $("#comment1").attr('disabled', result);
            }
        }
    );

	$(function(){
		$('#bt_precedent').click(function(){
			$('#contenue').load("RDC/stock/C_evaluation/evaluation5.php");
		});
		$('#bt_retour_1').click(function(){
			$("#contenue").load("RDC/stock/index.php");
		});
		
		$('#revue').click(function(){
			$('#contenue_rdc').show();
			$('#contenue_question').show();
			$('#bt_retour_1').hide();
			$('#rev').hide();
			// $('#contenue_travail').load("RDC/stock/C_evaluation/table_D52.php");
		});
		
		$('#bt_suivant').click(function(){
			var reponse1=$('#qcm1').val();
			var commentaire1=$('#comment1').val();
			if((reponse1=="non" && commentaire1=="") || reponse1==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse1,commentaire1,'stock','C',10,<?php echo $mission_id; ?>);
				$("#contenue").load("RDC/stock/index.php");
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
</script>
<body>
<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
	<tr>
		<td class="grand_Titre"><center><label>F - EVALUATION DES SOLDES : PARTIE  VI</label></center></td>
	</tr>
</table>
<table width="100%" style="border:2px solid #ccc;" height="470">
	<tr>
		<td width="72.5%">
		<div id="contenue_travail" style="overflow:auto;height:450px;">
			<label><strong>Travaux à faire :</strong>
			<br/>Contrôler les écritures de dotations et de reprises de provision pour dépréciation.</label><br/><br/><br/>
			<label><strong>Documents et infos à obtenir</strong></label><br/>
			<label><strong></strong>GL des comptes 39 / 68 / 78</label><br/><br/><br/>
			<label><strong>Question :</strong></label><br/>
			<label>A-t-on verifié la régularité des enregistrements des dotations <br/>et de reprises de provision pour dépréciation ?</label><br/><br/><br/>
			<p id="rev"><label><strong>Renvoi :</strong></label><label id="revue" style="cursor:pointer;color:red;">&nbsp;Questionnaires</label></p>		
		</div>
		</td>
		<td width="27.5%">
		<input type="button" id="bt_retour_1" value="Retour" class="bouton" style="display:block;top:-210px;float:right;position:relative;"/>
		<div id="contenue_question" style="overflow;height:450px;">
			<input type="button" id="bt_precedent" value="<" class="bouton"/>		
			<input type="button" id="bt_suivant" value=">I" class="bouton"/>	
			<div id="contenue_rdc" 
			<?php 
				if(@$_GET["evaluation_visible"]!='OK')
				print 'style="display:none;"'
			?> >
				<label><strong>Question :</strong></label><br />
				<label>A-t-on verifié la régularité des enregistrements des dotations et de reprises de provision pour dépréciation ?</label>
				<select id="qcm1" onchange="choixqcm1()">
					<option value=""></option>
					<option value="oui" <?php if($qcm1=="oui") echo 'selected';?> >Oui</option>
					<option value="N/A" <?php if($qcm1=="N/A") echo 'selected';?> >N/A</option>
					<option value="non" <?php if($qcm1=="non") echo 'selected';?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1;?></textarea>
			</div>
		</div>
		</td>
	</tr>
</table>
</body>
</html>
