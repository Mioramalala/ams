<script>

$(function(){
	$('#Synthese_f_annuler').click(function(){
		$('#Int_Synthese_f').hide();
		$('#fancybox_f').hide();
	});
	// Evènement de la synthese de C
	$('#Synthese_f_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_f").value=="") || (document.getElementById("rd_Synthese_f_Faible").checked==false && document.getElementById("rd_Synthese_f_Moyen").checked==false && document.getElementById("rd_Synthese_f_Eleve").checked==false)){
			$('#Int_Synthese_f').hide();
			$('#mess_vide_synthese_f').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_f").value;
			commentaire=document.getElementById("txt_Synthese_f").value;
			var echo_score_f=$("#echo_score_f").html();
			//alert(echo_score_f);
			risque="faible";
			if(document.getElementById("rd_Synthese_f_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_f_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_f_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_f/php/detect_synth_f_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_id=e;
					if(synthese_f_id==0){
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_f/php/enreg_synth_f.php',
							data:{mission_id:mission_id, commentaire:commentaire, echo_score_f:echo_score_f, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_f/php/upd_synth_f.php',
							data:{mission_id:mission_id, commentaire:commentaire, echo_score_f:echo_score_f, risque:risque},
							success:function(){	
							}
						});
					}
					$('#Int_Synthese_f').hide();
					$('#message_Terminer_Synthese_f').show();
				}
			});
		}
	});

	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

	$('#fermer_Synthese_f').click(function(){
		$('#message_Donnees_Perdu_f').show();
		$('#Int_Synthese_f').hide();
	});
});
</script>

<div id="int_Synhtese_f">
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
							<div id="echo_score_f"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_f_Faible" name="synth_f" <?php if($conclusionIdf!="") echo 'disabled'; ?> <?php //if($risque=="faible") echo 'checked'; ?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="rd_Synthese_f_Moyen" name="synth_f" <?php if($conclusionIdf!="") echo 'disabled'; ?> <?php //if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="rd_Synthese_f_Eleve" name="synth_f" <?php if($conclusionIdf!="") echo 'disabled'; ?> onclick="click_eleve()" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_f" cols="40" rows="20" <?php if($conclusionIdf!="") echo 'disabled'; ?> ></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_f_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_f_Terminer" value="Terminer" class="bouton" <?php if($conclusionIdf!="") echo 'disabled'; ?>/>
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_f"></div>
</div>
