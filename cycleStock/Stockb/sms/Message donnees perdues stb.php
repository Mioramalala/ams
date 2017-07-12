<script>
$(function(){
	$('#fermeture_Annulation_stb').click(function(){
		if((document.getElementById("txt_Synthese_stb").value=="") || (document.getElementById("rd_Synthese_stb_Faible").checked==false && document.getElementById("rd_Synthese_stb_Moyen").checked==false && document.getElementById("rd_Synthese_stb_Eleve").checked==false)){
			$('#Int_Synthese_stb').hide();
			$('#mess_vide_synthese_stb').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_stb").value;
			commentaire=document.getElementById("txt_Synthese_stb").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_stb_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_stb_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_stb_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleStock/Stockb/php/detect_synth_stb_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_id=e;
					if(synthese_f_id==0){
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockb/php/enreg_synth_stb.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockb/php/upd_synth_stb.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#message_Donnees_Perdu_stb').hide();
					$('#fancybox_stb').hide();
					//$('#contenue_rsci').show();
					$('#dv_cont_obj_stb').hide();
					/////
					$('#contstb').hide();
					$('#contRsciStock').show();
				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_stb').click(function(){
		$('#message_Donnees_Perdu_stb').hide();
		$('#Int_Synthese_stb').hide();
		$('#fancybox_stb').hide();
	});
});
</script>
<div id="Int_Synthese_Donnee_Perdu_stb">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_stb">&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_stb">
			</td>
		</tr>
	</table>
</div>