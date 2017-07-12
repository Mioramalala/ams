<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_dc4').click(function(){	
	if((document.getElementById("commentaire_Question_dc4").value=="" && document.getElementById("rad_Question_Non_dc_4").checked== true) || (document.getElementById("rad_Question_Oui_dc_4").checked==false && document.getElementById("rad_Question_NA_dc_4").checked==false && document.getElementById("rad_Question_Non_dc_4").checked==false)){
			$('#mess_quest_vide_dc4').show();
			$('#message_fermeture_question_dc4').hide();
			$('#Question_dc_298').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_dc").value;
			commentaire=document.getElementById("commentaire_Question_dc4").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_dc_4").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_dc_4").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_dc_4").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleDepense/Depensec/php/detect_objectif_exist_dc.php',
				data:{mission_id:mission_id, question_id:298, cycle_achat_id:23},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_dc(commentaire, qcm, mission_id, 298);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depensec/php/update_object_dc.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:298},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleDepense/Depensec/load/load_rep_dc.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_dc').hide();
										$('#message_fermeture_question_dc4').hide();
										$('#contdc').hide();
										$('#contRsciDepense').show();
										openButtObjdc();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	$('#valider_Fermeture_Question_dc4').click(function(){
		$('#message_fermeture_question_dc4').hide();
		$('#fancybox_dc').hide();
		openButtObjdc();
	});
});

</script>

<div id="message_enreg_dc4">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_dc4" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_dc4" />
		</td>
	</tr>
</table>
</div>