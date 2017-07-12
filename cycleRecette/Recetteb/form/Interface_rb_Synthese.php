
<script>

$(function(){
	$('#Synthese_rb_annuler').click(function(){
		$('#Int_Synthese_rb').hide();
		$('#fancybox_rb').hide();
	});
	// Evènement de la synthese de C
	$('#Synthese_rb_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_rb").value=="") || (document.getElementById("rd_Synthese_rb_Faible").checked==false && document.getElementById("rd_Synthese_rb_Moyen").checked==false && document.getElementById("rd_Synthese_rb_Eleve").checked==false)){
			$('#Int_Synthese_rb').hide();
			$('#mess_vide_synthese_rb').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_rb").value;
			commentaire=document.getElementById("txt_Synthese_rb").value;
			var echo_score_rb=$("#echo_score_rb").html();
			risque="faible";
			if(document.getElementById("rd_Synthese_rb_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_rb_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_rb_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recetteb/php/detect_synth_rb_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_rb=e;
					if(synthese_f_rb==0){
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recetteb/php/enreg_synth_rb.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_rb:echo_score_rb, risque:risque},
							success:function(){
							}
						});
					}else{
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recetteb/php/upd_synth_rb.php',
							data:{mission_id:mission_id, commentaire:commentaire, echo_score_rb:echo_score_rb, risque:risque},
							success:function(){	
							}
						});
					}
					$('#Int_Synthese_rb').hide();
					$('#message_Terminer_Synthese_rb').show();
				}
			});
		}
	});

	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

	$('#fermer_Synthese_rb').click(function(){
		$('#message_Donnees_Perdu_rb').show();
		$('#Int_Synthese_rb').hide();
	});
});
</script>

<div id="int_Synhtese_rb">
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
								<div id="echo_score_rb"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_rb_Faible" name="synth_rb" <?php //if($risque=="faible") echo 'checked'; ?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="rd_Synthese_rb_Moyen" name="synth_rb" <?php //if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="rd_Synthese_rb_Eleve" name="synth_rb" <?php //if($risque=="eleve") echo 'checked'; ?> onclick="click_eleve()" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_rb" cols="40" rows="20"><?php //if($commentaire=="") echo '[Veuillez rédiger votre commentaire ici]'; else echo $commentaire; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_rb_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_rb_Terminer" value="Terminer" class="bouton" />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_rb"></div>
</div>
