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
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=15');
$donnees=$reponse1->fetch();
$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];

$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=16');
$donnees2=$reponse2->fetch();
$commentaire2=$donnees2['RDC_COMMENTAIRE'];
$qcm2=$donnees2['RDC_REPONSE'];

$reponse3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and MISSION_ID='.$mission_id.' and RDC_RANG=17');
$donnees3=$reponse3->fetch();
$commentaire3=$donnees3['RDC_COMMENTAIRE'];
$qcm3=$donnees3['RDC_REPONSE'];




// INSERTION DES ECHATILLONS
//select id_echantillon_GL,compt_ech_gl,date_ech_gl,journal_ech_gl,ref_ech_gl,libelle_ech_gl,debit_ech_gl,crd_ech_gl,sold_ech_gl from tab_ehantillon_gl  where id_mission='$mission_id' AND objectif='A5' and GL_GEN_CYCLE='B- Immobilisations incorporelles et corporelles'
$sqlEchant="select count(*) as 'nbrechant'
 			from tab_ehantillon_gl_fraixacc 
 			where id_mission='$mission_id' AND objectif='A5' and GL_GEN_CYCLE='B- Immobilisations incorporelles et corporelles'" ;
$reponseEchant=$bdd->query($sqlEchant);
$res_=$reponseEchant->fetch();
if($res_["nbrechant"]==0)
{
	$sqlEchant="select *
 			from tab_ehantillon_gl 
 			where id_mission='$mission_id' AND objectif='A5' and GL_GEN_CYCLE='B- Immobilisations incorporelles et corporelles'" ;



	$reponseEchant=$bdd->query($sqlEchant);
	while($res_=$reponseEchant->fetch())
	{
		$id_echantillon_GL=$res_["id_echantillon_GL"];
		$compt_ech_gl=$res_["compt_ech_gl"];
		$date_ech_gl=$res_["date_ech_gl"];
		$journal_ech_gl=$res_["journal_ech_gl"];
		$ref_ech_gl=$res_["ref_ech_gl"];
		$libelle_ech_gl= $res_["libelle_ech_gl"];
		$debit_ech_gl= $res_["debit_ech_gl"];
		$crd_ech_gl= $res_["crd_ech_gl"];
		$sold_ech_gl=$res_["sold_ech_gl"];
		$type_fraixacc="";

		$id_mission=$res_["id_mission"];
		$objectif= $res_["objectif"];
		$GL_GEN_CYCLE=$res_["GL_GEN_CYCLE"];



		$insert_echant="insert into tab_ehantillon_gl_fraixacc(id_echantillon_GL,id_mission,objectif,GL_GEN_CYCLE,compt_ech_gl,date_ech_gl,journal_ech_gl,ref_ech_gl,libelle_ech_gl,debit_ech_gl,crd_ech_gl,sold_ech_gl)
		values('$id_echantillon_GL','$id_mission','$objectif','$GL_GEN_CYCLE','$compt_ech_gl','$date_ech_gl','$journal_ech_gl','$ref_ech_gl','$libelle_ech_gl','$debit_ech_gl','$crd_ech_gl','$sold_ech_gl')";

		$req=$bdd->query($insert_echant);



		$file = $project_path.'/fichier/save_mission/mission.sql';
/*See "Suvit global" for the reason of this remove*/
		// file_put_contents($file, $insert_echant.";", FILE_APPEND | LOCK_EX);

	}


}
// FIN INSERTION DES ECHATILLONS
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
                $("#comment3").attr('disabled', result);
                $("#comment2").attr('disabled', result);
            }
        }
    );

	$(function()
	{
		$('#bt_retour').click(function(){
			// $('#sms_retour').show();
			$("#contenue").load("RDC/immobilisationCorpIncorp/A_coherence/coherence6.php");
		});
		$('#bt_retour2').click(function(){
			// $('#sms_retour').show();
			$("#contenue").load("RDC/immobilisationCorpIncorp/A_coherence/coherence7.php");
		});
		//Renvoi B5.3
		$('#revue').click(function(){
			$('#bt_suivant').show();
			$('#bt_retour2').show();
			$('#bt_retour').hide();
			$('#contenue_rdc').show();
			// $('#contenue_question').show();
			$('#frais_accessoir').show();
			// $('#contenue_travail').load("RDC/immobilisationCorpIncorp/A_coherence/table_B53.php");
		});
		
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
				add_Data(reponse1,commentaire1,'immobilisation corporelle et incorporelle','A',15,<?php echo $mission_id; ?>);
				add_Data(reponse2,commentaire2,'immobilisation corporelle et incorporelle','A',16,<?php echo $mission_id; ?>);
				add_Data(reponse3,commentaire3,'immobilisation corporelle et incorporelle','A',17,<?php echo $mission_id; ?>);


				//$('#contenue').load("RDC/immobilisationCorpIncorp/index.php");
				$("#contenue").load("RDC/immobilisationCorpIncorp/A_coherence/coherence8.php");
				//addEnreg_table()
		
			}
		});
		
		$('#bt_non').click(function(){
			$("#contenue").load("RDC/immobilisationCorpIncorp/A_coherence/coherence7.php");
		});
		
		$('#bt_oui').click(function(){
		
		});
		
		$('#bt_precedent').click(function(){
			$("#contenue").load("RDC/immobilisationCorpIncorp/A_coherence/coherence6.php");
		});
		////////////////////////////frais accessoire///////////////////////////////
		$("#btnFraiAcc").click(function(){
			var rubrique=$("#txtaccessoire").val();
			// alert(rubrique);
			if(rubrique!=''){
			$.ajax({
				type:"post",
				url:"RDC/immobilisationCorpIncorp/A_coherence/postFraisAcc.php",
				data:{a:rubrique},
				success:function(e){
					// alert(e);
					$("#txtaccessoire").val("");
					$("#listFraiAcc").load("RDC/immobilisationCorpIncorp/A_coherence/listFraiAcc.php");
				}
			
			});
		}
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




		$(".checkfrais_acc").unbind();
		/*
		La fonction est rappellé plusieurs fois, ainsi il est necessaire d'enlever cette partie
		*/
		$(".checkfrais_acc").click(function (e)
		{

				idfrais_acc=$(this).val();
				cout=$("#cout").val();
				transfertdata="idfrais_acc="+idfrais_acc+"&cout="+cout;


				if(!$(this).is(":checked"))
				{

					$.get("RDC/immobilisationCorpIncorp/A_coherence/supprime_fraixacc.php",transfertdata,function (res)
					{


					});
				}

		});

		// SUPPRESSION FRAIX ACCESSOIRE EXISTANT
		$(".SupprimerFraixacc").unbind();
		/*
		La fonction est rappellé plusieurs fois, ainsi il est necessaire d'enlever cette partie
		*/
		$("#SupprimerFraixacc").click(function (e)
		{

				if(confirm("Êtes vous sure de vouloir supprimer les fraix accessoires selectionner ?"))
				{
					datatransfert=$("#frmFraixacc").serialize();
					$.get("RDC/immobilisationCorpIncorp/A_coherence/suppression_fraixacc.php",datatransfert,function (res_)
					{
						$(".checkfrais_acc:checked").parent().remove();
						alert("La suppression a été faite avec succée");
					});
				}
		});



		$("#Slectionner_acquisitions").click(function (e)
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






		$("#Suivant").click(function()
		{

				datatransfert=$("#frmechantillion_type").serializeArray();

				$.post("RDC/immobilisationCorpIncorp/A_coherence/_enregistrement_typefraixacc.php",datatransfert,function (res)
				{

					$('#bt_suivant').show();
					$('#contenue_question').show();
					$('.panel_Fraixacc').hide();
					$("#ContenueSlectionner_acquisition").hide();
					$('#frais_accessoir').attr('class','');
					$('#contenue_travail').attr('class', 'col-md-8');

					$("#contenue_rdc").show();
					$('#contenue_travail').load("RDC/immobilisationCorpIncorp/A_coherence/table_B53.php",function (e){
						//alert("FIN ");
					});

				});


		});



		//CHECKED FRAIX ACC ECHANTILLION
		$("#frmechantillion_type").on("click",".checked_fraixaccEchant",function (e)
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




		<?php

		if(@$_GET["FaixACC"]=="Fraix")
		{
		?>
			$("#Suivant").click();

		<?php } ?>



	});


</script>

<body>
	<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;" class="grand_Titre">
		<tr>
			<td><center><label class="grand_Titre">A- COHERENCES ET PRINCIPES COMPTABLES PARTIE :VII</label></center></td>
		</tr>
	</table>
	<div class="row">
		<input type="button" id="bt_suivant" value=">" class="bouton" style="display:none;float:right;" />
		<input type="button" id="bt_retour" value="<" class="bouton" style="float:right;" />	
		<input type="button" id="bt_retour2" value="<" class="bouton" style="float:right;display:none;" />	
	</div>	
	<div id="content-wrapper" class="row">



		<div id="frais_accessoir" class="col-md-2 panel_Fraixacc">
			<div class="row">
				<label for="texte">Ajouter des frais accessoires</label>
				<input type="text" id="txtaccessoire" placeholder="Saisir ici...">
				<button class="btn btn-primary" id="btnFraiAcc"><span class="glyphicon glyphicon-plus"></span></button>
			</div>

			<form id="frmFraixacc">
				<input type="hidden" id="cout" name="cout" value="accuisition">
				<div id="listFraiAcc">
					<label>Liste des frais accessoires</label>
					<ul>
						<?php
							$reponse=$bdd->query("select nom_frais_acc,id_frais_acc from tab_Frais_Accessoire where id_mission=".$mission_id);
							while($donnees=$reponse->fetch())
							{
								$idfraix=$donnees["id_frais_acc"];
								$sql1="select count(*) as 'nbr_'  from tbl_detaillefraix_acc where id_frais_acc='$idfraix' and type_fraixacc='accuisition'";
								$req=$bdd->query($sql1);
								$res_=$req->fetch();


								?>
								<li><input <?php if($res_["nbr_"]!=0){?> checked <?php } ?> type="checkbox" name="checkfrais_acc[]" class="checkfrais_acc" value="<?php echo $donnees['id_frais_acc'] ; ?>" ><?php echo $donnees['nom_frais_acc'] ;?></li>
							<?php
							}
						?>
					</ul>
				</div>
				<input type="button" value="Supprimer" id="SupprimerFraixacc"/>
			</form>
		</div>

		<div  class="col-md-2 panel_Fraixacc" style="padding: 120px 0 0 0">
			<input type="button" value="Sélectionner acquisitions" id="Slectionner_acquisitions"/>
		</div>
		<div id="contenue_travail"  class="col-md-6">
			<label for="texte" style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: bold;">Affichage échantillons coût d'acquisition</label>
			<form id="frmechantillion_type">
				<input type="hidden"  value="accuisition" name="cout_">
				<div id="listeEchantillion">
					<?php
					$_GET["cout"]="accuisition";
					require_once ("Affichage_fraixacc_echant.php");

					?>

				</div>
			</form>
		</div>
		<div class="col-md-2 panel_Fraixacc" style="padding: 120px 0 0 0;float: left;">
			<input type="button" value="Suivant" id="Suivant"/>
		</div>

		
		<div id="contenue_question" class="col-md-4">
			
			<div id="contenue_rdc" <?php if(@$_GET["coherence_visible"]!='OK') echo 'style="display:none;"';?>>
				<label><strong>Questions :</strong></label><br />
				<label>Le coût d'acquisition des immobilisations importées est-il constitué par les éléments suivants :</label><br />
				<label><strong>Question 1 :</strong></label><br />
				<label>- Prix d'achat résultant de l'accord des parties à la date de la transaction ?</label>
				<select id="qcm1" onchange="choixqcm1()">
					<option value=""></option>
					<option value="oui" <?php if($qcm1=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm1=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm1=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment1" cols="35" rows="10" ><?php echo $commentaire1;?></textarea><br />
				<label><strong>Question 2 :</strong></label><br />
				<label>- Droits de douanes et autres taxes fiscales non récupérables ?</label>
				<select id="qcm2" onchange="choixqcm2()">
					<option value=""></option>
					<option value="oui" <?php if($qcm2=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm2=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm2=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment2" cols="35" rows="10" ><?php echo $commentaire2;?></textarea>
				<label><strong>Question 3 :</strong></label><br />
				<label>-Frais accessoires : frais de livraison et de manutention initiaux, honoraires de professionnels tels qu'architecte et ingénieurss ?</label>
				
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
