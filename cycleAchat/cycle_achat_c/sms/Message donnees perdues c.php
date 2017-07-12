<script>
$(function(){
	$('#fermeture_Annulation_c').click(function(){
		if((document.getElementById("txt_Synthese_c").value=="") || (document.getElementById("rd_Synthese_c_Faible").checked==false && document.getElementById("rd_Synthese_c_Moyen").checked==false && document.getElementById("rd_Synthese_c_Eleve").checked==false)){
			$('#Int_Synthese_c').hide();
			$('#mess_vide_synthese_c').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_c").value;
			commentaire=document.getElementById("txt_Synthese_c").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_c_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_c_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_c_Eleve").checked==true){
				risque="eleve";
			}
			synthese_b_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_c/php/detect_synth_c_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_d_id=e;
					if(synthese_d_id==0){
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_c/php/enreg_synth_c.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_c/php/upd_synth_c.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#message_Donnees_Perdu_c').hide();
					$('#fancybox_c').hide();
					$('#contenue_rsci').show();
					$('#dv_cont_obj_c').hide();
				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_c').click(function(){
		$('#message_Donnees_Perdu_c').hide();
		$('#Int_Synthese_c').hide();
		$('#fancybox_c').hide();
	});
});
</script>

<div id="Int_Synthese_Donnee_Perdu_c">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_c" >&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_c">
			</td>
		</tr>
	</table>
</div>