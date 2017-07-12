<script>
$(function(){
	$('#enreg_conclus_ferm_vb').click(function(){
		if((document.getElementById("commentaire_Question_vb_sup_conclusion").value=="") || (document.getElementById("rad_Conclus_Faible_vb").checked==false && document.getElementById("rad_Conclus_Moyen_vb").checked==false && document.getElementById("rad_Conclus_Eleve_vb").checked==false)){
			$('#mess_empty_conclus_vb').show();
			$('#mess_Termine_conclusion_vb_sup').hide();
		}
		else{
			mission_id=document.getElementById("tx_miss_conc_vb").value;	
			commentaire=document.getElementById("commentaire_Question_vb_sup_conclusion").value;
			risque="faible";
			if(document.getElementById("rad_Conclus_Faible_vb").checked==true){
			risque="faible";
			}
			if(document.getElementById("rad_Conclus_Moyen_vb").checked==true){
			risque="moyen";
			}	
			if(document.getElementById("rad_Conclus_Eleve_vb").checked==true){
			risque="eleve";
			}
			obj_concl_id_vb=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Venteb/php/detect_concl_id_vb.php',
				data:{mission_id:mission_id},
				success:function(e){
					obj_concl_id_vb=e;
					if(obj_concl_id_vb==0){
						$.ajax({
							type:'POST',
							url:'cycleVente/Venteb/php/enreg_concl_vb.php',
							data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
							success:function(){
							}			
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Venteb/php/upd_concl_vb.php',
							data:{commentaire:commentaire, risque:risque, obj_concl_id_vb:obj_concl_id_vb},
							success:function(){						
							}
						});
					}
					$('#contSupVb').hide();
					$('#contRsciVente').show();
					$('#mess_Termine_conclusion_vb_sup').hide();
					$('#fancybox_bouton_vb').hide();
					openButtSupvb();
				}
			});
		}
	});
	
	$('#continue_fermer_conclus_vb_sup').click(function(){
		$('#fancybox_bouton_vb').hide();
		$('#mess_Termine_conclusion_vb_sup').hide();
		openButtSupvb();
	});
});

</script>


<div id="message_Terminer_conclus_sup_vb">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_vb">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_vb_sup">
		</td>
	</tr>
</table>
</div>