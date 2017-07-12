<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_rc4').click(function(){	
	if((document.getElementById("commentaire_Question_rc4").value=="" && document.getElementById("rad_Question_Non_rc_4").checked== true) || (document.getElementById("rad_Question_Oui_rc_4").checked==false && document.getElementById("rad_Question_NA_rc_4").checked==false && document.getElementById("rad_Question_Non_rc_4").checked==false)){
			$('#mess_quest_vide_rc4').show();
			$('#message_fermeture_question_rc4').hide();
			$('#Question_rc_258').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_rc").value;
			commentaire=document.getElementById("commentaire_Question_rc4").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_rc_4").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_rc_4").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_rc_4").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recettec/php/detect_objectif_exist_rc.php',
				data:{mission_id:mission_id, question_id:258, cycle_achat_id:19},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_f(commentaire, qcm, mission_id, 258);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recettec/php/update_object_rc.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:258},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleRecette/Recettec/load/load_rep_rc.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_rc').hide();
										$('#message_fermeture_question_rc4').hide();
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
	$('#valider_Fermeture_Question_rc4').click(function(){
		$('#message_fermeture_question_rc4').hide();
		$('#fancybox_rc').hide();
		openButtObjrc();
	});
});

</script>

<div id="message_enreg_rc4">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_rc4" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_rc4" />
		</td>
	</tr>
</table>
</div>