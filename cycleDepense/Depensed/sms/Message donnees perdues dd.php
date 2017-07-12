<script>
$(function(){
	$('#fermeture_Annulation_dd').click(function(){
		if((document.getElementById("txt_Synthese_dd").value=="") || (document.getElementById("rd_Synthese_dd_Faible").checked==false && document.getElementById("rd_Synthese_dd_Moyen").checked==false && document.getElementById("rd_Synthese_dd_Eleve").checked==false)){
			$('#Int_Synthese_dd').hide();
			$('#mess_vide_synthese_dd').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_dd").value;
			commentaire=document.getElementById("txt_Synthese_dd").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_dd_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_dd_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_dd_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleDepense/Depensed/php/detect_synth_dd_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_id=e;
					if(synthese_f_id==0){
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depensed/php/enreg_synth_dd.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depensed/php/upd_synth_dd.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#message_Donnees_Perdu_dd').hide();
					$('#fancybox_dd').hide();
					//$('#contenue_rsci').show();
					$('#dv_cont_obj_dd').hide();
					/////
					$('#contdd').hide();
					$('#contRsciDepense').show();
				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_dd').click(function(){
		$('#message_Donnees_Perdu_dd').hide();
		$('#Int_Synthese_dd').hide();
		$('#fancybox_dd').hide();
	});
});
</script>
<div id="Int_Synthese_Donnee_Perdu_dd">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_dd">&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_dd">
			</td>
		</tr>
	</table>
</div>