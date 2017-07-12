<script>
$(function(){
	$('#enreg_conclus_ferm_acb').click(function(){
		if((document.getElementById("commentaire_Question_acb_sup_conclusion").value=="") || (document.getElementById("rad_Conclus_Faible_acb").checked==false && document.getElementById("rad_Conclus_Moyen_acb").checked==false && document.getElementById("rad_Conclus_Eleve_acb").checked==false)){
			$('#mess_empty_conclus_acb').show();
			$('#mess_Termine_conclusion_acb_sup').hide();
		}
		else{
			mission_id=document.getElementById("tx_miss_conc_acb").value;	
			commentaire=document.getElementById("commentaire_Question_acb_sup_conclusion").value;
			risque="faible";
			if(document.getElementById("rad_Conclus_Faible_acb").checked==true){
			risque="faible";
			}
			if(document.getElementById("rad_Conclus_Moyen_acb").checked==true){
			risque="moyen";
			}	
			if(document.getElementById("rad_Conclus_Eleve_acb").checked==true){
			risque="eleve";
			}
			obj_concl_id_acb=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_b/php/detect_concl_id_acb.php',
				data:{mission_id:mission_id},
				success:function(e){
					obj_concl_id_acb=e;
					if(obj_concl_id_acb==0){
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_b/php/enreg_concl_acb.php',
							data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
							success:function(){
							}			
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_b/php/upd_concl_acb.php',
							data:{commentaire:commentaire, risque:risque, obj_concl_id_acb:obj_concl_id_acb},
							success:function(){						
							}
						});
					}
					$('#dv_cont_obj_sup_b').hide();
					$('#contenue_rsci').show();
					$('#mess_Termine_conclusion_acb_sup').hide();
					$('#fancybox_bouton_acb').hide();
					openButtSupacb();
				}
			});
		}
	});
	
	$('#continue_fermer_conclus_acb_sup').click(function(){
		$('#fancybox_bouton_acb').hide();
		$('#mess_Termine_conclusion_acb_sup').hide();
		openButtSupacb();
	});
});

</script>


<div id="message_Terminer_conclus_sup_acb">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_acb" <?php if($commentaire1 != "") echo 'disabled'; ?> />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_acb_sup" />
		</td>
	</tr>
</table>
</div>