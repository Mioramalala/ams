<script>
$(function(){
	$('#fermeture_Annulation_acb').click(function(){
		if((document.getElementById("txt_Synthese_acb").value=="") || (document.getElementById("rd_Synthese_acb_Faible").checked==false && document.getElementById("rd_Synthese_acb_Moyen").checked==false && document.getElementById("rd_Synthese_acb_Eleve").checked==false)){
			$('#Int_Synthese_acb').hide();
			$('#mess_vide_synthese_acb').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_acb").value;
			commentaire=document.getElementById("txt_Synthese_acb").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_acb_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_acb_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_acb_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_b/php/detect_synth_acb_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_id=e;
					if(synthese_f_id==0){
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_b/php/enreg_synth_acb.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_b/php/upd_synth_acb.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}

					/*$('#contenue_rsci').show();
					$('#dv_cont_obj_sup_b').hide();
					$('#mess_ret_acb_sup').hide();
					$('#fancybox_bouton_acb').hide();*/

					$('#dv_cont_obj_b').hide();
					$('#contenue_rsci').show();
					$('#message_fermeture_acb').hide();
					$('#fancybox_acb').hide();


					/*$('#message_Donnees_Perdu_acb').hide();
					$('#fancybox_acb').hide();
					$('#contenue_rsci').show();
					$('#dv_cont_obj_acb').hide();*/
				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_acb').click(function(){
		$('#message_Donnees_Perdu_acb').hide();
		$('#Int_Synthese_acb').hide();
		$('#fancybox_acb').hide();
	});
});
</script>
<div id="Int_Synthese_Donnee_Perdu_acb">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_acb" />&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_acb" />
			</td>
		</tr>
	</table>
</div>