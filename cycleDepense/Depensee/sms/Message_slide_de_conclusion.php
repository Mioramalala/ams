<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_de').click(function(){
		mission_id=document.getElementById("tx_miss_conc_de").value;	
		commentaire=document.getElementById("commentaire_Question_de_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_de").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_de").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_de").checked==true){
		risque="eleve";
		}
		obj_concl_id_de=0;
		$.ajax({
			type:'POST',
			url:'cycleDepense/Depensee/php/detect_concl_id_de.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_de=e;
				if(obj_concl_id_de==0){
					$.ajax({
						type:'POST',
						url:'cycleDepense/Depensee/php/enreg_concl_de.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleDepense/Depensee/php/upd_concl_de.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_de:obj_concl_id_de},
						success:function(){						
						}
					});
				}
				$('#contSupDe').hide();
				$('#contRsciDepense').show();
				$('#mess_slide_conclusion_de').hide();
				$('#fancybox_bouton_de').hide();
				openButtSupde();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_de">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_de">
			</td>
		</tr>
	</table>
</div>