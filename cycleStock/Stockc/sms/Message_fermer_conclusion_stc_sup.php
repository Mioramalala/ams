<script>
$(function(){
	$('#enreg_conclus_ferm_stc').click(function(){
		if((document.getElementById("commentaire_Question_stc_sup_conclusion").value=="") || (document.getElementById("rad_Conclus_Faible_stc").checked==false && document.getElementById("rad_Conclus_Moyen_stc").checked==false && document.getElementById("rad_Conclus_Eleve_stc").checked==false)){
			$('#mess_empty_conclus_stc').show();
			$('#mess_Termine_conclusion_stc_sup').hide();
		}
		else{
			mission_id=document.getElementById("tx_miss_conc_stc").value;	
			commentaire=document.getElementById("commentaire_Question_stc_sup_conclusion").value;
			risque="faible";
			if(document.getElementById("rad_Conclus_Faible_stc").checked==true){
			risque="faible";
			}
			if(document.getElementById("rad_Conclus_Moyen_stc").checked==true){
			risque="moyen";
			}	
			if(document.getElementById("rad_Conclus_Eleve_stc").checked==true){
			risque="eleve";
			}
			obj_concl_id_stc=0;
			$.ajax({
				type:'POST',
				url:'cycleStock/Stockc/php/detect_concl_id_stc.php',
				data:{mission_id:mission_id},
				success:function(e){
					obj_concl_id_stc=e;
					if(obj_concl_id_stc==0){
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockc/php/enreg_concl_stc.php',
							data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
							success:function(){
							}			
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockc/php/upd_concl_stc.php',
							data:{commentaire:commentaire, risque:risque, obj_concl_id_stc:obj_concl_id_stc},
							success:function(){						
							}
						});
					}
					$('#contSupstc').hide();
					$('#contRsciStock').show();
					$('#mess_Termine_conclusion_stc_sup').hide();
					$('#fancybox_bouton_stc').hide();
					openButtSupstc();
				}
			});
		}
	});
	
	$('#continue_fermer_conclus_stc_sup').click(function(){
		$('#fancybox_bouton_stc').hide();
		$('#mess_Termine_conclusion_stc_sup').hide();
		openButtSupstc();
	});
});

</script>


<div id="message_Terminer_conclus_sup_stc">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_stc">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_stc_sup">
		</td>
	</tr>
</table>
</div>