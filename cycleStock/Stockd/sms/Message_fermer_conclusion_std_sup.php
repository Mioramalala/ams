<script>
$(function(){
	$('#enreg_conclus_ferm_std').click(function(){
		if((document.getElementById("commentaire_Question_std_sup_conclusion").value=="") || (document.getElementById("rad_Conclus_Faible_std").checked==false && document.getElementById("rad_Conclus_Moyen_std").checked==false && document.getElementById("rad_Conclus_Eleve_std").checked==false)){
			$('#mess_empty_conclus_std').show();
			$('#mess_Termine_conclusion_std_sup').hide();
		}
		else{
			mission_id=document.getElementById("tx_miss_conc_std").value;	
			commentaire=document.getElementById("commentaire_Question_std_sup_conclusion").value;
			risque="faible";
			if(document.getElementById("rad_Conclus_Faible_std").checked==true)
			{
			risque="faible";
			}
			if(document.getElementById("rad_Conclus_Moyen_std").checked==true){
			risque="moyen";
			}	
			if(document.getElementById("rad_Conclus_Eleve_std").checked==true){
			risque="eleve";
			}
			obj_concl_id_std=0;
			$.ajax({
				type:'POST',
				url:'cycleStock/Stockd/php/detect_concl_id_std.php',
				data:{mission_id:mission_id},
				success:function(e){
					obj_concl_id_std=e;
					if(obj_concl_id_std==0){
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockd/php/enreg_concl_std.php',
							data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
							success:function(){
							}			
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockd/php/upd_concl_std.php',
							data:{commentaire:commentaire, risque:risque, obj_concl_id_std:obj_concl_id_std},
							success:function(){						
							}
						});
					}
					$('#contSupstd').hide();
					$('#contRsciStock').show();
					$('#mess_Termine_conclusion_std_sup').hide();
					$('#fancybox_bouton_std').hide();
					openButtSupstd();
				}
			});
		}
	});
	
	$('#continue_fermer_conclus_std_sup').click(function(){
		$('#fancybox_bouton_std').hide();
		$('#mess_Termine_conclusion_std_sup').hide();
		openButtSupstd();
	});
});

</script>


<div id="message_Terminer_conclus_sup_std">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_std">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_std_sup">
		</td>
	</tr>
</table>
</div>