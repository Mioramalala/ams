<script>
$(function(){
	$('#enreg_conclus_ferm_de').click(function(){
		if((document.getElementById("commentaire_Question_de_sup_conclusion").value=="") || (document.getElementById("rad_Conclus_Faible_de").checked==false && document.getElementById("rad_Conclus_Moyen_de").checked==false && document.getElementById("rad_Conclus_Eleve_de").checked==false)){
			$('#mess_empty_conclus_de').show();
			$('#mess_Termine_conclusion_de_sup').hide();
		}
		else{
			mission_id=document.getElementById("tx_miss_conc_de").value;	
			commentaire=document.getElementById("commentaire_Question_de_sup_conclusion").value;
			risque="faible";
			if(document.getElementById("rad_Conclus_Faible_de").checked==true){
			risque="faible";
			}
			if(document.getElementById("rad_Conclus_Moyen_de").checked==true){
			risque="moyen";
			}	
			if(document.getElementById("rad_Conclus_Eleve_de").checked==true){
			risque="eleve";
			}
			obj_concl_id_de=0;
			$.ajax({
				type:'POST',
				url:'cycleDepense/Depensee/php/detect_concl_id_de.php',
				data:{mission_id:mission_id},
				success:function(e){
					obj_concl_id_de=e;
					if(obj_concl_id_de==0){
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depensee/php/enreg_concl_de.php',
							data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
							success:function(){
							}			
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depensee/php/upd_concl_de.php',
							data:{commentaire:commentaire, risque:risque, obj_concl_id_de:obj_concl_id_de},
							success:function(){						
							}
						});
					}
					$('#contSupDe').hide();
					$('#contRsciDepense').show();
					$('#mess_Termine_conclusion_de_sup').hide();
					$('#fancybox_bouton_de').hide();
					openButtSupde();
				}
			});
		}
	});
	
	$('#continue_fermer_conclus_de_sup').click(function(){
		$('#fancybox_bouton_de').hide();
		$('#mess_Termine_conclusion_de_sup').hide();
		openButtSupde();
	});
});

</script>


<div id="message_Terminer_conclus_sup_de">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_de">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_de_sup">
		</td>
	</tr>
</table>
</div>