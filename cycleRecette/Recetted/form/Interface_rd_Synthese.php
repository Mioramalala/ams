
<script>

$(function(){
	$('#Synthese_rd_annuler').click(function(){
		$('#Int_Synthese_rd').hide();
		$('#fancybox_rd').hide();
	});

	// Evènement de la synthese de C
	$('#Synthese_rd_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_rd").value=="") || (document.getElementById("rd_Synthese_rd_Faible").checked==false && document.getElementById("rd_Synthese_rd_Moyen").checked==false && document.getElementById("rd_Synthese_rd_Eleve").checked==false)){
			$('#Int_Synthese_rd').hide();
			$('#mess_vide_synthese_rd').show();
		}
		else{
			//alert('ato');
			mission_id=document.getElementById("txt_mission_id_rd").value;
			commentaire=document.getElementById("txt_Synthese_rd").value;
			
			var echo_score_rd= $("#echo_score_rd").html();
			if(echo_score_rd == ''){
				//se rediriger vers calcul score
				$.ajax({
					type:'POST',
					url:'cycleRecette/Recetted/php/select_score_rd.php',
					data:{mission_id:mission_id},
					success:function(e){
					    $("#echo_score_rd").html(e);
					}			
				});
				//alert('tsy misy score');
			}
			
			risque="faible";
			
			if(document.getElementById("rd_Synthese_rd_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_rd_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_rd_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recetted/php/detect_synth_rd_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_rd=e;
					if(synthese_f_rd==0){
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recetted/php/enreg_synth_rd.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_rd:echo_score_rd, risque:risque},
							success:function(e){
								//alert(e);
							}
						});
					}else{
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recetted/php/upd_synth_rd.php',
							data:{mission_id:mission_id, commentaire:commentaire, echo_score_rd:echo_score_rd, risque:risque},
							success:function(e){	
								//alert(e);
							}
						});
					}
					$('#Int_Synthese_rd').hide();
					$('#message_Terminer_Synthese_rd').show();
				}
			});
		}
	});

	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

	$('#fermer_Synthese_rd').click(function(){
		$('#message_Donnees_Perdu_rd').show();
		$('#Int_Synthese_rd').hide();
	});
});
</script>

<div id="int_Synhtese_rd">
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
							<div id="echo_score_rd"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_rd_Faible" name="synth_rd" <?php //if($risque=="faible") echo 'checked'; ?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="rd_Synthese_rd_Moyen" name="synth_rd" <?php //if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="rd_Synthese_rd_Eleve" name="synth_rd" <?php //if($risque=="eleve") echo 'checked'; ?> onclick="click_eleve()" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_rd" cols="40" rows="20"><?php //if($commentaire=="") echo '[Veuillez rédiger votre commentaire ici]'; else echo $commentaire; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_rd_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_rd_Terminer" value="Terminer" class="bouton" />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_rd"></div>
</div>
