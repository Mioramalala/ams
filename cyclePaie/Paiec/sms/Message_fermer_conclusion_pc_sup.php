<script>
$(function(){
	$('#enreg_conclus_ferm_pc').click(function(){
		if((document.getElementById("commentaire_Question_pc_sup_conclusion").value=="") || (document.getElementById("rad_Conclus_Faible_pc").checked==false && document.getElementById("rad_Conclus_Moyen_pc").checked==false && document.getElementById("rad_Conclus_Eleve_pc").checked==false)){
			$('#mess_empty_conclus_pc').show();
			$('#mess_Termine_conclusion_pc_sup').hide();
		}
		else{
			mission_id=document.getElementById("tx_miss_conc_pc").value;	
			commentaire=document.getElementById("commentaire_Question_pc_sup_conclusion").value;
			risque="faible";
			if(document.getElementById("rad_Conclus_Faible_pc").checked==true){
			risque="faible";
			}
			if(document.getElementById("rad_Conclus_Moyen_pc").checked==true){
			risque="moyen";
			}	
			if(document.getElementById("rad_Conclus_Eleve_pc").checked==true){
			risque="eleve";
			}
			obj_concl_id_pc=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paiec/php/detect_concl_id_pc.php',
				data:{mission_id:mission_id},
				success:function(e){
					obj_concl_id_pc=e;
					if(obj_concl_id_pc==0){
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paiec/php/enreg_concl_pc.php',
							data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
							success:function(){
							}			
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paiec/php/upd_concl_pc.php',
							data:{commentaire:commentaire, risque:risque, obj_concl_id_pc:obj_concl_id_pc},
							success:function(){						
							}
						});
					}
					$('#contSupPc').hide();
					$('#contRsciPaie').show();
					$('#mess_Termine_conclusion_pc_sup').hide();
					$('#fancybox_bouton_pc').hide();
					openButtSuppc();
				}
			});
		}
	});
	
	$('#continue_fermer_conclus_pc_sup').click(function(){
		$('#fancybox_bouton_pc').hide();
		$('#mess_Termine_conclusion_pc_sup').hide();
		openButtSuppc();
	});
});

</script>


<div id="message_Terminer_conclus_sup_pc">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_pc">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_pc_sup">
		</td>
	</tr>
</table>
</div>