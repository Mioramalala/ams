<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_pc7').click(function(){	
	if((document.getElementById("commentaire_Question_pc7").value=="") || (document.getElementById("rad_Question_Oui_pc_7").checked==false && document.getElementById("rad_Question_NA_pc_7").checked==false && document.getElementById("rad_Question_Non_pc_7").checked==false)){
			$('#mess_quest_vide_pc7').show();
			$('#message_fermeture_question_pc7').hide();
			//$('#Question_pc_202').hide();
				$('#interface_pc').hide();
			$('#contRsciPaie').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_pc").value;
			commentaire=document.getElementById("commentaire_Question_pc7").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_pc_7").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_pc_7").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_pc_7").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paiec/php/detect_objectif_exist_pc.php',
				data:{mission_id:mission_id, question_id:202, cycle_achat_id:15},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_pc(commentaire, qcm, mission_id, 202);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paiec/php/update_object_pc.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:202},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cyclePaie/Paiec/load/load_rep_pc.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_pc').hide();
										$('#message_fermeture_question_pc7').hide();
										$('#contpc').hide();
										$('#contRsciPaie').show();
										openButtObjpc();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	$('#valider_Fermeture_Question_pc7').click(function(){
		$('#message_fermeture_question_pc7').hide();
		$('#fancybox_pc').hide();
		openButtObjpc();
	});
});

</script>

<div id="message_enreg_pc7">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_pc7" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_pc7" />
		</td>
	</tr>
</table>
</div>