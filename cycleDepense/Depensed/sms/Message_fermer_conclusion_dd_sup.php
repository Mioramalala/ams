<script>
$(function(){
	$('#enreg_conclus_ferm_dd').click(function(){
		if((document.getElementById("commentaire_Question_dd_sup_conclusion").value=="") || (document.getElementById("rad_Conclus_Faible_dd").checked==false && document.getElementById("rad_Conclus_Moyen_dd").checked==false && document.getElementById("rad_Conclus_Eleve_dd").checked==false)){
			$('#mess_empty_conclus_dd').show();
			$('#mess_Termine_conclusion_dd_sup').hide();
		}
		else{
			mission_id=document.getElementById("tx_miss_conc_dd").value;	
			commentaire=document.getElementById("commentaire_Question_dd_sup_conclusion").value;
			risque="faible";
			if(document.getElementById("rad_Conclus_Faible_dd").checked==true){
			risque="faible";
			}
			if(document.getElementById("rad_Conclus_Moyen_dd").checked==true){
			risque="moyen";
			}	
			if(document.getElementById("rad_Conclus_Eleve_dd").checked==true){
			risque="eleve";
			}
			obj_concl_id_dd=0;
			$.ajax({
				type:'POST',
				url:'cycleDepense/Depensed/php/detect_concl_id_dd.php',
				data:{mission_id:mission_id},
				success:function(e){
					obj_concl_id_dd=e;
					if(obj_concl_id_dd==0){
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depensed/php/enreg_concl_dd.php',
							data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
							success:function(){
							}			
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depensed/php/upd_concl_dd.php',
							data:{commentaire:commentaire, risque:risque, obj_concl_id_dd:obj_concl_id_dd},
							success:function(){						
							}
						});
					}
					$('#contSupDd').hide();
					$('#contRsciDepense').show();
					$('#mess_Termine_conclusion_dd_sup').hide();
					$('#fancybox_bouton_dd').hide();
					openButtSupdd();
				}
			});
		}
	});
	
	$('#continue_fermer_conclus_dd_sup').click(function(){
		$('#fancybox_bouton_dd').hide();
		$('#mess_Termine_conclusion_dd_sup').hide();
		openButtSupdd();
	});
});

</script>


<div id="message_Terminer_conclus_sup_dd">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_dd">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_dd_sup">
		</td>
	</tr>
</table>
</div>