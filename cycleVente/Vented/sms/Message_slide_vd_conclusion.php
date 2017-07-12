<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_vd').click(function(){
		mission_id=document.getElementById("tx_miss_conc_vd").value;	
		commentaire=document.getElementById("commentaire_Question_vd_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_vd").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_vd").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_vd").checked==true){
		risque="eleve";
		}
		obj_concl_id_vd=0;
		$.ajax({
			type:'POST',
			url:'cycleVente/Vented/php/detect_concl_id_vd.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_vd=e;
				if(obj_concl_id_vd==0){
					$.ajax({
						type:'POST',
						url:'cycleVente/Vented/php/enreg_concl_vd.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleVente/Vented/php/upd_concl_vd.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_vd:obj_concl_id_vd},
						success:function(){						
						}
					});
				}
				$('#contSupVd').hide();
				$('#contRsciVente').show();
				$('#mess_slide_conclusion_vd').hide();
				$('#fancybox_bouton_vd').hide();
				openButtSupvd();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_vd">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_vd">
			</td>
		</tr>
	</table>
</div>