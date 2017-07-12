<script>
$(function(){
	$('#fermeture_Annulation_db').click(function(){
		if((document.getElementById("txt_Synthese_db").value=="") || (document.getElementById("rd_Synthese_db_Faible").checked==false && document.getElementById("rd_Synthese_db_Moyen").checked==false && document.getElementById("rd_Synthese_db_Eleve").checked==false)){
			$('#Int_Synthese_db').hide();
			$('#mess_vide_synthese_db').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_db").value;
			commentaire=document.getElementById("txt_Synthese_db").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_db_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_db_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_db_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleDepense/Depenseb/php/detect_synth_db_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_id=e;
					if(synthese_f_id==0){
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depenseb/php/enreg_synth_db.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depenseb/php/upd_synth_db.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#message_Donnees_Perdu_db').hide();
					$('#fancybox_db').hide();
					//$('#contenue_rsci').show();
					$('#dv_cont_obj_db').hide();
					/////
					$('#contdb').hide();
					$('#contRsciDepense').show();
				}
			});
		}
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_db').click(function(){
		$('#message_Donnees_Perdu_db').hide();
		$('#Int_Synthese_db').hide();
		$('#fancybox_db').hide();
	});
});
</script>
<div id="Int_Synthese_Donnee_Perdu_db">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="fermeture_Annulation_db">&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="fermeture_Continuation_db">
			</td>
		</tr>
	</table>
</div>