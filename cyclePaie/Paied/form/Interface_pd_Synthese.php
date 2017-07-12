
<script>

$(function(){
	$('#Synthese_pd_annuler').click(function(){
		$('#Int_Synthese_pd').hide();
		$('#fancybox_pd').hide();
	});
	// Evènement de la synthese de C
	$('#Synthese_pd_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_pd").value=="") || (document.getElementById("rd_Synthese_pd_Faible").checked==false && document.getElementById("rd_Synthese_pd_Moyen").checked==false && document.getElementById("rd_Synthese_pd_Eleve").checked==false)){
			$('#Int_Synthese_pd').hide();
			$('#mess_vide_synthese_pd').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_pd").value;
			commentaire=document.getElementById("txt_Synthese_pd").value;
			var echo_score_pd=$("#echo_score_pd").html();
			risque="faible";
			if(document.getElementById("rd_Synthese_pd_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_pd_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_pd_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paied/php/detect_synth_pd_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_pd=e;
					if(synthese_f_pd==0){
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paied/php/enreg_synth_pd.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_pd:echo_score_pd, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paied/php/upd_synth_pd.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_pd:echo_score_pd, risque:risque},
							success:function(){	
							}
						});
					}
					$('#Int_Synthese_pd').hide();
					$('#message_Terminer_Synthese_pd').show();
				}
			});
		}
	});

	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

	$('#fermer_Synthese_pd').click(function(){
		$('#message_Donnees_Perdu_pd').show();
		$('#Int_Synthese_pd').hide();
	});
});
</script>

<div id="int_Synhtese_pd">
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
							<div id="echo_score_pd"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_pd_Faible" name="synth_pd" <?php //if($risque=="faible") echo 'checked'; ?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="rd_Synthese_pd_Moyen" name="synth_pd" <?php //if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="rd_Synthese_pd_Eleve" name="synth_pd" <?php //if($risque=="eleve") echo 'checked'; ?> onclick="click_eleve()" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_pd" cols="40" rows="20"><?php //if($commentaire=="") echo '[Veuillez rédiger votre commentaire ici]'; else echo $commentaire; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_pd_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_pd_Terminer" value="Terminer" class="bouton" />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_pd"></div>
</div>
