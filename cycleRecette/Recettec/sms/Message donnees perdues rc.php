<script>
$(function(){
	$('#fermeture_Annulation_rc').click(function(){
		if((document.getElementById("txt_Synthese_rc").value=="") || (document.getElementById("rc_Synthese_rc_Faible").checked==false && document.getElementById("rc_Synthese_rc_Moyen").checked==false && document.getElementById("rc_Synthese_rc_Eleve").checked==false)){
			$('#Int_Synthese_rc').hide();
			$('#mess_vide_synthese_rc').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_rc").value;
			commentaire=document.getElementById("txt_Synthese_rc").value;
			risque="faible";
			if(document.getElementById("rc_Synthese_rc_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rc_Synthese_rc_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rc_Synthese_rc_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recettec/php/detect_synth_rc_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_id=e;
					if(synthese_f_id==0){
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recettec/php/enreg_synth_rc.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recettec/php/upd_synth_rc.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#message_Donnees_Percu_rc').hide();
					$('#fancybox_rc').hide();
					//$('#contenue_rsci').show();
					$('#dv_cont_obj_rc').hide();
					/////
					$('#contrc').hide();
					$('#contRsciRecette').show();
				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_rc').click(function(){
		$('#message_Donnees_Percu_rc').hide();
		$('#Int_Synthese_rc').hide();
		$('#fancybox_rc').hide();
	});
});
</script>
<div id="Int_Synthese_Donnee_Percu_rc">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_rc">&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_rc">
			</td>
		</tr>
	</table>
</div>