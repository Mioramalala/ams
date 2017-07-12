<script>
$(function(){
	$('#enreg_conclus_ferm_d').click(function(){
		mission_id=document.getElementById("tx_miss_conc_d").value;	
		commentaire=document.getElementById("commentaire_Question_d_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_d").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_d").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_d").checked==true){
		risque="eleve";
		}
		obj_concl_id_d=0;
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achat_d/php/detect_concl_id_d.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_d=e;
				if(obj_concl_id_d==0){
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achat_d/php/enreg_concl_d.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achat_d/php/upd_concl_d.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_d:obj_concl_id_d},
						success:function(){						
						}
					});
				}
				$('#dv_cont_obj_d_sup').hide();
				$('#contenue_rsci').show();
				$('#mess_Termine_conclusion_d_sup').hide();
				$('#fancybox_bouton_d').hide();
				openButtSupd();
			}
		});
	});
	
	$('#continue_fermer_conclus_d_sup').click(function(){
		$('#fancybox_bouton_d').hide();
		$('#mess_Termine_conclusion_d_sup').hide();
		openButtSupd();
	});
});

</script>


<div id="message_Terminer_conclus_sup_d">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_d">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_d_sup">
		</td>
	</tr>
</table>
</div>