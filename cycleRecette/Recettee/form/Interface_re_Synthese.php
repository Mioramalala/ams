

<script>

$(function(){
	$('#Synthese_re_annuler').click(function(){
		$('#Int_Synthese_re').hide();
		$('#fancybox_re').hide();
	});
	// Evènement de la synthese de C
	$('#Synthese_re_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_re").value=="") || (document.getElementById("re_Synthese_re_Faible").checked==false && document.getElementById("re_Synthese_re_Moyen").checked==false && document.getElementById("re_Synthese_re_Eleve").checked==false)){
			$('#Int_Synthese_re').hide();
			$('#mess_vide_synthese_re').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_re").value;
			commentaire=document.getElementById("txt_Synthese_re").value;
			
			// tinay editer
			var echo_score_re=$("#echo_score_re").html();
			if(echo_score_re == ''){
				// se rediriger vers calcul score
				$.ajax({
					type:'POST',
					url:'cycleRecette/Recetted/php/select_score_rd.php',
					data:{mission_id:mission_id},
					success:function(e){
					    $("#echo_score_rd").html(e);
					}			
				});
			}
			
			risque="faible";
			if(document.getElementById("re_Synthese_re_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("re_Synthese_re_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("re_Synthese_re_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recettee/php/detect_synth_re_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_re=e;
					if(synthese_f_re==0){
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recettee/php/enreg_synth_re.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_re:echo_score_re, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recettee/php/upd_synth_re.php',
							data:{mission_id:mission_id, commentaire:commentaire, echo_score_re:echo_score_re, risque:risque},
							success:function(){	
							}
						});
					}
					$('#Int_Synthese_re').hide();
					$('#message_Terminer_Synthese_re').show();
				}
			});
		}
	});

	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

	$('#fermer_Synthese_re').click(function(){
		$('#message_Donnees_Pereu_re').show();
		$('#Int_Synthese_re').hide();
	});
});
</script>

<div id="int_Synhtese_re">
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
							<div id="echo_score_re"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="re_Synthese_B_Faible" checked /-->
										<input type="radio" id="re_Synthese_re_Faible" name="synth_re" <?php //if($risque=="faible") echo 'checked'; ?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="re_Synthese_re_Moyen" name="synth_re" <?php //if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="re_Synthese_re_Eleve" name="synth_re" <?php //if($risque=="eleve") echo 'checked'; ?> onclick="click_eleve()" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_re" cols="40" rows="20"><?php //if($commentaire=="") echo '[Veuillez rédiger votre commentaire ici]'; else echo $commentaire; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_re_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_re_Terminer" value="Terminer" class="bouton" />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_re"></div>
</div>
