<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="tresorerie" and RDC_OBJECTIF="B" and MISSION_ID='.$mission_id.' and RDC_RANG=3');

$donnees=$reponse1->fetch();

$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];

$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="tresorerie" and RDC_OBJECTIF="B" and MISSION_ID='.$mission_id.' and RDC_RANG=4');

$donnees2=$reponse2->fetch();

$commentaire2=$donnees2['RDC_COMMENTAIRE'];
$qcm2=$donnees2['RDC_REPONSE'];


?>

<html>
<head>

</head>
<link rel="stylesheet" href="../RDC/tresorerie/css_tresorerie.css">
<script>

	 // Droit cycle by Tolotra
    // Page : RDC -> Trésorerie
    // Tâche : Trésorerie, 32
    $.ajax(
        {
            type: 'POST',
            url: 'droitCycle.php',
            data: {task_id: 32},
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
		$('#bt_retour_1').click(function(){
			$("#contenue").load("RDC/tresorerie/B_regularite/regularite2.php");
		});
		$('#revue').click(function(){
			$('#bt_suivant').show();
			$('#contenue_rdc').show();
			$('#contenue_question').show();
			$.ajax({
				type:'POST',
				url:'RDC/tresorerie/B_regularite/echantillonExist.php',
				data:{mission_id:<?php echo $mission_id;?>},
				success:function(e){
					$('#contenue_travail').load("RDC/tresorerie/B_regularite/select.php");
				}
			});		
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
				add_Data(reponse1,commentaire1,'tresorerie','B',3,<?php echo $mission_id; ?>);
				add_Data(reponse2,commentaire2,'tresorerie','B',4,<?php echo $mission_id; ?>);
				enregistrerDataAll();
				$("#contenue").load("RDC/tresorerie/index.php");
			}
		});
		
		$('#bt_precedent').click(function(){
			$('#contenue').load("RDC/tresorerie/B_regularite/regularite3.php");
		});
	});
	function add_Data(reponse,commentaire,cycle,objectif,rang,mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/tresorerie/B_regularite/add_Data.php',
			data:{reponse:reponse, commentaire:commentaire, cycle:cycle, objectif:objectif, rang:rang, mission_id:mission_id},
			success:function(){
			}
		});	
	}
	function enregistrerDataAll()
	{
		transfert=$("#formenregistre").serialize()+"&cycle=tresorerie";
		//alert(transfert);
		var cpt_ligne=$('#cpt_ligne').val();
			$.ajax({
				type:'POST',
				url:'RDC/tresorerie/B_regularite/addDataTableE3.php',
				data:transfert,
				success:function(res){
					//alert(res);
					
				}
			});
		/*for(i=0;i<cpt_ligne;i++){
			var compteE3=$('#soldeE3'+i).val();
			var soldeE3=$('#soldeE3'+i).val();
			var deviseE3=$('#deviseE3'+i).val();
			var tauxE3=$('#tauxE3'+i).val();
			var solde_reevalE3=$('#solde_reevalE3'+i).val();
			var solde_comptaE3=$('#solde_comptaE3'+i).val();
			var differenceE3=$('#differenceE3'+i).val();
			var observationE3=$('#observationE3'+i).val();
			// alert('1'+compteE3+'/2'+soldeE3+'/3'+deviseE3+'/4'+tauxE3+'/5'+tauxE3+'/6'+solde_reevalE3+'/7'+solde_comptaE3+'/8'+differenceE3+'/9'+observationE3);
			$.ajax({
				type:'POST',
				url:'RDC/tresorerie/B_regularite/addDataTableE3.php',
				data:{compteE3:compteE3, soldeE3:soldeE3, deviseE3:deviseE3, tauxE3:tauxE3, solde_reevalE3:solde_reevalE3, solde_comptaE3:solde_comptaE3, differenceE3:differenceE3, observationE3:observationE3, mission_id:<?php echo $mission_id;?>, cycle:'tresorerie', rang:i},
				success:function(){
					
				}
			});
		}*/
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
		<td class="grand_Titre"><center>C - REGULARITE DES ENREGISTREMENTS PARTIE :III</center></td>
	</tr>
</table>
<div style="overflow:auto;" >
<table width="100%" height="470">
	<tr>
		<td width="72.5%">
		<div id="contenue_travail" style="overflow:auto;height:450px;">
			<label><strong>Travaux à faire :</strong>
			<br/>Evaluer les soldes en devises.</label><br/><br/><br/>
			<label><strong>Documents et infos à obtenir</strong></label><br/>
			<label><strong>.</strong>Grand livre des comptes de trésorerie en devises</label><br/><br/>
			<label><strong>.</strong>Relevés bancaires des comptes libellés en devises</label><br/><br/><br/>
		<label><strong>Question 1 :</strong></label><br/>
		<label>Les comptes libellés en devises font-ils régulièrement l'objet de réévaluation à la date de clôture ?</label><br/><br/><br/>
		<label><strong>Question 2 :</strong></label><br/>
		<label>Les opérations en devises sont-elles correctement comptabilisées ?</label><br/><br/><br/>	
		<label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">
		&nbsp;Réévaluation des comptes de trésorerie libellés en devises</label>	
		</div>
		</td>
		<td width="27.5%">
		<div id="contenue_question" style="overflow;height:450px;">
			<input type="button" id="bt_suivant" value=">I" class="bouton" style="float:right;display: none;" />	
			<input type="button" id="bt_retour_1" value="<" class="bouton" style="float: right;"/>		
			<div id="contenue_rdc" 
			<?php 
				if(@$_GET["regularite_visible"]!='OK')
				print 'style="display:none;"'
			?>>
				<label><strong>Question 1 :</strong></label><br />
				<label>Les comptes libellés en devises font-ils régulièrement l'objet de réévaluation à la date de clôture ?</label>
				<select id="qcm1" onchange="choixqcm1()">
					<option value=""></option>
					<option value="oui" <?php if($qcm1=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm1=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm1=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1;?></textarea><br />
				<label><strong>Question 2 :</strong></label><br />
				<label>Les opérations en devises sont-elles correctement comptabilisées ?</label>
				<select id="qcm2" onchange="choixqcm2()">
					<option value=""></option>
					<option value="oui" <?php if($qcm2=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm2=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm2=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment2" cols="35" rows="10"><?php echo $commentaire2;?></textarea><br />
			</div>
		</div>
		</td>
	</tr>
</table>
</div>
</body>
</html>
