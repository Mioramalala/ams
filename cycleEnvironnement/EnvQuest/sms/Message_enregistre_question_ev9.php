<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_ev9').click(function(){	
	if((document.getElementById("commentaire_Question_ev9").value=="" && document.getElementById("rad_Question_Non_f_9").checked== true) || (document.getElementById("rad_Question_Oui_ev_9").checked==false  && document.getElementById("rad_Question_Non_f_9").checked==false)){
			$('#mess_quest_vide_ev9').show();
			$('#message_fermeture_question_ev9').hide();
			$('#Question_ev_413').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_ev").value;
			commentaire=document.getElementById("commentaire_Question_ev9").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_ev_9").checked==true){
				qcm="OUI";
			}
			// else if(document.getElementById("rad_Question_NA_ev_9").checked==true){
			// 	qcm="N/A";
			// }
			else if(document.getElementById("rad_Question_Non_ev_9").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleEnvironnement/EnvQuest/php/detect_objectif_exist_ev.php',
				data:{mission_id:mission_id, question_id:413, cycle_achat_id:31},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_ev(commentaire, qcm, mission_id, 413);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleEnvironnement/EnvQuest/php/update_object_ev.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:413},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleEnvironnement/EnvQuest/load/load_rep_ev.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_ev').hide();
										$('#message_fermeture_question_ev9').hide();
										$('#contev').hide();
										$('#contRsciEnvironnement').show();
										openButtObjev();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	$('#valider_Fermeture_Question_ev9').click(function(){
		$('#message_fermeture_question_ev9').hide();
		$('#fancybox_ev').hide();
		openButtObjev();
	});
});

</script>

<div id="message_enreg_ev9">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_ev9" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_ev9" />
		</td>
	</tr>
</table>
</div>