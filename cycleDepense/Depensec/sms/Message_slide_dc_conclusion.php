<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_dc').click(function(){
		mission_id=document.getElementById("tx_miss_conc_dc").value;	
		commentaire=document.getElementById("commentaire_Question_dc_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_dc").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_dc").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_dc").checked==true){
		risque="eleve";
		}
		obj_concl_id_dc=0;
		$.ajax({
			type:'POST',
			url:'cycleDepense/Depensec/php/detect_concl_id_dc.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_dc=e;
				if(obj_concl_id_dc==0){
					$.ajax({
						type:'POST',
						url:'cycleDepense/Depensec/php/enreg_concl_dc.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleDepense/Depensec/php/upd_concl_dc.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_dc:obj_concl_id_dc},
						success:function(){						
						}
					});
				}
				$('#contSupDc').hide();
				$('#contRsciDepense').show();
				$('#mess_slide_conclusion_dc').hide();
				$('#fancybox_bouton_dc').hide();
				openButtSupdc();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_dc">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_dc">
			</td>
		</tr>
	</table>
</div>