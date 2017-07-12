<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=320 AND CYCLE_ACHAT_ID=26 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_vb_3_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_vb3").value=="" && document.getElementById("rad_Question_Non_vb_3").checked== true) || (document.getElementById("rad_Question_Oui_vb_3").checked==false && document.getElementById("rad_Question_NA_vb_3").checked==false && document.getElementById("rad_Question_Non_vb_3").checked==false)){
			$('#mess_quest_vide_vb3').show();
			$('#Question_vb_320').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_vb").value;
			commentaire=document.getElementById("commentaire_Question_vb3").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_vb_3").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_vb_3").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_vb_3").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Venteb/php/detect_objectif_exist_vb.php',
				data:{mission_id:mission_id, question_id:320, cycle_achat_id:26},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_vb(commentaire, qcm, mission_id, 320);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Venteb/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:320, mission_id:mission_id, cycleId:26},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("vb_4","vb4");
								$.ajax({
									type:'POST',
									url:'cycleVente/Venteb/load/load_rep_vb.php',
									data:{mission_id:mission_id},
									success:function(e){	
										$('#Interface_Question_vb').hide();
										$('#frm_tab_res_vb').html(e).show();
										$('#dv_table_vb').show();
									}
								});	
							}
						});
					}
				}
			});

			$('#Question_vb_320').fadeOut(500);
			$('#Question_vb_321').fadeIn(500);
			$('#lb_veuillez_aff_vb').hide();
		}

	});
	$('#int_vb_Question_Precedent_3').click(function(){
		$('#Question_vb_320').fadeOut(500);
		$('#Question_vb_319').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_vb_3').click(function(){
		$('#message_fermeture_question_vb3').show();
		$('#Question_vb_320').hide();
	});
});
</script>
<div id="int_Question_vb_3">
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">2.Les bons d'expédition sont-ils :<br/>a)	établis sur des formulaires standard ?
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_vb_3" name="rad_Question_vb3" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_vb_3" name="rad_Question_vb3" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_vb_3" name="rad_Question_vb3" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_vb3" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_vb_Question_Precedent_3"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_vb_3_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_vb"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_vb_3" /></div>