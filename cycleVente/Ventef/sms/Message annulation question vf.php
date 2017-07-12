
<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_vf').click(function(){
		if((document.getElementById("commentaire_Question_vf1").value=="") || (document.getElementById("rad_Question_Oui_vf_1").checked==false && document.getElementById("rad_Question_NA_vf_1").checked==false && document.getElementById("rad_Question_Non_vf_1").checked==false)){
			$('#mess_quest_vide_vf1').show();
			$('#Question_vf_393').hide();
			$('#message_fermeture_question_vf').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_vf").value;
			commentaire=document.getElementById("commentaire_Question_vf1").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_vf_1").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_vf_1").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_vf_1").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Ventef/php/detect_objectif_exist_vf.php',
				data:{mission_id:mission_id, question_id:393, cycle_achat_id:30},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_vf(commentaire, qcm, mission_id, 393);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventef/php/update_object_vf.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:393},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleVente/Ventef/load/load_rep_vf.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_f').hide();
										$('#message_fermeture_question_vf').hide();
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
	$('#valider_Fermeture_Question_vf').click(function(){
		$('#message_fermeture_question_vf').hide();
		$('#fancybox_vf').hide();
		openButtObjvf();
	});
});
function openButtObjf(){
	document.getElementById("int_vf_Retour").disabled=false;
	document.getElementById("Int_vf_Continuer").disabled=false;
	document.getElementById("Int_vf_Synthese").disabled=false;
}
</script>

<div id="message_Retour_vf">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_vf" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_vf" />
		</td>
	</tr>
</table>
</div>