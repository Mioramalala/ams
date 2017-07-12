<?php

include '../../../connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=54 AND CYCLE_ACHAT_ID=5 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_e_9_Bouton').click(function(){
		// tinay editer
		//if((document.getElementById("commentaire_Question_e9").value=="") || (document.getElementById("rad_Question_Oui_e_9").checked==false && document.getElementById("rad_Question_NA_e_9").checked==false && document.getElementById("rad_Question_Non_e_9").checked==false)){
		if((document.getElementById("commentaire_Question_e9").value=="" && document.getElementById("rad_Question_Non_e_9").checked== true) || (document.getElementById("rad_Question_Oui_e_9").checked==false && document.getElementById("rad_Question_NA_e_9").checked==false && document.getElementById("rad_Question_Non_e_9").checked==false)){
			$('#mess_quest_vide_e9').show();
			$('#Question_e_54').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_e").value;
			commentaire=document.getElementById("commentaire_Question_e9").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_e_9").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_e_9").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_e_9").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_e/php/detect_objectif_exist_e.php',
				data:{mission_id:mission_id, question_id:54, cycle_achat_id:5},
				success:function(e){
					objectif_id=e;

					// se rediriger vers calcul score
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achat_e/php/select_score_e.php',
						data:{mission_id:mission_id},
						success:function(e){
						    $("#echo_score_e").html(e);
						}			
					});

					if(objectif_id==0){					
						enregistrer_commentaire_e(commentaire, qcm, mission_id, 54);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_e/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:54, mission_id:mission_id, cycleId:5},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleAchat/cycle_achat_e/load/load_rep_e.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#Interface_Question_e').hide();
										$('#frm_tab_res_e').html(e).show();
										$('#dv_table_e').show();
									}
								});
							}
						});
					}
				}
			});
			$('#Question_e_54').fadeOut(500);
			$('#lb_veuillez_aff_e').hide();
			$('#message_Terminer_question_e').show();
		}

	});
	$('#int_e_Question_Precedent_9').click(function(){
		$('#Question_e_54').fadeOut(500);
		$('#Question_e_53').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_e_9').click(function(){
		$('#message_fermeture_question_e9').show();
		$('#Question_e_54').hide();
	});
});
</script>
<div id="int_Question_e_9">
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">5.Pour les charges spécifiques (publicité, honoraires...) la comptabilité a-t-elle les moyens :<br />b)	au contrôle du bien-fondé des montants concernés ?</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_e_9" name="rad_Question_e9" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_e_9" name="rad_Question_e9" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_e_9" name="rad_Question_e9" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_e9" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_e_Question_Precedent_9"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_e_9_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_e"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_e_9" /></div>