
<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_rc2').click(function(){	
	if((document.getElementById("commentaire_Question_rc2").value=="" && document.getElementById("rad_Question_Non_rc_2").checked== true) || (document.getElementById("rad_Question_Oui_rc_2").checked==false && document.getElementById("rad_Question_NA_rc_2").checked==false && document.getElementById("rad_Question_Non_rc_2").checked==false)){
			$('#mess_quest_vide_rc2').show();
			$('#Question_rc_256').hide();
			$('#message_fermeture_question_rc2').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_rc").value;
			commentaire=document.getElementById("commentaire_Question_rc2").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_rc_2").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_rc_2").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_rc_2").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recettec/php/detect_objectif_exist_rc.php',
				data:{mission_id:mission_id, question_id:256, cycle_achat_id:19},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_rc(commentaire, qcm, mission_id, 256);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recettec/php/update_object_rc.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:256},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleRecette/Recettec/load/load_rep_rc.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_rc').hide();
										$('#message_fermeture_question_rc2').hide();
										$('#contrc').hide();
										$('#contRsciRecette').show();
										openButtObjrc();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	$('#valider_Fermeture_Question_rc2').click(function(){
		$('#message_fermeture_question_rc2').hide();
		$('#fancybox_rc').hide();
		openButtObjrc();
	});
});

</script>

<div id="message_enreg_rc2">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_rc2" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_rc2" />
		</td>
	</tr>
</table>
</div>