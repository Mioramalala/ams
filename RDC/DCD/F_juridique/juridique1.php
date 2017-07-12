<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';

$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="DCD" and RDC_OBJECTIF="F" and MISSION_ID='.$mission_id.' and RDC_RANG=1');

$donnees=$reponse1->fetch();

$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];

$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="DCD" and RDC_OBJECTIF="F" and MISSION_ID='.$mission_id.' and RDC_RANG=2');

$donnees2=$reponse2->fetch();

$commentaire2=$donnees2['RDC_COMMENTAIRE'];
$qcm2=$donnees2['RDC_REPONSE'];

$reponse3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="DCD" and RDC_OBJECTIF="F" and MISSION_ID='.$mission_id.' and RDC_RANG=3');

$donnees3=$reponse3->fetch();

$commentaire3=$donnees3['RDC_COMMENTAIRE'];
$qcm3=$donnees3['RDC_REPONSE'];

$reponse4=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="DCD" and RDC_OBJECTIF="F" and MISSION_ID='.$mission_id.' and RDC_RANG=4');

$donnees4=$reponse4->fetch();

$commentaire4=$donnees4['RDC_COMMENTAIRE'];
$qcm4=$donnees4['RDC_REPONSE'];

$reponse5=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="DCD" and RDC_OBJECTIF="F" and MISSION_ID='.$mission_id.' and RDC_RANG=5');

$donnees5=$reponse5->fetch();

$commentaire5=$donnees5['RDC_COMMENTAIRE'];
$qcm5=$donnees5['RDC_REPONSE'];

$reponse6=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="DCD" and RDC_OBJECTIF="F" and MISSION_ID='.$mission_id.' and RDC_RANG=6');

$donnees6=$reponse6->fetch();

$commentaire6=$donnees6['RDC_COMMENTAIRE'];
$qcm6=$donnees6['RDC_REPONSE'];

$reponse7=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="DCD" and RDC_OBJECTIF="F" and MISSION_ID='.$mission_id.' and RDC_RANG=7');

$donnees7=$reponse7->fetch();

$commentaire7=$donnees7['RDC_COMMENTAIRE'];
$qcm7=$donnees7['RDC_REPONSE'];

?>

