<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_pc').click(function(){
		mission_id=document.getElementById("tx_miss_conc_pc").value;	
		commentaire=document.getElementById("commentaire_Question_pc_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_pc").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_pc").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_pc").checked==true){
		risque="eleve";
		}
		obj_concl_id_pc=0;
		$.ajax({
			type:'POST',
			url:'cyclePaie/Paiec/php/detect_concl_id_pc.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_pc=e;
				if(obj_concl_id_pc==0){
					$.ajax({
						type:'POST',
						url:'cyclePaie/Paiec/php/enreg_concl_pc.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cyclePaie/Paiec/php/upd_concl_pc.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_pc:obj_concl_id_pc},
						success:function(){						
						}
					});
				}
				$('#contSupPc').hide();
				$('#contRsciPaie').show();
				$('#mess_slide_conclusion_pc').hide();
				$('#fancybox_bouton_pc').hide();
				openButtSuppc();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_pc">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_pc">
			</td>
		</tr>
	</table>
</div>