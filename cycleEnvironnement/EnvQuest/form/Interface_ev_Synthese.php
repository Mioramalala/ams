
<script>

$(function(){
	$('#Synthese_ev_annuler').click(function(){
		$('#Int_Synthese_ev').hide();
		$('#fancybox_ev').hide();
	});
	// Evènement de la synthese de C
	$('#Synthese_ev_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_ev").value=="") || (document.getElementById("rd_Synthese_ev_Faible").checked==false && document.getElementById("rd_Synthese_ev_Moyen").checked==false && document.getElementById("rd_Synthese_ev_Eleve").checked==false)){
			$('#Int_Synthese_ev').hide();
			$('#mess_vide_synthese_ev').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_ev").value;
			commentaire=document.getElementById("txt_Synthese_ev").value;
			var echo_score_ev=$("#echo_score_ev").html();
			//alert(echo_score_ev);
			
			risque="faible";
			if(document.getElementById("rd_Synthese_ev_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_ev_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_ev_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleEnvironnement/EnvQuest/php/detect_synth_ev_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_ev=e;
					if(synthese_f_ev==0){
						$.ajax({
							type:'POST',
							url:'cycleEnvironnement/EnvQuest/php/enreg_synth_ev.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_ev:echo_score_ev, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleEnvironnement/EnvQuest/php/upd_synth_ev.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_ev:echo_score_ev, risque:risque},
							success:function(){	
							}
						});
					}
					$('#Int_Synthese_ev').hide();
					$('#message_Terminer_Synthese_ev').show();
				}
			});
		}
	});
	
	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

	$('#fermer_Synthese_ev').click(function(){
		$('#message_Donnees_Perdu_ev').show();
		$('#Int_Synthese_ev').hide();
	});
});
</script>

<div id="int_Synhtese_ev">
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
							<div id="echo_score_ev"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_ev_Faible" name="synth_ev" <?php //if($risque=="faible") echo 'checked'; ?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="rd_Synthese_ev_Moyen" name="synth_ev" <?php //if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="rd_Synthese_ev_Eleve" name="synth_ev" <?php //if($risque=="eleve") echo 'checked'; ?> onclick="click_eleve()" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_ev" cols="40" rows="20" placeholder="Veuillez rédiger votre commentaire ici"><?php //if($commentaire=="") echo '[Veuillez rédiger votre commentaire ici]'; else echo $commentaire; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_ev_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_ev_Terminer" value="Terminer" class="bouton" />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_ev"></div>
</div>
