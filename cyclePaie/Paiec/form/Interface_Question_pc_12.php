<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=207 AND CYCLE_ACHAT_ID=15 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_pc_12_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_pc12").value=="" && document.getElementById("rad_Question_Non_pc_12").checked== true) || (document.getElementById("rad_Question_Oui_pc_12").checked==false && document.getElementById("rad_Question_NA_pc_12").checked==false && document.getElementById("rad_Question_Non_pc_12").checked==false)){
			$('#mess_quest_vide_pc12').show();
			$('#Question_pc_207').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_pc").value;
			commentaire=document.getElementById("commentaire_Question_pc12").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_pc_12").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_pc_12").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_pc_12").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paiec/php/detect_objectif_exist_pc.php',
				data:{mission_id:mission_id, question_id:207, cycle_achat_id:15},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_pc(commentaire, qcm, mission_id, 207);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paiec/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:207, mission_id:mission_id, cycleId:15},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("pc_13","pc13");
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
						});					}
				}
			});
			$('#Question_pc_207').fadeOut(500);
			$('#Question_pc_208').fadeIn(500);
			$('#lb_veuillez_aff_pc').hide();
		}

	});
	$('#int_pc_Question_Precedent_12').click(function(){
		$('#Question_pc_207').fadeOut(500);
		$('#Question_pc_206').fadeIn(500);
	});
	//Fermeture du question num 12
	$('#fermer_Question_pc_12').click(function(){
		$('#message_fermeture_question_pc12').show();
		$('#Question_pc_207').hide();
	});
});
</script>
<div id="int_Question_pc_12">
	<table width="500" id="t_pc_12">
		<tr style="height:10px">
			<td class="label_Question" align="center">3.Les données permanentes du fichier informatique paie sont-elles régulièrement rapprochées du fichier individuel ?
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_pc_12" name="rad_Question_pc12" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_pc_12" name="rad_Question_pc12" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_pc_12" name="rad_Question_pc12" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_pc12" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_pc_Question_Precedent_12"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_pc_12_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_pc"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_pc_12" /></div>