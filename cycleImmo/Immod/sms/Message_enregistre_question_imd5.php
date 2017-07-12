<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_imd5').click(function(){	
	if((document.getElementById("commentaire_Question_imd5").value=="") || (document.getElementById("rad_Question_Oui_imd_5").checked==false && document.getElementById("rad_Question_NA_imd_5").checked==false && document.getElementById("rad_Question_Non_imd_5").checked==false)){
			$('#mess_quest_vide_imd5').show();
			$('#message_fermeture_question_imd5').hide();
			$('#Question_imd_110').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_imd").value;
			commentaire=document.getElementById("commentaire_Question_imd5").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_imd_5").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_imd_5").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_imd_5").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleImmo/Immod/php/detect_objectif_exist_imd.php',
				data:{mission_id:mission_id, question_id:110, cycle_achat_id:9},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_f(commentaire, qcm, mission_id, 110);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleImmo/Immod/php/update_object_imd.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:110},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleImmo/Immod/load/load_rep_imd.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_imd').hide();
										$('#message_fermeture_question_imd5').hide();
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
	$('#valider_Fermeture_Question_imd5').click(function(){
		$('#message_fermeture_question_imd5').hide();
		$('#fancybox_imd').hide();
		openButtObjimd();
	});
});

</script>

<div id="message_enreg_imd5">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_imd5" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_imd5" />
		</td>
	</tr>
</table>
</div>