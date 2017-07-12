<?php
@session_start();
$mission_id=$_SESSION['idMission'];

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=303 AND CYCLE_ACHAT_ID=23 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_dc_9_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_dc9").value=="" && document.getElementById("rad_Question_Non_dc_9").checked== true) || (document.getElementById("rad_Question_Oui_dc_9").checked==false && document.getElementById("rad_Question_NA_dc_9").checked==false && document.getElementById("rad_Question_Non_dc_9").checked==false)){
			$('#mess_quest_vide_dc9').show();
			$('#Question_dc_220').hide();
			
			
		}
		else{
			mission_id=document.getElementById("txt_mission_id_dc").value;
			commentaire=document.getElementById("commentaire_Question_dc9").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_dc_9").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_dc_9").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_dc_9").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleDepense/Depensec/php/detect_objectif_exist_dc.php',
				data:{mission_id:mission_id, question_id:303, cycle_achat_id:23},
				success:function(e){
					objectif_id=e;

					// se rediriger vers calcul score
					$.ajax({
						type:'POST',
						url:'cycleDepense/Depensec/php/select_score_dc.php',
						data:{mission_id:mission_id},
						success:function(e){
						    $("#echo_score_dc").html(e);
						    
						 //    var echo_score_dc= $("#echo_score_dc").html();
							// alert(echo_score_dc);
						}			
					});


					if(objectif_id==0){					
						enregistrer_commentaire_dc(commentaire, qcm, mission_id, 303);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depensec/php/update_object_dc.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:303},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleDepense/Depensec/load/load_rep_dc.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#Interface_Question_dc').hide();
										$('#frm_tab_res_dc').html(e).show();
										$('#dv_table_dc').show();										
									}
								});
							}
						});
					}


				}
			});

			$('#Question_dc_303').fadeOut(500);
			$('#message_Terminer_question_dc').show();
			$('#lb_veuillez_aff_dc').hide();
		}

	});
	$('#int_dc_Question_Precedent_9').click(function(){
		$('#Question_dc_303').fadeOut(500);
		$('#Question_dc_302').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_dc_9').click(function(){
		$('#message_fermeture_question_dc9').show();
		$('#Question_dc_303').hide();
	});
});
</script>
<div id="int_Question_dc_9">
	<table width="500" id="t_dc_9">
		<tr style="height:10px">
			<td class="label_Question" align="center">8.Les états d’anomalies produits par l’informatique sont-ils régulièrement analysés par une personne indépendante ?
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_dc_9" name="rad_Question_dc9" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_dc_9" name="rad_Question_dc9" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_dc_9" name="rad_Question_dc9" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_dc9" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_dc_Question_Precedent_9"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Terminer" class="bouton" id="Question_dc_9_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_dc"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_dc_9" /></div>