<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_pe').click(function(){
		mission_id=document.getElementById("tx_miss_conc_pe").value;	
		commentaire=document.getElementById("commentaire_Question_pe_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_pe").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_pe").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_pe").checked==true){
		risque="eleve";
		}
		obj_concl_id_pe=0;
		$.ajax({
			type:'POST',
			url:'cyclePaie/Paiee/php/detect_concl_id_pe.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_pe=e;
				if(obj_concl_id_pe==0){
					$.ajax({
						type:'POST',
						url:'cyclePaie/Paiee/php/enreg_concl_pe.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cyclePaie/Paiee/php/upd_concl_pe.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_pe:obj_concl_id_pe},
						success:function(){						
						}
					});
				}
				$('#contSupPe').hide();
				$('#contRsciPaie').show();
				$('#mess_slide_conclusion_pe').hide();
				$('#fancybox_bouton_pe').hide();
				openButtSuppe();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_pe">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_pe">
			</td>
		</tr>
	</table>
</div>