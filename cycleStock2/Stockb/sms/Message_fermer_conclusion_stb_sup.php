<script>
$(function(){
	$('#enreg_conclus_ferm_stb').click(function(){
		if((document.getElementById("commentaire_Question_stb_sup_conclusion").value=="") || (document.getElementById("rad_Conclus_Faible_stb").checked==false && document.getElementById("rad_Conclus_Moyen_stb").checked==false && document.getElementById("rad_Conclus_Eleve_stb").checked==false)){
			$('#mess_empty_conclus_stb').show();
			$('#mess_Termine_conclusion_stb_sup').hide();
		}
		else{
			mission_id=document.getElementById("tx_miss_conc_stb").value;	
			commentaire=document.getElementById("commentaire_Question_stb_sup_conclusion").value;
			risque="faible";
			if(document.getElementById("rad_Conclus_Faible_stb").checked==true){
			risque="faible";
			}
			if(document.getElementById("rad_Conclus_Moyen_stb").checked==true){
			risque="moyen";
			}	
			if(document.getElementById("rad_Conclus_Eleve_stb").checked==true){
			risque="eleve";
			}
			obj_concl_id_stb=0;
			$.ajax({
				type:'POST',
				url:'cycleStock/Stockb/php/detect_concl_id_stb.php',
				data:{mission_id:mission_id},
				success:function(e){
					obj_concl_id_stb=e;
					if(obj_concl_id_stb==0){
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockb/php/enreg_concl_stb.php',
							data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
							success:function(){
							}			
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockb/php/upd_concl_stb.php',
							data:{commentaire:commentaire, risque:risque, obj_concl_id_stb:obj_concl_id_stb},
							success:function(){						
							}
						});
					}
					$('#contSupstb').hide();
					$('#contRsciStock').show();
					$('#mess_Termine_conclusion_stb_sup').hide();
					$('#fancybox_bouton_stb').hide();
					openButtSupstb();
				}
			});
		}
	});
	
	$('#continue_fermer_conclus_stb_sup').click(function(){
		$('#fancybox_bouton_stb').hide();
		$('#mess_Termine_conclusion_stb_sup').hide();
		openButtSupstb();
	});
});

</script>


<div id="message_Terminer_conclus_sup_stb">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_stb">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_stb_sup">
		</td>
	</tr>
</table>
</div>