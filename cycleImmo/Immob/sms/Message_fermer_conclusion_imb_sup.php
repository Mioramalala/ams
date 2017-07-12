<script>
$(function(){
	$('#enreg_conclus_ferm_imb').click(function(){
		if((document.getElementById("commentaire_Question_imb_sup_conclusion").value=="") || (document.getElementById("rad_Conclus_Faible_imb").checked==false && document.getElementById("rad_Conclus_Moyen_imb").checked==false && document.getElementById("rad_Conclus_Eleve_imb").checked==false)){
			$('#mess_empty_conclus_imb').show();
			$('#mess_Termine_conclusion_imb_sup').hide();
		}
		else{
			mission_id=document.getElementById("tx_miss_conc_imb").value;	
			commentaire=document.getElementById("commentaire_Question_imb_sup_conclusion").value;
			risque="faible";
			if(document.getElementById("rad_Conclus_Faible_imb").checked==true){
			risque="faible";
			}
			if(document.getElementById("rad_Conclus_Moyen_imb").checked==true){
			risque="moyen";
			}	
			if(document.getElementById("rad_Conclus_Eleve_imb").checked==true){
			risque="eleve";
			}
			obj_concl_id_imb=0;
			$.ajax({
				type:'POST',
				url:'cycleImmo/immob/php/detect_concl_id_imb.php',
				data:{mission_id:mission_id},
				success:function(e){
					obj_concl_id_imb=e;
					if(obj_concl_id_imb==0){
						$.ajax({
							type:'POST',
							url:'cycleImmo/immob/php/enreg_concl_imb.php',
							data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
							success:function(){
							}			
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleImmo/immob/php/upd_concl_imb.php',
							data:{commentaire:commentaire, risque:risque, obj_concl_id_imb:obj_concl_id_imb},
							success:function(){						
							}
						});
					}
					$('#contSupimb').hide();
					$('#contRsciImmo').show();
					$('#mess_Termine_conclusion_imb_sup').hide();
					$('#fancybox_bouton_imb').hide();
					openButtSupimb();
				}
			});
		}
	});
	
	$('#continue_fermer_conclus_imb_sup').click(function(){
		$('#fancybox_bouton_imb').hide();
		$('#mess_Termine_conclusion_imb_sup').hide();
		openButtSupimb();
	});
});

</script>


<div id="message_Terminer_conclus_sup_imb">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_imb">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_imb_sup">
		</td>
	</tr>
</table>
</div>