<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="prod_client" and RDC_OBJECTIF="F" and MISSION_ID='.$mission_id.' and RDC_RANG=1');

$donnees=$reponse1->fetch();

$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];

$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="prod_client" and RDC_OBJECTIF="F" and MISSION_ID='.$mission_id.' and RDC_RANG=2');

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
			$("#contenue").load("RDC/prod_client/index.php");
		});
		
		$('#revue').click(function(){
			$('#bt_suivant').show();
			$('#contenue_rdc').show();
			$('#contenue_travail').load("RDC/prod_client/F_rattachement/table_G7.php");
		});
		
		$('#bt_suivant').click(function(){
			var reponse1=$('#qcm1').val();
			var commentaire1=$('#comment1').val();
			var reponse2=$('#qcm2').val();
			var commentaire2=$('#comment2').val();
			if((reponse1=="non" && commentaire1=="") || (reponse2=="non" && commentaire2=="") || reponse1=="" || reponse2==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse1,commentaire1,'prod_client','F',1,<?php echo $mission_id; ?>);
				add_Data(reponse2,commentaire2,'prod_client','F',2,<?php echo $mission_id; ?>);
				enregistrerTableG7();
				$('#contenue').load("RDC/prod_client/F_rattachement/rattachement2.php");
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
			url:'RDC/prod_client/F_rattachement/add_Data.php',
			data:{reponse:reponse, commentaire:commentaire, cycle:cycle, objectif:objectif, rang:rang, mission_id:mission_id},
			success:function(){
			}
		});	
	}
	function enregistrerSynthese(){
		var synthese=$('#syntheseG1').val();
		$.ajax({
			type:'POST',
			url:'RDC/prod_client/F_rattachement/addSyntheseRa.php',
			data:{synthese:synthese, mission_id:<?php echo $mission_id;?>, cycle:'prod_client', objectif:'F', reference:'G1'},
			success:function(){
			}
		});
	}
	
	function enregistrerTableElementG7(i){
		var daty        = $('#date_'+i).val();
		var facture     = $('#facture_'+i).val();
		var client      = $('#client_'+i).val();
		var montant     = $('#montant_'+i).val();
		var tva         = $('#tva_'+i).val();
		var observation = $('#observation_'+i).val();
		
		$.ajax({
			type    : 'POST',
			url     : 'RDC/prod_client/F_rattachement/ajout_stockage_G7.php',
			data    : {
				daty        : daty,
				facture     : facture,
				client      : client,
				montant     : montant,
				tva         : tva,
				observation : observation,
				mission_id  : <?php echo $mission_id;?>
			},
			success : function(e){
				alert(e);
			},
			error : function(e){
				//alert('Error : ' + e);
			}
		});
	}
	
	function enregistrerTableG7(){
		var compte = $('#nbLignes').val();
		//alert(compte);
		$.ajax({
			type    : 'POST',
			url     : 'RDC/prod_client/F_rattachement/delete_data.php',
			data    : {},
			success : function(e){
				for(var i = 0; i < compte; i++) {
					enregistrerTableElementG7(i);
				}
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
			<td><center><label class="grand_Titre">G - RATTACHEMENT DES OPERATIONS PARTIE :I</label></center></td>
		</tr>
	</table>
	<div style="overflow:auto;" >
		<table width="100%" height="470">
			<tr>
				<td width="72.5%">
				<div id="contenue_travail" style="height:450px;overflow:auto;width:100%;">
					<label><strong>Travaux à faire :</strong>
					<br/>Contrôler les dernières écritures de vente de l'exercice et des premières écritures de vente de l'exercice suivant.</label><br/><br/><br/>
					
					<label><strong>Documents et infos à obtenir</strong></label><br />
						<label><strong>.</strong>GL des comptes de produits.</label><br/><br/>
						<label><strong>.</strong>Dernière factures des ventes de l'exercice N et première facture de vente de l'exercice N+1.</label><br/><br/><br/>
						
					<label><strong>Question 1 :</strong></label><br />
						<label>Assurez-vous que la numérotation chronologique de la dernière facture de vente de l'exercice N et la première facture de vente de l'exercice N+1 a été respectée ?</label><br/><br/><br/>
						
					<label><strong>Question 2 :</strong></label><br />
						<label>Assurez-vous que les factures de ventes de l'exerice N ont été tous comptabilisées dans le bon exercice?</label><br/><br/><br/>
						
					<label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">Chronologie des factures de ventes</label>	
				</div>
				</td>
				<td width="27.5%">
				<div id="contenue_question" style="overflow;height:450px;" >
					<input type="button" id="bt_suivant" value=">" class="bouton" style="display:none;float:right;" />
					<input type="button" id="bt_retour_pc" value="<" class="bouton" style="float:right;" />
					<br />			
					<div id="contenue_rdc" 
						<?php 
							if(@$_GET["rattachement_visible"]!='OK')
							print 'style="display:none;"'
						?> >
						<label><strong>Question 1 :</strong></label><br />
						<label>Assurez-vous que la numérotation chronologique de la dernière facture de vente de l'exercice N et la première facture de vente de l'exercice N+1 a été respectée ?</label>
						<select id="qcm1" onchange="choixqcm1()">
							<option value=""></option>
							<option value="oui" <?php if($qcm1=="oui") echo 'selected'; ?> >Oui</option>
							<option value="na" <?php if($qcm1=="na") echo 'selected'; ?> >N/A</option>
							<option value="non" <?php if($qcm1=="non") echo 'selected'; ?> >Non</option>
						</select><br /><br />
						<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
						<textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1;?></textarea><br /><br />
						
							<label><strong>Question 2 :</strong></label><br />
						<label>Assurez-vous que les factures de ventes de l'exerice N ont été tous comptabilisées dans le bon exercice ?</label>
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
</body>
</html>