<html>
<head>
<link rel="stylesheet" href="../RDC/DCD/css.css">
</head>
<script>
	// Droit cycle by Tolotra
    // Page : RDC -> DÃ©biteurs et CrÃ©diteurs divers
    // Tâche : K-DÃ©biteurs et CrÃ©diteurs divers, 60
    $.ajax(
        {
            type: 'POST',
            url: 'droitCycle.php',
            data: {task_id: 60},
            success: function (e) {
                var result = 0 === Number(e);
                for (var i = 0; i < 8; i++) {
                    try {
                        $('#qcm' + i).attr('disabled', result);
                        $('#comment' + i).attr('disabled', result);
                    }
                    catch(error) {
                        console.log(error);
                    }
                }
            }
        }
    );
    
	$(function(){
		$('#bt_retour').click(function(){
			//DCD

			$("#contenue").load("RDC/DCD/index.php");
		});
		
		//Renvoi B6
		$('#revue').click(function(){
			$('#bt_suivant').show();
			$('#contenue_rdc').show();
			$("#rev").fadeOut();
			//F_juridique
			// $('#contenue_travail').load("RDC/DCD/F_juridique/table_K3.php");
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
			var reponse7=$('#qcm7').val();
			var commentaire7=$('#comment7').val();	
			if((reponse1=="non" && commentaire1=="") || (reponse2=="non" && commentaire2=="") || (reponse3=="non" && commentaire3=="") || (reponse4=="non" && commentaire4=="") || (reponse5=="non" && commentaire5=="") || (reponse6=="non" && commentaire6=="") || (reponse7=="non" && commentaire7=="") || reponse1=="" || reponse2=="" || reponse3=="" || reponse4=="" || reponse5=="" || reponse6=="" || reponse7==""){ 
				alert('Des reponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse1,commentaire1,'DCD','F',1,<?php echo $mission_id; ?>);	
				add_Data(reponse2,commentaire1,'DCD','F',2,<?php echo $mission_id; ?>);	
				add_Data(reponse3,commentaire1,'DCD','F',3,<?php echo $mission_id; ?>);	
				add_Data(reponse4,commentaire1,'DCD','F',4,<?php echo $mission_id; ?>);	
				add_Data(reponse5,commentaire1,'DCD','F',5,<?php echo $mission_id; ?>);	
				add_Data(reponse6,commentaire1,'DCD','F',6,<?php echo $mission_id; ?>);	
				add_Data(reponse7,commentaire1,'DCD','F',7,<?php echo $mission_id; ?>);	

				$("#contenue").load("RDC/DCD/index.php");
				//$('#contenue').load("RDC/DCD/F_juridique/coherence2.php");
			}
		});
		
		$('#bt_non').click(function(){
			$("#contenue").load("RDC/DCD/index.php");
		});
		
		$('#bt_oui').click(function(){
		
		});
	});
	function add_Data(reponse,commentaire,cycle,objectif,rang,mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/DCD/F_juridique/add_Data.php',
			data:{reponse:reponse, commentaire:commentaire, cycle:cycle, objectif:objectif, rang:rang, mission_id:mission_id},
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
	function choixqcm7(){
		var reponse7=$('#qcm7').val();
		var commentaire7=$('#comment7').val();
		if(reponse7=="non" && commentaire7==""){
			alert('Des commentaires obligatoires ont été omis!');
		}
	}
</script>
<body>
<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
	<tr>
		<td><center><label class="grand_Titre">H -  JURIDIQUE ET FISCAL PARTIE :I</label></center></td>
	</tr>
</table>
<div style="overflow:auto;" >
<table width="100%" height="470">
	<tr>
		<td width="72.5%">
		<div id="contenue_travail" style="overflow:auto;height:450px;width:100%;">
			<label><strong>Travaux à faire :</strong>
			<br/>Contrôler le traitement juridique et fiscal des DCD</label><br /><br/><br/>
			<label><strong>Documents et infos à obtenir :</strong></label><br />
			.GL et PJ  des DCD<br/><br/>
			.Convention de trésorerie (convention d'assistance financière)<br/><br/>
			.PV des AG<br/><br/>
			.Autorisation FINEX GL<br/><br/>
			Convention de compte courantbr/><br/>
			<br/>			
		<label><strong>Question 1:</strong></label><br />
		<label>Existe-t-il des avances de fonds à titre de prêt/emprunt entre sociétés du Groupe et/ou autre tierce entité (à préciser) ?
		</label><br /><br/>
		<label><strong>Question 2:</strong></label><br />
		<label>Si oui, confirmez-vous l'existence de convention de trésorerie ?</label><br /><br/>
		<label><strong>Question 3:</strong></label><br />
		<label>Cette convention a-t-elle été soumise à approbation par :- le CAC ?</label><br /><br/>
		<label><strong>Question 4:</strong></label><br />
		<label>- l'assemblée des actionnaires ?<label><br /><br/>
		<label><strong>Question 5:</strong></label><br />
		<label>Existe-t-il des apports en compte courants libellés en devises ?</label><br /><br/>
		<label><strong>Question 6:</strong></label><br />
		<label>Si oui, confirmez-vous l'existence d'autorisation préalable du FINEX ?</label><br /><br/>
		<label><strong>Question 7:</strong></label><br />
		<label>Existe-t-il une convention de compte courants d'associés ?</label><br /><br/>
		<br/>
		<p id="rev"><label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">Questionnaires</label></p>
		
		</div>
		</td>
		<td width="27.5%">
		<div id="contenue_question" style="overflow:auto;height:450px;" >
			<input type="button" id="bt_suivant" value=">|" class="bouton" style="display:none;float:right;" />
			<input type="button" id="bt_retour" value="retour" class="bouton" style="float:right;" />
			
			
			<div id="contenue_rdc" 
			<?php 
				if(@$_GET["juridique_visible"]!='OK')
				print 'style="display:none;"'
			?>  >
				<label><strong>Question 1:</strong></label><br />
				<label>Existe-t-il des avances de fonds à titre de prêt/emprunt entre sociétés du Groupe et/ou autre tierce entité (à préciser) ?</label>
				<select id="qcm1" onchange="choixqcm1()">
					<option value=""></option>
					<option value="oui" <?php if($qcm1=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm1=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm1=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1;?></textarea><br />
				
				<label><strong>Question 2:</strong></label><br />
				<label>Si oui, confirmez-vous l'existence de convention de trésorerie ?</label>
				<select id="qcm2" onchange="choixqcm2()">
					<option value=""></option>
					<option value="oui" <?php if($qcm2=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm2=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm2=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment2" cols="35" rows="10"><?php echo $commentaire2;?></textarea><br />	

				<label><strong>Question 3:</strong></label><br />
				<label>Cette convention a-t-elle été soumise à approbation par :- le CAC ?</label>
				<select id="qcm3" onchange="choixqcm3()">
					<option value=""></option>
					<option value="oui" <?php if($qcm3=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm3=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm3=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment3" cols="35" rows="10"><?php echo $commentaire3;?></textarea><br />	
				
				<label><strong>Question 4:</strong></label><br />
				<label>- l'assemblée des actionnaires ?</label>
				<select id="qcm4" onchange="choixqcm4()">
					<option value=""></option>
					<option value="oui" <?php if($qcm4=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm4=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm4=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment4" cols="35" rows="10"><?php echo $commentaire4;?></textarea><br />	
				
				<label><strong>Question 5:</strong></label><br />
				<label>Existe-t-il des apports en compte courants libellés en devises ?</label>
				<select id="qcm5" onchange="choixqcm5()">
					<option value=""></option>
					<option value="oui" <?php if($qcm5=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm5=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm5=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment5" cols="35" rows="10"><?php echo $commentaire5;?></textarea><br />	
				
				<label><strong>Question 6:</strong></label><br />
				<label>Si oui, confirmez-vous l'existence d'autorisation préalable du FINEX ?</label>
				<select id="qcm6" onchange="choixqcm6()">
					<option value=""></option>
					<option value="oui" <?php if($qcm6=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm6=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm6=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment6" cols="35" rows="10"><?php echo $commentaire6;?></textarea><br />	
				
				<label><strong>Question 7:</strong></label><br />
				<label>Existe-t-il une convention de compte courants d'associés ?</label>
				<select id="qcm7" onchange="choixqcm7()">
					<option value=""></option>
					<option value="oui" <?php if($qcm7=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm7=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm7=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment7" cols="35" rows="10"><?php echo $commentaire7;?></textarea><br />	
				
			</div>
		</div>
		</td>
	</tr>
</table>
<div id="sms_retour" style="display:none;">
	<table>
		<tr align="center">
			<td height="60">Voulez-vous enregistrer ?</td>
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
