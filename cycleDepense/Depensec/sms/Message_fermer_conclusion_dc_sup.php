<script>
$(function(){
	$('#enreg_conclus_ferm_dc').click(function(){
		if((document.getElementById("commentaire_Question_dc_sup_conclusion").value=="") || (document.getElementById("rad_Conclus_Faible_dc").checked==false && document.getElementById("rad_Conclus_Moyen_dc").checked==false && document.getElementById("rad_Conclus_Eleve_dc").checked==false)){
			$('#mess_empty_conclus_dc').show();
			$('#mess_Termine_conclusion_dc_sup').hide();
		}
		else{
			mission_id=document.getElementById("tx_miss_conc_dc").value;	
			commentaire=document.getElementById("commentaire_Question_dc_sup_conclusion").value;
			risque="faible";
			if(document.getElementById("rad_Conclus_Faible_dc").checked==true){
			risque="faible";
			}
			if(document.getElementById("rad_Conclus_Moyen_dc").checked==true){
			risque="moyen";
			}	
			if(document.getElementById("rad_Conclus_Eleve_dc").checked==true){
			risque="eleve";
			}
			obj_concl_id_dc=0;
			$.ajax({
				type:'POST',
				url:'cycleDepense/Depensec/php/detect_concl_id_dc.php',
				data:{mission_id:mission_id},
				success:function(e){
					obj_concl_id_dc=e;
					if(obj_concl_id_dc==0){
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depensec/php/enreg_concl_dc.php',
							data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
							success:function(){
							}			
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depensec/php/upd_concl_dc.php',
							data:{commentaire:commentaire, risque:risque, obj_concl_id_dc:obj_concl_id_dc},
							success:function(){						
							}
						});
					}
					$('#contSupDc').hide();
					$('#contRsciDepense').show();
					$('#mess_Termine_conclusion_dc_sup').hide();
					$('#fancybox_bouton_dc').hide();
					openButtSupdc();
				}
			});
		}
	});
	
	$('#continue_fermer_conclus_dc_sup').click(function(){
		$('#fancybox_bouton_dc').hide();
		$('#mess_Termine_conclusion_dc_sup').hide();
		openButtSupdc();
	});
});

</script>


<div id="message_Terminer_conclus_sup_dc">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_dc">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_dc_sup">
		</td>
	</tr>
</table>
</div>