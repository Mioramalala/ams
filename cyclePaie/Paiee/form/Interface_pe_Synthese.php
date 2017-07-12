

<script>

$(function(){
	$('#Synthese_pe_annuler').click(function(){
		$('#Int_Synthese_pe').hide();
		$('#fancybox_pe').hide();
	});
	// Evènement de la synthese de C
	$('#Synthese_pe_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_pe").value=="") || (document.getElementById("rd_Synthese_pe_Faible").checked==false && document.getElementById("rd_Synthese_pe_Moyen").checked==false && document.getElementById("rd_Synthese_pe_Eleve").checked==false)){
			$('#Int_Synthese_pe').hide();
			$('#mess_vide_synthese_pe').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_pe").value;
			commentaire=document.getElementById("txt_Synthese_pe").value;
			var echo_score_pe=$("#echo_score_pe").html();
			risque="faible";
			if(document.getElementById("rd_Synthese_pe_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_pe_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_pe_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paiee/php/detect_synth_pe_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_pe=e;
					if(synthese_f_pe==0){
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paiee/php/enreg_synth_pe.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_pe:echo_score_pe, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paiee/php/upd_synth_pe.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_pe:echo_score_pe, risque:risque},
							success:function(){	
							}
						});
					}
					$('#Int_Synthese_pe').hide();
					$('#message_Terminer_Synthese_pe').show();
				}
			});
		}
	});

	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

	$('#fermer_Synthese_pe').click(function(){
		$('#message_Donnees_Perdu_pe').show();
		$('#Int_Synthese_pe').hide();
	});
});
</script>

<div id="int_Synhtese_pe">
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
							<div id="echo_score_pe"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_pe_Faible" name="synth_pe" <?php //if($risque=="faible") echo 'checked'; ?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="rd_Synthese_pe_Moyen" name="synth_pe" <?php //if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="rd_Synthese_pe_Eleve" name="synth_pe" <?php //if($risque=="eleve") echo 'checked'; ?> onclick="click_eleve()" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_pe" cols="40" rows="20"><?php //if($commentaire=="") echo '[Veuillez rédiger votre commentaire ici]'; else echo $commentaire; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_pe_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_pe_Terminer" value="Terminer" class="bouton" />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_pe"></div>
</div>
