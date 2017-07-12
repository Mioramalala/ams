<?php

include 'connexion.php';

$reponse=$bdd->query('SELECT CONCLUSION_ID FROM tab_conclusion WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=12');
$donnees=$reponse->fetch();
$conclusionId=$donnees['CONCLUSION_ID'];
$entrepiseId= @$_POST['entrepiseId'];

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
			var echo_score_stc=$("#echo_score_stc").html();
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
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_stc:echo_score_stc, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockc/php/upd_synth_stc.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_stc:echo_score_stc, risque:risque},
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

	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

	$('#fermer_Synthese_stc').click(function(){
		$('#message_Donnees_Perdu_stc').show();
		$('#Int_Synthese_stc').hide();
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
							<div id="echo_score_stc"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_stc_Faible" name="synth_stc" <?php if($conclusionId!=0) echo "disabled=disabled;"?> <?php //if($risque=="faible") echo 'checked'; ?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="rd_Synthese_stc_Moyen" name="synth_stc" <?php if($conclusionId!=0) echo "disabled=disabled;"?> <?php //if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="rd_Synthese_stc_Eleve" name="synth_stc" <?php if($conclusionId!=0) echo "disabled=disabled;"?> <?php //if($risque=="eleve") echo 'checked'; ?> onclick="click_eleve()" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_stc" cols="40" rows="20" <?php if($conclusionId!=0) echo "disabled=disabled;"?> ><?php //if($commentaire=="") echo '[Veuillez rédiger votre commentaire ici]'; else echo $commentaire; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_stc_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_stc_Terminer" value="Terminer" class="bouton"<?php if($conclusionId!=0) echo "disabled=disabled;"?>  />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_stc"></div>
</div>
