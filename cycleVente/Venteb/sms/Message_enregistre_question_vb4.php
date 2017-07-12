<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_vb4').click(function(){	
	if((document.getElementById("commentaire_Question_vb4").value=="") || (document.getElementById("rad_Question_Oui_vb_4").checked==false && document.getElementById("rad_Question_NA_vb_4").checked==false && document.getElementById("rad_Question_Non_vb_4").checked==false)){
			$('#mess_quest_vide_vb4').show();
			$('#message_fermeture_question_vb4').hide();
			$('#Question_vb_321').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_vb").value;
			commentaire=document.getElementById("commentaire_Question_vb4").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_vb_4").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_vb_4").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_vb_4").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Venteb/php/detect_objectif_exist_vb.php',
				data:{mission_id:mission_id, question_id:321, cycle_achat_id:26},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_f(commentaire, qcm, mission_id, 321);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Venteb/php/update_object_vb.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:321},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleVente/Venteb/load/load_rep_vb.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_vb').hide();
										$('#message_fermeture_question_vb4').hide();
										$('#contvb').hide();
										$('#contRsciVente').show();
										openButtObjvb();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	$('#valider_Fermeture_Question_vb4').click(function(){
		$('#message_fermeture_question_vb4').hide();
		$('#fancybox_vb').hide();
		openButtObjvb();
	});
});

</script>

<div id="message_enreg_vb4">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_vb4" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_vb4" />
		</td>
	</tr>
</table>
</div>