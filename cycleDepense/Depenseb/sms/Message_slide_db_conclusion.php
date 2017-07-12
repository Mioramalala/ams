<script>
$(function(){
//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_db').click(function(){
		mission_id=document.getElementById("tx_miss_conc_db").value;	
		commentaire=document.getElementById("commentaire_Question_db_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_db").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_db").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_db").checked==true){
		risque="eleve";
		}
		
		obj_concl_id_db=0;
		$.ajax({
			type:'POST',
			url:'cycledepense/depenseb/php/detect_concl_id_db.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_db=e;
				if(obj_concl_id_db==0){
					$.ajax({
						type:'POST',
						url:'cycledepense/depenseb/php/enreg_concl_db.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycledepense/depenseb/php/upd_concl_db.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_db:obj_concl_id_db},
						success:function(){						
						}
					});
				}
				$('#contSupDb').hide();
				$('#contRsciDepense').show();
				$('#mess_slide_conclusion_db').hide();
				$('#fancybox_bouton_db').hide();
				openButtSupdb();
			}
		});
	});
});
</script>
<div id="message_confirmation_slide_Synthese_db">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_db">
			</td>
		</tr>
	</table>
</div>