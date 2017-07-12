<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_vc4').click(function(){	
	if((document.getElementById("commentaire_Question_vc4").value=="") || (document.getElementById("rad_Question_Oui_vc_4").checked==false && document.getElementById("rad_Question_NA_vc_4").checked==false && document.getElementById("rad_Question_Non_vc_4").checked==false)){
			$('#mess_quest_vide_vc4').show();
			$('#message_fermeture_question_vc4').hide();
			$('#Question_vc_338').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_vc").value;
			commentaire=document.getElementById("commentaire_Question_vc4").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_vc_4").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_vc_4").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_vc_4").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Ventec/php/detect_objectif_exist_vc.php',
				data:{mission_id:mission_id, question_id:338, cycle_achat_id:27},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_f(commentaire, qcm, mission_id, 338);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventec/php/update_object_vc.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:338},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleVente/Ventec/load/load_rep_vc.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_vc').hide();
										$('#message_fermeture_question_vc4').hide();
										$('#contvc').hide();
										$('#contRsciVente').show();
										openButtObjvc();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	$('#valider_Fermeture_Question_vc4').click(function(){
		$('#message_fermeture_question_vc4').hide();
		$('#fancybox_vc').hide();
		openButtObjvc();
	});
});

</script>

<div id="message_enreg_vc4">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_vc4" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_vc4" />
		</td>
	</tr>
</table>
</div>