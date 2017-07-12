
<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_re2').click(function(){	
	if((document.getElementById("commentaire_Question_re2").value=="" && document.getElementById("rad_Question_Non_re_2").checked== true) || (document.getElementById("rad_Question_Oui_re_2").checked==false && document.getElementById("rad_Question_NA_re_2").checked==false && document.getElementById("rad_Question_Non_re_2").checked==false)){
			$('#mess_quest_vide_re2').show();
			$('#Question_re_274').hide();
			$('#message_fermeture_question_re2').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_re").value;
			commentaire=document.getElementById("commentaire_Question_re2").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_re_2").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_re_2").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_re_2").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recettee/php/detect_objectif_exist_re.php',
				data:{mission_id:mission_id, question_id:274, cycle_achat_id:21},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_re(commentaire, qcm, mission_id, 274);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recettee/php/update_object_re.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:274},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleRecette/Recettee/load/load_rep_re.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_re').hide();
										$('#message_fermeture_question_re2').hide();
										$('#contre').hide();
										$('#contRsciRecette').show();
										openButtObjre();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	$('#valider_Fermeture_Question_re2').click(function(){
		$('#message_fermeture_question_re2').hide();
		$('#fancybox_re').hide();
		openButtObjre();
	});
});

</script>

<div id="message_enreg_re2">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_re2" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_re2" />
		</td>
	</tr>
</table>
</div>