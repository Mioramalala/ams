<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_e2').click(function(){	
	if((document.getElementById("commentaire_Question_e2").value=="") || (document.getElementById("rad_Question_Oui_e_2").checked==false && document.getElementById("rad_Question_NA_e_2").checked==false && document.getElementById("rad_Question_Non_e_2").checked==false)){
			$('#mess_quest_vide_e2').show();
			$('#Question_e_47').hide();
			$('#message_fermeture_question_e2').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_e").value;
			commentaire=document.getElementById("commentaire_Question_e2").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_e_2").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_e_2").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_e_2").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_e/php/detect_objectif_exist_e.php',
				data:{mission_id:mission_id, question_id:47, cycle_achat_id:5},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_e(commentaire, qcm, mission_id, 47);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_e/php/update_achat_object_e.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:47},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleAchat/cycle_achat_e/load/load_rep_e.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_e').hide();
										$('#message_fermeture_question_e2').hide();
										$('#dv_cont_obj_e').hide();
										$('#contenue_rsci').show();
										openButtObje();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	$('#valider_Fermeture_Question_e2').click(function(){
		$('#message_fermeture_question_e2').hide();
		$('#fancybox_e').hide();
		openButtObje();
	});
});

</script>

<div id="message_enreg_e2">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_e2" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_e2" />
		</td>
	</tr>
</table>
</div>