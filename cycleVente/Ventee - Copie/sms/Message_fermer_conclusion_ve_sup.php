<script>
$(function(){
	$('#enreg_conclus_ferm_ve').click(function(){
		if((document.getElementById("commentaire_Question_ve_sup_conclusion").value=="") || (document.getElementById("rad_Conclus_Faible_ve").checked==false && document.getElementById("rad_Conclus_Moyen_ve").checked==false && document.getElementById("rad_Conclus_Eleve_ve").checked==false)){
			$('#mess_empty_conclus_ve').show();
			$('#mess_Termine_conclusion_ve_sup').hide();
		}
		else{
			mission_id=document.getElementById("tx_miss_conc_ve").value;	
			commentaire=document.getElementById("commentaire_Question_ve_sup_conclusion").value;
			risque="faible";
			if(document.getElementById("rad_Conclus_Faible_ve").checked==true){
			risque="faible";
			}
			if(document.getElementById("rad_Conclus_Moyen_ve").checked==true){
			risque="moyen";
			}	
			if(document.getElementById("rad_Conclus_Eleve_ve").checked==true){
			risque="eleve";
			}
			obj_concl_id_ve=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Ventee/php/detect_concl_id_ve.php',
				data:{mission_id:mission_id},
				success:function(e){
					obj_concl_id_ve=e;
					if(obj_concl_id_ve==0){
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventee/php/enreg_concl_ve.php',
							data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
							success:function(){
							}			
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventee/php/upd_concl_ve.php',
							data:{commentaire:commentaire, risque:risque, obj_concl_id_ve:obj_concl_id_ve},
							success:function(){						
							}
						});
					}
					$('#contSupVe').hide();
					$('#contRsciVente').show();
					$('#mess_Termine_conclusion_ve_sup').hide();
					$('#fancybox_bouton_ve').hide();
					openButtSupve();
				}
			});
		}
	});
	
	$('#continue_fermer_conclus_ve_sup').click(function(){
		$('#fancybox_bouton_ve').hide();
		$('#mess_Termine_conclusion_ve_sup').hide();
		openButtSupve();
	});
});

</script>


<div id="message_Terminer_conclus_sup_ve">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_ve">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_ve_sup">
		</td>
	</tr>
</table>
</div>