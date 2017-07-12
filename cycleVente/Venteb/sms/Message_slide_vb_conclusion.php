<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_vb').click(function(){
		$('#Int_Synthese_vb').hide();
		mission_id=document.getElementById("tx_miss_conc_vb").value;	
		commentaire=document.getElementById("commentaire_Question_vb_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_vb").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_vb").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_vb").checked==true){
		risque="eleve";
		}
		obj_concl_id_vb=0;
		$.ajax({
			type:'POST',
			url:'cycleVente/Venteb/php/detect_concl_id_vb.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_vb=e;
				if(obj_concl_id_vb==0){
					$.ajax({
						type:'POST',
						url:'cycleVente/Venteb/php/enreg_concl_vb.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleVente/Venteb/php/upd_concl_vb.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_vb:obj_concl_id_vb},
						success:function(){						
						}
					});
				}
				$('#contSupVb').hide();
				$('#contRsciVente').show();
				$('#mess_slide_conclusion_vb').hide();
				$('#fancybox_bouton_vb').hide();
				openButtSupvb();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_vb">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_vb">
			</td>
		</tr>
	</table>
</div>