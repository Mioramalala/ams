
<script>
$(function(){
	$('#Synthese_ib_Precedent').click(function(){
		$('#message_Synthese_ib').hide();
		$('#fancybox_ib').hide();
	});
	$('#Synthese_ib_Terminer').click(function(){
		// if((document.getElementById("txt_Synthese_ib").value=="") || (document.getElementById("echo_score_ib").value=="0/20") || (document.getElementById("rd_Synthese_ib_Faible").checked==false && document.getElementById("rd_Synthese_ib_Moyen").checked==false && document.getElementById("rd_Synthese_ib_Eleve").checked==false)){
			if((document.getElementById("txt_Synthese_ib").value=="") || (document.getElementById("echo_score_ib").value=="0/21") || (document.getElementById("rd_Synthese_ib_Faible").checked==false && document.getElementById("rd_Synthese_ib_Moyen").checked==false && document.getElementById("rd_Synthese_ib_Eleve").checked==false)){
			// alert("vide");
			$('#mess_vide_synthese_ib').show();
			$('#message_Synthese_ib').hide();
		}
		else{
			//alert("non vide");
			$('#message_ib_Synthese_Terminer').show();
			$('#message_Synthese_ib').hide();
		}
	});
	$('#fermer_Synthese_ib').click(function(){
		$('#message_Synthese_ib').hide();
		$('#fancybox_ib').hide();
	});
	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

});

</script>
<div id="int_Synhtese_ib">
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
							<div id="echo_score_ib"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<input type="radio" id="rd_Synthese_ib_Faible" name="rd_Synthese_ib" <?php if($conclusionId!=0) echo 'disabled'; ?>/>Faible<br />
										<input type="radio" id="rd_Synthese_ib_Moyen" name="rd_Synthese_ib" <?php if($conclusionId!=0) echo 'disabled'; ?> />Moyen<br />
										<input type="radio" id="rd_Synthese_ib_Eleve" name="rd_Synthese_ib" <?php if($conclusionId!=0) echo 'disabled'; ?>/>Elevé
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td height="234"></td>
					</tr>
				</table>
			</td>
			<td>
				<table>
					<tr>
						<td class="td_Titre_Question"><textarea id="txt_Synthese_ib" cols="40" rows="20" <?php if($conclusionId!=0) echo 'disabled'; ?> ><?php //if($commentaire=="") {echo '[Rédiger ici votre synthèse]';} else echo $commentaire;?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_ib_Precedent" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_ib_Terminer" value="Terminer" class="bouton" <?php if($conclusionId!=0) echo 'disabled'; ?> />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_ib"></div>
</div>