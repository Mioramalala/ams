<script>
$(function(){
	$('#Synthese_ia_Precedent').click(function(){
		$('#message_Synthese_ia').hide();
		$('#fancybox_ia').hide();
	});
	$('#Synthese_ia_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_ia").value=="") || (document.getElementById("rd_Synthese_ia_faible").checked==false && document.getElementById("rd_Synthese_ia_Moyen").checked==false && document.getElementById("rd_Synthese_ia_Eleve").checked==false)){
			// alert("vide");
			$('#mess_vide_synthese_ia').show();
			$('#message_Synthese_ia').hide();
		}
		else{
			//alert("non vide");
			$('#message_ia_Synthese_Terminer').show();
			$('#message_Synthese_ia').hide();
		}
	});
	$('#fermer_Synthese_ia').click(function(){
		$('#message_Synthese_ia').hide();
		$('#fancybox_ia').hide();
	});
	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

});

</script>
<div id="int_Synhtese_ia">
	<table width="500">
		<tr>
			<td>
				<table width="139">
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<input type="radio" id="rd_Synthese_ia_faible" name="rd_Synthese_ia" <?php if($conclusionId!=0) echo 'disabled'; ?>/>faible<br />
										<input type="radio" id="rd_Synthese_ia_Moyen" name="rd_Synthese_ia"  <?php if($conclusionId!=0) echo 'disabled'; ?>/>Moyen<br />
										<input type="radio" id="rd_Synthese_ia_Eleve" name="rd_Synthese_ia" <?php if($conclusionId!=0) echo 'disabled'; ?>/>Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_ia" cols="40" rows="20" <?php if($conclusionId!=0) echo 'disabled'; ?> ><?php //if($commentaire=="") {echo '[Rédiger ici votre synthèse]';} else echo $commentaire;?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_ia_Precedent" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_ia_Terminer" value="Terminer" class="bouton" <?php if($conclusionId!=0) echo 'disabled'; ?> />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_ia"></div>
</div>