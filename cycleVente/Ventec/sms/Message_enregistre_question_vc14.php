<script>
$(function(){
	//Enregistre du question objectif B14
	$('#enregistrer_Fermeture_Question_vc14').click(function(){
if((document.getElementById("commentaire_Question_vc14").value=="") || (document.getElementById("rad_Question_Oui_vc_14").checked==false && document.getElementById("rad_Question_NA_vc_14").checked==false && document.getElementById("rad_Question_Non_vc_14").checked==false)){
			$('#mess_quest_vide_vc14').show();
			$('#Question_vc_348').hide();
			$('#message_fermeture_question_vc14').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_vc").value;
			commentaire=document.getElementById("commentaire_Question_vc14").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_vc_14").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_vc_14").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_vc_14").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Ventec/php/detect_objectif_exist_vc.php',
				data:{mission_id:mission_id, question_id:348, cycle_achat_id:27},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_vc(commentaire, qcm, mission_id, 348);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventec/php/update_object_vc.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:348},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleVente/Ventec/load/load_rep_vc.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_vc').hide();
										$('#message_fermeture_question_vc14').hide();
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
	$('#valider_Fermeture_Question_vc14').click(function(){
		$('#message_fermeture_question_vc14').hide();
		$('#fancybox_vc').hide();
		openButtObjvc();
	});
});

</script>

<div id="message_enreg_vc14">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_vc14" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_vc14" />
		</td>
	</tr>
</table>
</div>