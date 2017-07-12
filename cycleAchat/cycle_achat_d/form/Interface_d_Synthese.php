
<script>

$(function(){
	$('#Synthese_d_annuler').click(function(){
		$('#Int_Synthese_d').hide();
		$('#fancybox_d').hide();
	});
	// Evènement de la synthese de C
	$('#Synthese_d_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_d").value=="") || (document.getElementById("rd_Synthese_d_Faible").checked==false && document.getElementById("rd_Synthese_d_Moyen").checked==false && document.getElementById("rd_Synthese_d_Eleve").checked==false)){
			$('#Int_Synthese_d').hide();
			$('#mess_vide_synthese_d').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_d").value;
			commentaire=document.getElementById("txt_Synthese_d").value;
			var echo_score_d=$("#echo_score_d").html();
			//alert(echo_score_d);
			risque="faible";
			if(document.getElementById("rd_Synthese_d_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_d_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_d_Eleve").checked==true){
				risque="eleve";
			}
			synthese_b_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_d/php/detect_synth_d_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_d_id=e;
					if(synthese_d_id==0){
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_d/php/enreg_synth_d.php',
							data:{mission_id:mission_id, commentaire:commentaire, echo_score_d:echo_score_d, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_d/php/upd_synth_d.php',
							data:{mission_id:mission_id, commentaire:commentaire, echo_score_d:echo_score_d, risque:risque},
							success:function(){	
							}
						});
					}
					$('#Int_Synthese_d').hide();
					$('#message_Terminer_Synthese_d').show();
				}
			});
		}
	});

	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

	$('#fermer_Synthese_d').click(function(){
		$('#message_Donnees_Perdu_d').show();
		$('#Int_Synthese_d').hide();
	});
});
</script>

<div id="int_Synhtese_d">
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
							<div id="echo_score_d"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_d_Faible" name="synth_c" <?php //if($risque=="faible") echo 'checked'; ?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="rd_Synthese_d_Moyen" name="synth_c" <?php //if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="rd_Synthese_d_Eleve" name="synth_c" <?php //if($risque=="eleve") echo 'checked'; ?> onclick="click_eleve()" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_d" cols="40" rows="20" ></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_d_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_d_Terminer" value="Terminer" class="bouton" <?php if($conclusionIdd!="") echo 'disabled';?> />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_d"></div>
</div>
