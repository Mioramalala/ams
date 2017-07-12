<script>
$(function(){
	$('#fermeture_Annulation_pb').click(function(){
		if((document.getElementById("txt_Synthese_pb").value=="") || (document.getElementById("rd_Synthese_pb_Faible").checked==false && document.getElementById("rd_Synthese_pb_Moyen").checked==false && document.getElementById("rd_Synthese_pb_Eleve").checked==false)){
			$('#Int_Synthese_pb').hide();
			$('#mess_vide_synthese_pb').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_pb").value;
			commentaire=document.getElementById("txt_Synthese_pb").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_pb_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_pb_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_pb_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paieb/php/detect_synth_pb_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_id=e;
					if(synthese_f_id==0){
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paieb/php/enreg_synth_pb.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paieb/php/upd_synth_pb.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#message_Donnees_Perdu_pb').hide();
					$('#fancybox_pb').hide();
					//$('#contenue_rsci').show();
					$('#dv_cont_obj_pb').hide();
					/////
					$('#contpb').hide();
					$('#contRsciPaie').show();
				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_pb').click(function(){
		$('#message_Donnees_Perdu_pb').hide();
		$('#Int_Synthese_pb').hide();
		$('#fancybox_pb').hide();
	});
});
</script>
<div id="Int_Synthese_Donnee_Perdu_pb">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_pb">&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_pb">
			</td>
		</tr>
	</table>
</div>