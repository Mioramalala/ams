<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=311 AND CYCLE_ACHAT_ID=24 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_dd_8_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_dd8").value=="" && document.getElementById("rad_Question_Non_dd_8").checked== true) || (document.getElementById("rad_Question_Oui_dd_8").checked==false && document.getElementById("rad_Question_NA_dd_8").checked==false && document.getElementById("rad_Question_Non_dd_8").checked==false)){
			$('#mess_quest_vide_dd8').show();
			$('#Question_dd_311').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_dd").value;
			commentaire=document.getElementById("commentaire_Question_dd8").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_dd_8").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_dd_8").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_dd_8").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleDepense/Depensed/php/detect_objectif_exist_dd.php',
				data:{mission_id:mission_id, question_id:311, cycle_achat_id:24},
				success:function(e){
					objectif_id=e;

					// se rediriger vers calcul score
					$.ajax({
						type:'POST',
						url:'cycleDepense/Depensed/php/select_score_dd.php',
						data:{mission_id:mission_id},
						success:function(e){
						    $("#echo_score_dd").html(e);
						}			
					});
					
					if(objectif_id==0){					
						enregistrer_commentaire_dd(commentaire, qcm, mission_id, 311);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depensed/php/update_object_dd.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:311},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleDepense/Depensed/load/load_rep_dd.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#Interface_Question_dd').hide();
										$('#frm_tab_res_dd').html(e).show();
										$('#dv_table_dd').show();										
									}
								});
							}
						});
					}
				}
			});

			$('#Question_dd_311').fadeOut(500);
			$('#message_Terminer_question_dd').show();
			$('#lb_veuillez_aff_dd').hide();
		}

	});
	$('#int_dd_Question_Precedent_8').click(function(){
		$('#Question_dd_311').fadeOut(500);
		$('#Question_dd_310').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_dd_8').click(function(){
		$('#message_fermeture_question_dd8').show();
		$('#Question_dd_311').hide();
	});
});
</script>
<div id="int_Question_dd_8">
	<table width="500" id="t_dd_8">
		<tr style="height:10px">
			<td class="label_Question" align="center">7.Les comptes bancaires sont-ils crédités :<br/>b)	au jour de leur émission pour les chèques ?
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_dd_8" name="rad_Question_dd8" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_dd_8" name="rad_Question_dd8" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_dd_8" name="rad_Question_dd8" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_dd8" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_dd_Question_Precedent_8"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Terminer" class="bouton" id="Question_dd_8_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_dd"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_dd_8" /></div>