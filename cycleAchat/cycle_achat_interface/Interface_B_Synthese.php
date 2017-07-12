<?php

// include 'connexion.php';


// $commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
// $risque=$donnees['SYNTHESE_RISQUE'];

// $reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=2 AND MISSION_ID='.$mission_id);

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


<div id="int_Synhtese_B">
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
							<?php //echo $score_final.' / 44' ; ?>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_B_Faible" name="synth_b" <?php if($conclusionIdb!="") echo 'disabled';?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="rd_Synthese_B_Moyen" name="synth_b" <?php if($conclusionIdb!="") echo 'disabled';?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="rd_Synthese_B_Eleve" name="synth_b" <?php if($conclusionIdb!="") echo 'disabled';?> onclick="click_eleve()" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_B" cols="40" rows="20" <?php if($conclusionIdb!="") echo 'disabled';?> ><?php //if($commentaire=="") echo '[Veuillez rédiger votre commentaire ici]'; else echo $commentaire; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_B_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_B_Terminer" value="Terminer" class="bouton" <?php if($conclusionIdb!="") echo 'disabled';?> />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_B"></div>
</div>
