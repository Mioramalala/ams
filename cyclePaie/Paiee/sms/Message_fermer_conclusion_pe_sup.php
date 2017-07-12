<script>
$(function(){
	$('#enreg_conclus_ferm_pe').click(function(){
		if((document.getElementById("commentaire_Question_pe_sup_conclusion").value=="") || (document.getElementById("rad_Conclus_Faible_pe").checked==false && document.getElementById("rad_Conclus_Moyen_pe").checked==false && document.getElementById("rad_Conclus_Eleve_pe").checked==false)){
			$('#mess_empty_conclus_pe').show();
			$('#mess_Termine_conclusion_pe_sup').hide();
		}
		else{
			mission_id=document.getElementById("tx_miss_conc_pe").value;	
			commentaire=document.getElementById("commentaire_Question_pe_sup_conclusion").value;
			risque="faible";
			if(document.getElementById("rad_Conclus_Faible_pe").checked==true){
			risque="faible";
			}
			if(document.getElementById("rad_Conclus_Moyen_pe").checked==true){
			risque="moyen";
			}	
			if(document.getElementById("rad_Conclus_Eleve_pe").checked==true){
			risque="eleve";
			}
			obj_concl_id_pe=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paiee/php/detect_concl_id_pe.php',
				data:{mission_id:mission_id},
				success:function(e){
					obj_concl_id_pe=e;
					if(obj_concl_id_pe==0){
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paiee/php/enreg_concl_pe.php',
							data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
							success:function(){
							}			
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paiee/php/upd_concl_pe.php',
							data:{commentaire:commentaire, risque:risque, obj_concl_id_pe:obj_concl_id_pe},
							success:function(){						
							}
						});
					}
					$('#contSupPe').hide();
					$('#contRsciPaie').show();
					$('#mess_Termine_conclusion_pe_sup').hide();
					$('#fancybox_bouton_pe').hide();
					openButtSuppe();
				}
			});
		}
	});
	
	$('#continue_fermer_conclus_pe_sup').click(function(){
		$('#fancybox_bouton_pe').hide();
		$('#mess_Termine_conclusion_pe_sup').hide();
		openButtSuppe();
	});
});

</script>


<div id="message_Terminer_conclus_sup_pe">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_pe">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_pe_sup">
		</td>
	</tr>
</table>
</div>