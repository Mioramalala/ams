
<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_pe6').click(function(){	
	if((document.getElementById("commentaire_Question_pe6").value=="") || (document.getElementById("rad_Question_Oui_pe_6").checked==false && document.getElementById("rad_Question_NA_pe_6").checked==false && document.getElementById("rad_Question_Non_pe_6").checked==false)){
			$('#mess_quest_vide_pe6').show();
			$('#message_fermeture_question_pe6').hide();
			$('#Question_pe_232').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_pe").value;
			commentaire=document.getElementById("commentaire_Question_pe6").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_pe_6").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_pe_6").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_pe_6").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paiee/php/detect_objectif_exist_pe.php',
				data:{mission_id:mission_id, question_id:232, cycle_achat_id:17},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_pe(commentaire, qcm, mission_id, 232);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paiee/php/update_object_pe.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:232},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cyclePaie/Paiee/load/load_rep_pe.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_pe').hide();
										$('#message_fermeture_question_pe6').hide();
										$('#contpe').hide();
										$('#contRsciPaie').show();
										openButtObjpe();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	$('#valider_Fermeture_Question_pe6').click(function(){
		$('#message_fermeture_question_pe6').hide();
		$('#fancybox_pe').hide();
		openButtObjpe();
	});
});

</script>

<div id="message_enreg_pe6">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_pe6" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_pe6" />
		</td>
	</tr>
</table>
</div>