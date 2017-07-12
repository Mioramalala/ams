<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_rb').click(function(){
		mission_id=document.getElementById("tx_miss_conc_rb").value;	
		commentaire=document.getElementById("commentaire_Question_rb_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_rb").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_rb").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_rb").checked==true){
		risque="eleve";
		}
		obj_concl_id_rb=0;
		$.ajax({
			type:'POST',
			url:'cycleRecette/Recetteb/php/detect_concl_id_rb.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_rb=e;
				if(obj_concl_id_rb==0){
					$.ajax({
						type:'POST',
						url:'cycleRecette/Recetteb/php/enreg_concl_rb.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleRecette/Recetteb/php/upd_concl_rb.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_rb:obj_concl_id_rb},
						success:function(){						
						}
					});
				}
				$('#contSupRb').hide();
				$('#contRsciRecette').show();
				$('#mess_slide_conclusion_rb').hide();
				$('#fancybox_bouton_rb').hide();
				openButtSuprb();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_rb">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_rb">
			</td>
		</tr>
	</table>
</div>