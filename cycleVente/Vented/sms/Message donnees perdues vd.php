<script>
$(function(){
	$('#fermeture_Annulation_vd').click(function(){
		if((document.getElementById("txt_Synthese_vd").value=="") || (document.getElementById("rd_Synthese_vd_Faible").checked==false && document.getElementById("rd_Synthese_vd_Moyen").checked==false && document.getElementById("rd_Synthese_vd_Eleve").checked==false)){
			$('#Int_Synthese_vd').hide();
			$('#mess_vide_synthese_vd').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_vd").value;
			commentaire=document.getElementById("txt_Synthese_vd").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_vd_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_vd_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_vd_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Vented/php/detect_synth_vd_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_id=e;
					if(synthese_f_id==0){
						$.ajax({
							type:'POST',
							url:'cycleVente/Vented/php/enreg_synth_vd.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Vented/php/upd_synth_vd.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#message_Donnees_Perdu_vd').hide();
					$('#fancybox_vd').hide();
					//$('#contenue_rsci').show();
					$('#dv_cont_obj_vd').hide();
					/////
					$('#contvd').hide();
					$('#contRsciVente').show();
				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_vd').click(function(){
		$('#message_Donnees_Perdu_vd').hide();
		$('#Int_Synthese_vd').hide();
		$('#fancybox_vd').hide();
	});
});
</script>
<div id="Int_Synthese_Donnee_Perdu_vd">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_vd">&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_vd">
			</td>
		</tr>
	</table>
</div>