<script>
$(function(){
	$('#enreg_conclus_ferm_rc').click(function(){
		if((document.getElementById("commentaire_Question_rc_sup_conclusion").value=="") || (document.getElementById("rad_Conclus_Faible_rc").checked==false && document.getElementById("rad_Conclus_Moyen_rc").checked==false && document.getElementById("rad_Conclus_Eleve_rc").checked==false)){
			$('#mess_empty_conclus_rc').show();
			$('#mess_Termine_conclusion_rc_sup').hide();
		}
		else{
			mission_id=document.getElementById("tx_miss_conc_rc").value;	
			commentaire=document.getElementById("commentaire_Question_rc_sup_conclusion").value;
			risque="faible";
			if(document.getElementById("rad_Conclus_Faible_rc").checked==true){
			risque="faible";
			}
			if(document.getElementById("rad_Conclus_Moyen_rc").checked==true){
			risque="moyen";
			}	
			if(document.getElementById("rad_Conclus_Eleve_rc").checked==true){
			risque="eleve";
			}
			obj_concl_id_rc=0;
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recettec/php/detect_concl_id_rc.php',
				data:{mission_id:mission_id},
				success:function(e){
					obj_concl_id_rc=e;
					if(obj_concl_id_rc==0){
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recettec/php/enreg_concl_rc.php',
							data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
							success:function(){
							}			
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recettec/php/upd_concl_rc.php',
							data:{commentaire:commentaire, risque:risque, obj_concl_id_rc:obj_concl_id_rc},
							success:function(){						
							}
						});
					}
					$('#contSupRc').hide();
					$('#contRsciRecette').show();
					$('#mess_Termine_conclusion_rc_sup').hide();
					$('#fancybox_bouton_rc').hide();
					openButtSuprc();
				}
			});
		}
	});
	
	$('#continue_fermer_conclus_rc_sup').click(function(){
		$('#fancybox_bouton_rc').hide();
		$('#mess_Termine_conclusion_rc_sup').hide();
		openButtSuprc();
	});
});

</script>


<div id="message_Terminer_conclus_sup_rc">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues.Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Enregistrer" id="enreg_conclus_ferm_rc">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Continuer" id="continue_fermer_conclus_rc_sup">
		</td>
	</tr>
</table>
</div>