
<script>

$(function(){
	$('#Synthese_imb_annuler').click(function(){
		$('#Int_Synthese_imb').hide();
		$('#fancybox_imb').hide();
	});
	// Evènement de la synthese de C
	$('#Synthese_imb_Terminer').click(function()
	{

		//alert("tafiditra ato ohh");

		//if(cycleObjValide==1)
		//{
		//	$('#Int_Synthese_imb').hide();
		//	$('#fancybox_imb').hide();
			//return false;
		//}
		if((document.getElementById("txt_Synthese_imb").value=="") || (document.getElementById("rd_Synthese_imb_Faible").checked==false && document.getElementById("rd_Synthese_imb_Moyen").checked==false && document.getElementById("rd_Synthese_imb_Eleve").checked==false)){
			$('#Int_Synthese_imb').hide();
			$('#mess_vide_synthese_imb').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_imb").value;
			commentaire=document.getElementById("txt_Synthese_imb").value;
			var echo_score_imb=$("#echo_score_imb").html();
			// alert(echo_score_imb);
			risque="faible";
			if(document.getElementById("rd_Synthese_imb_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_imb_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_imb_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleImmo/Immob/php/detect_synth_imb_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_imb=e;
					if(synthese_f_imb==0){
						$.ajax({
							type:'POST',
							url:'cycleImmo/Immob/php/enreg_synth_imb.php',
							data:{mission_id:mission_id, commentaire:commentaire, echo_score_imb:echo_score_imb, risque:risque},
							success:function(e){
								//alert("ENGE SYNTHESE"+e);
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleImmo/Immob/php/upd_synth_imb.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_imb:echo_score_imb, risque:risque},
							success:function(e){	
									//alert("UPDATE SYNTHESE"+e);
							}
						});
					}
					$('#Int_Synthese_imb').hide();
					$('#message_Terminer_Synthese_imb').show();
				}
			});
		}
	});

	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

	$('#fermer_Synthese_imb').click(function(){
		$('#message_Donnees_Perdu_imb').show();
		$('#Int_Synthese_imb').hide();
	});
});
</script>

<div id="int_Synhtese_imb">
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
							<div id="echo_score_imb"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_imb_Faible" name="synth_imb" <?php //if($risque=="faible") echo 'checked'; ?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="rd_Synthese_imb_Moyen" name="synth_imb" <?php //if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="rd_Synthese_imb_Eleve" name="synth_imb" <?php //if($risque=="eleve") echo 'checked'; ?> onclick="click_eleve()" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_imb" cols="40" rows="20"><?php //if($commentaire=="") echo '[Veuillez rédiger votre commentaire ici]'; else echo $commentaire; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_imb_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_imb_Terminer" value="Terminer" class="bouton" />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_imb"></div>
</div>
