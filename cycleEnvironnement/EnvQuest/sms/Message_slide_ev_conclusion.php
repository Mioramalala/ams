<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_ev').click(function(){
		mission_id=document.getElementById("tx_miss_conc_ev").value;	
		commentaire=document.getElementById("commentaire_Question_ev_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_ev").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_ev").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_ev").checked==true){
		risque="eleve";
		}
		obj_concl_id_ev=0;
		$.ajax({
			type:'POST',
			url:'cycleEnvironnement/EnvQuest/php/detect_concl_id_ev.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_ev=e;
				if(obj_concl_id_ev==0){
					$.ajax({
						type:'POST',
						url:'cycleEnvironnement/EnvQuest/php/enreg_concl_ev.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleEnvironnement/EnvQuest/php/upd_concl_ev.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_ev:obj_concl_id_ev},
						success:function(){						
						}
					});
				}
				$('#contSupEv').hide();
				$('#contRsciEnvironnement').show();
				$('#mess_slide_conclusion_ev').hide();
				$('#fancybox_bouton_ev').hide();
				openButtSupev();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_ev">
	<table width="500">
		<tr height="20">
			<td height="20">
			</td>
		</tr>
		<tr>
			<td class="td_Contenue_Message" height="50" align="center">Toutes les données sont stockées...</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_ev">
			</td>
		</tr>
	</table>
</div>