<script>

$(function(){
	$('#Synthese_e_annuler').click(function(){
		$('#Int_Synthese_e').hide();
		$('#fancybox_e').hide();
	});
	// Evènement de la synthese de C
	$('#Synthese_e_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_e").value=="") || (document.getElementById("rd_Synthese_e_Faible").checked==false && document.getElementById("rd_Synthese_e_Moyen").checked==false && document.getElementById("rd_Synthese_e_Eleve").checked==false)){
			$('#Int_Synthese_e').hide();
			$('#mess_vide_synthese_e').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_e").value;
			commentaire=document.getElementById("txt_Synthese_e").value;
			var echo_score_e=$("#echo_score_e").html();
			alert(echo_score_e);
			risque="faible";
			if(document.getElementById("rd_Synthese_e_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_e_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_e_Eleve").checked==true){
				risque="eleve";
			}
			synthese_e_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_e/php/detect_synth_e_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_e_id=e;
					if(synthese_e_id==0){
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_e/php/enreg_synth_e.php',
							data:{mission_id:mission_id, commentaire:commentaire, echo_score_e:echo_score_e, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_e/php/upd_synth_e.php',
							data:{mission_id:mission_id, commentaire:commentaire, echo_score_e:echo_score_e, risque:risque},
							success:function(){	
							}
						});
					}
					$('#Int_Synthese_e').hide();
					$('#message_Terminer_Synthese_e').show();
				}
			});
		}
	});

	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

	$('#fermer_Synthese_e').click(function(){
		$('#message_Donnees_Perdu_e').show();
		$('#Int_Synthese_e').hide();
	});
});
</script>

<div id="int_Synhtese_e">
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
							<div id="echo_score_e"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_e_Faible" name="synthese_e" <?php //if($risque=="faible") echo 'checked'; ?> onclick="click_faible()"  <?php if($conclusionIde!="") echo 'disabled';?>/>Faible<br />
										<input type="radio" id="rd_Synthese_e_Moyen" name="synthese_e" <?php //if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" <?php if($conclusionIde!="") echo 'disabled';?> />Moyen<br />
										<input type="radio" id="rd_Synthese_e_Eleve" name="synthese_e" <?php //if($risque=="eleve") echo 'checked'; ?> onclick="click_eleve()" <?php if($conclusionIde!="") echo 'disabled';?> />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_e" cols="40" rows="20" <?php if($conclusionIde!="") echo 'disabled';?> ></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_e_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_e_Terminer" value="Terminer" class="bouton" <?php if($conclusionIde!="") echo 'disabled';?> />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_e"></div>
</div>
