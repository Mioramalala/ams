<script>
$(function(){
	$('#fermeture_Annulation_vb').click(function(){
		if((document.getElementById("txt_Synthese_vb").value=="") || (document.getElementById("rd_Synthese_vb_Faible").checked==false && document.getElementById("rd_Synthese_vb_Moyen").checked==false && document.getElementById("rd_Synthese_vb_Eleve").checked==false)){
			$('#Int_Synthese_vb').hide();
			$('#mess_vide_synthese_vb').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_vb").value;
			commentaire=document.getElementById("txt_Synthese_vb").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_vb_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_vb_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_vb_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Venteb/php/detect_synth_vb_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_id=e;
					if(synthese_f_id==0){
						$.ajax({
							type:'POST',
							url:'cycleVente/Venteb/php/enreg_synth_vb.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Venteb/php/upd_synth_vb.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#message_Donnees_Perdu_vb').hide();
					$('#fancybox_vb').hide();
					//$('#contenue_rsci').show();
					$('#dv_cont_obj_vb').hide();
					/////
					$('#contvb').hide();
					$('#contRsciVente').show();
				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_vb').click(function(){
		$('#message_Donnees_Perdu_vb').hide();
		$('#Int_Synthese_vb').hide();
		$('#fancybox_vb').hide();
	});
});
</script>
<div id="Int_Synthese_Donnee_Perdu_vb">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_vb">&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_vb">
			</td>
		</tr>
	</table>
</div>