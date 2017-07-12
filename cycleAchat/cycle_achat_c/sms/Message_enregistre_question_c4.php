<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_c4').click(function(){	
	if((document.getElementById("commentaire_Question_c4").value=="") || (document.getElementById("rad_Question_Oui_c_4").checked==false && document.getElementById("rad_Question_NA_c_4").checked==false && document.getElementById("rad_Question_Non_c_4").checked==false)){
			$('#mess_quest_vide_c4').show();
			$('#Question_c_26').hide();
			$('#message_fermeture_question_c4').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_c").value;
			commentaire=document.getElementById("commentaire_Question_c4").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_c_4").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_c_4").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_c_4").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_c/php/detect_objectif_exist_c.php',
				data:{mission_id:mission_id, question_id:26, cycle_achat_id:3},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_c(commentaire, qcm, mission_id, 26);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_c/php/update_achat_object_c.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:26},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleAchat/cycle_achat_c/load/load_rep_c.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#Interface_Question_c').hide();
										$('#frm_tab_res_c').html(e).show();
										$('#dv_table_c').show();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	$('#valider_Fermeture_Question_c4').click(function(){
		$('#message_fermeture_question_c4').hide();
		$('#fancybox_c').hide();
		openButtObjc();
	});
});

</script>

<div id="message_enreg_c4">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_c4" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_c4" />
		</td>
	</tr>
</table>
</div>