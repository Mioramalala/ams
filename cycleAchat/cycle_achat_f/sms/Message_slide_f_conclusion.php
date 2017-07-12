<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_f').click(function(){
		mission_id=document.getElementById("tx_miss_conc_f").value;	
		commentaire=document.getElementById("commentaire_Question_f_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_f").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_f").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_f").checked==true){
		risque="eleve";
		}
		obj_concl_id_f=0;
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achat_f/php/detect_concl_id_f.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_f=e;
				if(obj_concl_id_f==0){
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achat_f/php/enreg_concl_f.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achat_f/php/upd_concl_f.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_f:obj_concl_id_f},
						success:function(){						
						}
					});
				}
				$('#dv_cont_obj_f_sup').hide();
				$('#contenue_rsci').show();
				$('#mess_slide_conclusion_f').hide();
				$('#fancybox_bouton_f').hide();
				openButtSupf();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_f">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_f">
			</td>
		</tr>
	</table>
</div>