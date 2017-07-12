<script>
$(function(){
	$('#enreg_conclus_ferm_vf').click(function(){
		if((document.getElementById("commentaire_Question_vf_sup_conclusion").value=="") || (document.getElementById("rad_Conclus_Faible_vf").checked==false && document.getElementById("rad_Conclus_Moyen_vf").checked==false && document.getElementById("rad_Conclus_Eleve_vf").checked==false)){
			$('#mess_empty_conclus_vf').show();
			$('#mess_Termine_conclusion_vf_sup').hide();
		}
		else{
			mission_id=document.getElementById("tx_miss_conc_vf").value;	
			commentaire=document.getElementById("commentaire_Question_vf_sup_conclusion").value;
			risque="faible";
			if(document.getElementById("rad_Conclus_Faible_vf").checked==true){
			risque="faible";
			}
			if(document.getElementById("rad_Conclus_Moyen_vf").checked==true){
			risque="moyen";
			}	
			if(document.getElementById("rad_Conclus_Eleve_vf").checked==true){
			risque="eleve";
			}
			obj_concl_id_vf=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Ventef/php/detect_concl_id_vf.php',
				data:{mission_id:mission_id},
				success:function(e){
					obj_concl_id_vf=e;
					if(obj_concl_id_vf==0){
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventef/php/enreg_concl_vf.php',
							data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
							success:function(){
							}			
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventef/php/upd_concl_vf.php',
							data:{commentaire:commentaire, risque:risque, obj_concl_id_vf:obj_concl_id_vf},
							success:function(){						
							}
						});
					}
					$('#contSupVf').hide();
					$('#contRsciVente').show();
					$('#mess_Termine_conclusion_vf_sup').hide();
					$('#fancybox_bouton_vf').hide();
					openButtSupvf();
				}
			});
		}
	});
	
	$('#continue_fermer_conclus_vf_sup').click(function(){
		$('#fancybox_bouton_vf').hide();
		$('#mess_Termine_conclusion_vf_sup').hide();
		openButtSupvf();
	});
});

</script>


<div id="message_Terminer_conclus_sup_vf">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_vf">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_vf_sup">
		</td>
	</tr>
</table>
</div>