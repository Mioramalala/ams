<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
// include '../../../test_acces.php';

$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=3');

$donnees=$reponse1->fetch();

$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];

?>

<html>
<head>


<link rel="stylesheet" href="../RDC/charge_fournisseur/css_charge_frns.css">

<script>
	// Droit cycle by Tolotra
    // Page : RDC ->  F-Charges Fournisseurs
    // Tâche :  Revue comptes Charges Fournisseurs, 37
    $.ajax(
        {
            type: 'POST',
            url: 'droitCycle.php',
            data: {task_id: 6},
            success: function (e) {
                var result = 0 === Number(e);
                $("#qcm1").attr('disabled', result);

                $("#comment1").attr('disabled', result);
            }
        }
    );
	$(function(){
		$('#bt_retour').click(function(){
			$('#sms_retour').show();
		});
		$('#revue').click(function(){
			$('#bt_retour_1').hide();
			$('#contenue_question').show();
			$('#contenue_rdc').show();
			$('#contenue_travail').load("RDC/charge_fournisseur/A_coherence/table_F3.php");
		});
		
		$('#bt_suivant').click(function(){
			var reponse1=$('#qcm1').val();
			var commentaire1=$('#comment1').val();
			if((reponse1=="non" && commentaire1=="") || reponse1==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse1,commentaire1,'charge_fournisseur','A',3,<?php echo $mission_id; ?>);
				enregistreTableF3();
				$('#contenue').load("RDC/charge_fournisseur/A_coherence/coherence3.php");
				}
		});
		
		$('#bt_non').click(function(){
			$("#contenue").load("RDC/charge_fournisseur/index.php");
		});
		
		$('#bt_oui').click(function(){
		
		});
		
		$('#bt_precedent').click(function(){
			$("#contenue").load("RDC/charge_fournisseur/A_coherence/coherence1.php");
		});
	});
	function add_Data(reponse,commentaire,cycle,objectif,rang,mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/charge_fournisseur/A_coherence/add_Data.php',
			data:{reponse:reponse, commentaire:commentaire, cycle:cycle, objectif:objectif, rang:rang, mission_id:mission_id},
			success:function(){
			}
		});	
	}
	function enregistreTableF3(){
		var dataText='';
		for(i=1;i<7;i++){
			for(j=1;j<3;j++){
				var id="#L"+i+"_C"+j;
				dataText=dataText+'*'+$(id).val();
			}
		}
		$.ajax({
			type:'POST',
			url:'RDC/charge_fournisseur/A_coherence/addDataTableF3.php',
			data:{text:dataText, mission_id:<?php echo $mission_id; ?>, reference:'F3'},
			success:function(){
			}
		});
	}
	function choixqcm1(){
		var reponse1=$('#qcm1').val();
		var commentaire1=$('#comment1').val();
		if(reponse1=="non" && commentaire1==""){
			alert('Des commentaires obligatoires ont été omis!!');
		}
	}
</script>
</head>
<body>
<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
	<tr>
		<td class="grand_Titre"><center><label>A- COHERENCES ET PRINCIPES COMPTABLES PARTIE : II</label></center></td>
	</tr>
</table>
<table width="100%" height="400">
	<tr>
		<td width="72.5%">
		<div id="contenue_travail" style="overflow:auto;height:390px;">
			<label><strong>Travaux à faire :</strong>
			<br /><br />Revue analytique et comparaison des comptes de charges et de fournisseurs : identifier et expliquer l'origine de tout écart significatif entre les deux exercices. </label><br /><br /><br /><br />
			<label><strong>Documents et infos à obtenir</strong></label><br /><br />
			<label><strong>.</strong>Balances générales et EF N-1 et N</label><br /><br /><br /><br />
		<label><strong>Question :</strong></label><br /><br />
		<label>A-t-on examiné l'évolution des ratios les plus pertinents (délai moyen de règlement notamment) ?</label><br /><br /><br /><br />		
		<label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">&nbsp;Ratios fournisseurs</label>	
		</div>
		</td>
		<td width="27.5%">
		<!--input type="button" id="bt_retour_1" value="Retour" class="bouton" style="display:block;top:-210px;float:right;position:relative;"/-->
                <div style="position:absolute;top:110px;right:0px;"> 
                    <input type="button" id="bt_precedent" value="<" class="bouton" />
                    <input type="button" id="bt_suivant" value=">" class="bouton" />                    
                </div><br /><br />
                <div id="contenue_question" style="overflow:auto;height:390px;">

			<div id="contenue_rdc" <?php 
					if(@$_GET["coherence_visible"]!='OK')
					print 'style="display:none;"'
				?>  >
				<label><strong>Question :</strong></label><br />
				<label>A-t-on examiné l'évolution des ratios les plus pertinents (délai moyen de règlement notamment) ?</label>
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
