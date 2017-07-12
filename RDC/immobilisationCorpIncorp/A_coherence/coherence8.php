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

$mission_id=@$_SESSION['idMission'];

include "$project_path/connexion.php";
//include '../../../test_acces.php';
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=18');
$donnees=$reponse1->fetch();
$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];

$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=19');
$donnees2=$reponse2->fetch();
$commentaire2=$donnees2['RDC_COMMENTAIRE'];
$qcm2=$donnees2['RDC_REPONSE'];

$reponse3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=20');
$donnees3=$reponse3->fetch();
$commentaire3=$donnees3['RDC_COMMENTAIRE'];
$qcm3=$donnees3['RDC_REPONSE'];

?>

<html>
<head>

</head>
<link rel="stylesheet" href="../RDC/immobilisationCorpIncorp/css.css">
<link rel="stylesheet" type="text/css" href="../../../css/bootstrap/css/bootstrap.css">
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
                $("#comment1").attr('disabled', result);
                $("#comment2").attr('disabled', result);
                $("#comment3").attr('disabled', result);
            }
        }
    );
    
	$(function(){
		$('#bt_retour').click(function(){
			// $('#sms_retour').show();
			$("#contenue").load("RDC/immobilisationCorpIncorp/A_coherence/coherence7.php");
		});
		$('#bt_retour2').click(function(){
			// $('#sms_retour').show();
			$("#contenue").load("RDC/immobilisationCorpIncorp/A_coherence/coherence8.php");
		});
		//Renvoi B5.3

		
		$('#bt_suivant').click(function(){		

			var reponse1=$('#qcm1').val();
			var commentaire1=$('#comment1').val();

			var reponse2=$('#qcm2').val();
			var commentaire2=$('#comment2').val();

			var reponse3=$('#qcm3').val();
			var commentaire3=$('#comment3').val();
			if((reponse1=="non" && commentaire1=="") || (reponse2=="non" && commentaire2=="") || (reponse3=="non" && commentaire3=="") || reponse1=="" || reponse2=="" || reponse3==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{

				add_Data(reponse1,commentaire1,'immobilisation corporelle et incorporelle','A',18,<?php echo $mission_id; ?>);
				add_Data(reponse2,commentaire2,'immobilisation corporelle et incorporelle','A',19,<?php echo $mission_id; ?>);
				add_Data(reponse3,commentaire3,'immobilisation corporelle et incorporelle','A',20,<?php echo $mission_id; ?>);
				
				$("#contenue").load("RDC/immobilisationCorpIncorp/index.php");
				//$('#contenue').load("RDC/immobilisationCorpIncorp/A_coherence/coherence6.php");
			}
		});
		
		$('#bt_non').click(function(){
			$("#contenue").load("RDC/immobilisationCorpIncorp/index.php");
		});
		
		$('#bt_oui').click(function(){
		
		});
		
		$('#bt_precedent').click(function(){
			$("#contenue").load("RDC/immobilisationCorpIncorp/A_coherence/coherence7.php");
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



	$(document).ready(function (e)
	{

			$('#revue').click(function(){
				/*$('#bt_suivant').show();
				$('#bt_retour2').show();
				$('#bt_retour').hide();
				$('#contenue_rdc').show();
				$('#contenue_question').show();*/

				$('#contenue_travail').load("RDC/immobilisationCorpIncorp/A_coherence/_accescout_production.php");
				//$('#contenue_travail').load("RDC/immobilisationCorpIncorp/A_coherence/table_B53.php");
			});



		//CHECKED FRAIX ACC ECHANTILLION
		$(document).on("click",".checked_fraixaccEchant",function (e)
		{
			if(!$(this).is(":checked"))
			{
				transfertdata="id_echantillon_GL="+$(this).val();
				$.get("RDC/immobilisationCorpIncorp/A_coherence/supprime_Echantillionfraixacc.php",transfertdata,function (res)
				{

					//alert(res);

				});

			}


		});


			 $(document).on("click","#Slectionner_acquisitions",function (e)
			{

						nbrCheck=$(".checkfrais_acc:checked").length;
						if(nbrCheck==0)
						{
							alert("Vous n'avez pas selection aucun des fraix accessoire");
							return false;
						}

						dataselect_trans=$("#frmFraixacc").serializeArray();
						$.post("RDC/immobilisationCorpIncorp/A_coherence/enreg_fraixaccCoutacquisition.php",dataselect_trans,function (e)
						{
							$.get("RDC/immobilisationCorpIncorp/A_coherence/Affichage_fraixacc_echant.php",dataselect_trans,function (res_)
							{

								$("#listeEchantillion").html(res_);

							});

						});

			});


		$(document).on("click","#Suivant_8",function()
		{

			datatransfert=$("#frmechantillion_type").serializeArray();
			//alert(datatransfert);
			$.post("RDC/immobilisationCorpIncorp/A_coherence/_enregistrement_typefraixacc.php",datatransfert,function (res)
			{
				$('#bt_suivant').show();
				$('#contenue_question').show();
				$('.panel_Fraixacc').hide();
				$("#ContenueSlectionner_acquisition").hide();
				$('#frais_accessoir').attr('class','');
				$('#contenue_travail').attr('class', 'col-md-8');

				$("#contenue_rdc").show();

				$('#contenue_travail').load("RDC/immobilisationCorpIncorp/A_coherence/table_B54.php",function (e){

				});

			});


		});








	});
</script>
<body>
<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
	<tr>
		<td><center><label class="grand_Titre">A- COHERENCES ET PRINCIPES COMPTABLES PARTIE :VIII</label></center></td>
	</tr>
</table>
<div style="overflow:auto;" >
<div style="float:right; height:30px;">
	<input type="button" id="bt_suivant" value=">|" class="bouton" style="display:none;float:right;" />
	<input type="button" id="bt_retour" value="<" class="bouton" style="float:right;" />	
	<input type="button" id="bt_retour2" value="<" class="bouton" style="float:right;display:none;" />	
</div>
<table width="100%" height="470">
	<tr>
		<td width="75%">
		<div id="contenue_travail" style="overflow:auto;height:450px;  max-width:2000px ">
			<label><strong>Travaux à faire :</strong>
			<br/>Principes de comptabilisation</label><br /><br/><br/>
			<label><strong>Documents et infos à obtenir</strong></label><br />
			Détermination du coût de production<br/><br/><br/>
		<label><strong>Questions :</strong></label><br />
		<label>Le coût de production est-il constitué par les éléments suivants :</label><br /><br/><br/>

		<label><strong>Question 1 :</strong></label><br />
		<label>- Coût d'acquisition des matières consommées et des services utilisés pour la production de cet élément ?</label><br /><br/><br/>

		<label><strong>Question 2 :</strong></label><br />
		<label>- Charges directes de production ?</label><br /><br/><br/>

		<label><strong>Question 3 :</strong></label><br />
		<label>- Charges indirectes raisonnablement rattachables à la production ?</label><br /><br/><br/>

		<!--Renvoi B5.3-->
		<label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">Détermination du coût d'acquisition/production</label>

		</div>
		</td>
		<td width="27.5%" id="COntenuequesion_8">
		<div id="contenue_question" style="overflow:auto;height:450px;">
				
			<div id="contenue_rdc"
				<?php 
				if(@$_GET["coherence_visible"]!='OK')
				print 'style="display:none;"'
			?>  
			>
				
				<label><strong>Questions :</strong></label><br />
				<label>Le coût de production est-il constitué par les éléments suivants :</label><br />
				<label><strong>Question 1 :</strong></label><br />
				<label>- Coût d'acquisition des matières consommées et des services utilisés pour la production de cet élément ?</label>
				<select id="qcm1" onchange="choixqcm1()">
					<option value=""></option>
					<option value="oui" <?php if($qcm1=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm1=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm1=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment1" cols="35" rows="10" ><?php echo $commentaire1;?></textarea><br />
				<label><strong>Question 2 :</strong></label><br />
				<label>- Charges directes de production ?</label>
				<select id="qcm2" onchange="choixqcm2()">
					<option value=""></option>
					<option value="oui" <?php if($qcm2=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm2=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm2=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment2" cols="35" rows="10" ><?php echo $commentaire2;?></textarea>
				<label><strong>Question 3 :</strong></label><br />
				<label>- Charges indirectes raisonnablement rattachables à la production ?</label>
				<select id="qcm3" onchange="choixqcm3()">
					<option value=""></option>
					<option value="oui" <?php if($qcm3=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm3=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm3=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment3" cols="35" rows="10" ><?php echo $commentaire3;?></textarea><br />				
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
