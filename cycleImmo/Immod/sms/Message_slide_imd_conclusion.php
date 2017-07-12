<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_imd').click(function(){
		mission_id=document.getElementById("tx_miss_conc_imd").value;	
		commentaire=document.getElementById("commentaire_Question_imd_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_imd").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_imd").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_imd").checked==true){
		risque="eleve";
		}
		obj_concl_id_imd=0;
		$.ajax({
			type:'POST',
			url:'cycleImmo/Immod/php/detect_concl_id_imd.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_imd=e;
				if(obj_concl_id_imd==0){
					$.ajax({
						type:'POST',
						url:'cycleImmo/Immod/php/enreg_concl_imd.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleImmo/Immod/php/upd_concl_imd.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_imd:obj_concl_id_imd},
						success:function(){						
						}
					});
				}
				$('#contSupimd').hide();
				$('#contRsciImmo').show();
				$('#mess_slide_conclusion_imd').hide();
				$('#fancybox_bouton_imd').hide();
				openButtSupimd();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_imd">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_imd">
			</td>
		</tr>
	</table>
</div>