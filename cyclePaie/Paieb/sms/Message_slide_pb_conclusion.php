<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_pb').click(function(){
		mission_id=document.getElementById("tx_miss_conc_pb").value;	
		commentaire=document.getElementById("commentaire_Question_pb_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_pb").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_pb").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_pb").checked==true){
		risque="eleve";
		}
		obj_concl_id_pb=0;
		$.ajax({
			type:'POST',
			url:'cyclePaie/Paieb/php/detect_concl_id_pb.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_pb=e;
				if(obj_concl_id_pb==0){
					$.ajax({
						type:'POST',
						url:'cyclePaie/Paieb/php/enreg_concl_pb.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cyclePaie/Paieb/php/upd_concl_pb.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_pb:obj_concl_id_pb},
						success:function(){						
						}
					});
				}
				$('#contSupPb').hide();
				$('#contRsciPaie').show();
				$('#mess_slide_conclusion_pb').hide();
				$('#fancybox_bouton_pb').hide();
				openButtSuppb();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_pb">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_pb">
			</td>
		</tr>
	</table>
</div>