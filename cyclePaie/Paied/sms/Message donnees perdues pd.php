<script>
$(function(){
	$('#fermeture_Annulation_pd').click(function(){
		if((document.getElementById("txt_Synthese_pd").value=="") || (document.getElementById("rd_Synthese_pd_Faible").checked==false && document.getElementById("rd_Synthese_pd_Moyen").checked==false && document.getElementById("rd_Synthese_pd_Eleve").checked==false)){
			$('#Int_Synthese_pd').hide();
			$('#mess_vide_synthese_pd').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_pd").value;
			commentaire=document.getElementById("txt_Synthese_pd").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_pd_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_pd_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_pd_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paied/php/detect_synth_pd_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_id=e;
					if(synthese_f_id==0){
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paied/php/enreg_synth_pd.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paied/php/upd_synth_pd.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#message_Donnees_Perdu_pd').hide();
					$('#fancybox_pd').hide();
					//$('#contenue_rsci').show();
					$('#dv_cont_obj_pd').hide();
					/////
					$('#contpd').hide();
					$('#contRsciPaie').show();
				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_pd').click(function(){
		$('#message_Donnees_Perdu_pd').hide();
		$('#Int_Synthese_pd').hide();
		$('#fancybox_pd').hide();
	});
});
</script>
<div id="Int_Synthese_Donnee_Perdu_pd">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_pd">&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_pd">
			</td>
		</tr>
	</table>
</div>