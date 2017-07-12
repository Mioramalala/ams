<?php 
include 'connexion.php';

$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=26 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
$risque=$donnees['SYNTHESE_RISQUE'];

$reponse1=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE CYCLE_ACHAT_ID=26 AND MISSION_ID='.$mission_id);

$donnees1=$reponse1->fetch();

$commentaire1=$donnees1['CONCLUSION_COMMENTAIRE'];
$risque1=$donnees1['CONCLUSION_RISQUE'];

if($risque1==""){
	$risqueFin=$risque;
}
else{
	$risqueFin=$risque1;
}

?>
<script>

$(function(){
	$('#Synthese_vb_annuler').click(function(){
		$('#Int_Synthese_vb').hide();
		$('#fancybox_vb').hide();
	});
	// Evènement de la synthese de C
	$('#Synthese_vb_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_vb").value=="") || (document.getElementById("rd_Synthese_vb_Faible").checked==false && document.getElementById("rd_Synthese_vb_Moyen").checked==false && document.getElementById("rd_Synthese_vb_Eleve").checked==false)){
			$('#Int_Synthese_vb').hide();
			$('#mess_vide_synthese_vb').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_vb").value;
			commentaire=document.getElementById("txt_Synthese_vb").value;
			var risque=$('input[type=radio][name=synth_vb]:checked').val();
			var echo_score_vb=$("#echo_score_vb").html();
			// alert(echo_score_vb);
			risque="faible";
			if(document.getElementById("rd_Synthese_vb_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_vb_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_vb_Eleve").checked==true){
				risque="eleve";
			}
			synthese_f_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Venteb/php/detect_synth_vb_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_f_vb=e;
					if(synthese_f_vb==0){
						$.ajax({
							type:'POST',
							url:'cycleVente/Venteb/php/enreg_synth_vb.php',
							data:{mission_id:mission_id, commentaire:commentaire, echo_score_vb:echo_score_vb, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Venteb/php/upd_synth_vb.php',
							data:{mission_id:mission_id, commentaire:commentaire,echo_score_vb:echo_score_vb, risque:risque},
							success:function(){	
							}
						});
					}
					$('#Int_Synthese_vb').hide();
					$('#message_Terminer_Synthese_vb').show();
				}
			});
		}
	});

	$('#fermer_Synthese_vb').click(function(){
		$('#message_Donnees_Perdu_vb').show();
		$('#Int_Synthese_vb').hide();
	});
	
	$('#txt_Synthese_vb').click(function(){
		document.getElementById("txt_Synthese_vb").value="";
	});
});
</script>

<div id="int_Synhtese_vb">
	<table width="500">
		<tr style="height:100px;">
			<td>
				<table width="139">
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">Score :
						</td>
					</tr>
					<tr style="height:20px;" bgcolor="#05abe1">
						<td height="50" class="label_Question" align="center">
							<div id="echo_score_vb"></div>
						</td>
					</tr>
					<tr style="height:20px;"bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<!--input type="radio" id="rd_Synthese_B_Faible" checked /-->
										<input type="radio" id="rd_Synthese_vb_Faible" name="synth_vb" value="faible" <?php if($risque=="faible") echo 'checked'; ?> />Faible<br />
										<input type="radio" id="rd_Synthese_vb_Moyen" name="synth_vb" value="moyen"<?php if($risque=="moyen") echo 'checked'; ?>/>Moyen<br />
										<input type="radio" id="rd_Synthese_vb_Eleve" name="synth_vb" value="eleve"<?php if($risque=="eleve") echo 'checked'; ?>/>Elevé
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
						<td class="td_Titre_Question"><textarea id="txt_Synthese_vb" cols="40" rows="20"><?php echo $commentaire; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_vb_annuler" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_vb_Terminer" value="Terminer" class="bouton" />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_vb"></div>
</div>
