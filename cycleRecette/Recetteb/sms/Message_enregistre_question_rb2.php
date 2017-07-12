
<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_rb2').click(function(){	
	if((document.getElementById("commentaire_Question_rb2").value=="" && document.getElementById("rad_Question_Non_rb_2").checked== true) || (document.getElementById("rad_Question_Oui_rb_2").checked==false && document.getElementById("rad_Question_NA_rb_2").checked==false && document.getElementById("rad_Question_Non_rb_2").checked==false)){
			$('#mess_quest_vide_rb2').show();
			$('#Question_rb_236').hide();
			$('#message_fermeture_question_rb2').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_rb").value;
			commentaire=document.getElementById("commentaire_Question_rb2").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_rb_2").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_rb_2").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_rb_2").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recetteb/php/detect_objectif_exist_rb.php',
				data:{mission_id:mission_id, question_id:236, cycle_achat_id:18},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_rb(commentaire, qcm, mission_id, 236);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recetteb/php/update_object_rb.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:236},
							success:function(){
								
								$.ajax({
									type:'POST',
									url:'cycleRecette/Recetteb/load/load_rep_rb.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_rb').hide();
										$('#message_fermeture_question_rb2').hide();
										$('#contrb').hide();
										$('#contRsciRecette').show();
										openButtObjrb();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	$('#valider_Fermeture_Question_rb2').click(function(){
		$('#message_fermeture_question_rb2').hide();
		$('#fancybox_rb').hide();
		openButtObjrb();
	});
});

</script>

<div id="message_enreg_rb2">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_rb2" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_rb2" />
		</td>
	</tr>
</table>
</div>