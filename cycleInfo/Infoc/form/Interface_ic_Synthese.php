<?php

// include '../../../connexion.php';

// $reponse = $bdd->query('SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=1');

// $donnees=$reponse->fetch();

// $commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
// $risque=$donnees['SYNTHESE_RISQUE'];
?>
<script>
$(function(){
	$('#Synthese_ic_Precedent').click(function(){
		$('#message_Synthese_ic').hide();
		$('#fancybox_ic').hide();
	});
	$('#Synthese_ic_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_ic").value=="") || (document.getElementById("echo_score_ic").value=="0/32")  || (document.getElementById("rd_Synthese_ic_Faible").checked==false && document.getElementById("rd_Synthese_ic_Moyen").checked==false && document.getElementById("rd_Synthese_ic_Eleve").checked==false)){
			// alert("vide");
			$('#mess_vide_synthese_ic').show();
			$('#message_Synthese_ic').hide();
		}
		else{
			//alert("non vide");
			$('#message_ic_Synthese_Terminer').show();
			$('#message_Synthese_ic').hide();
		}
	});
	$('#fermer_Synthese_ic').click(function(){
		$('#message_Synthese_ic').hide();
		$('#fancybox_ic').hide();
	});
	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

});

</script>
<div id="int_Synhtese_ic">
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
							<div id="echo_score_ic"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<input type="radio" id="rd_Synthese_ic_Faible" name="rd_Synthese_ic" />Faible<br />
										<input type="radio" id="rd_Synthese_ic_Moyen" name="rd_Synthese_ic"  />Moyen<br />
										<input type="radio" id="rd_Synthese_ic_Eleve" name="rd_Synthese_ic" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_ic" cols="40" rows="20" <?php// if($conclusionId!=0) echo 'disabled'; ?> ><?php //if($commentaire=="") {echo '[Rédiger ici votre synthèse]';} else echo $commentaire;?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_ic_Precedent" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_ic_Terminer" value="Terminer" class="bouton" <?php //if($conclusionId!=0) echo 'disabled'; ?> />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_ic"></div>
</div>