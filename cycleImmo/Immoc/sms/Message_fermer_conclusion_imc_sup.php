<script>
$(function(){
	$('#enreg_conclus_ferm_imc').click(function(){
		if((document.getElementById("commentaire_Question_imc_sup_conclusion").value=="") || (document.getElementById("rad_Conclus_Faible_imc").checked==false && document.getElementById("rad_Conclus_Moyen_imc").checked==false && document.getElementById("rad_Conclus_Eleve_imc").checked==false)){
			$('#mess_empty_conclus_imc').show();
			$('#mess_Termine_conclusion_imc_sup').hide();
		}
		else{
			mission_id=document.getElementById("tx_miss_conc_imc").value;	
			commentaire=document.getElementById("commentaire_Question_imc_sup_conclusion").value;
			risque="faible";
			if(document.getElementById("rad_Conclus_Faible_imc").checked==true){
			risque="faible";
			}
			if(document.getElementById("rad_Conclus_Moyen_imc").checked==true){
			risque="moyen";
			}	
			if(document.getElementById("rad_Conclus_Eleve_imc").checked==true){
			risque="eleve";
			}
			obj_concl_id_imc=0;
			$.ajax({
				type:'POST',
				url:'cycleImmo/Immoc/php/detect_concl_id_imc.php',
				data:{mission_id:mission_id},
				success:function(e){
					obj_concl_id_imc=e;
					if(obj_concl_id_imc==0){
						$.ajax({
							type:'POST',
							url:'cycleImmo/Immoc/php/enreg_concl_imc.php',
							data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
							success:function(){
							}			
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleImmo/Immoc/php/upd_concl_imc.php',
							data:{commentaire:commentaire, risque:risque, obj_concl_id_imc:obj_concl_id_imc},
							success:function(){						
							}
						});
					}
					$('#contSupimc').hide();
					$('#contRsciImmo').show();
					$('#mess_Termine_conclusion_imc_sup').hide();
					$('#fancybox_bouton_imc').hide();
					openButtSupimc();
				}
			});
		}
	});
	
	$('#continue_fermer_conclus_imc_sup').click(function(){
		$('#fancybox_bouton_imc').hide();
		$('#mess_Termine_conclusion_imc_sup').hide();
		openButtSupimc();
	});
});

</script>


<div id="message_Terminer_conclus_sup_imc">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_imc">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_imc_sup">
		</td>
	</tr>
</table>
</div>