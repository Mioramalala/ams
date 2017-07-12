<?php

@session_start();

		/*
		Please don't move this file, it's using relative path #Jimmy
		
		Also, I decided to use __FILE__ to avoid problem with relative path if this file is included by some over file
		
		I'll define the project path if you want to move, the best solution is to direcly execute the request, not using two steps
		*/
	$project_path = dirname(__FILE__)."/../../../"; #using $project_path
	
	/*
	end #Jimmy
	*/
 /*
 if some day need the sql back-up to active, just use the following variable
 */
 $backup_sql="";
 
 /*
 Agent de alertant l'utilisateur qu'il à été deconnécté
 */
 
include "$project_path/agent_connex_detection.php";
include "$project_path/connexion.php";
//include '../../../test_acces.php';
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="prod_client" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=3');

$donnees=$reponse1->fetch();

$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];

?>

<html>
<head>

</head>
<link rel="stylesheet" href="../RDC/prod_client/css.css"/>
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
                $("#comment1").attr('disabled', result);
            }
        }
    );

	$(function(){
		// $('#bt_retour1').click(function(){
		// 		$("#contenue").load("RDC/prod_client/A_coherence/coherence1.php");
		// });
		
		$('#revue').click(function(){
			$('#bt_retour1').hide();
			$('#bt_suivant').show();
			$('#contenue_rdc').show();
			$('#contenue_question').show();
			$('#contenue_travail').load("RDC/prod_client/A_coherence/table_G2.php");
		});
		
		$('#bt_suivant').click(function(){
			$('#progressbarRDC').show();
			var reponse1=$('#qcm1').val();
			var commentaire1=$('#comment1').val();
			if((reponse1=="non" && commentaire1=="") || reponse1==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse1,commentaire1,'prod_client','A',3,<?php echo $mission_id; ?>);
				enregistrerTableG2();
				$('#contenue').load("RDC/prod_client/A_coherence/coherence3.php");
			}
		});
		
		$('#bt_non').click(function(){
			$("#contenue").load("RDC/prod_client/index.php");
		});
		
		$('#bt_oui').click(function(){
		
		});
		
		$('#bt_precedent').click(function(){
			$("#contenue").load("RDC/prod_client/A_coherence/coherence1.php");
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
	function enregistrerTableG2(){
		var compte=$('#makacompte').val();
		for(i=0;i<compte;i++){
			var id_compte=$('#id_compte_'+i).val();
			var id_intitule=$('#id_intitule_'+i).val();
			var id_solde1=$('#id_solde1_'+i).val();
			var id_solde2=$('#id_solde2_'+i).val();
			var id_solde3=$('#id_solde3_'+i).val();
			var id_res1=$('#id_res1_'+i).val();
			var id_observation1=$('#id_observation1_'+i).val();
			var id_res2=$('#id_res2_'+i).val();
			var id_observation2=$('#id_observation2_'+i).val();

			$.ajax({
				type:'POST',
				url:'RDC/prod_client/A_coherence/ajout_stockage_G2.php',
				data:{id_compte:id_compte, id_intitule:id_intitule, id_solde1:id_solde1, id_solde2:id_solde2, id_solde3:id_solde3, id_res1:id_res1,id_observation1:id_observation1, id_res2:id_res2,id_observation2:id_observation2,mission_id:<?php echo $mission_id;?>},
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
			alert("Des commentaires obligatoires ont été omis!");
		}
	}

</script>
<body>
<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
	<tr>
		<td><center><label class="grand_Titre">A- COHERENCES ET PRINCIPES COMPTABLES PARTIE :II</label></center></td>
	</tr>
</table>
<table width="100%" height="470">
	<tr>
		<td width="72.5%">
		<div id="contenue_travail" style="height:450px;overflow:auto;width:900px;">
			<label><strong>Travaux à faire :</strong>
			<br/>S'assurer de la cohérence des balances auxiliaires avec la balance générale.</label><br/><br/><br/>
			
			<label><strong>Documents et infos à obtenir</strong></label><br/>
				<label><strong>.</strong>Balance générale N (compte 41 et 70)</label><br/><br/>
				<label><strong>.</strong>Grand - livres N(compte 41 et 70)</label><br/><br/>
				<label><strong>.</strong>Balance auxiliaire des comptes clients</label><br/><br/>
				<label><strong>.</strong>Balance âgée des comptes clients</label><br/><br/><br/>
				
			<label><strong>Question :</strong></label><br />
				<label>Les soldes des grand - livres/balance auxiliaire/balance âgée/balance générale sont - ils cohérents entre eux ?</label><br/><br/><br/>
				
			<label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">Rapprochement solde GL/Balance/Auxiliaire</label>	
		</div>
		</td>
		<td width="27.5%">
		<div id="contenue_question" style="overflow;height:450px;">
			<input type="button" id="bt_suivant" value=">" class="bouton" style="float:right;" />
			<input type="button" id="bt_precedent" value="<" class="bouton" style="float:right;" /><br /><br />
			<div id="contenue_rdc"
			<?php 
					if(@$_GET["coherence_visible"]!='OK')
					print 'style="display:none;"'
				?>>
				<label><strong>Question :</strong></label><br />
				<label>Les soldes des grand - livres/balance auxiliaire/balance âgée/balance générale sont - ils cohérents entre eux ?</label>
				<select id="qcm1" onchange="choixqcm1()">
					<option value=""></option>
					<option value="oui" <?php if($qcm1=="oui") echo 'selected'; ?> >Oui</option>
					<option value="na" <?php if($qcm1=="na") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm1=="non") echo 'selected'; ?> >Non</option>
				</select><br /><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1;?></textarea><br />
			</div>
		</div>
		</td>
	</tr>
</table>
<div id="boite_retour2" style="display:none;">
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
<div id="progressbarRDC" style="width:300px;height:60px;position:absolute;top:250px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
	<center><img src="../img/progressbar.gif"/><br/>Veuillez patienter s'il vous plaît</center>
</div>
</body>
</html>
