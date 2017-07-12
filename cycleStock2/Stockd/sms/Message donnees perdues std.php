<script>
$(function(){
	$('#fermeture_Annulation_std').click(function(){
		if((document.getElementById("txt_Synthese_std").value=="") || (document.getElementById("rd_Synthese_std_Faible").checked==false && document.getElementById("rd_Synthese_std_Moyen").checked==false && document.getElementById("rd_Synthese_std_Eleve").checked==false)){
			$('#Int_Synthese_std').hide();
			$('#mess_vide_synthese_std').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_std").value;
			commentaire=document.getElementById("txt_Synthese_std").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_std_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_std_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_std_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleStock/Stockd/php/detect_synth_std_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_id=e;
					if(synthese_f_id==0){
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockd/php/enreg_synth_std.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockd/php/upd_synth_std.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#message_Donnees_Perdu_std').hide();
					$('#fancybox_std').hide();
					//$('#contenue_rsci').show();
					$('#dv_cont_obj_std').hide();
					/////
					$('#contstd').hide();
					$('#contRsciStock').show();
				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_std').click(function(){
		$('#message_Donnees_Perdu_std').hide();
		$('#Int_Synthese_std').hide();
		$('#fancybox_std').hide();
	});
});
</script>
<div id="Int_Synthese_Donnee_Perdu_std">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_std">&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_std">
			</td>
		</tr>
	</table>
</div>