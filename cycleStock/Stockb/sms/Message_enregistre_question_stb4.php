<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_stb4').click(function(){	
	if((document.getElementById("commentaire_Question_stb4").value=="") || (document.getElementById("rad_Question_Oui_stb_4").checked==false && document.getElementById("rad_Question_NA_stb_4").checked==false && document.getElementById("rad_Question_Non_stb_4").checked==false)){
			$('#mess_quest_vide_stb4').show();
			$('#message_fermeture_question_stb4').hide();
			$('#Question_stb_120').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_stb").value;
			commentaire=document.getElementById("commentaire_Question_stb4").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_stb_4").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_stb_4").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_stb_4").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleStock/Stockb/php/detect_objectif_exist_stb.php',
				data:{mission_id:mission_id, question_id:120, cycle_achat_id:11},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_f(commentaire, qcm, mission_id, 120);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockb/php/update_object_stb.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:120},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleStock/Stockb/load/load_rep_stb.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_stb').hide();
										$('#message_fermeture_question_stb4').hide();
										$('#contstb').hide();
										$('#contRsciStock').show();
										openButtObjstb();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	$('#valider_Fermeture_Question_stb4').click(function(){
		$('#message_fermeture_question_stb4').hide();
		$('#fancybox_stb').hide();
		openButtObjstb();
	});
});

</script>

<div id="message_enreg_stb4">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_stb4" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_stb4" />
		</td>
	</tr>
</table>
</div>