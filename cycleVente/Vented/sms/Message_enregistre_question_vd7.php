<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_vd7').click(function(){	
	if((document.getElementById("commentaire_Question_vd7").value=="") || (document.getElementById("rad_Question_Oui_vd_7").checked==false && document.getElementById("rad_Question_NA_vd_7").checked==false && document.getElementById("rad_Question_Non_vd_7").checked==false)){
			$('#mess_quest_vide_vd7').show();
			$('#message_fermeture_question_vd7').hide();
			$('#Question_vd_357').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_vd").value;
			commentaire=document.getElementById("commentaire_Question_vd7").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_vd_7").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_vd_7").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_vd_7").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Vented/php/detect_objectif_exist_vd.php',
				data:{mission_id:mission_id, question_id:357, cycle_achat_id:28},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_vd(commentaire, qcm, mission_id, 357);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Vented/php/update_object_vd.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:357},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleVente/Vented/load/load_rep_vd.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_vd').hide();
										$('#message_fermeture_question_vd7').hide();
										$('#contvd').hide();
										$('#contRsciVente').show();
										openButtObjvd();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	$('#valider_Fermeture_Question_vd7').click(function(){
		$('#message_fermeture_question_vd7').hide();
		$('#fancybox_vd').hide();
		openButtObjvd();
	});
});

</script>

<div id="message_enreg_vd7">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_vd7" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_vd7" />
		</td>
	</tr>
</table>
</div>