<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=412 AND CYCLE_ACHAT_ID=31 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_ev_8_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_ev8").value=="" && document.getElementById("rad_Question_Non_ev_8").checked== true) || (document.getElementById("rad_Question_Oui_ev_8").checked==false && document.getElementById("rad_Question_NA_ev_8").checked==false && document.getElementById("rad_Question_Non_ev_8").checked==false)){
			$('#mess_quest_vide_ev8').show();
			$('#Question_ev_412').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_ev").value;
			commentaire=document.getElementById("commentaire_Question_ev8").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_ev_8").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_ev_8").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_ev_8").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleEnvironnement/EnvQuest/php/detect_objectif_exist_ev.php',
				data:{mission_id:mission_id, question_id:412, cycle_achat_id:31},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_ev(commentaire, qcm, mission_id, 412);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleEnvironnement/EnvQuest/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:412, mission_id:mission_id, cycleId:31},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("ev_9","ev9");
								$.ajax({
									type:'POST',
									url:'cycleEnvironnement/EnvQuest/load/load_rep_ev.php',
									data:{mission_id:mission_id},
									success:function(e){	
										$('#Interface_Question_ev').hide();
										$('#frm_tab_res_ev').html(e).show();
										$('#dv_table_ev').show();
									}
								});	
							}
						});
					}
				}
			});

			$('#Question_ev_412').fadeOut(500);
			$('#Question_ev_413').fadeIn(500);
			$('#lb_veuillez_aff_ev').hide();
		}

	});
	$('#int_ev_Question_Precedent_8').click(function(){
		$('#Question_ev_412').fadeOut(500);
		$('#Question_ev_411').fadeIn(500);
	});

	//Fermeture du question num 11
	$('#fermer_Question_ev_8').click(function(){
		$('#message_fermeture_question_ev8').show();
		$('#Question_ev_412').hide();
	});
});
</script>
<div id="int_Question_ev_8">
	<table width="500" id="t_ev_8">
		<tr style="height:10px">
			<td class="label_Question" align="center">8.Le personnel comptable, et de façon plus générale, le personnel de la société,  a-t-il une formation appropriée ?
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_ev_8" name="rad_Question_ev8" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_ev_8" name="rad_Question_ev8" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_ev_8" name="rad_Question_ev8" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_ev8" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_ev_Question_Precedent_8"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_ev_8_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_ev"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_ev_8" /></div>