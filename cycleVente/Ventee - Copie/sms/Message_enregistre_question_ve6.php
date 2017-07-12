
<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_ve6').click(function(){	
	if((document.getElementById("commentaire_Question_ve6").value=="") || (document.getElementById("rad_Question_Oui_ve_6").checked==false && document.getElementById("rad_Question_NA_ve_6").checked==false && document.getElementById("rad_Question_Non_ve_6").checked==false)){
			$('#mess_quest_vide_ve6').show();
			$('#message_fermeture_question_ve6').hide();
			$('#Question_ve_391').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_ve").value;
			commentaire=document.getElementById("commentaire_Question_ve6").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_ve_6").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_ve_6").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_ve_6").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Ventee/php/detect_objectif_exist_ve.php',
				data:{mission_id:mission_id, question_id:391, cycle_achat_id:29},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_ve(commentaire, qcm, mission_id, 391);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventee/php/update_object_ve.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:391},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleVente/Ventee/load/load_rep_ve.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_ve').hide();
										$('#message_fermeture_question_ve6').hide();
										$('#contve').hide();
										$('#contRsciVente').show();
										openButtObjve();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	$('#valider_Fermeture_Question_ve6').click(function(){
		$('#message_fermeture_question_ve6').hide();
		$('#fancybox_ve').hide();
		openButtObjve();
	});
});

</script>

<div id="message_enreg_ve6">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_ve6" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_ve6" />
		</td>
	</tr>
</table>
</div>