<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_stb').click(function(){
		mission_id=document.getElementById("tx_miss_conc_stb").value;	
		commentaire=document.getElementById("commentaire_Question_stb_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_stb").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_stb").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_stb").checked==true){
		risque="eleve";
		}
		obj_concl_id_stb=0;
		$.ajax({
			type:'POST',
			url:'cycleStock/Stockb/php/detect_concl_id_stb.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_stb=e;
				if(obj_concl_id_stb==0){
					$.ajax({
						type:'POST',
						url:'cycleStock/Stockb/php/enreg_concl_stb.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleStock/Stockb/php/upd_concl_stb.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_stb:obj_concl_id_stb},
						success:function(){						
						}
					});
				}
				$('#contSupstb').hide();
				$('#contRsciStock').show();
				$('#mess_slide_conclusion_stb').hide();
				$('#fancybox_bouton_stb').hide();
				openButtSupstb();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_stb">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_stb">
			</td>
		</tr>
	</table>
</div>