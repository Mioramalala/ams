<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_d').click(function(){
		mission_id=document.getElementById("tx_miss_conc_d").value;	
		commentaire=document.getElementById("commentaire_Question_d_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_d").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_d").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_d").checked==true){
		risque="eleve";
		}
		obj_concl_id_d=0;
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achat_d/php/detect_concl_id_d.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_d=e;
				if(obj_concl_id_d==0){
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achat_d/php/enreg_concl_d.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achat_d/php/upd_concl_d.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_d:obj_concl_id_d},
						success:function(){						
						}
					});
				}
				$('#dv_cont_obj_d_sup').hide();
				$('#contenue_rsci').show();
				$('#mess_slide_conclusion_d').hide();
				$('#fancybox_bouton_d').hide();
				openButtSupd();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_d">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_d">
			</td>
		</tr>
	</table>
</div>