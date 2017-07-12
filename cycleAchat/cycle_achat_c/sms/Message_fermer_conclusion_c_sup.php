<script>
$(function(){
	$('#enreg_conclus_ferm_c').click(function(){
		mission_id=document.getElementById("tx_miss_conc_c").value;	
		commentaire=document.getElementById("commentaire_Question_c_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_c").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_c").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_c").checked==true){
		risque="eleve";
		}
		obj_concl_id_c=0;
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achat_c/php/detect_concl_id_c.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_c=e;
				if(obj_concl_id_c==0){
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achat_c/php/enreg_concl_c.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achat_c/php/upd_concl_c.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_c:obj_concl_id_c},
						success:function(){						
						}
					});
				}
				$('#dv_cont_obj_c_sup').hide();
				$('#contenue_rsci').show();
				$('#mess_Termine_conclusion_c_sup').hide();
				$('#fancybox_bouton_c').hide();
				openButtSupc();
			}
		});
	});
	
	$('#continue_fermer_conclus_c_sup').click(function(){
		$('#fancybox_bouton_c').hide();
		$('#mess_Termine_conclusion_c_sup').hide();
		openButtSupc();
	});
});

</script>


<div id="message_Terminer_conclus_sup_c">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_c">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_c_sup">
		</td>
	</tr>
</table>
</div>