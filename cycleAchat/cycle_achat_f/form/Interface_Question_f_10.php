<?php

include '../../../connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=64 AND CYCLE_ACHAT_ID=6 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_f_10_Bouton').click(function(){
		//tinay editer
		//if((document.getElementById("commentaire_Question_f10").value=="") || (document.getElementById("rad_Question_Oui_f_10").checked==false && document.getElementById("rad_Question_NA_f_10").checked==false && document.getElementById("rad_Question_Non_f_10").checked==false)){
		if((document.getElementById("commentaire_Question_f10").value=="" && document.getElementById("rad_Question_Non_f_10").checked== true) || (document.getElementById("rad_Question_Oui_f_10").checked==false && document.getElementById("rad_Question_NA_f_10").checked==false && document.getElementById("rad_Question_Non_f_10").checked==false)){
			$('#mess_quest_vide_f10').show();
			$('#Question_f_64').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_f").value;
			commentaire=document.getElementById("commentaire_Question_f10").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_f_10").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_f_10").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_f_10").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_f/php/detect_objectif_exist_f.php',
				data:{mission_id:mission_id, question_id:64, cycle_achat_id:6},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_f(commentaire, qcm, mission_id, 64);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_f/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:64, mission_id:mission_id, cycleId:6},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split('*');
								afficheReponseQuestacf("f_11","f11");
								$.ajax({
									type:'POST',
									url:'cycleAchat/cycle_achat_f/load/load_rep_f.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#Interface_Question_f').hide();
										$('#frm_tab_res_f').html(e).show();
										$('#dv_table_f').show();
									}
								});
							}
						});
					}
				}
			});

			$('#Question_f_64').fadeOut(500);
			$('#Question_f_65').fadeIn(500);
			$('#lb_veuillez_aff_f').hide();
		}

	});
	$('#int_f_Question_Precedent_10').click(function(){
		$('#Question_f_64').fadeOut(500);
		$('#Question_f_63').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_f_10').click(function(){
		$('#message_fermeture_question_f10').show();
		$('#Question_f_64').hide();
	});
});
</script>
<div id="int_Question_f_10">
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">7.Les comptes fournisseurs sont-ils régulièrement lettrés et analysés pour identifier les erreurs d'imputation éventuelles ?</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_f_10" name="rad_Question_f10" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_f_10" name="rad_Question_f10" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_f_10" name="rad_Question_f10" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_f10" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_f_Question_Precedent_10"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_f_10_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_f"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_f_10" /></div>