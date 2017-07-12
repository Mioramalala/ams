<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="immofi" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=1');

$donnees=$reponse1->fetch();

$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];

$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="immofi" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=2');

$donnees2=$reponse2->fetch();

$commentaire2=$donnees2['RDC_COMMENTAIRE'];
$qcm2=$donnees2['RDC_REPONSE'];

?>

<html>
<head>

</head>
<link rel="stylesheet" href="../RDC/immofi/css.css">
<script>

	// Droit cycle by Tolotra
    // Page : RDC -> Immobilisations financière
    // Tâche : B-Immobilisations incorporelles et corporelles, 15
    $.ajax(
        {
            type: 'POST',
            url: 'droitCycle.php',
            data: {task_id: 14},
            success: function (e) {
                var result = 0 === Number(e);
                $("#qcm1").attr('disabled', result);
                $("#qcm2").attr('disabled', result);
                $("#qcm3").attr('disabled', result);
                $("#qcm4").attr('disabled', result);
                $("#comment1").attr('disabled', result);
                $("#comment2").attr('disabled', result);
            }
        }
    );

	$(function(){
		$('#bt_retour').click(function(){
			$("#contenue").load("RDC/immofi/A_coherence/coherence1.php");
		});
		$('#bt_retour1').click(function(){
			$("#contenue").load("RDC/immofi/index.php");
		});
		
		
		$('#revue').click(function(){
			$('#bt_retour1').hide();
			$('#bt_suiv_retour').show();
			$('#contenue_rdc').show();
			$('#contenue_travail').load("RDC/immofi/A_coherence/table_C1.php");
			$('#contenue_question').show();
		});
		
		$('#bt_suivant').click(function(){
			$('#progressbarRDC').show();
			var reponse1=$('#qcm1').val();
			var commentaire1=$('#comment1').val();
			var reponse2=$('#qcm2').val();
			var commentaire2=$('#comment2').val();
			if((reponse1=="non" && commentaire1=="") || (reponse2=="non" && commentaire2=="") || reponse1=="" || reponse2==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse1,commentaire1,'immofi','A',1,<?php echo $mission_id; ?>);
				add_Data(reponse2,commentaire2,'immofi','A',2,<?php echo $mission_id; ?>);
				enregistrerTableC1();
				$('#contenue').load("RDC/immofi/A_coherence/coherence2.php");
			}
		});
		
		$('#bt_non').click(function(){
			$("#contenue").load("RDC/immofi/index.php");
		});
		
		$('#bt_oui').click(function(){
			alert("ok");
		});
	});
	function add_Data(reponse,commentaire,cycle,objectif,rang,mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/immofi/A_coherence/add_Data.php',
			data:{reponse:reponse, commentaire:commentaire, cycle:cycle, objectif:objectif, rang:rang, mission_id:mission_id},
			success:function(){
			}
		});	
	}
	function enregistrerSynthese(){
		var synthese=$('#syntheseC1').val();
		$.ajax({
			type:'POST',
			url:'RDC/immofi/A_coherence/addSyntheseRa.php',
			data:{synthese:synthese, mission_id:<?php echo $mission_id;?>, cycle:'immofi', objectif:'A', reference:'C1'},
			success:function(){
			}
		});
	}
	function enregistrerTableC1(){
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
				url:'RDC/immofi/A_coherence/ajout_stockage_C1.php',
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
			<td><center><label class="grand_Titre">A- COHERENCES ET PRINCIPES COMPTABLES PARTIE :I</label></center></td>
		</tr>
	</table>
	<div style="overflow:auto;" >
		<table width="100%" height="470">
			<tr>
				<td width="72.5%">
				<div id="contenue_travail" style="height:450px;width:900px;">
					<label><strong>Travaux à faire :</strong>
					<br/>Revue analytique et comparaison des comptes d'immobilisations financières : identifier et expliquer l'origine de tout écart significatif entre les deux exercices.</label><br /><br /><br/>
					
					<label><strong>Documents et infos à obtenir</strong></label><br />
						<label>Balances générales et EF N-1 et N</label><br/><br/><br/>
						
					<label><strong>Question 1 :</strong></label><br />
						<label>A-t-on effectué une revue analytique des immobilisations financières par rapport à l'exercice précédent ?</label><br/><br /><br/>
						
					<label><strong>Question 2 :</strong></label><br />
						<label>Les écarts significatifs sont-ils tous justifiés et expliqués ?</label><br /><br /><br/>
						
					<label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">Revue analytique et vérification de la variation des immobilisations financières</label>	
				</div>
				</td>
				<div id="bt_suiv_retour" style="display:none;">
					<input type="button" id="bt_suivant" value=">" class="bouton" style="float:right;" />
					<input type="button" id="bt_retour" value="<" class="bouton" style="float:right;" />		
				</div>
			<td width="27.5%">
			<input type="button" id="bt_retour1" value="<" class="bouton" style="float:right;position:absolute;top:110;left:1160px;display:block;" />
			<div id="contenue_question" style="overflow:auto;height:450px;">
				<div id="contenue_rdc"
				<?php 
					if(@$_GET["coherence_visible"]!='OK')
					print 'style="display:none;"'
				?> 
				>
					<label><strong>Question 1 :</strong></label><br />
							<label>A-t-on effectué une revue analytique des immobilisations financières par rapport à l'exercice précédent ?</label>
							<select id="qcm1" onchange="choixqcm1()">
								<option value=""></option>
								<option value="oui" <?php if($qcm1=="oui") echo 'selected'; ?> >Oui</option>
								<option value="na" <?php if($qcm1=="na") echo 'selected'; ?> >N/A</option>
								<option value="non" <?php if($qcm1=="non") echo 'selected'; ?> >Non</option>
							</select><br /><br />
							<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
							<textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1;?></textarea><br /><br />
							
								<label><strong>Question 2 :</strong></label><br />
							<label>Les écarts significatifs sont-ils tous justifiés et expliqués ?</label>
							<select id="qcm2" onchange="choixqcm2()">
								<option value=""></option>
								<option value="oui" <?php if($qcm2=="oui") echo 'selected'; ?> >Oui</option>
								<option value="na" <?php if($qcm2=="na") echo 'selected'; ?> >N/A</option>
								<option value="non" <?php if($qcm2=="non") echo 'selected'; ?> >Non</option>
							</select><br /><br />
							<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
							<textarea id="comment2" cols="35" rows="10"><?php echo $commentaire2;?></textarea>
				</div>
			</div>
			</td>
		</tr>
		</table>
			<div id="boite_retour" style="display:none;top:-18px">
				<table border="1">
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
		<div id="progressbarRDC" style="width:300px;height:60px;position:absolute;top:250px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
			<center><img src="../img/progressbar.gif" /><br />Veuillez patienter s'il vous plaît</center>
		</div>
</body>
</html>
