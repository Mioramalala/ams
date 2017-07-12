<script>
$(function(){
	$('#enreg_conclus_ferm_e').click(function(){
		mission_id=document.getElementById("tx_miss_conc_e").value;	
		commentaire=document.getElementById("commentaire_Question_e_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_e").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_e").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_e").checked==true){
		risque="eleve";
		}
		obj_concl_id_e=0;
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achat_e/php/detect_concl_id_e.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_e=e;
				if(obj_concl_id_e==0){
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achat_e/php/enreg_concl_e.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achat_e/php/upd_concl_e.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_e:obj_concl_id_e},
						success:function(){						
						}
					});
				}
				$('#dv_cont_obj_e_sup').hide();
				$('#contenue_rsci').show();
				$('#mess_Termine_conclusion_e_sup').hide();
				$('#fancybox_bouton_e').hide();
				openButtSupe();
			}
		});
	});
	
	$('#continue_fermer_conclus_e_sup').click(function(){
		$('#fancybox_bouton_e').hide();
		$('#mess_Termine_conclusion_e_sup').hide();
		openButtSupe();
	});
});

</script>


<div id="message_Terminer_conclus_sup_e">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_e" <?php if($commentaire1 != "") echo 'disabled'; ?> >&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_e_sup" >
		</td>
	</tr>
</table>
</div>