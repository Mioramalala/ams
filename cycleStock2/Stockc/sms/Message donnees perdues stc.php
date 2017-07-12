<script>
$(function(){
	$('#fermeture_Annulation_stc').click(function(){
		if((document.getElementById("txt_Synthese_stc").value=="") || (document.getElementById("rd_Synthese_stc_Faible").checked==false && document.getElementById("rd_Synthese_stc_Moyen").checked==false && document.getElementById("rd_Synthese_stc_Eleve").checked==false)){
			$('#Int_Synthese_stc').hide();
			$('#mess_vide_synthese_stc').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_stc").value;
			commentaire=document.getElementById("txt_Synthese_stc").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_stc_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_stc_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_stc_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleStock/Stockc/php/detect_synth_stc_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_id=e;
					if(synthese_f_id==0){
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockc/php/enreg_synth_stc.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockc/php/upd_synth_stc.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#message_Donnees_Perdu_stc').hide();
					$('#fancybox_stc').hide();
					//$('#contenue_rsci').show();
					$('#dv_cont_obj_stc').hide();
					/////
					$('#contstc').hide();
					$('#contRsciStock').show();
				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_stc').click(function(){
		$('#message_Donnees_Perdu_stc').hide();
		$('#Int_Synthese_stc').hide();
		$('#fancybox_stc').hide();
	});
});
</script>
<div id="Int_Synthese_Donnee_Perdu_stc">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_stc">&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_stc">
			</td>
		</tr>
	</table>
</div>