
<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_dd').click(function(){
		if((document.getElementById("commentaire_Question_dd1").value=="" && document.getElementById("rad_Question_Non_dd_1").checked== true) || (document.getElementById("rad_Question_Oui_dd_1").checked==false && document.getElementById("rad_Question_NA_dd_1").checked==false && document.getElementById("rad_Question_Non_dd_1").checked==false)){
			$('#mess_quest_vide_dd1').show();
			$('#Question_dd_304').hide();
			$('#message_fermeture_question_dd').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_dd").value;
			commentaire=document.getElementById("commentaire_Question_dd1").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_dd_1").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_dd_1").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_dd_1").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleDepense/Depensed/php/detect_objectif_exist_dd.php',
				data:{mission_id:mission_id, question_id:304, cycle_achat_id:24},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_dd(commentaire, qcm, mission_id, 304);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depensed/php/update_object_dd.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:304},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleDepense/Depensed/load/load_rep_dd.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_f').hide();
										$('#message_fermeture_question_dd').hide();
										$('#contdd').hide();
										$('#contRsciDepense').show();
										openButtObjdd();
									}
								});
							}
						});
					}
				}
			});
		}	
	});
	$('#valider_Fermeture_Question_dd').click(function(){
		$('#message_fermeture_question_dd').hide();
		$('#fancybox_dd').hide();
		openButtObjdd();
	});
});
function openButtObjf(){
	document.getElementById("int_dd_Retour").disabled=false;
	document.getElementById("Int_dd_Continuer").disabled=false;
	document.getElementById("Int_dd_Synthese").disabled=false;
}
</script>

<div id="message_Retour_dd">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_dd" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_dd" />
		</td>
	</tr>
</table>
</div>