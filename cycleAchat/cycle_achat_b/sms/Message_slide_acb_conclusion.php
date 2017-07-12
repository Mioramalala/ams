<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_acb').click(function(){
		mission_id=document.getElementById("tx_miss_conc_acb").value;	
		commentaire=document.getElementById("commentaire_Question_acb_sup_conclusion").value;
		//la synthèse de acb
		
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_acb").checked==true){
		risque="faible";
			}
		if(document.getElementById("rad_Conclus_Moyen_acb").checked==true){
		risque="moyen";
			}	
		if(document.getElementById("rad_Conclus_Eleve_acb").checked==true){
		risque="eleve";
		}
		
		obj_concl_id_acb=0;
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achat_b/php/detect_concl_id_acb.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_acb=e;
				if(obj_concl_id_acb==0){
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achat_b/php/enreg_concl_acb.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
					
				else{
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achat_b/php/upd_concl_acb.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_acb:obj_concl_id_acb},
						success:function(){						
						}
					});
				}
			
				$('#contSupacb').hide();
				//$('#contRsciImmo').show();
				$('#mess_slide_conclusion_acb').hide();
				$('#fancybox_bouton_acb').hide();
				openButtSupacb();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_acb">
	<table width="500">
		<tr>
			<td height="20">
			</td>
		</tr>
		<tr>
			<td class="td_Contenue_Message" height="50" align="center">Toutes les données sont stockées...</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_acb">
			</td>
		</tr>
	</table>
</div>