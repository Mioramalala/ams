<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_imc').click(function(){
		mission_id=document.getElementById("tx_miss_conc_imc").value;	
		commentaire=document.getElementById("commentaire_Question_imc_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_imc").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_imc").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_imc").checked==true){
		risque="eleve";
		}
		obj_concl_id_imc=0;
		$.ajax({
			type:'POST',
			url:'cycleImmo/Immoc/php/detect_concl_id_imc.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_imc=e;
				if(obj_concl_id_imc==0){
					$.ajax({
						type:'POST',
						url:'cycleImmo/Immoc/php/enreg_concl_imc.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleImmo/Immoc/php/upd_concl_imc.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_imc:obj_concl_id_imc},
						success:function(){						
						}
					});
				}
				$('#contSupimc').hide();
				$('#contRsciImmo').show();
				$('#mess_slide_conclusion_imc').hide();
				$('#fancybox_bouton_imc').hide();
				openButtSupimc();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_imc">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_imc">
			</td>
		</tr>
	</table>
</div>