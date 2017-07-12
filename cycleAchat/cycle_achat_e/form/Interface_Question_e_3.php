<?php

include '../../../connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=48 AND CYCLE_ACHAT_ID=5 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_e_3_Bouton').click(function(){
		//tinay editer
		//if((document.getElementById("commentaire_Question_e3").value=="") || (document.getElementById("rad_Question_Oui_e_3").checked==false && document.getElementById("rad_Question_NA_e_3").checked==false && document.getElementById("rad_Question_Non_e_3").checked==false)){
		if((document.getElementById("commentaire_Question_e3").value==""  && document.getElementById("rad_Question_Non_e_3").checked== true) || (document.getElementById("rad_Question_Oui_e_3").checked==false && document.getElementById("rad_Question_NA_e_3").checked==false && document.getElementById("rad_Question_Non_e_3").checked==false)){
			$('#mess_quest_vide_e3').show();
			$('#Question_e_48').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_e").value;
			commentaire=document.getElementById("commentaire_Question_e3").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_e_3").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_e_3").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_e_3").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_e/php/detect_objectif_exist_e.php',
				data:{mission_id:mission_id, question_id:48, cycle_achat_id:5},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_e(commentaire, qcm, mission_id, 48);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_e/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:48, mission_id:mission_id, cycleId:5},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split('*');
								afficheReponseQuestace("e_4","e4");
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

			$('#Question_e_48').fadeOut(500);
			$('#Question_e_49').fadeIn(500);
			$('#lb_veuillez_aff_e').hide();
		}

	});
	$('#int_e_Question_Precedent_3').click(function(){
		$('#Question_e_48').fadeOut(500);
		$('#Question_e_47').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_e_3').click(function(){
		$('#message_fermeture_question_e3').show();
		$('#Question_e_48').hide();
	});
});
</script>
<div id="int_Question_e_3">
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">1.En fin de période, la comptabilité utilise-t-elle pour évaluer les provisions pour factures et avoirs à recevoir :<br />c)	la liste des factures connexes (frais de transport) ?</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_e_3" name="rad_Question_e3" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_e_3" name="rad_Question_e3" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_e_3" name="rad_Question_e3" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_e3" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_e_Question_Precedent_3"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_e_3_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_e"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_e_3" /></div>