<script>
$(function(){
	$('#fermeture_Annulation_vc').click(function(){
		if((document.getElementById("txt_Synthese_vc").value=="") || (document.getElementById("rd_Synthese_vc_Faible").checked==false && document.getElementById("rd_Synthese_vc_Moyen").checked==false && document.getElementById("rd_Synthese_vc_Eleve").checked==false)){
			$('#Int_Synthese_vc').hide();
			$('#mess_vide_synthese_vc').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_vc").value;
			commentaire=document.getElementById("txt_Synthese_vc").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_vc_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_vc_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_vc_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Ventec/php/detect_synth_vc_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_id=e;
					if(synthese_f_id==0){
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventec/php/enreg_synth_vc.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventec/php/upd_synth_vc.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#message_Donnees_Perdu_vc').hide();
					$('#fancybox_vc').hide();
					//$('#contenue_rsci').show();
					$('#dv_cont_obj_vc').hide();
					/////
					$('#contvc').hide();
					$('#contRsciVente').show();
				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_vc').click(function(){
		$('#message_Donnees_Perdu_vc').hide();
		$('#Int_Synthese_vc').hide();
		$('#fancybox_vc').hide();
	});
});
</script>
<div id="Int_Synthese_Donnee_Perdu_vc">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_vc">&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_vc">
			</td>
		</tr>
	</table>
</div>