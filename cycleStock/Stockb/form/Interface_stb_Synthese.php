<?php

include 'connexion.php';

$reponse=$bdd->query('SELECT CONCLUSION_ID FROM tab_conclusion WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=11');
$donnees=$reponse->fetch();
$conclusionId=$donnees['CONCLUSION_ID'];
$entrepiseId=@$_POST['entrepiseId'];

?>

<script>

$(function(){
	$('#Synthese_stb_annuler').click(function(){
		$('#Int_Synthese_stb').hide();
		$('#fancybox_stb').hide();
	});
	// Evènement de la synthese de C
	$('#Synthese_stb_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_stb").value=="") || (document.getElementById("rd_Synthese_stb_Faible").checked==false && document.getElementById("rd_Synthese_stb_Moyen").checked==false && document.getElementById("rd_Synthese_stb_Eleve").checked==false)){
			$('#Int_Synthese_stb').hide();
			$('#mess_vide_synthese_stb').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_stb").value;
			commentaire=document.getElementById("txt_Synthese_stb").value;
			var echo_score_stb=$("#echo_score_stb").html();
			
			risque="faible";
			if(document.getElementById("rd_Synthese_stb_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_stb_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_stb_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleStock/Stockb/php/detect_synth_stb_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_stb=e;
					if(synthese_f_stb==0){
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockb/php/enreg_synth_stb.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_stb:echo_score_stb, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockb/php/upd_synth_stb.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_stb:echo_score_stb, risque:risque},
							success:function(){	
							}
						});
					}
					$('#Int_Synthese_stb').hide();
					$('#message_Terminer_Synthese_stb').show();
				}
			});
		}
	});

	$("textarea").attr("placeholder", "Veuillez remplir ce champ");

	$('#fermer_Synthese_stb').click(function(){
		$('#message_Donnees_Perdu_stb').show();
		$('#Int_Synthese_stb').hide();
	});
});
</script>

<div id="int_Synhtese_stb">
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
							<div id="echo_score_stb"></div>
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_stb_Faible" name="synth_stb" <?php if($conclusionId!=0) echo "disabled=disabled;"?> <?php //if($risque=="faible") echo 'checked'; ?> onclick="click_faible()" />Faible<br />
										<input type="radio" id="rd_Synthese_stb_Moyen" name="synth_stb" <?php if($conclusionId!=0) echo "disabled=disabled;"?> <?php //if($risque=="moyen") echo 'checked'; ?> onclick="click_moyen()" />Moyen<br />
										<input type="radio" id="rd_Synthese_stb_Eleve" name="synth_stb" <?php if($conclusionId!=0) echo "disabled=disabled;"?> <?php //if($risque=="eleve") echo 'checked'; ?> onclick="click_eleve()" />Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_stb" cols="40" rows="20" <?php if($conclusionId!=0) echo "disabled=disabled;"?>><?php //if($commentaire=="") echo '[Veuillez rédiger votre commentaire ici]'; else echo $commentaire; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_stb_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_stb_Terminer" value="Terminer" class="bouton" <?php if($conclusionId!=0) echo "disabled=disabled;"?> />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_stb"></div>
</div>
