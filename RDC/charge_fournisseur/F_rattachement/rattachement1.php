<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';

$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="F" and MISSION_ID='.$mission_id.' and RDC_RANG=1');

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
		$('#bt_retour').click(function(){
			$("#contenue").load("RDC/charge_fournisseur/index.php");
		});
		$('#bt_retour_1').click(function(){
			$("#contenue").load("RDC/charge_fournisseur/index.php");
		});
		$('#revue').click(function(){
			$('#contenue_rdc').show();
			$('#bt_retour_1').hide();
			$('#bt_suiv_retour').show();
			$('#contenue_question').show();
		//	$('#progressbarRDC').show();
			
			 $('#contenue_travail').load("RDC/charge_fournisseur/F_rattachement/table_F61.php",function(res){
			 	
			 });
		});
		
		$('#bt_suivant').click(function(){
			var reponse1=$('#qcm1').val();
			var commentaire1=$('#comment1').val();
			if((reponse1=="non" && commentaire1=="") || reponse1==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse1,commentaire1,'charge_fournisseur','F',1,<?php echo $mission_id; ?>);
				$("#contenue").load("RDC/charge_fournisseur/F_rattachement/rattachement2.php");
				enregistrerTableF61();
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
			url:'RDC/charge_fournisseur/F_rattachement/add_Data.php',
			data:{reponse:reponse, commentaire:commentaire, cycle:cycle, objectif:objectif, rang:rang, mission_id:mission_id},
			success:function(){
			}
		});	
	}
	function enregistrerTableF61(){
		var compte=$('#makacompte').val();
		for(i=0;i<compte;i++){
			var id_compte=$('#id_compte_'+i).val();
			var id_libelle=$('#id_libelle_'+i).val();
			var id_res=$('#id_res_'+i).val();
			var id_justification=$('#id_justification_'+i).val();
			var id_observation=$('#id_observation_'+i).val();
			
			
			$.ajax({
				type:'POST',
				url:'RDC/charge_fournisseur/F_rattachement/ajout_stockage_F61.php',
				data:{id_compte:id_compte,id_libelle:id_libelle, id_res:id_res,id_justification:id_justification,id_observation:id_observation,mission_id:<?php echo $mission_id;?>},
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
<div id="progressbarRDC" style="width:50%;height:60px;position:absolute;top:250px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
		<center><img src="../img/progressbar.gif" /><br />Veuillez patienter s'il vous plaît</center>
</div>

<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
	<tr>
		<td class="grand_Titre"><center><label>F- RATTACHEMENT DES OPERATIONS PARTIE : I</label></center></td>
	</tr>
</table>
<div style="overflow:auto;" >
<table width="100%" height="470">
	<tr>
		<td width="72.5%">
		<div id="contenue_travail" style="height:450px;width:900px;">
			<label><strong>Travaux à faire :</strong>
			<br /><br />Contrôler le rattachement au bon exercice des dernières écritures d’achats de l’exercice et des premières écritures d’achats de l’exercice suivant.</label><br /><br /><br /><br />
			<label><strong>Documents et infos à obtenir</strong></label><br /><br />
			<label><strong>.</strong>GL des comptes susceptibles d'être concernés par le rattachement (abonnement, etc.)</label><br /><br /><br />
			<label><strong>.</strong>GL et états justifiant le compte 486</label><br /><br /><br />
			<label><strong>.</strong>PJ des dernières opérations/N et premières opérations/N+1</label><br /><br /><br /><br />
		<label><strong>Question 1 :</strong></label><br /><br />
		<label>Les opérations enregistrées sont-elles comptabilisées à l'exercice auquel elles se rattachent ?</label><br /><br /><br /><br />	
		<label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">Vérification de l'exhaustivité/Régularité des enregistrements</label>	
		</div>
		</td>
		<div id="bt_suiv_retour" style="display:none;top:-160px;">
			<input type="button" id="bt_suivant" value=">" class="bouton" style="float:right;" />
			<input type="button" id="bt_retour" value="<" class="bouton" style="float:right;" />			
		</div>
		<td width="27.5%">
		<input type="button" id="bt_retour_1" value="<" class="bouton" style="display:block;top:-210px;float:right;position:relative;"/>
		<div id="contenue_question" style="overflow:auto;height:450px;">
			
			<div id="contenue_rdc"<?php 
				if(@$_GET["rattachement_visible"]!='OK')
				print 'style="display:none;"'
			?>  
			>
				<label><strong>Question 1 :</strong></label><br />
				<label>Les opérations enregistrées sont-elles comptabilisées à l'exercice auquel elles se rattachent ?</label>
				<select id="qcm1" onchange="choixqcm1()">
					<option value=""></option>
					<option value="oui" <?php if($qcm1=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm1=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm1=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si reponse négative)</strong></label><br />
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
