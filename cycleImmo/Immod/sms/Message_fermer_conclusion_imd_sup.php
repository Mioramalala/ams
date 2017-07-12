<script>
$(function(){
	$('#enreg_conclus_ferm_imd').click(function(){
		if((document.getElementById("commentaire_Question_imd_sup_conclusion").value=="") || (document.getElementById("rad_Conclus_Faible_imd").checked==false && document.getElementById("rad_Conclus_Moyen_imd").checked==false && document.getElementById("rad_Conclus_Eleve_imd").checked==false)){
			$('#mess_empty_conclus_imd').show();
			$('#mess_Termine_conclusion_imd_sup').hide();
		}
		else{
			mission_id=document.getElementById("tx_miss_conc_imd").value;	
			commentaire=document.getElementById("commentaire_Question_imd_sup_conclusion").value;
			risque="faible";
			if(document.getElementById("rad_Conclus_Faible_imd").checked==true){
			risque="faible";
			}
			if(document.getElementById("rad_Conclus_Moyen_imd").checked==true){
			risque="moyen";
			}	
			if(document.getElementById("rad_Conclus_Eleve_imd").checked==true){
			risque="eleve";
			}
			obj_concl_id_imd=0;
			$.ajax({
				type:'POST',
				url:'cycleImmo/Immod/php/detect_concl_id_imd.php',
				data:{mission_id:mission_id},
				success:function(e){
					obj_concl_id_imd=e;
					if(obj_concl_id_imd==0){
						$.ajax({
							type:'POST',
							url:'cycleImmo/Immod/php/enreg_concl_imd.php',
							data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
							success:function(){
							}			
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleImmo/Immod/php/upd_concl_imd.php',
							data:{commentaire:commentaire, risque:risque, obj_concl_id_imd:obj_concl_id_imd},
							success:function(){						
							}
						});
					}
					$('#contSupimd').hide();
					$('#contRsciImmo').show();
					$('#mess_Termine_conclusion_imd_sup').hide();
					$('#fancybox_bouton_imd').hide();
					openButtSupimd();
				}
			});
		}
	});
	
	$('#continue_fermer_conclus_imd_sup').click(function(){
		$('#fancybox_bouton_imd').hide();
		$('#mess_Termine_conclusion_imd_sup').hide();
		openButtSupimd();
	});
});

</script>


<div id="message_Terminer_conclus_sup_imd">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_imd">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_imd_sup">
		</td>
	</tr>
</table>
</div>