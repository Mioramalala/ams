

<script>

$(function(){
	$('#Synthese_vd_annuler').click(function(){
		$('#Int_Synthese_vd').hide();
		$('#fancybox_vd').hide();
	});
	// Evènement de la synthese de C
	$('#Synthese_vd_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_vd").value=="") || (document.getElementById("rd_Synthese_vd_Faible").checked==false && document.getElementById("rd_Synthese_vd_Moyen").checked==false && document.getElementById("rd_Synthese_vd_Eleve").checked==false)){
			$('#Int_Synthese_vd').hide();
			$('#mess_vide_synthese_vd').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_vd").value;
			commentaire=document.getElementById("txt_Synthese_vd").value;
			var echo_score_vd=$("#echo_score_vd").html();
			risque="faible";
			if(document.getElementById("rd_Synthese_vd_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_vd_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_vd_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Vented/php/detect_synth_vd_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_vd=e;
					if(synthese_f_vd==0){
						$.ajax({
							type:'POST',
							url:'cycleVente/Vented/php/enreg_synth_vd.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_vd:echo_score_vd, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Vented/php/upd_synth_vd.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_vd:echo_score_vd, risque:risque},
							success:function(){	
							}
						});
					}
					$('#Int_Synthese_vd').hide();
					$('#message_Terminer_Synthese_vd').show();
				}
			});
		}
	});

	$('#fermer_Synthese_vd').click(function(){
		$('#message_Donnees_Perdu_vd').show();
		$('#Int_Synthese_vd').hide();
	});
	
	$('#txt_Synthese_vd').click(function(){
		document.getElementById("txt_Synthese_vd").value="";
	});
});
</script>

<div id="int_Synhtese_vd">
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
							<div id="echo_score_vd"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_vd_Faible" name="synth_vd" <?php //if($risque=="faible") echo 'checked'; ?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="rd_Synthese_vd_Moyen" name="synth_vd" <?php //if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="rd_Synthese_vd_Eleve" name="synth_vd" <?php //if($risque=="eleve") echo 'checked'; ?> onclick="click_eleve()" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_vd" cols="40" rows="20"><?php //if($commentaire=="") echo '[Veuillez rédiger votre commentaire ici]'; else echo $commentaire; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_vd_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_vd_Terminer" value="Terminer" class="bouton" />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_vd"></div>
</div>
