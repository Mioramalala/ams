<script>
$(function(){
	//Enregistrement de la question objectif C11
	$('#enregistrer_Fermeture_Question_imd').click(function(){
		if((document.getElementById("commentaire_Question_imd").value=="") || (document.getElementById("rad_Question_Oui_imd_1").checked==false && document.getElementById("rad_Question_NA_imd_1").checked==false && document.getElementById("rad_Question_Non_imd_1").checked==false)){
			$('#mess_quest_vide_imd1').show();
			$('#Question_imd_106').hide();
			$('#message_fermeture_question_imd').hide();
		}
		else{ 
			mission_id=document.getElementById("txt_mission_id_imd").value;
			commentaire=document.getElementById("commentaire_Question_imd").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_imd_1").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_imd_1").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_imd_1").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleImmo/Immod/php/detect_objectif_exist_imd.php',
				data:{mission_id:mission_id, question_id:106, cycle_achat_id:9},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_imd(commentaire, qcm, mission_id, 106);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleImmo/Immod/php/update_object_imd.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:106},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleImmo/Immod/load/load_rep_imd.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_f').hide();
										$('#message_fermeture_question_imd').hide();
										$('#contimd').hide();
										$('#contRsciImmo').show();
										openButtObjimd();
									}
								});
							}
						});
					}
				}
			});
		}	
	});
	$('#valider_Fermeture_Question_imd').click(function(){
		$('#message_fermeture_question_imd').hide();
		$('#fancybox_imd').hide();
		openButtObjimd();
	});
});
function openButtObjf(){
	document.getElementById("int_imd_Retour").disabled=false;
	document.getElementById("Int_imd_Continuer").disabled=false;
	document.getElementById("Int_imd_Synthese").disabled=false;
}
</script>

<div id="message_Retour_imd">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_imd" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_imd" />
		</td>
	</tr>
</table>
</div>