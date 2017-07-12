

<script>

$(function(){
	$('#Synthese_vf_annuler').click(function(){
		$('#Int_Synthese_vf').hide();
		$('#fancybox_vf').hide();
	});
	// Evènement de la synthese de C
	$('#Synthese_vf_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_vf").value=="") || (document.getElementById("rd_Synthese_vf_Faible").checked==false && document.getElementById("rd_Synthese_vf_Moyen").checked==false && document.getElementById("rd_Synthese_vf_Eleve").checked==false)){
			$('#Int_Synthese_vf').hide();
			$('#mess_vide_synthese_vf').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_vf").value;
			commentaire=document.getElementById("txt_Synthese_vf").value;
			var echo_score_vf=$("#echo_score_vf").html();
			risque="faible";
			if(document.getElementById("rd_Synthese_vf_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_vf_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_vf_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Ventef/php/detect_synth_vf_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_vf=e;
					if(synthese_f_vf==0){
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventef/php/enreg_synth_vf.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_vf:echo_score_vf, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventef/php/upd_synth_vf.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_vf:echo_score_vf, risque:risque},
							success:function(){	
							}
						});
					}
					$('#Int_Synthese_vf').hide();
					$('#message_Terminer_Synthese_vf').show();
				}
			});
		}
	});

	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

	$('#fermer_Synthese_vf').click(function(){
		$('#message_Donnees_Perdu_vf').show();
		$('#Int_Synthese_vf').hide();
	});
});
</script>

<div id="int_Synhtese_vf">
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
							<div id="echo_score_vf"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_vf_Faible" name="synth_vf" <?php //if($risque=="faible") echo 'checked'; ?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="rd_Synthese_vf_Moyen" name="synth_vf" <?php //if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="rd_Synthese_vf_Eleve" name="synth_vf" <?php //if($risque=="eleve") echo 'checked'; ?> onclick="click_eleve()" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_vf" cols="40" rows="20"><?php //if($commentaire=="") echo '[Veuillez rédiger votre commentaire ici]'; else echo $commentaire; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_vf_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_vf_Terminer" value="Terminer" class="bouton" />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_vf"></div>
</div>
