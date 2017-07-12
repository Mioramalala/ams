<script>

$(function(){
	$('#Synthese_dd_annuler').click(function(){
		$('#Int_Synthese_dd').hide();
		$('#fancybox_dd').hide();
	});
	// Evènement de la synthese de C
	$('#Synthese_dd_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_dd").value=="") || (document.getElementById("rd_Synthese_dd_Faible").checked==false && document.getElementById("rd_Synthese_dd_Moyen").checked==false && document.getElementById("rd_Synthese_dd_Eleve").checked==false)){
			$('#Int_Synthese_dd').hide();
			$('#mess_vide_synthese_dd').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_dd").value;
			commentaire=document.getElementById("txt_Synthese_dd").value;
			var echo_score_dd=$("#echo_score_dd").html();
			// alert(echo_score_dd);
			risque="faible";
			if(document.getElementById("rd_Synthese_dd_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_dd_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_dd_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleDepense/Depensed/php/detect_synth_dd_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_dd=e;
					if(synthese_f_dd==0){
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depensed/php/enreg_synth_dd.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_dd:echo_score_dd, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depensed/php/upd_synth_dd.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_dd:echo_score_dd, risque:risque},
							success:function(){	
							}
						});
					}
					$('#Int_Synthese_dd').hide();
					$('#message_Terminer_Synthese_dd').show();
				}
			});
		}
	});

	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

	$('#fermer_Synthese_dd').click(function(){
		$('#message_Donnees_Perdu_dd').show();
		$('#Int_Synthese_dd').hide();
	});
});
</script>

<div id="int_Synhtese_dd">
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
							<div id="echo_score_dd"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_dd_Faible" name="synth_dd" <?php //if($risque=="faible") echo 'checked'; ?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="rd_Synthese_dd_Moyen" name="synth_dd" <?php //if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="rd_Synthese_dd_Eleve" name="synth_dd" <?php //if($risque=="eleve") echo 'checked'; ?> onclick="click_eleve()" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_dd" cols="40" rows="20"><?php //if($commentaire=="") echo '[Veuillez rédiger votre commentaire ici]'; else echo $commentaire; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_dd_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_dd_Terminer" value="Terminer" class="bouton" />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_dd"></div>
</div>
