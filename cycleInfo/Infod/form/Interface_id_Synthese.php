<?php

// include '../../../connexion.php';

// $reponse = $bdd->query('SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=1');

// $donnees=$reponse->fetch();

// $commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
// $risque=$donnees['SYNTHESE_RISQUE'];
?>
<script>
$(function(){
	$('#Synthese_id_Precedent').click(function(){
		$('#message_Synthese_id').hide();
		$('#fancybox_id').hide();
	});
	$('#Synthese_id_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_id").value=="") || (document.getElementById("echo_score_id").value=="0/22") || (document.getElementById("rd_Synthese_id_Faible").checked==false && document.getElementById("rd_Synthese_id_Moyen").checked==false && document.getElementById("rd_Synthese_id_Eleve").checked==false)){
			// alert("vide");
			$('#mess_vide_synthese_id').show();
			$('#message_Synthese_id').hide();
		}
		else{
			//alert("non vide");
			$('#message_id_Synthese_Terminer').show();
			$('#message_Synthese_id').hide();
		}
	});
	$('#fermer_Synthese_id').click(function(){
		$('#message_Synthese_id').hide();
		$('#fancybox_id').hide();
	});
	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

});

</script>
<div id="int_Synhtese_id">
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
							<div id="echo_score_id"></div>
						</td>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<input type="radio" id="rd_Synthese_id_Faible" name="rd_Synthese_id" />Faible<br />
										<input type="radio" id="rd_Synthese_id_Moyen" name="rd_Synthese_id"  />Moyen<br />
										<input type="radio" id="rd_Synthese_id_Eleve" name="rd_Synthese_id" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_id" cols="40" rows="20" <?php// if($conclusionId!=0) echo 'disabled'; ?> ><?php //if($commentaire=="") {echo '[Rédiger ici votre synthèse]';} else echo $commentaire;?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_id_Precedent" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_id_Terminer" value="Terminer" class="bouton" <?php //if($conclusionId!=0) echo 'disabled'; ?> />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_id"></div>
</div>