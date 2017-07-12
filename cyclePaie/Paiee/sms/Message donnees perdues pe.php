<script>
$(function(){
	$('#fermeture_Annulation_pe').click(function(){
		if((document.getElementById("txt_Synthese_pe").value=="") || (document.getElementById("rd_Synthese_pe_Faible").checked==false && document.getElementById("rd_Synthese_pe_Moyen").checked==false && document.getElementById("rd_Synthese_pe_Eleve").checked==false)){
			$('#Int_Synthese_pe').hide();
			$('#mess_vide_synthese_pe').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_pe").value;
			commentaire=document.getElementById("txt_Synthese_pe").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_pe_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_pe_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_pe_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paiee/php/detect_synth_pe_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_id=e;
					if(synthese_f_id==0){
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paiee/php/enreg_synth_pe.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paiee/php/upd_synth_pe.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#message_Donnees_Perdu_pe').hide();
					$('#fancybox_pe').hide();
					//$('#contenue_rsci').show();
					$('#dv_cont_obj_pe').hide();
					/////
					$('#contpe').hide();
					$('#contRsciPaie').show();
				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_pe').click(function(){
		$('#message_Donnees_Perdu_pe').hide();
		$('#Int_Synthese_pe').hide();
		$('#fancybox_pe').hide();
	});
});
</script>
<div id="Int_Synthese_Donnee_Perdu_pe">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_pe">&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_pe">
			</td>
		</tr>
	</table>
</div>