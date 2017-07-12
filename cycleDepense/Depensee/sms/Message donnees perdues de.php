<script>
$(function(){
	$('#fermeture_Annulation_de').click(function(){
		if((document.getElementById("txt_Synthese_de").value=="") || (document.getElementById("rd_Synthese_de_Faible").checked==false && document.getElementById("rd_Synthese_de_Moyen").checked==false && document.getElementById("rd_Synthese_de_Eleve").checked==false)){
			$('#Int_Synthese_de').hide();
			$('#mess_vide_synthese_de').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_de").value;
			commentaire=document.getElementById("txt_Synthese_de").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_de_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_de_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_de_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleDepense/Depensee/php/detect_synth_de_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_id=e;
					if(synthese_f_id==0){
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depensee/php/enreg_synth_de.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depensee/php/upd_synth_de.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#message_Donnees_Perdu_de').hide();
					$('#fancybox_de').hide();
					//$('#contenue_rsci').show();
					$('#dv_cont_obj_de').hide();
					/////
					$('#contde').hide();
					$('#contRsciDepense').show();
				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_de').click(function(){
		$('#message_Donnees_Perdu_de').hide();
		$('#Int_Synthese_de').hide();
		$('#fancybox_de').hide();
	});
});
</script>
<div id="Int_Synthese_Donnee_Perdu_de">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_de">&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_de">
			</td>
		</tr>
	</table>
</div>