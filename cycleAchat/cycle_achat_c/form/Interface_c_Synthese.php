
<script>

$(function(){
	$('#Synthese_c_annuler').click(function(){
		$('#Int_Synthese_c').hide();
		$('#fancybox_c').hide();
	});
	// Evènement de la synthese de C
	$('#Synthese_c_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_c").value=="") || (document.getElementById("rd_Synthese_c_Faible").checked==false && document.getElementById("rd_Synthese_c_Moyen").checked==false && document.getElementById("rd_Synthese_c_Eleve").checked==false)){
			$('#Int_Synthese_c').hide();
			$('#mess_vide_synthese_c').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_c").value;
			commentaire=document.getElementById("txt_Synthese_c").value;
			var echo_score_c=$("#echo_score_c").html();
			//alert(echo_score_c);
			risque="faible";
			if(document.getElementById("rd_Synthese_c_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_c_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_c_Eleve").checked==true){
				risque="eleve";
			}
			synthese_b_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_c/php/detect_synth_c_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_b_id=e;
					if(synthese_b_id==0){
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_c/php/enreg_synth_c.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_c:echo_score_c, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_c/php/upd_synth_c.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_c:echo_score_c, risque:risque},
							success:function(){	
							}
						});
					}
					$('#Int_Synthese_c').hide();
					$('#message_Terminer_Synthese_c').show();
				}
			});
		}
	});

	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

	$('#fermer_Synthese_c').click(function(){
		$('#message_Donnees_Perdu_c').show();
		$('#Int_Synthese_c').hide();
	});
});
</script>

<div id="int_Synhtese_c">
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
							<div id="echo_score_c"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_c_Faible" name="synth_c" <?php //if($risque=="faible") echo 'checked'; ?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="rd_Synthese_c_Moyen" name="synth_c" <?php //if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="rd_Synthese_c_Eleve" name="synth_c" <?php //if($risque=="eleve") echo 'checked'; ?> onclick="click_eleve()" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_c" cols="40" rows="20" ></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_c_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_c_Terminer" value="Terminer" class="bouton" />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_c"></div>
</div>
