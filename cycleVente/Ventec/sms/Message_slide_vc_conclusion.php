<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_vc').click(function(){
		mission_id=document.getElementById("tx_miss_conc_vc").value;	
		commentaire=document.getElementById("commentaire_Question_vc_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_vc").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_vc").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_vc").checked==true){
		risque="eleve";
		}
		obj_concl_id_vc=0;
		$.ajax({
			type:'POST',
			url:'cycleVente/Ventec/php/detect_concl_id_vc.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_vc=e;
				if(obj_concl_id_vc==0){
					$.ajax({
						type:'POST',
						url:'cycleVente/Ventec/php/enreg_concl_vc.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleVente/Ventec/php/upd_concl_vc.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_vc:obj_concl_id_vc},
						success:function(){						
						}
					});
				}
				$('#contSupVc').hide();
				$('#contRsciVente').show();
				$('#mess_slide_conclusion_vc').hide();
				$('#fancybox_bouton_vc').hide();
				openButtSupvc();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_vc">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_vc">
			</td>
		</tr>
	</table>
</div>