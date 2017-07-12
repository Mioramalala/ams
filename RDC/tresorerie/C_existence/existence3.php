<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and MISSION_ID='.$mission_id.' and RDC_RANG=8');

$donnees=$reponse1->fetch();

$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];

$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and MISSION_ID='.$mission_id.' and RDC_RANG=9');

$donnees2=$reponse2->fetch();

$commentaire2=$donnees2['RDC_COMMENTAIRE'];
$qcm2=$donnees2['RDC_REPONSE'];

$reponse3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and MISSION_ID='.$mission_id.' and RDC_RANG=10');

$donnees3=$reponse3->fetch();

$commentaire3=$donnees3['RDC_COMMENTAIRE'];
$qcm3=$donnees3['RDC_REPONSE'];

$reponse4=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and MISSION_ID='.$mission_id.' and RDC_RANG=11');

$donnees4=$reponse4->fetch();

$commentaire4=$donnees4['RDC_COMMENTAIRE'];
$qcm4=$donnees4['RDC_REPONSE'];

$reponse5=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and MISSION_ID='.$mission_id.' and RDC_RANG=12');

$donnees5=$reponse5->fetch();

$commentaire5=$donnees5['RDC_COMMENTAIRE'];
$qcm5=$donnees5['RDC_REPONSE'];

$reponse6=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and MISSION_ID='.$mission_id.' and RDC_RANG=13');

$donnees6=$reponse6->fetch();

