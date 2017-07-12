<script>
$(function(){
	$('#fermeture_Annulation_rd').click(function(){
		if((document.getElementById("txt_Synthese_rd").value=="") || (document.getElementById("rd_Synthese_rd_Faible").checked==false && document.getElementById("rd_Synthese_rd_Moyen").checked==false && document.getElementById("rd_Synthese_rd_Eleve").checked==false)){
			$('#Int_Synthese_rd').hide();
			$('#mess_vide_synthese_rd').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_rd").value;
			commentaire=document.getElementById("txt_Synthese_rd").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_rd_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_rd_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_rd_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recetted/php/detect_synth_rd_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_id=e;
					if(synthese_f_id==0){
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recetted/php/enreg_synth_rd.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recetted/php/upd_synth_rd.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#message_Donnees_Perdu_rd').hide();
					$('#fancybox_rd').hide();
					//$('#contenue_rsci').show();
					$('#dv_cont_obj_rd').hide();
					/////
					$('#contrd').hide();
					$('#contRsciRecette').show();
				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_rd').click(function(){
		$('#message_Donnees_Perdu_rd').hide();
		$('#Int_Synthese_rd').hide();
		$('#fancybox_rd').hide();
	});
});
</script>
<div id="Int_Synthese_Donnee_Perdu_rd">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_rd">&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_rd">
			</td>
		</tr>
	</table>
</div>