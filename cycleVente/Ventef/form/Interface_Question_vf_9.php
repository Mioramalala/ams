
<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=401 AND CYCLE_ACHAT_ID=30 AND MISSION_ID="'.$mission_id .'"');

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_vf_9_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_vf9").value=="" && document.getElementById("rad_Question_Non_vf_9").checked== true) || (document.getElementById("rad_Question_Oui_vf_9").checked==false && document.getElementById("rad_Question_NA_vf_9").checked==false && document.getElementById("rad_Question_Non_vf_9").checked==false)){
			$('#mess_quest_vide_vf9').show();
			$('#Question_vf_401').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_vf").value;
			commentaire=document.getElementById("commentaire_Question_vf9").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_vf_9").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_vf_9").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_vf_9").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Ventef/php/detect_objectif_exist_vf.php',
				data:{mission_id:mission_id, question_id:401, cycle_achat_id:30},
				success:function(e){
					objectif_id=e;

					// se rediriger vers calcul score
					$.ajax({
						type:'POST',
						url:'cycleVente/Ventef/php/select_score_vf.php',
						data:{mission_id:mission_id},
						success:function(e){
						    $("#echo_score_vf").html(e);
						}			
					});

					if(objectif_id==0){					
						enregistrer_commentaire_vf(commentaire, qcm, mission_id, 401);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventef/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:401, mission_id:mission_id, cycleId:30},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("vf_10","vf10");
								$.ajax({
									type:'POST',
									url:'cycleVente/Ventef/load/load_rep_vf.php',
									data:{mission_id:mission_id},
									success:function(e){	
										$('#Interface_Question_vf').hide();
										$('#frm_tab_res_vf').html(e).show();
										$('#dv_table_vf').show();
									}
								});	
							}
						});
					}
				}
			});

			$('#Question_vf_401').fadeOut(500);
			$('#Question_vf_402').fadeIn(500);
			$('#lb_veuillez_aff_vf').hide();
		}

	});
	$('#int_vf_Question_Precedent_9').click(function(){
		$('#Question_vf_401').fadeOut(500);
		$('#Question_vf_400').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_vf_9').click(function(){
		$('#message_fermeture_question_vf9').show();
		$('#Question_vf_401').hide();
	});
});
</script>
<div id="int_Question_vf_9">
	<table width="500" id="t_vf_9">
		<tr style="height:10px">
			<td class="label_Question" align="center">7.La totalisation des journaux et balances est-elle vérifiée ?  <?php echo $qcm; ?></td>

		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_vf_9" name="rad_Question_vf9" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_vf_9" name="rad_Question_vf9" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_vf_9" name="rad_Question_vf9" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_vf9" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_vf_Question_Precedent_9"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_vf_9_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_vf"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_vf_9" /></div>