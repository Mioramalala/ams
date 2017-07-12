<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_dd').click(function(){
		mission_id=document.getElementById("tx_miss_conc_dd").value;	
		commentaire=document.getElementById("commentaire_Question_dd_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_dd").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_dd").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_dd").checked==true){
		risque="eleve";
		}
		obj_concl_id_dd=0;
		$.ajax({
			type:'POST',
			url:'cycleDepense/Depensed/php/detect_concl_id_dd.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_dd=e;
				if(obj_concl_id_dd==0){
					$.ajax({
						type:'POST',
						url:'cycleDepense/Depensed/php/enreg_concl_dd.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleDepense/Depensed/php/upd_concl_dd.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_dd:obj_concl_id_dd},
						success:function(){						
						}
					});
				}
				$('#contSupDd').hide();
				$('#contRsciDepense').show();
				$('#mess_slide_conclusion_dd').hide();
				$('#fancybox_bouton_dd').hide();
				openButtSupdd();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_dd">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_dd">
			</td>
		</tr>
	</table>
</div>