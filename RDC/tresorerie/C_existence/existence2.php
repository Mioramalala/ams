<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and MISSION_ID='.$mission_id.' and RDC_RANG=4');

$donnees=$reponse1->fetch();

$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];

$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and MISSION_ID='.$mission_id.' and RDC_RANG=5');

$donnees2=$reponse2->fetch();

$commentaire2=$donnees2['RDC_COMMENTAIRE'];
$qcm2=$donnees2['RDC_REPONSE'];

$reponse3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and MISSION_ID='.$mission_id.' and RDC_RANG=6');

$donnees3=$reponse3->fetch();

$commentaire3=$donnees3['RDC_COMMENTAIRE'];
$qcm3=$donnees3['RDC_REPONSE'];

$reponse4=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="tresorerie" and RDC_OBJECTIF="C" and MISSION_ID='.$mission_id.' and RDC_RANG=7');

$donnees4=$reponse4->fetch();

$commentaire4=$donnees4['RDC_COMMENTAIRE'];
$qcm4=$donnees4['RDC_REPONSE'];

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

                $("#comment1").attr('disabled', result);
                $("#comment2").attr('disabled', result);
                $("#comment3").attr('disabled', result);
                $("#comment4").attr('disabled', result);
            }
        }
    );

	$(function(){
		$('#bt_retour_1').click(function(){
			$("#contenue").load("RDC/tresorerie/C_existence/existence1.php");
		});
		$('#revue').click(function(){
			$('#bt_suivant').show();
			$('#contenue_rdc').show();
			$('#contenue_question').show();
			$('#contenue_travail').load("RDC/tresorerie/C_existence/table_E5.php");
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
			if((reponse1=="non" && commentaire1=="") || (reponse2=="non" && commentaire2=="") || (reponse3=="non" && commentaire3=="") || (reponse4=="non" && commentaire4=="") || reponse1=="" || reponse2=="" || reponse3=="" || reponse4==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse1,commentaire1,'tresorerie','C',4,<?php echo $mission_id; ?>);
				add_Data(reponse2,commentaire2,'tresorerie','C',5,<?php echo $mission_id; ?>);
				add_Data(reponse3,commentaire3,'tresorerie','C',6,<?php echo $mission_id; ?>);
				add_Data(reponse4,commentaire4,'tresorerie','C',7,<?php echo $mission_id; ?>);
			// Insertion dans la base de donnees
				var lignes = $('#nbLignes').val();

				for(var i=0; i<lignes; i++){
					var rapprochement = $('#rapprochement_'+i).val();
					var commentaire = $('#commentaire_'+i).val();
					var compte = $('#compte_'+i).text();
					// alert(compte);

					if(rapprochement!="" || commentaire!="")
					{add_Input(rapprochement, commentaire, compte, <?php echo $mission_id?>);}
				}
				$('#contenue').load("RDC/tresorerie/C_existence/existence3.php");
			}
		});
		
		$('#bt_precedent').click(function(){
			$('#contenue').load("RDC/tresorerie/C_existence/existence2.php");
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
	function add_Input(rapprochement, commentaire, compte, mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/tresorerie/C_existence/add_Input_E5.php',
			data:{rapprochement:rapprochement, commentaire:commentaire, compte:compte, mission_id:mission_id},
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
</script>
<body>
<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
	<tr>
		<td class="grand_Titre"><center>E - EXISTENCE DE SOLDE PARTIE :II</center></td>
	</tr>
</table>
<div style="overflow:auto;" >
<table width="100%" height="470">
	<tr>
		<td width="72.5%">
		<div id="contenue_travail" style="overflow:auto;height:450px;">
			<label><strong>Travaux à faire :</strong>
			<br/>Contrôler les états de rapprochement bancaire.</label><br/><br/><br/>
			<label><strong>Documents et infos à obtenir</strong></label><br/>
			<label><strong>.</strong>Etats de rapprochement bancaire</label><br/><br/>
			<label><strong>.</strong>Relevés bancaires de fin d'exercice</label><br/><br/>
			<label><strong>.</strong>Souche des chèques en circulation</label><br/><br/>
			<label><strong>.</strong>GL de rapprochement</label><br/><br/>
			<label><strong>.</strong>Relevés bancaires ultérieurs à la date de clôture</label><br/><br/><br/>
		<label><strong>Question 1 :</strong></label><br/>
		<label>A chaque compte bancaire en balance générale correspond-il un rapprochement bancaire ?</label><br/><br/><br/>
		<label><strong>Question 2 :</strong></label><br/>
		<label>Les états de rapprochement bancaire sont-ils visés et signés par la Direction ou par le responsable hiérarchique ?</label><br/><br/><br/>
		<label><strong>Question 3 :</strong></label><br/>
		<label>Toutes les écritures à passer par la société ainsi que par la banque sont-elles correctement justifiées ?</label><br/><br/><br/>	
		<label><strong>Question 4 :</strong></label><br/>
		<label>Existe-t-il des courriers de réclamation pour relancer/justifier les éléments de rapprochement relatifs à des erreurs de la banque?,voir en particulier le cas des versements reçus non passés par la banque</label><br/><br/><br/>	
		<label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">
		&nbsp;Rapprochement bancaire</label>	
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
				<label>A chaque compte bancaire en balance générale correspond-il un rapprochement bancaire ?</label>
				<select id="qcm1" onchange="choixqcm1()">
					<option value=""></option>
					<option value="oui" <?php if($qcm1=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm1=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm1=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1;?></textarea><br />
				<label><strong>Question 2 :</strong></label><br />
				<label>Les états de rapprochement bancaire sont-ils visés et signés par la Direction ou par le responsable hiérarchique ?</label>
				<select id="qcm2" onchange="choixqcm2()">
					<option value=""></option>
					<option value="oui" <?php if($qcm2=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm2=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm2=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment2" cols="35" rows="10"><?php echo $commentaire2;?></textarea><br />
				<label><strong>Question 3 :</strong></label><br />
				<label>Toutes les écritures à passer par la société ainsi que par la banque sont-elles correctement justifiées ?</label>
				<select id="qcm4" onchange="choixqcm4()">
					<option value=""></option>
					<option value="oui" <?php if($qcm4=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm4=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm4=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment4" cols="35" rows="10"><?php echo $commentaire4;?></textarea><br />
				<label><strong>Question 4 :</strong></label><br />
				<label>Existe-t-il des courriers de réclamation pour relancer/justifier les éléments de rapprochement relatifs à des erreurs de la banque ?voir en particulier le cas des versements reçus non passés par la banque</label>
				<select id="qcm3"onchange="choixqcm3()">
					<option value=""></option>
					<option value="oui" <?php if($qcm3=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm3=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm3=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment3" cols="35" rows="10"><?php echo $commentaire3;?></textarea><br />
			</div>
		</div>
		</td>
	</tr>
</table>
</div>
</body>
</html>
