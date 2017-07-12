<script>
$(function(){
	$('#fermeture_Annulation_imb').click(function(){
		if((document.getElementById("txt_Synthese_imb").value=="") || (document.getElementById("rd_Synthese_imb_Faible").checked==false && document.getElementById("rd_Synthese_imb_Moyen").checked==false && document.getElementById("rd_Synthese_imb_Eleve").checked==false)){
			$('#Int_Synthese_imb').hide();
			$('#mess_vide_synthese_imb').show();
		}
		else{


			mission_id=document.getElementById("txt_mission_id_imb").value;
			commentaire=document.getElementById("txt_Synthese_imb").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_imb_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_imb_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_imb_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleImmo/immob/php/detect_synth_imb_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_id=e;
					if(synthese_f_id==0){
						$.ajax({
							type:'POST',
							url:'cycleImmo/immob/php/enreg_synth_imb.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{

						$.ajax({
							type:'POST',
							url:'cycleImmo/immob/php/upd_synth_imb.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}

					$('#message_Donnees_Perdu_imb').hide();
					$('#contimb').hide();

					$('#fancybox_imb').hide();
					$('#contenue_rsci').show();
					$('#dv_cont_obj_imb').hide();
				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_imb').click(function(){
		$('#message_Donnees_Perdu_imb').hide();
		$('#Int_Synthese_imb').hide();
		$('#fancybox_imb').hide();
	});
});
</script>
<div id="Int_Synthese_Donnee_Perdu_imb">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_imb">&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_imb">
			</td>
		</tr>
	</table>
</div>