<?php

// include '../../../connexion.php';

// $reponse = $bdd->query('SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=1');

// $donnees=$reponse->fetch();

// $commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
// $risque=$donnees['SYNTHESE_RISQUE'];
?>
<script>
$(function(){
	$('#Synthese_ra_Precedent').click(function(){
		$('#message_Synthese_ra').hide();
		$('#fancybox_ra').hide();
	});
	$('#Synthese_ra_Terminer').click(function()
	{

		if((document.getElementById("txt_Synthese_ra").value=="") || (document.getElementById("rd_Synthese_ra_Faible").checked==false && document.getElementById("rd_Synthese_ra_Moyen").checked==false && document.getElementById("rd_Synthese_ra_Eleve").checked==false)){

			$('#mess_vide_synthese_ra').show();
			$('#message_Synthese_ra').hide();
		}
		else{


								//mission_id=document.getElementById("txt_mission_id_ra").value;
								commentaire=document.getElementById("txt_Synthese_ra").value;



								//var echo_score_ra=$("#echo_score_ra").html();
								risque="faible";
								if(document.getElementById("rd_Synthese_ra_Faible").checked==true){
									risque="faible";
								}
								else if(document.getElementById("rd_Synthese_ra_Moyen").checked==true){
									risque="moyen";
								}
								else if(document.getElementById("rd_Synthese_ra_Eleve").checked==true){
									risque="eleve";
								}
								synthese_f_id=0;
								//alert("TONGA 1");
								$.ajax({
									type:'POST',
									url:'cycleRecette/Recettea/php/detect_synthese_existant_ra.php',
									data:{},
									success:function(e)
									{


											$.ajax({
												type:'POST',
												url:'cycleRecette/Recettea/php/enregistrer_synthese_ra.php',
												data:{ commentaire:commentaire, risque:risque},
												success:function(e)
												{
													//alert(e);
													$('#Int_Synthese_ra').hide();
													$('#message_Terminer_Synthese_ra').show();

												}
											});


									}
								});
			$('#message_ra_Synthese_Terminer').show();
			$('#message_Synthese_ra').hide();
		}
	});
	$('#fermer_Synthese_ra').click(function(){
		$('#message_Synthese_ra').hide();
		$('#fancybox_ra').hide();
	});
	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

});

</script>
<div id="int_Synhtese_ra">
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
										<input type="radio" id="rd_Synthese_ra_Faible" name="rd_Synthese_ra" <?php if($conclusionId!=0) echo 'disabled'; ?> />Faible<br />
										<input type="radio" id="rd_Synthese_ra_Moyen" name="rd_Synthese_ra" <?php if($conclusionId!=0) echo 'disabled'; ?> />Moyen<br />
										<input type="radio" id="rd_Synthese_ra_Eleve" name="rd_Synthese_ra" <?php if($conclusionId!=0) echo 'disabled'; ?> />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_ra" cols="40" rows="20" <?php if($conclusionId!=0) echo 'disabled'; ?> ><?php //if($commentaire=="") {echo '[Rédiger ici votre synthèse]';} else echo $commentaire;?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_ra_Precedent" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_ra_Terminer" value="Terminer" class="bouton" <?php if($conclusionId!=0) echo 'disabled'; ?> />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_ra"></div>
</div>