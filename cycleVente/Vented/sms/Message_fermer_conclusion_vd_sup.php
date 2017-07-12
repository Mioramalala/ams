<script>
$(function(){
	$('#enreg_conclus_ferm_vd').click(function(){
		if((document.getElementById("commentaire_Question_vd_sup_conclusion").value=="") || (document.getElementById("rad_Conclus_Faible_vd").checked==false && document.getElementById("rad_Conclus_Moyen_vd").checked==false && document.getElementById("rad_Conclus_Eleve_vd").checked==false)){
			$('#mess_empty_conclus_vd').show();
			$('#mess_Termine_conclusion_vd_sup').hide();
		}
		else{
			mission_id=document.getElementById("tx_miss_conc_vd").value;	
			commentaire=document.getElementById("commentaire_Question_vd_sup_conclusion").value;
			risque="faible";
			if(document.getElementById("rad_Conclus_Faible_vd").checked==true){
			risque="faible";
			}
			if(document.getElementById("rad_Conclus_Moyen_vd").checked==true){
			risque="moyen";
			}	
			if(document.getElementById("rad_Conclus_Eleve_vd").checked==true){
			risque="eleve";
			}
			obj_concl_id_vd=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Vented/php/detect_concl_id_vd.php',
				data:{mission_id:mission_id},
				success:function(e){
					obj_concl_id_vd=e;
					if(obj_concl_id_vd==0){
						$.ajax({
							type:'POST',
							url:'cycleVente/Vented/php/enreg_concl_vd.php',
							data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
							success:function(){
							}			
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Vented/php/upd_concl_vd.php',
							data:{commentaire:commentaire, risque:risque, obj_concl_id_vd:obj_concl_id_vd},
							success:function(){						
							}
						});
					}
					$('#contSupVd').hide();
					$('#contRsciVente').show();
					$('#mess_Termine_conclusion_vd_sup').hide();
					$('#fancybox_bouton_vd').hide();
					openButtSupvd();
				}
			});
		}
	});
	
	$('#continue_fermer_conclus_vd_sup').click(function(){
		$('#fancybox_bouton_vd').hide();
		$('#mess_Termine_conclusion_vd_sup').hide();
		openButtSupvd();
	});
});

</script>


<div id="message_Terminer_conclus_sup_vd">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_vd">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_vd_sup">
		</td>
	</tr>
</table>
</div>