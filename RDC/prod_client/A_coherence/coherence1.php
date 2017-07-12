<?php
@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="prod_client" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=1');

$donnees=$reponse1->fetch();

$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];

$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="prod_client" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=2');

$donnees2=$reponse2->fetch();

$commentaire2=$donnees2['RDC_COMMENTAIRE'];
$qcm2=$donnees2['RDC_REPONSE'];

?>

<html>
<head>

</head>
<link rel="stylesheet" href="../RDC/prod_client/css.css">
<script>

	// Droit cycle by Tolotra
    // Page : RDC -> Produits clients
    // Tâche : Produits clients, 42
    $.ajax(
        {
            type: 'POST',
            url: 'droitCycle.php',
            data: {task_id: 42},
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
		$('#bt_retour_pc').click(function(){
			$("#contenue").load("RDC/prod_client/A_coherence/coherence1.php");
		});
		$('#bt_retour1').click(function(){
				$("#contenue").load("RDC/prod_client/index.php");
		});
		
		
		$('#revue').click(function(){
			$('#bt_retour1').hide();
			$('#bt_suiv_retour').show();
			$('#bt_suivant').show();
			$('#contenue_rdc').show();
			$('#contenue_travail').load("RDC/prod_client/A_coherence/table_G1.php");
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
				add_Data(reponse1,commentaire1,'prod_client','A',1,<?php echo $mission_id; ?>);
				add_Data(reponse2,commentaire2,'prod_client','A',2,<?php echo $mission_id; ?>);
				enregistrerTableG1();
				$('#contenue').load("RDC/prod_client/A_coherence/coherence2.php");
			}
		});
		
		$('#bt_non').click(function(){
			$("#contenue").load("RDC/prod_client/index.php");
		});
		
		$('#bt_oui').click(function(){
			alert("ok");
		});
	});
	function add_Data(reponse,commentaire,cycle,objectif,rang,mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/prod_client/A_coherence/add_Data.php',
			data:{reponse:reponse, commentaire:commentaire, cycle:cycle, objectif:objectif, rang:rang, mission_id:mission_id},
			success:function(){
			}
		});	
	}
	function enregistrerSynthese(){
		var synthese=$('#syntheseG1').val();
		$.ajax({
			type:'POST',
			url:'RDC/prod_client/A_coherence/addSyntheseRa.php',
			data:{synthese:synthese, mission_id:<?php echo $mission_id;?>, cycle:'prod_client', objectif:'A', reference:'G1'},
			success:function(){
			}
		});
	}
	function enregistrerTableG1(){
		var compte=$('#makacompte').val();
		for(i=0;i<compte;i++){
			var id_compte=$('#id_compte_'+i).val();
			var id_libelle=$('#id_libelle_'+i).val();
			var id_d=$('#id_d_'+i).val();
			var id_c=$('#id_c_'+i).val();
			var id_sd_n=$('#id_sd_n_'+i).val();
			var id_sc_n=$('#id_sc_n_'+i).val();
			var id_sd_n1=$('#id_sd_n1_'+i).val();
			var id_sc_n1=$('#id_sc_n1_'+i).val();
			var id_sd_variation=$('#id_sd_variation_'+i).val();
			var id_sc_variation=$('#id_sc_variation_'+i).val();
			var id_prct_d=$('#id_prct_d_'+i).val();
			var id_prct_c=$('#id_prct_c_'+i).val();
			var id_commentaire=$('#id_commentaire_'+i).val();
			
			$.ajax({
				type:'POST',
				url:'RDC/prod_client/A_coherence/ajout_stockage_G1.php',
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
			<td class="grand_Titre"><center>A- COHERENCES ET PRINCIPES COMPTABLES PARTIE :I</center></td>
		</tr>
	</table>
		<table width="100%" height="470">
		<tr>
			<td width="72.5%">
			
			<div id="contenue_travail" style="height:450px;width:900px;">
				<label><strong>Travaux à faire :</strong>
				<br/>Identifier et expliquer l'origine de tout écart significatif entre les deux exercices.</label><br/><br/><br/>
						
						<label><strong>Documents et infos à obtenir</strong></label><br />
							<label><strong>.</strong>Balance générale des deux exrcices (N et N-1)</label><br/><br/>
							<label><strong>.</strong>Tableau de variation des provisions</label><br/><br/><br/>
							
						<label><strong>Question 1 :</strong></label><br />
							<label>A - t - on effectué une revue analytique des ventes et des clients par rapport à l'exercice précédent ?</label><br/><br/><br/>
							
						<label><strong>Question 2 :</strong></label><br />
							<label>Les écarts significatifs sont - ils tous justifiés et expliqués ?</label><br/><br/><br/>

						<label><strong>Renvoi :</strong></label><label id="revue" style="cursor:pointer;color:red;">&nbsp;Revue analytique et vérification de la variation des produits-clients</label>		
			</div>
			</td>
				<div id="bt_suiv_retour" style="display:none;">
					<input type="button" id="bt_suivant" value=">" class="bouton" style="float:right;" />
					<input type="button" id="bt_retour_pc" value="<" class="bouton" style="float:right;" />					
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
							<label>A - t - on effectué une revue analytique des ventes et des clients par rapport à l'exercice précédent ?</label>
							<select id="qcm1" onchange="choixqcm1()">
								<option value=""></option>
								<option value="oui" <?php if($qcm1=="oui") echo 'selected'; ?> >Oui</option>
								<option value="na" <?php if($qcm1=="na") echo 'selected'; ?> >N/A</option>
								<option value="non" <?php if($qcm1=="non") echo 'selected'; ?> >Non</option>
							</select><br /><br />
							<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
							<textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1;?></textarea><br /><br />
							
								<label><strong>Question 2 :</strong></label><br />
							<label>Les écarts significatifs sont - ils tous justifiés et expliqués ?</label>
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
