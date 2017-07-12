<script>
$(function(){
	$('#enreg_conclus_ferm_vc').click(function(){
		if((document.getElementById("commentaire_Question_vc_sup_conclusion").value=="") || (document.getElementById("rad_Conclus_Faible_vc").checked==false && document.getElementById("rad_Conclus_Moyen_vc").checked==false && document.getElementById("rad_Conclus_Eleve_vc").checked==false)){
			$('#mess_empty_conclus_vc').show();
			$('#mess_Termine_conclusion_vc_sup').hide();
		}
		else{
			mission_id=document.getElementById("tx_miss_conc_vc").value;	
			commentaire=document.getElementById("commentaire_Question_vc_sup_conclusion").value;
			risque="faible";
			if(document.getElementById("rad_Conclus_Faible_vc").checked==true){
			risque="faible";
			}
			if(document.getElementById("rad_Conclus_Moyen_vc").checked==true){
			risque="moyen";
			}	
			if(document.getElementById("rad_Conclus_Eleve_vc").checked==true){
			risque="eleve";
			}
			obj_concl_id_vc=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Ventec/php/detect_concl_id_vc.php',
				data:{mission_id:mission_id},
				success:function(e){
					obj_concl_id_vc=e;
					if(obj_concl_id_vc==0){
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventec/php/enreg_concl_vc.php',
							data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
							success:function(){
							}			
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventec/php/upd_concl_vc.php',
							data:{commentaire:commentaire, risque:risque, obj_concl_id_vc:obj_concl_id_vc},
							success:function(){						
							}
						});
					}
					$('#contSupVc').hide();
					$('#contRsciVente').show();
					$('#mess_Termine_conclusion_vc_sup').hide();
					$('#fancybox_bouton_vc').hide();
					openButtSupvc();
				}
			});
		}
	});
	
	$('#continue_fermer_conclus_vc_sup').click(function(){
		$('#fancybox_bouton_vc').hide();
		$('#mess_Termine_conclusion_vc_sup').hide();
		openButtSupvc();
	});
});

</script>


<div id="message_Terminer_conclus_sup_vc">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_vc">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_vc_sup">
		</td>
	</tr>
</table>
</div>