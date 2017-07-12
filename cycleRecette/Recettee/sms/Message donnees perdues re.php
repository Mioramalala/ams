<script>
$(function(){
	$('#fermeture_Annulation_re').click(function(){
		if((document.getElementById("txt_Synthese_re").value=="") || (document.getElementById("re_Synthese_re_Faible").checked==false && document.getElementById("re_Synthese_re_Moyen").checked==false && document.getElementById("re_Synthese_re_Eleve").checked==false)){
			$('#Int_Synthese_re').hide();
			$('#mess_vide_synthese_re').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_re").value;
			commentaire=document.getElementById("txt_Synthese_re").value;
			risque="faible";
			if(document.getElementById("re_Synthese_re_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("re_Synthese_re_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("re_Synthese_re_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recettee/php/detect_synth_re_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_id=e;
					if(synthese_f_id==0){
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recettee/php/enreg_synth_re.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recettee/php/upd_synth_re.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#message_Donnees_Pereu_re').hide();
					$('#fancybox_re').hide();
					//$('#contenue_rsci').show();
					$('#dv_cont_obj_re').hide();
					/////
					$('#contre').hide();
					$('#contRsciRecette').show();
				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_re').click(function(){
		$('#message_Donnees_Pereu_re').hide();
		$('#Int_Synthese_re').hide();
		$('#fancybox_re').hide();
	});
});
</script>
<div id="Int_Synthese_Donnee_Pereu_re">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_re">&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_re">
			</td>
		</tr>
	</table>
</div>