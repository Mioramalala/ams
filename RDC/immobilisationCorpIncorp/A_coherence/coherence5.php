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
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=9');
$donnees=$reponse1->fetch();
$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];

$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=10');
$donnees2=$reponse2->fetch();
$commentaire2=$donnees2['RDC_COMMENTAIRE'];
$qcm2=$donnees2['RDC_REPONSE'];

$reponse3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=11');
$donnees3=$reponse3->fetch();
$commentaire3=$donnees3['RDC_COMMENTAIRE'];
$qcm3=$donnees3['RDC_REPONSE'];

$reponse4=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=12');
$donnees4=$reponse4->fetch();
$commentaire4=$donnees4['RDC_COMMENTAIRE'];
$qcm4=$donnees4['RDC_REPONSE'];

$reponse5=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=13');
$donnees5=$reponse5->fetch();
$commentaire5=$donnees5['RDC_COMMENTAIRE'];
$qcm5=$donnees5['RDC_REPONSE'];

?>

<html>
<head>
	<style>
		#tbl_ech{
			border-collapse:collapse;
		}
		#tbl_ech td{
			border:1px solid;
			background-color:#FFFAFA;

		}
		#echant_GL{
			overflow:auto;
			height:330px;
			width:750px;
		}
		#btn_tel{
			border:1px solid #ccc;
			background-color:#efefef;
			border-radius:8px;
			width:200px;
			height:auto;
			margin-top:-3px;
		}
		#btn_tel:hover
		{
			cursor:pointer;
			background-color:#0074bf;
			color:#fff;  }
		#tet{
			margin-left:-17px;
			margin-top:20px;
			border-collapse:collapse;
		}
		#tet td{
			border:1px solid #ccc;
			background-color:#0074bf;
			color:#fff;
		}
 	</style>
</head>
<link rel="stylesheet" href="../RDC/immobilisationCorpIncorp/css.css">
<script>

	// Droit cycle by Tolotra
    // Page : RDC -> Immobilisations
    // Tâche : B-Immobilisations incorporelles et corporelles, 13
   
    $.ajax(
        {
            type: 'POST',
            url: 'droitCycle.php',
            data: {task_id: 13},
            success: function (e) {
                var result = 0 === Number(e);
                $("#qcm1").attr('disabled', result);
                $("#qcm2").attr('disabled', result);
                $("#qcm3").attr('disabled', result);
                $("#qcm4").attr('disabled', result);
                $("#qcm5").attr('disabled', result);
                $("#comment1").attr('disabled', result);
                $("#comment2").attr('disabled', result);
                $("#comment3").attr('disabled', result);
                $("#comment4").attr('disabled', result);
                $("#comment5").attr('disabled', result);
            }
        }
    );

	$(function(){
		$('#bt_retour').click(function(){
			// $('#sms_retour').show();
			$("#contenue").load("RDC/immobilisationCorpIncorp/A_coherence/coherence4.php");
		});
		$('#bt_retour2').click(function(){
			// $('#sms_retour').show();
			$("#contenue").load("RDC/immobilisationCorpIncorp/A_coherence/coherence5.php");
		});
		
		//Renvoi B5.2
		$('#revue').click(function(){
			$('#bt_suivant').show();
			$('#contenue_rdc').show();
			$('#bt_retour2').show();
			$('#bt_retour').hide();


			<?php

				$sql_echantExist="select count(*) as 'nbr_resechant' 
								  
								  from tab_ehantillon_gl 
								   where id_mission='$mission_id' AND objectif='A5' and GL_GEN_CYCLE='B- Immobilisations incorporelles et corporelles'";
						
				$rpsEchant=$bdd->query($sql_echantExist);
				$donEchant=$rpsEchant->fetch();

		      				
				if($donEchant["nbr_resechant"]==0) 
				{
					?>
					$('#contenue_travail').load("RDC/immobilisationCorpIncorp/A_coherence/echantillon.php");
					<?php

				}else
				{
					?>$('#contenue_travail').load("RDC/immobilisationCorpIncorp/A_coherence/table_B52.php");<?php
				}
			?>
				//$('#select_echantillon').show();

			//$('#SELECT_echantillon').hide();
			//$('#contenue_question').show();
			//$('#contenue_travail').load("RDC/immobilisationCorpIncorp/A_coherence/table_B52.php");
		
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
			if((reponse1=="non" && commentaire1=="") || (reponse2=="non" && commentaire2=="") || (reponse3=="non" && commentaire3=="") || (reponse4=="non" && commentaire4=="") || (reponse5=="non" && commentaire5=="") || reponse1=="" || reponse2=="" || reponse3=="" || reponse4=="" || reponse5==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse1,commentaire1,'immobilisation corporelle et incorporelle','A',9,<?php echo $mission_id; ?>);
				add_Data(reponse2,commentaire2,'immobilisation corporelle et incorporelle','A',10,<?php echo $mission_id; ?>);
				add_Data(reponse3,commentaire3,'immobilisation corporelle et incorporelle','A',11,<?php echo $mission_id; ?>);
				add_Data(reponse4,commentaire4,'immobilisation corporelle et incorporelle','A',12,<?php echo $mission_id; ?>);
				add_Data(reponse5,commentaire5,'immobilisation corporelle et incorporelle','A',13,<?php echo $mission_id; ?>);
				$('#contenue').load("RDC/immobilisationCorpIncorp/A_coherence/coherence6.php",function (res)
					{
						//alert(res);
					});
			}
		});
		
		$('#bt_non').click(function(){
			$("#contenue").load("RDC/immobilisationCorpIncorp/index.php");
		});
		
		$('#bt_oui').click(function(){
		
		});
		
		$('#bt_precedent').click(function(){
			$("#contenue").load("RDC/immobilisationCorpIncorp/A_coherence/coherence4.php");
		});
	});
	function add_Data(reponse,commentaire,cycle,objectif,rang,mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/immobilisationCorpIncorp/A_coherence/add_Data.php',
			data:{reponse:reponse, commentaire:commentaire, cycle:cycle, objectif:objectif, rang:rang, mission_id:mission_id},
			success:function(){
			}
		});	
	}
