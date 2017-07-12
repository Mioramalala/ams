
<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_dc').click(function(){
		if((document.getElementById("commentaire_Question_dc1").value=="" && document.getElementById("rad_Question_Non_dc_1").checked== true) || (document.getElementById("rad_Question_Oui_dc_1").checked==false && document.getElementById("rad_Question_NA_dc_1").checked==false && document.getElementById("rad_Question_Non_dc_1").checked==false)){
			$('#mess_quest_vide_dc1').show();
			$('#Question_dc_295').hide();
			$('#message_fermeture_question_dc').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_dc").value;
			commentaire=document.getElementById("commentaire_Question_dc1").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_dc_1").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_dc_1").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_dc_1").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleDepense/Depensec/php/detect_objectif_exist_dc.php',
				data:{mission_id:mission_id, question_id:295, cycle_achat_id:23},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_dc(commentaire, qcm, mission_id, 295);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depensec/php/update_object_dc.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:295},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleDepense/Depensec/load/load_rep_dc.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_f').hide();
										$('#message_fermeture_question_dc').hide();
										$('#contdc').hide();
										$('#contRsciDepense').show();
										openButtObjdc();
									}
								});
							}
						});
					}
				}
			});
		}	
	});
	$('#valider_Fermeture_Question_dc').click(function(){
		$('#message_fermeture_question_dc').hide();
		$('#fancybox_dc').hide();
		openButtObjdc();
	});
});
function openButtObjf(){
	document.getElementById("int_dc_Retour").disabled=false;
	document.getElementById("Int_dc_Continuer").disabled=false;
	document.getElementById("Int_dc_Synthese").disabled=false;
}
</script>

<div id="message_Retour_dc">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_dc" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_dc" />
		</td>
	</tr>
</table>
</div>