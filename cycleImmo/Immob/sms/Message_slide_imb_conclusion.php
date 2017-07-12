<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_imb').click(function(){
		mission_id=document.getElementById("tx_miss_conc_imb").value;	
		commentaire=document.getElementById("commentaire_Question_imb_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_imb").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_imb").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_imb").checked==true){
		risque="eleve";
		}
		obj_concl_id_imb=0;
		$.ajax({
			type:'POST',
			url:'cycleImmo/immob/php/detect_concl_id_imb.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_imb=e;
				if(obj_concl_id_imb==0){
					$.ajax({
						type:'POST',
						url:'cycleImmo/immob/php/enreg_concl_imb.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleImmo/immob/php/upd_concl_imb.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_imb:obj_concl_id_imb},
						success:function(){						
						}
					});
				}
				$('#contSupimb').hide();
				$('#contRsciImmo').show();
				$('#mess_slide_conclusion_imb').hide();
				$('#fancybox_bouton_imb').hide();
				openButtSupimb();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_imb">
	<table width="500">
		<tr style="height:20px">
			<td style="height:20px">
			</td>
		</tr>
		<tr>
			<td class="td_Contenue_Message" height="50" align="center">Toutes les données sont stockées...</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_imb">
			</td>
		</tr>
	</table>
</div>