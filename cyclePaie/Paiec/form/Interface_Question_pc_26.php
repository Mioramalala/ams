<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=221 AND CYCLE_ACHAT_ID=15 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_pc_26_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_pc26").value=="" && document.getElementById("rad_Question_Non_pc_26").checked== true) || (document.getElementById("rad_Question_Oui_pc_26").checked==false && document.getElementById("rad_Question_NA_pc_26").checked==false && document.getElementById("rad_Question_Non_pc_26").checked==false)){
			$('#mess_quest_vide_pc26').show();
			$('#Question_pc_220').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_pc").value;
			commentaire=document.getElementById("commentaire_Question_pc26").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_pc_26").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_pc_26").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_pc_26").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paiec/php/detect_objectif_exist_pc.php',
				data:{mission_id:mission_id, question_id:221, cycle_achat_id:15},
				success:function(e){
					objectif_id=e;

					// se rediriger vers calcul score
					$.ajax({
						type:'POST',
						url:'cyclePaie/Paiec/php/select_score_pc.php',
						data:{mission_id:mission_id},
						success:function(e){
						    $("#echo_score_pc").html(e);
						}			
					});

					if(objectif_id==0){					
						enregistrer_commentaire_pc(commentaire, qcm, mission_id, 221);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paiec/php/update_object_pc.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:221},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cyclePaie/Paiec/load/load_rep_pc.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#Interface_Question_pc').hide();
										$('#frm_tab_res_pc').html(e).show();
										$('#dv_table_pc').show();										
									}
								});
							}
						});
					}
				}
			});

			$('#Question_pc_221').fadeOut(500);
			$('#message_Terminer_question_pc').show();
			$('#lb_veuillez_aff_pc').hide();
		}

	});
	$('#int_pc_Question_Precedent_26').click(function(){
		$('#Question_pc_221').fadeOut(500);
		$('#Question_pc_220').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_pc_26').click(function(){
		$('#message_fermeture_question_pc26').show();
		$('#Question_pc_221').hide();
	});
});
</script>
<div id="int_Question_pc_26">
	<table width="500" id="t_pc_26">
		<tr style="height:10px">
			<td class="label_Question" align="center">12.Si des salaires sont payés à des tiers autres que l'employé, exige-t-on une procuration écrite ?
</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_pc_26" name="rad_Question_pc26" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_pc_26" name="rad_Question_pc26" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_pc_26" name="rad_Question_pc26" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_pc26" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_pc_Question_Precedent_26"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Terminer" class="bouton" id="Question_pc_26_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_pc"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_pc_26" /></div>