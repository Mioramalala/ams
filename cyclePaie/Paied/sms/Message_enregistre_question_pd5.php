<script>
$(function(){
	//Enregistre du question objectif B5
	$('#enregistrer_Fermeture_Question_pd5').click(function(){
if((document.getElementById("commentaire_Question_pd5").value=="") || (document.getElementById("rad_Question_Oui_pd_5").checked==false && document.getElementById("rad_Question_NA_pd_5").checked==false && document.getElementById("rad_Question_Non_pd_5").checked==false)){
			$('#mess_quest_vide_pd5').show();
			$('#Question_pd_226').hide();
			$('#message_fermeture_question_pd5').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_pd").value;
			commentaire=document.getElementById("commentaire_Question_pd5").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_pd_5").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_pd_5").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_pd_5").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paied/php/detect_objectif_exist_pd.php',
				data:{mission_id:mission_id, question_id:226, cycle_achat_id:16},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_pd(commentaire, qcm, mission_id, 226);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paied/php/update_object_pd.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:226},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cyclePaie/Paied/load/load_rep_pd.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_pd').hide();
										$('#message_fermeture_question_pd5').hide();
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
	$('#valider_Fermeture_Question_pd5').click(function(){
		$('#message_fermeture_question_pd5').hide();
		$('#fancybox_pd').hide();
		openButtObjpd();
	});
});

</script>

<div id="message_enreg_pd5">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_pd5" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_pd5" />
		</td>
	</tr>
</table>
</div>