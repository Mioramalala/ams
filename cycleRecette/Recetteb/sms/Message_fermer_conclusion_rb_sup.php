<script>
$(function(){
	$('#enreg_conclus_ferm_rb').click(function(){
		if((document.getElementById("commentaire_Question_rb_sup_conclusion").value=="") || (document.getElementById("rad_Conclus_Faible_rb").checked==false && document.getElementById("rad_Conclus_Moyen_rb").checked==false && document.getElementById("rad_Conclus_Eleve_rb").checked==false)){
			$('#mess_empty_conclus_rb').show();
			$('#mess_Termine_conclusion_rb_sup').hide();
		}
		else{
			mission_id=document.getElementById("tx_miss_conc_rb").value;	
			commentaire=document.getElementById("commentaire_Question_rb_sup_conclusion").value;
			risque="faible";
			if(document.getElementById("rad_Conclus_Faible_rb").checked==true){
			risque="faible";
			}
			if(document.getElementById("rad_Conclus_Moyen_rb").checked==true){
			risque="moyen";
			}	
			if(document.getElementById("rad_Conclus_Eleve_rb").checked==true){
			risque="eleve";
			}
			obj_concl_id_rb=0;
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recetteb/php/detect_concl_id_rb.php',
				data:{mission_id:mission_id},
				success:function(e){
					obj_concl_id_rb=e;
					if(obj_concl_id_rb==0){
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recetteb/php/enreg_concl_rb.php',
							data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
							success:function(){
							}			
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recetteb/php/upd_concl_rb.php',
							data:{commentaire:commentaire, risque:risque, obj_concl_id_rb:obj_concl_id_rb},
							success:function(){						
							}
						});
					}
					$('#contSupRb').hide();
					$('#contRsciRecette').show();
					$('#mess_Termine_conclusion_rb_sup').hide();
					$('#fancybox_bouton_rb').hide();
					openButtSuprb();
				}
			});
		}
	});
	
	$('#continue_fermer_conclus_rb_sup').click(function(){
		$('#fancybox_bouton_rb').hide();
		$('#mess_Termine_conclusion_rb_sup').hide();
		openButtSuprb();
	});
});

</script>


<div id="message_Terminer_conclus_sup_rb">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_rb">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_rb_sup">
		</td>
	</tr>
</table>
</div>