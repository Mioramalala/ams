<script>
$(function(){
	$('#fermeture_Annulation_imd').click(function(){
		if((document.getElementById("txt_Synthese_imd").value=="") || (document.getElementById("rd_Synthese_imd_Faible").checked==false && document.getElementById("rd_Synthese_imd_Moyen").checked==false && document.getElementById("rd_Synthese_imd_Eleve").checked==false)){
			$('#Int_Synthese_imd').hide();
			$('#mess_vide_synthese_imd').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_imd").value;
			commentaire=document.getElementById("txt_Synthese_imd").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_imd_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_imd_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_imd_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleImmo/Immod/php/detect_synth_imd_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_id=e;
					if(synthese_f_id==0){
						$.ajax({
							type:'POST',
							url:'cycleImmo/Immod/php/enreg_synth_imd.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleImmo/Immod/php/upd_synth_imd.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#message_Donnees_Perdu_imd').hide();
					$('#fancybox_imd').hide();
					$('#dv_cont_obj_imd').hide();
					//$('#contenue_rsci').show();
					$('#contimd').hide();
					$('#contRsciImmo').show();
				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_imd').click(function(){
		$('#message_Donnees_Perdu_imd').hide();
		$('#Int_Synthese_imd').hide();
		$('#fancybox_imd').hide();
	});
});
</script>
<div id="Int_Synthese_Donnee_Perdu_imd">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_imd">&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_imd">
			</td>
		</tr>
	</table>
</div>