<?php

include '../../../connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=45 AND CYCLE_ACHAT_ID=4 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_d_12_Bouton').click(function(){
		//tinay editer
		//if((document.getElementById("commentaire_Question_d12").value=="") || (document.getElementById("rad_Question_Oui_d_12").checked==false && document.getElementById("rad_Question_NA_d_12").checked==false && document.getElementById("rad_Question_Non_d_12").checked==false)){
		if((document.getElementById("commentaire_Question_d12").value=="" && document.getElementById("rad_Question_Non_d_12").checked== true) || (document.getElementById("rad_Question_Oui_d_12").checked==false && document.getElementById("rad_Question_NA_d_12").checked==false && document.getElementById("rad_Question_Non_d_12").checked==false)){			
			$('#mess_quest_vide_d12').show();
			$('#Question_d_45').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_d").value;
			commentaire=document.getElementById("commentaire_Question_d12").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_d_12").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_d_12").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_d_12").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_d/php/detect_objectif_exist_d.php',
				data:{mission_id:mission_id, question_id:45, cycle_achat_id:4},
				success:function(e){
					objectif_id=e;

					// se rediriger vers calcul score
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achat_d/php/select_score_d.php',
						data:{mission_id:mission_id},
						success:function(e){
						    $("#echo_score_d").html(e);
						}			
					});

					if(objectif_id==0){					
						enregistrer_commentaire_d(commentaire, qcm, mission_id, 45);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_d/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:45, mission_id:mission_id, cycleId:4},
							success:function(e){
								$.ajax({
									type:'POST',
									url:'cycleAchat/cycle_achat_d/load/load_rep_d.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#Interface_Question_d').hide();
										$('#frm_tab_res_d').html(e).show();
										$('#dv_table_d').show();
									}
								});
							}
						});
					}
				}
			});

			$('#Question_d_45').fadeOut(500);
			$('#lb_veuillez_aff_d').hide();
			$('#message_Terminer_question_d').show();
		}

	});
	$('#int_d_Question_Precedent_12').click(function(){
		$('#Question_d_45').fadeOut(500);
		$('#Question_d_44').fadeIn(500);
	});
	//Fermeture du question num 12
	$('#fermer_Question_d_12').click(function(){
		$('#message_fermeture_question_d12').show();
		$('#Question_d_45').hide();
	});
});
</script>
<div id="int_Question_d_12">
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">5.Les bons de commande non honorés sont-ils :<br />b)	totalisés ?
</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_d_12" name="rad_Question_d12" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_d_12" name="rad_Question_d12" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_d_12" name="rad_Question_d12" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_d12" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_d_Question_Precedent_12"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_d_12_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_d"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_d_12" /></div>