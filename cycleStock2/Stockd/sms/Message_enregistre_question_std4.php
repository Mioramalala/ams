<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_std4').click(function(){	
	if((document.getElementById("commentaire_Question_std4").value=="") || (document.getElementById("rad_Question_Oui_std_4").checked==false && document.getElementById("rad_Question_NA_std_4").checked==false && document.getElementById("rad_Question_Non_std_4").checked==false)){
			$('#mess_quest_vide_std4').show();
			$('#message_fermeture_question_std4').hide();
			$('#Question_std_155').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_std").value;
			commentaire=document.getElementById("commentaire_Question_std4").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_std_4").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_std_4").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_std_4").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleStock/Stockd/php/detect_objectif_exist_std.php',
				data:{mission_id:mission_id, question_id:155, cycle_achat_id:13},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_std(commentaire, qcm, mission_id, 155);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockd/php/update_object_std.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:155},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleStock/Stockd/load/load_rep_std.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_std').hide();
										$('#message_fermeture_question_std4').hide();
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
	$('#valider_Fermeture_Question_std4').click(function(){
		$('#message_fermeture_question_std4').hide();
		$('#fancybox_std').hide();
		openButtObjstd();
	});
});

</script>

<div id="message_enreg_std4">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_std4" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_std4" />
		</td>
	</tr>
</table>
</div>