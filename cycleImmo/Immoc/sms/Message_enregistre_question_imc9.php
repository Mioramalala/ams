<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_imc9').click(function(){	
	if((document.getElementById("commentaire_Question_imc9").value=="") || (document.getElementById("rad_Question_Oui_imc_9").checked==false && document.getElementById("rad_Question_NA_imc_9").checked==false && document.getElementById("rad_Question_Non_f_9").checked==false)){
			$('#mess_quest_vide_imc9').show();
			$('#message_fermeture_question_imc9').hide();
			$('#Question_imc_101').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_imc").value;
			commentaire=document.getElementById("commentaire_Question_imc9").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_imc_9").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_imc_9").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_imc_9").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleImmo/Immoc/php/detect_objectif_exist_imc.php',
				data:{mission_id:mission_id, question_id:101, cycle_achat_id:8},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_f(commentaire, qcm, mission_id, 101);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleImmo/Immoc/php/update_object_imc.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:101},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleImmo/Immoc/load/load_rep_imc.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_imc').hide();
										$('#message_fermeture_question_imc9').hide();
										$('#contimc').hide();
										$('#contRsciImmo').show();
										openButtObjimc();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	$('#valider_Fermeture_Question_imc9').click(function(){
		$('#message_fermeture_question_imc9').hide();
		$('#fancybox_imc').hide();
		openButtObjimc();
	});
});

</script>

<div id="message_enreg_imc9">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_imc9" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_imc9" />
		</td>
	</tr>
</table>
</div>