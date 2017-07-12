<script>

$(function(){
	$('#Synthese_pc_annuler').click(function(){
		$('#Int_Synthese_pc').hide();
		$('#fancybox_pc').hide();
	});
	// Evènement de la synthese de C
	$('#Synthese_pc_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_pc").value=="") || (document.getElementById("rd_Synthese_pc_Faible").checked==false && document.getElementById("rd_Synthese_pc_Moyen").checked==false && document.getElementById("rd_Synthese_pc_Eleve").checked==false)){
			$('#Int_Synthese_pc').hide();
			$('#mess_vide_synthese_pc').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_pc").value;
			commentaire=document.getElementById("txt_Synthese_pc").value;
			var echo_score_pc=$("#echo_score_pc").html();
			risque="faible";
			if(document.getElementById("rd_Synthese_pc_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_pc_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_pc_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paiec/php/detect_synth_pc_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_pc=e;
					if(synthese_f_pc==0){
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paiec/php/enreg_synth_pc.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_pc:echo_score_pc, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paiec/php/upd_synth_pc.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_pc:echo_score_pc, risque:risque},
							success:function(){	
							}
						});
					}
					$('#Int_Synthese_pc').hide();
					$('#message_Terminer_Synthese_pc').show();
				}
			});
		}
	});

	$('#fermer_Synthese_pc').click(function(){
		$('#message_Donnees_Perdu_pc').show();
		$('#Int_Synthese_pc').hide();
	});
	
	$('#txt_Synthese_pc').click(function(){
		document.getElementById("txt_Synthese_pc").value="";
	});
});
</script>

<div id="int_Synhtese_pc">
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
							<div id="echo_score_pc"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_pc_Faible" name="synth_pc" <?php //if($risque=="faible") echo 'checked'; ?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="rd_Synthese_pc_Moyen" name="synth_pc" <?php //if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="rd_Synthese_pc_Eleve" name="synth_pc" <?php //if($risque=="eleve") echo 'checked'; ?> onclick="click_eleve()" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_pc" cols="40" rows="20"><?php //if($commentaire=="") echo '[Veuillez rédiger votre commentaire ici]'; else echo $commentaire; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_pc_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_pc_Terminer" value="Terminer" class="bouton" />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_pc"></div>
</div>
