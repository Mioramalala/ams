<script>

$(function(){
	$('#Synthese_imd_annuler').click(function(){
		$('#Int_Synthese_imd').hide();
		$('#fancybox_imd').hide();
	});
	// Evènement de la synthese de C
	$('#Synthese_imd_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_imd").value=="") || (document.getElementById("rd_Synthese_imd_Faible").checked==false && document.getElementById("rd_Synthese_imd_Moyen").checked==false && document.getElementById("rd_Synthese_imd_Eleve").checked==false)){
			$('#Int_Synthese_imd').hide();
			$('#mess_vide_synthese_imd').show();
		}else{
			mission_id=document.getElementById("txt_mission_id_imd").value;
			commentaire=document.getElementById("txt_Synthese_imd").value;
			var echo_score_imd=$("#echo_score_imd").html();
			risque="faible";
			if(document.getElementById("rd_Synthese_imd_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_imd_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_imd_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleImmo/Immod/php/detect_synth_imd_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_imd=e;
					if(synthese_f_imd==0){
						$.ajax({
							type:'POST',
							url:'cycleImmo/Immod/php/enreg_synth_imd.php',
							data:{mission_id:mission_id, commentaire:commentaire, echo_score_imd:echo_score_imd, risque:risque},
							success:function(e){
								//alert(e);
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleImmo/Immod/php/upd_synth_imd.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_imd:echo_score_imd, risque:risque},
							success:function(){	
							}
						});
					}
					$('#Int_Synthese_imd').hide();
					$('#message_Terminer_Synthese_imd').show();
				}
			});
		}
	});

	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

	$('#fermer_Synthese_imd').click(function(){
		$('#message_Donnees_Perdu_imd').show();
		$('#Int_Synthese_imd').hide();
	});
});
</script>

<div id="int_Synhtese_imd">
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
							<div id="echo_score_imd"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_imd_Faible" name="synth_imd" <?php //if($risque=="faible") echo 'checked'; ?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="rd_Synthese_imd_Moyen" name="synth_imd" <?php //if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="rd_Synthese_imd_Eleve" name="synth_imd" <?php //if($risque=="eleve") echo 'checked'; ?> onclick="click_eleve()" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_imd" cols="40" rows="20"><?php //if($commentaire=="") echo '[Veuillez rédiger votre commentaire ici]'; else echo $commentaire; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_imd_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_imd_Terminer" value="Terminer" class="bouton" />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_imd"></div>
</div>
