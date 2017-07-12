<?php

// include '../../../connexion.php';

// $reponse = $bdd->query('SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=1');

// $donnees=$reponse->fetch();

// $commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
// $risque=$donnees['SYNTHESE_RISQUE'];
?>
<script>
$(function(){
	$('#Synthese_va_Precedent').click(function(){
		$('#message_Synthese_va').hide();
		$('#fancybox_va').hide();
	});
	$('#Synthese_va_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_va").value=="") || (document.getElementById("rd_Synthese_va_Faible").checked==false && document.getElementById("rd_Synthese_va_Moyen").checked==false && document.getElementById("rd_Synthese_va_Eleve").checked==false)){
			$('#mess_vide_synthese_va').show();
			$('#message_Synthese_va').hide();
		}
		else{
			$('#message_Synthese_Terminer').show();
			$('#message_Synthese_va').hide();
		}
	});
	$('#fermer_Synthese_va').click(function(){
		$('#message_Synthese_va').hide();
		$('#fancybox_va').hide();
	});
	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

});

</script>
<div id="int_Synhtese_va">
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
										<input type="radio" id="rd_Synthese_va_Faible" name="rd_Synthese_va" <?php if($conclusionId!=0) echo 'disabled'; ?> />Faible<br />
										<input type="radio" id="rd_Synthese_va_Moyen" name="rd_Synthese_va" <?php if($conclusionId!=0) echo 'disabled'; ?> />Moyen<br />
										<input type="radio" id="rd_Synthese_va_Eleve" name="rd_Synthese_va" <?php if($conclusionId!=0) echo 'disabled'; ?> />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_va" cols="40" rows="20" <?php if($conclusionId!=0) echo 'disabled'; ?> ><?php //if($commentaire=="") {echo '[Rédiger ici votre synthèse]';} else echo $commentaire;?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_va_Precedent" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_va_Terminer" value="Terminer" class="bouton" <?php if($conclusionId!=0) echo 'disabled'; ?> />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_va"></div>
</div>