
<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_pd').click(function(){
		if((document.getElementById("commentaire_Question_pd1").value=="") || (document.getElementById("rad_Question_Oui_pd_1").checked==false && document.getElementById("rad_Question_NA_pd_1").checked==false && document.getElementById("rad_Question_Non_pd_1").checked==false)){
			$('#mess_quest_vide_pd1').show();
			$('#Question_pd_222').hide();
			$('#message_fermeture_question_pd').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_pd").value;
			commentaire=document.getElementById("commentaire_Question_pd1").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_pd_1").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_pd_1").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_pd_1").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paied/php/detect_objectif_exist_pd.php',
				data:{mission_id:mission_id, question_id:222, cycle_achat_id:16},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_pd(commentaire, qcm, mission_id, 222);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paied/php/update_object_pd.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:222},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cyclePaie/Paied/load/load_rep_pd.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_f').hide();
										$('#message_fermeture_question_pd').hide();
										$('#contpd').hide();
										$('#contRsciPaie').show();
										openButtObjpd();
									}
								});
							}
						});
					}
				}
			});
		}	
	});
	$('#valider_Fermeture_Question_pd').click(function(){
		$('#message_fermeture_question_pd').hide();
		$('#fancybox_pd').hide();
		openButtObjpd();
	});
});
function openButtObjf(){
	document.getElementById("int_pd_Retour").disabled=false;
	document.getElementById("Int_pd_Continuer").disabled=false;
	document.getElementById("Int_pd_Synthese").disabled=false;
}
</script>

<div id="message_Retour_pd">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_pd" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_pd" />
		</td>
	</tr>
</table>
</div>