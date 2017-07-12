<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_imd3').click(function(){	
	if((document.getElementById("commentaire_Question_imd3").value=="") || (document.getElementById("rad_Question_Oui_imd_3").checked==false && document.getElementById("rad_Question_NA_imd_3").checked==false && document.getElementById("rad_Question_Non_imd_3").checked==false)){
			$('#mess_quest_vide_imd3').show();
			$('#message_fermeture_question_imd3').hide();
			$('#Question_imd_108').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_imd").value;
			commentaire=document.getElementById("commentaire_Question_imd3").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_imd_3").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_imd_3").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_imd_3").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleImmo/Immod/php/detect_objectif_exist_imd.php',
				data:{mission_id:mission_id, question_id:108, cycle_achat_id:9},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_imd(commentaire, qcm, mission_id, 108);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleImmo/Immod/php/update_object_imd.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:108},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleImmo/Immod/load/load_rep_imd.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_imd').hide();
										$('#message_fermeture_question_imd3').hide();
										$('#contimd').hide();
										$('#contRsciImmo').show();
										openButtObjimd();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	$('#valider_Fermeture_Question_imd3').click(function(){
		$('#message_fermeture_question_imd3').hide();
		$('#fancybox_imd').hide();
		openButtObjimd();
	});
});

</script>

<div id="message_enreg_imd3">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_imd3" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_imd3" />
		</td>
	</tr>
</table>
</div>