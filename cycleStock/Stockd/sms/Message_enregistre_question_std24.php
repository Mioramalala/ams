<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_std24').click(function(){	
	if((document.getElementById("commentaire_Question_std24").value=="") || (document.getElementById("rad_Question_Oui_std_24").checked==false && document.getElementById("rad_Question_NA_std_24").checked==false && document.getElementById("rad_Question_Non_std_24").checked==false)){
			$('#mess_quest_vide_std24').show();
			$('#message_fermeture_question_std24').hide();
			$('#Question_std_175').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_std").value;
			commentaire=document.getElementById("commentaire_Question_std24").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_std_24").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_std_24").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_std_24").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleStock/Stockd/php/detect_objectif_exist_std.php',
				data:{mission_id:mission_id, question_id:175, cycle_achat_id:13},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_std(commentaire, qcm, mission_id, 175);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockd/php/update_object_std.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:175},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleStock/Stockd/load/load_rep_std.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_std').hide();
										$('#message_fermeture_question_std24').hide();
										$('#contstd').hide();
										$('#contRsciStock').show();
										openButtObjstd();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	$('#valider_Fermeture_Question_std24').click(function(){
		$('#message_fermeture_question_std24').hide();
		$('#fancybox_std').hide();
		openButtObjstd();
	});
});

</script>

<div id="message_enreg_std24">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_std24" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_std24" />
		</td>
	</tr>
</table>
</div>