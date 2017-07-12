
<script>

$(function(){

	$('#Synthese_imc_annuler').click(function(){
		$('#Int_Synthese_imc').hide();
		$('#fancybox_imc').hide();
	});
	// Evènement de la synthese de C
	$('#Synthese_imc_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_imc").value=="") || (document.getElementById("rd_Synthese_imc_Faible").checked==false && document.getElementById("rd_Synthese_imc_Moyen").checked==false && document.getElementById("rd_Synthese_imc_Eleve").checked==false)){
			$('#Int_Synthese_imc').hide();
			$('#mess_vide_synthese_imc').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_imc").value;
			commentaire=document.getElementById("txt_Synthese_imc").value;
			var echo_score_imc=$("#echo_score_imc").html();
			// alert(echo_score_imc);
			risque="faible";
			if(document.getElementById("rd_Synthese_imc_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_imc_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_imc_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleImmo/Immoc/php/detect_synth_imc_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_imc=e;
					if(synthese_f_imc==0){
						$.ajax({
							type:'POST',
							url:'cycleImmo/Immoc/php/enreg_synth_imc.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_imc:echo_score_imc, risque:risque},
							success:function(e){
								alert(e);
							}
						});
					}else{
						$.ajax({
							type:'POST',
							url:'cycleImmo/Immoc/php/upd_synth_imc.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_imc:echo_score_imc, risque:risque},
							success:function(){	
							}
						});
					}
					$('#Int_Synthese_imc').hide();
					$('#message_Terminer_Synthese_imc').show();
				}
			});
		}
	});

	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

	$('#fermer_Synthese_imc').click(function(){
		$('#message_Donnees_Perdu_imc').show();
		$('#Int_Synthese_imc').hide();
	});
});
</script>

<div id="int_Synhtese_imc">
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
							<div id="echo_score_imc"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_imc_Faible" name="synth_imc" <?php //if($risque=="faible") echo 'checked'; ?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="rd_Synthese_imc_Moyen" name="synth_imc" <?php //if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="rd_Synthese_imc_Eleve" name="synth_imc" <?php //if($risque=="eleve") echo 'checked'; ?> onclick="click_eleve()" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_imc" cols="40" rows="20"><?php //if($commentaire=="") echo '[Veuillez rédiger votre commentaire ici]'; else echo $commentaire; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_imc_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_imc_Terminer" value="Terminer" class="bouton" />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_imc"></div>
</div>
