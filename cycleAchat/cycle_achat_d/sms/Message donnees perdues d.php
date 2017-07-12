<script>
$(function(){
	$('#fermeture_Annulation_d').click(function(){
		if((document.getElementById("txt_Synthese_d").value=="") || (document.getElementById("rd_Synthese_d_Faible").checked==false && document.getElementById("rd_Synthese_d_Moyen").checked==false && document.getElementById("rd_Synthese_d_Eleve").checked==false)){
			$('#Int_Synthese_d').hide();
			$('#message_Donnees_Perdu_d').hide();
			$('#mess_vide_synthese_d').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_d").value;
			commentaire=document.getElementById("txt_Synthese_d").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_d_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_d_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_d_Eleve").checked==true){
				risque="eleve";
			}
			synthese_b_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_d/php/detect_synth_d_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_d_id=e;
					if(synthese_d_id==0){
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_d/php/enreg_synth_d.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_d/php/upd_synth_d.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#message_Donnees_Perdu_d').hide();
					$('#fancybox_d').hide();
					$('#contenue_rsci').show();
					$('#dv_cont_obj_d').hide();
				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_d').click(function(){
		$('#message_Donnees_Perdu_d').hide();
		$('#Int_Synthese_d').hide();
		$('#fancybox_d').hide();
	});
});
</script>
<div id="Int_Synthese_Donnee_Perdu_d">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_d" >&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_d">
			</td>
		</tr>
	</table>
</div>