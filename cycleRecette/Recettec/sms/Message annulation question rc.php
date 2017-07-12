
<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_rc').click(function(){
		if((document.getElementById("commentaire_Question_rc1").value=="" && document.getElementById("rad_Question_Non_rc_1").checked== true) || (document.getElementById("rad_Question_Oui_rc_1").checked==false && document.getElementById("rad_Question_NA_rc_1").checked==false && document.getElementById("rad_Question_Non_rc_1").checked==false)){
			$('#mess_quest_vide_rc1').show();
			$('#Question_rc_255').hide();
			$('#message_fermeture_question_rc').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_rc").value;
			commentaire=document.getElementById("commentaire_Question_rc1").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_rc_1").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_rc_1").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_rc_1").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recettec/php/detect_objectif_exist_rc.php',
				data:{mission_id:mission_id, question_id:255, cycle_achat_id:19},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_rc(commentaire, qcm, mission_id, 255);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recettec/php/update_object_rc.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:255},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleRecette/Recettec/load/load_rep_rc.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_f').hide();
										$('#message_fermeture_question_rc').hide();
										$('#contrc').hide();
										$('#contRsciRecette').show();
										openButtObjrc();
									}
								});
							}
						});
					}
				}
			});
		}	
	});
	$('#valider_Fermeture_Question_rc').click(function(){
		$('#message_fermeture_question_rc').hide();
		$('#fancybox_rc').hide();
		openButtObjrc();
	});
});
function openButtObjf(){
	document.getElementById("int_rc_Retour").disabled=false;
	document.getElementById("Int_rc_Continuer").disabled=false;
	document.getElementById("Int_rc_Synthese").disabled=false;
}
</script>

<div id="message_Retour_rc">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_rc" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_rc" />
		</td>
	</tr>
</table>
</div>