
<script>

$(function(){
	$('#Synthese_pb_annuler').click(function(){
		$('#Int_Synthese_pb').hide();
		$('#fancybox_pb').hide();
	});
	// Evènement de la synthese de C
	$('#Synthese_pb_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_pb").value=="") || (document.getElementById("rd_Synthese_pb_Faible").checked==false && document.getElementById("rd_Synthese_pb_Moyen").checked==false && document.getElementById("rd_Synthese_pb_Eleve").checked==false)){
			$('#Int_Synthese_pb').hide();
			$('#mess_vide_synthese_pb').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_pb").value;
			commentaire=document.getElementById("txt_Synthese_pb").value;
			var echo_score_pb=$("#echo_score_pb").html();
			risque="faible";
			if(document.getElementById("rd_Synthese_pb_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_pb_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_pb_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paieb/php/detect_synth_pb_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_pb=e;
					if(synthese_f_pb==0){
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paieb/php/enreg_synth_pb.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_pb:echo_score_pb, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paieb/php/upd_synth_pb.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_pb:echo_score_pb, risque:risque},
							success:function(){	
							}
						});
					}
					$('#Int_Synthese_pb').hide();
					$('#message_Terminer_Synthese_pb').show();
				}
			});
		}
	});

	$('#fermer_Synthese_pb').click(function(){
		$('#message_Donnees_Perdu_pb').show();
		$('#Int_Synthese_pb').hide();
	});
	
	$('#txt_Synthese_pb').click(function(){
		document.getElementById("txt_Synthese_pb").value="";
	});
});
</script>

<div id="int_Synhtese_pb">
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
							<div id="echo_score_pb"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_pb_Faible" name="synth_pb" <?php //if($risque=="faible") echo 'checked'; ?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="rd_Synthese_pb_Moyen" name="synth_pb" <?php //if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="rd_Synthese_pb_Eleve" name="synth_pb" <?php //if($risque=="eleve") echo 'checked'; ?> onclick="click_eleve()" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_pb" cols="40" rows="20"><?php //if($commentaire=="") echo '[Veuillez rédiger votre commentaire ici]'; else echo $commentaire; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_pb_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_pb_Terminer" value="Terminer" class="bouton" />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_pb"></div>
</div>
