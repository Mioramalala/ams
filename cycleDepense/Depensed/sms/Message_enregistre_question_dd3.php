<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_dd3').click(function(){	
	if((document.getElementById("commentaire_Question_dd3").value=="" && document.getElementById("rad_Question_Non_dd_3").checked== true) || (document.getElementById("rad_Question_Oui_dd_3").checked==false && document.getElementById("rad_Question_NA_dd_3").checked==false && document.getElementById("rad_Question_Non_dd_3").checked==false)){
			$('#mess_quest_vide_dd3').show();
			$('#message_fermeture_question_dd3').hide();
			$('#Question_dd_306').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_dd").value;
			commentaire=document.getElementById("commentaire_Question_dd3").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_dd_3").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_dd_3").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_dd_3").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleDepense/Depensed/php/detect_objectif_exist_dd.php',
				data:{mission_id:mission_id, question_id:306, cycle_achat_id:24},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_dd(commentaire, qcm, mission_id, 306);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depensed/php/update_object_dd.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:306},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleDepense/Depensed/load/load_rep_dd.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_dd').hide();
										$('#message_fermeture_question_dd3').hide();
										$('#contdd').hide();
										$('#contRsciDepense').show();
										openButtObjdd();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	$('#valider_Fermeture_Question_dd3').click(function(){
		$('#message_fermeture_question_dd3').hide();
		$('#fancybox_dd').hide();
		openButtObjdd();
	});
});

</script>

<div id="message_enreg_dd3">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_dd3" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_dd3" />
		</td>
	</tr>
</table>
</div>