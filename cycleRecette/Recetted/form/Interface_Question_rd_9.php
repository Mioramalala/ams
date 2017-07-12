<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=272 AND CYCLE_ACHAT_ID=20 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_rd_9_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_rd9").value=="" && document.getElementById("rad_Question_Non_rd_9").checked== true) || (document.getElementById("rad_Question_Oui_rd_9").checked==false && document.getElementById("rad_Question_NA_rd_9").checked==false && document.getElementById("rad_Question_Non_rd_9").checked==false)){
			$('#mess_quest_vide_rd9').show();
			$('#Question_rd_272').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_rd").value;
			commentaire=document.getElementById("commentaire_Question_rd9").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_rd_9").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_rd_9").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_rd_9").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recetted/php/detect_objectif_exist_rd.php',
				data:{mission_id:mission_id, question_id:272, cycle_achat_id:20},
				success:function(e){

					objectif_id=e;
					// se rediriger vers calcul score
					$.ajax({
						type:'POST',
						url:'cycleRecette/Recetted/php/select_score_rd.php',
						data:{mission_id:mission_id},
						success:function(e){
						    $("#echo_score_rd").html(e);
						}			
					});
					
					if(objectif_id==0){					
						enregistrer_commentaire_rd(commentaire, qcm, mission_id, 272);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recetted/php/update_object_rd.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:272},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleRecette/Recetted/load/load_rep_rd.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#Interface_Question_rd').hide();
										$('#frm_tab_res_rd').html(e).show();
										$('#dv_table_rd').show();										
									}
								});
							}
						});
					}
				}
			});

			$('#Question_rd_272').fadeOut(500);
			$('#message_Terminer_question_rd').show();
			$('#lb_veuillez_aff_rd').hide();
		}

	});
	$('#int_rd_Question_Precedent_9').click(function(){
		$('#Question_rd_272').fadeOut(500);
		$('#Question_rd_271').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_rd_9').click(function(){
		$('#message_fermeture_question_rd9').show();
		$('#Question_rd_272').hide();
	});
});
</script>
<div id="int_Question_rd_9">
	<table width="500" id="t_rd_9">
		<tr style="height:10px">
			<td class="label_Question" align="center">6.Les reports d'échéance sont-ils :<br/>c)	enregistrés sur l'échéancier dès qu'ils sont accordés ?</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_rd_9" name="rad_Question_rd9" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_rd_9" name="rad_Question_rd9" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_rd_9" name="rad_Question_rd9" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_rd9" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_rd_Question_Precedent_9"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Terminer" class="bouton" id="Question_rd_9_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_rd"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_rd_9" /></div>