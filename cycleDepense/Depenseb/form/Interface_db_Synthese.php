<script>

$(function(){
	$('#Synthese_db_annuler').click(function(){
		$('#Int_Synthese_db').hide();
		$('#fancybox_db').hide();
	});
	// Evènement de la synthese de C
	$('#Synthese_db_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_db").value=="") || (document.getElementById("rd_Synthese_db_Faible").checked==false && document.getElementById("rd_Synthese_db_Moyen").checked==false && document.getElementById("rd_Synthese_db_Eleve").checked==false)){
			$('#Int_Synthese_db').hide();
			$('#mess_vide_synthese_db').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_db").value;
			commentaire=document.getElementById("txt_Synthese_db").value;
			var echo_score_db=$("#echo_score_db").html();
			// alert(echo_score_db);
			risque="faible";
			if(document.getElementById("rd_Synthese_db_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_db_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_db_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleDepense/Depenseb/php/detect_synth_db_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_db=e;
					if(synthese_f_db==0){
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depenseb/php/enreg_synth_db.php',
							data:{mission_id:mission_id, commentaire:commentaire, echo_score_db:echo_score_db, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depenseb/php/upd_synth_db.php',
							data:{mission_id:mission_id, commentaire:commentaire, echo_score_db:echo_score_db, risque:risque},
							success:function(){	
							}
						});
					}
					$('#Int_Synthese_db').hide();
					$('#message_Terminer_Synthese_db').show();
				}
			});
		}
	});

	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

	$('#fermer_Synthese_db').click(function(){
		$('#message_Donnees_Perdu_db').show();
		$('#Int_Synthese_db').hide();
	});
});
</script>

<div id="int_Synhtese_db">
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
							<div id="echo_score_db"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br/>
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_db_Faible" name="synth_db" <?php //if($risque=="faible") echo 'checked'; ?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="rd_Synthese_db_Moyen" name="synth_db" <?php //if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="rd_Synthese_db_Eleve" name="synth_db" <?php //if($risque=="eleve") echo 'checked'; ?> onclick="click_eleve()" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_db" cols="40" rows="20"><?php //if($commentaire=="") echo '[Veuillez rédiger votre commentaire ici]'; else echo $commentaire; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_db_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_db_Terminer" value="Terminer" class="bouton" />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_db"></div>
</div>
