<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';

$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=1');

$donnees=$reponse1->fetch();

$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];

$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=2');

$donnees2=$reponse2->fetch();

$commentaire2=$donnees2['RDC_COMMENTAIRE'];
$qcm2=$donnees2['RDC_REPONSE'];

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
                $("#qcm2").attr('disabled', result);
                $("#comment1").attr('disabled', result);
                $("#comment2").attr('disabled', result);

            }
        }
    );
    
	$(function(){
		$('#bt_retour').click(function(){
			$("#contenue").load("RDC/charge_fournisseur/index.php");
		});
		$('#bt_retour_1').click(function(){
			$("#contenue").load("RDC/charge_fournisseur/index.php");
		});
		$('#revue').click(function(){
			$('#bt_retour_1').hide();
			$('#bt_suiv_retour').show();
			$('#contenue_question').show();
			$('#contenue_rdc').show();
			$('#contenue_travail').load("RDC/charge_fournisseur/A_coherence/table_F1.php");
		});
		
		$('#bt_suivant').click(function(){
			var commentaire1=$('#comment1').val();
			var commentaire2=$('#comment2').val();
			var reponse1=$('#qcm1').val();
			var reponse2=$('#qcm2').val();
			if((reponse1=="non" && commentaire1=="") || (reponse2=="non" && commentaire2=="") || reponse1=="" || reponse2==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse1,commentaire1,'charge_fournisseur','A',1,<?php echo $mission_id; ?>);
				add_Data(reponse2,commentaire2,'charge_fournisseur','A',2,<?php echo $mission_id; ?>);
				enregistrerSyntheseF1();
				enregistrerTableF1();
				$('#contenue').load("RDC/charge_fournisseur/A_coherence/coherence2.php");
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
			url:'RDC/charge_fournisseur/A_coherence/add_Data.php',
			data:{reponse:reponse, commentaire:commentaire, cycle:cycle, objectif:objectif, rang:rang, mission_id:mission_id},
			success:function(){
			}
		});	
	}
	function enregistrerSyntheseF1(){
		var synthese=$('#syntheseF1').val();
		var conclusion=$('#conclusionF1').val();
		$.ajax({
			type:'POST',
			url:'RDC/charge_fournisseur/A_coherence/addSyntheseRa.php',
			data:{synthese:synthese, mission_id:<?php echo $mission_id;?>, cycle:'charge_fournisseur', objectif:'A', reference:'F1', conclusion:conclusion},
			success:function(){
			}
		});
	}
	function enregistrerTableF1(){
		var compte=$('#makacompte').val();
		for(i=0;i<compte;i++){
			var id_compte=$('#id_compte'+i).val();
			var id_libelle=$('#id_libelle'+i).val();
			var id_d=$('#id_d'+i).val();
			var id_c=$('#id_c'+i).val();
			var id_sd_n=$('#id_sd_n'+i).val();
			var id_sc_n=$('#id_sc_n'+i).val();
			var id_sd_n1=$('#id_sd_n1'+i).val();
			var id_sc_n1=$('#id_sc_n1'+i).val();
			var id_sd_variation=$('#id_sd_variation'+i).val();
			var id_sc_variation=$('#id_sc_variation'+i).val();
			var id_prct_d=$('#id_prct_d'+i).val();
			var id_prct_c=$('#id_prct_c'+i).val();
			var id_commentaire=$('#id_commentaire'+i).val();
			
			$.ajax({
				type:'POST',
				url:'RDC/charge_fournisseur/A_coherence/ajout_stockage_F1.php',
				data:{id_compte:id_compte, id_libelle:id_libelle, id_d:id_d, id_c:id_c, id_sd_n:id_sd_n, id_sc_n:id_sc_n, 
				id_sd_n1:id_sd_n1, id_sc_n1:id_sc_n1, id_sd_variation:id_sd_variation,id_sc_variation:id_sc_variation,id_prct_d:id_prct_d,
				id_prct_c:id_prct_c ,id_commentaire:id_commentaire,mission_id:<?php echo $mission_id;?>},
				success:function(e){
					//alert(e);
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
		<td class="grand_Titre"><center><label>A- COHERENCES ET PRINCIPES COMPTABLES PARTIE : I</label></center></td>
	</tr>
</table>
<div style="overflow:auto;" >
<table width="100%" height="200">
	<tr>
		
		<td width="72.5%">
		<div id="contenue_travail" style="overflow:auto;height:400px;width:100%;">
			<label><strong>Travaux à faire :</strong>
			<br /><br/>Revue analytique et comparaison des comptes de charges et de fournisseurs : identifier et expliquer l'origine de tout écart significatif entre les deux exercices. </label><br /><br /><br />
			<label><strong>Documents et infos à obtenir</strong></label><br /><br />
			<label><strong>.</strong>Balances générales et EF N-1 et N </label><br /><br /><br /><br />
		<label><strong>Question 1 :</strong></label><br /><br />
		<label>A-t-on effectué une revue analytique des charges par rapport à l'exercice précédent ?</label><br /><br /><br /><br />	
		<label><strong>Question 2 :</strong></label><br /><br />
		<label>Les écarts significatifs sont-ils tous justifiés et expliqués ?</label><br /><br /><br /><br />
		<label><strong>Renvoi:</strong></label><label id="revue" style="cursor:pointer;color:red;">&nbsp;Renvoi: Revue analytique et vérification de la variation des charges-Fournisseurs</label>	
		</div>
		</td>
		<div id="bt_suiv_retour" style="display:none;top:-160px;">
			<label style="font-size:16px;">Revue analytique et vérification de la variation des charges et fournisseurs (F1)</label>
			<input type="button" id="bt_suivant" value=">" class="bouton" style="float:right;width:185px;" />
			<input type="button" id="bt_retour" value="retour" class="bouton" style="float:right;width:185px;" />	
		</div>
		<td width="27.5%">
		<input type="button" id="bt_retour_1" value="Retour" class="bouton" style="display:block;top:-180px;float:right;position:relative;"/>
			<div id="contenue_question" style="overflow:auto;height:450px;">
			<div id="contenue_rdc"
			<?php 
				if(@$_GET["coherence_visible"]!='OK')
				print 'style="display:none;"'
			?>  
			>
				<label><strong>Question 1 :</strong></label><br/>
				<label>A-t-on effectué une revue analytique des charges par rapport à l'exercice précédent ?</label>
				<select id="qcm1" onchange="choixqcm1()">
					<option value=""></option>
					<option value="oui" <?php if($qcm1=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm1=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm1=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1;?></textarea><br />
					<label><strong>Question 2 :</strong></label><br />
				<label>Les écarts significatifs sont-ils tous justifiés et expliqués ?</label>
				<select id="qcm2" onchange="choixqcm2()">
					<option value=""></option>
					<option value="oui" <?php if($qcm2=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm2=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm2=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment2" cols="35" rows="10"><?php echo $commentaire2;?></textarea>
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
