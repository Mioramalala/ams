<?php
include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=195 AND CYCLE_ACHAT_ID=14 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_pb_15_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_pb15").value=="" && document.getElementById("rad_Question_Non_pb_15").checked== true) || (document.getElementById("rad_Question_Oui_pb_15").checked==false && document.getElementById("rad_Question_NA_pb_15").checked==false && document.getElementById("rad_Question_Non_pb_15").checked==false)){
			$('#mess_quest_vide_pb15').show();
			$('#Question_pb_195').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_pb").value;
			commentaire=document.getElementById("commentaire_Question_pb15").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_pb_15").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_pb_15").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_pb_15").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paieb/php/detect_objectif_exist_pb.php',
				data:{mission_id:mission_id, question_id:195, cycle_achat_id:14},
				success:function(e){
					objectif_id=e;

					// se rediriger vers calcul score
					$.ajax({
						type:'POST',
						url:'cyclePaie/Paieb/php/select_score_pb.php',
						data:{mission_id:mission_id},
						success:function(e){
						    $("#echo_score_pb").html(e);
						}			
					});

					if(objectif_id==0){					
						enregistrer_commentaire_pb(commentaire, qcm, mission_id, 195);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paieb/php/update_object_pb.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:195},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cyclePaie/Paieb/load/load_rep_pb.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#Interface_Question_pb').hide();
										$('#frm_tab_res_pb').html(e).show();
										$('#dv_table_pb').show();										
									}
								});
							}
						});
					}
				}
			});

			$('#Question_pb_195').fadeOut(500);
			$('#message_Terminer_question_pb').show();
			$('#lb_veuillez_aff_pb').hide();
		}

	});
	$('#int_pb_Question_Precedent_15').click(function(){
		$('#Question_pb_195').fadeOut(500);
		$('#Question_pb_194').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_pb_15').click(function(){
		$('#message_fermeture_question_pb15').show();
		$('#Question_pb_195').hide();
	});
});
</script>
<div id="int_Question_pb_15">
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">12.Le service paie a-t-il les moyens de vérifier :<br/>b)	qu'elles sont toutes répercutées sur les salaires ?</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_pb_15" name="rad_Question_pb15" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_pb_15" name="rad_Question_pb15" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_pb_15" name="rad_Question_pb15" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_pb15" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_pb_Question_Precedent_15"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Terminer" class="bouton" id="Question_pb_15_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_pb"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_pb_15" /></div>