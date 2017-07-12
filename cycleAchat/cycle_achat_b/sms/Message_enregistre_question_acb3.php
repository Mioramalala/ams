<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_acb3').click(function(){
	//tinay editer		
	//if((document.getElementById("commentaire_Question_acb3").value=="") || (document.getElementById("rad_Question_Oui_acb_3").checked==false && document.getElementById("rad_Question_NA_acb_3").checked==false && document.getElementById("rad_Question_Non_acb_3").checked==false)){
	if((document.getElementById("commentaire_Question_acb3").value=="" && document.getElementById("rad_Question_Non_acb_3").checked==true ) || (document.getElementById("rad_Question_Oui_acb_3").checked==false && document.getElementById("rad_Question_NA_acb_3").checked==false && document.getElementById("rad_Question_Non_acb_3").checked==false)){
			$('#mess_quest_vide_acb3').show();
			$('#message_fermeture_question_acb3').hide();
			$('#Question_acb_72').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_acb").value;
			commentaire=document.getElementById("commentaire_Question_acb3").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_acb_3").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_acb_3").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_acb_3").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_b/php/detect_objectif_exist_acb.php',
				data:{mission_id:mission_id, question_id:3, cycle_achat_id:2},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_acb(commentaire, qcm, mission_id, 3);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_b/php/update_object_acb.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:3},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleAchat/cycle_achat_b/load/load_rep_acb.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_acb').hide();
										$('#message_fermeture_question_acb3').hide();
										$('#dv_cont_obj_b').hide();
										$('#contenue_rsci').show();
										openButtObjacb();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	$('#valider_Fermeture_Question_acb3').click(function(){
		$('#message_fermeture_question_acb3').hide();
		$('#fancybox_acb').hide();
		openButtObjacb();
	});
});

</script>

<div id="message_enreg_acb3">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_acb3" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_acb3" />
		</td>
	</tr>
</table>
</div>