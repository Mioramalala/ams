

<script>

$(function(){
	$('#Synthese_vc_annuler').click(function(){
		$('#Int_Synthese_vc').hide();
		$('#fancybox_vc').hide();
	});
	// Evènement de la synthese de C
	$('#Synthese_vc_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_vc").value=="") || (document.getElementById("rd_Synthese_vc_Faible").checked==false && document.getElementById("rd_Synthese_vc_Moyen").checked==false && document.getElementById("rd_Synthese_vc_Eleve").checked==false)){
			$('#Int_Synthese_vc').hide();
			$('#mess_vide_synthese_vc').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_vc").value;
			commentaire=document.getElementById("txt_Synthese_vc").value;
			var echo_score_vc=$("#echo_score_vc").html();
		
			risque="faible";
			if(document.getElementById("rd_Synthese_vc_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_vc_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_vc_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Ventec/php/detect_synth_vc_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_vc=e;
					if(synthese_f_vc==0){
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventec/php/enreg_synth_vc.php',
							data:{mission_id:mission_id, commentaire:commentaire, echo_score_vc:echo_score_vc, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventec/php/upd_synth_vc.php',
							data:{mission_id:mission_id, commentaire:commentaire, echo_score_vc:echo_score_vc, risque:risque},
							success:function(){	
							}
						});
					}
					$('#Int_Synthese_vc').hide();
					$('#message_Terminer_Synthese_vc').show();
				}
			});
		}
	});

	$('#fermer_Synthese_vc').click(function(){
		$('#message_Donnees_Perdu_vc').show();
		$('#Int_Synthese_vc').hide();
	});
	
	$('#txt_Synthese_vc').click(function(){
		document.getElementById("txt_Synthese_vc").value="";
	});
});
</script>

<div id="int_Synhtese_vc">
	<table width="500">
		<tr>
			<td>
				<table width="139">
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">Score :
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td height="50" class="label_Question" align="center">
							<div id="echo_score_vc"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_vc_Faible" name="synth_vc" <?php //if($risque=="faible") echo 'checked'; ?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="rd_Synthese_vc_Moyen" name="synth_vc" <?php //if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="rd_Synthese_vc_Eleve" name="synth_vc" <?php //if($risque=="eleve") echo 'checked'; ?> onclick="click_eleve()" />Elevé
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td height="165"></td>
					</tr>
				</table>
			</td>
			<td>
				<table>
					<tr>
						<td class="td_Titre_Question"><textarea id="txt_Synthese_vc" cols="40" rows="20"><?php //if($commentaire=="") echo '[Veuillez rédiger votre commentaire ici]'; else echo $commentaire; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_vc_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_vc_Terminer" value="Terminer" class="bouton" />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_vc"></div>
</div>
