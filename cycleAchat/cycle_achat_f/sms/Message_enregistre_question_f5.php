<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_f5').click(function(){
		// alert("hihihi");
		if((document.getElementById("commentaire_Question_f5").value=="") || (document.getElementById("rad_Question_Oui_f_5").checked==false && document.getElementById("rad_Question_NA_f_5").checked==false && document.getElementById("rad_Question_Non_f_5").checked==false)){
			// $('#mess_quest_vide_f5').show();
			// $('#message_fermeture_question_f5').hide();
			// $('#Question_f_59').hide);
		}
		else{
			// mission_id=document.getElementById("txt_mission_id_f").value;
			// commentaire=document.getElementById("commentaire_Question_f5").value;
			// qcm="OUI";
			// if(document.getElementById("rad_Question_Oui_f_5").checked==true){
				// qcm="OUI";
			// }
			// else if(document.getElementById("rad_Question_NA_f_5").checked==true){
				// qcm="N/A";
			// }
			// else if(document.getElementById("rad_Question_Non_f_5").checked==true){
				// qcm="NON";
			// }
			// objectif_id=0;
			// $.ajax({
				// type:'POST',
				// url:'cycleAchat/cycle_achat_f/php/detect_objectif_exist_f.php',
				// data:{mission_id:mission_id, question_id:59, cycle_achat_id:6},
				// success:function(e){
					// objectif_id=e;
					// if(objectif_id==0){					
						// enregistrer_commentaire_f(commentaire, qcm, mission_id, 59);
					// }
					// else{
						// $.ajax({
							// type:'POST',
							// url:'cycleAchat/cycle_achat_f/php/update_achat_object_f.php',
							// data:{commentaire:commentaire, qcm:qcm, question_id:59},
							// success:function(){
								// $.ajax({
									// type:'POST',
									// url:'cycleAchat/cycle_achat_f/load/load_rep_f.php',
									// data:{mission_id:mission_id},
									// success:function(e){
										// $('#fancybox_f').hide();
										// $('#message_fermeture_question_f5').hide();
										// $('#dv_cont_obj_f').hide();
										// $('#contenue_rsci').show();
										// openButtObjf();
									// }
								// });
							// }
						// });
					// }
				// }
			// });
		}
	});
	$('#valider_Fermeture_Question_f5').click(function(){
		$('#message_fermeture_question_f5').hide();
		$('#fancybox_f').hide();
		openButtObjf();
	});
});

</script>

<div id="message_enreg_5">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_f5" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_f5" />
		</td>
	</tr>
</table>
</div>