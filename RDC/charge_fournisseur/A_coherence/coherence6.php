<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';

$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=10');

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
                $("#qcm2").attr('disabled', result);
                $("#comment1").attr('disabled', result);

            }
        }
    );
    
	$(function(){
		$('#bt_retour').click(function(){
			$('#sms_retour').show();
		});
		$('#bt_retour_1').click(function(){
			$("#contenue").load("RDC/charge_fournisseur/index.php");
		});
		$('#revue').click(function(){
			$('#bt_retour_1').hide();
			$('#contenue_rdc').show();
			$('#contenue_question').show();
			$('#contenue_travail').load("RDC/charge_fournisseur/A_coherence/table_F5.php");
		});
		
		$('#bt_suivant').click(function(){
			var reponse1=$('#qcm1').val();
			var commentaire1=$('#comment1').val();
			if((reponse1=="non" && commentaire1=="")  || reponse1=="" ){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse1,commentaire1,'charge_fournisseur','A',10,<?php echo $mission_id; ?>);
				addDataTableF5();
				$('#contenue').load("RDC/charge_fournisseur/A_coherence/coherence7.php");
			}
		});
		
		$('#bt_non').click(function(){
			$("#contenue").load("RDC/charge_fournisseur/index.php");
		});
		
		$('#bt_oui').click(function(){
		
		});
		
		$('#bt_precedent').click(function(){
			$("#contenue").load("RDC/charge_fournisseur/A_coherence/coherence5.php");
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
	function addDataTableF5(){
		var cpt=$('#compteF5').val();
		for(i=0;i<cpt;i++){
			var compteF5=$('#compteF5'+i).val();
			var soldeBalF5=$('#soldeBalF5'+i).val();
			var soldeGLF5=$('#soldeGLF5'+i).val();
			var soldeAuxF5=$('#soldeAuxF5'+i).val();
			var ecartF5=$('#ecartF5'+i).val();
			var observationF5=$('#observationF5'+i).val();
			var ecart2F5=$('#ecart2F5'+i).val();
			var observation2F5=$('#observation2F5'+i).val();
			$.ajax({
				type:'POST',
				url:'RDC/charge_fournisseur/A_coherence/addDataTableF5.php',
				data:{compteF5:compteF5, soldeBalF5:soldeBalF5, soldeGLF5:soldeGLF5, soldeAuxF5:soldeAuxF5, ecartF5:ecartF5, observationF5:observationF5, ecart2F5:ecart2F5, observation2F5:observation2F5, mission_id:<?php echo $mission_id; ?>},
				success:function(){
				}
			});
		}
	}
	function choixqcm1(){
		var reponse1=$('#qcm1').val();
		var commentaire1=$('#comment1').val();
		if(reponse1=="non" && commentaire1==""){
			alert('Des commentaires obligatoires ont été omis!');
		}
	}
</script>
</head>
<body>
<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
	<tr>
		<td class="grand_Titre"><center><label>A- COHERENCES ET PRINCIPES COMPTABLES PARTIE : VI </label></center></td>
	</tr>
</table>
<table width="100%" height="400">
	<tr>
		<td width="72.5%">
		<div id="contenue_travail" style="height:390px;">
			<label><strong>Travaux à faire :</strong>
			<br /><br />S'assurer de la cohérence de tous les états justificatifs des comptes.</label><br /><br /><br /><br />
			<label><strong>Documents et infos à obtenir</strong></label><br /><br />
			<label><strong>.</strong>Balance générale N (comptes 40x et 6x)</label><br /><br /><br />
			<label><strong>.</strong>Grand livre N (comptes 40x et 6x)</label><br /><br /><br />
			<label><strong>.</strong>Balance auxiliaire des comptes fournisseurs</label><br /><br /><br />
			<label><strong>.</strong>Balance âgée des comptes fournisseurs</label><br /><br /><br /><br />
		<label><strong>Question 1 :</strong></label><br /><br />
		<label>Les soldes des grand-livres/balance auxiliaire/balance âgée/balance générale sont-ils conformes entre eux ?</label><br /><br /><br /><br />			
		<label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">
		&nbsp;Rapprochement soldes Grand livre / Balance générale / Balance auxiliaire</label>	
		</div>
		</td>
		<td width="27.5%">
		<input type="button" id="bt_retour_1" value="Retour" class="bouton" style="display:none;top:-210px;float:right;position:relative;"/>
                <div style="position:absolute;top:110px;right:0px;">
                    <input type="button" id="bt_precedent" value="<" class="bouton"/> 
                    <input type="button" id="bt_suivant" value=">" class="bouton" />                                       
                </div><br /><br />
                <div id="contenue_question" style="overflow:auto;height:390px;">
			<div id="contenue_rdc" <?php 
					if(@$_GET["coherence_visible"]!='OK')
					print 'style="display:none;"'
				?>  >
				<label><strong>Question 1 :</strong></label><br />
				<label>Les soldes des grand-livres/balance auxiliaire/balance âgée/balance générale sont-ils conformes entre eux ?</label>
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
</body>
</html>
