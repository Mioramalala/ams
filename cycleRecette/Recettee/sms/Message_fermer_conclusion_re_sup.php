<script>
$(function(){
	$('#enreg_conclus_ferm_re').click(function(){
		if((document.getElementById("commentaire_Question_re_sup_conclusion").value=="") || (document.getElementById("rad_Conclus_Faible_re").checked==false && document.getElementById("rad_Conclus_Moyen_re").checked==false && document.getElementById("rad_Conclus_Eleve_re").checked==false)){
			$('#mess_empty_conclus_re').show();
			$('#mess_Termine_conclusion_re_sup').hide();
		}
		else{
			mission_id=document.getElementById("tx_miss_conc_re").value;	
			commentaire=document.getElementById("commentaire_Question_re_sup_conclusion").value;
			risque="faible";
			if(document.getElementById("rad_Conclus_Faible_re").checked==true){
			risque="faible";
			}
			if(document.getElementById("rad_Conclus_Moyen_re").checked==true){
			risque="moyen";
			}	
			if(document.getElementById("rad_Conclus_Eleve_re").checked==true){
			risque="eleve";
			}
			obj_concl_id_re=0;
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recettee/php/detect_concl_id_re.php',
				data:{mission_id:mission_id},
				success:function(e){
					obj_concl_id_re=e;
					if(obj_concl_id_re==0){
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recettee/php/enreg_concl_re.php',
							data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
							success:function(){
							}			
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recettee/php/upd_concl_re.php',
							data:{commentaire:commentaire, risque:risque, obj_concl_id_re:obj_concl_id_re},
							success:function(){						
							}
						});
					}
					$('#contSupRe').hide();
					$('#contRsciRecette').show();
					$('#mess_Termine_conclusion_re_sup').hide();
					$('#fancybox_bouton_re').hide();
					openButtSupre();
				}
			});
		}
	});
	
	$('#continue_fermer_conclus_re_sup').click(function(){
		$('#fancybox_bouton_re').hide();
		$('#mess_Termine_conclusion_re_sup').hide();
		openButtSupre();
	});
});

</script>


<div id="message_Terminer_conclus_sup_re">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_re">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_re_sup">
		</td>
	</tr>
</table>
</div>