
<script>

$(function(){
	$('#Synthese_de_annuler').click(function(){
		$('#Int_Synthese_de').hide();
		$('#fancybox_de').hide();
	});
	// Evènement de la synthese de C
	$('#Synthese_de_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_de").value=="") || (document.getElementById("rd_Synthese_de_Faible").checked==false && document.getElementById("rd_Synthese_de_Moyen").checked==false && document.getElementById("rd_Synthese_de_Eleve").checked==false)){
			$('#Int_Synthese_de').hide();
			$('#mess_vide_synthese_de').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_de").value;
			commentaire=document.getElementById("txt_Synthese_de").value;
			var echo_score_de=$("#echo_score_de").text();
			alert(echo_score_de);
			risque="faible";
			if(document.getElementById("rd_Synthese_de_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_de_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_de_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleDepense/Depensee/php/detect_synth_de_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_de=e;
					if(synthese_f_de==0){
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depensee/php/enreg_synth_de.php',
							data:{mission_id:mission_id, commentaire:commentaire, echo_score_de:echo_score_de, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depensee/php/upd_synth_de.php',
							data:{mission_id:mission_id, commentaire:commentaire, echo_score_de:echo_score_de, risque:risque},
							success:function(){	
							}
						});
					}
					$('#Int_Synthese_de').hide();
					$('#message_Terminer_Synthese_de').show();
				}
			});
		}
	});

	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

	$('#fermer_Synthese_de').click(function(){
		$('#message_Donnees_Perdu_de').show();
		$('#Int_Synthese_de').hide();
	});
});
</script>

<div id="int_Synhtese_de">
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
							<div id="echo_score_de"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_de_Faible" name="synth_de" <?php //if($risque=="faible") echo 'checked'; ?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="rd_Synthese_de_Moyen" name="synth_de" <?php //if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="rd_Synthese_de_Eleve" name="synth_de" <?php //if($risque=="eleve") echo 'checked'; ?> onclick="click_eleve()" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_de" cols="40" rows="20"><?php //if($commentaire=="") echo '[Veuillez rédiger votre commentaire ici]'; else echo $commentaire; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_de_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_de_Terminer" value="Terminer" class="bouton" />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_de"></div>
</div>
