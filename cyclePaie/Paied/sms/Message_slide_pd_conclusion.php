<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_pd').click(function(){
		mission_id=document.getElementById("tx_miss_conc_pd").value;	
		commentaire=document.getElementById("commentaire_Question_pd_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_pd").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_pd").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_pd").checked==true){
		risque="eleve";
		}
		obj_concl_id_pd=0;
		$.ajax({
			type:'POST',
			url:'cyclePaie/Paied/php/detect_concl_id_pd.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_pd=e;
				if(obj_concl_id_pd==0){
					$.ajax({
						type:'POST',
						url:'cyclePaie/Paied/php/enreg_concl_pd.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cyclePaie/Paied/php/upd_concl_pd.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_pd:obj_concl_id_pd},
						success:function(){						
						}
					});
				}
				$('#contSupPd').hide();
				$('#contRsciPaie').show();
				$('#mess_slide_conclusion_pd').hide();
				$('#fancybox_bouton_pd').hide();
				openButtSuppd();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_pd">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_pd">
			</td>
		</tr>
	</table>
</div>