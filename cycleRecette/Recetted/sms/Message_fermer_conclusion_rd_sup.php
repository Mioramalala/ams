<script>
$(function(){
	$('#enreg_conclus_ferm_rd').click(function(){
		if((document.getElementById("commentaire_Question_rd_sup_conclusion").value=="") || (document.getElementById("rad_Conclus_Faible_rd").checked==false && document.getElementById("rad_Conclus_Moyen_rd").checked==false && document.getElementById("rad_Conclus_Eleve_rd").checked==false)){
			$('#mess_empty_conclus_rd').show();
			$('#mess_Termine_conclusion_rd_sup').hide();
		}
		else{
			mission_id=document.getElementById("tx_miss_conc_rd").value;	
			commentaire=document.getElementById("commentaire_Question_rd_sup_conclusion").value;
			risque="faible";
			if(document.getElementById("rad_Conclus_Faible_rd").checked==true){
			risque="faible";
			}
			if(document.getElementById("rad_Conclus_Moyen_rd").checked==true){
			risque="moyen";
			}	
			if(document.getElementById("rad_Conclus_Eleve_rd").checked==true){
			risque="eleve";
			}
			obj_concl_id_rd=0;
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recetted/php/detect_concl_id_rd.php',
				data:{mission_id:mission_id},
				success:function(e){
					obj_concl_id_rd=e;
					if(obj_concl_id_rd==0){
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recetted/php/enreg_concl_rd.php',
							data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
							success:function(){
							}			
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recetted/php/upd_concl_rd.php',
							data:{commentaire:commentaire, risque:risque, obj_concl_id_rd:obj_concl_id_rd},
							success:function(){						
							}
						});
					}
					$('#contSupRd').hide();
					$('#contRsciRecette').show();
					$('#mess_Termine_conclusion_rd_sup').hide();
					$('#fancybox_bouton_rd').hide();
					openButtSuprd();
				}
			});
		}
	});
	
	$('#continue_fermer_conclus_rd_sup').click(function(){
		$('#fancybox_bouton_rd').hide();
		$('#mess_Termine_conclusion_rd_sup').hide();
		openButtSuprd();
	});
});

</script>


<div id="message_Terminer_conclus_sup_rd">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_rd">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_rd_sup">
		</td>
	</tr>
</table>
</div>