$commentaire6=$donnees6['RDC_COMMENTAIRE'];
$qcm6=$donnees6['RDC_REPONSE'];

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
                $("#qcm3").attr('disabled', result);
                $("#qcm4").attr('disabled', result);
                $("#qcm5").attr('disabled', result);
                $("#qcm6").attr('disabled', result);
                $("#comment1").attr('disabled', result);
                $("#comment2").attr('disabled', result);
                $("#comment3").attr('disabled', result);
                $("#comment4").attr('disabled', result);
                $("#comment5").attr('disabled', result);
                $("#comment6").attr('disabled', result);
            }
        }
    );


	$(function(){
		$('#bt_retour_1').click(function(){
			$("#contenue").load("RDC/tresorerie/C_existence/existence2.php");
		});
		$('#revue').click(function(){
			$('#bt_suivant').show();
			$('#contenue_rdc').show();
			$('#contenue_question').show();
			$('#contenue_travail').load("RDC/tresorerie/C_existence/table_E6.php");
		});
		
		$('#bt_suivant').click(function(){
			var reponse1=$('#qcm1').val();
			var commentaire1=$('#comment1').val();
			var reponse2=$('#qcm2').val();
			var commentaire2=$('#comment2').val();
			var reponse3=$('#qcm3').val();
			var commentaire3=$('#comment3').val();
			var reponse4=$('#qcm4').val();
			var commentaire4=$('#comment4').val();
			var reponse5=$('#qcm5').val();
			var commentaire5=$('#comment5').val();
			var reponse6=$('#qcm6').val();
			var commentaire6=$('#comment6').val();
			if((reponse1=="non" && commentaire1=="") || (reponse2=="non" && commentaire2=="") || (reponse3=="non" && commentaire3=="") || (reponse4=="non" && commentaire4=="") || (reponse5=="non" && commentaire5=="") || (reponse6=="non" && commentaire6=="") || reponse1=="" || reponse2=="" || reponse3=="" || reponse4=="" || reponse5=="" || reponse6==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse1,commentaire1,'tresorerie','C',8,<?php echo $mission_id; ?>);
				add_Data(reponse2,commentaire2,'tresorerie','C',9,<?php echo $mission_id; ?>);
				add_Data(reponse3,commentaire3,'tresorerie','C',10,<?php echo $mission_id; ?>);
				add_Data(reponse4,commentaire4,'tresorerie','C',11,<?php echo $mission_id; ?>);
				add_Data(reponse5,commentaire5,'tresorerie','C',12,<?php echo $mission_id; ?>);
				add_Data(reponse6,commentaire6,'tresorerie','C',13,<?php echo $mission_id; ?>);

				//Insertion dans la base
				var lignes = $('#nbLignes').val();
				
				for(var i=0; i<lignes; i++){
					var compte = $('#compte_'+i).text();
					var pv = $('#pv_'+i).val();
					var renvoi = $('#renvoi_'+i).val();
					var journal = $('#journal_'+i).val();
					var ecart1 = $('#ecart1_'+i).val();
					var ecart2 = $('#ecart2_'+i).val();
					var observation = $('#observation_'+i).val();

					if(pv!="" || renvoi!="" || journal!="" || ecart1!="" || ecart2!="" || observation !="")
					{add_Input(compte,pv,renvoi,journal,ecart1,ecart2,observation, <?php echo $mission_id;?>)}
				}


				$('#contenue').load("RDC/tresorerie/C_existence/existence4.php");
			}
		});
		
		$('#bt_precedent').click(function(){
			$('#contenue').load("RDC/tresorerie/C_existence/existence3.php");
		});
		
		$('#bt_non').click(function(){
			$("#contenue").load("RDC/tresorerie/index.php");
		});
		
		$('#bt_oui').click(function(){
		
		});
	});
	function add_Data(reponse,commentaire,cycle,objectif,rang,mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/tresorerie/C_existence/add_Data.php',
			data:{reponse:reponse, commentaire:commentaire, cycle:cycle, objectif:objectif, rang:rang, mission_id:mission_id},
			success:function(){
			}
		});	
	}
	function add_Input(compte,pv,renvoi,journal,ecart1,ecart2,observation,mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/tresorerie/C_existence/add_Input_E6.php',
			data:{compte:compte,pv:pv,renvoi:renvoi,journal:journal,ecart1:ecart1,ecart2:ecart2,observation:observation, mission_id:mission_id},
			success:function(){
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
	function choixqcm3(){
		var reponse3=$('#qcm3').val();
		var commentaire3=$('#comment3').val();
		if(reponse3=="non" && commentaire3==""){
			alert('Des commentaires obligatoires ont été omis!');
		}
	}
	
	function choixqcm4(){
		var reponse4=$('#qcm4').val();
		var commentaire4=$('#comment4').val();
		if(reponse4=="non" && commentaire4==""){
			alert('Des commentaires obligatoires ont été omis!');
		}
	}
	function choixqcm5(){
		var reponse5=$('#qcm5').val();
		var commentaire5=$('#comment5').val();
		if(reponse5=="non" && commentaire5==""){
			alert('Des commentaires obligatoires ont été omis!');
		}
	}
	
	function choixqcm6(){
		var reponse6=$('#qcm6').val();
		var commentaire6=$('#comment6').val();
		if(reponse6=="non" && commentaire6==""){
			alert('Des commentaires obligatoires ont été omis!');
		}
	}
</script>
<body>
<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
	<tr>
		<td class="grand_Titre"><center>E -  EXISTENCE DE SOLDE PARTIE :III</center></td>
	</tr>
</table>
<div style="overflow:auto;" >
<table width="100%" height="470">
	<tr>
		<td width="72.5%">
		<div id="contenue_travail" style="overflow:auto;height:450px;">
			<label><strong>Travaux à faire :</strong>
			<br/>Contrôler le solde des caisses.</label><br/><br/><br/>
			<label><strong>Documents et infos à obtenir</strong></label><br/>
			<label><strong>.</strong>Livre de caisse (manuel si possible)</label><br/><br/>
			<label><strong>.</strong>Procès verbal de comptage physique de caisse</label><br/><br/><br/>
			<label><strong>Question 1 :</strong></label><br/>
			<label>Existe-t-il un procès verbal de comptage de caisse à la date de clôture de l'exerice ?</label><br/><br/><br/>
			<label><strong>Question 2 :</strong></label><br/>
			<label>Le PV de caisse est-il visé et signé par la Direction ?</label><br/><br/><br/>	
			<label><strong>Question 3 :</strong></label><br/>
			<label>Le solde retracé dans le PV/livre de caisse est-il cohérent avec la balance générale des comptes ?</label><br/><br/><br/>		
			<label><strong>Question 4 :</strong></label><br/>
			<label>Avez-vous réalisé un comptage physique des encaisses lors de l'intervention ?</label><br/><br/><br/>
			<label><strong>Question 5 :</strong></label><br/>
			<label>Le résultat du comptage physique est-il cohérent avec le journal de caisse ?</label><br/><br/><br/>	
			<label><strong>Question 6 :</strong></label><br/>
			<label>Confirmez-vous qu'aucun règlement en espèces d'achat de biens et services supérieur à Ariary 200 000,00 n'est constaté dans la comptabilité ?</label><br/><br/><br/>	
			<label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">
			&nbsp;Procès verbal de comptage physique de caisse</label>	
		</div>
		</td>
		<td width="27.5%">
		<div id="contenue_question" style="overflow;height:450px;">
			<input type="button" id="bt_suivant" value=">" class="bouton" style="float:right;display: none;" />	
			<input type="button" id="bt_retour_1" value="<" class="bouton" style="float: right;"/>	
			<div id="contenue_rdc" 
			<?php 
				if(@$_GET["existence_visible"]!='OK')
				print 'style="display:none;"'
			?>>
				<label><strong>Question 1 :</strong></label><br />
				<label>Existe-t-il un procès verbal de comptage de caisse à la date de clôture de l'exerice ?</label>
				<select id="qcm1" onchange="choixqcm1()">
					<option value=""></option>
					<option value="oui" <?php if($qcm1=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm1=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm1=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1;?></textarea><br />
				<label><strong>Question 2 :</strong></label><br />
				<label>Le PV de caisse est-il visé et signé par la Direction ?</label>
				<select id="qcm2" onchange="choixqcm2()">
					<option value=""></option>
					<option value="oui" <?php if($qcm2=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm2=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm2=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment2" cols="35" rows="10"><?php echo $commentaire2;?></textarea><br />
				<label><strong>Question 3 :</strong></label><br />
				<label>Le solde retracé dans le PV/livre de caisse est-il cohérent avec la balance générale des comptes ?</label>
				<select id="qcm3" onchange="choixqcm3()">
					<option value=""></option>
					<option value="oui" <?php if($qcm3=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm3=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm3=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment3" cols="35" rows="10"><?php echo $commentaire3;?></textarea><br />
				<label><strong>Question 4 :</strong></label><br />
				<label>Avez-vous réalisé un comptage physique des encaisses lors de l'intervention ?</label>
				<select id="qcm4" onchange="choixqcm4()">
					<option value=""></option>
					<option value="oui" <?php if($qcm4=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm4=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm4=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment4" cols="35" rows="10"><?php echo $commentaire4;?></textarea><br />
				<label><strong>Question 5 :</strong></label><br />
				<label>Le résultat du comptage physique est-il cohérent avec le journal de caisse ?</label>
				<select id="qcm5" onchange="choixqcm5()">
					<option value=""></option>
					<option value="oui" <?php if($qcm5=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm5=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm5=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment5" cols="35" rows="10"><?php echo $commentaire5;?></textarea><br />
				<label><strong>Question 6 :</strong></label><br />
				<label>Confirmez-vous qu'aucun règlement en espèces d'achat de biens et services supérieur à Ariary 200 000,00 n'est constaté dans la comptabilité ?</label>
				<select id="qcm6" onchange="choixqcm6()">
					<option value=""></option>
					<option value="oui" <?php if($qcm6=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm6=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm6=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment6" cols="35" rows="10"><?php echo $commentaire6;?></textarea><br />
			</div>
		</div>
		</td>
	</tr>
</table>
</div>
</body>
</html>
