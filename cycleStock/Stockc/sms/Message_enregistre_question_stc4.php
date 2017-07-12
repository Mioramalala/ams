<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_stc4').click(function(){	
	if((document.getElementById("commentaire_Question_stc4").value=="") || (document.getElementById("rad_Question_Oui_stc_4").checked==false && document.getElementById("rad_Question_NA_stc_4").checked==false && document.getElementById("rad_Question_Non_stc_4").checked==false)){
			$('#mess_quest_vide_stc4').show();
			$('#message_fermeture_question_stc4').hide();
			$('#Question_stc_138').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_stc").value;
			commentaire=document.getElementById("commentaire_Question_stc4").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_stc_4").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_stc_4").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_stc_4").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleStock/Stockc/php/detect_objectif_exist_stc.php',
				data:{mission_id:mission_id, question_id:138, cycle_achat_id:12},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_stc(commentaire, qcm, mission_id, 138);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockc/php/update_object_stc.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:138},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleStock/Stockc/load/load_rep_stc.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_stc').hide();
										$('#message_fermeture_question_stc4').hide();
										$('#contstc').hide();
										$('#contRsciStock').show();
										openButtObjstc();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	$('#valider_Fermeture_Question_stc4').click(function(){
		$('#message_fermeture_question_stc4').hide();
		$('#fancybox_stc').hide();
		openButtObjstc();
	});
});

</script>

<div id="message_enreg_stc4">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_stc4" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_stc4" />
		</td>
	</tr>
</table>
</div>