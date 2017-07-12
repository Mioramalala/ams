<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_rc').click(function(){
		mission_id=document.getElementById("tx_miss_conc_rc").value;	
		commentaire=document.getElementById("commentaire_Question_rc_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_rc").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_rc").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_rc").checked==true){
		risque="eleve";
		}
		obj_concl_id_rc=0;
		$.ajax({
			type:'POST',
			url:'cycleRecette/Recettec/php/detect_concl_id_rc.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_rc=e;
				if(obj_concl_id_rc==0){
					$.ajax({
						type:'POST',
						url:'cycleRecette/Recettec/php/enreg_concl_rc.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleRecette/Recettec/php/upd_concl_rc.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_rc:obj_concl_id_rc},
						success:function(){						
						}
					});
				}
				$('#contSupRc').hide();
				$('#contRsciRecette').show();
				$('#mess_slide_conclusion_rc').hide();
				$('#fancybox_bouton_rc').hide();
				openButtSuprc();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_rc">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_rc">
			</td>
		</tr>
	</table>
</div>