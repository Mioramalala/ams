<script>
$(function(){
	$('#fermeture_Annulation_vf').click(function(){
		if((document.getElementById("txt_Synthese_vf").value=="") || (document.getElementById("rd_Synthese_vf_Faible").checked==false && document.getElementById("rd_Synthese_vf_Moyen").checked==false && document.getElementById("rd_Synthese_vf_Eleve").checked==false)){
			$('#Int_Synthese_vf').hide();
			$('#mess_vide_synthese_vf').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_vf").value;
			commentaire=document.getElementById("txt_Synthese_vf").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_vf_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_vf_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_vf_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Ventef/php/detect_synth_vf_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_id=e;
					if(synthese_f_id==0){
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventef/php/enreg_synth_vf.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventef/php/upd_synth_vf.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#message_Donnees_Perdu_vf').hide();
					$('#fancybox_vf').hide();
					//$('#contenue_rsci').show();
					$('#dv_cont_obj_vf').hide();
					/////
					$('#contvf').hide();
					$('#contRsciVente').show();
				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_vf').click(function(){
		$('#message_Donnees_Perdu_vf').hide();
		$('#Int_Synthese_vf').hide();
		$('#fancybox_vf').hide();
	});
});
</script>
<div id="Int_Synthese_Donnee_Perdu_vf">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_vf">&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_vf">
			</td>
		</tr>
	</table>
</div>