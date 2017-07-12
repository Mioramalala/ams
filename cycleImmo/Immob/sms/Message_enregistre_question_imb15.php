<script>
$(function(){
	//Enregistre du question objectif B15
	$('#enregistrer_Fermeture_Question_imb15').click(function(){
if((document.getElementById("rad_Question_Non_imb_15").checked==true && document.getElementById("commentaire_Question_imb15").value=="") || (document.getElementById("rad_Question_Oui_imb_15").checked==false && document.getElementById("rad_Question_NA_imb_15").checked==false && document.getElementById("rad_Question_Non_imb_15").checked==false)){
			$('#mess_quest_vide_imb15').show();
			$('#Question_imb_84').hide();
			$('#message_fermeture_question_imb15').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_imb").value;
			commentaire=document.getElementById("commentaire_Question_imb15").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_imb_15").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_imb_15").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_imb_15").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleImmo/immob/php/detect_objectif_exist_imb.php',
				data:{mission_id:mission_id, question_id:84, cycle_achat_id:7},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_imb(commentaire, qcm, mission_id, 84);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleImmo/immob/php/update_object_imb.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:84},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleImmo/immob/load/load_rep_imb.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_imb').hide();
										$('#message_fermeture_question_imb15').hide();
										$('#contimb').hide();
										$('#contRsciImmo').show();
										openButtObjimb();
									}
								});
							}
						});
					}
				}
			});
		}	
	});
	$('#valider_Fermeture_Question_imb15').click(function(){
		$('#message_fermeture_question_imb15').hide();
		$('#fancybox_imb').hide();
		openButtObjimb();
	});
});

</script>

<div id="message_enreg_imb15">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_imb15" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_imb15" />
		</td>
	</tr>
</table>
</div>