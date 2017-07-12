
<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_ve').click(function(){
		if((document.getElementById("commentaire_Question_ve1").value=="") || (document.getElementById("rad_Question_Oui_ve_1").checked==false && document.getElementById("rad_Question_NA_ve_1").checked==false && document.getElementById("rad_Question_Non_ve_1").checked==false)){
			$('#mess_quest_vide_ve1').show();
			$('#Question_ve_386').hide();
			$('#message_fermeture_question_ve').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_ve").value;
			commentaire=document.getElementById("commentaire_Question_ve1").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_ve_1").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_ve_1").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_ve_1").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Ventee/php/detect_objectif_exist_ve.php',
				data:{mission_id:mission_id, question_id:386, cycle_achat_id:29},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_ve(commentaire, qcm, mission_id, 386);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventee/php/update_object_ve.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:386},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleVente/Ventee/load/load_rep_ve.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_f').hide();
										$('#message_fermeture_question_ve').hide();
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
	$('#valider_Fermeture_Question_ve').click(function(){
		$('#message_fermeture_question_ve').hide();
		$('#fancybox_ve').hide();
		openButtObjve();
	});
});
function openButtObjf(){
	document.getElementById("int_ve_Retour").disabled=false;
	document.getElementById("Int_ve_Continuer").disabled=false;
	document.getElementById("Int_ve_Synthese").disabled=false;
}
</script>

<div id="message_Retour_ve">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_ve" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_ve" />
		</td>
	</tr>
</table>
</div>