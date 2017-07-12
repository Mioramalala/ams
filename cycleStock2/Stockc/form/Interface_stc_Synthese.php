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
	$('#Synthese_stc_annuler').click(function(){
		$('#Int_Synthese_stc').hide();
		$('#fancybox_stc').hide();
	});
	// Evènement de la synthese de C
	$('#Synthese_stc_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_stc").value=="") || (document.getElementById("rd_Synthese_stc_Faible").checked==false && document.getElementById("rd_Synthese_stc_Moyen").checked==false && document.getElementById("rd_Synthese_stc_Eleve").checked==false)){
			$('#Int_Synthese_stc').hide();
			$('#mess_vide_synthese_stc').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_stc").value;
			commentaire=document.getElementById("txt_Synthese_stc").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_stc_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_stc_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_stc_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleStock/Stockc/php/detect_synth_stc_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_stc=e;
					if(synthese_f_stc==0){
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockc/php/enreg_synth_stc.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockc/php/upd_synth_stc.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#Int_Synthese_stc').hide();
					$('#message_Terminer_Synthese_stc').show();
				}
			});
		}
	});

	$('#fermer_Synthese_stc').click(function(){
		$('#message_Donnees_Perdu_stc').show();
		$('#Int_Synthese_stc').hide();
	});
	
	$('#txt_Synthese_stc').click(function(){
		document.getElementById("txt_Synthese_stc").value="";
	});
});
</script>

<div id="int_Synhtese_stc">
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
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_stc_Faible" name="synth_stc" <?php //if($risque=="faible") echo 'checked'; ?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="rd_Synthese_stc_Moyen" name="synth_stc" <?php //if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="rd_Synthese_stc_Eleve" name="synth_stc" <?php //if($risque=="eleve") echo 'checked'; ?> onclick="click_eleve()" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_stc" cols="40" rows="20"><?php //if($commentaire=="") echo '[Veuillez rédiger votre commentaire ici]'; else echo $commentaire; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_stc_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_stc_Terminer" value="Terminer" class="bouton" />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_stc"></div>
</div>
