<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=352 AND CYCLE_ACHAT_ID=28 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_vd_2_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_vd2").value=="" && document.getElementById("rad_Question_Non_vd_2").checked== true) || (document.getElementById("rad_Question_Oui_vd_2").checked==false && document.getElementById("rad_Question_NA_vd_2").checked==false && document.getElementById("rad_Question_Non_vd_2").checked==false)){
			$('#mess_quest_vide_vd2').show();
			$('#Question_vd_352').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_vd").value;
			commentaire=document.getElementById("commentaire_Question_vd2").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_vd_2").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_vd_2").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_vd_2").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Vented/php/detect_objectif_exist_vd.php',
				data:{mission_id:mission_id, question_id:352, cycle_achat_id:28},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_vd(commentaire, qcm, mission_id, 352);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Vented/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:352, mission_id:mission_id, cycleId:28},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("vd_3","vd3");
								$.ajax({
									type:'POST',
									url:'cycleVente/Vented/load/load_rep_vd.php',
									data:{mission_id:mission_id},
									success:function(e){	
										$('#Interface_Question_vd').hide();
										$('#frm_tab_res_vd').html(e).show();
										$('#dv_table_vd').show();
									}
								});	
							}
						});

					}
				}
			});

			$('#Question_vd_352').fadeOut(500);
			$('#Question_vd_353').fadeIn(500);
			$('#lb_veuillez_aff_vd').hide();
		}

	});
	
	$('#int_vd_Question_Precedent_2').click(function(){
		$('#Question_vd_352').fadeOut(500);
		$('#Question_vd_351').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_vd_2').click(function(){
		$('#message_fermeture_question_vd2').show();
		$('#Question_vd_352').hide();
	});
});


</script>

<div id="int_Question_vd_2">
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">1.Les tarifs prix sont-ils ?<br/>b)	régulièrement mis à jour ?</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_vd_2" name="rad_Question_vd2" <?php if($qcm=="OUI") echo 'checked'; ?>  />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_vd_2" name="rad_Question_vd2" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_vd_2" name="rad_Question_vd2" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_vd2" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_vd_Question_Precedent_2"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_vd_2_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_vd"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_vd_2" /></div>