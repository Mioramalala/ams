<script>
$(function(){
	$('#fermeture_Annulation_ve').click(function(){
		if((document.getElementById("txt_Synthese_ve").value=="") || (document.getElementById("ve_Synthese_ve_Faible").checked==false && document.getElementById("ve_Synthese_ve_Moyen").checked==false && document.getElementById("ve_Synthese_ve_Eleve").checked==false)){
			$('#Int_Synthese_ve').hide();
			$('#mess_vide_synthese_ve').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_ve").value;
			commentaire=document.getElementById("txt_Synthese_ve").value;
			risque="faible";
			if(document.getElementById("ve_Synthese_ve_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("ve_Synthese_ve_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("ve_Synthese_ve_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Ventee/php/detect_synth_ve_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_id=e;
					if(synthese_f_id==0){
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventee/php/enreg_synth_ve.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventee/php/upd_synth_ve.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#message_Donnees_Peveu_ve').hide();
					$('#fancybox_ve').hide();
					//$('#contenue_rsci').show();
					$('#dv_cont_obj_ve').hide();
					/////
					$('#contve').hide();
					$('#contRsciVente').show();
				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_ve').click(function(){
		$('#message_Donnees_Peveu_ve').hide();
		$('#Int_Synthese_ve').hide();
		$('#fancybox_ve').hide();
	});
});
</script>
<div id="Int_Synthese_Donnee_Peveu_ve">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_ve">&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_ve">
			</td>
		</tr>
	</table>
</div>