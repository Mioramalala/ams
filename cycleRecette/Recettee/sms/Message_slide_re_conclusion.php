<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_re').click(function(){
		mission_id=document.getElementById("tx_miss_conc_re").value;	
		commentaire=document.getElementById("commentaire_Question_re_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_re").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_re").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_re").checked==true){
		risque="eleve";
		}
		obj_concl_id_re=0;
		$.ajax({
			type:'POST',
			url:'cycleRecette/Recettee/php/detect_concl_id_re.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_re=e;
				if(obj_concl_id_re==0){
					$.ajax({
						type:'POST',
						url:'cycleRecette/Recettee/php/enreg_concl_re.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleRecette/Recettee/php/upd_concl_re.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_re:obj_concl_id_re},
						success:function(){						
						}
					});
				}
				$('#contSupRe').hide();
				$('#contRsciRecette').show();
				$('#mess_slide_conclusion_re').hide();
				$('#fancybox_bouton_re').hide();
				openButtSupre();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_re">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_re">
			</td>
		</tr>
	</table>
</div>