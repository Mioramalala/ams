<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_ve').click(function(){
		mission_id=document.getElementById("tx_miss_conc_ve").value;	
		commentaire=document.getElementById("commentaire_Question_ve_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_ve").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_ve").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_ve").checked==true){
		risque="eleve";
		}
		obj_concl_id_ve=0;
		$.ajax({
			type:'POST',
			url:'cycleVente/Ventee/php/detect_concl_id_ve.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_ve=e;
				if(obj_concl_id_ve==0){
					$.ajax({
						type:'POST',
						url:'cycleVente/Ventee/php/enreg_concl_ve.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleVente/Ventee/php/upd_concl_ve.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_ve:obj_concl_id_ve},
						success:function(){						
						}
					});
				}
				$('#contSupVe').hide();
				$('#contRsciVente').show();
				$('#mess_slide_conclusion_ve').hide();
				$('#fancybox_bouton_ve').hide();
				openButtSupve();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_ve">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_ve">
			</td>
		</tr>
	</table>
</div>