</script>
<!--------------------------------------------------------script 2em io-------------------------------------------------------->
<script>
	function sezam(){
		$("#btn_tel").show();
	}
	$(function(){



		/*$("#btn_tel").click(function(){

			alert("ENREG");
			  valTransfert=$("#tbl_ech tr input[type='checkbox']:checked").serialize();
			  $.ajax({
				type:"POST",
				url:"RDC/immobilisationCorpIncorp/A_coherence/GetEchant_GL.php",
				data:valTransfert,
				success:function(e){
					alert(e);
					$('#select_echantillon').hide();
					$('#contenue_question').show();
					$('#contenue_travail').load("RDC/immobilisationCorpIncorp/A_coherence/table_B52.php");
					
				}
				
			 });
	
		});*/
	
	});

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
</script>

<body>
<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
	<tr>
		<td><center><label class="grand_Titre">A- COHERENCES ET PRINCIPES COMPTABLES PARTIE :V</label></center></td>
	</tr>
</table>
<div style="overflow:auto;" >
	<div style="float:right; height:30px;">
		<input type="button" id="bt_suivant" value=">" class="bouton" style="display:none;float:right;" />
		<input type="button" id="bt_retour" value="<" class="bouton" style="float:right;" />	
		<input type="button" id="bt_retour2" value="<" class="bouton" style="float:right;display:none;" />	
	</div>
	<table width="100%" height="470">
		<tr>
			<td width="80%">
				<div id="contenue_travail" style="height: auto; overflow-y: auto;">
					<label><strong>Travaux à faire :</strong>
					<br/>Verifier les principes de comptabilisation  </label><br />
					<label><strong>Documents et infos à obtenir</strong></label><br />
						 Critères d'affectation en immobilisations</br><br/>
					<label><strong>Questions :</strong></label><br />
					<label>Tous les biens inscrits parmi les immobilisations présentent-ils les critères suivants :</label><br /><br/>
						
					<label><strong>Question 1 :</strong></label><br />
					<label>- Elément identifiable ?</label><br /><br/>
					
					<label><strong>Question 2 :</strong></label><br />
					<label>- Porteur d'avantages économiques futurs ?</label><br /><br/>
					
					<label><strong>Question 3 :</strong></label><br />
					<label>- Eléments contrôlés ?</label><br /><br/>
					
					<label><strong>Question 4 :</strong></label><br />
					<label>- Son coût est évalué avec une fiabilité suffisante ?</label><br /><br/>
					
					<label><strong>Question 5 :</strong></label><br />
					<label>- Dont l'entité attend qu'il soit utilisé au-delà de l'exercice en cours ?</label><br /><br />
				
					<!--Renvoi B5.2-->
					<label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;"> Appréciation des différents critères</label>	
				</div>
			</td>
			<td width="20%">
				<div id="contenue_question" style="overflow:auto;width=20%;height:450px;float:right;">
					
					<div id="contenue_rdc"<?php if(@$_GET["coherence_visible"]!='OK') print 'style="display:none;"'?>  > 
						
						<label><strong>Questions :</strong></label><br />
						<label>Tous les biens inscrits parmi les immobilisations présentent-ils les critères suivants :</label><br />
						<label><strong>Question 1 :</strong></label><br />
						<label>- Elément identifiable ?</label>
						<select id="qcm1" onchange="choixqcm1()">
							<option value=""></option>
							<option value="oui" <?php if($qcm1=="oui") echo 'selected'; ?> >Oui</option>
							<option value="N/A" <?php if($qcm1=="N/A") echo 'selected'; ?> >N/A</option>
							<option value="non" <?php if($qcm1=="non") echo 'selected'; ?> >Non</option>
						</select><br />
						<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
						<textarea id="comment1" cols="35" rows="10" ><?php echo $commentaire1;?></textarea><br />
						<label><strong>Question 2 :</strong></label><br />
						<label>- Porteur d'avantages économiques futurs ?</label>
						<select id="qcm2" onchange="choixqcm2()">
							<option value=""></option>
							<option value="oui" <?php if($qcm2=="oui") echo 'selected'; ?> >Oui</option>
							<option value="N/A" <?php if($qcm2=="N/A") echo 'selected'; ?> >N/A</option>
							<option value="non" <?php if($qcm2=="non") echo 'selected'; ?> >Non</option>
						</select><br />
						<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
						<textarea id="comment2" cols="35" rows="10" ><?php echo $commentaire2;?></textarea>
						<label><strong>Question 3 :</strong></label><br />
						<label>- Eléments contrôlés ?</label>
						<select id="qcm3" onchange="choixqcm3()">
							<option value=""></option>
							<option value="oui" <?php if($qcm3=="oui") echo 'selected'; ?> >Oui</option>
							<option value="N/A" <?php if($qcm3=="N/A") echo 'selected'; ?> >N/A</option>
							<option value="non" <?php if($qcm3=="non") echo 'selected'; ?> >Non</option>
						</select><br />
						<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
						<textarea id="comment3" cols="35" rows="10" ><?php echo $commentaire3;?></textarea><br />
						<label><strong>Question 4 :</strong></label><br />
						<label>- Son coût est évalué avec une fiabilité suffisante ?</label>
						<select id="qcm4" onchange="choixqcm4()">
							<option value=""></option>
							<option value="oui" <?php if($qcm4=="oui") echo 'selected'; ?> >Oui</option>
							<option value="N/A" <?php if($qcm4=="N/A") echo 'selected'; ?> >N/A</option>
							<option value="non" <?php if($qcm4=="non") echo 'selected'; ?> >Non</option>
						</select><br />
						<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
						<textarea id="comment4" cols="35" rows="10" ><?php echo $commentaire4;?></textarea><br />
						<label><strong>Question 5 :</strong></label><br />
						<label>- Dont l'entité attend qu'il soit utilisé au-delà de l'exercice en cours ?</label>
						<select id="qcm5" onchange="choixqcm5()">
							<option value=""></option>
							<option value="oui" <?php if($qcm5=="oui") echo 'selected'; ?> >Oui</option>
							<option value="N/A" <?php if($qcm5=="N/A") echo 'selected'; ?> >N/A</option>
							<option value="non" <?php if($qcm5=="non") echo 'selected'; ?> >Non</option>
						</select><br />
						<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
						<textarea id="comment5" cols="35" rows="10" ><?php echo $commentaire5;?></textarea><br />
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
