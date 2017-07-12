<script>
$(function(){
	$('#fermeture_Annulation_e').click(function(){
		if((document.getElementById("txt_Synthese_e").value=="") || (document.getElementById("rd_Synthese_e_Faible").checked==false && document.getElementById("rd_Synthese_e_Moyen").checked==false && document.getElementById("rd_Synthese_e_Eleve").checked==false)){
			$('#Int_Synthese_e').hide();
			$('#message_Donnees_Perdu_e').hide();
			$('#mess_vide_synthese_e').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_e").value;
			commentaire=document.getElementById("txt_Synthese_e").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_e_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_e_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_e_Eleve").checked==true){
				risque="eleve";
			}
			synthese_e_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_e/php/detect_synth_e_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_e_id=e;
					if(synthese_e_id==0){
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_e/php/enreg_synth_e.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_e/php/upd_synth_e.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#message_Donnees_Perdu_e').hide();
					$('#fancybox_e').hide();
					$('#contenue_rsci').show();
					$('#dv_cont_obj_e').hide();
				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_e').click(function(){
		$('#message_Donnees_Perdu_e').hide();
		$('#Int_Synthese_e').hide();
		$('#fancybox_e').hide();
	});
});
</script>
<div id="Int_Synthese_Donnee_Perdu_e">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_e" <?php if($conclusionIde!="") echo 'disabled';?> >&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_e">
			</td>
		</tr>
	</table>
</div>