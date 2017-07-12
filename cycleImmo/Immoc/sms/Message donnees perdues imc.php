<script>
$(function(){
	$('#fermeture_Annulation_imc').click(function(){
		if((document.getElementById("txt_Synthese_imc").value=="") || (document.getElementById("rd_Synthese_imc_Faible").checked==false && document.getElementById("rd_Synthese_imc_Moyen").checked==false && document.getElementById("rd_Synthese_imc_Eleve").checked==false)){
			$('#Int_Synthese_imc').hide();
			$('#mess_vide_synthese_imc').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_imc").value;
			commentaire=document.getElementById("txt_Synthese_imc").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_imc_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_imc_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_imc_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleImmo/Immoc/php/detect_synth_imc_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_id=e;
					if(synthese_f_id==0){
						$.ajax({
							type:'POST',
							url:'cycleImmo/Immoc/php/enreg_synth_imc.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleImmo/Immoc/php/upd_synth_imc.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#message_Donnees_Perdu_imc').hide();
					$('#fancybox_imc').hide();
					//$('#contenue_rsci').show();
					$('#dv_cont_obj_imc').hide();
					////
					$('#contimc').hide();
					$('#contRsciImmo').show();

				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_imc').click(function(){
		$('#message_Donnees_Perdu_imc').hide();
		$('#Int_Synthese_imc').hide();
		$('#fancybox_imc').hide();
	});
});
</script>
<div id="Int_Synthese_Donnee_Perdu_imc">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_imc">&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_imc">
			</td>
		</tr>
	</table>
</div>