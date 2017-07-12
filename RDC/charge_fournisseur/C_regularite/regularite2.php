<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';

$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="C" and MISSION_ID='.$mission_id.' and RDC_RANG=5');

$donnees=$reponse1->fetch();

$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];

?>

<html>
<head>
<link rel="stylesheet" href="../RDC/charge_fournisseur/css_charge_frns.css">
</head>
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
		$('#bt_precedent').click(function(){
			$('#contenue').load("RDC/charge_fournisseur/C_regularite/regularite1.php");
		});
		$('#bt_retour_1').click(function(){
			$("#contenue").load("RDC/charge_fournisseur/index.php");
		});
		$('#revue').click(function(){
			$('#bt_retour_1').hide();
			$('#bt_suiv_retour').show();
			$('#contenue_question').show();
			$('#contenue_rdc').show();
			//$('#contenue_travail').load("RDC/charge_fournisseur/C_regularite/table_F7.php");
		});
		
		$('#bt_suivant').click(function(){
			var reponse1=$('#qcm1').val();
			var commentaire1=$('#comment1').val();
			if((reponse1=="non" && commentaire1=="") || reponse1==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse1,commentaire1,'charge_fournisseur','C',5,<?php echo $mission_id; ?>);
				$('#contenue').load("RDC/charge_fournisseur/C_regularite/regularite3.php");
			}
		});
		
		$('#bt_non').click(function(){
			$("#contenue").load("RDC/charge_fournisseur/index.php");
		});
		
		$('#bt_oui').click(function(){
		});
	});
	function add_Data(reponse,commentaire,cycle,objectif,rang,mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/charge_fournisseur/C_regularite/add_Data.php',
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
		<td class="grand_Titre"><center><label>C - REGULARITE DES ENREGISTREMENTS</label></center></td>
	</tr>
</table>
<div style="overflow:auto;" >
<table width="100%" height="470">
	<tr>
		<td width="72.5%">
		<div id="contenue_travail" style="overflow:auto;height:450px;width:100%;">
			<label><strong>Travaux à faire :</strong>
			<br /><br />Contrôler la régularité des enregistrements.</label><br /><br /><br /><br />
			<label><strong>Documents et infos à obtenir</strong></label><br /><br />
			<label><strong>.</strong>Grand livre auxiliaire des comptes de fournisseurs</label><br /><br /><br /><br />
		<label><strong>Question 1 :</strong></label><br /><br />
		<label>Les opérations sélectionnées/testées ont-elles été enregistrées dans les bons comptes de charges ?</label><br /><br /><br /><br />	
		<label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">
		&nbsp;Questionnaires</label>	
		</div>
		</td>
		<div id="bt_suiv_retour" style="display:none;">
			<input type="button" id="bt_suivant" value=">" class="bouton" style="float:right;width:150px;" />
			<input type="button" id="bt_precedent" value="<" class="bouton" style="float:right;width:150px;" />			
		</div>
		<td width="27.5%">
		<input type="button" id="bt_retour_1" value="Retour" class="bouton" style="display:block;top:-210px;float:right;position:relative;"/>
		<div id="contenue_question" style="overflow:auto;height:450px;">
			
			<div id="contenue_rdc"
			<?php 
				if(@$_GET["regularite_visible"]!='OK')
				print 'style="display:none;"'
			?>  
			>
				<label><strong>Question 1 :</strong></label><br />
				<label>Confirmez-vous que tous les fournisseurs à solde débiteur sont validés ?</label>
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
</div>
</body>
</html>
