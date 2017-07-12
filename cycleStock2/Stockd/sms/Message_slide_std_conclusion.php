<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_std').click(function(){
		mission_id=document.getElementById("tx_miss_conc_std").value;	
		commentaire=document.getElementById("commentaire_Question_std_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_std").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_std").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_std").checked==true){
		risque="eleve";
		}
		obj_concl_id_std=0;
		$.ajax({
			type:'POST',
			url:'cycleStock/Stockd/php/detect_concl_id_std.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_std=e;
				if(obj_concl_id_std==0){
					$.ajax({
						type:'POST',
						url:'cycleStock/Stockd/php/enreg_concl_std.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleStock/Stockd/php/upd_concl_std.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_std:obj_concl_id_std},
						success:function(){						
						}
					});
				}
				$('#contSupstd').hide();
				$('#contRsciStock').show();
				$('#mess_slide_conclusion_std').hide();
				$('#fancybox_bouton_std').hide();
				openButtSupstd();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_std">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_std">
			</td>
		</tr>
	</table>
</div>