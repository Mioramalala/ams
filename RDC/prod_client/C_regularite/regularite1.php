<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="prod_client" and RDC_OBJECTIF="C" and MISSION_ID='.$mission_id.' and RDC_RANG=1');

$donnees=$reponse1->fetch();

$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];

$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="prod_client" and RDC_OBJECTIF="C" and MISSION_ID='.$mission_id.' and RDC_RANG=2');

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
			$('#contenue_travail').load("RDC/prod_client/C_regularite/table_G3.php");
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
				add_Data(reponse1,commentaire1,'prod_client','C',1,<?php echo $mission_id; ?>);
				add_Data(reponse2,commentaire2,'prod_client','C',2,<?php echo $mission_id; ?>);
				enregistrerTableG3();
				$('#contenue').load("RDC/prod_client/C_regularite/regularite2.php");
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
			url:'RDC/prod_client/C_regularite/add_Data.php',
			data:{reponse:reponse, commentaire:commentaire, cycle:cycle, objectif:objectif, rang:rang, mission_id:mission_id},
			success:function(){
			}
		});	
	}
	function enregistrerSynthese(){
		var synthese=$('#syntheseG1').val();
		$.ajax({
			type:'POST',
			url:'RDC/prod_client/C_regularite/addSyntheseRa.php',
			data:{synthese:synthese, mission_id:<?php echo $mission_id;?>, cycle:'prod_client', objectif:'C', reference:'G1'},
			success:function(){
			}
		});
	}
	function enregistrerTableG3(){
		var compte=$('#makacompte').val();
		for(i=0;i<compte;i++){
		
			var id_compte=$('#id_compte_'+i).val();
			var id_jl=$('#id_jl_'+i).val();
			var id_ref=$('#id_ref_'+i).val();
			var id_libelle=$('#id_libelle_'+i).val();
			var id_d=$('#id_d_'+i).val();
			var id_c=$('#id_c_'+i).val();
			var id_solde=$('#id_solde_'+i).val();
			var id_pointage=$('#id_pointage_'+i).val();
			var id_reg=$('#id_reg_'+i).val();
			var id_bc=$('#id_bc_'+i).val();
			var id_bl=$('#id_bl_'+i).val();
			var id_observation=$('#id_observation_'+i).val();
			var id_renvoie=$('#id_renvoie_'+i).val();
			
			$.ajax({
				type:'POST',
				url:'RDC/prod_client/C_regularite/ajout_stockage_G3.php',
				data:{id_compte:id_compte, id_jl:id_jl, id_ref:id_ref, id_libelle:id_libelle, id_d:id_d, id_c:id_c, 
				id_solde:id_solde, id_pointage:id_pointage, id_reg:id_reg,id_bc:id_bc,id_bl:id_bl,
				id_observation:id_observation ,id_renvoie:id_renvoie,mission_id:<?php echo $mission_id;?>},
				success:function(e){
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
			<td><center><label class="grand_Titre">C - REGULARITE DES ENREGISTREMENTS PARTIE :I</label></center></td>
		</tr>
	</table>
	<div style="overflow:auto;" >
		<table width="100%" height="450">
			<tr>
				<td width="72.5%">
				<div id="contenue_travail" style="height:650px;width:1400px;">
					<label><strong>Travaux à faire :</strong>
					<br/>Contrôler la régularité des enregistrements : tester la justification de l'enregistrement des ventes, rapprocher les factures avec les bons de commandes et bons de livraison, vérifier la correcte comptabilisation des créances en devises.</label>
					<br/><br/><br/>
					
					<label><strong>Documents et infos à obtenir</strong></label><br />
						<label><strong>.</strong>Grand - livres des comptes "ventes"</label><br/><br/>
						<label><strong>.</strong>Selection des factures de ventes, bons de commande et bons de livraison</label><br/><br/><br/>
						<label><strong>.</strong>Balance et grand-livres auxiliaire des comptes clients</label><br/><br/><br/>
						
					<label><strong>Question 1 :</strong></label><br />
						<label>Sur la base de sondage, confirmez-vous que les ventes comptabilisées sont appuyées par des factures en bonne et due forme?</label><br/><br/><br/>
						
					<label><strong>Question 2 :</strong></label><br />
						<label>Confirmez-vous que l'ensemble des factures de ventes est appuyée par des bons de commandes et des bons de livraison?</label><br/><br/><br/>
						
						<label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">Vérification de l'exhaustivité/Régularité des enregistrements</label>	
				</div>
				</td>
				<div id="bt_suiv_retour" style="">
					<input type="button" id="bt_suivant" value=">" class="bouton" style="display:none;float:right;" />
					<input type="button" id="bt_retour_pc" value="<" class="bouton" style="float:right;" />	
				</div>
				<td width="27.5%">
				<div id="contenue_question" style="overflow:auto;height:450px;" >
							
					<div id="contenue_rdc" 
					<?php 
						if(@$_GET["regularite_visible"]!='OK')
						print 'style="display:none;"'
					?> >
						<label><strong>Question 1 :</strong></label><br />
						<label>Sur la base de sondage, confirmez-vous que les ventes comptabilisées sont appuyées par des factures en bonne et due forme ?</label>
						<select id="qcm1" onchange="choixqcm1()">
							<option value=""></option>
							<option value="oui" <?php if($qcm1=="oui") echo 'selected'; ?> >Oui</option>
							<option value="na" <?php if($qcm1=="na") echo 'selected'; ?> >N/A</option>
							<option value="non" <?php if($qcm1=="non") echo 'selected'; ?> >Non</option>
						</select><br /><br />
						<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
						<textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1;?></textarea><br />
						
							<label><strong>Question 2 :</strong></label><br />
						<label>Confirmez-vous que l'ensemble des factures de ventes est appuyée par des bons de commandes et des bons de livraison?</label>
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
