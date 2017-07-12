<script>
$(function(){
	$('#fermeture_Annulation_f').click(function(){
		if((document.getElementById("txt_Synthese_f").value=="") || (document.getElementById("rd_Synthese_f_Faible").checked==false && document.getElementById("rd_Synthese_f_Moyen").checked==false && document.getElementById("rd_Synthese_f_Eleve").checked==false)){
			$('#Int_Synthese_f').hide();
			$('#message_Donnees_Perdu_f').hide();
			$('#mess_vide_synthese_f').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_f").value;
			commentaire=document.getElementById("txt_Synthese_f").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_f_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_f_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_f_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_f/php/detect_synth_f_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_id=e;
					if(synthese_f_id==0){
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_f/php/enreg_synth_f.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_f/php/upd_synth_f.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#message_Donnees_Perdu_f').hide();
					$('#fancybox_f').hide();
					$('#contenue_rsci').show();
					$('#dv_cont_obj_f').hide();
				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_f').click(function(){
		$('#message_Donnees_Perdu_f').hide();
		$('#Int_Synthese_f').hide();
		$('#fancybox_f').hide();
	});
});
</script>
<div id="Int_Synthese_Donnee_Perdu_f">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_f" <?php if($conclusionIdf!="") echo 'disabled';?>>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_f">
			</td>
		</tr>
	</table>
</div>