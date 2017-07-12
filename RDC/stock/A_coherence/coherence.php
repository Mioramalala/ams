<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="stock" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=1');

$donnees=$reponse1->fetch();

$commentaire=$donnees['RDC_COMMENTAIRE'];
$qcm=$donnees['RDC_REPONSE'];

?>

<html>
<head>

</head>
<link rel="stylesheet" href="../RDC/stock/css_stock.css">
<script type="text/javascript" src="../../../js/jquery.js"></script>
<script>
	$(function(){
		$('#bt_retour').click(function(){
		//alert("eto");
		$("#contenue").load("RDC/stock/index.php");
		});
		
		$('#revue').click(function(){
			$('#contenue_rdc').show();
			$('#bt_suivant').show();
			$('#contenue_travail').load("RDC/stock/A_coherence/table_D1.php");
		});
		
		$('#bt_suivant').click(function(){
			var reponse=$('#qcm').val();
			var commentaire=$('#comment').val();
			if((reponse=="non" && commentaire=="") || reponse==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse,commentaire,'stock','A',1,<?php echo $mission_id; ?>);
				enregistrerSynthese();
				$('#contenue').load("RDC/stock/A_coherence/coherence1.php");
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
			url:'RDC/stock/A_coherence/add_Data1.php',
			data:{reponse:reponse, commentaire:commentaire, cycle:cycle, objectif:objectif, rang:rang, mission_id:mission_id},
			success:function(){
			}
		});	
	}
	function enregistrerSynthese(){
		var synthese=$('#syntheseD1').val();
		var conclusion=$('#conclusionD1').val();
		$.ajax({
			type:'POST',
			url:'RDC/stock/A_coherence/addSyntheseRa.php',
			data:{synthese:synthese, mission_id:<?php echo $mission_id;?>, cycle:'stock', objectif:'A', reference:'D1', conclusion:conclusion},
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
<body>
<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
	<tr>
		<td class="grand_Titre"><center>A- COHERENCES ET PRINCIPES COMPTABLES : PARTIE I</center></td>
	</tr>
</table>
<table width="100%" style="border:2px solid #ccc;" height="470">
	<tr>
		<td width="72.5%">
		
		<div id="contenue_travail" style="height:450px;overflow:auto;">
			<label><strong>Travaux à faire :</strong>
			<br/>Identifier et expliquer l'origine de tout écart significatif entre les deux exercices.</label><br/><br/><br/>
			<label><strong>Documents et infos à obtenir</strong></label><br/>
			<label><strong>.</strong>Etats financiers des deux exercices (N-1 et N)</label><br/><br/><br/>
			<label><strong>Question :</strong></label><br/>
			<label>A-t-on effectué une revue analytique par rapport à(aux) l'exercice(s) précédent(s) ?</label><br/><br/><br/>
			<label><strong>Feuille de Travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">&nbsp;Revue analytique et vérification de la variation des stocks</label>		
		</div>
		
		</td>
		<td width="27.5%">
		<div id="contenue_question" style="overflow;height:450px;" >
			<input type="button" id="bt_suivant" value=">" class="bouton" style="float:right;display:none;" />
			<input type="button" id="bt_retour" value="retour" class="bouton" style="float:right;display:block;" />			
			<div id="contenue_rdc"  
					<?php 
						if(@$_GET["coherence_visible"]!='OK')
						print 'style="display:none;"'
					?>>
			
				<label><strong>Question :</strong></label><br />
				<label>A-t-on effectué une revue analytique par rapport à(aux) l'exercice(s) précédent(s) ?</label>
				<select id="qcm" onchange="choixqcm()">
					<option value=""></option>
					<option value="oui" <?php if($qcm=="oui") echo 'selected';?> >Oui</option>
					<option value="N/A" <?php if($qcm=="N/A") echo 'selected';?> >N/A</option>
					<option value="non" <?php if($qcm=="non") echo 'selected';?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment" cols="35" rows="10"><?php echo $commentaire;?></textarea>
				
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
</body>
</html>
