<script>
$(function(){
	$('#enreg_conclus_ferm_f').click(function(){
		mission_id=document.getElementById("tx_miss_conc_f").value;	
		commentaire=document.getElementById("commentaire_Question_f_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_f").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_f").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_f").checked==true){
		risque="eleve";
		}
		obj_concl_id_f=0;
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achat_f/php/detect_concl_id_f.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_f=e;
				if(obj_concl_id_f==0){
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achat_f/php/enreg_concl_f.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achat_f/php/upd_concl_f.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_f:obj_concl_id_f},
						success:function(){						
						}
					});
				}
				$('#dv_cont_obj_f_sup').hide();
				$('#contenue_rsci').show();
				$('#mess_Termine_conclusion_f_sup').hide();
				$('#fancybox_bouton_f').hide();
				openButtSupf();
			}
		});
	});
	
	$('#continue_fermer_conclus_f_sup').click(function(){
		$('#fancybox_bouton_f').hide();
		$('#mess_Termine_conclusion_f_sup').hide();
		openButtSupf();
	});
});

</script>


<div id="message_Terminer_conclus_sup_f">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_f" <?php if($commentaire1 != "") echo 'disabled'; ?> >&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_f_sup">
		</td>
	</tr>
</table>
</div>