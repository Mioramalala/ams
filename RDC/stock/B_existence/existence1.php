<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="stock" and RDC_OBJECTIF="B" and MISSION_ID='.$mission_id.' and RDC_RANG=1');

$donnees=$reponse1->fetch();

$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];
?>

<html>
<head>

</head>
<link rel="stylesheet" href="../RDC/stock/css_stock.css">
<body>


<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
	<tr>
		<td class="grand_Titre"><center><label>B - EXISTENCE DES SOLDES : PARTIE I</label></center></td>
	</tr>
</table>
<table width="100%" style="border:2px solid #ccc;" height="460">
	<tr>
		<td width="72.5%">
			
		<div id="contenue_travail" style="overflow:auto;height:460px;">
			<label><strong>Travaux à faire :</strong>
			<br/>Examiner le récolement inventaire physique en fin d'exercice /inventaire permanent (s'il existe).</label><br/><br/><br/>
			<label><strong>Documents et infos à obtenir</strong></label><br/>
			<label><strong>.</strong>Etats d'inventaire physique de stocks en fin d'exercice</label><br/><br/><br/>
			<label><strong>Question :</strong></label><br/>
			<label>Les résultats d'inventaire physique de stocks en fin d'exercice sont-ils cohérents ?</label><br/><br/><br/>
			<p id="rev">
				<label>
					<strong>Renvoi :</strong>
				</label>
				<span id="revue" style="cursor:pointer;color:red;" onclick="revue_click()">
					&nbsp;Questionnaires
				</span>
			</p>
					
		</div>
		
		</td>
		<td width="27.5%">
		<div id="contenue_question" style="overflow;height:450px;">
			<input type="button" id="bt_suivant" value=">" class="bouton" style="float:right;display: none;" />	
			<input type="button" id="bt_retour_1" value="<" class="bouton" style="float: right;"/>			
			<div id="contenue_rdc"
			<?php 
				if(@$_GET["existence_visible"]!='OK')
				print 'style="display:none;"'
			?>
			>
				<label><strong>Question :</strong></label><br />
				<label>Les résultats d'inventaire physique de stocks en fin d'exercice sont-ils cohérents ?</label>
				<select id="qcm" onchange="choixqcm()">
					<option value=""></option>
					<option value="oui" <?php if($qcm1=="oui") echo 'selected';?> >Oui</option>
					<option value="N/A" <?php if($qcm1=="N/A") echo 'selected';?> >N/A</option>
					<option value="non" <?php if($qcm1=="non") echo 'selected';?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment" cols="35" rows="10"><?php echo $commentaire1;?></textarea>
			</div>
		</div>
		</td>
	</tr>
</table>
<div id="sms_retour" style="display:none;">
	<table>
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
<script type="text/javascript">

	console.log("here");
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
                $("#qcm").attr('disabled', result);
                $("#comment").attr('disabled', result);
            }
        }
    );

    

	$(document).ready(function(){
		$('#bt_retour_1').click(function(){
			// alert("ef");
			$("#contenue").load("RDC/stock/index.php");
		});

		$('#bt_retour2').click(function(){
			// alert("ef");
			$("#contenue").load("RDC/stock/index.php");
		});
		
		$('#revue').click(function(){
			$('#bt_suivant').show();
			$('#contenue_rdc').show();
			$('#contenue_question').show();
			$('#rev').hide();
			// $('#contenue_travail').load("RDC/stock/B_existence/table_D13.php");
			
		});
		
		$('#bt_suivant').click(function(){
			var reponse=$('#qcm').val();
			var commentaire=$('#comment').val();
			if((reponse=="non" && commentaire=="") || reponse==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse,commentaire,'stock','B',1,<?php echo $mission_id; ?>);
				// enregistrerSyntheseD13();
				$('#contenue').load("RDC/stock/B_existence/existence2.php");
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
			url:'RDC/stock/B_existence/add_Data.php',
			data:{reponse:reponse, commentaire:commentaire, cycle:cycle, objectif:objectif, rang:rang, mission_id:mission_id},
			success:function(){
			}
		});	
	}
	function enregistrerSyntheseD13(){
		var synthese=$('#syntheseD13').val();
		$.ajax({
			type:'POST',
			url:'RDC/stock/A_coherence/addSyntheseRa.php',
			data:{synthese:synthese, mission_id:<?php echo $mission_id;?>, cycle:'stock', objectif:'A', reference:'D13'},
			success:function(){
			}
		});
	}
	function choixqcm(){
		var reponse=$('#qcm').val();
		var commentaire=$('#comment').val();
		if(reponse=="non" && commentaire==""){
			alert('Des commentaires obligatoires ont été omis!');
		}
	}
</script>
</body>
</html>
