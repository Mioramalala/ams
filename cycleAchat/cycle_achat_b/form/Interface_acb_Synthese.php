
<script>

$(function(){

	$('#Synthese_acb_annuler').click(function(){
		$('#Int_Synthese_acb').hide();
		$('#fancybox_acb').hide();
	});

	// Evènement de la synthese de C

		$('#Synthese_acb_Terminer').click(function(){
			if((document.getElementById("txt_Synthese_acb").value=="") 
				|| (document.getElementById("rd_Synthese_acb_Faible").checked==false && document.getElementById("rd_Synthese_acb_Moyen").checked==false && document.getElementById("rd_Synthese_acb_Eleve").checked==false)){
				$('#Int_Synthese_acb').hide();
				$('#mess_vide_synthese_acb').show();
			} 
			else {
				mission_id=document.getElementById("txt_mission_id_acb").value;
				commentaire=document.getElementById("txt_Synthese_acb").value;
				var echo_score=$("#echo_score").html();
				risque="faible";
				if(document.getElementById("rd_Synthese_acb_Faible").checked==true){
					risque="faible";
				}
				else if(document.getElementById("rd_Synthese_acb_Moyen").checked==true){
					risque="moyen";
				}
				else if(document.getElementById("rd_Synthese_acb_Eleve").checked==true){
					risque="eleve";
				}
				synthese_f_id=0;
				$.ajax({
					type:'POST',
					url:'cycleAchat/cycle_achat_b/php/detect_synth_acb_id.php',
					data:{mission_id:mission_id},
					success:function(e){
						synthese_f_acb=e;
						if(synthese_f_acb==0){
							$.ajax({
								type:'POST',
								url:'cycleAchat/cycle_achat_b/php/enreg_synth_acb.php',
								data:{mission_id:mission_id, commentaire:commentaire, echo_score:echo_score, risque:risque},
								success:function(){
									
								}
							});
						}
						else{
							$.ajax({
								type:'POST',
								url:'cycleAchat/cycle_achat_b/php/upd_synth_acb.php',
								data:{mission_id:mission_id, commentaire:commentaire, echo_score:echo_score, risque:risque},
								success:function(){	
								}
							});
						}
						$('#Int_Synthese_acb').hide();
						$('#message_Terminer_Synthese_acb').show();
					}
				});	
			}
		});
	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

	$('#fermer_Synthese_acb').click(function(){
		$('#message_Donnees_Perdu_acb').show();
		$('#Int_Synthese_acb').hide();
	});
});
</script>

<div id="int_Synhtese_acb">
	<table width="500">
		<tr>
			<td>
				<table width="139">
					<tr bgcolor="#05abe1">
						<td class="label_Question" align="center">Score :
						</td>
					</tr>
					<tr bgcolor="#05abe1">
						<td height="50" class="label_Question" align="center" id="totalScore">
							<div id="echo_score"></div>
						</td>
					</tr>
					<tr bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_acb_Faible" name="synth_acb" />Faible<br />
										<input type="radio" id="rd_Synthese_acb_Moyen" name="synth_acb" />Moyen<br />
										<input type="radio" id="rd_Synthese_acb_Eleve" name="synth_acb" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_acb" cols="40" rows="20" ></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_acb_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_acb_Terminer" value="Terminer" class="bouton" />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_acb"></div>
</div>
