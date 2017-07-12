

<script>

$(function(){
	$('#Synthese_rc_annuler').click(function(){
		$('#Int_Synthese_rc').hide();
		$('#fancybox_rc').hide();
	});


	// Evènement de la synthese de C
	$('#Synthese_rc_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_rc").value=="") || (document.getElementById("rc_Synthese_rc_Faible").checked==false && document.getElementById("rc_Synthese_rc_Moyen").checked==false && document.getElementById("rc_Synthese_rc_Eleve").checked==false)){
			$('#Int_Synthese_rc').hide();
			$('#mess_vide_synthese_rc').show();
		}
		else{

			mission_id=document.getElementById("txt_mission_id_rc").value;
			commentaire=document.getElementById("txt_Synthese_rc").value;
			
			// tinay editer. sauver le score ds l html pour le recuperer ensuite.
			var echo_score_rc= $("#echo_score_rc").html();
			if(echo_score_rc == ''){
				// tinay editer : calculer score.
				// se rediriger vers calcul score
				$.ajax({
					type:'POST',
					url:'cycleRecette/Recettec/php/select_score_rc.php',
					data:{mission_id:mission_id},
					success:function(e){
					    $("#echo_score_rc").html(e);
					}			
				});
			}
			
			
			risque="faible";
			
			if(document.getElementById("rc_Synthese_rc_Faible").checked==true){
				risque="faible";
			}else if(document.getElementById("rc_Synthese_rc_Moyen").checked==true){
				risque="moyen";
			}else if(document.getElementById("rc_Synthese_rc_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;

			$.ajax({
				type:'POST',
				url:'cycleRecette/Recettec/php/detect_synth_rc_id.php',
				data:{mission_id:mission_id},
				success:function(e){

					if(e==0){
						//alert('Insert');
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recettec/php/enreg_synth_rc.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_rc:echo_score_rc, risque:risque},
							success:function(e){
								//alert(e);
							}
						});
					}
					else{
						//alert('update');
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recettec/php/upd_synth_rc.php',
							data:{mission_id:mission_id, commentaire:commentaire, echo_score_rc:echo_score_rc, risque:risque},
							success:function(e){	
								//alert(e);
							}
						});
					}
					$('#Int_Synthese_rc').hide();
					$('#message_Terminer_Synthese_rc').show();
				}
			});
		}
	});

	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

	$('#fermer_Synthese_rc').click(function(){
		$('#message_Donnees_Percu_rc').show();
		$('#Int_Synthese_rc').hide();
	});
});
</script>

<div id="int_Synhtese_rc">
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
							<div id="echo_score_rc"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rc_Synthese_B_Faible" checked /-->
										<input type="radio" id="rc_Synthese_rc_Faible" name="synth_rc" <?php if($risque=="faible") echo 'checked'; ?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="rc_Synthese_rc_Moyen" name="synth_rc" <?php if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="rc_Synthese_rc_Eleve" name="synth_rc" <?php if($risque=="eleve") echo 'checked'; ?> onclick="click_eleve()" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_rc" cols="40" rows="20"><?php //if($commentaire=="") echo '[Veuillez rédiger votre commentaire ici]'; else echo $commentaire; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_rc_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_rc_Terminer" value="Terminer" class="bouton" />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_rc"></div>
</div>
