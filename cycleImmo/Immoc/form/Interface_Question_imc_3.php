<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=95 AND CYCLE_ACHAT_ID=8 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_imc_3_Bouton').click(function(){
		//tinay editer
		//if((document.getElementById("commentaire_Question_imc3").value=="") || (document.getElementById("rad_Question_Oui_imc_3").checked==false && document.getElementById("rad_Question_NA_imc_3").checked==false && document.getElementById("rad_Question_Non_imc_3").checked==false)){
		if((document.getElementById("commentaire_Question_imc3").value=="" && document.getElementById("rad_Question_Non_imc_3").checked== true) || (document.getElementById("rad_Question_Oui_imc_3").checked==false && document.getElementById("rad_Question_NA_imc_3").checked==false && document.getElementById("rad_Question_Non_imc_3").checked==false)){
			$('#mess_quest_vide_imc3').show();
			$('#Question_imc_95').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_imc").value;
			commentaire=document.getElementById("commentaire_Question_imc3").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_imc_3").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_imc_3").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_imc_3").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleImmo/Immoc/php/detect_objectif_exist_imc.php',
				data:{mission_id:mission_id, question_id:95, cycle_achat_id:8},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_imc(commentaire, qcm, mission_id, 95);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleImmo/Immoc/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:95, mission_id:mission_id, cycleId:8},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("imc_4","imc4");
								$.ajax({
									type:'POST',
									url:'cycleImmo/Immoc/load/load_rep_imc.php',
									data:{mission_id:mission_id},
									success:function(e){	
										$('#Interface_Question_imc').hide();
										$('#frm_tab_res_imc').html(e).show();
										$('#dv_table_imc').show();
									}
								});	
							}
						});
					}
				}
			});

			$('#Question_imc_95').fadeOut(500);
			$('#Question_imc_96').fadeIn(500);
			$('#lb_veuillez_aff_imc').hide();
		}

	});
	$('#int_imc_Question_Precedent_3').click(function(){
		$('#Question_imc_95').fadeOut(500);
		$('#Question_imc_94').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_imc_3').click(function(){
		$('#message_fermeture_question_imc3').show();
		$('#Question_imc_95').hide();
	});
});
</script>
<div id="int_Question_imc_3">
	<table width="500" id="t_imc_3">
		<tr style="height:10px">
			<td class="label_Question" align="center">3.Ce contrôle porte-il sur l'imputation : <br/> a) en comptabilité générale ?</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_imc_3" name="rad_Question_imc3" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_imc_3" name="rad_Question_imc3" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_imc_3" name="rad_Question_imc3" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_imc3" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_imc_Question_Precedent_3"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_imc_3_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_imc"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_imc_3" /></div>