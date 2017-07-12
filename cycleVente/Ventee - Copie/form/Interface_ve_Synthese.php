<?php

// include 'connexion.php';

// $reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=6');

// $donnees=$reponse->fetch();

// $commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
// $risque=$donnees['SYNTHESE_RISQUE'];

// $reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=6 AND MISSION_ID='.$mission_id);

// $score_final=0;
// $score=0;
// while($donnees1=$reponse1->fetch()){
	// if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==1 || $donnees1['QUESTION_ID']==2 || $donnees1['QUESTION_ID']==3 || $donnees1['QUESTION_ID']==4 || $donnees1['QUESTION_ID']==5 || $donnees1['QUESTION_ID']==6 || $donnees1['QUESTION_ID']==17)){
		// $score=1;
	// }
	// else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==1 || $donnees1['QUESTION_ID']==21 || $donnees1['QUESTION_ID']==22 || $donnees1['QUESTION_ID']==2 || $donnees1['QUESTION_ID']==3 || $donnees1['QUESTION_ID']==4 || $donnees1['QUESTION_ID']==5 || $donnees1['QUESTION_ID']==6 || $donnees1['QUESTION_ID']==7 || $donnees1['QUESTION_ID']==8 || $donnees1['QUESTION_ID']==9 || $donnees1['QUESTION_ID']==10 || $donnees1['QUESTION_ID']==11 || $donnees1['QUESTION_ID']==12 || $donnees1['QUESTION_ID']==13 || $donnees1['QUESTION_ID']==14 || $donnees1['QUESTION_ID']==15 || $donnees1['QUESTION_ID']==16 || $donnees1['QUESTION_ID']==17 || $donnees1['QUESTION_ID']==18 || $donnees1['QUESTION_ID']==19 || $donnees1['QUESTION_ID']==20)){
		// $score=0;
	// }
	// else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==7 || $donnees1['QUESTION_ID']==8 || $donnees1['QUESTION_ID']==10 || $donnees1['QUESTION_ID']==13 || $donnees1['QUESTION_ID']==14 || $donnees1['QUESTION_ID']==15 || $donnees1['QUESTION_ID']==18 || $donnees1['QUESTION_ID']==19 || $donnees1['QUESTION_ID']==20)){
		// $score=2;
	// }
	// else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==9 || $donnees1['QUESTION_ID']==11 || $donnees1['QUESTION_ID']==12 || $donnees1['QUESTION_ID']==16 || $donnees1['QUESTION_ID']==21 || $donnees1['QUESTION_ID']==22)){
		// $score=3;
	// }
	// $score_final=$score_final+$score;
// }

?>

<script>

$(function(){
	$('#Synthese_ve_annuler').click(function(){
		$('#Int_Synthese_ve').hide();
		$('#fancybox_ve').hide();
	});
	// Evènement de la synthese de C
	$('#Synthese_ve_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_ve").value=="") || (document.getElementById("ve_Synthese_ve_Faible").checked==false && document.getElementById("ve_Synthese_ve_Moyen").checked==false && document.getElementById("ve_Synthese_ve_Eleve").checked==false)){
			$('#Int_Synthese_ve').hide();
			$('#mess_vide_synthese_ve').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_ve").value;
			commentaire=document.getElementById("txt_Synthese_ve").value;
			risque="faible";
			if(document.getElementById("ve_Synthese_ve_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("ve_Synthese_ve_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("ve_Synthese_ve_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Ventee/php/detect_synth_ve_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_ve=e;
					if(synthese_f_ve==0){
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventee/php/enreg_synth_ve.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventee/php/upd_synth_ve.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#Int_Synthese_ve').hide();
					$('#message_Terminer_Synthese_ve').show();
				}
			});
		}
	});

	$('#fermer_Synthese_ve').click(function(){
		$('#message_Donnees_Peveu_ve').show();
		$('#Int_Synthese_ve').hide();
	});
	
	$('#txt_Synthese_ve').click(function(){
		document.getElementById("txt_Synthese_ve").value="";
	});
});
</script>

<div id="int_Synhtese_ve">
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
							<?php //echo $score_final.' / 23' ; ?>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="ve_Synthese_B_Faible" checked /-->
										<input type="radio" id="ve_Synthese_ve_Faible" name="synth_ve" <?php //if($risque=="faible") echo 'checked'; ?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="ve_Synthese_ve_Moyen" name="synth_ve" <?php //if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="ve_Synthese_ve_Eleve" name="synth_ve" <?php //if($risque=="eleve") echo 'checked'; ?> onclick="click_eleve()" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_ve" cols="40" rows="20"><?php //if($commentaire=="") echo '[Veuillez rédiger votre commentaire ici]'; else echo $commentaire; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_ve_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_ve_Terminer" value="Terminer" class="bouton" />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_ve"></div>
</div>
