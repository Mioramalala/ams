<script>
$(function(){
	$('#enreg_conclus_ferm_pb').click(function(){
		if((document.getElementById("commentaire_Question_pb_sup_conclusion").value=="") || (document.getElementById("rad_Conclus_Faible_pb").checked==false && document.getElementById("rad_Conclus_Moyen_pb").checked==false && document.getElementById("rad_Conclus_Eleve_pb").checked==false)){
			$('#mess_empty_conclus_pb').show();
			$('#mess_Termine_conclusion_pb_sup').hide();
		}
		else{
			mission_id=document.getElementById("tx_miss_conc_pb").value;	
			commentaire=document.getElementById("commentaire_Question_pb_sup_conclusion").value;
			risque="faible";
			if(document.getElementById("rad_Conclus_Faible_pb").checked==true){
			risque="faible";
			}
			if(document.getElementById("rad_Conclus_Moyen_pb").checked==true){
			risque="moyen";
			}	
			if(document.getElementById("rad_Conclus_Eleve_pb").checked==true){
			risque="eleve";
			}
			obj_concl_id_pb=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paieb/php/detect_concl_id_pb.php',
				data:{mission_id:mission_id},
				success:function(e){
					obj_concl_id_pb=e;
					if(obj_concl_id_pb==0){
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paieb/php/enreg_concl_pb.php',
							data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
							success:function(){
							}			
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paieb/php/upd_concl_pb.php',
							data:{commentaire:commentaire, risque:risque, obj_concl_id_pb:obj_concl_id_pb},
							success:function(){						
							}
						});
					}
					$('#contSupPb').hide();
					$('#contRsciPaie').show();
					$('#mess_Termine_conclusion_pb_sup').hide();
					$('#fancybox_bouton_pb').hide();
					openButtSuppb();
				}
			});
		}
	});
	
	$('#continue_fermer_conclus_pb_sup').click(function(){
		$('#fancybox_bouton_pb').hide();
		$('#mess_Termine_conclusion_pb_sup').hide();
		openButtSuppb();
	});
});

</script>


<div id="message_Terminer_conclus_sup_pb">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_pb">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_pb_sup">
		</td>
	</tr>
</table>
</div>