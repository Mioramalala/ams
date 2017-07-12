<script>
$(function(){
	$('#fermeture_add_B').click(function(){
	if((document.getElementById("txt_Synthese_B").value=="") || (document.getElementById("rd_Synthese_B_Faible").checked==false && document.getElementById("rd_Synthese_B_Moyen").checked==false && document.getElementById("rd_Synthese_B_Eleve").checked==false)){
			$('#Int_Synthese_B').hide();
			$('#message_Donnees_Perdu_B').hide();
			$('#mess_vide_synthese_B').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id").value;
			commentaire=document.getElementById("txt_Synthese_B").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_B_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_B_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_B_Eleve").checked==true){
				risque="eleve";
			}
			synthese_b_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_B/detect_synth_b_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_b_id=e;
					if(synthese_b_id==0){
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achatphp/get_B/enreg_synth_b.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achatphp/get_B/upd_synth_b.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#Int_Synthese_B').hide();
					// $('#message_Terminer_Synthese_B').show();
					$('#dv_cont_obj_b').hide();
					$('#contenue_rsci').show();
				}
			});
		}
	});
});
</script>

<div id="Int_Synthese_Donnee_Perdu_B">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_add_B" <?php if($conclusionIdb!="") echo 'disabled';?> >&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_B">
			</td>
		</tr>
	</table>
</div>