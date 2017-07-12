<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_c').click(function(){
		mission_id=document.getElementById("tx_miss_conc_c").value;	
		commentaire=document.getElementById("commentaire_Question_c_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_c").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_c").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_c").checked==true){
		risque="eleve";
		}
		obj_concl_id_b=0;
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achat_c/php/detect_concl_id_c.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_b=e;
				if(obj_concl_id_b==0){
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achat_c/php/enreg_concl_c.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achat_c/php/upd_concl_c.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_b:obj_concl_id_b},
						success:function(){						
						}
					});
				}
				$('#dv_cont_obj_c_sup').hide();
				$('#contenue_rsci').show();
				$('#mess_slide_conclusion_c').hide();
				$('#fancybox_bouton_c').hide();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_c">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_c">
			</td>
		</tr>
	</table>
</div>