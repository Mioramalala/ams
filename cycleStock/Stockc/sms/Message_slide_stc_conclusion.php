<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_stc').click(function(){
		mission_id=document.getElementById("tx_miss_conc_stc").value;	
		commentaire=document.getElementById("commentaire_Question_stc_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_stc").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_stc").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_stc").checked==true){
		risque="eleve";
		}
		obj_concl_id_stc=0;
		$.ajax({
			type:'POST',
			url:'cycleStock/Stockc/php/detect_concl_id_stc.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_stc=e;
				if(obj_concl_id_stc==0){
					$.ajax({
						type:'POST',
						url:'cycleStock/Stockc/php/enreg_concl_stc.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleStock/Stockc/php/upd_concl_stc.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_stc:obj_concl_id_stc},
						success:function(){						
						}
					});
				}
				$('#contSupstc').hide();
				$('#contRsciStock').show();
				$('#mess_slide_conclusion_stc').hide();
				$('#fancybox_bouton_stc').hide();
				openButtSupstc();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_stc">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_stc">
			</td>
		</tr>
	</table>
</div>