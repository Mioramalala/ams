<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_e').click(function(){
		mission_id=document.getElementById("tx_miss_conc_e").value;	
		commentaire=document.getElementById("commentaire_Question_e_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_e").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_e").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_e").checked==true){
		risque="eleve";
		}
		obj_concl_id_e=0;
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achat_e/php/detect_concl_id_e.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_e=e;
				if(obj_concl_id_e==0){
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achat_e/php/enreg_concl_e.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achat_e/php/upd_concl_e.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_e:obj_concl_id_e},
						success:function(){						
						}
					});
				}
				$('#dv_cont_obj_e_sup').hide();
				$('#contenue_rsci').show();
				$('#mess_slide_conclusion_e').hide();
				$('#fancybox_bouton_e').hide();
				openButtSupe();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_e">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_e">
			</td>
		</tr>
	</table>
</div>