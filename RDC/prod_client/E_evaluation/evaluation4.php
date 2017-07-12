<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';
	$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="prod_client" and RDC_OBJECTIF="E" and MISSION_ID='.$mission_id.' and RDC_RANG=6');

	$donnees=$reponse1->fetch();

	$commentaire1=$donnees['RDC_COMMENTAIRE'];
	$qcm1=$donnees['RDC_REPONSE'];

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
                $("#comment1").attr('disabled', result);
            }
        }
    );

	$(function(){
		$('#bt_retour1').click(function(){
				$("#contenue").load("RDC/prod_client/E_evaluation/evaluation3.php");
		});
		
		$('#revue').click(function(){
			$('#bt_retour1').hide();
			$('#bt_precedent').show();
			$('#bt_suivant').show();
			$('#contenue_rdc').show();
			$('#contenue_question').show();
			$('#contenue_travail').load("RDC/prod_client/E_evaluation/table_G6.php");
		});
		
		$('#bt_suivant').click(function(){
			var reponse1=$('#qcm1').val();
			var commentaire1=$('#comment1').val();
			if((reponse1=="non" && commentaire1=="") || reponse1==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse1,commentaire1,'prod_client','E',6,<?php echo $mission_id; ?>);
				enregistrerTableG6();
				$('#contenue').load("RDC/prod_client/index.php");
			}
		});
		
		$('#bt_non').click(function(){
			$("#contenue").load("RDC/prod_client/index.php");
		});
		
		$('#bt_oui').click(function(){
			alert("ok");
		});
		$('#bt_precedent').click(function(){
			$("#contenue").load("RDC/prod_client/E_evaluation/evaluation3.php");
		});
	});
	function add_Data(reponse,commentaire,cycle,objectif,rang,mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/prod_client/E_evaluation/add_Data.php',
			data:{reponse:reponse, commentaire:commentaire, cycle:cycle, objectif:objectif, rang:rang, mission_id:mission_id},
			success:function(){
			}
		});	
	}
	
	function enregistrerTableG6(){
		var compte=$('#makacompte').val();
		for(i=0;i<compte;i++){
			var id_compte=$('#id_compte_'+i).val();
			var id_libelle=$('#id_libelle_'+i).val();
			var soldeendevise=$('#soldeendevise_'+i).val();
			var devise=$('#devise_'+i).val();
			var tauxcloture=$('#tauxcloture_'+i).val();
			var result=$('#result_'+i).val();
			var soldecomptable=$('#soldecomptable_'+i).val();
			var result2=$('#result2_'+i).val();
			var observation=$('#observation_'+i).val();
			
			$.ajax({
				type:'POST',
				url:'RDC/prod_client/E_evaluation/ajout_stockage_G6.php',
				data:{id_compte:id_compte, id_libelle:id_libelle, soldeendevise:soldeendevise,devise:devise,tauxcloture:tauxcloture, result:result,soldecomptable:soldecomptable,result2:result2,observation:observation,mission_id:<?php echo $mission_id;?>},
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
</script>
<body>
	<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
		<tr>
			<td><center><label class="grand_Titre">F - EVALUATION DES SOLDES PARTIE :IV</label></center></td>
		</tr>
	</table>
	<div style="overflow:auto;" >
		<table width="100%" height="470">
			<tr>
				<td width="72.5%">
				<div id="contenue_travail" style="height:450px;overflow:auto;width:900px;">
					<label><strong>Travaux à faire :</strong>
					<br/>Recenser les créances libellées en devises et vérifier leur correcte réévaluation à la clôture</label><br/><br/><br/>
					
					<label><strong>Documents et infos à obtenir</strong></label><br/>
						<label>Grand - livres des comptes clients et tableau de réévaluation des créances libellées en monnaies étrangères.</label><br/><br/><br/>
						
					<label><strong>Question :</strong></label><br/>
						<label>Confirmez-vous que l'ensemble des créances libellées en monnaies étrangères a fait l'objet de réévaluation au taux de change de clôture de la BCM?</label><br/><br/><br/>
						
					<label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">Réevaluation des creances libellées en devises</label>	
				</div>
				</td>
				<td width="27.5%">
				<input type="button" id="bt_retour1" value="<" class="bouton" style="float:right;position:absolute;top:110;left:1160px;display:block;" />
				<div id="contenue_question" style="overflow;height:450px;" >
					<input type="button" id="bt_suivant" value=">I" class="bouton" style="float:right;display:none" />
					<input type="button" id="bt_precedent" value="<" class="bouton" style="float:right;display:none" /><br /><br />
					
					<div id="contenue_rdc" 
						<?php 
							if(@$_GET["evaluation_visible"]!='OK')
							print 'style="display:none;"'
						?> >
						<label><strong>Question :</strong></label><br />
						<label>Confirmez-vous que l'ensemble des créances libellées en monnaies étrangères a fait l'objet de réévaluation au taux de change de clôture de la BCM?</label>
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
</body>
</html>
