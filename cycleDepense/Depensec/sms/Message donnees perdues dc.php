<script>
$(function(){
	$('#fermeture_Annulation_dc').click(function(){
		if((document.getElementById("txt_Synthese_dc").value=="") || (document.getElementById("rd_Synthese_dc_Faible").checked==false && document.getElementById("rd_Synthese_dc_Moyen").checked==false && document.getElementById("rd_Synthese_dc_Eleve").checked==false)){
			$('#Int_Synthese_dc').hide();
			$('#mess_vide_synthese_dc').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_dc").value;
			commentaire=document.getElementById("txt_Synthese_dc").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_dc_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_dc_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_dc_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleDepense/Depensec/php/detect_synth_dc_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_id=e;
					if(synthese_f_id==0){
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depensec/php/enreg_synth_dc.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depensec/php/upd_synth_dc.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#message_Donnees_Perdu_dc').hide();
					$('#fancybox_dc').hide();
					//$('#contenue_rsci').show();
					$('#dv_cont_obj_dc').hide();
					/////
					$('#contdc').hide();
					$('#contRsciDepense').show();
				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_dc').click(function(){
		$('#message_Donnees_Perdu_dc').hide();
		$('#Int_Synthese_dc').hide();
		$('#fancybox_dc').hide();
	});
});
</script>
<div id="Int_Synthese_Donnee_Perdu_dc">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_dc">&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_dc">
			</td>
		</tr>
	</table>
</div>