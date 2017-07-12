<script>
$(function(){
	$('#enreg_conclus_ferm_pd').click(function(){
		if((document.getElementById("commentaire_Question_pd_sup_conclusion").value=="") || (document.getElementById("rad_Conclus_Faible_pd").checked==false && document.getElementById("rad_Conclus_Moyen_pd").checked==false && document.getElementById("rad_Conclus_Eleve_pd").checked==false)){
			$('#mess_empty_conclus_pd').show();
			$('#mess_Termine_conclusion_pd_sup').hide();
		}
		else{
			mission_id=document.getElementById("tx_miss_conc_pd").value;	
			commentaire=document.getElementById("commentaire_Question_pd_sup_conclusion").value;
			risque="faible";
			if(document.getElementById("rad_Conclus_Faible_pd").checked==true){
			risque="faible";
			}
			if(document.getElementById("rad_Conclus_Moyen_pd").checked==true){
			risque="moyen";
			}	
			if(document.getElementById("rad_Conclus_Eleve_pd").checked==true){
			risque="eleve";
			}
			obj_concl_id_pd=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paied/php/detect_concl_id_pd.php',
				data:{mission_id:mission_id},
				success:function(e){
					obj_concl_id_pd=e;
					if(obj_concl_id_pd==0){
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paied/php/enreg_concl_pd.php',
							data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
							success:function(){
							}			
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paied/php/upd_concl_pd.php',
							data:{commentaire:commentaire, risque:risque, obj_concl_id_pd:obj_concl_id_pd},
							success:function(){						
							}
						});
					}
					$('#contSupPd').hide();
					$('#contRsciPaie').show();
					$('#mess_Termine_conclusion_pd_sup').hide();
					$('#fancybox_bouton_pd').hide();
					openButtSuppd();
				}
			});
		}
	});
	
	$('#continue_fermer_conclus_pd_sup').click(function(){
		$('#fancybox_bouton_pd').hide();
		$('#mess_Termine_conclusion_pd_sup').hide();
		openButtSuppd();
	});
});

</script>


<div id="message_Terminer_conclus_sup_pd">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_pd">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_pd_sup">
		</td>
	</tr>
</table>
</div>