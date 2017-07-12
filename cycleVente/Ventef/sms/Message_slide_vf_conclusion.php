<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_vf').click(function(){
		mission_id=document.getElementById("tx_miss_conc_vf").value;	
		commentaire=document.getElementById("commentaire_Question_vf_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_vf").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_vf").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_vf").checked==true){
		risque="eleve";
		}
		obj_concl_id_vf=0;
		$.ajax({
			type:'POST',
			url:'cycleVente/Ventef/php/detect_concl_id_vf.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_vf=e;
				if(obj_concl_id_vf==0){
					$.ajax({
						type:'POST',
						url:'cycleVente/Ventef/php/enreg_concl_vf.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleVente/Ventef/php/upd_concl_vf.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_vf:obj_concl_id_vf},
						success:function(){						
						}
					});
				}
				$('#contSupVf').hide();
				$('#contRsciVente').show();
				$('#mess_slide_conclusion_vf').hide();
				$('#fancybox_bouton_vf').hide();
				openButtSupvf();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_vf">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_vf">
			</td>
		</tr>
	</table>
</div>