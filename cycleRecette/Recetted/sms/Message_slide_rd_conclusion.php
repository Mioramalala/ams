<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_rd').click(function(){
		mission_id=document.getElementById("tx_miss_conc_rd").value;	
		commentaire=document.getElementById("commentaire_Question_rd_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_rd").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_rd").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_rd").checked==true){
		risque="eleve";
		}
		obj_concl_id_rd=0;
		$.ajax({
			type:'POST',
			url:'cycleRecette/Recetted/php/detect_concl_id_rd.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_rd=e;
				if(obj_concl_id_rd==0){
					$.ajax({
						type:'POST',
						url:'cycleRecette/Recetted/php/enreg_concl_rd.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleRecette/Recetted/php/upd_concl_rd.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_rd:obj_concl_id_rd},
						success:function(){						
						}
					});
				}
				$('#contSupRd').hide();
				$('#contRsciRecette').show();
				$('#mess_slide_conclusion_rd').hide();
				$('#fancybox_bouton_rd').hide();
				openButtSuprd();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_rd">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_rd">
			</td>
		</tr>
	</table>
</div>