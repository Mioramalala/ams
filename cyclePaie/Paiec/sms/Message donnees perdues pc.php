<script>
$(function(){
	$('#fermeture_Annulation_pc').click(function(){
		if((document.getElementById("txt_Synthese_pc").value=="") || (document.getElementById("rd_Synthese_pc_Faible").checked==false && document.getElementById("rd_Synthese_pc_Moyen").checked==false && document.getElementById("rd_Synthese_pc_Eleve").checked==false)){
			$('#Int_Synthese_pc').hide();
			$('#mess_vide_synthese_pc').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_pc").value;
			commentaire=document.getElementById("txt_Synthese_pc").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_pc_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_pc_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_pc_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paiec/php/detect_synth_pc_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_id=e;
					if(synthese_f_id==0){
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paiec/php/enreg_synth_pc.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paiec/php/upd_synth_pc.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#message_Donnees_Perdu_pc').hide();
					$('#fancybox_pc').hide();
					//$('#contenue_rsci').show();
					$('#dv_cont_obj_pc').hide();
					/////
					$('#contpc').hide();
					$('#contRsciPaie').show();
				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_pc').click(function(){
		$('#message_Donnees_Perdu_pc').hide();
		$('#Int_Synthese_pc').hide();
		$('#fancybox_pc').hide();
	});
});
</script>
<div id="Int_Synthese_Donnee_Perdu_pc">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_pc">&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_pc">
			</td>
		</tr>
	</table>
</div>