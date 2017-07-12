
<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_vf11').click(function(){
if((document.getElementById("commentaire_Question_vf11").value=="") || (document.getElementById("rad_Question_Oui_vf_11").checked==false && document.getElementById("rad_Question_NA_vf_11").checked==false && document.getElementById("rad_Question_Non_vf_11").checked==false)){
			$('#mess_quest_vide_vf11').show();
			$('#Question_vf_403').hide();
			$('#message_fermeture_question_vf11').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_vf").value;
			commentaire=document.getElementById("commentaire_Question_vf11").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_vf_11").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_vf_11").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_vf_11").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Ventef/php/detect_objectif_exist_vf.php',
				data:{mission_id:mission_id, question_id:403, cycle_achat_id:30},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_vf(commentaire, qcm, mission_id, 403);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventef/php/update_object_vf.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:403},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleVente/Ventef/load/load_rep_vf.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_vf').hide();
										$('#message_fermeture_question_vf11').hide();
										$('#contvf').hide();
										$('#contRsciVente').show();
										openButtObjvf();
									}
								});
							}
						});
					}
				}
			});
		}	
	});
	$('#valider_Fermeture_Question_vf11').click(function(){
		$('#message_fermeture_question_vf11').hide();
		$('#fancybox_vf').hide();
		openButtObjvf();
	});
});

</script>

<div id="message_enreg_vf11">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_vf11" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_vf11" />
		</td>
	</tr>
</table>
</div>