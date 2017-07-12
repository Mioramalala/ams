
<script>

$(function(){
	$('#Synthese_ve_annuler').click(function(){
		$('#Int_Synthese_ve').hide();
		$('#fancybox_ve').hide();
	});
	// Evènement de la synthese de C
	$('#Synthese_ve_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_ve").value=="") || (document.getElementById("rd_Synthese_ve_Faible").checked==false && document.getElementById("rd_Synthese_ve_Moyen").checked==false && document.getElementById("rd_Synthese_ve_Eleve").checked==false)){
			$('#Int_Synthese_ve').hide();
			$('#mess_vide_synthese_ve').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_ve").value;
			commentaire=document.getElementById("txt_Synthese_ve").value;
			var echo_score_ve=$("#echo_score_ve").html();
			risque="faible";
			if(document.getElementById("rd_Synthese_ve_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_ve_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_ve_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Ventee/php/detect_synth_ve_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_ve=e;
					if(synthese_f_ve==0){
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventee/php/enreg_synth_ve.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_ve:echo_score_ve, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventee/php/upd_synth_ve.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_ve:echo_score_ve, risque:risque},
							success:function(){	
							}
						});
					}
					$('#Int_Synthese_ve').hide();
					$('#message_Terminer_Synthese_ve').show();
				}
			});
		}
	});

	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

	$('#fermer_Synthese_ve').click(function(){
		$('#message_Donnees_Perdu_ve').show();
		$('#Int_Synthese_ve').hide();
	});
});
</script>

<div id="int_Synhtese_ve">
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
							<div id="echo_score_ve"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_ve_Faible" name="synth_ve" <?php //if($risque=="faible") echo 'checked'; ?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="rd_Synthese_ve_Moyen" name="synth_ve" <?php //if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="rd_Synthese_ve_Eleve" name="synth_ve" <?php //if($risque=="eleve") echo 'checked'; ?> onclick="click_eleve()" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_ve" cols="40" rows="20"><?php //if($commentaire=="") echo '[Veuillez rédiger votre commentaire ici]'; else echo $commentaire; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_ve_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_ve_Terminer" value="Terminer" class="bouton" />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_ve"></div>
</div>
