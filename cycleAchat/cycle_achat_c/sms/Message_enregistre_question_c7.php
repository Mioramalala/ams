<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_c7').click(function(){	
	if((document.getElementById("commentaire_Question_c7").value=="") || (document.getElementById("rad_Question_Oui_c_7").checked==false && document.getElementById("rad_Question_NA_c_7").checked==false && document.getElementById("rad_Question_Non_c_7").checked==false)){
			$('#mess_quest_vide_c7').show();
			$('#Question_c_29').hide();
			$('#message_fermeture_question_c7').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_c").value;
			commentaire=document.getElementById("commentaire_Question_c7").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_c_7").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_c_7").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_c_7").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_c/php/detect_objectif_exist_c.php',
				data:{mission_id:mission_id, question_id:29, cycle_achat_id:3},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_c(commentaire, qcm, mission_id, 29);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_c/php/update_achat_object_c.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:29},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleAchat/cycle_achat_c/load/load_rep_c.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_c').hide();
										$('#message_fermeture_question_c7').hide();
										$('#dv_cont_obj_c').hide();
										$('#contenue_rsci').show();
										openButtObjc();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	$('#valider_Fermeture_Question_c7').click(function(){
		$('#message_fermeture_question_c7').hide();
		$('#fancybox_c').hide();
		openButtObjc();
	});
});

</script>

<div id="message_enreg_c7">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_c7" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_c7" />
		</td>
	</tr>
</table>
</div>