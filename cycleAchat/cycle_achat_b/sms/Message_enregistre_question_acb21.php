<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_acb21').click(function(){
	//tinay editer	
	//if((document.getElementById("commentaire_Question_acb21").value=="") || (document.getElementById("rad_Question_Oui_acb_21").checked==false && document.getElementById("rad_Question_NA_acb_21").checked==false && document.getElementById("rad_Question_Non_acb_21").checked==false)){
	if((document.getElementById("commentaire_Question_acb21").value=="" && document.getElementById("rad_Question_Non_acb_21").checked== true) || (document.getElementById("rad_Question_Oui_acb_21").checked==false && document.getElementById("rad_Question_NA_acb_21").checked==false && document.getElementById("rad_Question_Non_acb_21").checked==false)){
			$('#mess_quest_vide_acb21').show();
			$('#message_fermeture_question_acb21').hide();
			$('#Question_acb_75').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_acb").value;
			commentaire=document.getElementById("commentaire_Question_acb21").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_acb_21").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_acb_21").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_acb_21").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_b/php/detect_objectif_exist_acb.php',
				data:{mission_id:mission_id, question_id:21, cycle_achat_id:2},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_acb(commentaire, qcm, mission_id, 21);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_b/php/update_object_acb.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:21},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleAchat/cycle_achat_b/load/load_rep_acb.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_acb').hide();
										$('#message_fermeture_question_acb21').hide();
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
	$('#valider_Fermeture_Question_acb21').click(function(){
		$('#message_fermeture_question_acb21').hide();
		$('#fancybox_acb').hide();
		openButtObjacb();
	});
});

</script>

<div id="message_enreg_acb21">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_acb21" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_acb21" />
		</td>
	</tr>
</table>
</div>