<script>
$(function(){
	$('#enreg_conclus_ferm_ev').click(function(){
		if((document.getElementById("commentaire_Question_ev_sup_conclusion").value=="") || (document.getElementById("rad_Conclus_Faible_ev").checked==false && document.getElementById("rad_Conclus_Moyen_ev").checked==false && document.getElementById("rad_Conclus_Eleve_ev").checked==false)){
			$('#mess_empty_conclus_ev').show();
			$('#mess_Termine_conclusion_ev_sup').hide();
		}
		else{
			mission_id=document.getElementById("tx_miss_conc_ev").value;	
			commentaire=document.getElementById("commentaire_Question_ev_sup_conclusion").value;
			risque="faible";
			if(document.getElementById("rad_Conclus_Faible_ev").checked==true){
			risque="faible";
			}
			if(document.getElementById("rad_Conclus_Moyen_ev").checked==true){
			risque="moyen";
			}	
			if(document.getElementById("rad_Conclus_Eleve_ev").checked==true){
			risque="eleve";
			}
			obj_concl_id_ev=0;
			$.ajax({
				type:'POST',
				url:'cycleEnvironnement/EnvQuest/php/detect_concl_id_ev.php',
				data:{mission_id:mission_id},
				success:function(e){
					obj_concl_id_ev=e;
					if(obj_concl_id_ev==0){
						$.ajax({
							type:'POST',
							url:'cycleEnvironnement/EnvQuest/php/enreg_concl_ev.php',
							data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
							success:function(){
							}			
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleEnvironnement/EnvQuest/php/upd_concl_ev.php',
							data:{commentaire:commentaire, risque:risque, obj_concl_id_ev:obj_concl_id_ev},
							success:function(){						
							}
						});
					}
					$('#contSupEv').hide();
					$('#contRsciEnvironnement').show();
					$('#mess_Termine_conclusion_ev_sup').hide();
					$('#fancybox_bouton_ev').hide();
					openButtSupev();
				}
			});
		}
	});
	
	$('#continue_fermer_conclus_ev_sup').click(function(){
		$('#fancybox_bouton_ev').hide();
		$('#mess_Termine_conclusion_ev_sup').hide();
		openButtSupev();
	});
});

</script>


<div id="message_Terminer_conclus_sup_ev">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_ev">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_ev_sup">
		</td>
	</tr>
</table>
</div>